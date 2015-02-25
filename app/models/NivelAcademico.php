<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * NivelAcademico
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $orden
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\NivelAcademico whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\NivelAcademico whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\NivelAcademico whereOrden($value)
 * @method static \Illuminate\Database\Query\Builder|\NivelAcademico whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\NivelAcademico whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\NivelAcademico whereUpdatedAt($value)
 * @property-read mixed $estatus_display 
 */
class NivelAcademico extends BaseModel implements SimpleTableInterface {

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
        'nombre' => 'required',
        'orden' => 'required|integer',
    ];

    protected function getPrettyFields() {
        return [
            'nombre' => 'Nivel Académico',
            'orden' => 'Orden',
        ];
    }

    public function getPrettyName() {
        return "Nivel Académico";
    }

}
