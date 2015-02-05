@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">
        @include('templates.tituloBarra',array('obj'=>$solicitud, 'titulo'=>'solicitudes'))
    </div>
    <div class="panel-body">
        @include('templates.errores')
        {{Form::open(array('url'=>'administracion/tablas/solicitudes'))}}
        <div class="row">
            {{Form::hidden('id',$solicitud->id)}}
            {{Form::btInput($solicitud, 'ano', 6)}}
{{Form::btInput($solicitud, 'descripcion', 6)}}
{{Form::btInput($solicitud, 'persona_beneficiario_id', 6)}}
{{Form::btInput($solicitud, 'persona_solicitante_id', 6)}}
{{Form::btInput($solicitud, 'area_id', 6)}}
{{Form::btInput($solicitud, 'referente_id', 6)}}
{{Form::btInput($solicitud, 'recepcion_id', 6)}}
{{Form::btInput($solicitud, 'organismo_id', 6)}}
{{Form::btInput($solicitud, 'ind_mismo_benef', 6)}}
{{Form::btInput($solicitud, 'ind_inmediata', 6)}}
{{Form::btInput($solicitud, 'actividad', 6)}}
{{Form::btInput($solicitud, 'referencia', 6)}}
{{Form::btInput($solicitud, 'accion_tomada', 6)}}
{{Form::btInput($solicitud, 'necesidad', 6)}}
{{Form::btInput($solicitud, 'tipo_proc', 6)}}
{{Form::btInput($solicitud, 'num_proc', 6)}}
{{Form::btInput($solicitud, 'facturas', 6)}}
{{Form::btInput($solicitud, 'observaciones', 6)}}
{{Form::btInput($solicitud, 'moneda', 6)}}
{{Form::btInput($solicitud, 'prioridad', 6)}}
{{Form::btInput($solicitud, 'estatus', 6)}}
{{Form::btInput($solicitud, 'usuario_asignacion_id', 6)}}
{{Form::btInput($solicitud, 'usuario_autorizacion_id', 6)}}
{{Form::btInput($solicitud, 'fecha_solicitud', 6)}}
{{Form::btInput($solicitud, 'fecha_asignacion', 6)}}
{{Form::btInput($solicitud, 'fecha_aceptacion', 6)}}
{{Form::btInput($solicitud, 'fecha_aprobacion', 6)}}
{{Form::btInput($solicitud, 'fecha_cierre', 6)}}
{{Form::btInput($solicitud, 'ind_beneficiario_menor', 6)}}
{{Form::btInput($solicitud, 'tipo_vivienda_id', 6)}}
{{Form::btInput($solicitud, 'tenencia_id', 6)}}
{{Form::btInput($solicitud, 'informe_social', 6)}}
{{Form::btInput($solicitud, 'total_ingresos', 6)}}

        </div>
        {{Form::submitBt()}}
        {{Form::close()}}
    </div>
</div>
@stop