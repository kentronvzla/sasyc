@extends('reportes.html.'.Input::get('formato_reporte','pdf'))
@section('reporte')
<br><br><br><br><br><br><br>
    <table width="100%" border="0" cellpadding="10" cellspacing="0">
        <tr>
            <td style="width: 70px; height: auto; font-size: 14px;" valign="middle">
                <strong>DBS-197</strong>
            </td>
            <td style="width: 600px; height: auto; font-size: 14px;" valign="middle" align="center">
                <strong>Memorandum</strong>
            </td>  
        </tr>
    </table>
    <br><br>
    <table width="100%" border="0" cellpadding="10" cellspacing="0">
        <tr>
            <td style="width: 100px; height: auto; font-size: 14px;" valign="middle">
                <strong>Para:</strong>
            </td>
            <td style="width: 580px; height: auto; font-size: 14px;" valign="middle" >
                Cap. José Zambrano Director de Administración
            </td>  
        </tr>
        <tr>
            <td style="width: 100px; height: auto; font-size: 14px;" valign="middle">
                <strong>De:</strong>
            </td>
            <td style="width: 580px; height: auto; font-size: 14px;" valign="middle">
                1er. Tte. Evelyn Cárdenas Directora de Bienestar Social
            </td>  
        </tr>
        <tr>
            <td style="width: 100px; height: auto; font-size: 14px;" valign="middle">
                <strong>Asunto:</strong>
            </td>
            <td style="width: 580px; height: auto; font-size: 14px;" valign="middle" >
                En el texto
            </td>  
        </tr>
        <tr>
            <td style="width: 100px; height: auto; font-size: 14px;" valign="middle">
                <strong>Fecha:</strong>
            </td>
            <td style="width: 580px; height: auto; font-size: 14px;" valign="middle" >
                21/10/2014
            </td>  
        </tr>
    </table>
    <br><br>
    <table width="100%" border="0" cellpadding="10" cellspacing="0">
        @include('reportes.html.memocuerpo')
        <tr>
            <td style="width: 580px; height: auto; font-size: 14px;" valign="middle" >
                <strong>Solicitud N#:&nbsp;{{$solicitud->num_solicitud}}</strong><br>
                EC/AP
            </td>
        </tr>
    </table>
    
@endsection