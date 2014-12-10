@extends('layouts.master')
@section('contenido')
<div class="col-xs-12 col-sm-3 col-md-3">
    <div class="panel panel-primary">
        <div class="panel-heading">Versiones</div>
        <ul class="list-group">
            <a href="{{url('administracion/actualizaciones')}}"><li class="list-group-item">Actualizaciones</li></a>
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