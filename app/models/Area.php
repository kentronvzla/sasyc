<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Area
 *
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property integer $tipo_ayuda_id
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \TipoAyuda $tipoAyuda
 * @method static \Illuminate\Database\Query\Builder|\Area whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Area whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Area whereDescripcion($value)
 * @method static \Illuminate\Database\Query\Builder|\Area whereTipoAyudaId($value)
 * @method static \Illuminate\Database\Query\Builder|\Area whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Area whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Area whereUpdatedAt($value)
 */
class Area extends BaseModel implements SimpleTableInterface {

    protected $table = "areas";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'nombre', 'descripcion', 'tipo_ayuda_id',
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, 
     * y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'nombre' => 'required',
        'descripcion' => 'required',
        'tipo_ayuda_id' => 'required|integer',
    ];

    protected function getPrettyFields() {
        return [
            'nombre' => 'Nombre',
            'descripcion' => 'Descripción',
            'tipo_ayuda_id' => 'Tipo de ayuda',
        ];
    }

    public function getPrettyName() {
        return "Área";
    }

    /**
     * Define una relación pertenece a TipoAyuda
     * @return TipoAyuda
     */
    public function tipoAyuda() {
        return $this->belongsTo('TipoAyuda');
    }

    public function getParent() {
        return "tipo_ayuda_id";
    }

    public static function getCombo($idTipoAyuda = "", array $condiciones = []) {
        $tipoAyuda = TipoAyuda::find((int) $idTipoAyuda);
        $retorno = array('' => 'Seleccione.');
        if (is_object($tipoAyuda)) {
            $actividades = $tipoAyuda->areas;
            foreach ($actividades as $registro) {
                $retorno[$registro->id] = $registro->nombre;
            }
        } else {
            $retorno = array('' => 'Seleccione primero un tipo de ayuda');
        }
        return $retorno;
    }

    public function getTableFields() {
        return [
            'nombre', 'descripcion', 'tipoAyuda->nombre'
        ];
    }

}
