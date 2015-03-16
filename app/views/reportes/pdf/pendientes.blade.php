@extends('reportes.pdf.master')
@section('reporte')
    <h3 ALIGN=CENTER > Relación de Casos Pendientes</h3>
    <table border="0" cellpadding="5" cellspacing="3">
        <tr style=' background:#d8d8d8;'>
            <td style="width: 130px;height:auto; font-size: 13px;"  valign="middle">
                <strong>Referencia</strong>
            </td> 
            <td style="width: 80px;height: auto; font-size: 13px;" ALIGN=CENTER  valign="middle">
                <strong>Fecha</strong>
            </td>
            <td style="width: 70px;height: auto; font-size: 13px;" ALIGN=CENTER  valign="middle">
                <strong>Solicitud</strong>
            </td> 
            <td style="width: 190px;height: auto; font-size: 13px;"  valign="middle">
                <strong>Beneficiario</strong>
            </td>
            <td style="width: 150px;height: auto; font-size: 13px;"  valign="middle">
                <strong>Tratamiento</strong>
            </td> 
            <td style="width: 100px;height: auto; font-size: 13px;"  valign="middle">
                <strong>Estatus</strong>
            </td>
            <td style="width: 120px;height: auto; font-size: 13px;"  valign="middle">
                <strong>Monto</strong>
            </td>
        </tr>
        <tr>
            <td style="width: 100px;height:auto; font-size: 13px;">
                Blanca Eekhout
            </td>
            <td ALIGN=CENTER style="width: 80px;height:auto; font-size: 13px;">
                12/03/2015</td>
            <td ALIGN=CENTER style="width: 70px;height:auto; font-size: 13px;">
                15-00001
            </td >
            <td style="width: 190px;height: auto; font-size: 13px;"> 
                Mariana Valentina Escobar Hernandez
            </td>
            <td style="width: 150px;height: auto; font-size: 13px;"> 
                Intervencion Quirurjica
            </td>
            <td ALIGN=CENTER style="width: 150px;height: auto; font-size: 13px;">
                Caso aprobado en espera de orden de pago
            </td>
            <td ALIGN=right style="width: 120px;height: auto; font-size: 13px;">
                187.173,00
            </td>
        </tr>
        <tr style=' background: yellow;'>
            <td style="width: 130px;height:20; font-size: 13px;"  valign="middle">
                <strong>Total</strong>
            </td> 
            <td style="width: 50px;height: auto; font-size: 13px;" ALIGN=CENTER  valign="middle">
                
            </td>
            <td style="width: 80px;height: auto; font-size: 13px;" ALIGN=CENTER  valign="middle">
               
            </td> 
            <td style="width: 200px;height: auto; font-size: 13px;"  valign="middle">
                
            </td>
            <td style="width: 150px;height: auto; font-size: 13px;"  valign="middle">
                
            </td> 
            <td style="width: 50px;height: auto; font-size: 13px;"  valign="middle">
                
            </td>
            <td style="width: 120px;height: auto; font-size: 13px;"  valign="middle" ALIGN=right>
                <strong>187.173,00</strong>
            </td>
        </tr>
    </table>
@endsection