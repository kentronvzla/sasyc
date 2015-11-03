@extends('layouts.master')
@section('contenido')
<div class="col-xs-12 col-sm-8 col-md-8">
    <h3>Numero de solicitud:&nbsp;{{$solicitud->num_solicitud or ""}}</h3>
    <h4>Referencia de solicitud:&nbsp;{{$solicitud->id or ""}}</h4>
    <div class="panel-group" id="accordion">
        <div class="panel panel-danger">
            <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#Panel">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#Panel">
                        Planilla de Solicitud
                    </a>
                </h4>
            </div>
            <div id="Panel" class="panel-collapse collapse in">
                <div class="panel-body">
                    @include('solicitudes.vistadeplanilla')
                </div>
            </div>
        </div>
        <div class="panel panel-danger">
            <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#PanelUno">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#PanelUno">
                        Informe Socioeconomico
                    </a>
                </h4>
            </div>
            <div id="PanelUno" class="panel-collapse collapse in">
                <div class="panel-body">
                    @if ($solicitud->tipoVivienda && $solicitud->tenencia)
                    @include('solicitudes.vistadeinforme')
                    @else
                    No existe informe asociado
                    @endif
                </div>
            </div>
        </div>
        <div class="panel panel-danger">
            <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#PanelDos">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#PanelDos">
                        Recaudos Consignados
                    </a>
                </h4>
            </div>
            <div id="PanelUno" class="panel-collapse collapse in">
                <div class="panel-body">
                    @if($recaudos->count()>0)
                    {{HTML::simpleTable($recaudos, 'RecaudoSolicitud')}}
                    @else
                    <div class="row tituloLista">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <h4>No posee recaudos relacionados</h4>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>          
        <div class="panel panel-danger">
            <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#PanelDos">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#PanelDos">
                        Galeria
                    </a>
                </h4>
            </div>
            <div id="PanelUno" class="panel-collapse collapse in">
                <div class="panel-body">
                    <ul id='gallery'>
                        @foreach($fotos as $ft)
                        <li class="loaded">
                            <a href="{{$ft->url}}">
                                <img src="{{$ft->url}}" title="{{$ft->descripcion}}">
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>        
    </div>
</div>
<!--------------------------------------------------------------------------------------->
<div class="col-xs-12 col-sm-4 col-md-4 hidden-xs">
    <div id="div-bitacora" class="panel panel-danger">
        <div class="panel-heading" data-toggle="collapse" data-parent="#accordionlateral" href="#PanelBitacora">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordionlateral" href="#PanelBitacora">
                    Bitácora
                </a>
            </h4>
        </div>
        <div id="PanelBitacora" class="panel-collapse collapse in">
            <div class="panel-body">
                {{HTML::simpleTable($solicitud->bitacoras, 'Bitacora')}}
            </div>
        </div>
    </div>
    <div class="panel panel-danger">
        <div class="panel-heading" data-toggle="collapse" data-parent="#accordionlateral" href="#PanelPlanilla">
            <h4 class="panel-title">
                Planilla
            </h4>
        </div>
        <div class="panel-body">
            <div id="contenedorBarraCarga">
            </div>
            <div class="text-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-info btn-lg dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-print"></span> Imprimir <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>{{HTML::link('solicitudes/planilla/'.$solicitud->id, 'Planilla', ['target'=>'_blank'])}}</li>
                        <li>{{HTML::link('solicitudes/informe/'.$solicitud->id, 'Informe Socioeconomico', ['target'=>'_blank'])}}</li>
                        <li>{{HTML::link('solicitudes/bitacora/'.$solicitud->id, 'Bitacora', ['target'=>'_blank'])}}</li>
                        @if ($solicitud->estatus == 'PPA' || $solicitud->estatus == 'APR'  || $solicitud->estatus == 'ACA')
                        <li>{{HTML::link('reportes/puntomemo/'.$solicitud->id, 'Punto / Memo', ['target'=>'_blank'])}}</li>
                        @endif

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@section('javascript')
{{HTML::script('js/views/solicitudes/planilla.js')}}
@stop
@stop