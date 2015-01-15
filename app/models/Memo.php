<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Memo
 *
 * @property integer $id
 * @property string $fecha
 * @property string $numero
 * @property string $origen
 * @property string $destino
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Memo whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Memo whereFecha($value) 
 * @method static \Illuminate\Database\Query\Builder|\Memo whereNumero($value) 
 * @method static \Illuminate\Database\Query\Builder|\Memo whereOrigen($value) 
 * @method static \Illuminate\Database\Query\Builder|\Memo whereDestino($value) 
 * @method static \Illuminate\Database\Query\Builder|\Memo whereVersion($value) 
 * @method static \Illuminate\Database\Query\Builder|\Memo whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\Memo whereUpdatedAt($value) 
 */
class Memo extends BaseModel {

    protected $table = "memos";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'fecha', 'numero', 'origen', 'destino',
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, 
     * y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'fecha'=>'required', 
'numero'=>'required', 
'origen'=>'required', 
'destino'=>'required', 

    ];

    protected function getPrettyFields() {
        return [
            'fecha' => 'Fecha',
            'numero' => 'Número',
            'origen' => 'Origen',
            'destino' => 'Destino',
        ];
    }

    protected function getPrettyName() {
        return "memos";
    }

}
