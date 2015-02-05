@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">personas registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($personas, 'Persona')}}
    </div>
</div>
@stop