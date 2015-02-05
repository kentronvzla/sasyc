@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">
        @include('templates.tituloBarra',array('obj'=>$documento, 'titulo'=>'documentos'))
    </div>
    <div class="panel-body">
        @include('templates.errores')
        {{Form::open(array('url'=>'administracion/tablas/documentos'))}}
        <div class="row">
            {{Form::hidden('id',$documento->id)}}
            {{Form::btInput($documento, 'tipo', 6)}}
{{Form::btInput($documento, 'descripcion', 6)}}
{{Form::btInput($documento, 'fecha', 6)}}
{{Form::btInput($documento, 'estatus', 6)}}
{{Form::btInput($documento, 'ind_reverso', 6)}}
{{Form::btInput($documento, 'solicitud_id', 6)}}
{{Form::btInput($documento, 'mensaje', 6)}}

        </div>
        {{Form::submitBt()}}
        {{Form::close()}}
    </div>
</div>
@stop