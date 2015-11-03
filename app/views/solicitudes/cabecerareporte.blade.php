<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td>
            {{HTML::image('img/logoReporte.jpg');}}
        </td>
        <td width=600>
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td width=400 ALIGN=CENTER>
                        <h3>SOLICITUD:&nbsp;
                        {{$solicitud->num_solicitud or ""}}
                        </h3>
                        <h4>Referencia:&nbsp;
                        {{$solicitud->id or ""}}
                        </h4>
                    </td>
                    <td width=150 ALIGN=CENTER style=' font-size: 14px;'>
                        <strong>Fecha de la solicitud: </strong>
                        {{--$solicitud->created_at->format('d/m/Y')--}}
                        <br>
                        <strong>Estatus:</strong>&nbsp;
                        {{$solicitud->estatus_display or ""}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>