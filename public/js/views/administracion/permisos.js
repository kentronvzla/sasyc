/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var recargarDiv = false;


function concederPermiso(idgrupo, permiso) {
    var url = 'administracion/seguridad/grupos/concederpermiso/'+idgrupo+'/'+permiso;
    $.ajax({
        type: "POST",
        url: baseUrl + url,
        cache: false,
        dataType: 'json',
        success: function(data) //Si se ejecuta correctamente
        {
            mostrarMensaje(data.mensaje);
          
            cargarDiv('administracion/seguridad/grupos/modificar/' + idgrupo, 'divModal');
        },
        error: function(data)
        {
            if (data.status == 400) {
                mostrarError(procesarErrores(data.responseJSON.errores));
            }
        }
    });
}

function denegarPermiso(idgrupo, permiso) {
    var url = 'administracion/seguridad/grupos/denegarpermiso/'+idgrupo+'/'+permiso;
    $.ajax({
        type: "POST",
        url: baseUrl + url,
        cache: false,
        dataType: 'json',
        success: function(data) //Si se ejecuta correctamente
        {
            mostrarMensaje(data.mensaje);
           
            cargarDiv('administracion/seguridad/grupos/modificar/' + idgrupo, 'divModal');
        },
        error: function(data)
        {
            if (data.status == 400) {
                mostrarError(procesarErrores(data.responseJSON.errores));
            }
        }
    });
}

