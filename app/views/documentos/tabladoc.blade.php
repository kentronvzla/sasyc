<table width="100%" border="0" cellpadding="10" cellspacing="3">
    <tr style=' background:#d8d8d8;'>
        <td width=45 height=25 ALIGN=CENTER style='font-size: 13px;' valign="middle">
            <strong>Estatus</strong>
        </td>
        <td width=110 style='font-size: 13px;' valign="middle">
            <strong>Descripcion</strong>
        </td>
        <td width=107 style='font-size: 13px;' valign="middle">
            <strong>Solicitud</strong>
        </td>
        <td width=120 style='font-size: 13px;' valign="middle">
            <strong>Referencia</strong>
        </td>
        <td width=70 align="center" style='font-size: 13px;' valign="middle">
            <strong>N Operacion</strong>
        </td>
        <td width=90 align="center" style='font-size: 13px;' valign="middle">
            <strong>Mensaje</strong>
        </td>
        <td width=100 align="center" style='font-size: 13px;' valign="middle">
            <strong>Documento de Referencia</strong>
        </td>
    </tr>
    
    <tr>
        <td valign="middle">
            {{$documentossasyces->estatus}}
        </td>
        <td valign="middle">
            {{$documentossasyces->descrpcion}}
        </td>
        <td height=15 valign="middle" >
            {{$documentossasyces->solicitud}}
        </td>
        <td ALIGN=CENTER valign="middle">
            {{$documentossasyces->ref_doc}}
        </td>
        <td valign="middle">
           {{$documentossasyces->num_op}}
        </td>
        <td valign="middle" align="right">
           {{$documentossasyces->mensaje}}
        </td>
         <td valign="middle" align="right">
           {{$documentossasyces->id_doc_ref}}
        </td>
    </tr>
   
</table>

