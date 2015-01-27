<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Presupuesto
 *
 * @property integer $id
 * @property integer $solicitud_id
 * @property integer $requerimiento_id
 * @property integer $beneficiario_id
 * @property integer $cantidad
 * @property float $monto
 * @property string $estatus
 * @property integer $id_doc_proc
 * @property integer $id_sol_sum
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Solicitud $solicitud
 * @property-read \Requerimiento $requerimiento
 * @property-read \TipoRequerimiento $tipoRequerimiento
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereSolicitudId($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereRequerimientoId($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereNumBenef($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereCantidad($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereMonto($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereEstatus($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereIdDocProc($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereIdSolSum($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereUpdatedAt($value)
 */
class Presupuesto extends BaseModel implements DefaultValuesInterface, SimpleTableInterface, DecimalInterface {

    protected $table = "presupuestos";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'solicitud_id', 'requerimiento_id', 'beneficiario_id', 'cantidad', 'monto', 'estatus', 'id_doc_proc', 'id_sol_sum',
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'solicitud_id' => 'required|integer',
        'requerimiento_id' => 'required|integer',
        'beneficiario_id' => 'required|integer',
        'cantidad' => 'required|integer',
        'monto' => 'required',
        'estatus' => 'required',
        'id_doc_proc' => 'integer',
        'id_sol_sum' => 'integer',
    ];

    protected function getPrettyFields() {
        return [
            'solicitud_id' => 'Solicitud',
            'requerimiento_id' => 'Requerimiento',
            'beneficiario_id' => 'Beneficiario',
            'cantidad' => 'Cantidad',
            'monto' => 'Monto',
            'estatus' => 'Estatus',
            'id_doc_proc' => 'IdDoc proc',
            'id_sol_sum' => 'IdSol sum',
        ];
    }

    protected function getPrettyName() {
        return "presupuestos";
    }

    /**
     * Define una relación pertenece a Solicitud
     * @return Solicitud
     */
    public function solicitud() {
        return $this->belongsTo('Solicitud');
    }

    /**
     * Define una relación pertenece a Requerimiento
     * @return Requerimiento
     */
    public function requerimiento() {
        return $this->belongsTo('Requerimiento');
    }
   
    public function beneficiario() {
        return $this->belongsTo('Oracle\Beneficiario');
    }
    
    public function tipo_requerimiento_id(){
        return $this->requerimiento->id;
    }

    public function getTableFields() {
        return [
            'requerimiento->nombre', 'cantidad', 'monto', 'estatus'
        ];
    }
    
    public function getDefaultValues() {
        return [
            'estatus' => 'ELA'
        ];
    }
    
    public static function getDecimalFields() {
        return [
            'monto'
        ];
    }
    
    public function setMontoAttribute($value) {
        $this->attributes['monto'] = tf($value);
    }
    
    public function getMontoForAttribute($value) {
        return tm($value);
    }

}
