@extends('administracion.principal')
@section('contenido2')
    <div class="panel panel-danger">
        <div class="panel-heading">
            @include('templates.tituloBarra',array('obj'=>$organismo, 'titulo'=>'Organismo'))
        </div>
        <div class="panel-body">
            @include('templates.errores')
            {{Form::open(array('url'=>'administracion/tablas/organismos'))}}
            {{Form::concurrencia($organismo)}}
            <div class="row">
                {{Form::hidden('id',$organismo->id)}}
                {{Form::btInput($organismo, 'nombre', 6)}}
                {{Form::btInput($organismo, 'ind_externo', 6)}}
            </div>
            {{Form::submitBt()}}
            {{Form::close()}}
        </div>
    </div>
@stop