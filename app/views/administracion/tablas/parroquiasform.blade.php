@extends('administracion.principal')
@section('contenido2')
    <div class="panel panel-danger">
        <div class="panel-heading">
            @include('templates.tituloBarra',array('obj'=>$parroquia, 'titulo'=>'Parroquias'))
        </div>
        <div class="panel-body">
            @include('templates.errores')
            {{Form::open(array('url'=>'administracion/tablas/parroquias'))}}
            {{Form::concurrencia($parroquia)}}
            <div class="row">
                {{Form::hidden('id',$parroquia->id)}}
                {{Form::btInput($parroquia, 'municipio_id', 6)}}
                {{Form::btInput($parroquia, 'nombre', 6)}}
            </div>
            {{Form::submitBt()}}
            {{Form::close()}}
        </div>
    </div>
@stop