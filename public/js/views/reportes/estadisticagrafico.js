$(document).ready(function () {
   $('.graficar_datos').on('click', grafico);
});

function grafico(evt){
    var parent = $(evt.target).closest('.row').parent();
    var variables = parent.find('input, select').serialize();
    $("#chartgrupo").empty();
    $.ajax({    
        url: baseUrl + "reportes/datos",
        data: variables,
        method: 'post',
        success: function (datos) {        
            new Morris.Bar({
                // ID of the element in which to draw the chart.
                element: 'chartgrupo',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: datos,
                // The name of the data record attribute that contains x-values.
                xkey: 'grupo',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['cantidad', 'monto'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Casos', 'Montos']
            });
        }
    });
}