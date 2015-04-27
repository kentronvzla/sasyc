function guardarAyudasLocal() {
    $.ajax({
        type: "GET",
        url: baseUrl + "administracion/ayudas/todas",
        cache: false,
        dataType: 'json',
        success: function(data) //Si se ejecuta correctamente
        {
            $.each(data, function(index, elem) {
                localStorage.setItem(elem.FORMULARIO + '.' + elem.CAMPO, elem.AYUDA);
                localStorage.setItem(elem.FORMULARIO + '.' + elem.CAMPO + '.id', elem.ID);
            });
        }
    });
}
function borrarRegistro() {
    var urlEliminar = $("#modalConfirmacion").attr('data-urleliminar');
    var div = $("#modalConfirmacion").attr('data-div');
    $.ajax({
        type: "DELETE",
        url: baseUrl + urlEliminar,
        cache: false,
        dataType: 'json',
        success: function(data) //Si se ejecuta correctamente
        {
            mostrarMensaje(data.mensaje);
            if (div != undefined) {
                cargarDiv($("#" + div).attr("data-url"), div);
                if (typeof (idCandidatoGlobal) != "undefined" && idCandidatoGlobal != "") {
                    cargarDiv('candidato/barracarga/' + idCandidatoGlobal, 'contenedorBarraCarga');
                }
                $('#modalConfirmacion').modal('hide');
            } else {
                window.location.reload();
            }
        },
        error: function(data)
        {
            if (data.status == 400) {
                mostrarError(procesarErrores(data.responseJSON.errores));
            }
        }
    });
}
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
function buscarAyuda(formulario, campo) {
    var ayuda = localStorage.getItem(formulario + '.' + campo);
    if (ayuda == undefined) {
        $.ajax({
            type: "GET",
            url: baseUrl + 'administracion/ayudas/buscar/' + formulario + '/' + campo,
            cache: false,
            dataType: 'json',
            success: function(data) //Si se ejecuta correctamente
            {
                $('#contenedorAyuda').attr("data-id", data.ID);
                $('#contenedorAyuda').html(data.AYUDA);
                localStorage.setItem(formulario + '.' + campo, data.AYUDA);
                localStorage.setItem(formulario + '.' + campo + '.id', data.ID);
            }
        });
    } else {
        $('#contenedorAyuda').attr("data-id", localStorage.getItem(formulario + '.' + campo + '.id'));
        $('#contenedorAyuda').html(ayuda);
    }
}
function guardarFormulario(form, reload, callback, modalCerrar) {
    var data, contenido;
    var formJquery;
    try {
        form.val();
        formJquery = form;
    } catch (err) {
        formJquery = $(form);
    }
    if ($(form).attr('data-tienearchivo') != undefined) {
        data = new FormData(form);
        contenido = false;
    } else {
        data = formJquery.serialize();
        contenido = 'application/x-www-form-urlencoded; charset=UTF-8';
    }
    $(form).find('input, textarea, select, checkbox, radio').parent().removeClass("has-error");
    $(form).find('.mensajeErrorFormulario').remove();
    $.ajax({
        type: "POST",
        url: $(form).attr('action'),
        data: data,
        cache: false,
        dataType: 'json',
        processData: false,
        contentType: contenido,
        success: function(data) //Si se ejecuta correctamente
        {
            if (reload == undefined) {
                var candidato = data.candidato;
                if (candidato != undefined) {
                    $("input[name='VERSION']").each(function() {
                        $(this).val(candidato.VERSION);
                    });
                }
                mostrarMensaje(data.mensaje);
                if (typeof (idCandidatoGlobal) != "undefined" && idCandidatoGlobal != "") {
                    cargarDiv('candidato/barracarga/' + idCandidatoGlobal, 'contenedorBarraCarga');
                }
                if ($(form).attr("data-divact") != undefined) {
                    var divs = $(form).attr("data-divact").split(',');
                    $.each(divs, function(key, value) {
                        cargarDiv($("#" + value).attr("data-url"), value);
                    });

                }
            } else {
                mostrarMensaje(data.mensaje);
                window.location.reload();
            }
            if (callback != undefined) {
                if (typeof callback == "string") {
                    eval(callback + "()");
                } else {
                    callback(data);
                }
            }
            if (modalCerrar != undefined) {
                $('#' + modalCerrar).modal('hide');
            }
        },
        error: function(data)
        {
            if (data.status == 400) {
                mostrarError(procesarErrores(data.responseJSON.errores));
                $.each(data.responseJSON.errores, function(key, value) {
                    $('[name="' + key + '"]').parent().addClass('has-error');
                    $.each(value, function(key2, value2) {
                        $(form).find('[name="' + key + '"]').parent().append("<span class='help-block mensajeErrorFormulario'>" + value2 + "</span>");
                    });
                });
            }
        }
    });
    return false;
}
function getCombo(select, destino, url)
{
    $.ajax({
        type: "GET",
        url: baseUrl + url + "/" + $(select).val(),
        cache: false,
        dataType: 'json',
        success: function(data) //Si se ejecuta correctamente
        {
            $('#' + destino).empty();
            var ultimo, cantidad = 0;
            if (data != null) {
                $.each(data, function(i, value) {
                    if(i!=""){
                        ultimo = i;
                    }
                    cantidad++;
                    $('#' + destino).append("<option value='" + i + "'>" + value + "</option>");
                });
                if (cantidad == 2) {
                    $('#' + destino).val(ultimo);
                    $('#' + destino).change();
                } else {
                    $('#' + destino).val("");
                }
            }
        }
    });
}
function getObject(url, callback, method) {
    if (method == undefined) {
        method = "GET";
    }
    $.ajax({
        type: method,
        url: baseUrl + url,
        cache: false,
        dataType: 'json',
        success: function(data) //Si se ejecuta correctamente
        {
            callback(data);
        },
        error: function(data)
        {
            if (data.status == 400) {
                mostrarError(procesarErrores(data.responseJSON.errores));
            }
        }
    });
}

function enviarRequest(url) {
    $.ajax({
        type: "GET",
        url: baseUrl + url,
        cache: false,
        dataType: 'json',
        success: function(data) //Si se ejecuta correctamente
        {
            mostrarMensaje(data.mensaje);
        },
        error: function(data)
        {
            if (data.status == 400) {
                mostrarError(procesarErrores(data.responseJSON.errores));
            }
        }
    });
}

function guardarAjax(form) {
    guardarFormulario(form, true);
    return false;
}

