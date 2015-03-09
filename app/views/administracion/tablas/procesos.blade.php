@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">Proceso registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($procesos, 'Proceso')}}
    </div>
</div>
@stop