@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">Parroquias registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($parroquias, 'Parroquia')}}
    </div>
</div>
@stop