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
            <div class="col-xs-12 col-md">
            <h3>Tipo de Documento:&nbsp;{{$evento->tipo_doc}}</h3>
            <h3>Tipo de Evento:&nbsp;{{$evento->tipo_evento}}</h3>

            </div>
            
             {{Form::hidden('tipo_doc',$evento->tipo_doc)}}
             {{Form::hidden('tipo_evento',$evento->tipo_evento)}}
            {{Form::btInput($evento, 'ind_aprueba_auto', 4)}}
            
            {{Form::btInput($evento, 'ind_ctas_adic', 4)}}
            {{Form::btInput($evento, 'ind_reng_adic', 4)}}
            {{Form::btInput($evento, 'ind_detcomp_adic', 6)}}
           
                @endforeach
        </div>
        {{Form::submitBt()}}
        {{Form::close()}}
    </div>
</div>
@stop