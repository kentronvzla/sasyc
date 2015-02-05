@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">Tipos de ayuda registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($tipoAyudas, 'TipoAyuda')}}
    </div>
</div>
@stop