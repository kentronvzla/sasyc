<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Area
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property integer $tipo_ayuda_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \TipoAyuda $tipoAyuda
 * @method static \Illuminate\Database\Query\Builder|\Area whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Area whereNombre($value) 
 * @method static \Illuminate\Database\Query\Builder|\Area whereDescripcion($value) 
 * @method static \Illuminate\Database\Query\Builder|\Area whereTipoAyudaId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Area whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\Area whereUpdatedAt($value) 
 */
class Area extends BaseModel {

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

    protected function getPrettyName() {
        return "areas";
    }

    /**
     * Define una relación pertenece a TipoAyuda
     * @return TipoAyuda
     */
    public function tipoAyuda() {
        return $this->belongsTo('TipoAyuda');
    }

}
