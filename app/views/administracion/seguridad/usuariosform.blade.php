@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">
        @include('templates.tituloBarra',array('obj'=>$usuario, 'titulo'=>'grupo'))
    </div>
    <div class="panel-body">
        @include('templates.errores')
        {{Form::open(array('url'=>'administracion/seguridad/usuarios'))}}
        {{Form::concurrencia($usuario)}}
        <div class="row">
            {{Form::hidden('id',$usuario->id)}}
            {{Form::btInput($usuario, 'email', 6)}}
            {{Form::btInput($usuario, 'nombre', 6)}}
        </div>
        <div class="row">
            {{Form::btInput($usuario, 'departamento_id', 6)}}
            {{Form::btInput($usuario, 'activated', 6)}}
        </div>
       <div class="row">
            {{Form::multiselect($usuario, 'grupos', 6)}}
            {{Form::btInput($usuario, 'password', 6,'password')}}
        </div>
        {{Form::submitBt()}}
        {{Form::close()}}
    </div>
</div>
@stop