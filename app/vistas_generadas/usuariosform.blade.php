@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">
        @include('templates.tituloBarra',array('obj'=>$usuario, 'titulo'=>'Usuarios'))
    </div>
    <div class="panel-body">
        @include('templates.errores')
        {{Form::open(array('url'=>'administracion/tablas/usuarios'))}}
        <div class="row">
            {{Form::hidden('id',$usuario->id)}}
            {{Form::btInput($usuario, 'email', 6)}}
{{Form::btInput($usuario, 'password', 6)}}
{{Form::btInput($usuario, 'nombre', 6)}}
{{Form::btInput($usuario, 'activated', 6)}}

        </div>
        {{Form::submitBt()}}
        {{Form::close()}}
    </div>
</div>
@stop