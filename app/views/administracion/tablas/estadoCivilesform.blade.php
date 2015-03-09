@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">
        @include('templates.tituloBarra',array('obj'=>$estadoCivil, 'titulo'=>'Estado Civil'))
    </div>
    <div class="panel-body">
        @include('templates.errores')
        {{Form::open(array('url'=>'administracion/tablas/estadoCiviles'))}}
        {{Form::concurrencia($estadoCivil)}}
        <div class="row">
            {{Form::hidden('id',$estadoCivil->id)}}
            {{Form::btInput($estadoCivil, 'nombre', 6)}}

        </div>
        {{Form::submitBt()}}
        {{Form::close()}}
    </div>
</div>
@stop