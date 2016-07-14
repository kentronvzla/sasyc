<table width="100%" border="0" cellpadding="10" cellspacing="3">
    <tr style=' background:#d8d8d8;'>
        <td width=45 height=25 ALIGN=CENTER style='font-size: 13px;' valign="middle">
            <strong>N Caso</strong>
        </td>
        <td width=110 style='font-size: 13px;' valign="middle">
            <strong>Nombre</strong>
        </td>
        <td width=107 style='font-size: 13px;' valign="middle">
            <strong>Apellido</strong>
        </td>
        <td width=120 style='font-size: 13px;' valign="middle">
            <strong>Cedula</strong>
        </td>
        <td width=70 align="center" style='font-size: 13px;' valign="middle">
            <strong>N Solicitud</strong>
        </td>
        <td width=90 align="center" style='font-size: 13px;' valign="middle">
            <strong>Tipo Solicitud</strong>
        </td>
        <td width=100 align="right" style='font-size: 13px;' valign="middle">
            <strong>Monto</strong>
        </td>
    </tr>
    <?php 
    $caso=0;               
   ?>
    @foreach($memos->solicitudes as $resultado)
    <tr>
        <td height=15 valign="middle" ALIGN=CENTER>
            <?php           
            $caso +=1;
           ?>
            {{$caso}} 
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
            {{$resultado->num_solicitud}}
        </td>
        <td valign="middle">
           {{$resultado->area->tipoAyuda->nombre}}
        </td>
        <td valign="middle" align="right">
            <?php 
            $total=0;
           foreach ($resultado->presupuestos as $cantidad){
               $total=$total+$cantidad->montoapr;
           }
           ?>
            {{tm($total)}}
        </td>
    </tr>
    @endforeach
</table>