@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">
         @foreach ($tipoeventos as $evento)
         @include('templates.tituloBarra',array('obj'=>$evento, 'titulo'=>'Tipo de Documentos'))
    </div>
    <div class="panel-body">
        @include('templates.errores')
          {{Form::open(array('url'=>'administracion/tablas/tipoEventos'))}}
            {{Form::concurrencia($evento)}}
            
        
        <div class="row">
           {{Form::hidden('id',$evento->id)}}
           {{Form::btInput($evento, 'tipo_doc', 6)}}
           {{Form::btInput($evento, 'tipo_evento', 6)}}
           
            @endforeach
        </div>
        {{Form::submitBt()}}
        {{Form::close()}}
    </div>
</div>
@stop