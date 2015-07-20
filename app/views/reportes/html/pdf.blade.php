{{HTML::style('css/reportes/pdf.css')}}
<page backcolor="#FEFEFE" backtop="30mm" backbottom="10mm" backleft="10mm" backright="10mm" footer="date;heure;page">
    <page_header>   
        <table style="padding:10px 0; width:100%;">
            <tr>
                <td ALIGN=LETF style="text-align:left; width: 50%; height:auto;">
                    <img src="{{url('img/logoReporte.jpg')}}"  /> 
                </td>
                <td ALIGN=RIGHT style="text-align:left; width: 50%; height:auto;">
                    <img src="{{url('img/logo_despacho1.jpg')}}" /> 
                </td>
            </tr>
        </table>
    </page_header>
    @yield('reporte')
</page>