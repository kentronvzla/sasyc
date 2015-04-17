$(document).ready(function () {
    $('#agregar-tabla').click(function(){
        var fila = $('#plantilla-fila').clone();
        fila.find('select').selectedIndex = 0;
        $('#contenedor-tablas').append(fila)
    });
    
    $('.grafico').on('click', graficoAno);
});

function graficoAno(evt){
    $.ajax({

        url: baseUrl + "graficos/dataano",
        method: 'get',
        success: function (datos) {
            new Morris.Bar({
                // ID of the element in which to draw the chart.
                element: 'chartano',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: datos,
                // The name of the data record attribute that contains x-values.
                xkey: 'ano',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['casos', 'montos'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Casos', 'Montos']
            });
        }
    });
}