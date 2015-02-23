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
    <!------------------------------------------------------------------------->
    <!--<div><h5>Solicitud</h5></div>-->
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
               <td>
                   <!--<strong>Atencion Inmediata:</strong> <br>--> 
                   {{--$solicitud->ind_inmediata or "No"--}}
                   {{Form::display($solicitud,'ind_inmediata',3, true)}}
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
   <!------------------------------------------------------------------------->
   <!--<div class="cuerpo"><h5>Beneficiario</h5></div>-->
   <strong>Beneficiario</strong>
   <div class="cuerpo">
       <table width="100%" border="0" cellpadding="10" cellspacing="10">
            <tr>
                <td width=150>
                    <strong>Nombre:</strong><br>
                    {{$solicitud->personaBeneficiario->nombre or ""}}
                </td>
                <td width=150>
                    <strong>Apellido</strong><br>
                    {{$solicitud->personaBeneficiario->apellido or ""}}
                </td>
                <td width=150>
                    <strong>Cedula:</strong><br>
                    {{$solicitud->personaBeneficiario->ci or ""}}
                </td>
                <td width=120>
                    <strong>Sexo:</strong><br>
                    {{$solicitud->personaBeneficiario->sexo or ""}}
                </td>
            </tr>
            <tr><!--Revisar esdat0 civil (mas niveles)---no fecha, edad--------------->
                <td>
                    <strong>Estado Civil:</strong><br>
                </td>
                <td>
                    <strong>Fecha de Nacimiento:</strong><br>
                    {{$solicitud->personaBeneficiario->fecha_nacimiento or ""}}
                </td>
                <td>
                    <strong>Edad:</strong><br>
                    {{$solicitud->personaBeneficiario->edad or ""}}
                </td>
                <td>
                    <!--<strong>Trabaja?</strong><br>-->
                    {{--$solicitud->personaBeneficiario->ind_trabaja or ""--}}
                    {{Form::display($solicitud->personaBeneficiario,'ind_trabaja',3)}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Ocupacion:</strong><br>
                    {{$solicitud->personaBeneficiario->ocupacion or ""}}
                </td>
                <td>
                    <strong>Nivel Academico:</strong><br>
                </td>
                <td>
                    <strong>Ingreso Mensual:</strong><br>
                    {{$solicitud->personaBeneficiario->ingreso_mensual or ""}}
                </td>
                <td>
                    <!--<strong>Asegurado?:</strong><br>-->
                    {{Form::display($solicitud->personaBeneficiario,'ind_asegurado',3)}}
                    {{--$solicitud->personaBeneficiario->ind_asegurado or ""--}}
                </td>
            </tr>
            @if ($solicitud->personaBeneficiario->ind_asegurado)
                <tr>
                    <td>
                        <strong>Empresa de Seguro:</strong><br>
                        {{$solicitud->personaBeneficiario->empresa_seguro or ""}}
                    </td>
                    <td>
                        <strong>Cobertura:</strong><br>
                        {{$solicitud->personaBeneficiario->cobertura or ""}}
                    </td>
                    <td>
                        <strong>Otro Apoyo</strong><br>
                        {{$solicitud->personaBeneficiario->otro_apoyo or ""}}
                    </td>
                    <td></td>
                </tr>
            @endif
        </table>
    </div>
    <hr width="100%">
    <!------------------------------------------------------------------------->
     <!--<div class="cuerpo"><h5>Direccion</h5></div>-->
     <strong>Direccion</strong>
     <div class="cuerpo">
       <table width="100%" border="0" cellpadding="10" cellspacing="10">
            <tr>
                <td width=150>
                    <strong>Parroquia:</strong><br>
                    {{$solicitud->personaBeneficiario->parroquia->nombre or ""}}
                </td>
                <td width=150>
                    <strong>Municipio:</strong><br>
                    {{$solicitud->personaBeneficiario->parroquia->municipio->nombre or ""}}
                </td>
                <td width=150>
                    <strong>Estado:</strong><br>
                    {{$solicitud->personaBeneficiario->parroquia->municipio->estado->nombre or ""}}
                </td>
                <td width=150>
                    <strong>Telefono Fijo:</strong><br>
                    {{$solicitud->personaBeneficiario->telefono_fijo}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Zona o Sector:</strong><br>
                    {{$solicitud->personaBeneficiario->zona_sector or ""}}
                </td>
                <td>
                    <strong>Calle o Avenida:</strong><br>
                    {{$solicitud->personaBeneficiario->calle_avenida or ""}}
                </td>
                <td>
                    <strong>Apto/Casa Nro:</strong><br>
                    {{$solicitud->personaBeneficiario->apto_casa or ""}}
                </td>
                <td>
                    <strong>Telefono Celular:</strong><br>
                    {{$solicitud->personaBeneficiario->telefono_celular or ""}}
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
        <table width="100%" border="1" cellpadding="10" cellspacing="0">
            <tr style=' background: gray;'>
                <td width=140 height=20 ALIGN=CENTER style='font-size: 13px;' valign="middle">
                    <strong>Requerimiento</strong>
                </td>
                <td width=170 ALIGN=CENTER style='font-size: 13px;' valign="middle">
                    <strong>Nombre del Beneficiario</strong>
                </td>
                <td width=70 ALIGN=CENTER style='font-size: 13px;' valign="middle">
                    <strong>Cantidad</strong>
                </td>
                <td width=70 ALIGN=CENTER style='font-size: 13px;' valign="middle">
                    <strong>ID Doc</strong>
                </td>
                <td width=90 ALIGN=CENTER style='font-size: 13px;' valign="middle">
                    <strong>Estatus</strong>
                </td>
                  <td width=100 ALIGN=CENTER style='font-size: 13px;' valign="middle">
                    <strong>Monto</strong>
                </td>
            </tr>
            @foreach($solicitud->presupuestos as $resultado)
                <tr>
                    <td width=140 height=15 valign="middle">
                        {{$resultado->requerimiento->nombre}}
                    </td>
                    <td width=170 valign="middle">
                        {{$resultado->beneficiario->nombre}} 
                    </td>
                    <td width=70 valign="middle" ALIGN=CENTER>
                        {{$resultado->cantidad}} 
                    </td>
                    <td width=70 height=15 valign="middle" ALIGN=CENTER>
                        {{$resultado->documento_id}}
                    </td>
                    <td width=90 ALIGN=CENTER valign="middle">
                        {{$resultado->documento->estatus}}
                    </td>
                    <td width=100 ALIGN=CENTER valign="middle">
                        {{$resultado->monto}}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    
</page>