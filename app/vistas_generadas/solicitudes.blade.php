@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">solicitudes registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($solicitudes, 'Solicitud')}}
    </div>
</div>
@stop