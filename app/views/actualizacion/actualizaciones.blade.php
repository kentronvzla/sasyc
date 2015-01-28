@extends('administracion.principal')
@section('contenido2')
<div class="panel panel-danger">
    <div class="panel-heading">Versión instalada: <strong>{{Configuracion::get('version')}}</strong>, Ultima versión disponible: <strong>{{$version->VERSION or "Error al conectar al servidor"}}</strong></div>
    <div class="panel-body">
        <table class="table table-striped responsive">
            <thead>
                <tr>
                    <th class="t-Left">ID</th>
                    <th class="t-Left">Versión</th>
                    <th class="t-Left">Estable</th>
                    <th class="t-Left">Comentario</th>
                    <th class="t-Left">Instalar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($versiones as $version)
                @if(Configuracion::get('version')<=$version->VERSION)
                <tr>
                    <td class="t-Left">{{$version->ID}}</td>
                    <td class="t-Left">{{$version->VERSION}}</td>
                    <td class="t-Left">{{$version->ESTABLEDIS}}</td>
                    <td class="t-Left">{{$version->COMENTARIO}}</td>
                    <td class="t-Left"><a href="{{url('administracion/actualizaciones/instalar/1/'.$version->ID)}}" class="btn btn-primary"><span class="glyphicon glyphicon-download-alt"></span> Instalar</a></td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table> 
    </div>
</div>
@stop
