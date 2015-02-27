<br><br>
<div class="cuerpo" style="position: center">
    <table width="100%" border="0" cellpadding="10" cellspacing="0">
        <tr>
            <td style="background: white;">
                {{HTML::image('img/logoReporte.jpg');}}
            </td>
            <td width=600>
                <table width="100%" border="0" cellpadding="0" cellspacing="10">
                    <tr>
                        <td width=400 ALIGN=CENTER style="background: white;">
                            <strong>Sistema de Atención Social y Civil</strong>
                        </td>
                        <td width=150 ALIGN=CENTER style="background: white;">
                            <strong>Fecha de la solicitud: </strong>
                            {{$solicitud->fecha_solicitud->format('d/m/Y')}}
                        </td>
                    </tr>
                    <tr>
                        <td width=400 ALIGN=CENTER style="background: white;">
                            <strong>(SASYC)</strong>
                        </td>
                        <td width=150 ALIGN=CENTER style="background: white;">
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
@include('solicitudes.tablainforme')
