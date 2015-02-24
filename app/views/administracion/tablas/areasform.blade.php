@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">
        @include('templates.tituloBarra',array('obj'=>$area, 'titulo'=>'area'))
    </div>
    <div class="panel-body">
        @include('templates.errores')
        {{Form::open(array('url'=>'administracion/tablas/areas'))}}
        <div class="row">
            {{Form::hidden('id',$area->id)}}
            {{Form::btInput($area, 'nombre', 6)}}
            {{Form::btInput($area, 'descripcion', 6)}}
            {{Form::btInput($area, 'tipo_ayuda_id', 6)}}
        </div>
        {{Form::submitBt()}}
        {{Form::close()}}
    </div>
</div>
@stop