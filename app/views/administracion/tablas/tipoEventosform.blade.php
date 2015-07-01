@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">
        @foreach ($defeventosasyc as $evento)
        @include('templates.tituloBarra',array('obj'=>$evento, 'titulo'=>'Tipo de Documento'))
    </div>
    <div class="panel-body">
        @include('templates.errores')
        {{Form::open(array('url'=>'administracion/tablas/Defeventosasyc'))}}
        {{Form::concurrencia($evento)}}
        <div class="row">
            {{Form::hidden('id',$evento->id)}}
            {{Form::btInput($evento, 'tipo_doc', 6)}}
            {{Form::btInput($evento, 'tipo_evento', 6)}}
            {{Form::btInput($evento, 'ind_aprueba_auto', 6)}}
            {{Form::btInput($evento, 'ind_doc_ext', 6)}}
            {{Form::btInput($evento, 'ind_ctas_adic', 6)}}
            {{Form::btInput($evento, 'ind_reng_adic', 6)}}
            {{Form::btInput($evento, 'ind_detcomp_adic', 6)}}
            {{Form::btInput($evento, 'version', 6)}}
                
                @endforeach
        </div>
        {{Form::submitBt()}}
        {{Form::close()}}
    </div>
</div>
@stop