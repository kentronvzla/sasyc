<style>
    .cuerpo {
        font-family:  Arial, Helvetica, sans-serif;
        font-size: 12px;
    }
    .titulo {font-family:  Arial, Helvetica, sans-serif}
</style>

<page backcolor="#FEFEFE" backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm" footer="date;heure;page">

    <!------------------------------------------------------------------------->
    <div class="cuerpo" style="position: center">
        <table width="100%" border="0" cellpadding="10" cellspacing="0">
            <tr>
                <td>
                    {{HTML::image('img/logoReporte.jpg');}}
                </td>
                <td width=600>
                    <table width="100%" border="0" cellpadding="0" cellspacing="10">
                        <tr>
                            <td width=400 ALIGN=CENTER style=' font-size: 14px;'>
                                <strong>Sistema de Atención Social y Civil</strong>
                            </td>
                            <td width=150 ALIGN=CENTER style=' font-size: 14px;'>
                                <strong>Fecha de la solicitud: </strong>
                                {{$solicitud->fecha_solicitud->format('d/m/Y')}}
                            </td>
                        </tr>
                        <tr>
                            <td width=400 ALIGN=CENTER style=' font-size: 14px;'>
                                <strong>(SASYC)</strong>
                            </td>
                            <td width=150 ALIGN=CENTER style=' font-size: 14px;'>
                                <strong>Número de la solicitud: </strong>
                                {{$solicitud->id or ""}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <hr width="100%"> 
    <h3>Informe Social</h3>
    <div class="cuerpo">
        <table width="100%" border="0" cellpadding="5" cellspacing="0">
            <tr>
                <td >
                    <strong>Descripción:</strong>
                </td> 
                <td width=420>
                    {{$solicitud->descripcion or ""}}
                </td>
                <td>
                    <strong>Estatus:</strong>
                </td>
                <td>{{$solicitud->estatus or ""}}</td>
            </tr>
            <tr>
                <td>
                    <strong>Referido por:</strong>
                </td> 
                <td width=420>
                    {{$solicitud->referente->nombre or ""}}
                </td>
                <td>
                    <strong>Tipo ayuda:</strong> 
                </td>
                <td>{{$solicitud->tipo_proc or ""}}</td>
            </tr>
            <tr>
                <td>
                    <strong>Necesidad:</strong>
                </td>
                <td width=420>{{$solicitud->necesidad or ""}}</td>
                <td><strong>Area::</strong></td>
                <td>{{$solicitud->area->nombre or ""}}</td>
            </tr>
            <tr>
                <td>
                    <strong>Observación:</strong>
                </td>
                <td width=420>{{$solicitud->observaciones or ""}}</td>
                <td><strong>Atencion inmediata:</strong></td>
                <td>{{$solicitud->ind_inmediata ? "Si":"No"}}</td>
            </tr>
        </table>
        @if ($solicitud->ind_inmediata)
        <table width="100%" border="0" cellpadding="5" cellspacing="0">
            <tr>
                <td width=170>
                    <strong>Actividad</strong><br>a
                    {{$solicitud->actividad}}
                </td> 
                <td width=170>
                    <strong>Referencia</strong>
                    {{$solicitud->referencia or ""}}
                </td>
                <td width=170>
                    <strong>Acción tomada</strong><br>c
                    {{$solicitud->accion_tomada or ""}}
                </td>
                <td></td>
            </tr>
        </table>
        @endif
    </div><br>
    <hr width="100%">
    <h3>Datos personales del beneficiario</h3>
    <div class="cuerpo">
        <table width="100%" border="0" cellpadding="10" cellspacing="10">
            <tr>
                <td width=150>
                    <strong>Nombre: </strong>&nbsp;
                    {{$beneficiario->nombre or ""}}
                </td>
                <td width=150>
                    <strong>Apellido: </strong>&nbsp;
                    {{$beneficiario->apellido or ""}}
                </td>
                <td width=150>
                    <strong>Cedula: </strong>&nbsp;
                    {{$beneficiario->ci or ""}}
                </td>
                <td width=120>
                    <strong>Sexo: </strong>&nbsp;
                    {{$beneficiario->sexo or ""}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Estado Civil:</strong><br>
                </td>
                <td>
                    <strong>Fecha de Nacimiento:</strong>&nbsp;
                    {{$beneficiario->fecha_nacimiento!=null ? $beneficiario->fecha_nacimiento->format('d/m/Y'):""}}
                </td>
                <td>
                    <strong>Edad:</strong>&nbsp;
                    {{$beneficiario->edad or ""}}
                </td>
                <td>
                    <strong>Trabaja?</strong>&nbsp;
                    {{$solicitud->personaBeneficiario->ind_trabaja ? "Si":"No"}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Ocupación:</strong>&nbsp;
                    {{$beneficiario->ocupacion or ""}}
                </td>
                <td>
                    <strong>Nivel Académico:</strong>
                </td>
                <td>
                    <strong>Ingreso Mensual:</strong>&nbsp;
                    {{$beneficiario->ingreso_mensual or ""}}
                </td>
                <td>
                    <strong>Asegurado?:</strong>&nbsp;
                    {{$solicitud->personaBeneficiario->ind_asegurado ? "Si":"No"}}
                </td>
            </tr>

            <tr>
                <td>
                    <strong>Empresa de Seguro:</strong>&nbsp;
                    {{$beneficiario->empresa_seguro or ""}}
                </td>
                <td>
                    <strong>Cobertura:</strong>&nbsp;
                    {{$beneficiario->cobertura or ""}}
                </td>
                <td>
                    <strong>Otro Apoyo</strong>&nbsp;
                    {{$beneficiario->otro_apoyo or ""}}
                </td>
                <td></td>
            </tr>

        </table>
    </div>
    <h3>Dirección de habitacion</h3>
    <div class="cuerpo">
        <table width="100%" border="0" cellpadding="10" cellspacing="10">
            <tr>
                <td width=150>
                    <strong>Parroquia:</strong>&nbsp;
                    {{$beneficiario->parroquia->nombre or ""}}
                </td>
                <td width=150>
                    <strong>Municipio:</strong>&nbsp;
                    {{$beneficiario->parroquia->municipio->nombre or ""}}
                </td>
                <td width=150>
                    <strong>Estado:</strong>&nbsp;
                    {{$beneficiario->parroquia->municipio->estado->nombre or ""}}
                </td>
                <td width=150>
                    <strong>Teléfono Fijo:</strong>&nbsp;
                    {{$beneficiario->telefono_fijo}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Zona o Sector:</strong>&nbsp;
                    {{$beneficiario->zona_sector or ""}}
                </td>
                <td>
                    <strong>Calle o Avenida:</strong>&nbsp;
                    {{$beneficiario->calle_avenida or ""}}
                </td>
                <td>
                    <strong>Apto/Casa Nro:</strong>&nbsp;
                    {{$beneficiario->apto_casa or ""}}
                </td>
                <td>
                    <strong>Teléfono Celular:</strong>&nbsp;
                    {{$beneficiario->telefono_celular or ""}}
                </td>
            </tr>
        </table>
    </div>
    <hr width="100%">

    <!----------------------------------------------------------------------------->
    @if($solicitud->personaSolicitante->ci!=$beneficiario->ci)  
    <h3>Datos personales de solicitante</h3>
    <div class="cuerpo">
        <table width="100%" border="0" cellpadding="10" cellspacing="10">
            <tr>
                <td width="25%">
                    <strong>Nombre:</strong>&nbsp;
                    {{$solicitud->personaSolicitante->nombre or ""}}
                </td>
                <td width="25%">
                    <strong>Apellido</strong>&nbsp;
                    {{$solicitud->personaSolicitante->apellido or ""}}
                </td>
                <td width="25%">
                    <strong>Cedula:</strong>&nbsp;
                    {{$solicitud->personaSolicitante->ci or ""}}
                </td>
                <td width="25%">
                    <strong>Sexo:</strong>&nbsp;
                    {{$solicitud->personaSolicitante->sexo or ""}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Estado Civil:</strong><br>
                </td>
                <td>
                    <strong>Fecha de Nacimiento:</strong>&nbsp;
                    {{$solicitud->personaSolicitante->fecha_nacimiento!=null ? $beneficiario->fecha_nacimiento->format('d/m/Y'):""}}
                </td>
                <td>
                    <strong>Edad:</strong>&nbsp;
                    {{$solicitud->personaSolicitante->edad or ""}}
                </td>
                <td>
                    <strong>Trabaja?</strong>&nbsp;
                    {{$solicitud->personaSolicitante->ind_trabaja ? "Si":"No"}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Ocupación:</strong>&nbsp;
                    {{$solicitud->personaSolicitante->ocupacion or ""}}
                </td>
                <td>
                    <strong>Nivel Académico:</strong>&nbsp;
                </td>
                <td>
                    <strong>Ingreso Mensual:</strong>&nbsp;
                    {{$solicitud->personaSolicitante->ingreso_mensual or ""}}
                </td>
                <td>
                    <strong>Asegurado?:</strong>&nbsp;
                    {{$solicitud->personaSolicitante->ind_asegurado ? "Si":"No"}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Empresa de Seguro:</strong>&nbsp;
                    {{$solicitud->personaSolicitante->empresa_seguro or ""}}
                </td>
                <td>
                    <strong>Cobertura:</strong>&nbsp;
                    {{$solicitud->personaSolicitante->cobertura or ""}}
                </td>
                <td>
                    <strong>Otro Apoyo</strong>&nbsp;
                    {{$solicitud->personaSolicitante->otro_apoyo or ""}}
                </td>
                <td></td>
            </tr>

        </table>
    </div>
    <h3>Dirección de habitación</h3>
    <div class="cuerpo">
        <table width="100%" border="0" cellpadding="10" cellspacing="10">
            <tr>
                <td width="25%">
                    <strong>Parroquia:</strong>&nbsp;
                    {{$beneficiario->parroquia->nombre or ""}}
                </td>
                <td width="25%">
                    <strong>Municipio:</strong>&nbsp;
                    {{$beneficiario->parroquia->municipio->nombre or ""}}
                </td>
                <td width="25%">
                    <strong>Estado:</strong>&nbsp;
                    {{$beneficiario->parroquia->municipio->estado->nombre or ""}}
                </td>
                <td width="25%">
                    <strong>Teléfono Fijo:</strong>&nbsp;
                    {{$beneficiario->telefono_fijo}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Zona o Sector:</strong>&nbsp;
                    {{$beneficiario->zona_sector or ""}}
                </td>
                <td>
                    <strong>Calle o Avenida:</strong>&nbsp;
                    {{$beneficiario->calle_avenida or ""}}
                </td>
                <td>
                    <strong>Apto/Casa Nro:</strong>&nbsp;
                    {{$beneficiario->apto_casa or ""}}
                </td>
                <td>
                    <strong>Teléfono Celular:</strong>&nbsp;
                    {{$beneficiario->telefono_celular or ""}}
                </td>
            </tr>
        </table>
    </div>
    <hr width="100%">
    @endif
</page>
<!------------------------------------------------------------------------->
<page page backcolor="#FEFEFE" backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm" footer="date;heure;page">
    <div class="cuerpo">
        <h3>Presupuesto</h3>
    </div>
    <!------------------------------------------------------------------------->
    <br>
    <div class="cuerpo" style="position: center">
        @if($solicitud->presupuestos->count()>0)
        @include('solicitudes.tablapresupuesto')
        @else
        <p> <strong>No existe presupuesto asociado a esta solicitud</strong> </p>
        @endif
    </div>
</page>
