@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">
        @include('templates.tituloBarra',array('obj'=>$defeventosasyc, 'titulo'=>'defeventosasyc'))
    </div>
    <div class="panel-body">
        @include('templates.errores')
        {{Form::open(array('url'=>'administracion/tablas/defeventosasyces'))}}
        {{Form::concurrencia($defeventosasyc)}}
        <div class="row">
            {{Form::hidden('id',$defeventosasyc->id)}}
            {{Form::btInput($defeventosasyc, 'tipo_doc', 6)}}
{{Form::btInput($defeventosasyc, 'tipo_evento', 6)}}
{{Form::btInput($defeventosasyc, 'ind_aprueba_auto', 6)}}
{{Form::btInput($defeventosasyc, 'ind_doc_ext', 6)}}
{{Form::btInput($defeventosasyc, 'ind_ctas_adic', 6)}}
{{Form::btInput($defeventosasyc, 'ind_reng_adic', 6)}}
{{Form::btInput($defeventosasyc, 'ind_detcomp_adic', 6)}}
{{Form::btInput($defeventosasyc, 'version', 6)}}

        </div>
        {{Form::submitBt()}}
        {{Form::close()}}
    </div>
</div>
@stop