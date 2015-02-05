@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">Requerimientos registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($requerimientos, 'Requerimiento')}}
    </div>
</div>
@stop