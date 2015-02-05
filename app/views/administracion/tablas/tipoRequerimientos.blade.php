@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">Tipos de requerimientos registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($tipoRequerimientos, 'TipoRequerimiento')}}
    </div>
</div>
@stop