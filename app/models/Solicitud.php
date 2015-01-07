<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Solicitud
 *
 * @author Nadin Yamani
 */
class Solicitud extends BaseModel implements DefaultValuesInterface {

    protected $table = "solicitudes";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'ano', 'descripcion', 'persona_beneficiario_id', 'persona_solicitante_id',
        'tipo_ayuda_id', 'area_id', 'referente_id', 'recepcion_id', 'organismo_id',
        'ind_mismo_benef', 'ind_inmediata', 'actividad', 'referencia',
        'accion_tomada', 'necesidad', 'tipo_proc', 'num_proc', 'facturas',
        'observaciones', 'moneda', 'prioridad', 'estatus', 'usuario_asignacion_id',
        'usuario_autorizacion_id', 'fecha_solicitud', 'fecha_asignacion',
        'fecha_aceptacion', 'fecha_aprobacion', 'fecha_cierre',
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
        'persona_beneficiario_id' => 'required|integer',
        'persona_solicitante_id' => 'integer',
        'tipo_ayuda_id' => 'required|integer',
        'area_id' => 'required|integer',
        'referente_id' => 'required|integer',
        'recepcion_id' => 'required|integer',
        'organismo_id' => 'required|integer',
        'ind_mismo_benef' => 'required',
        'ind_inmediata' => 'required',
        'actividad' => '',
        'referencia' => '',
        'accion_tomada' => '',
        'necesidad' => 'required',
        'tipo_proc' => '',
        'num_proc' => 'integer',
        'facturas' => '',
        'observaciones' => '',
        'moneda' => 'required',
        'prioridad' => 'required|integer',
        'estatus' => 'required',
        'usuario_asignacion_id' => 'integer',
        'usuario_autorizacion_id' => 'integer',
        'fecha_solicitud' => 'required',
        'fecha_asignacion' => '',
        'fecha_aceptacion' => '',
        'fecha_aprobacion' => '',
        'fecha_cierre' => '',
    ];
    
    protected $dates = ['fecha_solicitud','fecha_asignacion','fecha_aceptacion','fecha_aprobacion','fecha_cierre'];

    protected function getPrettyFields() {
        return [
            'ano' => 'Año',
            'descripcion' => 'Descripción',
            'persona_beneficiario_id' => 'Beneficiario',
            'persona_solicitante_id' => 'Solicitante',
            'tipo_ayuda_id' => 'Tipo de ayuda',
            'area_id' => 'Area',
            'referente_id' => 'Referido por',
            'recepcion_id' => 'Recepción',
            'organismo_id' => 'Procesado por',
            'ind_mismo_benef' => 'Mismo beneficiario?',
            'ind_inmediata' => 'Atención inmediata?',
            'actividad' => 'Actividad',
            'referencia' => 'Referencia',
            'accion_tomada' => 'Acción Tomada',
            'necesidad' => 'Necesidad',
            'tipo_proc' => 'Tipo de procesamiento',
            'num_proc' => 'Número de procesamiento',
            'facturas' => 'Facturas',
            'observaciones' => 'Observaciones',
            'moneda' => 'Moneda',
            'prioridad' => 'Prioridad',
            'estatus' => 'Estatus',
            'usuario_asignacion_id' => 'Analista',
            'usuario_autorizacion_id' => 'Autorizado por',
            'fecha_solicitud' => 'Fecha de solicitud',
            'fecha_asignacion' => 'Fecha de asignación',
            'fecha_aceptacion' => 'Fecha de aceptación',
            'fecha_aprobacion' => 'Fecha de aprobación',
            'fecha_cierre' => 'Fecha cierre',
        ];
    }

    protected function getPrettyName() {
        return "solicitudes";
    }

    public function referente() {
        return $this->belongsTo('Referente', 'referente_id');
    }

    public function recepcion() {
        return $this->belongsTo('Recepcion', 'recepcion_id');
    }

    public function tipoAyuda() {
        return $this->belongsTo('TipoAyuda', 'tipo_ayuda_id');
    }

    public function area() {
        return $this->belongsTo('Area', 'area_id');
    }

    public function organismo() {
        return $this->belongsTo('Organismo', 'organismo_id');
    }

    public function getDefaultValues() {
        return [
            'ano' => Carbon::now()->format('Y'),
            'fecha_solicitud'=>Carbon::now(),
            'estatus'=>'ELA',
            'ind_mismo_benef'=>false,
            'moneda'=>'VEF',
            'persona_beneficiario_id'=>1,
            'prioridad'=>1,
        ];
    }

}
