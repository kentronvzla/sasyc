<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * TipoAyuda
 *
 * @property integer $id
 * @property string $nombre
 * @property string $cod_acc_int
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\TipoAyuda whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoAyuda whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoAyuda whereCodAccInt($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoAyuda whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoAyuda whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoAyuda whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Area[] $areas 
 * @property-read mixed $estatus_display 
 */
class TipoAyuda extends BaseModel implements SimpleTableInterface {

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
            'nombre' => 'Tipo de ayuda',
            'cod_acc_int' => 'Acción interna',
        ];
    }

    public function getPrettyName() {
        return "Tipos de ayuda";
    }

    public function areas() {
        return $this->hasMany('Area');
    }

}
