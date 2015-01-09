<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bitacora
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property integer $solicitud_id
 * @property string $fecha
 * @property string $nota
 * @property integer $usuario_id
 * @property string $memo
 * @property string $tipo
 * @property boolean $ind_activo
 * @property boolean $ind_alarma
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Solicitud $solicitud
 * @property-read \Usuario $usuario
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereSolicitudId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereFecha($value) 
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereNota($value) 
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereUsuarioId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereMemo($value) 
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereTipo($value) 
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereIndActivo($value) 
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereIndAlarma($value) 
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereUpdatedAt($value) 
 */
class Bitacora extends BaseModel {

    protected $table = "bitacoras";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'solicitud_id', 'fecha', 'nota', 'usuario_id', 'memo', 'tipo',
        'ind_activo', 'ind_alarma',
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, 
     * y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'solicitud_id' => 'required|integer',
        'fecha' => 'required',
        'nota' => 'required',
        'usuario_id' => 'required|integer',
        'memo' => 'required',
        'tipo' => 'required',
        'ind_activo' => 'required',
        'ind_alarma' => 'required',
    ];

    protected function getPrettyFields() {
        return [
            'solicitud_id' => 'Solicitud',
            'fecha' => 'Fecha',
            'nota' => 'Nota',
            'usuario_id' => 'Usuario',
            'memo' => 'Memo',
            'tipo' => 'Tipo',
            'ind_activo' => 'Activo?',
            'ind_alarma' => 'Alarma?',
        ];
    }

    protected function getPrettyName() {
        return "bitacoras";
    }

    /**
     * Define una relación pertenece a Solicitud
     * @return Solicitud
     */
    public function solicitud() {
        return $this->belongsTo('Solicitud');
    }

    /**
     * Define una relación pertenece a Usuario
     * @return Usuario
     */
    public function usuario() {
        return $this->belongsTo('Usuario');
    }

}
