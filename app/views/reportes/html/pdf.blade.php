{{HTML::style('css/reportes/pdf.css')}}
<page backcolor="#FEFEFE" backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm" footer="date;heure;page">
    <page_header>
        <img src="{{url('img/logo_despacho.png')}}" width="780" height="50" />
    </page_header>
    @yield('reporte')
</page>