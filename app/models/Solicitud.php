<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Solicitud
 *
 * @property integer $id
 * @property integer $ano
 * @property string $descripcion
 * @property integer $persona_beneficiario_id
 * @property integer $persona_solicitante_id
 * @property integer $area_id
 * @property integer $referente_id
 * @property integer $recepcion_id
 * @property integer $organismo_id
 * @property boolean $ind_mismo_benef
 * @property boolean $ind_inmediata
 * @property boolean $ind_beneficiario_menor
 * @property string $actividad
 * @property string $referencia
 * @property string $accion_tomada
 * @property string $necesidad
 * @property string $tipo_proc
 * @property integer $num_proc
 * @property string $facturas
 * @property string $observaciones
 * @property string $moneda
 * @property string $estatus
 * @property integer $usuario_asignacion_id
 * @property integer $usuario_autorizacion_id
 * @property \Carbon\Carbon $fecha_solicitud
 * @property \Carbon\Carbon $fecha_asignacion
 * @property \Carbon\Carbon $fecha_aceptacion
 * @property \Carbon\Carbon $fecha_aprobacion
 * @property \Carbon\Carbon $fecha_cierre
 * @property integer $tipo_vivienda_id
 * @property integer $tenencia_id
 * @property string $informe_social
 * @property float $total_ingresos
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Persona $personaBeneficiario
 * @property-read \Persona $personaSolicitante
 * @property-read \Area $area
 * @property-read \Referente $referente
 * @property-read \Recepcion $recepcion
 * @property-read \Organismo $organismo
 * @property-read \UsuarioAsignacion $usuarioAsignacion
 * @property-read \UsuarioAutorizacion $usuarioAutorizacion
 * @property-read \TipoVivienda $tipoVivienda
 * @property-read \Tenencia $tenencia
 * @property-read \Illuminate\Database\Eloquent\Collection|\FamiliaPersona[] $familiaPersonas
 * @property-read \Illuminate\Database\Eloquent\Collection|\Presupuesto[] $presupuestos
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereAno($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereDescripcion($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud wherePersonaBeneficiarioId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud wherePersonaSolicitanteId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereAreaId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereReferenteId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereRecepcionId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereOrganismoId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereIndMismoBenef($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereIndInmediata($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereIndBeneficiarioMenor($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereActividad($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereReferencia($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereAccionTomada($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereNecesidad($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereTipoProc($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereNumProc($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereFacturas($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereObservaciones($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereMoneda($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereEstatus($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereUsuarioAsignacionId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereUsuarioAutorizacionId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereFechaSolicitud($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereFechaAsignacion($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereFechaAceptacion($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereFechaAprobacion($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereFechaCierre($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereTipoViviendaId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereTenenciaId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereInformeSocial($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereTotalIngresos($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereUpdatedAt($value)
 * @property integer $memo_id
 * @property string $beneficiario_json
 * @property string $solicitante_json
 * @property integer $departamento_id
 * @property-read \Departamento $departamento
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bitacora[] $bitacoras
 * @property-read \Illuminate\Database\Eloquent\Collection|\RecaudoSolicitud')->orderBy('id[] $recaudosSolicitud
 * @property-read \Illuminate\Database\Eloquent\Collection|\FotoSolicitud')->orderBy('id[] $fotos
 * @property-read mixed $total_ingresos_for
 * @property-read mixed $estatus_display
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereMemoId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereBeneficiarioJson($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereSolicitanteJson($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereDepartamentoId($value)
 * @method static \Solicitud ordenar()
 * @method static \Solicitud aplicarFiltro($filtro)
 * @method static \Solicitud eagerLoad()
 */
class Solicitud extends BaseModel implements DefaultValuesInterface, SimpleTableInterface, DecimalInterface {

    protected $table = "solicitudes";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'ano', 'descripcion', 'persona_beneficiario_id', 'persona_solicitante_id',
        'area_id', 'referente_id', 'recepcion_id', 'organismo_id',
        'ind_mismo_benef', 'ind_inmediata', 'actividad', 'referencia',
        'accion_tomada', 'necesidad', 'tipo_proc', 'num_proc', 'facturas',
        'observaciones', 'moneda', 'estatus', 'usuario_asignacion_id',
        'usuario_autorizacion_id', 'fecha_solicitud', 'fecha_asignacion',
        'fecha_aceptacion', 'fecha_aprobacion', 'fecha_cierre', 'ind_beneficiario_menor',
        'tipo_vivienda_id', 'tenencia_id', 'informe_social', 'total_ingresos',
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save,
     * si el modelo no cumple con estas reglas el metodo save retornará false,
     * y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'ano' => 'required|integer',
        'descripcion' => 'required',
        'persona_beneficiario_id' => 'integer',
        'persona_solicitante_id' => 'integer',
        'area_id' => 'required|integer',
        'referente_id' => 'required|integer',
        'recepcion_id' => 'required|integer',
        'organismo_id' => 'required|integer',
        'ind_mismo_benef' => 'required',
        'ind_inmediata' => 'required',
        'ind_beneficiario_menor' => 'required',
        'actividad' => '',
        'referencia' => '',
        'accion_tomada' => '',
        'necesidad' => 'required',
        'tipo_proc' => '',
        'num_proc' => 'integer',
        'facturas' => '',
        'observaciones' => '',
        'moneda' => 'required',
        'estatus' => 'required',
        'usuario_asignacion_id' => 'integer',
        'usuario_autorizacion_id' => 'integer',
        'fecha_solicitud' => 'required',
        'fecha_asignacion' => '',
        'fecha_aceptacion' => '',
        'fecha_aprobacion' => '',
        'fecha_cierre' => '',
        'tipo_vivienda_id' => 'integer',
        'tenencia_id' => 'integer',
        'informe_social' => '',
        'total_ingresos' => '',
    ];
    protected $dates = ['fecha_solicitud', 'fecha_asignacion', 'fecha_aceptacion',
        'fecha_aprobacion', 'fecha_cierre'];
    public static $tipo_procesamientos = [
        'P' => 'Punto de Cuenta',
        'M' => 'Memo',
    ];

    protected function getPrettyFields() {
        return [
            'id' => 'Numero Solicitud',
            'ano' => 'Año',
            'descripcion' => 'Descripción',
            'persona_beneficiario_id' => 'Beneficiario',
            'persona_solicitante_id' => 'Solicitante',
            'area_id' => 'Area',
            'referente_id' => 'Referido por',
            'recepcion_id' => 'Recepción',
            'organismo_id' => 'Procesado por',
            'ind_mismo_benef' => 'Solicitante es el mismo Beneficiario?',
            'ind_inmediata' => 'Atención inmediata?',
            'ind_beneficiario_menor' => 'El beneficiario es menor de edad sin CI?',
            'actividad' => 'Actividad',
            'referencia' => 'Referencia',
            'accion_tomada' => 'Acción Tomada',
            'necesidad' => 'Necesidad',
            'tipo_proc' => 'Tipo de procesamiento',
            'tipo_proc_for' => 'Tipo de procesamiento',
            'num_proc' => 'Número de procesamiento',
            'facturas' => 'Facturas',
            'observaciones' => 'Observaciones',
            'moneda' => 'Moneda',
            'estatus' => 'Estatus',
            'estatus_display' => 'Estatus',
            'usuario_asignacion_id' => 'Analista',
            'usuario_autorizacion_id' => 'Autorizado por',
            'fecha_solicitud' => 'Fecha de solicitud',
            'fecha_asignacion' => 'Fecha de asignación',
            'fecha_aceptacion' => 'Fecha de aceptación',
            'fecha_aprobacion' => 'Fecha de aprobación',
            'fecha_cierre' => 'Fecha cierre',
            'tipo_vivienda_id' => 'Tipo de vivienda',
            'tenencia_id' => 'Tenencia',
            'informe_social' => 'Informe social',
            'total_ingresos' => 'Total de ingresos',
            'departamento_id' => 'Departamento',
        ];
    }

    public function __construct(array $values = []) {
        $this->ind_mismo_benef = true;
        parent::__construct($values);
    }

    public function getPrettyName() {
        return "solicitudes";
    }

    /**
     * Define una relación pertenece a PersonaBeneficiario
     * @return PersonaBeneficiario
     */
    public function personaBeneficiario() {
        return $this->belongsTo('Persona');
    }

    /**
     * Define una relación pertenece a PersonaSolicitante
     * @return PersonaSolicitante
     */
    public function personaSolicitante() {
        return $this->belongsTo('Persona');
    }

    /**
     * Define una relación pertenece a Area
     * @return Area
     */
    public function area() {
        return $this->belongsTo('Area');
    }

    /**
     * Define una relación pertenece a Referente
     * @return Referente
     */
    public function referente() {
        return $this->belongsTo('Referente');
    }

    /**
     * Define una relación pertenece a Recepcion
     * @return Recepcion
     */
    public function recepcion() {
        return $this->belongsTo('Recepcion');
    }

    /**
     * Define una relación pertenece a Organismo
     * @return Organismo
     */
    public function organismo() {
        return $this->belongsTo('Organismo');
    }

    /**
     * Define una relación pertenece a UsuarioAsignacion
     * @return UsuarioAsignacion
     */
    public function usuarioAsignacion() {
        return $this->belongsTo('Usuario');
    }

    /**
     * Define una relación pertenece a UsuarioAutorizacion
     * @return UsuarioAutorizacion
     */
    public function usuarioAutorizacion() {
        return $this->belongsTo('Usuario');
    }

    /**
     * Define una relación pertenece a TipoVivienda
     * @return TipoVivienda
     */
    public function tipoVivienda() {
        return $this->belongsTo('TipoVivienda');
    }

    /**
     * Define una relación pertenece a Tenencia
     * @return Tenencia
     */
    public function tenencia() {
        return $this->belongsTo('Tenencia');
    }
    
    /**
     * Define una relación pertenece a Departamento
     * @return Departamento
     */
    public function departamento() {
        return $this->belongsTo('Departamento');
    }

    public function familiaPersonas() {
        return $this->hasMany('FamiliaPersona');
    }

    public function presupuestos() {
        return $this->hasMany('Oracle\Presupuesto');
    }

    public function bitacoras() {
        return $this->hasMany('Bitacora');
    }

    public function recaudosSolicitud() {
        return $this->hasMany('RecaudoSolicitud')->orderBy('id');
    }

    public function fotos() {
        return $this->hasMany('FotoSolicitud')->orderBy('id');
    }

    public function setFechaAsignacionAttribute($value) {
        if ($value != "") {
            $this->attributes['fecha_asignacion'] = Carbon::createFromFormat('d/m/Y', $value);
        }
    }

    public function setFechaAceptacionAttribute($value) {
        if ($value != "") {
            $this->attributes['fecha_aceptacion'] = Carbon::createFromFormat('d/m/Y', $value);
        }
    }

    public function setFechaAprobacionAttribute($value) {
        if ($value != "") {
            $this->attributes['fecha_aprobacion'] = Carbon::createFromFormat('d/m/Y', $value);
        }
    }

    public function setFechaCierreAttribute($value) {
        if ($value != "") {
            $this->attributes['fecha_cierre'] = Carbon::createFromFormat('d/m/Y', $value);
        }
    }

    public function ingresoFamiliar() {
        return $this->personaBeneficiario->familiaresBeneficiario()->sum('ingreso_mensual');
    }

    public function getTotalIngresosAttribute() {
        if (is_null($this->attributes['total_ingresos'])) {
            return $this->personaBeneficiario->ingreso_mensual + $this->ingresoFamiliar();
        }
        return $this->attributes['total_ingresos'];
    }

    public function getDefaultValues() {
        return [
            'ano' => Carbon::now()->format('Y'),
            'fecha_solicitud' => Carbon::now(),
            'estatus' => 'ELA',
            'ind_mismo_benef' => false,
            'moneda' => 'VEF'
        ];
    }

    public function reglasCreacion() {
        $this->rules = [
            'ind_mismo_benef' => 'required',
            'persona_solicitante_id' => 'required_if:ind_mismo_benef,0',
            'persona_beneficiario_id' => 'required',
            'ind_beneficiario_menor' => 'required',
        ];
    }

    public static function crear(array $values) {
        $solicitud = new Solicitud();
        $solicitud->fill($values);
        $solicitud->reglasCreacion();
        if ($solicitud->ind_beneficiario_menor == "1") {
            $solicitud->ind_mismo_benef = false;
        }
        if ($solicitud->ind_mismo_benef == "1") {
            $solicitud->persona_solicitante_id = $solicitud->persona_beneficiario_id;
        }
        $solicitud->estatus = "ELA";
        $solicitud->validate();
        return $solicitud;
    }

    public function createdModel($model) {
        $recaudos = Recaudo::whereIndActivo(true)->get();
        $recaudos->each(function ($recaudo) use ($model) {
            $recSolicitud = new RecaudoSolicitud();
            $recSolicitud->solicitud()->associate($model);
            $recSolicitud->recaudo()->associate($recaudo);
            $recSolicitud->save();
        });
        Bitacora::registrar('Se registró la solicitud.', $model->id);
    }

    ////
    public function getTableFields() {
        return [
            'ano',
            'descripcion',
            'fecha_solicitud',
            'estatus'
        ];
    }

    public static function getDecimalFields() {
        return [
            'total_ingresos'
        ];
    }

    public function setTotalIngresosAttribute($value) {
        $this->attributes['total_ingresos'] = tf($value);
    }

    public function getTotalIngresosForAttribute() {
        return tm($this->total_ingresos);
    }

    public function scopeOrdenar($query) {
        return $query->orderBy('ind_inmediata', 'DESC')->orderBy('id','DESC');
    }

    public function scopeAplicarFiltro($query, $filtro) {
        if (isset($filtro['estatus'])) {
            if (is_array($filtro['estatus'])) {
                $query->whereIn('estatus', $filtro['estatus']);
            } else {
                $query->whereEstatus($filtro['estatus']);
            }
        }
        if (isset($filtro['solo_asignadas'])) {
            $query->whereUsuarioAsignacionId(\Cartalyst\Sentry\Facades\Laravel\Sentry::getUser()->id);
        }
        if(isset($filtro['departamento_id'])){
            $query->whereDepartamentoId($filtro['departamento_id']);
        }
        return $query;
    }

    public function scopeEagerLoad($query) {
        return $query->with('organismo')
                        ->with('personaSolicitante')
                        ->with('personaBeneficiario')
                        ->with('usuarioAutorizacion')
                        ->with('usuarioAsignacion')
                        ->with('area.tipoAyuda');
    }

    public function afterValidate() {
        if (is_object($this->organismo) && $this->organismo->ind_externo && $this->estatus != "ANU") {
            $this->estatus = "REF";
        } else if ($this->estatus == "REF") {
            $this->estatus = "ELA";
        }
    }

    public function asignarDepartamento($departamento_id, $memo) {
        $usuario = Usuario::getLogged();
        if($departamento_id == $usuario->departamento_id){
            $this->addError('departamento_id', 'No puedes asignar la solicitud al mismo departamento al cual permaneces');
        } else if ($this->estatus == "ELA") {
            $this->departamento_id = $departamento_id;
            $this->estatus = "ELD";
            //despues que se asigna el modelo retorna lo que esta en BD.
            $this->total_ingresos = tm($this->total_ingresos);
            $this->memo_id = $memo->id;
            $this->save();
            Bitacora::registrar("Se asigno la solicitud al departamento: " . $this->departamento->nombre, $this->id);
        }else{
            $this->addError('estatus', 'La solicitud ' . $this->id . ' no esta en estatus ' . static::$estatusArray['ELA']);
        }

    }

    public function asignarAnalista($encargado_id) {
        if ($this->estatus == "ELD") {
            $this->usuario_asignacion_id = $encargado_id;
            $this->estatus = "EAA";
            $this->fecha_aceptacion = \Carbon\Carbon::now()->format('d/m/Y');
            $this->save();
            Bitacora::registrar("Se asignó la solicitud al analista: " .
                $this->usuarioAsignacion->nombre, $this->id);
        }else{
            $this->addError('estatus', 'La solicitud ' . $this->id . ' no esta en estatus ' . static::$estatusArray['ELD']);
        }
    }

    public static function asignar(array $values) {
        //se usa para los message bags
        $mensajes = new Solicitud();
        if (!isset($values['solicitudes'])) {
            $mensajes->addError('solicitudes', 'Debes seleccionar al menos una solicitud');
            return $mensajes;
        }
        $rules = [
            'departamento_id' => 'required_if:campo,departamento',
            'usuario_asignacion_id' => 'required_if:campo,usuario',
            'campo' => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);
        $validator->setAttributeNames($mensajes->getPrettyFields());
        if ($validator->passes()) {
            $solicitudes = Solicitud::findMany($values['solicitudes']);
            if ($values['campo'] == "departamento") {
                $memo = \Memo::crear($values);
                $solicitudes->each(function($solicitud) use ($values, $mensajes, $memo) {
                    $solicitud->asignarDepartamento($values['departamento_id'], $memo);
                    //si salieron errores hacemos un merge
                    $mensajes->errors->merge($solicitud->errors);
                });
            } else if ($values['campo'] == "usuario") {
                $solicitudes->each(function($solicitud) use ($values, $mensajes) {
                    $solicitud->asignarAnalista($values['usuario_asignacion_id']);
                    //si salieron errores hacemos un merge
                    $mensajes->errors->merge($solicitud->errors);
                });
            }
        }else{
            $mensajes->setErrors($validator->messages());
        }
        return $mensajes;
    }

    public function anular($nota) {
        if ($this->estatus == "ELA" || $this->estatus == "REF") {
            $this->estatus = "ANU";
            $this->save();
            Bitacora::registrar($nota, $this->id);
            return true;
        }
        $this->addError('estatus', 'La solicitud ' . $this->id . ' no esta en el estatus correcto');
        return false;
    }

    public function aceptarAsignacion($num_proc) {
        if ($this->puedeAceptarAsignacion()) {
            $this->estatus = "ACA";
            $this->fecha_aceptacion = \Carbon\Carbon::now()->format('d/m/Y');
            Bitacora::registrar('El analista aceptó la solicitud', $this->id);
            $this->configurarPresupuesto($num_proc);
            return !$this->hasErrors();
        }
        $this->addError('estatus', 'La solicitud ' . $this->id . ' no esta en el estatus correcto');
        return false;
    }

    public function configurarPresupuesto($num_proc, $salvar = true) {
        $monto_maximo = Configuracion::get('monto_maximo_memo');
        $monto_presupuesto = $this->presupuestos()->sum('monto');
        //Tipo es M
        if ($monto_maximo > $monto_presupuesto) {
            $this->tipo_proc = "M";
        } else {
            $this->tipo_proc = "P";
        }
        $secuencia_auto = Configuracion::get('ind_secuencia_automatica');
        if ($secuencia_auto == "Si" && $this->tipo_proc == "M") {
            $proximo = Configuracion::get('secuencia_memo_presupuesto');
            $this->num_proc = $proximo;
            if ($salvar) {
                Configuracion::set('secuencia_memo_presupuesto', $proximo + 1);
            }
        } else if ($secuencia_auto == "Si") {
            $proximo = Configuracion::get('secuencia_memo_punto_cuenta');
            if ($salvar) {
                Configuracion::set('secuencia_memo_punto_cuenta', $proximo + 1);
            }
            $this->num_proc = $proximo;
        } else if ($num_proc != "") {
            $this->num_proc = $num_proc;
        } else if ($salvar) {
            $this->addError('num_proc', "Debe indicar el número de proceso");
        }
        if (!$this->hasErrors() && $salvar) {
            $this->save();
        }
    }

    public function devolverAsignacion() {
        if ($this->puedeDevolverAsignacion()) {
            $this->estatus = "EAA";
            $this->fecha_aceptacion = null;
            $this->tipo_proc = null;
            $this->num_proc = null;
            $this->save();
            Bitacora::registrar('El analista devolvio la aceptación de la solicitud', $this->id);
            return true;
        }
        $this->addError('estatus', 'La solicitud ' . $this->id . ' no esta en el estatus correcto');
        return false;
    }

    public function solicitarAprobacion($autorizador_id) {
        if ($this->puedeSolicitarAprobacion() && $autorizador_id!='') {
            $descripcion = 'Caso N°: '.$this->id.' Beneficiario: '.$this->personaBeneficiario->nombre.' '.$this->personaBeneficiario->apellido.' C.I.:'.$this->personaBeneficiario->ci.' '.$this->descripcion;
            \Ayudantes\Packages\Sasyc::aprobar($this->id, $descripcion);
            $this->estatus = 'EAP';
            $this->usuario_autorizacion_id = $autorizador_id;
            $this->beneficiario_json = json_encode($this->personaBeneficiario->toArray());
            if (is_object($this->personaSolicitante)) {
                $this->solicitante_json = json_encode($this->personaSolicitante->toArray());
            }
            $this->save();
            Bitacora::registrar('Se solicitó la aprobación de la solicitud correctamente', $this->id);
            return true;
        }else if($autorizador_id==''){
            $this->addError('estatus', 'Debes seleccionar el autorizador');
        }else{
            $this->addError('estatus', 'La solicitud ' . $this->id . ' no esta en el estatus correcto');
        }
        return false;
    }

    public function getBeneficiario(){
        if($this->puedeModificar()){
            return $this->personaBeneficiario;
        }else{
            return new Persona(json_decode($this->beneficiario_json));
        }
    }

    public function getSolicitante(){
        if($this->puedeModificar()){
            return $this->personaSolicitante;
        }else{
            return new Persona(json_decode($this->solicitante_json));
        }
    }

    public function puedeAceptarAsignacion() {
        return $this->estatus == "EAA";
    }

    public function puedeDevolverAsignacion() {
        return $this->estatus == "ACA";
    }

    public function puedeSolicitarAprobacion() {
        return $this->estatus == "ACA";
    }

    public function puedeCerrar() {
        return $this->estatus == "APR";
    }

    public function puedeModificar() {
        $arr = ['ELA', 'REF', 'ELD', 'EAA', 'ACA', 'EAP'];
        return in_array($this->estatus, $arr);
    }

    public function puedeModificarFamiliarEconomico() {
        return $this->estatus=="ACA";
    }

    public function reglasInforme() {
        $this->rules = [
            'tipo_vivienda_id' => 'required|integer',
            'tenencia_id' => 'required|integer',
        ];
    }

    ////////////////////////////////////////////////////////////////////////
    public function cerrar() {
        if ($this->puedeCerrar()) {
            $this->estatus = "CER";
            $this->save();
            return true;
        }
        $this->addError('estatus', 'La solicitud ' . $this->id . ' no esta en el estatus correcto');
        return false;
    }

    public function getTipoProcForAttribute() {
        if ($this->tipo_proc != null) {
            return static::$tipo_procesamientos[$this->tipo_proc];
        } else {
            return "";
        }
    }

}
