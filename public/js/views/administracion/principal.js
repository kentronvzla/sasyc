var recargarDiv = false;
$(document).bind("ajaxComplete", function () {
    agregarEventos();
    
});


$(document).ready(function () {
     agregarEventos();
    var current = location.href;
    $('a[href="'+current+'"]').children().addClass('active');
    
});

function agregarEventos() {
    $('.ckeditor').each(function () {
        $(this).ckeditor();
    });
}


function concederPermisoPorGrupo(idAcordion, idGrupo) {
    recargarDiv = true;
    $('#' + idAcordion).find('button').each(function (idGrupo, data) {
        $(this).click();
    });
    recargarDiv = false;
    cargarDiv('administracion/seguridad/grupos/modificar/' + idGrupo, 'divModal');
}



function denegarPermisoPorGrupo(idAcordion, idGrupo) {
    recargarDiv = true;
    $('#' + idAcordion).find('button').each(function (i, data) {
        $(this).click();
    });
    recargarDiv = false;
    cargarDiv('administracion/grupo/modificar/' + idGrupo, 'divModal');
}

