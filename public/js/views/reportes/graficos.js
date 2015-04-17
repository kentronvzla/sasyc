$(document).ready(function () {
    grafico();
});

function grafico(){
    $.ajax({

        url: baseUrl + "reportes/datos",
        method: 'post',
        success: function (datos) {
            //alert(datos);
            new Morris.Bar({
                // ID of the element in which to draw the chart.
                element: 'chartgrupo',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: datos,
                // The name of the data record attribute that contains x-values.
                xkey: 'especial_mes',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['cantidad', 'monto'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Casos', 'Montos']
            });
        }
    });
}