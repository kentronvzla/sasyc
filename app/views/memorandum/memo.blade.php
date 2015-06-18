@extends('layouts.master')
@section('contenido')
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="col-xs-12 col-sm-8 col-md-8">
    <!------------------------------------------------------>    
       <table class="table table-bordered" border="0">
            <tr>
                <td class="danger">
                    <center><strong>Vista de Memorandun</strong></center>
                </td>
            </tr>
        </table>
    <br>
    <!------------------------------------------------------>
        <div class="cuerpo" style="position: center">
            <table width="100%" border="0" cellpadding="10" cellspacing="5">
                <tr>
                <td style="background: white;">
                    {{HTML::image('img/logoReporte.jpg')}}
                </td>
                </tr>
                <tr>
                    <td style="background: white;">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                               <strong>
                                   <center>Republica Bolivariana de Venezuela</center>
                               </strong>
                            </div>
                        </div>
                    </td>
                </tr>
                 <tr>
                    <td style="background: white;">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                               <strong>
                                   <center>Ministerio del poder Popular del Despacho de la Presidencia</center>
                               </strong>   
                            </div>
                        </div>
                    </td>
                </tr>
                  <tr>
                    <td style="background: white;">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>
                                    <center>Fundacion pueblo Soberano</center>
                                </strong>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <!------------------------------------------------------>
        <br>
        <div class="cuerpo" style="position: center">
            <table width="100%" border="0" cellpadding="10" cellspacing="5">
                <tr><td width=170 style="background: white;">
                        <strong>Para:</strong>
                    </td>
                    <td width=500 style="background: white;">
                        {{$memos->destino->nombre or "No se encontro departamento"}}
                    </td>
                </tr>
                <tr><td style="background: white;">
                        <strong>De:</strong>
                    </td>
                    <td style="background: white;">
                        {{$memos->origen->nombre or "No se encontro departamento"}}
                    </td>
                </tr>
                <tr>
                    <td style="background: white;">
                        <strong>Asunto:</strong>
                    </td>
                    <td style="background: white;">
                        {{$memos->asunto}}
                    </td>
                </tr>
                <tr>
                    <td style="background: white;">
                        <strong>Fecha:</strong>
                    </td>
                    <td style="background: white;">
                        {{$memos->fecha->format('d/m/Y')}}
                    </td>
                </tr>
            </table>
        </div>
        <!------------------------------------------------------>
        <br>
        <div class="cuerpo" style="position: center">
            <table width="100%" border="0" cellpadding="10" cellspacing="10">
                <tr>
                    <td width=670 ALIGN=CENTER style="background: white;">
                         <strong>Listado de casos por fecha y codigo se anexan 
                        ({{$memos->solicitudes->count()}}) expedientes</strong>
                    </td>
                </tr>
            </table>
        </div>
        <!------------------------------------------------------>
        <br>
        <div class="cuerpo" style="position: center">
             @include('memorandum.tablamemo')
        </div>
    </div>
 <!------------------------------------------------------------------------------------->   
    <div class="col-xs-12 col-sm-4 col-md-4 hidden-xs">
        <div class="panel panel-danger">
            <div class="panel-heading" data-toggle="collapse" data-parent="#accordionlateral" href="#PanelPlanilla">
                <h4 class="panel-title">
                    Memorandum
                </h4>
            </div>
            <div class="panel-body">
                <div id="contenedorBarraCarga">
                </div>
                <div class="text-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-info btn-lg dropdown-toggle" data-toggle="dropdown">
                             @if(Usuario::puedeAcceder('GET.memorandum.imprimir'))
                            <span class="glyphicon glyphicon-print"></span> Imprimir <span class="caret"></span>
                             @endif
                        </button>
                        <ul class="dropdown-menu" role="menu">
                             <li><a href="{{url('memorandum/imprimir/'.$memos->id)}}">Memorandum</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop