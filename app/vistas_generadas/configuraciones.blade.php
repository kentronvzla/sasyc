@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">Tabla de configuracion registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($configuraciones, 'Configuracion')}}
    </div>
</div>
@stop