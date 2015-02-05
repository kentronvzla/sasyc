@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">Tenencias registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($tenencias, 'Tenencia')}}
    </div>
</div>
@stop