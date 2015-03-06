@extends('administracion.principal')
@section('contenido2')
    <div class="panel panel-danger">
        <div class="panel-heading">
            @include('templates.tituloBarra',array('obj'=>$nivelAcademico, 'titulo'=>'Nivel Académico'))
        </div>
        <div class="panel-body">
            @include('templates.errores')
            {{Form::open(array('url'=>'administracion/tablas/nivelAcademicos'))}}
            {{Form::concurrencia($nivelAcademico)}}
            <div class="row">
                {{Form::hidden('id',$nivelAcademico->id)}}
                {{Form::btInput($nivelAcademico, 'nombre', 6)}}
                {{Form::btInput($nivelAcademico, 'orden', 6)}}
            </div>
            {{Form::submitBt()}}
            {{Form::close()}}
        </div>
    </div>
@stop