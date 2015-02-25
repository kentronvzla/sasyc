@extends('layouts.master')
@section('contenido')
    <div class="col-xs-12 col-sm-8 col-md-8">
        <div class="panel-group" id="accordion">
            @if($nuevo)
                <div class="panel panel-danger">
                    <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#Panel">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#Panel">
                                Nueva Solicitud
                            </a>
                        </h4>
                    </div>
                    <div id="Panel" class="panel-collapse collapse in">
                        <div class="panel-body">
                            @include('templates.errores')
                            @include('solicitudes.nuevasolicitud')
                        </div>
                    </div>
                </div>
            @else
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
                            {{Form::open(['url'=>'solicitudes/modificar','id'=>'form-solicitud'])}}
                            @include('solicitudes.solicitud')
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
                @unless(is_null($solicitud->id))
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
                                {{Form::open(['url'=>'personas/modificar','id'=>'form-persona','class'=>'saveajax', 'data-callback'=>'grupoFamiliar'])}}
                                @include('solicitudes.beneficiario')
                                {{Form::close()}}
                            </div>
                        </div>
                    </div>
                    @unless($solicitud->ind_mismo_benef)
                        <div class="panel panel-danger">
                            <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#PanelTres">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#PanelTres">
                                        Solicitante
                                    </a>
                                </h4>
                            </div>
                            <div id="PanelTres" class="panel-collapse collapse">
                                <div class="panel-body">
                                    {{Form::open(['url'=>'personas/crear/'.$beneficiario->id.'/false','id'=>'form-persona','class'=>'saveajax','data-callback'=>'solicitanteGuardado'])}}
                                    @include('solicitudes.solicitante')
                                    {{Form::close()}}
                                </div>
                            </div>
                        </div>
                    @endunless
                    @if($solicitud->puedeModificarFamiliarEconomico())
                        <div class="panel panel-danger">
                            <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#PanelCuatro">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#PanelCuatro">
                                        Grupo Familiar
                                    </a>
                                </h4>
                            </div>
                            <div id="PanelCuatro" class="panel-collapse collapse">
                                <div class="panel-body" id='grupo-familiares'>
                                    @include('solicitudes.grupofamiliar')
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-danger">
                            <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#PanelCinco">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#PanelCinco">
                                        Informe Socioeconómico
                                    </a>
                                </h4>
                            </div>
                            <div id="PanelCinco" class="panel-collapse collapse">
                                <div class="panel-body" id="informe-socioeconomico">
                                    @include('solicitudes.informesocioeconomico')
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="panel panel-danger">
                        <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#PanelSeis">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#PanelSeis">
                                    Recaudos
                                </a>
                            </h4>
                        </div>
                        <div id="PanelSeis" class="panel-collapse collapse">
                            <div class="panel-body">
                                @include('solicitudes.recaudos')
                            </div>
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
                                @include('solicitudes.presupuesto')
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
                                @include('solicitudes.galeriafotos')
                            </div>
                        </div>
                    </div>
                    <!-------------------------------------------------------------------->
                @endunless
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 hidden-xs">
        <div class="panel-group" id="accordionlateral">
            <div class="panel panel-danger">
                <div class="panel-heading" data-toggle="collapse" data-parent="#accordionlateral" href="#PanelAyuda">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordionlateral" href="#PanelAyuda">
                            Sección de ayuda
                        </a>
                    </h4>
                </div>
                <div id="PanelAyuda" class="panel-collapse collapse collapse in">
                    <div class="panel-body">
                        <p>Sitúe el cursor en un campo para ver mas información.</p>
                        <div class="row alert-warning text-justify" id="contenedor-ayudas" style="padding: 5px;">
                        </div>
                    </div>
                </div>
            </div>
            <div id="div-cne" class="panel panel-danger" style="display:none;">
                <div class="panel-heading">CNE</div>
                <div class="panel-body text-center">
                    <div class="row alert-warning text-justify" data-id="" style="padding: 5px;">
                        <iframe id="icne" src="" width="370px" height="510px" ></iframe>
                    </div>
                </div>
            </div>
            @unless(is_null($solicitud->id))
                <div id="div-bitacora" class="panel panel-danger" style="display:block;">
                    <div class="panel-heading" data-toggle="collapse" data-parent="#accordionlateral" href="#PanelBitacora">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordionlateral" href="#PanelBitacora">
                                Bitácora
                            </a>
                        </h4>
                    </div>
                    <div id="PanelBitacora" class="panel-collapse collapse">
                        <div class="panel-body">
                            @include('solicitudes.bitacora')
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
                        <div class="text-center">
                            <a target="_blank" href="{{url('solicitudes/ver/'.$solicitud->id)}}" class="btn btn-primary btn-lg">
                                <span class="glyphicon glyphicon-search"></span> Ver
                            </a>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-lg dropdown-toggle" data-toggle="dropdown">
                                    <span class="glyphicon glyphicon-print"></span> Imprimir <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>{{HTML::link('solicitudes/planilla/'.$solicitud->id, 'Planilla', ['target'=>'_blank'])}}</li>
                                    @if($solicitud->TipoVivienda && $solicitud->Tenencia)
                                        <li>{{HTML::link('solicitudes/informe/'.$solicitud->id, 'Informe Socioeconomico', ['target'=>'_blank'])}}</li>
                                    @endif
                                    <li>{{HTML::link('solicitudes/bitacora/'.$solicitud->id, 'Bitacora', ['target'=>'_blank'])}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endunless
        </div>
    </div>
@stop
@section('javascript')
    {{HTML::script('js/views/solicitudes/solicitud.js')}}
@stop