@if($solicitud->getSolicitante()->ci!=$solicitud->getBeneficiario()->ci)
    <tr>
        <td>
            <p align="justify">
                Tengo el honor de dirigirme a usted en la oportunidad de saludarle
                y a la vez remitirle los recaudos del ciudadano(a) 
                <strong>
                    &nbsp;{{$solicitud->getSolicitante()->nombre}}&nbsp;
                    {{$solicitud->getSolicitante()->apellido}}&nbsp;
                </strong> 
                de&nbsp; 
                {{$solicitud->getSolicitante()->fecha_nacimiento->age}}
                &nbsp;años de edad, 
                titular de la cédula de identidad 
                <strong>
                    {{($solicitud->getSolicitante()->tipoNacionalidad->id==1) ? "V" : "E"}}-{{$solicitud->getSolicitante->ci}}&nbsp;
                </strong>;
                quien solicita ayuda económica para cubrir gastos ante la necesidad y/o
                tratamiento de:&nbsp;{{$solicitud->necesidad}} a favor del ciudadano(a)
                <strong>
                    &nbsp;
                    {{$solicitud->getBeneficiario()->nombre}}&nbsp;
                    {{$solicitud->getBeneficiario()->apellido}}&nbsp;
                </strong> 
                de &nbsp; 
                {{$solicitud->getBeneficiario()->fecha_nacimiento->age}}
                &nbsp;años de edad,
                titular de la cédula de identidad 
                <strong>{{($solicitud->getBeneficiario()->tipoNacionalidad->id==1) ? "V" : "E"}}-{{$solicitud->getBeneficiario->ci}}&nbsp;</strong>, 
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

                <strong>1er. TTE. {{$solicitud->departamento->supervisor->nombre}} Dirección de {{$solicitud->departamento->nombre}}</strong>
            </p><br>
        </td>
    </tr>
@else
    <tr>
        <td>
            <p align="justify">
                Tengo el honor de dirigirme a usted en la oportunidad de saludarle
                y a la vez remitirle los recaudos del ciudadano(a)&nbsp;
                <strong>
                    {{$solicitud->getBeneficiario()->nombre}}&nbsp;
                    {{$solicitud->getBeneficiario()->apellido}}&nbsp;,
                </strong> 
                de&nbsp; 
                {{$solicitud->getBeneficiario()->getEdadAttribute()}}
                &nbsp;años de edad, 
                titular de la cédula de identidad 
                <strong>
                   {{($solicitud->getBeneficiario()->tipoNacionalidad->id==1) ? "V" : "E"}}-{{$solicitud->getBeneficiario()->ci}},
                </strong>
                &nbsp;quien solicita ayuda económica para cubrir gastos ante la necesidad y/o
                tratamiento de:&nbsp;{{$solicitud->necesidad}} a favor si mismo(a), 
                por la 
                cantidad de <strong>&nbsp;{{$montoASCII}}&nbsp;</strong>,
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
                            {{ (isset($resultado->beneficiario->nombre) && $resultado->beneficiario->nombre != null) ? $resultado->beneficiario->nombre : ""}} por&nbsp;Bs. F                            
                            {{$resultado->montoapr}}<br>
                        </strong>
                    @endif
                @endforeach <br><br>

                Sin otro particular al cual hacer referencia, se despide de usted.<br>
                Atentamente:

                <strong>{{$solicitud->departamento->supervisor->nombre}} Dirección de {{$solicitud->departamento->nombre}}</strong>
            </p><br>
        </td>
    </tr>
@endif
