@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">
        @include('templates.tituloBarra',array('obj'=>$requerimiento, 'titulo'=>'Requerimiento'))
    </div>
    <div class="panel-body">
        @include('templates.errores')
        {{Form::open(array('url'=>'administracion/tablas/requerimientos'))}}
        {{Form::concurrencia($requerimiento)}}
        <div class="row">
            {{Form::hidden('id',$requerimiento->id)}}
            {{Form::btInput($requerimiento, 'nombre', 6)}}
            {{Form::btInput($requerimiento, 'descripcion', 6)}}
            {{Form::btInput($requerimiento, 'cod_item', 6)}}
            {{Form::btInput($requerimiento, 'cod_cta', 6)}}
            {{Form::btInput($requerimiento, 'tipo_requerimiento_id', 6)}}
            {{Form::btInput($requerimiento, 'tipo_ayuda_id', 6)}}
        </div>
        {{Form::submitBt()}}
        {{Form::close()}}
    </div>
</div>
@stop