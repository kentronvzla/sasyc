@extends('administracion.principal')
@section('contenido2')
    <div class="panel panel-danger">
        <div class="panel-heading">
            @include('templates.tituloBarra',array('obj'=>$municipio, 'titulo'=>'Municipios'))
        </div>
        <div class="panel-body">
            @include('templates.errores')
            {{Form::open(array('url'=>'administracion/tablas/municipios'))}}
            {{Form::concurrencia($municipio)}}
            <div class="row">
                {{Form::hidden('id',$municipio->id)}}
                {{Form::btInput($municipio, 'estado_id', 6)}}
                {{Form::btInput($municipio, 'nombre', 6)}}
            </div>
            {{Form::submitBt()}}
            {{Form::close()}}
        </div>
    </div>
@stop