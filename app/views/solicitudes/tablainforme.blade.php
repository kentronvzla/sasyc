<div>
    <p>
    <h3>Situacion fisico-ambiental</h3>
    </p>
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
                    {{--$solicitud->total_ingresos_for--}}
                </td>
            </tr>
        </table>
    </div>
    <hr width="100%">
    <h3>Diagnostico Social</h3>
    <p>
        {{--$solicitud->informe_social--}}
    </p>
</div>    