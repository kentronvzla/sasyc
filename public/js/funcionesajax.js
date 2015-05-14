function cargarDiv(url, dest, callback) {
    $('#' + dest).empty();
    $.ajax({
        type: "GET",
        url: baseUrl + url,
        cache: false,
        dataType: 'html',
        success: function (data) //Si se ejecuta correctamente
        {
            $('#' + dest).html(data);
            if (callback != undefined) {
                callback();
            }
        },
        error: function (xhr, status) {
            console.log('Disculpe, existió un problema');
        },
        // código a ejecutar sin importar si la petición falló o no
        complete: function (xhr, status) {
            console.log('Petición realizada');
        }
    });
}
