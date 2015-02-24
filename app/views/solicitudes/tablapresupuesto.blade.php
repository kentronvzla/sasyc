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