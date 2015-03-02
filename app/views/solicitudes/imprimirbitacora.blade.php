<style>
    .cuerpo {
        font-family:  Arial, Helvetica, sans-serif;
        font-size: 11px;
    }
    .titulo {font-family:  Arial, Helvetica, sans-serif}
</style>
<page backcolor="#FEFEFE" backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm" footer="date;heure;page">
    <div class="cuerpo" style="position: center">
        @include('solicitudes.cabecerareporte')
    </div>
    <hr width="100%"> 
    <!----------------------------------------------------------------------------->
    <div class="cuerpo" style="position: center">
        <table width="100%" border="0" cellpadding="10" cellspacing="0">
            <tr>
                <td width=700 ALIGN=CENTER>
                    <br>
                    <strong style='font-size: 13px;'>Bitácora de Solicitud</strong>
                </td>
            </tr>
        </table>
    </div>
    <br>
    <!------------------------------------------------------------------------------>
    <div class="cuerpo" style="position: center">
        <table width="100%" border="0" cellpadding="10" cellspacing="0">
            <tr style=' background:#d8d8d8;'>
                <td width=530 height=25 style='font-size: 13px;' valign="middle">
                    <strong>Descripción de Actividad</strong>
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
                    {{$resultado->created_at->format('h:i a')}}
                </td>
            </tr>
            @endforeach
        </table>
    </div>    
</page>