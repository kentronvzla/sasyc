<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TipoAyuda
 *
 * @author Nadin Yamani
 */
class TipoAyuda extends BaseModel {

    protected $table = "tipo_ayudas";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'nombre', 'cod_acc_int',
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
        'cod_acc_int' => 'required',
    ];

    protected function getPrettyFields() {
        return [
            'nombre' => 'Nombre',
            'cod_acc_int' => 'Acción interna',
        ];
    }

    protected function getPrettyName() {
        return "tipo_ayudas";
    }
    

}
