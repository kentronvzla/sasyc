@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">Parentescos registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($parentescos, 'Parentesco')}}
    </div>
</div>
@stop