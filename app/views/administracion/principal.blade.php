@extends('layouts.master')
@section('contenido')
<div class="col-xs-12 col-sm-3 col-md-3">
    <div class="panel panel-danger">
        <div class="panel-heading">Versiones</div>
        <ul class="list-group">
            <a href="{{url('administracion/actualizaciones')}}"><li class="list-group-item">Actualizaciones</li></a>
        </ul>
    </div>
    <div class="panel panel-danger">
        <div class="panel-heading">Seguridad</div>
        <ul class="list-group">
            <a href="{{url('administracion/grupo')}}"><li class="list-group-item {{$pantallas['grupo'] or ""}}">Grupos</li></a>
            <a href="{{url('administracion/usuario')}}"><li class="list-group-item {{$pantallas['usuario'] or ""}}">Usuarios</li></a>
        </ul>
    </div>
    <div class="panel panel-danger">
        <div class="panel-heading">Tablas</div>
        <ul class="list-group">
            <a href="{{url('administracion/sector-industria')}}"><li class="list-group-item {{$pantallas['sector-industria'] or ""}}">Sector industria</li></a>
        </ul>
    </div>
</div>
<div class="col-xs-12 col-sm-9 col-md-9">
    <?php $act = ActualizacionesController::verificarActualizaciones(); ?>
    @if($act!="")
    <div class="alert alert-info" role="alert">
        {{$act}}
    </div>
    @endif
    @yield('contenido2')
</div>
{{HTML::script('js/views/administracion/principal.js')}}
@stop