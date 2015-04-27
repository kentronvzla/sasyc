/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var recargarDiv = false;
$(document).bind("ajaxComplete", function () {
    agregarEventos();
    
});



$(document).ready(function () {
    alert ('ready');
$('#conceder').click(concederPermiso);
});

function concederPermiso(idGrupo, permiso) {
     alert ('conceder');
    getObject('administracion/seguridad/grupos/Concederpermiso?ID=' + idGrupo + '&PERMISO=' + permiso, function (data) {
        mostrarMensaje(data.mensaje);
        if (recargarDiv == false) {
            cargarDiv('administracion/seguridad/grupos/modificar/' + idGrupo, 'divModal');
        }
    }, "POST");
}


