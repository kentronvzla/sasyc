$(document).ready(function () {
    $(document).on('dblclick', '.marcar-solicitud', function () {
        if ($('#solicitudes-marcadas').length) {
            var elem = $(this).clone();
            elem.removeClass('marcar-solicitud');
            elem.addClass('remover-solicitud');
            $('#solicitudes-marcadas').append(elem);
            $(this).remove();
        }

    });    

    $(document).on('dblclick', '.remover-solicitud', function () {
        var elem = $(this).clone();
        elem.removeClass('remover-solicitud');
        elem.addClass('marcar-solicitud');
        $('#solicitudes-lista').append(elem);
        $(this).remove();
    });
});

function asignado() {
    window.location.reload();
}