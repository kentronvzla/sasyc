<table width="100%" border="1" cellpadding="10" cellspacing="0">
    <tr style=' background: gray;'>
        <td width=45 height=25 ALIGN=CENTER style='font-size: 13px;' valign="middle">
            <strong>N Caso</strong>
        </td>
        <td width=110 ALIGN=CENTER style='font-size: 13px;' valign="middle">
            <strong>Nombre</strong>
        </td>
        <td width=107 ALIGN=CENTER style='font-size: 13px;' valign="middle">
            <strong>Apellido</strong>
        </td>
        <td width=120 ALIGN=CENTER style='font-size: 13px;' valign="middle">
            <strong>Cedula</strong>
        </td>
        <td width=70 ALIGN=CENTER style='font-size: 13px;' valign="middle">
            <strong>N Solicitud</strong>
        </td>
        <td width=90 ALIGN=CENTER style='font-size: 13px;' valign="middle">
            <strong>Tipo Solicitud</strong>
        </td>
        <td width=100 ALIGN=CENTER style='font-size: 13px;' valign="middle">
            <strong>Monto</strong>
        </td>
    </tr>
    @foreach($memo->solicitudes as $resultado)
    <tr>
        <td height=15 valign="middle" ALIGN=CENTER>
            
        </td>
        <td valign="middle">
            {{$resultado->personaBeneficiario->nombre}}
        </td>
        <td valign="middle">
            {{$resultado->personaBeneficiario->apellido}}
        </td>
        <td height=15 valign="middle" >
            {{$resultado->personaBeneficiario->ci}}
        </td>
        <td ALIGN=CENTER valign="middle">
            {{$resultado->id}}
        </td>
        <td ALIGN=CENTER valign="middle">
           {{$resultado->area->tipoAyuda->nombre}}
        </td>
        <td valign="middle">

        </td>
    </tr>
    @endforeach
</table>