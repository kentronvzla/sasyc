@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">fotos_solicitud registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($fotoSolicitudes, 'FotoSolicitud')}}
    </div>
</div>
@stop