@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">recaudo_solicitud registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($recaudoSolicitudes, 'RecaudoSolicitud')}}
    </div>
</div>
@stop