@extends('administracion.principal')
@section('contenido2')
    <div class="panel panel-danger">
        <div class="panel-heading">
            @include('templates.tituloBarra',array('obj'=>$parentesco, 'titulo'=>'Parentesco'))
        </div>
        <div class="panel-body">
            @include('templates.errores')
            {{Form::open(array('url'=>'administracion/tablas/parentescos'))}}
            {{Form::concurrencia($parentesco)}}
            <div class="row">
                {{Form::hidden('id',$parentesco->id)}}
                {{Form::btInput($parentesco, 'nombre', 6)}}
                {{Form::btInput($parentesco, 'inverso', 6)}}
            </div>
            {{Form::submitBt()}}
            {{Form::close()}}
        </div>
    </div>
@stop