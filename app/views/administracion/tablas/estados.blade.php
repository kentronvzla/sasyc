@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">Estados registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($estados, 'Estado')}}
    </div>
</div>
@stop