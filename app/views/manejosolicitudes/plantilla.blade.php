@extends('layouts.master')
@section('contenido')
<div class="col-xs-12 col-sm-8 col-md-8">			
    <div class="panel-group" id="accordion">
        <div class="panel panel-danger">
            <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#PanelUno">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#PanelUno">
                        Solicitud
                    </a>
                </h4>
            </div>
            <div id="PanelUno" class="panel-collapse collapse in">
                <div class="panel-body">
                    @include('manejosolicitudes.solicitud')
                </div>
            </div>
        </div>
        <div class="panel panel-danger">
            <div class="panel-heading"  data-toggle="collapse" data-parent="#accordion" href="#PanelDos">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#PanelDos">
                        Beneficiario
                    </a>
                </h4>
            </div>
            <div id="PanelDos" class="panel-collapse collapse">                
                <div class="panel-body">
                    @include('manejosolicitudes.beneficiario')
                </div>
            </div>
        </div>
        <div class="panel panel-danger">
            <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#PanelTres">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#PanelTres">
                        Solicitante
                    </a>
                </h4>
            </div>
            <div id="PanelTres" class="panel-collapse collapse">
                @include('manejosolicitudes.solicitante')
            </div>
        </div>
        <div class="panel panel-danger">
            <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#PanelCuatro">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#PanelCuatro">
                        Grupo Familiar
                    </a>
                </h4>
            </div>
            <div id="PanelCuatro" class="panel-collapse collapse">
                @include('manejosolicitudes.grupofamiliar')
            </div>
        </div>
        <div class="panel panel-danger">
            <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#PanelCinco">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#PanelCinco">
                        Informe Socioeconómino
                    </a>
                </h4>
            </div>
            <div id="PanelCinco" class="panel-collapse collapse">
                @include('manejosolicitudes.informesocioeconomico')
            </div>
        </div>

        <div class="panel panel-danger">
            <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#PanelSeis">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#PanelSeis">
                        Recaudos
                    </a>
                </h4>
            </div>
            <div id="PanelSeis" class="panel-collapse collapse">
                @include('manejosolicitudes.recaudos')
            </div>
        </div>
        <div class="panel panel-danger">
            <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#PanelSiete">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#PanelSiete">
                        Presupuesto
                    </a>
                </h4>
            </div>
            <div id="PanelSiete" class="panel-collapse collapse">
                <div class="panel-body">
                    @include('manejosolicitudes.presupuesto')
                </div>
            </div>
        </div>   
        <div class="panel panel-danger">
            <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#PanelOcho">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#PanelOcho">
                        Galeria Fotos
                    </a>
                </h4>
            </div>
            <div id="PanelOcho" class="panel-collapse collapse">
                <div class="panel-body">
                    @include('manejosolicitudes.subirfotos')
                </div>
            </div>
        </div>         
    </div>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 hidden-xs">
    <div class="panel panel-default">
        <div class="panel-heading">Sección de ayuda</div>
        <div class="panel-body text-center">
            <p>Sitúe el cursor en un campo para ver mas información.</p>
            <div class="row alert-warning text-justify" id="contenedorAyuda" data-id="" style="padding: 5px;">
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Solicitud</div>
        <div class="panel-body">
            <div id="contenedorBarraCarga">
            </div>
            <div class="text-center">
                <a target="_blank" href="#" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-search"></span> Ver</a>
                <div class="btn-group">
                    <button type="button" class="btn btn-info btn-lg dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-print"></span> Imprimir <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Planilla</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('js-include')
{{HTML::script('js/views/candidato/plantilla.js')}}
@stop
