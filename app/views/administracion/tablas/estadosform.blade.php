@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">
        @include('templates.tituloBarra',array('obj'=>$estado, 'titulo'=>'Estados'))
    </div>
    <div class="panel-body">
        @include('templates.errores')
        {{Form::open(array('url'=>'administracion/tablas/estados'))}}
        {{Form::concurrencia($estado)}}
        <div class="row">
            {{Form::hidden('id',$estado->id)}}
            {{Form::btInput($estado, 'nombre', 6)}}
        </div>
        {{Form::submitBt()}}
        {{Form::close()}}
    </div>
</div>
@stop