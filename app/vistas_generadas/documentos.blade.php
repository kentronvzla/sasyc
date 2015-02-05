@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">documentos registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($documentos, 'Documento')}}
    </div>
</div>
@stop