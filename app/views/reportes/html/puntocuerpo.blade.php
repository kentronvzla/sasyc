@if($solicitud->personaSolicitante->ci!=$solicitud->personaBeneficiario->ci)
    <p align="justify">
        Se somete a la consideración y aprobación del Presidente de la Fundación 
        Pueblo Sobrerano, el otorgamiento de ayuda económica
        solicitada al <strong>{{$solicitud->referente->nombre}} </strong> 
        por 
        <strong>
            {{$solicitud->personaSolicitante->nombre}}&nbsp;
            {{$solicitud->personaSolicitante->apellido}}&nbsp;
        </strong>
        de 
        <strong>{{$edadS}}</strong> 
        años de edad, titular de la cédula de 
        identidad 
        <strong>N#:&nbsp;{{$solicitud->personaBeneficiario->ci}}&nbsp;</strong>, por la cantidad de 
        <strong>&nbsp;{{$montoASCII}}&nbsp;</strong> 
        a favor del ciudadan@&nbsp;

        <strong>
            {{$solicitud->personaSolicitante->nombre}}&nbsp;
            {{$solicitud->personaSolicitante->apellido}}&nbsp;
        </strong> 
        de 
        <strong>{{$edadB}}</strong> 
        años de edad, titular
        de la cédula de identidad 
        <strong>N#:&nbsp;{{$solicitud->personaBeneficiario->ci}}</strong>, 
        quien en virtud del
        analisis de la documentación  presentada por parte de las Direcciones de 
        &nbsp;{{$solicitud->departamento->nombre}}&nbsp; y de Administración, 
        necesita recursos para cubrir la necesidad 
        y/o tratar la siguiente necesidad a continuacion:&nbsp;
        <strong>&nbsp;{{$solicitud->necesidad}}&nbsp;</strong>. En tal sentido, la ayuda
        económica va dirigida a cubrir gastos inherentes a los siguientes requerimientos y/o 
        necesidades;
        &nbsp;
        @foreach($solicitud->presupuestos as $resultado)
            {{$resultado->requerimiento->nombre }},&nbsp;
        @endforeach
        <br><br>

       De allí que, en vista de las condiciones socio-económicas del solicitante y 
       de la disponibilidad presupuestaria correspondiente, se recomienda la aprobación
       para otorgar la ayuda económica, por la cantidad de; <strong>valor en texto (837.049,04)</strong>. El cheuqe 
       esta emitido a favor de:&nbsp; 
        @foreach($solicitud->presupuestos as $resultado)
            <strong>{{$resultado->beneficiario->nombre }},&nbsp;</strong>
        @endforeach 
        
    </p>
@else
    <p align="justify">
        Se somete a la consideración y aprobación del Presidente de la Fundación 
        Pueblo Sobrerano, el otorgamiento de ayuda económica
        solicitada al <strong>{{$solicitud->referente->nombre}} </strong> 
        por 
        <strong>
            {{$solicitud->personaSolicitante->nombre}}&nbsp;
            {{$solicitud->personaSolicitante->apellido}}&nbsp;
        </strong>
        de 
        <strong>{{$edadS}}</strong> 
        años de edad, titular de la cédula de 
        identidad 
        <strong>N#:&nbsp;{{$solicitud->personaBeneficiario->ci}}&nbsp;</strong>, 
        por la cantidad de 
        <strong>&nbsp;{{$montoASCII}}&nbsp;</strong> 
        a favor del si mismo, que en virtud del
        analisis de la documentación  presentada por parte de las Direcciones de 
        &nbsp;{{$solicitud->departamento->nombre}}&nbsp; y de Administración, 
        necesita recursos para cubrir la necesidad 
        y/o tratar la siguiente necesidad:
        <strong>&nbsp;{{$solicitud->necesidad}}&nbsp;</strong>. En tal sentido, la ayuda
        económica va dirigida a cubrir gastos inherentes a los siguientes requerimientos y/o 
        necesidades;
        &nbsp;
        @foreach($solicitud->presupuestos as $resultado)
            {{$resultado->requerimiento->nombre }},&nbsp;
        @endforeach
        <br><br>

       De las necesidades presentes y en vista de las condiciones socio-económicas del solicitante y 
       de la disponibilidad presupuestaria correspondiente, se recomienda la aprobación
       para otorgar la ayuda económica, por la cantidad de; <strong>&nbsp;{{$montoASCII}}&nbsp;</strong>. El cheuqe 
       esta emitido a favor de:&nbsp; 
       @foreach($solicitud->presupuestos as $resultado)
            <strong>{{$resultado->beneficiario->nombre }},&nbsp;</strong>
       @endforeach 
    </p>
@endif