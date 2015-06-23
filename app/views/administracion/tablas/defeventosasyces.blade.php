@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">Tipo de Eventos registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($tipoeventos, 'TipoEvento')}}
    </div>
</div>
@stop