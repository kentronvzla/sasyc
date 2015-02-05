@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">Estado Civil registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($estadoCiviles, 'EstadoCivil')}}
    </div>
</div>
@stop