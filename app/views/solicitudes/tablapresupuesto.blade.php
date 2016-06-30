<table width="100%" border="0" cellpadding="10" cellspacing="0">
    <tr style=' background: #d8d8d8;'>
        <td width=140 height=20 style='font-size: 13px;' valign="middle">
            <strong>Requerimiento</strong>
        </td>
        <td width=170 style='font-size: 13px;' valign="middle">
            <strong>Nombre del Beneficiario</strong>
        </td>
        <td width=70 ALIGN=right style='font-size: 13px;' valign="middle">
            <strong>Cantidad</strong>
        </td>
        <td width=70 style='font-size: 13px;' valign="middle">
            <strong>ID Doc</strong>
        </td>
        <td width=90 style='font-size: 13px;' valign="middle">
            <strong>Estatus</strong>
        </td>
        <td width=100 ALIGN=right style='font-size: 13px;' valign="middle">
            <strong>Monto</strong>
        </td>
    </tr>
    @foreach($solicitud->presupuestos as $resultado)
    <tr>
        <td width=140 height=15 valign="middle">
            {{$resultado->requerimiento->nombre }}
        </td>
        <td width=170 valign="middle">
            {{$resultado->beneficiario->nombre or ""}} 
        </td>
        <td width=70 valign="middle" ALIGN=right>
            {{$resultado->cantidad}} 
        </td>
        <td width=70 height=15 valign="middle" >
            {{$resultado->documento_id or ""}}
        </td>
        <td width=90 valign="middle">
            {{$resultado->estatus_doc or ""}}
        </td>
        <td width=100 ALIGN=right valign="middle">
            {{$resultado->montoapr_for}}
        </td>
    </tr>
    @endforeach
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><strong>Total:</strong></td>
        <td width=100 ALIGN=right valign="middle">
            <hr>
            <?php
            $total = 0;
            foreach ($solicitud->presupuestos as $cantidad) {
                $total = $total + $cantidad->montoapr;
            }
            ?>
            {{tm($total)}}
        </td>

    </tr>
</table>