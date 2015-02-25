@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">Documentacion de la aplicacion</div>
    <div class="panel-body">
        {{HTML::tableModel($ayudaCampos, 'AyudaCampo', true, true, false)}}
    </div>
</div>
@stop