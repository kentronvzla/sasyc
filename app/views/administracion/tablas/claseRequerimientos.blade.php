@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">Clase de requerimiento registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($claseRequerimientos, 'ClaseRequerimiento')}}
    </div>
</div>
@stop