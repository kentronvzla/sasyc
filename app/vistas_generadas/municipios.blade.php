@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">Municipios registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($municipios, 'Municipio')}}
    </div>
</div>
@stop