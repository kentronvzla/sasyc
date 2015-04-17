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
                                                {{Form::select('order_by',$columnas_orden, '', ['placeholder'=>'Ordenar','class'=>'form-control','required'])}}
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
                         <button class="btn btn-primary" type="submit" name="formato_reporte" value="pdf"><i class="fa fa-file-pdf-o"></i> Generar en PDF</button>
                         <button class="btn btn-primary" type="submit" name="formato_reporte" value="xls"><i class="fa fa-file-excel-o"></i> Generar en Excel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop