@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">Usuarios registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($grupos, 'grupo', true, true, true, true)}}
    </div>
</div>
@stop           

 