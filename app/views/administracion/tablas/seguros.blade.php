@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">seguros registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($seguros, 'Seguro')}}
    </div>
</div>
@stop