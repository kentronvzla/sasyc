@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">Recaudos registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($recaudos, 'Recaudo')}}
    </div>
</div>
@stop