<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Requerimiento
 *
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $cod_item
 * @property string $cod_cta
 * @property string $tipo_requerimiento_id
 * @property integer $tipo_ayuda_id
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \TipoAyuda $tipoAyuda
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereDescripcion($value)
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereCodItem($value)
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereCodCta($value)
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereTipoRequerimientoId($value)
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereTipoAyudaId($value)
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereUpdatedAt($value)
 * @property-read \TipoRequerimiento $tipoRequerimiento
 * @property-read mixed $estatus_display 
 */
class Requerimiento extends BaseModel {

    protected $table = "requerimientos";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'nombre', 'descripcion', 'cod_item', 'cod_cta', 'tipo_requerimiento_id', 'tipo_ayuda_id',
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'nombre' => 'required',
        'descripcion' => 'required',
        'cod_item' => '',
        'cod_cta' => 'required',
        'tipo_requerimiento_id' => 'required',
        'tipo_ayuda_id' => 'required|integer',
    ];

    protected function getPrettyFields() {
        return [
            'nombre' => 'Requerimiento',
            'descripcion' => 'Descripción',
            'cod_item' => 'Ítem',
            'cod_cta' => 'Cuenta',
            'tipo_requerimiento_id' => 'Tipo de requerimiento',
            'tipo_ayuda_id' => 'Tipo de ayuda',
        ];
    }

    public function getPrettyName() {
        return "Requerimiento";
    }

    /**
     * Define una relación pertenece a TipoRequerimiento
     * @return TipoRequerimiento
     */
    public function tipoRequerimiento() {
        return $this->belongsTo('TipoRequerimiento');
    }

    /**
     * Define una relación pertenece a TipoAyuda
     * @return TipoAyuda
     */
    public function tipoAyuda() {
        return $this->belongsTo('TipoAyuda');
    }

    public function getTableFields() {
        return [
            'nombre', 'tipoRequerimiento->nombre', 'tipoAyuda->nombre'
        ];
    }

}
