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

}
