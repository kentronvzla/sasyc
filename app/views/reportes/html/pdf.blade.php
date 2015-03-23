{{HTML::style('css/reportes/pdf.css')}}
<page backcolor="#FEFEFE" backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm" footer="date;heure;page">
    <page_header>   
        <table width="100%" border="0" cellpadding="10" cellspacing="0">
            <tr>
                <td ALIGN=CENTER style="width: 1000px;height:auto; font-size: 13px;">
                   <img src="{{url('img/logo_despacho.png')}}" width="780" height="50" /> 
                </td>
            </tr>
        </table>
    </page_header>
    @yield('reporte')
</page>