<div class="row">
    <div class="col-xs-12 col-sm-10 col-md-10">
        <h4>Número de Solicitud: <span id='span-solicitud-id'>{{$solicitud->id}}</span></h4> 
    </div>
    <div class="col-md-2">
        <h5>Estatus: <b>{{$solicitud->estatus_display}}</b></h5>
    </div>
</div>
@include('templates.errores')
{{Form::hidden('id',$solicitud->id, ['id'=>'id'])}}
{{Form::hidden('persona_beneficiario_id',$solicitud->persona_beneficiario_id, ['id'=>'persona_beneficiario_id'])}}
{{Form::hidden('persona_solicitante_id',$solicitud->persona_solicitante_id, ['id'=>'persona_solicitante_id'])}}
{{Form::hidden('ind_beneficiario_menor',$solicitud->ind_beneficiario_menor, ['id'=>'ind_beneficiario_menor'])}}
{{Form::hidden('ind_mismo_benef',$solicitud->ind_mismo_benef, ['id'=>'ind_mismo_benef'])}}
<div class="row">
    {{Form::btInput($solicitud,'descripcion',12)}}
</div>
<div class="row">
    {{Form::btInput($solicitud,'ind_inmediata',6)}}
    {{Form::btInput($solicitud,'referente_id',6)}}
</div>
<div id='div-inmediata'>
    <div class="row">
        {{Form::btInput($solicitud,'actividad',12,'textarea')}}
    </div>
    <div class="row">
        {{Form::btInput($solicitud,'referencia',12,'textarea')}}
    </div>
    <div class="row">
        {{Form::btInput($solicitud,'accion_tomada',12, 'textarea')}}
    </div>
</div>
<div class="row">
    {{Form::btInput($solicitud,'recepcion_id',6)}}
    {{Form::btInput($solicitud,'organismo_id',6)}}
</div>
<div class="row">
    {{Form::btInput($solicitud,'area->tipo_ayuda_id',6, 'text', ['data-url'=>'tipoAyudas/areas','data-child'=>'area_id'])}}
    {{Form::btInput($solicitud,'area_id',6)}}
</div>
<div class="row">
    {{Form::btInput($solicitud,'necesidad')}}
</div>
<div class="row">
    {{Form::btInput($solicitud,'observaciones')}}
</div>
@include('templates.bootstrap.submit',['nomostrar'=>true])