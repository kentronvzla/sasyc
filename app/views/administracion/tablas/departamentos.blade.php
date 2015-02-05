@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">Departamentos registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($departamentos, 'Departamento')}}
    </div>
</div>
@stop