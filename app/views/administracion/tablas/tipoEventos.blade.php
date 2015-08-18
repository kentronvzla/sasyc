@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">Tipo de Documentos Registrados en el Sistema</div>
    <div class="panel-body">

        <table class="table table-striped bootstrap-datatable jqueryTable responsive">
            <thead>
                <tr>
                    <th>Tipo Doc</th>
                    <th>Descripcion</th>
                    <th>Ruta</th> 
                    <th>Tipo de Evento</th>
                    <th>Configurado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($tipoeventos as $eventos)
                    <td align='center'>{{$eventos->tipodoc}}</td>
                    <td>{{$eventos->desctipodoc}}</td>
                    <td align='center'>{{$eventos->codruta}}</td>
                    <td align='center'>{{$eventos->tipoevento}}</td>
                    @if($evento == null)
                        {{--*/ $configuracion = 'NO' /*--}}
                        <td align='center'>{{$configuracion}}</td>
                    @else
                        {{--*/ $configuracion = ((in_array($eventos->tipodoc, $evento)) == TRUE) ? "SI" : "NO" /*--}}
                        <td align='center'>{{$configuracion}}</td>
                    @endif
                    <td align="center"> <a class="btn btn-primary btn-xs" href="{{$url}}/modifica/{{$eventos->tipodoc}}/{{$eventos->tipoevento}}"><i class="fa fa-pencil"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div> 


@stop