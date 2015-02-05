@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">
        @include('templates.tituloBarra',array('obj'=>$tipoRequerimiento, 'titulo'=>'Tipo de requerimiento'))
    </div>
    <div class="panel-body">
        @include('templates.errores')
        {{Form::open(array('url'=>'administracion/tablas/tipoRequerimientos'))}}
        <div class="row">
            {{Form::hidden('id',$tipoRequerimiento->id)}}
            {{Form::btInput($tipoRequerimiento, 'nombre', 6)}}

        </div>
        {{Form::submitBt()}}
        {{Form::close()}}
    </div>
</div>
@stop