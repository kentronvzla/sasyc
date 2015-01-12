$(document).ready(function () {
    
});

function solicitudCreada(data)
{
    var sol = data.solicitud;
    $('#form-solicitud').find('#id').val(sol.id);
    $('#span-solicitud-id').text(sol.id);
    history.pushState(null, null, baseUrl + 'solicitudes/modificar/' + sol.id);
}
