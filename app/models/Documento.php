<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Documento
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property string $tipo
 * @property string $descripcion
 * @property string $fecha
 * @property string $estatus
 * @property boolean $ind_reverso
 * @property integer $solicitud_id
 * @property string $mensaje
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Solicitud $solicitud
 * @method static \Illuminate\Database\Query\Builder|\Documento whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Documento whereTipo($value) 
 * @method static \Illuminate\Database\Query\Builder|\Documento whereDescripcion($value) 
 * @method static \Illuminate\Database\Query\Builder|\Documento whereFecha($value) 
 * @method static \Illuminate\Database\Query\Builder|\Documento whereEstatus($value) 
 * @method static \Illuminate\Database\Query\Builder|\Documento whereIndReverso($value) 
 * @method static \Illuminate\Database\Query\Builder|\Documento whereSolicitudId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Documento whereMensaje($value) 
 * @method static \Illuminate\Database\Query\Builder|\Documento whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\Documento whereUpdatedAt($value) 
 */
class Documento extends BaseModel {

    protected $table = "documentos";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'tipo', 'descripcion', 'fecha', 'estatus', 'ind_reverso', 'solicitud_id', 
        'mensaje',
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, 
     * y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'tipo'=>'required', 
'descripcion'=>'required', 
'fecha'=>'required', 
'estatus'=>'required', 
'ind_reverso'=>'required', 
'solicitud_id'=>'required|integer', 
'mensaje'=>'required', 

    ];

    protected function getPrettyFields() {
        return [
            'tipo' => 'Tipo',
            'descripcion' => 'Descripción',
            'fecha' => 'Fecha',
            'estatus' => 'Estatus',
            'ind_reverso' => 'Reverso?',
            'solicitud_id' => 'Solicitud',
            'mensaje' => 'Mensaje',
        ];
    }

    protected function getPrettyName() {
        return "documentos";
    }

    /**
     * Define una relación pertenece a Solicitud
     * @return Solicitud
     */
    public function solicitud() {
        return $this->belongsTo('Solicitud');
    }

}
