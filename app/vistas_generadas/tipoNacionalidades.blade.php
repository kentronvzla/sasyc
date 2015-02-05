@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">Nacionalidad registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($tipoNacionalidades, 'TipoNacionalidad')}}
    </div>
</div>
@stop