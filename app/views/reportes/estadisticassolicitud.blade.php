@extends('layouts.master')
@section('contenido')
    {{Form::busqueda(['url'=>'reportes/estadisticassolicitud','method'=>'POST'])}}
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
                                    Agrupación del reporte y tablas a generar
                                </h4>
                            </div>
                            <div class="panel-body">
                                <div id="contenedor-tablas">
                                    <div class="row" id="plantilla-fila">
                                        <div class="col-xs-12 col-md-3">
                                            <div class="form-group">
                                                {{Form::text('titulo_reporte[]', '', ['placeholder'=>'Título del reporte','class'=>'form-control'])}}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-3">
                                            <div class="form-group">
                                                {{Form::select('group_by_1[]', $columnas_agrupables, '', ['placeholder'=>'Agrupación 1','class'=>'form-control','required'])}}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-3">
                                            <div class="form-group ">
                                                {{Form::select('group_by_2[]', $columnas_agrupables, '', ['placeholder'=>'Agrupación 2','class'=>'form-control'])}}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-3">
                                            <div class="form-group">
                                                {{Form::select('group_by_3[]', $columnas_agrupables, '', ['placeholder'=>'Agrupación 3','class'=>'form-control'])}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-4">
                                        <button type="button" id="agregar-tabla" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Agregar Otra Tabla</button>
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
    {{Form::close()}}
@stop
@section('javascript')
    {{HTML::script('js/views/reportes/estadisticassolicitud.js')}}
@endsection