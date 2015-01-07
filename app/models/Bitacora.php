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

}
