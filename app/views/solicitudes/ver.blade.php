@extends('layouts.master')
@section('contenido')
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="col-xs-12 col-sm-8 col-md-8">
    <table class="table table-bordered">
        <tr>
            <td class="success" style="background-color: #F2DEDE">
                <strong>Solicitud</strong>
            </td>
        </tr>
        <tr>
            <td style="background-color: #fff">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        {{Form::display($solicitud,'descripcion',9, true)}}
                        {{Form::display($solicitud,'ind_inmediata',3)}}
                        {{Form::display($solicitud,'referente->nombre',9, true)}}
                        {{Form::display($solicitud,'area->nombre',3)}}
                        @if ($solicitud->ind_inmediata)
                            {{Form::display($solicitud,'actividad',5)}}
                            {{Form::display($solicitud,'referencia',4)}}
                            {{Form::display($solicitud,'accion_tomada',3)}}
                        @endif
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td style="background-color: #F2DEDE">
                <strong>Beneficiario</strong>
            </td>
        </tr>
        <tr>
            <td style="background-color: #fff">
                <div class="row">
                {{Form::display($solicitud->personaBeneficiario,'nombre',3)}}
                {{Form::display($solicitud->personaBeneficiario,'apellido',3)}}
                {{Form::display($solicitud->personaBeneficiario,'ci',3)}}
                {{Form::display($solicitud->personaBeneficiario,'sexo',3)}}
                </div>
                <div class="row">
                {{Form::display($solicitud->personaBeneficiario,'estadoCivil->nombre',3)}}
                {{Form::display($solicitud->personaBeneficiario,'fecha_nacimiento',3)}}
                {{Form::display($solicitud->personaBeneficiario,'edad',3)}}
                {{Form::display($solicitud->personaBeneficiario,'ind_trabaja',3)}}
                </div>
                <div class="row">
                {{Form::display($solicitud->personaBeneficiario,'ocupacion',3)}}
                {{Form::display($solicitud->personaBeneficiario,'nivelAcademico->nombre',3)}}
                {{Form::display($solicitud->personaBeneficiario,'ingreso_mensual',3)}}
                {{Form::display($solicitud->personaBeneficiario,'ind_asegurado',3)}}
                </div>
                <div class="row">
                @if ($solicitud->personaBeneficiario->ind_asegurado)
                    {{Form::display($solicitud->personaBeneficiario,'empresa_seguro',3)}}
                    {{Form::display($solicitud->personaBeneficiario,'cobertura',3)}}
                @endif
                {{Form::display($solicitud->personaBeneficiario,'otro_apoyo',3)}}
                </div>                        
            </td>
        </tr>
        <tr>
            <td style="background-color: #F2DEDE">
                <strong>Direccion</strong>
            </td>
        </tr>
        <tr>
            <td style="background-color: #fff">
                <div class="row">
                {{Form::display($solicitud->personaBeneficiario,'parroquia->nombre',3)}}
                {{Form::display($solicitud->personaBeneficiario,'parroquia->municipio->nombre',3)}}
                {{--Form::display($solicitud->personaBeneficiario,'parroquia->municipio->estado->nombre',3)--}}
                {{Form::display($solicitud->personaBeneficiario,'telefono_fijo',3)}}
            </div>
            <div class="row">
                {{Form::display($solicitud->personaBeneficiario,'zona_sector',3)}}
                {{Form::display($solicitud->personaBeneficiario,'calle_avenida',3)}}
                {{Form::display($solicitud->personaBeneficiario,'apto_casa',3)}}
                {{Form::display($solicitud->personaBeneficiario,'telefono_celular',3)}}
            </div>
            </td>
        </tr>
        <tr>
            <td style="background-color: #F2DEDE">
                <strong>Presupuesto</strong>
            </td>
        </tr>
        <tr>
            <td style="background-color: #fff">
               <div class="row">
                {{HTML::simpleTable($solicitud->presupuestos, 'Presupuesto')}}
               </div>
            </td>
        </tr>
    </table>
</div>

<div class="col-xs-12 col-sm-4 col-md-4 hidden-xs">
    <div id="div-bitacora" class="panel panel-danger">
        <div class="panel-heading" data-toggle="collapse" data-parent="#accordionlateral" href="#PanelBitacora">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordionlateral" href="#PanelBitacora">            
                    Bitácora
                </a>
            </h4>
        </div>
        <div id="PanelBitacora" class="panel-collapse collapse">
            <div class="panel-body">

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
                <a target="_blank" href="{{url('solicitudes/ver/'.$solicitud->id)}}" class="btn btn-primary btn-lg">
                    <span class="glyphicon glyphicon-search"></span> Ver
                </a>
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
</div>
@stop