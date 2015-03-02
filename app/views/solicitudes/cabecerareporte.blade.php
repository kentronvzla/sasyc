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