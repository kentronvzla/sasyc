@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">organismos registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($organismos, 'Organismo')}}
    </div>
</div>
@stop