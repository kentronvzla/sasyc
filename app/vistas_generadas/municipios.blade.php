@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">municipios registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($municipios, 'Municipio')}}
    </div>
</div>
@stop