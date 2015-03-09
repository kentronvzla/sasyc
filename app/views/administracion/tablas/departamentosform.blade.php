@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">
        @include('templates.tituloBarra',array('obj'=>$departamento, 'titulo'=>'departamento'))
    </div>
    <div class="panel-body">
        @include('templates.errores')
        {{Form::open(array('url'=>'administracion/tablas/departamentos'))}}
        {{Form::concurrencia($departamento)}}
        <div class="row">
            {{Form::hidden('id',$departamento->id)}}
            {{Form::btInput($departamento, 'nombre', 6)}}
            {{Form::btInput($departamento, 'supervisor_id', 6)}}
        </div>
        {{Form::submitBt()}}
        {{Form::close()}}
    </div>
</div>
@stop