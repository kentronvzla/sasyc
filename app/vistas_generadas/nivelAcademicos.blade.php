@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">Nivel Académico registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($nivelAcademicos, 'NivelAcademico')}}
    </div>
</div>
@stop