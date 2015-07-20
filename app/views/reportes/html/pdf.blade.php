{{HTML::style('css/reportes/pdf.css')}}
<page backcolor="#FEFEFE" backtop="30mm" backbottom="10mm" backleft="10mm" backright="10mm" footer="date;heure;page">
    <page_header>   
        <table width="100%" border="0" cellpadding="10" cellspacing="0">
            <tr>
                <td ALIGN=CENTER style="width: 220px;height:auto;">
                    <img src="{{url('img/logoReporte.jpg')}}"  /> 
                </td>
                <td style="width: 120px;height:auto; "></td>
                <td ALIGN=right style="width: 220px;height:auto;">
                   <img src="{{url('img/logo_despacho.png')}}" /> 
                </td>
            </tr>
        </table>
    </page_header>
    @yield('reporte')
</page>