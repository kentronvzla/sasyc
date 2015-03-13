@extends('reportes.pdf.master')
@section('reporte')
    @for($i=0;$i<$cantReportes;$i++)
        <h3>{{$titulo[$i]}}</h3>
        <table width="100%" border="0" cellpadding="10" cellspacing="0">
            <thead>
            <tr>
                @foreach($columnas[$i] as $columna)
                    <th style="width: {{80/count($columnas[$i])}}%;" class="titulo-tabla">{{$columna}}</th>
                @endforeach
                <th style="width: 10%;" class="titulo-tabla texto-derecha">Cuenta N°</th>
                <th style="width: 10%;" class="titulo-tabla texto-derecha">Monto</th>
            </tr>
            </thead>
            <?php $anterior = $solicitudes[$i]->first()->{$primera_columna[$i]}; ?>
            @foreach($solicitudes[$i] as $solicitud)
                @if(count($columnas[$i])>1 && $anterior!=$solicitud->{$primera_columna[$i]})
                    <tr>
                        <th class="titulo-tabla" colspan="{{count($columnas[$i])}}">Total {{ $solicitud->getValorReporte($primera_columna[$i]) }}</th>
                        <th class="titulo-tabla texto-derecha">{{$cont}}</th>
                        <th class="titulo-tabla texto-derecha">{{tm($acum)}}</th>
                    </tr>
                    <?php $cont = 0; $acum=0; ?>
                @endif
                <tr>
                    @foreach($columnas[$i] as $key=>$columna)
                        <td style="width: {{80/count($columnas[$i])}}%;" class="fila-tabla">{{ $solicitud->getValorReporte($key) }}</td>
                    @endforeach
                    <td class="fila-tabla texto-derecha" style="width: 10%;">
                        {{$solicitud->cantidad}}
                    </td>
                    <td class="fila-tabla texto-derecha" style="width: 10%;">
                        {{tm($solicitud->monto)}}
                    </td>
                </tr>
                <?php $cont+=$solicitud->cantidad;$acum+=$solicitud->monto; ?>

                <?php $anterior = $solicitud->{$primera_columna[$i]}; ?>
            @endforeach
            <tfoot>
            @if(count($columnas[$i])>1)
                <tr>
                    <th class="titulo-tabla" colspan="{{count($columnas[$i])}}">Total {{ $solicitud->getValorReporte($primera_columna[$i]) }}</th>
                    <th class="titulo-tabla texto-derecha">{{$cont}}</th>
                    <th class="titulo-tabla texto-derecha">{{tm($acum)}}</th>
                </tr>
            @endif
            <tr>
                <th class="titulo-tabla" colspan="{{count($columnas[$i])}}">Total</th>
                <th class="titulo-tabla texto-derecha">{{$solicitudes[$i]->sum('cantidad')}}</th>
                <th class="titulo-tabla texto-derecha">{{tm($solicitudes[$i]->sum('monto'))}}</th>
            </tr>
            </tfoot>
        </table>
        <?php $cont=0;$acum=0; ?>
        <br>
        <br>
    @endfor
@endsection