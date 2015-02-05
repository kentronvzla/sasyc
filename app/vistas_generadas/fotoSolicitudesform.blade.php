@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">
        @include('templates.tituloBarra',array('obj'=>$fotoSolicitud, 'titulo'=>'fotos_solicitud'))
    </div>
    <div class="panel-body">
        @include('templates.errores')
        {{Form::open(array('url'=>'administracion/tablas/fotoSolicitudes'))}}
        <div class="row">
            {{Form::hidden('id',$fotoSolicitud->id)}}
            {{Form::btInput($fotoSolicitud, 'solicitud_id', 6)}}
{{Form::btInput($fotoSolicitud, 'descripcion', 6)}}
{{Form::btInput($fotoSolicitud, 'foto', 6)}}
{{Form::btInput($fotoSolicitud, 'ind_reporte', 6)}}

        </div>
        {{Form::submitBt()}}
        {{Form::close()}}
    </div>
</div>
@stop