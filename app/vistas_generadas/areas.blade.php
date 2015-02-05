@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">Areas registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($areas, 'Area')}}
    </div>
</div>
@stop