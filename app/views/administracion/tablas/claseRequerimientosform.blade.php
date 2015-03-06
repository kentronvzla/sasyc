@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">
        @include('templates.tituloBarra',array('obj'=>$claseRequerimiento, 'titulo'=>'Clase de requerimiento'))
    </div>
    <div class="panel-body">
        @include('templates.errores')
        {{Form::open(array('url'=>'administracion/tablas/claseRequerimientos'))}}
        <div class="row">
            {{Form::hidden('id',$claseRequerimiento->id)}}
            {{Form::btInput($claseRequerimiento, 'nombre', 6)}}
{{Form::btInput($claseRequerimiento, 'tipo_doc', 6)}}

        </div>
        {{Form::submitBt()}}
        {{Form::close()}}
    </div>
</div>
@stop