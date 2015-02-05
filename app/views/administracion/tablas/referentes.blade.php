@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">Referentes registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($referentes, 'Referente')}}
    </div>
</div>
@stop