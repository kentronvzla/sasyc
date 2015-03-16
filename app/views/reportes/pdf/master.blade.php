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
    .texto-derecha{
        text-align: right;
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
    <div>
        <table border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td>
                    {{HTML::image('img/logoReporte.jpg');}}
                </td>
                <td style="width: 450px;" ></td>
                <td style="width: 300px;" ></td>
            </tr>
        </table>
    </div>
    @yield('reporte')
</page>