<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Presupuesto
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property integer $solicitud_id
 * @property integer $requerimiento_id
 * @property integer $tipo_requerimiento_id
 * @property string $cod_item
 * @property string $cod_cta
 * @property integer $num_benef
 * @property integer $cantidad
 * @property float $monto
 * @property string $estatus
 * @property integer $id_doc_proc
 * @property integer $id_sol_sum
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Solicitud $solicitud
 * @property-read \Requerimiento $requerimiento
 * @property-read \TipoRequerimiento $tipoRequerimiento
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereSolicitudId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereRequerimientoId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereTipoRequerimientoId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereCodItem($value) 
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereCodCta($value) 
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereNumBenef($value) 
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereCantidad($value) 
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereMonto($value) 
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereEstatus($value) 
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereIdDocProc($value) 
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereIdSolSum($value) 
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereUpdatedAt($value) 
 */
class Presupuesto extends BaseModel {

    protected $table = "presupuestos";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'solicitud_id', 'requerimiento_id', 'tipo_requerimiento_id', 'cod_item', 'cod_cta', 'num_benef', 'cantidad', 'monto', 'estatus', 'id_doc_proc', 'id_sol_sum', 
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
            'solicitud_id'=>'solicitud_id', 
'requerimiento_id'=>'requerimiento_id', 
'tipo_requerimiento_id'=>'tipo_requerimiento_id', 
'cod_item'=>'cod_item', 
'cod_cta'=>'cod_cta', 
'num_benef'=>'num_benef', 
'cantidad'=>'cantidad', 
'monto'=>'monto', 
'estatus'=>'estatus', 
'id_doc_proc'=>'id_doc_proc', 
'id_sol_sum'=>'id_sol_sum', 

        ];
    }

    protected function getPrettyName() {
        return "presupuestos";
    }

    /**
* Define una relación pertenece a Solicitud
* @return Solicitud
*/
public function solicitud(){
    return $this->belongsTo('Solicitud');
}
/**
* Define una relación pertenece a Requerimiento
* @return Requerimiento
*/
public function requerimiento(){
    return $this->belongsTo('Requerimiento');
}
/**
* Define una relación pertenece a TipoRequerimiento
* @return TipoRequerimiento
*/
public function tipoRequerimiento(){
    return $this->belongsTo('TipoRequerimiento');
}


}
