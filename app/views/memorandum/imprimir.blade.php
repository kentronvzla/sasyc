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
                    <strong>Listado de casos por fecha y codigo se anexan () expedientes</strong>
                </td>
            </tr>
        </table>
    </div>
    <br>
        <table width="100%" border="1" cellpadding="10" cellspacing="0">
            <tr style=' background: gray;'>
                <td width=45 height=25 ALIGN=CENTER style='font-size: 13px;' valign="middle">
                    <strong>N Caso</strong>
                </td>
                <td width=110 ALIGN=CENTER style='font-size: 13px;' valign="middle">
                    <strong>Nombre</strong>
                </td>
                <td width=107 ALIGN=CENTER style='font-size: 13px;' valign="middle">
                    <strong>Apellido</strong>
                </td>
                <td width=120 ALIGN=CENTER style='font-size: 13px;' valign="middle">
                    <strong>Cedula</strong>
                </td>
                <td width=70 ALIGN=CENTER style='font-size: 13px;' valign="middle">
                    <strong>N Solicitud</strong>
                </td>
                <td width=90 ALIGN=CENTER style='font-size: 13px;' valign="middle">
                    <strong>Tipo Solicitud</strong>
                </td>
                <td width=100 ALIGN=CENTER style='font-size: 13px;' valign="middle">
                    <strong>Monto</strong>
                </td>
            </tr>
            @foreach($memo->solicitudes as $resultado)
                <tr>
                    <td width=45 height=15 valign="middle" ALIGN=CENTER >
                        
                    </td>
                    <td width=110 valign="middle">
                        {{$resultado->personaBeneficiario->nombre}}
                    </td>
                    <td width=107 valign="middle">
                        {{$resultado->personaBeneficiario->apellido}}
                    </td>
                    <td width=120 height=15 valign="middle">
                        {{$resultado->personaBeneficiario->ci}}
                    </td>
                    <td width=70 ALIGN=CENTER valign="middle">
                        {{$resultado->id}}
                    </td>
                    <td width=90 ALIGN=CENTER valign="middle">
                        {{$resultado->area->tipoAyuda->nombre}}
                    </td>
                    <td width=100 valign="middle" >

                    </td>
                </tr>
            @endforeach
        </table>
</page>