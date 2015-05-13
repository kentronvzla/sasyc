@extends('reportes.html.'.Input::get('formato_reporte','xls'))
@section('reporte')
@for($i=0;$i<$cantReportes;$i++)
<h3>{{$titulo[$i]}}</h3>
<table border="0" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            @foreach($columnas[$i] as $columna)
            <th style="width: {{80/count($columnas[$i])}}%;" class="titulo-celda-excel">{{$columna}}</th>
            @endforeach
            <th class="titulo-celda-excel">Cuenta N°</th>
            <th class="titulo-celda-excel">Monto</th>
        </tr>
    </thead>
    @if(count($solicitudes[$i]))
    <?php $anterior = $solicitudes[$i]->first()->{$primera_columna[$i]}; ?>
    @foreach($solicitudes[$i] as $solicitud)
    @if(count($columnas[$i])>1 && $anterior!=$solicitud->{$primera_columna[$i]})
    <tr>
        <th class="titulo-celda-compuesta" colspan="{{count($columnas[$i])}}">Total {{ $solicitud->getValorReporte($primera_columna[$i]) }}</th>
        <th class="texto-derecha-excel fondo-excel">{{$cont}}</th>
        <th class="texto-derecha-excel fondo-excel">{{tm($acum)}}</th>
    </tr>
    <?php $cont = 0;
    $acum = 0; ?>
    @endif
    <tr>
        @foreach($columnas[$i] as $key=>$columna)
        <td style="width: {{80/count($columnas[$i])}}%;" class="fila-tabla-excel">{{ $solicitud->getValorReporte($key) }}</td>
        @endforeach
        <td class="fila-tabla-excel texto-derecha-excel" >
            {{$solicitud->cantidad}}
        </td>
        <td class="fila-tabla-excel texto-derecha-excel">
            {{tm($solicitud->monto)}}
        </td>
    </tr>
    <?php $cont+=$solicitud->cantidad;
    $acum+=$solicitud->monto; ?>

<?php $anterior = $solicitud->{$primera_columna[$i]}; ?>
    @endforeach
    <tfoot>
        @if(count($columnas[$i])>1)
        <tr>
            <th class="titulo-celda-compuesta" colspan="{{count($columnas[$i])}}">Total {{ $solicitud->getValorReporte($primera_columna[$i]) }}</th>
            <th class="texto-derecha-excel fondo-excel" >{{$cont}}</th>
            <th class="texto-derecha-excel fondo-excel" >{{tm($acum)}}</th>
        </tr>
        @endif
        <tr>
            <th class="titulo-celda-compuesta" colspan="{{count($columnas[$i])}}">Total</th>
            <th class="texto-derecha-excel fondo-excel" >{{$solicitudes[$i]->sum('cantidad')}}</th>
            <th class="texto-derecha-excel fondo-excel" >{{tm($solicitudes[$i]->sum('monto'))}}</th>
        </tr>
    </tfoot>
    @endif
</table>
<?php $cont = 0;
$acum = 0; ?>
<br>
<br>
@endfor
@endsection