<div>
    <h3>Situacion fisico-ambiental</h3>
    <div>
        <table border="0" cellpadding="10" cellspacing="0">
            <tr>
                <td width= 250 height=20 align=center valign="middle" style="background: white; text-decoration: underline;" >
                    <strong>Vivienda</strong>
                </td>

                <td width= 250 height=20 align=center valign="middle" style="background: white; text-decoration: underline;">
                    <strong>Tenencia</strong>
                </td>
                <td width= 250 height=20 align=center valign="middle" style="background: white; text-decoration: underline;">
                    <strong>Total Ingresos</strong>
                </td>
            </tr>
            <tr>
                <td width=250 height=20  align=center valign="middle" style="background: white;">
                    {{$solicitud->tipoVivienda->nombre or ""}}
                </td>
                <td width=250 height=20  align=center valign="middle" style="background: white;">
                    {{$solicitud->tenencia->nombre or ""}}
                </td>
                <td width=250 height=20  align=center valign="middle" style="background: white;">
                    {{$solicitud->total_ingresos_for}}
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <hr>
                    <h3>Diagnostico Social</h3>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: justify;"> 
                    <p>
                        {{$solicitud->informe_social}}
                    </p>
                </td>
            </tr>
        </table>
    </div>
</div>    