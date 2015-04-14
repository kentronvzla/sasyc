@extends('reportes.html.'.Input::get('formato_reporte','pdf'))
@section('reporte')
<?php $i=1; ?>
<br><br><br>
    <h4 ALIGN=CENTER >Relación de Casos Pendientes</h4>
     <table width="100%" border="0" cellpadding="10" cellspacing="3">
            <tr style=' background:#d8d8d8;'>
                <td ALIGN=CENTER  valign="middle" style="width: 40px;height:auto;">
                    <strong>N#</strong>  
                </td>    
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
                <td style="width: 160px;height: auto; font-size: 13px;"  valign="middle">
                    <strong>Tratamiento</strong>
                </td> 
                <td style="width: 130px;height: auto; font-size: 13px;"  valign="middle">
                    <strong>Estatus</strong>
                </td>
                <td style="width: 130px;height: auto; font-size: 13px;" valign="middle" ALIGN=right>
                    <strong>Monto</strong>
                </td>
            </tr>
        <!------------------------------------------->
        <?php $contador=0; $subtotal=0; $n_caso=1; ?>
        <!------------------------------------------->
        @foreach($solicitudes as $resultado)
            @foreach($resultado->presupuestos as $key=>$presupuesto)
                <tr>
                    <td style="width: 40px;height:auto;" valign="middle" ALIGN=center>
                        <strong>{{$n_caso}}</strong>
                        <?php $n_caso++;?>
                    </td>
                    <td style="width: 140px;height:auto;" >
                        {{$presupuesto->solicitud->referente_externo}}
                    </td>
                    <td ALIGN=CENTER style="width: 50px;height:auto;">
                        {{$presupuesto->solicitud->created_at->format('d/m/Y')}}
                    </td>
                    <td ALIGN=CENTER style="width: 80px;height:auto;">
                        {{$presupuesto->solicitud->num_solicitud}}
                    </td>
                    <td style="width: 170px;height:auto;"> 
                        {{$presupuesto->solicitud->personaBeneficiario->nombre}}&nbsp;
                        {{$presupuesto->solicitud->personaBeneficiario->apellido}}
                    </td>
                    <td style="width: 130px;height:auto;">
                        {{$presupuesto->requerimiento->nombre}}
                    </td>
                    <td ALIGN=CENTER style="width: 130px;height:auto;">
                        {{$presupuesto->solicitud->estatus_display}}
                    </td>
                    <td ALIGN=right style="width: 130px;height:auto;" valign="middle" ALIGN=right>
                       {{$presupuesto->monto_for}}
                    </td>
                </tr>
                <?php 
                    $total += $presupuesto->monto;
                    $subtotal+=$presupuesto->monto;
                ?>
                <!------------------------------------------->
                <?php $cuenta=0; ?>
                @if($presupuesto->monto_for != null)
                    @if(($parametro[$contador]!= $parametro[$contador+1]))
                        <tr style="background: #CCC;">
                            <td style="width: 40px;height:auto;" valign="middle" ALIGN=center>
                                <strong>Total</strong>
                            </td>
                            <td style="width: 140px;height:auto;"></td>
                            <td style="width: 50px;height:auto;"></td>
                            <td style="width: 80px;height:auto;"></td>
                            <td style="width: 170px;height:auto;"></td>
                            <td style="width: 130px;height:auto;"></td>
                            <td style="width: 130px;height:auto;"></td>
                            <td valign="middle" ALIGN=right style="width: 130px;height:auto;" valign="middle" ALIGN=right>
                                {{tm($subtotal)}}
                            </td>
                        </tr> 
                        <?php $contador++; $subtotal=0; ?>         
                    @endif
                    <?php /*if($cuenta<=count($parametro)){
                        $cuenta++;
                    } */?>
                @endif
                <!------------------------------------------->
            @endforeach 
            <?php $i++; ?>
        @endforeach    
        <!------------------------------------------->
        <tr style="background: #CCC;">
            <td style="width: 40px;height:auto;" valign="middle" ALIGN=center>
                <strong>Total</strong>
            </td>
           <td style="width: 140px;height:auto;"></td>
           <td style="width: 50px;height:auto;"></td>
           <td style="width: 80px;height:auto;"></td>
           <td style="width: 170px;height:auto;"></td>
           <td style="width: 130px;height:auto;"></td>
           <td style="width: 130px;height:auto;"></td>
           <td valign="middle" ALIGN=right style="width: 130px;height:auto;" valign="middle" ALIGN=right>
               {{tm($subtotal)}}
           </td>
       </tr>
       <!------------------------------------------->
        <tr style=' background: #CCC;'>
            <td style="width: 40px;height:auto;" valign="middle" ALIGN=center>
                <!--<strong>{{--$i-1--}}</strong>-->
                <strong>{{$n_caso-1}}</strong>
            </td>
            <td style="width: 140px;height:auto; font-size: 13px;"  valign="middle">
                <strong>Monto Total General</strong>
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
                <strong>{{tm($total)}}</strong>
            </td>
        </tr>
    </table>
    <?php //echo $contador."<br>".count($parametro); ?>
@endsection