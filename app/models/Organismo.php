<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Organismo
 *
 * @author Nadin Yamani
 */
class Organismo extends BaseModel implements SelectInterface{

    protected $table = "organismos";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'nombre', 'ind_externo',
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
        'ind_externo' => 'required',
    ];

    protected function getPrettyFields() {
        return [
            'nombre' => 'Nombre',
            'ind_externo' => 'Externo?',
        ];
    }

    protected function getPrettyName() {
        return "organismos";
    }
    
    public static function getCampoCombo() {
        return "nombre";
    }

}