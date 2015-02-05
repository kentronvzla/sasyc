@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">memos registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($memos, 'Memo')}}
    </div>
</div>
@stop