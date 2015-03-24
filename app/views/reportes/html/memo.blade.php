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
                Cap. José Zambrano Director de Administracion
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
        <tr>
            <td>
                <p align="justify">
                    Tengo el honor de dirigirme a usted en la oportunidad de saludarle
                    y a lavez remitirle los recaudos del ciudadano(a) 
                    <strong>Maria Auristela moya Gonzáles</strong> de 60 años de edad, 
                    titular de la cédula de identidad <strong>N# 6077279</strong>;
                    quien solicita ayuda económica de tratamiento médico a favor de su
                    hijo(a) <strong>Jhoanna Marina Rivas Moya</strong>, de 40 años de edad,
                    titular de la cédula de identidad <strong>N# 11990670</strong>, por la 
                    cantidad <strong>SIETE MIl DOSCIENTOS NOVENTA BOLÍVARES (Bs 7290,00)</strong>,
                    en virtud que presenta diagnóstico <strong>SÍNDROME EPILÉPTICO GENERALIZADO.</strong>                    
                </p><br>
            </td>
        </tr>
        <tr>
            <td>
                <p align="center">
                    Se agradece emitir cheque por la cantidad de:<br>
                    <strong>SIETE MIL DOSCIENTOS NOVENTA BOLÍVARES (Bs 7290,00)</strong><br>
                    A nombre o razón social de <strong>Farmacia Tabban C.A</strong><br><br>
                    Sin otro particular al cual hacer referencia, se despide de usted.<br>
                    Atentamente,<br><br>
                    <strong>1ER.TTE. Evelyn Cárdenas<br>Dirección de bienestar Social</strong>
                </p><br>
            </td>
        </tr>
        <tr>
            <td style="width: 580px; height: auto; font-size: 14px;" valign="middle" >
                <strong>Solicitud N#: 15-00005</strong><br>
                EC/AP
            </td>
        </tr>
    </table>
    
@endsection