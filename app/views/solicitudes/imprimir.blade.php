<style>
    .cuerpo {
        font-family:  Arial, Helvetica, sans-serif;
        font-size: 11px;
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
                            <td width=400 ALIGN=CENTER>
                                <strong>Sistema de Atencion Social y Civil</strong>
                            </td>
                            <td width=150 ALIGN=CENTER>
                                <strong>fecha de la solicitud: </strong>
                                {{$solicitud->fecha_solicitud->format('d/m/Y')}}
                            </td>
                        </tr>
                        <tr>
                            <td width=400 ALIGN=CENTER>
                                <strong>(SASYC)</strong>
                            </td>
                            <td width=150>
                                <strong>Numero de la solicitud: </strong>
                                {{$solicitud->id or ""}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <hr width="100%"> 
    <strong>Solicitud</strong>
    <div class="cuerpo">
       <table width="100%" border="0" cellpadding="10" cellspacing="10">
           <tr>
               <td>
                   <strong>Descripcion:</strong>
               </td> 
               <td width=390>
                   {{$solicitud->descripcion or ""}}
               </td>
                 <td>
                   <strong>Area:</strong>
                   {{$solicitud->area->nombre or ""}}
               </td>
           </tr>
           <tr>
               <td>
                   <strong>Referido por:</strong>
               </td> 
               <td width=390>
                   {{$solicitud->referente->nombre or ""}}
               </td>
               <td ALIGN=CENTER>
                   <strong>Atencion Inmediata:</strong> <br>
                   {{$solicitud->ind_inmediata ? "Si":"No"}}
               </td>
           </tr>
           @if ($solicitud->ind_inmediata)
           <tr>
               <td>
                   <strong>Actividad</strong><br>
                   {{$solicitud->actividad}}
               </td> 
               <td ALIGN=CENTER>
                   <strong>referencia</strong><br>
                   {{$solicitud->referencia or ""}}
               </td>
               <td>
                   <strong>Accion tomada</strong><br>
                   {{$solicitud->accion_tomada or ""}}
               </td>
           </tr>
          @endif
       </table>
    </div><br>
    <hr width="100%">
   <strong>Beneficiario</strong>
   <div class="cuerpo">
       <table width="100%" border="0" cellpadding="10" cellspacing="10">
            <tr>
                <td width=150>
                    <strong>Nombre:</strong><br>
                    {{$beneficiario->nombre or ""}}
                </td>
                <td width=150>
                    <strong>Apellido</strong><br>
                    {{$beneficiario->apellido or ""}}
                </td>
                <td width=150>
                    <strong>Cedula:</strong><br>
                    {{$beneficiario->ci or ""}}
                </td>
                <td width=120>
                    <strong>Sexo:</strong><br>
                    {{$beneficiario->sexo or ""}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Estado Civil:</strong><br>
                </td>
                <td>
                    <strong>Fecha de Nacimiento:</strong><br>
                    {{$beneficiario->fecha_nacimiento!=null ? $beneficiario->fecha_nacimiento->format('d/m/Y'):""}}
                </td>
                <td>
                    <strong>Edad:</strong><br>
                    {{$beneficiario->edad or ""}}
                </td>
                <td>
                    <strong>Trabaja?</strong><br>
                    {{$solicitud->personaBeneficiario->ind_trabaja ? "Si":"No"}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Ocupacion:</strong><br>
                    {{$beneficiario->ocupacion or ""}}
                </td>
                <td>
                    <strong>Nivel Academico:</strong><br>
                </td>
                <td>
                    <strong>Ingreso Mensual:</strong><br>
                    {{$beneficiario->ingreso_mensual or ""}}
                </td>
                <td>
                    <strong>Asegurado?:</strong><br>
                    {{$solicitud->personaBeneficiario->ind_asegurado ? "Si":"No"}}
                </td>
            </tr>
            @if ($beneficiario->ind_asegurado)
                <tr>
                    <td>
                        <strong>Empresa de Seguro:</strong><br>
                        {{$beneficiario->empresa_seguro or ""}}
                    </td>
                    <td>
                        <strong>Cobertura:</strong><br>
                        {{$beneficiario->cobertura or ""}}
                    </td>
                    <td>
                        <strong>Otro Apoyo</strong><br>
                        {{$beneficiario->otro_apoyo or ""}}
                    </td>
                    <td></td>
                </tr>
            @endif
        </table>
    </div>
    <hr width="100%">

     <strong>Direccion</strong>
     <div class="cuerpo">
       <table width="100%" border="0" cellpadding="10" cellspacing="10">
            <tr>
                <td width=150>
                    <strong>Parroquia:</strong><br>
                    {{$beneficiario->parroquia->nombre or ""}}
                </td>
                <td width=150>
                    <strong>Municipio:</strong><br>
                    {{$beneficiario->parroquia->municipio->nombre or ""}}
                </td>
                <td width=150>
                    <strong>Estado:</strong><br>
                    {{$beneficiario->parroquia->municipio->estado->nombre or ""}}
                </td>
                <td width=150>
                    <strong>Telefono Fijo:</strong><br>
                    {{$beneficiario->telefono_fijo}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Zona o Sector:</strong><br>
                    {{$beneficiario->zona_sector or ""}}
                </td>
                <td>
                    <strong>Calle o Avenida:</strong><br>
                    {{$beneficiario->calle_avenida or ""}}
                </td>
                <td>
                    <strong>Apto/Casa Nro:</strong><br>
                    {{$beneficiario->apto_casa or ""}}
                </td>
                <td>
                    <strong>Telefono Celular:</strong><br>
                    {{$beneficiario->telefono_celular or ""}}
                </td>
            </tr>
       </table>
    </div>
    <hr width="100%">
    <!------------------------------------------------------------------------->
    <div class="cuerpo">
        <h5>Presupuesto</h5>
    </div>
    <!------------------------------------------------------------------------->
    <br>
    <div class="cuerpo" style="position: center">
        @include('solicitudes.tablapresupuesto')
    </div>
    
</page>
