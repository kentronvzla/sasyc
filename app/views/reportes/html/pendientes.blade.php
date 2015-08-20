@extends('reportes.html.'.Input::get('formato_reporte','pdf'))
@section('reporte')
<!------------------------------------------->
{{--*/ $i = 1 /*--}}
<!------------------------------------------->
<h4 ALIGN=CENTER >Relación de Casos Pendientes</h4>
<table width="100%" border="0" cellpadding="10" cellspacing="3">
    <tr style=' background:#d8d8d8;'>
        <td ALIGN=CENTER  valign="middle" style="width: 20px;height:auto;">
            <strong>N°T</strong>  
        </td> 
        <td ALIGN=CENTER  valign="middle" style="width: 15px;height:auto;">
            <strong>N°</strong>  
        </td>         
        <td style="width: 140px;height:auto; font-size: 13px;"  valign="middle">
            <strong>Referencia</strong>
        </td> 
        <td style="width: 65px;height: auto; font-size: 13px;" ALIGN=CENTER  valign="middle">
            <strong>Fecha</strong>
        </td>
        <td style="width: 70px;height: auto; font-size: 13px;" ALIGN=CENTER  valign="middle">
            <strong># Caso</strong>
        </td> 
        <td style="width: 170px;height: auto; font-size: 13px;"  valign="middle">
            <strong>Beneficiario</strong>
        </td>
        <td style="width: 130px;height: auto; font-size: 13px;"  valign="middle">
            <strong>Estatus</strong>
        </td>        
        <td style="width: 160px;height: auto; font-size: 13px;"  valign="middle">
            <strong>Requerimiento</strong>
        </td> 
        <td style="width: 130px;height: auto; font-size: 13px;" valign="middle" ALIGN=right>
            <strong>Monto</strong>
        </td>
    </tr>
    <!------------------------------------------->
    {{--*/ list($contador, $subtotal, $totalref, $totalgen,  $n_caso, $n_casoref, $referencia) = array(0, 0, 0, 0, 1, 1, "") /*--}}
    <!------------------------------------------->
    @foreach($solicitudes as $resultado)
    @if(@$totalref!=0)
    @if(($referencia!= "") && ($referencia!= $resultado->referencia_externa))
    <!------------------------------------------->
    {{--*/ $n_casoref = 1 /*--}}
    <!------------------------------------------->
    <tr style="background: #CCC;">
        <td colspan="3">
            <strong>Total {{$referencia}}</strong></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td valign="middle" ALIGN=right>{{tm($totalref)}}</td>
        <!------------------------------------------->
        {{--*/ $totalref = 0 /*--}}
        <!------------------------------------------->
    </tr>
    @endif 
    @endif 
    <tr>
        <td style="width: 20px;height:auto;" valign="middle" ALIGN=center>
            <strong>{{$n_caso}}</strong>            
        </td>               
        <td style="width: 15px;height:auto;" valign="middle" ALIGN=center>
            <strong>{{$n_casoref}}</strong>
        </td>
        <!------------------------------------------->
        {{--*/ $n_caso++ /*--}}
        {{--*/ $n_casoref++ /*--}}
        {{--*/ $referencia = trim($resultado->referencia_externa) /*--}}
        <!------------------------------------------->

        <td style="width: 140px;height:auto;" >
            {{$referencia}}
        </td>
        <td ALIGN=CENTER style="width: 65px;height:auto;">
            {{$resultado->created_at->format('d/m/Y')}}
        </td>
        <td ALIGN=CENTER style="width: 70px;height:auto;">
            {{$resultado->num_solicitud}}
        </td>
        <td style="width: 170px;height:auto;"> 
            {{$resultado->personaBeneficiario->nombre}}&nbsp;
            {{$resultado->personaBeneficiario->apellido}}
        </td>
        <td ALIGN=CENTER style="width: 130px;height:auto;">
            {{$resultado->estatus_display}}
        </td>        
        <td style="width: 130px;height:auto;">
        </td>
        <td ALIGN=right style="width: 130px;height:auto;" valign="middle" ALIGN=right>
        </td>
    </tr>

    @foreach($resultado->presupuestos as $key=>$presupuesto)
    <tr>
        <td style="width: 20px;height:auto;" valign="middle" ALIGN=center>
        </td>
        <td style="width: 15px;height:auto;" valign="middle" ALIGN=center>
        </td>        
        <td style="width: 140px;height:auto;" >
        </td>
        <td ALIGN=CENTER style="width: 65px;height:auto;">
        </td>
        <td ALIGN=CENTER style="width: 70px;height:auto;">
        </td>
        <td style="width: 170px;height:auto;"> 
        </td>
        <td ALIGN=CENTER style="width: 130px;height:auto;">
        </td>        
        <td style="width: 130px;height:auto;">
            {{$presupuesto->requerimiento->nombre}}
        </td>
        <td ALIGN=right style="width: 130px;height:auto;" valign="middle" ALIGN=right>
            {{$presupuesto->montoapr_for}}
        </td>
    </tr>
    <!------------------------------------------->
    {{--*/ $subtotal += $presupuesto->montoapr /*--}}
    {{--*/ $totalref += $presupuesto->montoapr /*--}}
    {{--*/ $totalgen += $presupuesto->montoapr /*--}}
    <!------------------------------------------->

    @endforeach 
    <!-------------------------------------------> 
    {{--*/ $i++ /*--}}
    <!------------------------------------------->
    @if(@$subtotal!=0)
    <tr style="background: #CCC;">
        <td colspan="3">
            <strong>Total Caso {{$resultado->num_solicitud}}</strong></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td valign="middle" ALIGN=right>{{tm($subtotal)}}</td>
    </tr>
    @endif    
    <!------------------------------------------->
    {{--*/ $contador++ /*--}}
    {{--*/ $subtotal = 0 /*--}}
    <!-------------------------------------------> 
    @endforeach    
    @if(@$totalref!=0)
    <tr style="background: #CCC;">
        <td colspan="3">
            <strong>Total {{$referencia}}</strong></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td valign="middle" ALIGN=right>{{tm($totalref)}}</td>
    </tr>
    @endif     
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>     
    <tr style=' background: #CCC;'>
        <td style="width: 20px;height:auto;" valign="middle" ALIGN=center>
            <strong>{{$n_caso-1}}</strong>
        </td>
        <td style="width: 15px;height:auto;" valign="middle" ALIGN=center>            
        </td>        
        <td style="width: 140px;height:auto; font-size: 13px;"  valign="middle">
            <strong>Monto Total General</strong>
        </td> 
        <td style="width: 65px;height: auto; font-size: 13px;" ALIGN=CENTER  valign="middle">

        </td>
        <td style="width: 70px;height: auto; font-size: 13px;" ALIGN=CENTER  valign="middle">

        </td> 
        <td style="width: 170px;height: auto; font-size: 13px;"  valign="middle">

        </td>
        <td style="width: 130px;height: auto; font-size: 13px;"  valign="middle">

        </td> 
        <td style="width: 130px;height: auto; font-size: 13px;"  valign="middle">

        </td>
        <td style="width: 130px;height: auto; font-size: 13px;"  valign="middle" ALIGN=right>
            <strong>{{tm($totalgen)}}</strong>
        </td>
    </tr>
</table>
@endsection