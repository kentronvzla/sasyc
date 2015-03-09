@extends('layouts.master')
@section('contenido')

<div class="col-xs-12 col-sm-3 col-md-3">
    <div class="panel panel-danger">
        <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#Panel">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#Panel">
                 Buscar por
                </a>
            </h4>
        </div>
        <div id="Panel" class="panel-collapse collapse in">
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="#">General</a></li>
                    <li><a href="#">Casos Resueltos</a></li>
                    <li><a href="#">Casos Pendientes</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-9 col-md-9">
    <div class="panel panel-danger">
        <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#Panel">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#Panel">
                Filtros
                </a>
            </h4>
        </div>
        <div id="Panel" class="panel-collapse collapse in">
            <div class="panel-body">
                
            </div>
        </div>
    </div>
</div>
@stop