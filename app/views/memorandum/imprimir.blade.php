<style>
    .cuerpo {
        font-family:  Arial, Helvetica, sans-serif;
        font-size: 13px;
    }
    .titulo {font-family:  Arial, Helvetica, sans-serif}
</style>
<page backcolor="#FEFEFE" backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm" footer="date;heure;page">
   <!------------------------------------------------------------------------->
    <div class="cuerpo" style="position: center">
        <table width="100%" border="0" cellpadding="10" cellspacing="10">
            <tr>
                <td width=650>
                    {{HTML::image('img/logoReporte.jpg');}}
                </td>
            </tr>
        </table>
    </div>
   <br>
   <!------------------------------------------------------------------------->
    <div class="cuerpo" style="position: center">
        <table width="100%" border="0" cellpadding="10" cellspacing="5">
            <tr><td width=670 ALIGN=CENTER><strong>Republica Bolivariana de Venezuela</strong></td></tr>
            <tr><td ALIGN=CENTER><strong>Ministerio del Poder Popular del Despacho de la Presidencia</strong></td></tr>
            <tr><td ALIGN=CENTER><strong>Fundacion Pueblo Soberano</strong></td></tr>
        </table>
    </div>
   <br><br>
   <!------------------------------------------------------------------------->
   <br>
   <!------------------------------------------------------------------------->
   <div class="cuerpo" style="position: center">
        <table width="100%" border="0" cellpadding="10" cellspacing="5">
            <tr><td width=170><strong>Para:</strong></td>
                <td width=500>{{$memo->origen->Departamento or "No se encontro departamento"}}</td>
            </tr>
            <tr><td><strong>De:</strong></td>
                <td>{{$memo->origen->Departamento or "No se encontro departamento"}}</td>
            </tr>
            <tr><td><strong>Asunto:</strong></td>
                <td>{{$memo->asunto or ""}}</td>
            </tr>
            <tr><td><strong>Fecha:</strong></td>
                <td>{{$memo->fecha or ""}}</td>
            </tr>
        </table>
    </div>
   <br><br>
    <!------------------------------------------------------------------------->
    <div class="cuerpo" style="position: center">
        <table width="100%" border="0" cellpadding="10" cellspacing="5">
            <tr>
                <td width=670 ALIGN=CENTER>
                    <strong>Listado de casos por fecha y codigo</strong>
                </td>
            </tr>
        </table>
    </div>
    <br>
    <div>
     {{HTML::simpleTable($memo->solicitudes, 'Solicitud')}}
    </div>
   
</page>