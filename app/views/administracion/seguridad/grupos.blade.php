@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">Grupos registrados en el sistema</div>
    <div class="panel-body">
        {{HTML::tableModel($grupos, 'grupo', true, true, true, true)}}
    </div>
</div>
@stop    
@section('javascript')
{{HTML::script('js/views/administracion/permisos.js')}}
@stop

 