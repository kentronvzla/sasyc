@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">
        @include('templates.tituloBarra',array('obj'=>$recaudoSolicitud, 'titulo'=>'recaudo_solicitud'))
    </div>
    <div class="panel-body">
        @include('templates.errores')
        {{Form::open(array('url'=>'administracion/tablas/recaudoSolicitudes'))}}
        <div class="row">
            {{Form::hidden('id',$recaudoSolicitud->id)}}
            {{Form::btInput($recaudoSolicitud, 'solicitud_id', 6)}}
{{Form::btInput($recaudoSolicitud, 'recaudo_id', 6)}}
{{Form::btInput($recaudoSolicitud, 'ind_recibido', 6)}}
{{Form::btInput($recaudoSolicitud, 'fecha_vencimiento', 6)}}
{{Form::btInput($recaudoSolicitud, 'documento', 6)}}

        </div>
        {{Form::submitBt()}}
        {{Form::close()}}
    </div>
</div>
@stop