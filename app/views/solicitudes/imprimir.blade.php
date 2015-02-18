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
                <!--<td>{{--HTML::image('img/logo.jpg')--}}</td>-->
                <td width=600>
                    <table width="100%" border="0" cellpadding="0" cellspacing="10">
                        <tr>
                            <td width=400 ALIGN=CENTER><strong>Sistema de Atencion Social y Civil</strong></td>
                            <td width=150><strong>fecha de la solicitud: </strong>{{$solicitud->fecha_solicitud}}</td>
                        </tr>
                        <tr>
                            <td width=400 ALIGN=CENTER><strong>(SASYC)</strong></td>
                            <td width=150><strong>Numero de la solicitud: </strong>{{$solicitud->id}}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <hr width="100%"> 
    <!------------------------------------------------------------------------->
    <div><h5>Solicitud</h5></div>
    <div class="cuerpo">
       <table width="100%" border="0" cellpadding="10" cellspacing="20">
           <tr>
               <td><strong>Descripcion:</strong></td> <td width=390>{{$solicitud->descripcion}}</td>
               <td><strong>Area:</strong><br>{{$solicitud->area->nombre}}</td>
           </tr>
           <tr>
               <td><strong>Referido por:</strong></td> <td width=390>{{$solicitud->referente->nombre}}</td>
               <td><strong>Atencion Inmediata:</strong> <br> {{$solicitud->ind_inmediata}}</td>
           </tr>
           @if ($solicitud->ind_inmediata)
           <tr>
               <td><strong>Actividad</strong><br>{{$solicitud->actividad}}</td> 
               <td ALIGN=CENTER><strong>referencia</strong><br>{{$solicitud->referencia}}</td>
               <td><strong>Accion tomada</strong><br>{{$solicitud->accion_tomada}}</td>
           </tr>
          @endif
       </table>
    </div>
    <hr width="100%">
   <!------------------------------------------------------------------------->
   <div class="cuerpo"><h5>Beneficiario</h5></div>
   <div class="cuerpo">
       <table width="100%" border="0" cellpadding="10" cellspacing="20">
            <tr>
                <td width=150><strong>Nombre:</strong><br>{{$solicitud->personaBeneficiario->nombre}}</td>
                <td width=150><strong>Apellido</strong><br>{{$solicitud->personaBeneficiario->apellido}}</td>
                <td width=150><strong>Cedula:</strong><br>{{$solicitud->personaBeneficiario->ci}}</td>
                <td width=120><strong>Sexo:</strong><br>{{$solicitud->personaBeneficiario->sexo}}</td>
            </tr>
            <tr><!--Revisar esdat0 civil (mas niveles)---no fecha, edad--------------->
                <td><strong>Estado Civil:</strong><br></td>
                <td><strong>Fecha de Nacimiento:</strong><br>{{$solicitud->personaBeneficiario->fecha_nacimiento}}</td>
                <td><strong>Edad:</strong><br>{{$solicitud->personaBeneficiario->edad}}</td>
                <td><strong>Trabaja?</strong><br>{{$solicitud->personaBeneficiario->ind_trabaja}}</td>
            </tr>
            <tr>
                <td><strong>Ocupacion:</strong><br>{{$solicitud->personaBeneficiario->ocupacion}}</td>
                <td><strong>Nivel Academico:</strong><br></td>
                <td><strong>Ingreso Mensual:</strong><br>{{$solicitud->personaBeneficiario->ingreso_mensual}}</td>
                <td><strong>Asegurado?:</strong><br>{{$solicitud->personaBeneficiario->ind_asegurado}}</td>
            </tr>
            <tr>
                <td><strong>Empresa de Seguro:</strong><br>{{$solicitud->personaBeneficiario->empresa_seguro}}</td>
                <td><strong>Cobertura:</strong><br>{{$solicitud->personaBeneficiario->cobertura}}</td>
                <td><strong>Otro Apoyo</strong><br>{{$solicitud->personaBeneficiario->otro_apoyo}}</td>
                <td></td>
            </tr>
        </table>
    </div>
    <hr width="100%">
    <!------------------------------------------------------------------------->
     <div class="cuerpo"><h5>Direccion</h5></div>
     <div class="cuerpo">
       <table width="100%" border="0" cellpadding="10" cellspacing="20">
            <tr>
                <td width=150><strong>Parroquia:</strong><br>{{$solicitud->personaBeneficiario->parroquia->nombre}}</td>
                <td width=150><strong>Municipio:</strong><br>{{$solicitud->personaBeneficiario->parroquia->municipio->nombre}}</td>
                <td width=150><strong>Estado:</strong><br>Estado prueba</td>
                <td width=150><strong>Telefono Fijo:</strong><br>{{$solicitud->personaBeneficiario->telefono_fijo}}</td>
            </tr>
            <tr>
                <td><strong>Zona o Sector:</strong><br>{{$solicitud->personaBeneficiario->zona_sector}}</td>
                <td><strong>Calle o Avenida:</strong><br>{{$solicitud->personaBeneficiario->calle_avenida}}</td>
                <td><strong>Apto/Casa Nro:</strong><br>{{$solicitud->personaBeneficiario->apto_casa}}</td>
                <td><strong>Telefono Celular:</strong><br>{{$solicitud->personaBeneficiario->telefono_celular}}</td>
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
        {{HTML::simpleTable($solicitud->presupuestos, 'Presupuesto')}}
    </div>
    
</page>