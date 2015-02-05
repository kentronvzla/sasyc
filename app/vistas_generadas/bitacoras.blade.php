@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">bitacoras registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($bitacoras, 'Bitacora')}}
    </div>
</div>
@stop