@extends('administracion.principal')
@section('contenido2')
        


<div class="panel panel-danger">
    <div class="panel-heading">
         
         @include('templates.tituloBarra',array('obj'=>$tipoeventos, 'titulo'=>'Tipo de Documentos'))
    </div>
    <div class="panel-body">
        @include('templates.errores')
          {{Form::open(array('url'=>'administracion/tablas/defeventosasyc'))}}
            {{Form::concurrencia($tipoeventos)}}
            
        
        <div class="row">

           {{Form::btInput($tipoeventos, 'tipo_doc', 6)}}
           {{Form::btInput($tipoeventos, 'tipo_evento', 6)}}
           
          
        </div>
        {{Form::submitBt()}}
        {{Form::close()}}
    </div>
</div>



@stop

