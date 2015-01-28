@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">Grupos registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($grupos, 'Grupo')}}
    </div>
</div>
@stop