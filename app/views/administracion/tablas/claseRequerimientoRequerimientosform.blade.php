@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">
        @include('templates.tituloBarra',array('obj'=>$claseRequerimientoRequerimiento, 'titulo'=>'clase_requerimiento_requerimiento'))
    </div>
    <div class="panel-body">
        @include('templates.errores')
        {{Form::open(array('url'=>'administracion/tablas/claseRequerimientoRequerimientos'))}}
        <div class="row">
            {{Form::hidden('id',$claseRequerimientoRequerimiento->id)}}
            {{Form::btInput($claseRequerimientoRequerimiento, 'requerimiento_id', 6)}}
{{Form::btInput($claseRequerimientoRequerimiento, 'clase_requerimiento_id', 6)}}
{{Form::btInput($claseRequerimientoRequerimiento, 'ind_cantidad', 6)}}
{{Form::btInput($claseRequerimientoRequerimiento, 'ind_monto', 6)}}
{{Form::btInput($claseRequerimientoRequerimiento, 'ind_beneficiario', 6)}}

        </div>
        {{Form::submitBt()}}
        {{Form::close()}}
    </div>
</div>
@stop