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
        @include('solicitudes.cabecerareporte')
    </div>
    <hr width="100%"> 
    <h3>Informe Social</h3>
    <div class="cuerpo">
        <table border="0" cellpadding="5" cellspacing="0">
            <tr>
                <td style="width: 80px;height: auto;">
                    <strong>Descripción:</strong>
                </td> 
                <td style="width: 420px;height: auto;">
                    {{$solicitud->descripcion or ""}}
                </td>
                <td style="width:180px;height: auto;">
                    
                </td>
            </tr>
            <tr>
                <td style="width: 80px;height: auto;">
                    <strong>Referido por:</strong>
                </td> 
                <td style="width: 420px;height: auto;">
                    {{$solicitud->referente->nombre or ""}}
                </td>
                <td style="width:180px;height: auto;">
                    <strong>Tipo ayuda:</strong>&nbsp;
                    {{$solicitud->area->tipoAyuda->nombre or ""}}
                </td>
            </tr>
            <tr>
                <td style="width: 80px;height: auto;">
                    <strong>Necesidad:</strong>
                </td>
                <td style="width: 420px;height: auto;">
                    {{$solicitud->necesidad or ""}}
                </td>
                <td style="width: 180px;height: auto;">
                    <strong>Area:</strong>&nbsp;
                    {{$solicitud->area->nombre or ""}}
                </td>
            </tr>
            <tr>
                <td style="width: 80px;height: auto;">
                    <strong>Observación:</strong>
                </td>
                <td style="width: 420px;height: auto;">
                    {{$solicitud->observaciones or ""}}
                </td>
                <td style="width: 180px;height: auto;">
                    <strong>Atencion inmediata:</strong>&nbsp;
                    {{$solicitud->ind_inmediata ? "Si":"No"}}
                </td>
            </tr>
        </table><br>
         @if ($solicitud->ind_inmediata)
        <table width="100%" border="0" cellpadding="5" cellspacing="0">
            <tr>
                <td style="width: 226px;height: auto;">
                    <strong>Actividad:</strong>&nbsp;
                    {{$solicitud->actividad or ""}}
                </td> 
                <td style="width: 226px;height: auto;">
                    <strong>Referencia:</strong>&nbsp;
                    {{$solicitud->referencia or ""}}
                </td>
                <td style="width: 228px;height: auto;">
                    <strong>Acción tomada:</strong>&nbsp;
                    {{$solicitud->accion_tomada or ""}}
                </td>
            </tr>
        </table>
        @endif
    </div><br>
    <hr width="100%">
    <!------------------------------------------------------------------------->
    <h3>Datos personales del beneficiario</h3>
    <div class="cuerpo">
        <table border="0" cellpadding="5" cellspacing="0">
            <tr>
                <td style="width: 160px;height: auto;">
                    <strong>Nombre: </strong>&nbsp;
                    {{$beneficiario->nombre or ""}}
                </td>
                <td style="width: 200px;height: auto;">
                    <strong>Apellido: </strong>&nbsp;
                    {{$beneficiario->apellido or ""}}
                </td>
                <td style="width: 220px;height: auto;">
                    <strong>Cedula: </strong>&nbsp;
                    {{$beneficiario->ci or ""}}
                </td>
                <td style="width: 100px;height: auto;">
                    <strong>Sexo: </strong>&nbsp;
                    {{$beneficiario->sexo or ""}}
                </td>
            </tr>
            <tr>
                <td style="width: 160px;height: auto;">
                    <strong>Estado Civil:</strong><br>
                </td>
                <td style="width: 200px;height: auto;">
                    <strong>Fecha de Nacimiento:</strong>&nbsp;
                    {{$beneficiario->fecha_nacimiento!=null ? $beneficiario->fecha_nacimiento->format('d/m/Y'):""}}
                </td>
                <td style="width: 220px;height: auto;">
                    <strong>Edad:</strong>&nbsp;
                    {{$beneficiario->edad or ""}}
                </td>
                <td style="width: 100px;height: auto;">
                    <strong>Trabaja?:</strong>&nbsp;
                    {{$solicitud->ind_trabaja ? "Si":"No"}}
                </td>
            </tr>
            <tr>
                <td style="width: 160px;height: auto;">
                    <strong>Ocupación:</strong>&nbsp;
                    {{$beneficiario->ocupacion or ""}}
                </td>
                <td style="width: 200px;height: auto;">
                    <strong>Nivel Académico:</strong>&nbsp;
                    {{$beneficiario->nivelAcademico->nombre or ""}}
                </td>
                <td style="width: 220px;height: auto;">
                    <strong>Ingreso Mensual:</strong>&nbsp;
                    {{$beneficiario->ingreso_mensual or ""}}
                </td>
                <td style="width: 100px;height: auto;">
                    <strong>Asegurado?:</strong>&nbsp;
                    {{$beneficiario->ind_asegurado ? "Si":"No"}}
                </td>
            </tr>
            <tr>
                <td style="width: 160px;height: auto;">
                    <strong>Empresa de Seguro:</strong>&nbsp;
                    {{$beneficiario->seguro_id or ""}}
                </td>
                <td style="width: 200px;height: auto;">
                    <strong>Cobertura:</strong>&nbsp;
                    {{$beneficiario->cobertura or ""}}
                </td>
                <td style="width: 220px;height: auto;">
                    <strong>Otro Apoyo:</strong>&nbsp;
                    {{$beneficiario->otro_apoyo or ""}}
                </td>
                <td style="width: 100px;height: auto;"></td>
            </tr>
        </table>
    </div>
    <h3>Dirección de habitacion</h3>
    <div class="cuerpo">
        <table  border="0" cellpadding="5" cellspacing="0">
            <tr>
                <td style="width: 180px;height: auto;">
                    <strong>Estado:</strong>&nbsp;
                    {{$beneficiario->parroquia->municipio->estado->nombre or ""}}
                </td>
                <td style="width: 200px;height: auto;">
                    <strong>Municipio:</strong>&nbsp;
                    {{$beneficiario->parroquia->municipio->nombre or ""}}
                </td>
                <td style="width: 160px;height: auto;">
                    <strong>Parroquia:</strong>&nbsp;
                    {{$beneficiario->parroquia->nombre or ""}}
                </td>
                <td style="width: 140px;height: auto;">
                    <strong>Tlf. Fijo:</strong>&nbsp;
                    {{$beneficiario->telefono_fijo or ""}}
                </td>
            </tr>
             <tr>
                <td style="width: 160px;height: auto;">
                    <strong>Zona o Sector:</strong>&nbsp;
                    {{$beneficiario->zona_sector or ""}}
                </td>
                <td style="width: 200px;height: auto;">
                    <strong>Calle o Avenida:</strong>&nbsp;
                    {{$beneficiario->calle_avenida or ""}}
                </td>
                <td style="width: 180px;height: auto;">
                    <strong>Apto/Casa Nro:</strong>&nbsp;
                    {{$beneficiario->apto_casa or ""}}
                </td>
                <td style="width: 140px;height: auto;">
                    <strong>Tlf. Celular:</strong>&nbsp;
                    {{$beneficiario->telefono_celular or ""}}
                </td>
            </tr>
        </table>
    </div>
    <hr width="100%">
    <!------------------------------------------------------------------------->
    @if(!$solicitud->ind_mismo_benef && $solicitud->personaSolicitante->ci!=$beneficiario->ci)  
    <h3>Datos personales de solicitante</h3>
    <div class="cuerpo">
        <table border="0" cellpadding="5" cellspacing="0">
            <tr>
                <td style="width: 160px;height: auto;">
                    <strong>Nombre: </strong>&nbsp;
                    {{$solicitud->personaSolicitante->nombre or ""}}
                </td>
                <td style="width: 200px;height: auto;">
                    <strong>Apellido: </strong>&nbsp;
                    {{$solicitud->personaSolicitante->apellido or ""}}
                </td>
                <td style="width: 220px;height: auto;">
                    <strong>Cedula: </strong>&nbsp;
                    {{$solicitud->personaSolicitante->ci or ""}}
                </td>
                <td style="width: 100px;height: auto;">
                    <strong>Sexo: </strong>&nbsp;
                    {{$solicitud->personaSolicitante->sexo or ""}}
                </td>
            </tr>
            <tr>
                <td style="width: 160px;height: auto;">
                    <strong>Estado Civil:</strong><br>
                </td>
                <td style="width: 200px;height: auto;">
                    <strong>Fecha de Nacimiento:</strong>&nbsp;
                    {{$solicitud->personaSolicitante->fecha_nacimiento!=null ? $beneficiario->fecha_nacimiento->format('d/m/Y'):""}}
                </td>
                <td style="width: 220px;height: auto;">
                    <strong>Edad:</strong>&nbsp;
                    {{$solicitud->personaSolicitante->edad or ""}}
                </td>
                <td style="width: 100px;height: auto;">
                    <strong>Trabaja?:</strong>&nbsp;
                    {{$solicitud->personaBeneficiario->ind_trabaja ? "Si":"No"}}
                </td>
            </tr>
            <tr>
                <td style="width: 160px;height: auto;">
                    <strong>Ocupación:</strong>&nbsp;
                    {{$solicitud->personaSolicitante->ocupacion or ""}}
                </td>
                <td style="width: 200px;height: auto;">
                    <strong>Nivel Académico:</strong>&nbsp;
                    {{$solicitud->personaSolicitante->nivelAcademico->nombre or ""}}
                </td>
                <td style="width: 220px;height: auto;">
                    <strong>Ingreso Mensual:</strong>&nbsp;
                    {{$solicitud->personaSolicitante->ingreso_mensual or ""}}
                </td>
                <td style="width: 100px;height: auto;">
                    <strong>Asegurado?:</strong>&nbsp;
                    {{$solicitud->personaBeneficiario->ind_asegurado ? "Si":"No"}}
                </td>
            </tr>
            <tr>
                <td style="width: 160px;height: auto;">
                    <strong>Empresa de Seguro:</strong>&nbsp;
                    {{$solicitud->personaSolicitante->seguro_id or ""}}
                </td>
                <td style="width: 200px;height: auto;">
                    <strong>Cobertura:</strong>&nbsp;
                    {{$solicitud->personaSolicitante->cobertura or ""}}
                </td>
                <td style="width: 220px;height: auto;">
                    <strong>Otro Apoyo:</strong>&nbsp;
                    {{$solicitud->personaSolicitante->otro_apoyo or ""}}
                </td>
                <td style="width: 100px;height: auto;"></td>
            </tr>
        </table>
    </div>
    <h3>Dirección de habitacion</h3>
    <div class="cuerpo">
        <table  border="0" cellpadding="5" cellspacing="0">
            <tr>
                <td style="width: 180px;height: auto;">
                    <strong>Estado:</strong>&nbsp;
                    {{$solicitud->personaSolicitante->parroquia->municipio->estado->nombre or ""}}
                </td>
                <td style="width: 200px;height: auto;">
                    <strong>Municipio:</strong>&nbsp;
                    {{$solicitud->personaSolicitante->parroquia->municipio->nombre or ""}}
                </td>
                <td style="width: 160px;height: auto;">
                    <strong>Parroquia:</strong>&nbsp;
                    {{$solicitud->personaSolicitante->parroquia->nombre or ""}}
                </td>
                <td style="width: 140px;height: auto;">
                    <strong>Tlf. Fijo:</strong>&nbsp;
                    {{$solicitud->personaSolicitante->telefono_fijo or ""}}
                </td>
            </tr>
             <tr>
                <td style="width: 160px;height: auto;">
                    <strong>Zona o Sector:</strong>&nbsp;
                    {{$solicitud->personaSolicitante->zona_sector or ""}}
                </td>
                <td style="width: 200px;height: auto;">
                    <strong>Calle o Avenida:</strong>&nbsp;
                    {{$solicitud->personaSolicitante->calle_avenida or ""}}
                </td>
                <td style="width: 180px;height: auto;">
                    <strong>Apto/Casa Nro:</strong>&nbsp;
                    {{$solicitud->personaSolicitante->apto_casa or ""}}
                </td>
                <td style="width: 140px;height: auto;">
                    <strong>Tlf. Celular:</strong>&nbsp;
                    {{$solicitud->personaSolicitante->telefono_celular or ""}}
                </td>
            </tr>
        </table>
    </div>
    @endif

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