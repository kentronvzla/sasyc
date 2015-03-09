@extends('administracion.principal')
@section('contenido2')
    <div class="panel panel-danger">
        <div class="panel-heading">
            @include('templates.tituloBarra',array('obj'=>$tipoAyuda, 'titulo'=>'Tipos de ayuda'))
        </div>
        <div class="panel-body">
            @include('templates.errores')
            {{Form::open(array('url'=>'administracion/tablas/tipoAyudas'))}}
            {{Form::concurrencia($tipoAyuda)}}
            <div class="row">
                {{Form::hidden('id',$tipoAyuda->id)}}
                {{Form::btInput($tipoAyuda, 'nombre', 6)}}
                {{Form::btInput($tipoAyuda, 'cod_acc_int', 6)}}
            </div>
            {{Form::submitBt()}}
            {{Form::close()}}
        </div>
    </div>
@stop