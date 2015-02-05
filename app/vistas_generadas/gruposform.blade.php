@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">
        @include('templates.tituloBarra',array('obj'=>$grupo, 'titulo'=>'Grupos de usuario.'))
    </div>
    <div class="panel-body">
        @include('templates.errores')
        {{Form::open(array('url'=>'administracion/tablas/grupos'))}}
        <div class="row">
            {{Form::hidden('id',$grupo->id)}}
            {{Form::btInput($grupo, 'name', 6)}}

        </div>
        {{Form::submitBt()}}
        {{Form::close()}}
    </div>
</div>
@stop