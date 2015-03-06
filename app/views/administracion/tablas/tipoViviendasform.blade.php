@extends('administracion.principal')
@section('contenido2')
    <div class="panel panel-danger">
        <div class="panel-heading">
            @include('templates.tituloBarra',array('obj'=>$tipoVivienda, 'titulo'=>'Tipo de vivienda'))
        </div>
        <div class="panel-body">
            @include('templates.errores')
            {{Form::open(array('url'=>'administracion/tablas/tipoViviendas'))}}
            {{Form::concurrencia($tipoVivienda)}}
            <div class="row">
                {{Form::hidden('id',$tipoVivienda->id)}}
                {{Form::btInput($tipoVivienda, 'nombre', 6)}}

            </div>
            {{Form::submitBt()}}
            {{Form::close()}}
        </div>
    </div>
@stop