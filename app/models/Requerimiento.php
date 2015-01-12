<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Requerimiento
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $cod_item
 * @property string $cod_cta
 * @property string $tipo
 * @property integer $tipo_ayuda_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \TipoAyuda $tipoAyuda
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereNombre($value) 
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereDescripcion($value) 
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereCodItem($value) 
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereCodCta($value) 
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereTipo($value) 
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereTipoAyudaId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereUpdatedAt($value) 
 */
class Requerimiento extends BaseModel {

    protected $table = "requerimientos";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'nombre', 'descripcion', 'cod_item', 'cod_cta', 'tipo', 'tipo_ayuda_id', 
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'nombre'=>'required', 
'descripcion'=>'required', 
'cod_item'=>'required', 
'cod_cta'=>'required', 
'tipo'=>'required', 
'tipo_ayuda_id'=>'required|integer', 

    ];
    
    protected function getPrettyFields() {
        return [
            'nombre'=>'nombre', 
'descripcion'=>'descripcion', 
'cod_item'=>'cod_item', 
'cod_cta'=>'cod_cta', 
'tipo'=>'tipo', 
'tipo_ayuda_id'=>'tipo_ayuda_id', 

        ];
    }

    protected function getPrettyName() {
        return "requerimientos";
    }

    /**
* Define una relación pertenece a TipoAyuda
* @return TipoAyuda
*/
public function tipoAyuda(){
    return $this->belongsTo('TipoAyuda');
}


}
