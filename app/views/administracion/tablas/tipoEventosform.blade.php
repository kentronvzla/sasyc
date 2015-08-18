@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">
        @foreach ($defeventosasyc as $evento)
        @include('templates.tituloBarra',array('obj'=>$evento, 'titulo'=>'Tipo de Documento'))
    </div>
    <div class="panel-body">
        @include('templates.errores')
        {{Form::open(array('url'=>'administracion/tablas/tipoEventos'))}}
        {{Form::concurrencia($evento)}}
        <div class="row">
            {{Form::hidden('id',$evento->id)}}
            <div class="col-xs-12 col-md">
                <div class="row">
                    {{Form::display($evento,'tipo_doc',4, true)}}
                    @foreach ($descripcion as $descrip)
                    <h5>{{$descrip->desctipodoc}}</h5>
                    @endforeach
                </div>
                <div class="row">                   
                    {{Form::display($evento,'tipo_evento',8, true)}}
                    {{Form::hidden('tipo_doc',$evento->tipo_doc)}}
                    {{Form::hidden('tipo_evento',$evento->tipo_evento)}}                   
                </div> 
                <div class="row">
                    {{Form::btInput($evento, 'ind_aprueba_auto', 4)}}
                    {{Form::btInput($evento, 'ind_ctas_adic', 4)}}
                </div>
                <div class="row">
                    {{Form::btInput($evento, 'ind_reng_adic', 4)}}
                    {{Form::btInput($evento, 'ind_detcomp_adic', 6)}}
                </div></div> </div> 
        @endforeach

        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i>Guardar</button>
        <button class="btn btn-default"><i class="glyphicon glyphicon-trash"></i>{{ link_to('administracion/tablas/tipoEventos', '') }} Cancelar</button>
        {{Form::close()}}

    </div></div>
@stop