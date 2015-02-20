<style>
    .cuerpo {
        font-family:  Arial, Helvetica, sans-serif;
        font-size: 13px;
        text-align: left;
    }
    .titulo {
        font-family:  Arial, Helvetica, sans-serif
    }
    .texto-negrita{
        font-weight: bold;
    }
    .texto-centrado{
        text-align: center;
    }
    .titulo-tabla{
        height: auto;
        border: 0.5px;
        padding: 3px;
        font-weight: bold;
        background: #D8D8D8;
    }
    .fila-tabla{
        height: auto;
        padding: 2px;
    }
</style>
<page backcolor="#FEFEFE" backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm" footer="date;heure;page">
   <!------------------------------------------------------------------------->
    <div class="cuerpo" style="position: center">
        <table width="100%" border="0" cellpadding="10" cellspacing="10">
            <tr>
                <td width=650>
                    {{HTML::image('img/logoReporte.jpg');}}
                </td>
            </tr>
        </table>
    </div>
   <br>
   <!------------------------------------------------------------------------->
    <div class="cuerpo" style="position: center">
        <table width="100%" border="0" cellpadding="10" cellspacing="5">
            <tr><td width=670 ALIGN=CENTER><strong>Republica Bolivariana de Venezuela</strong></td></tr>
            <tr><td ALIGN=CENTER><strong>Ministerio del Poder Popular del Despacho de la Presidencia</strong></td></tr>
            <tr><td ALIGN=CENTER><strong>Fundacion Pueblo Soberano</strong></td></tr>
        </table>
    </div>
   <br><br>
   <!------------------------------------------------------------------------->
   <br>
   <!------------------------------------------------------------------------->
   <div class="cuerpo" style="position: center">
        <table width="100%" border="0" cellpadding="10" cellspacing="5">
            <tr><td width=170><strong>Para:</strong></td>
                <td width=500>{{$memo->destino->nombre or "No se encontro departamento"}}</td>
            </tr>
            <tr><td><strong>De:</strong></td>
                <td>{{$memo->origen->nombre or "No se encontro departamento"}}</td>
            </tr>
            <tr><td><strong>Asunto:</strong></td>
                <td>{{$memo->asunto}}</td>
            </tr>
            <tr><td><strong>Fecha:</strong></td>
                <td>{{$memo->fecha->format('d/m/Y')}}</td>
            </tr>
             <tr><td><strong>N° de Memorandum: </strong></td>
                <td>{{$memo->numero}}</td>
            </tr>
        </table>
    </div>
   <br><br>
    <!------------------------------------------------------------------------->
    <div class="cuerpo" style="position: center">
        <table width="100%" border="0" cellpadding="10" cellspacing="5">
            <tr>
                <td width=670 ALIGN=CENTER>
                    <strong>Listado de casos por fecha y codigo</strong>
                </td>
            </tr>
        </table>
    </div>
    <br>
        <table style="width: 100%;font-size: 10pt;border: 0.5px solid black" cellspacing="0" border="0">
            <thead>
                <tr>
                    <th style="width: 10%;" class="titulo-tabla" ALIGN=CENTER>N° solicitud</th>
                    <th style="width: 15%;" class="titulo-tabla" ALIGN=CENTER>Fecha</th>
                    <th style="width: 10%;" class="titulo-tabla" ALIGN=CENTER>Descripcion</th>
                    <th style="width: 10%;" class="titulo-tabla" ALIGN=CENTER>Estatus</th>
                    <th style="width: 20%;" class="titulo-tabla" ALIGN=CENTER>Beneficiario</th>
                </tr>
            </thead>
            <tbody>
                @foreach($memo->solicitudes as $resultado)
                <tr>
                    <td class="fila-tabla" style="width: 10%;" ALIGN=CENTER> 
                        {{$memo->solicitud->id or "#"}}
                    </td>
                    <td class="fila-tabla" style="width: 15%;" ALIGN=CENTER> 
                        {{$memo->fecha->format('d/m/Y')}}
                    </td>
                    <td class="fila-tabla" style="width: 40%;"> 
                        {{$resultado->descripcion}}
                    </td> 
                    <td class="fila-tabla" style="width: 20%;" ALIGN=CENTER> 
                        {{$resultado->estatus_display}}
                    </td>
                    <td class="fila-tabla" style="width: 15%;">
                        {{$resultado->personaBeneficiario->nombre}}
                        {{$resultado->personaBeneficiario->apellido}} 
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</page>