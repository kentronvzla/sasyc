{{--*/ $cont_total = count($solicitud->presupuestos) /*--}}
{{--*/ $cont_ciclo = 0 /*--}}
@if($solicitud->getSolicitante()->ci!=$solicitud->getBeneficiario()->ci)
    <p align="justify">
        Se somete a la consideración y aprobación del Presidente de la Fundación 
        Pueblo Soberano, el otorgamiento de ayuda económica
        solicitada al <strong>{{$solicitud->referente->nombre}} </strong> 
        por 
        <strong>
            {{$solicitud->getSolicitante()->nombre}}&nbsp;
            {{$solicitud->getSolicitante()->apellido}}&nbsp;
        </strong>
        de 
        <strong>{{$solicitud->getSolicitante()->fecha_nacimiento->age}}</strong> 
        años de edad, titular de la cédula de 
        identidad 
        <strong>{{($solicitud->getSolicitante()->tipoNacionalidad->id==1) ? "V" : "E"}}-{{$solicitud->personaSolicitante->ci}}&nbsp;</strong>, por la cantidad de 
        <strong>&nbsp;{{$montoASCII}}&nbsp;</strong> 
        a favor del ciudadan@&nbsp;

        <strong>
            {{strtoupper($solicitud->getBeneficiario()->nombre)}}&nbsp;
            {{strtoupper($solicitud->getBeneficiario()->apellido)}}&nbsp;
        </strong> 
        de 
        <strong>{{$solicitud->getBeneficiario()->fecha_nacimiento->age}}</strong> 
        años de edad, titular
        de la cédula de identidad 
        <strong>{{($solicitud->getBeneficiario()->tipoNacionalidad->id==1) ? "V" : "E"}}-{{$solicitud->personaBeneficiario->ci}}</strong>, 
        quien en virtud del
        analisis de la documentación  presentada por parte de las Direcciones de 
        {{$solicitud->departamento->nombre}} y de Administración, 
        necesita recursos para cubrir y/o tratar la siguiente necesidad:&nbsp;
        <strong>&nbsp;{{$solicitud->necesidad}}&nbsp;</strong>. En tal sentido, la ayuda
        económica va dirigida a cubrir gastos inherentes a los siguientes requerimientos y/o 
        necesidades:
        
        @foreach($solicitud->presupuestos as $resultado)
            {{--*/ $cont_ciclo++ /*--}}
            {{$resultado->requerimiento->nombre}}
            @if($cont_ciclo == $cont_total)
                {{"."}}&nbsp;
            @else
                {{","}}&nbsp;
            @endiF
        @endforeach
        <br><br>

       De allí que, en vista de las condiciones socio-económicas del solicitante y 
       de la disponibilidad presupuestaria correspondiente, se recomienda la aprobación
       para otorgar la ayuda económica, por la cantidad de; <strong>&nbsp;{{$montoASCIIapr}}&nbsp;</strong>
       . El cheque
       esta emitido a favor de:<br>
        @foreach($solicitud->presupuestos as $resultado)
            <strong>
                {{$resultado->beneficiario->nombre}} por&nbsp;Bs. F
                {{tm($resultado->montoapr)}}<br>
            </strong>
        @endforeach 
        
    </p>
@else
    <p align="justify">
        Se somete a la consideración y aprobación del Presidente de la Fundación 
        Pueblo Sobrerano, el otorgamiento de ayuda económica
        solicitada al <strong>{{$solicitud->referente->nombre}} </strong> 
        por 
        <strong>
            {{strtoupper($solicitud->getBeneficiario()->nombre)}}&nbsp;
            {{strtoupper($solicitud->getBeneficiario()->apellido)}}&nbsp;
        </strong>
        de 
        <strong>{{$solicitud->getBeneficiario()->fecha_nacimiento->age}}</strong> 
        años de edad, titular de la cédula de 
        identidad 
        <strong>{{($solicitud->getBeneficiario()->tipoNacionalidad->id==1) ? "V" : "E"}}-{{$solicitud->getBeneficiario->ci}}&nbsp;</strong>, 
        por la cantidad de 
        <strong>&nbsp;{{$montoASCII}}&nbsp;</strong> 
        a favor de sí mismo, que en virtud del
        análisis de la documentación  presentada por parte de las Direcciones de 
        &nbsp;{{$solicitud->departamento->nombre}}&nbsp; y de Administración, 
        necesita recursos para cubrir y/o tratar la siguiente necesidad:
        <strong>{{$solicitud->necesidad}}&nbsp;</strong>. En tal sentido, la ayuda
        económica va dirigida a cubrir gastos inherentes a los siguientes requerimientos y/o 
        necesidades:
        &nbsp;
        @foreach($solicitud->presupuestos as $resultado)
            {{--*/ $cont_ciclo++ /*--}}
            {{$resultado->requerimiento->nombre}}
            @if($cont_ciclo == $cont_total)
                {{"."}}&nbsp;
            @else
                {{","}}&nbsp;
            @endiF
        @endforeach
        <br><br>

       De las necesidades presentes y en vista de las condiciones socio-económicas del solicitante y 
       de la disponibilidad presupuestaria correspondiente, se recomienda la aprobación
       para otorgar la ayuda económica, por la cantidad de: <strong>&nbsp;{{$montoASCIIapr}}&nbsp;</strong>. El cheque 
       esta emitido a favor de:<br><br>
        @foreach($solicitud->presupuestos as $resultado)
            <strong>
                {{$resultado->beneficiario->nombre}} por&nbsp;Bs. F
                {{tm($resultado->montoapr)}}<br>
            </strong>
        @endforeach 
    </p>
@endif