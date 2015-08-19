@extends('reportes.html.'.Input::get('formato_reporte','pdf'))
@section('reporte')

<!------------------------------------------->
{{--*/ $i = 1 /*--}}
<!------------------------------------------->

<h4 ALIGN=CENTER >Relación de Casos Resueltos</h4>
<table width="100%" border="1" cellpadding="0" cellspacing="0">
    <tr style=' background:#d8d8d8;'>
        <td ALIGN=CENTER  valign="middle" style="width: 35px;height:auto; font-size: 13px;">
            <strong>N#</strong>  
        </td>   
        <td style="width: 100px;height:auto; font-size: 13px;"  valign="middle">
            <strong>Referencia</strong>
        </td> 
        <td style="width: 65px;height: auto; font-size: 13px;" ALIGN=CENTER  valign="middle">
            <strong>Fecha</strong>
        </td>
        <td style="width: 50px;height: auto; font-size: 13px;" ALIGN=CENTER  valign="middle">
            <strong># Caso</strong>
        </td> 
        <td style="width: 180px;height: auto; font-size: 13px;"  valign="middle">
            <strong>Beneficiario</strong>
        </td>
        <td style="width: 180px;height: auto; font-size: 13px;"  valign="middle">
            <strong>Requerimiento</strong>
        </td> 
        <td style="width: 50px;height: auto; font-size: 13px;"  valign="middle" ALIGN=CENTER>
            <strong>Cheque</strong>
        </td>
        <td style="width: 60px;height: auto; font-size: 13px;"  valign="middle" ALIGN=CENTER>
            <strong>Num OP</strong>
        </td>
        <td style="width: 130px;height: auto; font-size: 13px;"  valign="middle" ALIGN=right>
            <strong>Monto</strong>
        </td>
    </tr>
    <!------------------------------------------->
    {{--*/ list($contador, $subtotal, $totalref, $n_caso, $n_casoref) = array(0, 0, 0, 1 , 1) /*--}}
    <!------------------------------------------->

    @foreach($solicitudes as $resultado)
    @foreach($resultado->presupuestos as $key=>$presupuesto)

    <!------------------------------------------->
    {{--*/ $n_casoref = 1; /*--}}
    <!------------------------------------------->

    <tr>
        <td ALIGN=CENTER  valign="middle" style="width: 35px;height:auto; font-size: 13px;">
            <strong>{{$i}}</strong>  
        </td>
        <td style="width: 100px;height:auto;">
            {{$presupuesto->solicitud->referencia_externa}}

        </td>
        <td ALIGN=CENTER style="width: 65px;height:auto;">
            {{$presupuesto->solicitud->created_at->format('d/m/Y')}}
        </td>
        <td ALIGN=CENTER style="width: 70px;height:auto;">
            {{$presupuesto->solicitud->num_solicitud}}
        </td>
        <td style="width: 180px;height:auto;"> 
            {{$presupuesto->solicitud->personaBeneficiario->nombre}}&nbsp;
            {{$presupuesto->solicitud->personaBeneficiario->apellido}}
        </td>
        <td style="width: 180px;height:auto;">
            {{$presupuesto->requerimiento->nombre}}
        </td>
        <td ALIGN=CENTER style="width: 50px;height:auto;">
            {{$presupuesto->cheque}}
        </td>
        <td ALIGN=CENTER style="width: 60px;height:auto;">
            {{$presupuesto->numop}}
        </td>
        <td ALIGN=right style="width: 130px;height:auto;">
            {{$presupuesto->montoapr_for}}
        </td>
    </tr>
    <!------------------------------------------->
    {{--*/ $total += $presupuesto->montoapr /*--}}
    {{--*/ $subtotal += $presupuesto->montoapr /*--}}
    {{--*/ $totalref += $presupuesto->montoapr /*--}}
    <!------------------------------------------->
    @if($presupuesto->montoapr_for != null)

    <tr style="background: #CCC;">
        <td style="width: 40px;height:auto; font-size: 13px;">
            <strong>Total</strong>
        </td>
        <td colspan="8" valign="middle" ALIGN=right>{{tm($subtotal)}}</td>
    </tr>

    <!------------------------------------------->
    {{--*/ $contador++ /*--}}
    {{--*/ $subtotal = 0 /*--}}
    <!-------------------------------------------> 

    @endif
    <!-------------------------------------------> 
    {{--*/ $i++ /*--}}
    <!------------------------------------------->
    @if(@$totalref!=0)
    <tr style="background: #CCC;">
        <td colspan="3">
            <strong>Total {{$presupuesto->solicitud->referencia_externa}}</strong>
        </td>        
        <td colspan="6" valign="middle" ALIGN=right>{{tm($totalref)}}</td>
    </tr>
    @endif     

    @endforeach 

    @endforeach  

    <tr style=' background: #CCC;'>
        <td valign="middle" ALIGN=center style="width: 35px;height:auto; font-size: 13px;">
            <strong>{{$i-1}}</strong>
        </td>
        <td style="width: 100px;height:auto; font-size: 13px;"  valign="middle">
            <strong>Monto Total General</strong>
        </td> 
        <td colspan="6" style="width: 65px;height: auto; font-size: 13px;">
        </td>
        <td style="width: 130px;height: auto; font-size: 13px;"  valign="middle" ALIGN=right>
            {{tm($total)}}
        </td>
    </tr>
</table>
@endsection