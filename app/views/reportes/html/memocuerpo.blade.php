@if($solicitud->personaSolicitante->ci!=$solicitud->personaBeneficiario->ci)
    <tr>
        <td>
            <p align="justify">
                Tengo el honor de dirigirme a usted en la oportunidad de saludarle
                y a lavez remitirle los recaudos del ciudadano(a) 
                <strong>
                    &nbsp;{{$solicitud->personaSolicitante->nombre}}&nbsp;
                    {{$solicitud->personaSolicitante->apellido}}&nbsp;
                </strong> 
                de 
               <!-- {{--$edadS--}}-->
                años de edad, 
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
                de 
                <!--&nbsp;{{--$edadB--}}&nbsp;-->
                años de edad,
                titular de la cédula de identidad 
                <strong>N#&nbsp;{{$solicitud->personaBeneficiario->ci}}&nbsp;</strong>, 
                por la 
                cantidad <strong>valor a texto(Bs 7290,00)</strong>,
                en virtud de cubrir los gastos ante; 
                <strong>
                    @foreach($solicitud->presupuestos as $resultado)
                        {{$resultado->requerimiento->nombre }},&nbsp;
                    @endforeach
                </strong>                    
            </p><br>
        </td>
    </tr>
    <tr>
        <td>
            <p align="center">
                Se agradece emitir cheque por la cantidad de:<br>
                <strong>valor en texto (Bs 7290,00)</strong><br>
                A nombre o razón social de 
                @foreach($solicitud->presupuestos as $resultado)
                    <strong>{{$resultado->beneficiario->nombre }},&nbsp;</strong>
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
                de 
                <!--{{--$edadS--}}-->
                años de edad, 
                titular de la cédula de identidad 
                <strong>
                    N#&nbsp;{{$solicitud->personaSolicitante->ci}}&nbsp;
                </strong>;
                quien solicita ayuda económica para cubrir gastos ante la necesidad y/o
                tratamiento de:&nbsp;{{$solicitud->necesidad}}&nbsp; a favor si mismo, 
                por la 
                cantidad <strong>valor a texto(Bs 7290,00)</strong>,
                en virtud de cubrir los gastos ante; 
                <strong>
                    @foreach($solicitud->presupuestos as $resultado)
                        {{--$resultado->requerimiento->nombre--}},&nbsp;
                    @endforeach
                </strong>                    
            </p><br>
        </td>
    </tr>
    <tr>
        <td>
            <p align="center">
                Se agradece emitir cheque por la cantidad de:<br>
                <strong>valor en texto (Bs 7290,00)</strong><br>
                A nombre o razón social de 
                @foreach($solicitud->presupuestos as $resultado)
                    <strong>{{--$resultado->beneficiario->nombre--}},&nbsp;</strong>
                @endforeach <br><br>

                Sin otro particular al cual hacer referencia, se despide de usted.<br>
                Atentamente,<br><br>

                <strong>1ER.TTE. Evelyn Cárdenas<br>Dirección de bienestar Social</strong>
            </p><br>
        </td>
    </tr>
@endif
