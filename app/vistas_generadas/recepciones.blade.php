@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">recepciones registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($recepciones, 'Recepcion')}}
    </div>
</div>
@stop