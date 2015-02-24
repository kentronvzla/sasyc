<div class="cuerpo" style="position: center">
        <table width="100%" border="0" cellpadding="10" cellspacing="0">
            <tr>
                <td style="background: white;">
                    {{HTML::image('img/logoReporte.jpg');}}
                </td>
                <td width=600>
                    <table width="100%" border="0" cellpadding="0" cellspacing="10">
                        <tr>
                            <td width=400 ALIGN=CENTER style="background: white;">
                                <strong>Sistema de Atencion Social y Civil</strong>
                            </td>
                            <td width=150 ALIGN=CENTER style="background: white;">
                                <strong>fecha de la solicitud: </strong>
                                {{$solicitud->fecha_solicitud->format('d/m/Y')}}
                            </td>
                        </tr>
                        <tr>
                            <td width=400 ALIGN=CENTER style="background: white;">
                                <strong>(SASYC)</strong>
                            </td>
                            <td width=150 ALIGN=CENTER style="background: white;">
                                <strong>Numero de la solicitud: </strong>
                                {{$solicitud->id or ""}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <hr width="100%"> 

<div>
    <p Align="center">
        <strong>Informe Socioeconomico</strong>
    </p>
    <div>
        <table border="0" cellpadding="10" cellspacing="0">
        <tr>
            <td width= 150 height=20 valign="middle" style="background: white;">
                <strong>Tipo de vivienda:</strong>
            </td>
            <td width=130 height=20  valign="middle" style="background: white;">
               {{$solicitud->TipoVivienda->nombre}}
            </td>
             <td width=40 height=20  valign="middle" style="background: white;">
               {{$solicitud->TipoVivienda->version}}
            </td>
        </tr>
        <tr>
            <td width= 150 height=20 valign="middle" style="background: white;">
                <strong>Tipo de Tenencia:</strong>
            </td>
            <td width=130 height=20  valign="middle" style="background: white;">
               {{$solicitud->Tenencia->nombre}}
            </td>
             <td width=40 height=20  valign="middle" style="background: white;">
               {{$solicitud->Tenencia->version}}
            </td>
        </tr>
    </table>
    </div>
    <br>
    <p>{{$solicitud->informe_solicitud}}</p>
    
</div>    