<div>
    <p Align="center">
        <strong>Informe Socioeconomico</strong>
    </p>
    <div>
        <table border="0" cellpadding="10" cellspacing="0">
        <tr>
            <td width= 250 height=20 align=center valign="middle" style="background: white;">
                <strong>Tipo de vivienda</strong>
            </td>
            
            <td width= 250 height=20 align=center valign="middle" style="background: white;">
                <strong>Tipo de Tenencia</strong>
            </td>
            <td width= 250 height=20 align=center valign="middle" style="background: white;">
                <strong>Total Ingresos</strong>
            </td>
        </tr>
        <tr>
            <td width=250 height=20  align=center valign="middle" style="background: white;">
               {{$solicitud->TipoVivienda->nombre}}
            </td>
            <td width=250 height=20  align=center valign="middle" style="background: white;">
               {{$solicitud->Tenencia->nombre}}
            </td>
            <td width=250 height=20  align=center valign="middle" style="background: white;">
               {{$solicitud->total_ingresos}}
            </td>
        </tr>
    </table>
    </div>
    <br>
    <p>{{$solicitud->informe_social}}</p>
    
</div>    