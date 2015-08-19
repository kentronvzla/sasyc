@extends('reportes.html.'.Input::get('formato_reporte','xls'))
@section('reporte')
<!------------------------------------------->
{{--*/ $i = 1 /*--}}
<!------------------------------------------->
<table border="0" cellpadding="10" cellspacing="0">
    <tr>
        <th colspan="8" class="texto-centrado-excel">
            <strong>Relación de Casos Resueltos</strong>  
        </th>
    </tr>
    <tr class="titulo-celda-compuesta texto-centrado-excel">
        <td >
            <strong>N#</strong>  
        </td>   
        <td >
            <strong>Referencia</strong>
        </td> 
        <td >
            <strong>Fecha</strong>
        </td>
        <td >
            <strong># Caso</strong>
        </td> 
        <td >
            <strong>Beneficiario</strong>
        </td>
        <td >
            <strong>Tratamiento</strong>
        </td> 
        <td >
            <strong>Cheque</strong>
        </td>
        <td >
            <strong>Num OP</strong>
        </td>
        <td >
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
        <td class="texto-centrado-excel">
            <strong>{{$i}}</strong>  
        </td>
        <td >
            {{$presupuesto->solicitud->referencia_externa}}                    
        </td>
        <td class="texto-centrado-excel" >
            {{$presupuesto->solicitud->created_at->format('d/m/Y')}}
        </td>
        <td class="texto-centrado-excel" >
            {{$presupuesto->solicitud->num_solicitud}}
        </td>
        <td > 
            {{$presupuesto->solicitud->personaBeneficiario->nombre}}&nbsp;
            {{$presupuesto->solicitud->personaBeneficiario->apellido}}
        </td>
        <td >
            {{$presupuesto->requerimiento->nombre}}
        </td>
        <td class="texto-centrado-excel" >
            {{$presupuesto->cheque}}
        </td>
        <td class="texto-centrado-excel" >
            {{$presupuesto->numop}}
        </td>
        <td class="texto-derecha-excel" >
            {{$presupuesto->montoapr_for}}
        </td>
    </tr>
    <!------------------------------------------->
    {{--*/ $total += $presupuesto->montoapr /*--}}
    {{--*/ $subtotal += $presupuesto->montoapr /*--}}
    {{--*/ $totalref += $presupuesto->montoapr /*--}}
    <!------------------------------------------->
    @if($presupuesto->montoapr_for != null)

    <tr class="titulo-celda-compuesta">
        <td > <strong>Total</strong></td>
        <td colspan="8" class="texto-derecha-excel">{{tm($subtotal)}}</td>
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
        <td colspan="3" class="texto-centrado-excel">
            <strong>Total {{$presupuesto->solicitud->referencia_externa}}</strong>
        </td>        
        <td colspan="6" valign="middle" ALIGN=right>{{tm($totalref)}}</td>
    </tr>
    @endif

    @endforeach

    @endforeach  

    <tr class="titulo-celda-compuesta">
        <td class="texto-centrado-excel" >
            <strong>{{$i-1}}</strong>
        </td>
        <td  class="texto-centrado-excel">
            <strong>Monto Total General</strong>
        </td> 
        <td class="texto-centrado-excel"></td>
        <td class="texto-centrado-excel"></td> 
        <td class="texto-centrado-excel"></td>
        <td class="texto-centrado-excel"></td> 
        <td class="texto-centrado-excel"></td>
        <td class="texto-centrado-excel"></td>        
        <td class="texto-derecha-excel">
            {{tm($total)}}
        </td>
    </tr>
</table>
@endsection
