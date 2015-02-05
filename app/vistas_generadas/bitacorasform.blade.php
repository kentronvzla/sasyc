@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">
        @include('templates.tituloBarra',array('obj'=>$bitacora, 'titulo'=>'bitacoras'))
    </div>
    <div class="panel-body">
        @include('templates.errores')
        {{Form::open(array('url'=>'administracion/tablas/bitacoras'))}}
        <div class="row">
            {{Form::hidden('id',$bitacora->id)}}
            {{Form::btInput($bitacora, 'solicitud_id', 6)}}
{{Form::btInput($bitacora, 'fecha', 6)}}
{{Form::btInput($bitacora, 'nota', 6)}}
{{Form::btInput($bitacora, 'usuario_id', 6)}}
{{Form::btInput($bitacora, 'memo', 6)}}
{{Form::btInput($bitacora, 'tipo', 6)}}
{{Form::btInput($bitacora, 'ind_activo', 6)}}
{{Form::btInput($bitacora, 'ind_alarma', 6)}}

        </div>
        {{Form::submitBt()}}
        {{Form::close()}}
    </div>
</div>
@stop