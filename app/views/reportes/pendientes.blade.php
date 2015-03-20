@extends('layouts.master')
@section('contenido')
    {{Form::busqueda(['url'=>'reportes/pendientes','method'=>'POST'])}}
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h4 class="panel-title">
                    Búsqueda
                </h4>
            </div>
            <div class="panel-body">
                @include('solicitudes.busqueda')
                 <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                   Indicar columna para ordenar 
                                </h4>
                            </div>
                            <div class="panel-body">
                                <div id="contenedor-tablas">
                                    <div class="row" id="plantilla-fila">
                                        <div class="col-xs-12 col-md-12">
                                            <div class="form-group">
                                                {{Form::select('order_by_1[]',$columnas_orden, '', ['placeholder'=>'Ordenar','class'=>'form-control'])}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-file"></i> Generar Reporte</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop