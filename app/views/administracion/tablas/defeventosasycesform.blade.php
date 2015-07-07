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
                <div class="row">
            {{Form::display($defeventosasyc,'tipo_doc',4, true)}}
             @foreach ($descripcion as $descrip)
            <h4>Descripcion:&nbsp;{{$descrip->desctipodoc}}</h4>
              @endforeach
                 </div>
               <div class="row">
            {{Form::display($defeventosasyc,'tipo_evento',8, true)}}
            {{Form::hidden('tipo_doc',$defeventosasyc->tipo_doc)}}
            {{Form::hidden('tipo_evento',$defeventosasyc->tipo_evento)}}
            </div>  
                 <div class="row">
            {{Form::btInput($defeventosasyc, 'ind_aprueba_auto', 4)}}
            {{Form::btInput($defeventosasyc, 'ind_ctas_adic', 4)}}
             </div>
             <div class="row">
            {{Form::btInput($defeventosasyc, 'ind_reng_adic', 4)}}
            {{Form::btInput($defeventosasyc, 'ind_detcomp_adic', 6)}}
                 </div>
                
                {{Form::submitBt()}}
                  
        {{Form::close()}}
    </div> </div>
</div>
@stop
                