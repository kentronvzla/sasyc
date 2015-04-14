@if($solicitud->personaSolicitante->ci!=$solicitud->personaBeneficiario->ci)
    <tr>
        <td>
            <p align="justify">
                Tengo el honor de dirigirme a usted en la oportunidad de saludarle
                y a la vez remitirle los recaudos del ciudadano(a) 
                <strong>
                    &nbsp;{{$solicitud->personaSolicitante->nombre}}&nbsp;
                    {{$solicitud->personaSolicitante->apellido}}&nbsp;
                </strong> 
                de&nbsp; 
                {{$solicitud->personaSolicitante->fecha_nacimiento->age}}
                &nbsp;años de edad, 
                titular de la cédula de identidad 
                <strong>
                    N#&nbsp;{{$solicitud->personaSolicitante->ci}}&nbsp;
                </strong>;
                quien solicita ayuda económica para cubrir gastos ante la necesidad y/o
                tratamiento de:&nbsp;{{$solicitud->necesidad}}&nbsp; a favor del ciudadano(a)
                <strong>
                    &nbsp;
                    {{$solicitud->personaBeneficiario->nombre}}&nbsp;
                    {{$solicitud->personaBeneficiario->apellido}}&nbsp;
                </strong> 
                de &nbsp; 
                {{$solicitud->personaBeneficiario->fecha_nacimiento->age}}
                &nbsp;años de edad,
                titular de la cédula de identidad 
                <strong>N#&nbsp;{{$solicitud->personaBeneficiario->ci}}&nbsp;</strong>, 
                por la 
                cantidad <strong>&nbsp;{{$montoASCII}}&nbsp;</strong>,
                en virtud de cubrir los gastos ante; 
                <strong>
                    @foreach($solicitud->presupuestos as $resultado)
                        {@if ($resultado->beneficiario_id != null)
                            <strong>
                                &nbsp;&nbsp;-&nbsp;
                                {{$resultado->beneficiario->nombre}}
                                &nbsp;
                            </strong>
                         @endif
                    @endforeach
                </strong>                    
            </p><br>
        </td>
    </tr>
    <tr>
        <td>
            <p align="center">
                Se agradece emitir cheque por la cantidad de:<br>
                <strong>&nbsp;{{$montoASCII}}&nbsp;</strong><br>
                A nombre o razón social de 
                @foreach($solicitud->presupuestos as $resultado)
                    <strong>{{$resultado->beneficiario->nombre}},&nbsp;</strong>
                @endforeach <br><br>

                Sin otro particular al cual hacer referencia, se despide de usted.<br>
                Atentamente,<br><br>

                <strong>1ER.TTE. Evelyn Cárdenas<br>Dirección de bienestar Social</strong>
            </p><br>
        </td>
    </tr>
@else
    <tr>
        <td>
            <p align="justify">
                Tengo el honor de dirigirme a usted en la oportunidad de saludarle
                y a lavez remitirle los recaudos del ciudadano(a) 
                <strong>
                    &nbsp;{{$solicitud->personaSolicitante->nombre}}&nbsp;
                    {{$solicitud->personaSolicitante->apellido}}&nbsp;
                </strong> 
                <!--de&nbsp; 
                {{--$solicitud->personaBeneficiario->fecha_nacimiento->age--}}
                &nbsp;años de edad,--> 
                titular de la cédula de identidad 
                <strong>
                    N#&nbsp;{{$solicitud->personaSolicitante->ci}}&nbsp;
                </strong>;
                quien solicita ayuda económica para cubrir gastos ante la necesidad y/o
                tratamiento de:&nbsp;{{$solicitud->necesidad}}&nbsp; a favor si mismo(a), 
                por la 
                cantidad <strong>&nbsp;{{$montoASCII}}&nbsp;</strong>,
                en virtud de cubrir los gastos por:<br><br> 
                <strong>
                    @foreach($solicitud->presupuestos as $resultado)
                    &nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;{{$resultado->requerimiento->nombre}}.
                    &nbsp;<br>
                    @endforeach
                </strong>                    
            </p><br>
        </td>
    </tr>
    <tr>
        <td>
            <p  align="justify">
                Se agradece emitir cheque por la cantidad de:
                <strong>&nbsp;{{$montoASCII}}&nbsp;</strong>
                a nombre o razón social de:<br><br> 
                @foreach($solicitud->presupuestos as $resultado)
                    @if ($resultado->beneficiario_id != null)
                         <strong>
                            {{$resultado->beneficiario->nombre}} por&nbsp;
                            {{$resultado->montoapr}}<br>
                        </strong>
                    @endif
                @endforeach <br><br>

                Sin otro particular al cual hacer referencia, se despide de usted.<br>
                Atentamente:

                <strong>1ER.TTE. Evelyn Cárdenas Dirección de bienestar Social</strong>
            </p><br>
        </td>
    </tr>
@endif
