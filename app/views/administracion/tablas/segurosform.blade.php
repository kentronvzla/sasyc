@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">
        @include('templates.tituloBarra',array('obj'=>$seguro, 'titulo'=>'seguros'))
    </div>
    <div class="panel-body">
        @include('templates.errores')
        {{Form::open(array('url'=>'administracion/tablas/seguros'))}}
        {{Form::concurrencia($seguro)}}
        <div class="row">
            {{Form::hidden('id',$seguro->id)}}
            {{Form::btInput($seguro, 'nombre', 6)}}

        </div>
        {{Form::submitBt()}}
        {{Form::close()}}
    </div>
</div>
@stop