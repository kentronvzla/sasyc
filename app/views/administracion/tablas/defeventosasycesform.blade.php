@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">
        @include('templates.tituloBarra',array('obj'=>$defeventosasyc, 'titulo'=>'Tipo de Documento'))
    </div>
    <div class="panel-body">
        @include('templates.errores')
        {{Form::open(array('url'=>'administracion/tablas/Defeventosasyc'))}}
        {{Form::concurrencia($defeventosasyc)}}
        <div class="row">
               {{Form::hidden('id',$defeventosasyc->id)}}
            <div class="col-xs-12 col-md">
            <h3>Tipo de Documento:&nbsp;{{$defeventosasyc->tipo_doc}}</h3>
            <h3>Tipo de Evento:&nbsp;{{$defeventosasyc->tipo_evento}}</h3>
            </div>
            {{Form::btInput($defeventosasyc, 'ind_aprueba_auto', 4)}}
            {{Form::btInput($defeventosasyc, 'ind_doc_ext', 4)}}
            {{Form::btInput($defeventosasyc, 'ind_ctas_adic', 4)}}
            {{Form::btInput($defeventosasyc, 'ind_reng_adic', 4)}}
            {{Form::btInput($defeventosasyc, 'ind_detcomp_adic', 6)}}
            {{Form::btInput($defeventosasyc, 'version', 6)}}

        </div>
        {{Form::submitBt()}}
        {{Form::close()}}
    </div>
</div>
@stop