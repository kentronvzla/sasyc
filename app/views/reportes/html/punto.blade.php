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
                            <strong>2- Fecha:&nbsp;25/02/2015</strong>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <br><br>
    <table width="100%" border="1" cellpadding="10" cellspacing="0">
        <tr>
            <td style="width: 150px; height: auto; font-size: 14px;" valign="middle" align=center>
                <strong>3- Presentado:</strong>
            </td>
            <td>
            <table width="100%" border="1" cellpadding="10" cellspacing="0">
                    <tr>
                        <td style="width: 370px; height: auto;">
                            A- AL: MY Antonio José Pérez Suárez<br>
                            Presidente de la fundacion pueblo soberano (FPS)
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 370px; height: auto;">
                            B- AL: CAP José Holberg Zambrano Gonzáles<br>
                            coordinador general de la fundacion pueblo soberano (FPS)
                        </td>
                    </tr>
                    <tr>    
                        <td style="width: 370px; height: auto;">
                            C- POR: Dierecciones de administracion y bienestar social
                            de la fundación pueblo soberano
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
    <br><br>
    <table width="100%" border="1" cellpadding="10" cellspacing="0">
        <tr style=' background:#d8d8d8;'>
            <td style="width: 690px; height: auto;"> 
                <strong>5- Asunto: Solicitud de ayuda económica</strong>
            </td>
        </tr>
        <tr>
            <td style="width: 690px; height: auto;" valign="middle">
                <p align="justify">
                    Se somete a la consideración y aprobación del Presidente de la Fundación 
                    Pueblo Sobrerano, el otorgamiento de ayuda económica
                    solicitada al <strong> presidente de la republica Bolivariana de 
                    Venezuela </strong> por <strong>José Asael Vergara Vargas </strong>
                    de <strong>58 </strong> años de edad, titular de la cédula de 
                    identidad <strong>N#: 5.001.841 </strong>, por la cantidad de 
                    <strong>TRECIENTOS OCHENTA Y SIETE MIL CUATRENTA Y NUEVE BOLÍVARES CON
                    04 CÉNTIMOS ( BS387.049,04) </strong> a favor de su madre <strong>Esperanza
                    Arteaga de Vergara </strong> de <strong>77 </strong> años de edad, titular
                    de la cédula de identidad <strong>N#: 2.134.774</strong>, quien en virtud del
                    analisis de la documentación  presentada por parte de las Direcciones de 
                    Bienestar Social y de Administración, presenta diagnóstico 
                    <strong>Estenosisi valvular Aórtica sintomática</strong> y requiere ayuda
                    económica para material quirúrgico.
                    
                    
                   De allí que, en vista de las condiciones socio-económicas del solicitante y 
                   de la disponibilidad presupuestaria correspondiente, se recomienda la aprobación
                   para otorgar la ayuda económica, por la cantidad de; <strong>TRECIENTOS OCHENTA Y 
                   SIETE MIL CUARENTA Y NUEVE BOLÍVARES CON 04 CENTIMOS (837.049,04)</strong>. El cheuqe 
                   esta emitido a favor de <strong>Servimedic soluciones cardiovasculares S.A</strong> 
                </p><br>
            </td>
        </tr>
        <tr>
            <td style="width: 690px; height: auto;" valign="middle">
                <strong>Observaciones:&nbsp;</strong>
                <p align="justify">
                    Se procesa la ayuda económica de acuerdo con l;a recomendacó
                    del Presidente de la FPS. Posee cobertura de Bs. 600.000 por 
                    seguros mercantil que utilizará para costear la intervención quirúrgica.
                </p>
            </td>
        </tr>
    </table>
    <br><br>
    <table width="100%" border="1" cellpadding="10" cellspacing="0">
        <tr style=' background:#d8d8d8;'>
            <td style="width: 225px; height: auto;" valign="middle" align=center>
                <strong>6- Presentado por: Direccion de Bienestar Social</strong>
            </td>
            <td style="width: 225px; height: auto;" valign="middle" align=center>
                <strong>7- Revisado por: Direccion de Administración</strong>
            </td>
            <td style="width: 225px; height: auto;" valign="middle" align=center>
                <strong>8- Aprobado por: Coordinador General</strong>
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
    <br><br>
    <table width="100%" border="1" cellpadding="10" cellspacing="0">
        <tr style=' background:#d8d8d8;'>
            <td style="width: 225px; height: auto;" valign="middle" align=center>
                <strong>9- Aprobado por: Presidente</strong>
            </td>
            <td style="width: 225px; height: auto;" valign="middle" align=center>
                <strong>10- Revisado por: Unidad de Presupuesto</strong>
            </td>
            <td style="width: 225px; height: auto;" valign="middle" align=center>
                <strong>11- Aprobado por: Unidad de Contabilidad</strong>
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