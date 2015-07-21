@extends('reportes.html.'.Input::get('formato_reporte','pdf'))
@section('reporte')

<?php $i=1; ?>

<h4 ALIGN=CENTER >Relación de Casos Resueltos</h4>
 <table width="100%" border="0" cellpadding="10" cellspacing="3">
    <tr style=' background:#d8d8d8;'>
         <td ALIGN=CENTER  valign="middle" style="width: 35px;height:auto; font-size: 13px;">
            <strong>N#</strong>  
        </td>   
        <td style="width: 150px;height:auto; font-size: 13px;"  valign="middle">
            <strong>Referencia</strong>
        </td> 
        <td style="width: 65px;height: auto; font-size: 13px;" ALIGN=CENTER  valign="middle">
            <strong>Fecha</strong>
        </td>
        <td style="width: 70px;height: auto; font-size: 13px;" ALIGN=CENTER  valign="middle">
            <strong># Caso</strong>
        </td> 
        <td style="width: 200px;height: auto; font-size: 13px;"  valign="middle">
            <strong>Beneficiario</strong>
        </td>
        <td style="width: 200px;height: auto; font-size: 13px;"  valign="middle">
            <strong>Tratamiento</strong>
        </td> 
        <td style="width: 50px;height: auto; font-size: 13px;"  valign="middle">
            <strong>Cheque</strong>
        </td>
        <td style="width: 150px;height: auto; font-size: 13px;"  valign="middle" ALIGN=right>
            <strong>Monto</strong>
        </td>
    </tr>
    <!------------------------------------------->
    <?php $contador=0;  $subtotal=0; ?>
    <!------------------------------------------->
    
    @foreach($solicitudes as $resultado)
        @foreach($resultado->presupuestos as $key=>$presupuesto)
            {{Form::hidden('solcitudes[]', $resultado->id)}}
            <tr>
                <td ALIGN=CENTER  valign="middle" style="width: 35px;height:auto; font-size: 13px;">
                <strong>{{$i}}</strong>  
            </td>
                <td style="width: 150px;height:auto;">
                    {{$presupuesto->solicitud->referencia_externa}}
                    
                </td>
                <td ALIGN=CENTER style="width: 65px;height:auto;">
                    {{$presupuesto->solicitud->created_at->format('d/m/Y')}}
                </td>
                <td ALIGN=CENTER style="width: 70px;height:auto;">
                    {{$presupuesto->solicitud->num_solicitud}}
                </td>
                <td style="width: 200px;height:auto;"> 
                    {{$presupuesto->solicitud->personaBeneficiario->nombre}}&nbsp;
                    {{$presupuesto->solicitud->personaBeneficiario->apellido}}
                </td>
                <td style="width: 170px;height:auto;">
                    {{$presupuesto->requerimiento->nombre}}
                </td>
                <td ALIGN=CENTER style="width: 50px;height:auto;">
                    {{$presupuesto->cheque}}
                </td>
                <td ALIGN=right style="width: 150px;height:auto;">
                    {{$presupuesto->montoapr_for}}
                </td>
            </tr>
            <?php $total += $presupuesto->montoapr;
                  $subtotal+=$presupuesto->montoapr;
            ?>
            <!------------------------------------------->
            @if($presupuesto->montoapr_for != null)
                
                <tr style="background: #CCC;">
                    <td style="width: 40px;height:auto; font-size: 13px;">
                    <strong>Total</strong>
                    </td><td></td><td></td><td></td>
                    <td></td><td></td><td></td>
                    <td valign="middle" ALIGN=right>{{tm($subtotal)}}</td>
                </tr> <?php $contador++;  $subtotal=0; ?>         
                
            @endif
            <?php $i++; ?>
            <!------------------------------------------->
        @endforeach
        
    @endforeach  
    <!------------------------------------------->
    <!-- <tr style="background: #CCC;">
         <td style="width: 40px;height:auto; font-size: 13px;">
         <strong>Total</strong></td><td></td><td></td><td></td>
        <td></td><td></td><td></td>
        <td valign="middle" ALIGN=right>{{--tm($subtotal)--}}</td>
    </tr>-->
    <!------------------------------------------->
    <tr style=' background: #CCC;'>
        <td valign="middle" ALIGN=center style="width: 35px;height:auto; font-size: 13px;">
            <strong>{{$i-1}}</strong>
        </td>
        <td style="width: 150px;height:auto; font-size: 13px;"  valign="middle">
            <strong>Monto Total General</strong>
        </td> 
        <td style="width: 65px;height: auto; font-size: 13px;" ALIGN=CENTER  valign="middle">

        </td>
        <td style="width: 70px;height: auto; font-size: 13px;" ALIGN=CENTER  valign="middle">

        </td> 
        <td style="width: 200px;height: auto; font-size: 13px;"  valign="middle">

        </td>
        <td style="width: 170px;height: auto; font-size: 13px;"  valign="middle">

        </td> 
        <td style="width: 50px;height: auto; font-size: 13px;"  valign="middle">

        </td>
        
        <td style="width: 150px;height: auto; font-size: 13px;"  valign="middle" ALIGN=right>
            {{tm($total)}}
        </td>
    </tr>
</table>

        


@endsection