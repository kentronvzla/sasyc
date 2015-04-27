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

function concederPermiso(idGrupo, permiso) {
    getObject('administracion/seguridad/grupos/concederpermiso?ID=' + idGrupo + '&PERMISO=' + permiso, function (data) {
        mostrarMensaje(data.mensaje);
        if (recargarDiv == false) {
            cargarDiv('administracion/seguridad/grupos/modificar/' + idGrupo, 'divModal');
        }
    }, "POST");
}

function concederPermisoPorGrupo(idAcordion, idGrupo) {
    recargarDiv = true;
    $('#' + idAcordion).find('button').each(function (idGrupo, data) {
        $(this).click();
    });
    recargarDiv = false;
    cargarDiv('administracion/seguridad/grupos/modificar/' + idGrupo, 'divModal');
}

function denegarPermiso(idGrupo, permiso) {
    getObject('administracion/grupo/denegarpermiso?ID=' + idGrupo + '&PERMISO=' + permiso, function (data) {
        mostrarMensaje(data.mensaje);
        if (recargarDiv == false) {
            cargarDiv('administracion/grupo/modificar/' + idGrupo, 'divModal');
        }

    }, "POST");
}

function denegarPermisoPorGrupo(idAcordion, idGrupo) {
    recargarDiv = true;
    $('#' + idAcordion).find('button').each(function (i, data) {
        $(this).click();
    });
    recargarDiv = false;
    cargarDiv('administracion/grupo/modificar/' + idGrupo, 'divModal');
}

