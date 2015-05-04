function cargarDiv(url, dest, callback) {
    $('#' + dest).empty();
    $.ajax({
        type: "GET",
        url: baseUrl + url,
        cache: false,
        dataType: 'html',
        success: function(data) //Si se ejecuta correctamente
        {
            $('#' + dest).html(data);
            if (callback != undefined) {
                callback();
            }
        }
    });
}
