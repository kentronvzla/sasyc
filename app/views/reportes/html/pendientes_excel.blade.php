@extends('reportes.html.'.Input::get('formato_reporte','xls'))
@section('reporte')
<!------------------------------------------->
{{--*/ $i = 1 /*--}}
<!------------------------------------------->
<table border="0" cellpadding="10" cellspacing="0">
    <tr >
        <th colspan="9" class="texto-centrado-excel">
            <strong>Relación de Casos Pendientes</strong>  
        </th>
    </tr>
    <thead>
        <tr class="texto-centrado-excel fondo-excel">
            <th>
                <strong>N°T</strong>  
            </th> 
            <th>
                <strong>N°</strong>  
            </th>         
            <th>
                <strong>Referencia</strong>
            </th> 
            <th>
                <strong>Fecha</strong>
            </th>
            <th>
                <strong># Caso</strong>
            </th> 
            <th>
                <strong>Beneficiario</strong>
            </th>
            <th>
                <strong>Estatus</strong>
            </th>        
            <th>
                <strong>Tratamiento</strong>
            </th> 
            <th>
                <strong>Monto</strong>
            </th>
        </tr>
    </thead>
    <!------------------------------------------->
    {{--*/ list($contador, $subtotal, $totalref, $totalgen,  $n_caso, $n_casoref, $referencia) = array(0, 0, 0, 0, 1, 1, "") /*--}}
    <!------------------------------------------->
    <tbody>
        @foreach($solicitudes as $resultado)
        @if(@$totalref!=0)
        @if(($referencia!= "") && ($referencia!= $resultado->referencia_externa))
        <!------------------------------------------->
        {{--*/ $n_casoref = 1 /*--}}
        <!------------------------------------------->
        <tr class="fondo-inferior-excel">
            <td colspan="3">
                <strong>Total {{$referencia}}</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="texto-derecha-excel">{{tm($totalref)}}</td>
            <!------------------------------------------->
            {{--*/ $totalref = 0 /*--}}
            <!------------------------------------------->
        </tr>
        @endif 
        @endif 
        <tr>
            <td>
                <strong>{{$n_caso}}</strong>            
            </td>               
            <td>
                <strong>{{$n_casoref}}</strong>
            </td>
            <!------------------------------------------->
            {{--*/ $n_caso++ /*--}}
            {{--*/ $n_casoref++ /*--}}
            {{--*/ $referencia = trim($resultado->referencia_externa) /*--}}
            <!------------------------------------------->
            <td>
                {{$referencia}}
            </td >
            <td>
                {{$resultado->created_at->format('d/m/Y')}}
            </td>
            <td>
                {{$resultado->num_solicitud}}
            </td>
            <td> 
                {{$resultado->personaBeneficiario->nombre}}&nbsp;
                {{$resultado->personaBeneficiario->apellido}}
            </td>
            <td>
                {{$resultado->estatus_display}}
            </td>                   
             @if($resultado->presupuestos->count()==0)
            <td>                
            </td>
            <td>
                0
            </td>
            @endif
            @foreach($resultado->presupuestos as $key=>$presupuesto)
            <td>
                {{$presupuesto->requerimiento->nombre}}
            </td>
            <td class="texto-derecha-excel">
                {{$presupuesto->montoapr_for}}
            </td>
            </tr>
            <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <!------------------------------------------->
            {{--*/ $subtotal += $presupuesto->montoapr /*--}}
            {{--*/ $totalref += $presupuesto->montoapr /*--}}
            {{--*/ $totalgen += $presupuesto->montoapr /*--}}
            <!------------------------------------------->
            @endforeach 

        </tr>
        <!-------------------------------------------> 
        {{--*/ $i++ /*--}}
        <!------------------------------------------->
        @if(@$subtotal!=0)
        <tr class="fondo-inferior-excel">
            <td colspan="3">
                <strong>Total Caso {{$resultado->num_solicitud}}</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="texto-derecha-excel">{{tm($subtotal)}}</td>
        </tr>
        @endif    
        <!------------------------------------------->
        {{--*/ $contador++ /*--}}
        {{--*/ $subtotal = 0 /*--}}
        <!-------------------------------------------> 
        @endforeach    
        @if(@$totalref!=0)
        <tr class="fondo-inferior-excel">
            <td colspan="3">
                <strong>Total {{$referencia}}</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="texto-derecha-excel">{{tm($totalref)}}</td>
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
        <tr class="fondo-inferior-excel">
            <td class="texto-centrado-excel">
                <strong>{{$n_caso-1}}</strong>
            </td>
            <td class="texto-centrado-excel">            
            </td>        
            <td>
                <strong>Monto Total General</strong>
            </td> 
            <td></td>
            <td></td> 
            <td></td>
            <td></td> 
            <td></td>
            <td class="texto-derecha-excel">
                <strong>{{tm($totalgen)}}</strong>
            </td>
        </tr>
    </tbody>
</table>
@endsection