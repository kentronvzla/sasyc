@extends('reportes.html.'.Input::get('formato_reporte','pdf'))
@section('reporte')
    <table width="100%" border="0" cellpadding="10" cellspacing="0">
        <tr>
            <td style="width: 70px; height: auto; font-size: 14px;" valign="middle">
                <strong>DBS-{{$solicitud->num_proc}}</strong>
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
                {{Configuracion::get('coordinador')}}&nbsp;Director de Administraci&oacute;n
            </td>  
        </tr>
        <tr>
            <td style="width: 100px; height: auto; font-size: 14px;" valign="middle">
                <strong>De:</strong>
            </td>
            <td style="width: 580px; height: auto; font-size: 14px;" valign="middle">
                {{$solicitud->departamento->supervisor->nombre}} Director(a) de {{$solicitud->departamento->nombre}}
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
                {{date('d/m/Y')}}
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