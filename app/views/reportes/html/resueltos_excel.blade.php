@extends('reportes.html.'.Input::get('formato_reporte','xls'))
@section('reporte')
<?php $i=1; ?>
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
            <strong>Monto</strong>
        </td>
    </tr>
    <!------------------------------------------->
    <?php $contador=0;  $subtotal=0; ?>
    <!------------------------------------------->
    @foreach($solicitudes as $resultado)
        @foreach($resultado->presupuestos as $key=>$presupuesto)
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
                    00
                </td>
                <td class="texto-derecha-excel" >
                    {{$presupuesto->montoapr_for}}
                </td>
            </tr>
            <?php $total += $presupuesto->montoapr;
                  $subtotal+=$presupuesto->montoapr;
            ?>
            <!------------------------------------------->
            @if($presupuesto->montoapr_for != null)
                
                <tr class="titulo-celda-compuesta">
                    <td class="texto-centrado-excel"> <strong>Total</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="texto-derecha-excel">{{tm($subtotal)}}</td>
                </tr> <?php $contador++;  $subtotal=0; ?>         
                
            @endif
            <?php $i++; ?>
            <!------------------------------------------->
        @endforeach
        
    @endforeach  

    <tr class="titulo-celda-compuesta">
        <td class="texto-centrado-excel" >
            <strong>{{$i-1}}</strong>
        </td>
        <td  class="texto-centrado-excel">
            <strong>Monto Total General</strong>
        </td> 
        <td class="texto-centrado-excel">

        </td>
        <td class="texto-centrado-excel">

        </td> 
        <td class="texto-centrado-excel">

        </td>
        <td class="texto-centrado-excel">

        </td> 
        <td class="texto-centrado-excel">

        </td>
        
        <td class="texto-derecha-excel">
            {{tm($total)}}
        </td>
    </tr>
</table>
@endsection
