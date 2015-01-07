<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Parroquia
 *
 * @author Nadin Yamani
 */
class Parroquia extends BaseModel {

    protected $table = "parroquias";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'estado_id', 'municipio_id', 'nombre',
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, 
     * y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'estado_id' => 'required|integer',
        'municipio_id' => 'required|integer',
        'nombre' => 'required',
    ];

    protected function getPrettyFields() {
        return [
            'estado_id' => 'Estado',
            'municipio_id' => 'Municipio',
            'nombre' => 'Nombre',
        ];
    }

    protected function getPrettyName() {
        return "parroquias";
    }

}
