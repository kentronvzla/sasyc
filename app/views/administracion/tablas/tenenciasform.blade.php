@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">
        @include('templates.tituloBarra',array('obj'=>$tenencia, 'titulo'=>'Tenencia'))
    </div>
    <div class="panel-body">
        @include('templates.errores')
        {{Form::open(array('url'=>'administracion/tablas/tenencias'))}}
        {{Form::concurrencia($tenencia)}}
        <div class="row">
            {{Form::hidden('id',$tenencia->id)}}
            {{Form::btInput($tenencia, 'nombre', 6)}}
        </div>
        {{Form::submitBt()}}
        {{Form::close()}}
    </div>
</div>
@stop