@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">Clases y requerimientos registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($claseRequerimientoRequerimientos, 'ClaseRequerimientoRequerimiento')}}
    </div>
</div>
@stop