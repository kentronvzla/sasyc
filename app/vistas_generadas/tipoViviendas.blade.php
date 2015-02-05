@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">Tipo de vivienda registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($tipoViviendas, 'TipoVivienda')}}
    </div>
</div>
@stop