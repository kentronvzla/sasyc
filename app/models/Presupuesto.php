<?php

class Presupuesto extends BaseModel implements \SimpleTableInterface, \DecimalInterface {

    private static $estatusModificacion = [
        'ELA', 'ELD', 'REF', 'EAA','ACA'
    ];

    protected $table = "presupuestos";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'solicitud_id', 'requerimiento_id','proceso_id', 'beneficiario_id', 'cantidad', 'monto', 'montoapr'
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
        'proceso_id' => 'required|integer',
        //kerux
        'ccosto' => 'max:10',
        'cod_acc_int' => 'max:7',
        'cod_cta' => 'max:14',
        'cod_item' => 'max:10',
        'desc_requerimiento' => 'max:500',
        'documento_id' => 'integer',
        'moneda' => 'max:3',
        'tipo_reng' => 'max:4',
        'beneficiario_id' => '',
        //fin kerux
        'cantidad' => '',
        'monto' => '',
        'montoapr' => '',
    ];

    protected function getPrettyFields() {
        return [
            'solicitud_id' => 'Solicitud',
            'requerimiento_id' => 'Requerimiento',
            'proceso_id' => 'Proceso',
            //kerux
            'ccosto' => 'Centro de Costo',
            'cod_acc_int' => 'Código Acción Interna',
            'cod_cta' => 'Código de Cuenta',
            'cod_item' => 'Código de Item',
            'desc_requerimiento' => 'Descripción',
            'documento_id' => 'ID Doc',
            'moneda' => 'Moneda',
            'tipo_reng' => 'Tipo Requerimiento (Código)',
            'beneficiario_id' => 'Beneficiario',
            //fin kerux
            'cantidad' => 'Cantidad',
            'monto' => 'Mto. Solicitado',
            'montofor' => 'Monto',
            'montoapr' => 'Mto. Aprobado',
            'montoaprfor' => 'Monto aprobado',
        ];
    }

    public function getPrettyName() {
        return "Presupuesto";
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
    public function proceso() {
        return $this->belongsTo('Proceso');
    }

    public function requerimiento() {
        return $this->belongsTo('Requerimiento');
    }

    public function beneficiario() {
        return $this->belongsTo('Oracle\Beneficiario');
    }

    public function documento() {
        return $this->belongsTo('Oracle\Documento');
    }

    public function getTableFields() {
        return [
            'requerimiento->nombre','proceso->nombre', 'beneficiario->nombre', 'cantidad', 'documento_id', 'documento->estatus', 'montoapr'
        ];
    }

    public static function getDecimalFields() {
        return [
            'monto', 'montoapr'
        ];
    }

    public function savingModel($model){
        if($this->puedeModificarEliminar()){
            $this->moneda = \Configuracion::get('moneda_presupuesto');
            return parent::savingModel($model);
        }
        $this->addError('estatus','No se puede modificar/crear el presupuesto. La solicitud no esta en el estatus correcto');
        return false;
    }

    public function validate($model = null){
        if(parent::validate()){
            $proceso = $this->proceso;
            if($proceso->ind_beneficiario && $this->beneficiario_id==""){
                $this->addError('beneficiario_id', 'El beneficiario es necesario');
            }
            if($proceso->ind_monto){
                if($this->monto==""){            
                $this->addError('monto', 'El monto es necesario');
                }
                if($this->monto==""){
                $this->addError('montoapr', 'El monto aprobado es necesario');
                }
            }
            if($proceso->ind_cantidad && $this->cantidad=="") {
                $this->addError('cantidad', 'La cantidad es necesaria');
            }
        }
        return !$this->hasErrors();
    }

    public function setMontoAttribute($value) {
        $this->attributes['monto'] = tf($value);
    }

    public function getMontoForAttribute() {
        return tm($this->monto);
    }

       public function setMontoaprAttribute($value) {
        $this->attributes['montoapr'] = tf($value);
    }

    public function getMontoaprForAttribute() {
        return tm($this->montoapr);
    }
    
    public function deletingModel($model){
        if($this->puedeModificarEliminar()){
            return true;
        }
        $this->addError('estatus','No se puede eliminar el presupuesto. La solicitud no esta en el estatus correcto');
        return false;
    }

    private function puedeModificarEliminar(){
        $stsSolicitud = $this->solicitud->estatus;
        return in_array($stsSolicitud, static::$estatusModificacion);
    }

}
