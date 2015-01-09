<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NivelesAcademico
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property string $nombre
 * @property integer $orden
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\NivelesAcademico whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\NivelesAcademico whereNombre($value) 
 * @method static \Illuminate\Database\Query\Builder|\NivelesAcademico whereOrden($value) 
 * @method static \Illuminate\Database\Query\Builder|\NivelesAcademico whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\NivelesAcademico whereUpdatedAt($value) 
 */
class NivelAcademico extends BaseModel {

    protected $table = "niveles_academicos";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'nombre', 'orden',
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
    ];

    protected function getPrettyFields() {
        return [
            'nombre' => 'Nombre',
            'orden' => 'Orden',
        ];
    }

    protected function getPrettyName() {
        return "niveles_academicos";
    }

}
