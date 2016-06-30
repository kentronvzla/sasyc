@extends('reportes.html.'.Input::get('formato_reporte','pdf'))
@section('reporte')
<br><br><br><br><br>
    <table width="100%" border="1" cellpadding="10" cellspacing="0">
        <tr>
            <td style="width: 550px; height: 5%; font-size: 18px;" valign="middle" align=center>
                <strong>Punto de Cuenta</strong>
            </td>
            <td>
                <table width="100%" border="1" cellpadding="10" cellspacing="0">
                    <tr>
                        <td>
                            <strong>1- N# de página:&nbsp;1/1</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>
                                2- Fecha:&nbsp;{{$solicitud->created_at->format('d/m/Y')}}
                            </strong>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <br>
    <table width="100%" border="1" cellpadding="10" cellspacing="0">
        <tr>
            <td style="width: 150px; height: auto; font-size: 14px;" valign="middle" align=center>
                <strong>3- Presentado:</strong>
            </td>
            <td>
            <table width="100%" border="1" cellpadding="10" cellspacing="0">
                    <tr>
                        <td style="width: 370px; height: auto;">
                            A- AL: {{Configuracion::get('presidente')}}<br>
                            Presidente de la Fundacion Pueblo Soberano (FPS)
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 370px; height: auto;">
                            B- AL: {{Configuracion::get('coordinador')}}<br>
                            Coordinador General de la Fundacion Pueblo Soberano (FPS)
                        </td>
                    </tr>
                    <tr>    
                        <td style="width: 370px; height: auto;">
                            C- POR: Direcciones de Administracion y Bienestar Social
                            de la Fundación Pueblo Soberano
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width: 150px; height: auto; font-size: 14px;" valign="middle" align=center>
                <strong>4- PTO N#</strong>
                <br> FPS-c 402
            </td>
        </tr>
    </table>    
    <br>
    <table width="100%" border="1" cellpadding="10" cellspacing="0">
        <tr style=' background:#d8d8d8;'>
            <td style="width: 690px; height: auto;"> 
                <strong>5- Asunto: Solicitud de ayuda económica</strong>
            </td>
        </tr>
        <tr>
            <td style="width: 690px; height: auto;" valign="middle" >
                @include('reportes.html.puntocuerpo')<br>
            </td>
        </tr>
        <tr>
            <td style="width: 690px; height: auto;" valign="middle">
                <strong>Observaciones:&nbsp;</strong>
                <p align="justify">
                    {{$solicitud->observaciones or ""}}
                </p>
            </td>
        </tr>
    </table>
    <br>
    <table width="100%" border="1" cellpadding="10" cellspacing="0">
        <tr style=' background:#d8d8d8;'>
            <td style="width: 225px; height: auto;" valign="middle" align=center>
                <strong>
                    6- Presentado por: Direccion de {{$solicitud->departamento->nombre or ""}}
                </strong>
            </td>
            <td style="width: 225px; height: auto;" valign="middle" align=center>
                <strong>7- Revisado por: Unidad de Presupuesto</strong>
            </td>
            <td style="width: 225px; height: auto;" valign="middle" align=center>
                <strong>8- Aprobado por: Unidad de Contabilidad</strong>
            </td>
        </tr>
        <tr>
            <td style="width: 225px; height: 5%; " valign="middle" align=center>
                ________<br>Firma
            </td>
            <td style="width: 225px; height: 5%;" valign="middle" align=center>
                ________<br>Firma
            </td>
            <td style="width: 225px; height: 5%;" valign="middle" align=center>
                ________<br>Firma
            </td>
        </tr>           
        <tr>
            <td style="width: 225px; height: 2%;" valign="middle">
                <strong>Fecha:</strong>
            </td>
            <td style="width: 225px; height: 2%;" valign="middle">
                <strong>Fecha:</strong>
            </td>
            <td style="width: 225px; height: 2%;" valign="middle">
                <strong>Fecha:</strong>
            </td>
        </tr>
    </table>
    <br>
    <table width="100%" border="1" cellpadding="10" cellspacing="0">
        <tr style=' background:#d8d8d8;'>
            <td style="width: 225px; height: auto;" valign="middle" align=center>
                <strong>9- Aprobado por: Administración</strong>
            </td>
            <td style="width: 225px; height: auto;" valign="middle" align=center>
                <strong>10- Revisado por: Coordinador General</strong>
            </td>
            <td style="width: 225px; height: auto;" valign="middle" align=center>
                <strong>11- Aprobado por: Presidente</strong>
            </td>
        </tr>
        <tr>
            <td style="width: 225px; height: 5%; " valign="middle" align=center>
                ________<br>Firma
            </td>
            <td style="width: 225px; height: 5%;" valign="middle" align=center>
                ________<br>Firma
            </td>
            <td style="width: 225px; height: 5%;" valign="middle" align=center>
                ________<br>Firma
            </td>
        </tr>           
        <tr>
            <td style="width: 225px; height: 2%;" valign="middle">
                <strong>Fecha:</strong>
            </td>
            <td style="width: 225px; height: 2%;" valign="middle">
                <strong>Fecha:</strong>
            </td>
            <td style="width: 225px; height: 2%;" valign="middle">
                <strong>Fecha:</strong>
            </td>
        </tr>
    </table>
@endsection