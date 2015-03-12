@extends('layouts.master')
@section('contenido')
    {{Form::busqueda(['url'=>'reportes/general','method'=>'POST'])}}
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h4 class="panel-title">
                    Búsqueda
                </h4>
            </div>
            <div class="panel-body">
                @include('reportes.buscarxsolicitud')
                @include('reportes.buscarxbeneficiario')
                @include('reportes.buscarxsolicitante')
                @include('reportes.buscarxlugar')
                @include('reportes.buscarxfecha')
              
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-file"></i> Generar Reporte</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop