@extends('layouts.master')
@section('contenido')
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="panel panel-danger">
        <div class="panel-heading"><h4 class="panel-title">Memorandums</h4></div>
        <div class="panel-body" id='solicitudes-lista'>
            {{HTML::simpleTable($memos, 'Memo', [], "", ['search'=>'memorandum/ver','print'=>'memorandum/imprimir'], true)}}
        </div>
    </div>
</div>
@stop