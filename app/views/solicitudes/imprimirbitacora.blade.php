<style>
    .cuerpo {
        font-family:  Arial, Helvetica, sans-serif;
        font-size: 11px;
    }
    .titulo {font-family:  Arial, Helvetica, sans-serif}
</style>
<page backcolor="#FEFEFE" backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm" footer="date;heure;page">
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
    <!----------------------------------------------------------------------------->
    <div class="cuerpo" style="position: center">
        <table width="100%" border="0" cellpadding="10" cellspacing="0">
            <tr>
                <td width=700 ALIGN=CENTER>
                    <br>
                    <strong style='font-size: 13px;'>Bitacora de Solicitud</strong>
                </td>
            </tr>
        </table>
    </div>
    <br>
    <!------------------------------------------------------------------------------>
    <div class="cuerpo" style="position: center">
        <table width="100%" border="1" cellpadding="10" cellspacing="0">
            <tr style=' background: gray;'>
                <td width=530 height=25 ALIGN=CENTER style='font-size: 13px;' valign="middle">
                    <strong>Descripcion de Actividad</strong>
                </td>
                <td width=75 ALIGN=CENTER style='font-size: 13px;' valign="middle">
                    <strong>Fecha</strong>
                </td>
                <td width=75 ALIGN=CENTER style='font-size: 13px;' valign="middle">
                    <strong>Hora</strong>
                </td>
            </tr>
            @foreach($solicitud->bitacoras as $resultado)
            <tr>
                <td height=15 valign="middle">
                    {{$resultado->nota}}
                </td>
                <td ALIGN=CENTER valign="middle">
                    {{$resultado->fecha->format('d/m/Y')}}
                </td>
                <td ALIGN=CENTER valign="middle">
                    {{$resultado->created_at->format('H:m a')}}
                </td>
            </tr>
            @endforeach
        </table>
    </div>
                
    
</page>