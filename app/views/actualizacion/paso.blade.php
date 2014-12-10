@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-primary">
    <div class="panel-heading">ACTUALIZACIONES DEL SISTEMA PASO {{$paso}}</div>
    <div class="panel-body al">
        <form method="GET" action="{{url('administracion/actualizaciones/instalar/'.($paso+1).'/'.$version)}}">
            @if($correcto)  
            <div class="alert alert-success" role="alert">{{ $mensaje }}</div>
            @if($paso!=5)
            <button type="submit" class="btn btn-success">Continuar al proximo paso <span class="glyphicon glyphicon-chevron-right"></span></button>
            @endif
            @else
            <div class="alert alert-danger" role="alert">{{ $mensaje }}</div>
            <button onclick="window.location.reload();" class="btn btn-danger"><span class="glyphicon glyphicon-repeat"></span> Volver a intentarlo</button>
            @endif
        </form>
    </div>
</div>
@stop