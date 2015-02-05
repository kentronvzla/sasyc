@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">Configuracion avanzada del sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($configuraciones, 'Configuracion', false, true, false)}}
    </div>
</div>
@stop