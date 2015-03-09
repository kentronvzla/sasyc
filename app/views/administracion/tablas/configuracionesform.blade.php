@extends('administracion.principal')
@section('contenido2')
    <div class="panel panel-danger">
        <div class="panel-heading">
            @include('templates.tituloBarra',array('obj'=>$configuracion, 'titulo'=>'Configuraciones'))
        </div>
        <div class="panel-body">
            @include('templates.errores')
            {{Form::open(array('url'=>'administracion/tablas/configuraciones'))}}
            {{Form::concurrencia($configuracion)}}
            <div class="row">
                {{Form::hidden('id',$configuracion->id)}}
                {{Form::btInput($configuracion, 'variable', 6)}}
                {{Form::btInput($configuracion, 'valor', 6)}}
            </div>
            {{Form::submitBt()}}
            {{Form::close()}}
        </div>
    </div>
@stop