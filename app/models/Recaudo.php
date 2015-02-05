<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Recaudo
 *
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property boolean $ind_obligatorio
 * @property boolean $ind_vence
 * @property boolean $ind_activo
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Recaudo whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Recaudo whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Recaudo whereDescripcion($value)
 * @method static \Illuminate\Database\Query\Builder|\Recaudo whereIndObligatorio($value)
 * @method static \Illuminate\Database\Query\Builder|\Recaudo whereIndVence($value)
 * @method static \Illuminate\Database\Query\Builder|\Recaudo whereIndActivo($value)
 * @method static \Illuminate\Database\Query\Builder|\Recaudo whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Recaudo whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Recaudo whereUpdatedAt($value)
 */
class Recaudo extends BaseModel implements SimpleTableInterface {

    protected $table = "recaudos";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'nombre', 'descripcion', 'ind_obligatorio', 'ind_vence', 'ind_activo',
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'nombre' => 'required',
        'descripcion' => 'required',
        'ind_obligatorio' => 'required',
        'ind_vence' => 'required',
        'ind_activo' => 'required',
    ];

    protected function getPrettyFields() {
        return [
            'nombre' => 'Nombre',
            'descripcion' => 'Descripción',
            'ind_obligatorio' => 'Obligatorio',
            'ind_vence' => 'Vence',
            'ind_activo' => 'Activo',
        ];
    }

    public function getPrettyName() {
        return "Recaudo";
    }

}
