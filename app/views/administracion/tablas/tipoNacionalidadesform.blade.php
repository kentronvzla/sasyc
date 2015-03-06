@extends('administracion.principal')
@section('contenido2')
    <div class="panel panel-danger">
        <div class="panel-heading">
            @include('templates.tituloBarra',array('obj'=>$tipoNacionalidad, 'titulo'=>'Nacionalidad'))
        </div>
        <div class="panel-body">
            @include('templates.errores')
            {{Form::open(array('url'=>'administracion/tablas/tipoNacionalidades'))}}
            {{Form::concurrencia($tipoNacionalidad)}}
            <div class="row">
                {{Form::hidden('id',$tipoNacionalidad->id)}}
                {{Form::btInput($tipoNacionalidad, 'nombre', 6)}}
            </div>
            {{Form::submitBt()}}
            {{Form::close()}}
        </div>
    </div>
@stop