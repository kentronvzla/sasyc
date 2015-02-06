@extends('layouts.master')
@section('contenido')
<div class="col-xs-12 col-sm-3 col-md-3">
    <div class="panel panel-danger">
        <div class="panel-heading">Versiones</div>
        <ul class="list-group">
            <a href="{{url('administracion/actualizaciones')}}"><li class="list-group-item">Actualizaciones</li></a>
        </ul>
    </div>
    <div class="panel panel-danger">
        <div class="panel-heading">Seguridad</div>
        <ul class="list-group">
            <a href="{{url('administracion/seguridad/grupos')}}"><li class="list-group-item">Grupos</li></a>
            <a href="{{url('administracion/seguridad/usuarios')}}"><li class="list-group-item">Usuarios</li></a>
        </ul>
    </div>
    <div class="panel panel-danger">
        <div class="panel-heading">Tablas</div>
        <ul class="list-group">
            <a href="{{url('administracion/tablas/tipoAyudas')}}">
                <li class="list-group-item">Tipos de Ayuda</li>
            </a>
            <a href="{{url('administracion/tablas/areas')}}">
                <li class="list-group-item">Areas</li>
            </a>
            <a href="{{url('administracion/tablas/estados')}}">
                <li class="list-group-item">Estados</li>
            </a>
            <a href="{{url('administracion/tablas/municipios')}}">
                <li class="list-group-item">Municipios</li>
            </a>
            <a href="{{url('administracion/tablas/parroquias')}}">
                <li class="list-group-item">Parroquias</li>
            </a>
            <a href="{{url('administracion/tablas/configuraciones')}}">
                <li class="list-group-item">Configuracion Avanzada</li>
            </a>
            <a href="{{url('administracion/tablas/estadoCiviles')}}">
                <li class="list-group-item">Estados Civiles</li>
            </a>
            <a href="{{url('administracion/tablas/nivelAcademicos')}}">
                <li class="list-group-item">Niveles Académicos</li>
            </a>
            <a href="{{url('administracion/tablas/organismos')}}">
                <li class="list-group-item">Organismos</li>
            </a>
            <a href="{{url('administracion/tablas/parentescos')}}">
                <li class="list-group-item">Parentescos</li>
            </a>
            <a href="{{url('administracion/tablas/recaudos')}}">
                <li class="list-group-item">Recaudos</li>
            </a>
            <a href="{{url('administracion/tablas/referentes')}}">
                <li class="list-group-item">Referentes</li>
            </a>
            <a href="{{url('administracion/tablas/requerimientos')}}">
                <li class="list-group-item">Requerimientos</li>
            </a>
            <a href="{{url('administracion/tablas/tenencias')}}">
                <li class="list-group-item">Tenencias</li>
            </a>
            <a href="{{url('administracion/tablas/tipoNacionalidades')}}">
                <li class="list-group-item">Nacionalidades</li>
            </a>
            <a href="{{url('administracion/tablas/tipoRequerimientos')}}">
                <li class="list-group-item">Tipos de Requerimiento</li>
            </a>
            <a href="{{url('administracion/tablas/tipoViviendas')}}">
                <li class="list-group-item">Tipos de Viviendas</li>
            </a>
            <a href="{{url('administracion/tablas/departamentos')}}">
                <li class="list-group-item">Departamentos</li>
            </a>
        </ul>
    </div>
</div>
<div class="col-xs-12 col-sm-9 col-md-9">
    <?php $act = ActualizacionesController::verificarActualizaciones(); ?>
    @if($act!="")
    <div class="alert alert-info" role="alert">
        {{$act}}
    </div>
    @endif
    @yield('contenido2')
</div>
{{HTML::script('js/views/administracion/principal.js')}}
@stop