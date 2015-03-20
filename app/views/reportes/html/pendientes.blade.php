@extends('reportes.html.'.Input::get('formato_reporte','pdf'))
@section('reporte')
    <h4 ALIGN=CENTER >Relación de Casos Pendientes</h4>
    <table border="0" cellpadding="5" cellspacing="3">
        <tr style=' background:#d8d8d8;'>
            <td style="width: 140px;height:auto; font-size: 13px;"  valign="middle">
                <strong>Referencia</strong>
            </td> 
            <td style="width: 50px;height: auto; font-size: 13px;" ALIGN=CENTER  valign="middle">
                <strong>Fecha</strong>
            </td>
            <td style="width: 80px;height: auto; font-size: 13px;" ALIGN=CENTER  valign="middle">
                <strong># Caso</strong>
            </td> 
            <td style="width: 170px;height: auto; font-size: 13px;"  valign="middle">
                <strong>Beneficiario</strong>
            </td>
            <td style="width: 130px;height: auto; font-size: 13px;"  valign="middle">
                <strong>Tratamiento</strong>
            </td> 
            <td style="width: 130px;height: auto; font-size: 13px;"  valign="middle">
                <strong>Estatus</strong>
            </td>
            <td style="width: 130px;height: auto; font-size: 13px;"  valign="middle">
                <strong>Monto</strong>
            </td>
        </tr>
        @foreach($solicitudes as $resultado)
            <tr>
                <td style="width: 140px;height:auto;">
                    {{$resultado->referente_externo}}
                </td>
                <td ALIGN=CENTER style="width: 50px;height:auto;">
                    {{$resultado->created_at->format('d/m/Y')}}
                </td>
                <td ALIGN=CENTER style="width: 80px;height:auto;">
                    {{$resultado->num_solicitud}}
                </td>
                <td style="width: 170px;height:auto;"> 
                    {{$resultado->personaBeneficiario->nombre}}&nbsp;
                    {{$resultado->personaBeneficiario->apellido}}
                </td>
                <td style="width: 130px;height:auto;">
                    
                </td>
                <td ALIGN=CENTER style="width: 130px;height:auto;">
                    
                </td>
                <td ALIGN=right style="width: 130px;height:auto;">
                   {{--$resultado->presupuestos->monto--}}
                </td>
            </tr>
        @endforeach    
        <tr style=' background: lightcyan;'>
            <td style="width: 140px;height:auto; font-size: 13px;"  valign="middle">
                <strong>Total General</strong>
            </td> 
            <td style="width: 50px;height: auto; font-size: 13px;" ALIGN=CENTER  valign="middle">
                
            </td>
            <td style="width: 80px;height: auto; font-size: 13px;" ALIGN=CENTER  valign="middle">
               
            </td> 
            <td style="width: 170px;height: auto; font-size: 13px;"  valign="middle">
                
            </td>
            <td style="width: 130px;height: auto; font-size: 13px;"  valign="middle">
                
            </td> 
            <td style="width: 130px;height: auto; font-size: 13px;"  valign="middle">
                
            </td>
            <td style="width: 130px;height: auto; font-size: 13px;"  valign="middle" ALIGN=right>
                <strong>187.173,00</strong>
            </td>
        </tr>
    </table>
@endsection