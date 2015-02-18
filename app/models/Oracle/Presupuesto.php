<?php namespace Oracle;

class Presupuesto extends OracleBaseModel implements \SimpleTableInterface, \DecimalInterface {

    protected $sequence = "presupuestos_id_seq";
    public $timestamps = true;
    protected $table = "presupuestos";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'solicitud_id', 'requerimiento_id', 'beneficiario_id', 'cantidad', 'monto'
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
        //kerux
        'ccosto' => 'max:10',
        'cod_acc_int' => 'max:7',
        'cod_cta' => 'max:14',
        'cod_item' => 'max:10',
        'desc_requerimiento' => 'max:500',
        'documento_id' => 'integer',
        'moneda' => 'max:3',
        'tipo_reng' => 'max:4',
        'beneficiario_id' => 'required_if:codigo_requerimiento,OP|integer',
        //fin kerux
        'cantidad' => 'required_if:codigo_requerimiento,OP|required_if:codigo_requerimiento,ALM',
        'monto' => 'required_if:codigo_requerimiento,OP|required_if:codigo_requerimiento,FDEL',
    ];

    protected $appends = ['codigo_requerimiento'];

    protected function getPrettyFields() {
        return [
            'solicitud_id' => 'Solicitud',
            'requerimiento_id' => 'Requerimiento',
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
            'monto' => 'Monto',
            'montofor' => 'Monto',
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
    public function requerimiento() {
        return $this->belongsTo('Requerimiento');
    }

    public function beneficiario() {
        return $this->belongsTo('Oracle\Beneficiario');
    }

    public function documento() {
        return $this->belongsTo('Oracle\Documento');
    }

    public function tipo_requerimiento_id() {
        return $this->requerimiento->id;
    }

    public function getTableFields() {
        return [
            'requerimiento->nombre', 'beneficiario->nombre', 'cantidad', 'montofor', 'documento_id','documento->estatus'
        ];
    }

    public static function getDecimalFields() {
        return [
            'monto'
        ];
    }

    public function savingModel($model){
        //Se preparan los datos para guardarlos en oracle
        $this->ccosto = \Configuracion::get('ccosto');
        $this->cod_acc_int = $this->solicitud->area->tipoAyuda->cod_acc_int;
        $this->cod_cta = $this->requerimiento->cod_cta;
        $this->cod_item = $this->requerimiento->cod_item;
        $this->desc_requerimiento = $this->requerimiento->nombre;
        $this->moneda = \Configuracion::get('moneda_presupuesto');
        $this->tipo_reng = $this->requerimiento->tipoRequerimiento->codigo;
        return parent::savingModel($model);
    }

    public function setMontoAttribute($value) {
        $this->attributes['monto'] = tf($value);
    }

    public function getMontoForAttribute() {
        return tm($this->monto);
    }

    public function getCodigoRequerimientoAttribute(){
        return $this->requerimiento->tipoRequerimiento->codigo;
    }

}
