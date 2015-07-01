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
            <tr><td width=170><strong>Documento Numero:</strong></td>
                <td width=500>{{$documentossasyces->documento_id}}</td>
            </tr>
            <tr><td><strong>Tipo de Documento:</strong></td>
                <td>{{$documentossasyces->tipo_doc}}</td>
            </tr>
            <tr><td><strong>Evento:</strong></td>
                <td>{{$documentossasyces->tipo_evento}}</td>
            </tr>
            <tr><td><strong>Fecha:</strong></td>
                <td>{{$documentossasyces->fecha}}</td>
            </tr>
         </table>
    </div>
   <br><br>
    <!------------------------------------------------------------------------->
    <br>
    <!-------------------------tabla de memos---------------------------->
        @include('documentos.tabladoc')
    <!------------------------------------------------------------------->
</page>

