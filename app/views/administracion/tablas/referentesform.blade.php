@extends('administracion.principal')
@section('contenido2')
    <div class="panel panel-danger">
        <div class="panel-heading">
            @include('templates.tituloBarra',array('obj'=>$referente, 'titulo'=>'Referente'))
        </div>
        <div class="panel-body">
            @include('templates.errores')
            {{Form::open(array('url'=>'administracion/tablas/referentes'))}}
            {{Form::concurrencia($referente)}}
            <div class="row">
                {{Form::hidden('id',$referente->id)}}
                {{Form::btInput($referente, 'nombre', 6)}}
                {{Form::btInput($referente, 'cargo', 6)}}
            </div>
            {{Form::submitBt()}}
            {{Form::close()}}
        </div>
    </div>
@stop