@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
<div class="panel-heading">Tipo de Documentos Registrados en el Sistema</div>
    <div class="panel-body">
<table class="table table-striped bootstrap-datatable jqueryTable responsive">
    <thead>
        <tr>
            <th>Tipo Documento</th>
             <th>Descripcion</th>
             <th>Ruta</th>
             <th>Tipo de Evento</th>
             <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
             @foreach ($tipoeventos as $eventos)
            <td>{{$eventos->tipodoc}}</td>
            <td>{{$eventos->desctipodoc}}</td>
            <td>{{$eventos->codruta}}</td>
            <td>{{$eventos->tipoevento}}</td>
            
        </tr>
        @endforeach
        
        
        
        
        
        
    </tbody>
   
</table>
        </div>
</div>
@stop