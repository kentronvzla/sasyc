<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InformesSocial
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property integer $solicitud_id
 * @property integer $tipo_vivienda_id
 * @property integer $tendencia_id
 * @property string $observaciones
 * @property float $total_ingresos
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Solicitud $solicitud
 * @property-read \TipoVivienda $tipoVivienda
 * @property-read \Tendencia $tendencia
 * @method static \Illuminate\Database\Query\Builder|\InformesSocial whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\InformesSocial whereSolicitudId($value) 
 * @method static \Illuminate\Database\Query\Builder|\InformesSocial whereTipoViviendaId($value) 
 * @method static \Illuminate\Database\Query\Builder|\InformesSocial whereTendenciaId($value) 
 * @method static \Illuminate\Database\Query\Builder|\InformesSocial whereObservaciones($value) 
 * @method static \Illuminate\Database\Query\Builder|\InformesSocial whereTotalIngresos($value) 
 * @method static \Illuminate\Database\Query\Builder|\InformesSocial whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\InformesSocial whereUpdatedAt($value) 
 */
class InformesSocial extends BaseModel {

    protected $table = "informes_sociales";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'solicitud_id', 'tipo_vivienda_id', 'tendencia_id', 'observaciones',
        'total_ingresos',
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, 
     * y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
    ];

    protected function getPrettyFields() {
        return [
            'solicitud_id' => 'Solicitud',
            'tipo_vivienda_id' => 'Tipo de vivienda',
            'tendencia_id' => 'Tendencia',
            'observaciones' => 'Observaciones',
            'total_ingresos' => 'Total de ingresos',
        ];
    }

    protected function getPrettyName() {
        return "informes_sociales";
    }

    /**
     * Define una relación pertenece a Solicitud
     * @return Solicitud
     */
    public function solicitud() {
        return $this->belongsTo('Solicitud');
    }

    /**
     * Define una relación pertenece a TipoVivienda
     * @return TipoVivienda
     */
    public function tipoVivienda() {
        return $this->belongsTo('TipoVivienda');
    }

    /**
     * Define una relación pertenece a Tendencia
     * @return Tendencia
     */
    public function tendencia() {
        return $this->belongsTo('Tendencia');
    }

}
