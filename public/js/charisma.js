$(document).ajaxComplete(function () {
    $("[id=contenedorEspera]").each(function () {
        $(this).fadeOut(500);
    });
    docReady();
});

$(document).ajaxStart(function () {
    mostrarEspera("Por favor espere.");
});

$.ajaxSetup({
    statusCode: {
        500: function () {
            mostrarError("<span class='glyphicon glyphicon-remove'></span> Ocurrio un error al tratar de procesar su solicitud. <i>(Error interno del servidor)</i>");
        },
        401: function () {
            mostrarError("<span class='glyphicon glyphicon-remove'></span> Ocurrio un error al tratar de procesar su solicitud. <i>(Es necesaria autenticación)</i>");
        },
        403: function () {
            mostrarError("<span class='glyphicon glyphicon-remove'></span> Ocurrio un error al tratar de procesar su solicitud. <i>(El sistema denegó el acceso al recurso)</i>");
        },
        404: function () {
            mostrarError("<span class='glyphicon glyphicon-remove'></span> Ocurrio un error al tratar de procesar su solicitud. <i>(Página no encontrada)</i>");
        },
        410: function () {
            mostrarError("<span class='glyphicon glyphicon-remove'></span> Ocurrio un error al tratar de procesar su solicitud. <i>(Recurso no encontrado)</i>");
        }
    }
});

$(document).ready(function () {
    var msie = navigator.userAgent.match(/msie/i);
    $.browser = {};
    $.browser.msie = {};

    $('.navbar-toggle').click(function (e) {
        e.preventDefault();
        $('.nav-sm').html($('.navbar-collapse').html());
        $('.sidebar-nav').toggleClass('active');
        $(this).toggleClass('active');
    });

    var $sidebarNav = $('.sidebar-nav');

    // Hide responsive navbar on clicking outside
    $(document).mouseup(function (e) {
        if (!$sidebarNav.is(e.target) // if the target of the click isn't the container...
                && $sidebarNav.has(e.target).length === 0
                && !$('.navbar-toggle').is(e.target)
                && $('.navbar-toggle').has(e.target).length === 0
                && $sidebarNav.hasClass('active')
                )// ... nor a descendant of the container
        {
            e.stopPropagation();
            $('.navbar-toggle').click();
        }
    });

    //disbaling some functions for Internet Explorer
    if (msie) {
        $('#is-ajax').prop('checked', false);
        $('#for-is-ajax').hide();
        $('#toggle-fullscreen').hide();
        $('.login-box').find('.input-large').removeClass('span10');
    }


    //highlight current / active link
    $('ul.main-menu li a').each(function () {
        if ($($(this))[0].href == String(window.location))
            $(this).parent().addClass('active');
    });

    //establish history variables
    var
            History = window.History, // Note: We are using a capital H instead of a lower h
            State = History.getState(),
            $log = $('#log');

    //bind to State Change
    History.Adapter.bind(window, 'statechange', function () { // Note: We are using statechange instead of popstate
        var State = History.getState(); // Note: We are using History.getState() instead of event.state
        $.ajax({
            url: State.url,
            success: function (msg) {
                $('#content').html($(msg).find('#content').html());
                $('#loading').remove();
                $('#content').fadeIn();
                var newTitle = $(msg).filter('title').text();
                $('title').text(newTitle);
            }
        });
    });

    $('.accordion > a').click(function (e) {
        e.preventDefault();
        var $ul = $(this).siblings('ul');
        var $li = $(this).parent();
        if ($ul.is(':visible'))
            $li.removeClass('active');
        else
            $li.addClass('active');
        $ul.slideToggle();
    });

    $('.accordion li.active:first').parents('ul').slideDown();

    //other things to do on document ready, separated for ajax calls
    docReady();
});


function docReady() {
    $('.btn-reset').click(function () {
        $(this).closest('form').clearForm();
    });
    $(".decimal-format").autoNumeric('init', {
        aSep: ".",
        aDec: ","
    });
    $(".decimal-format").css('text-align', 'right');
    $('input, select, textarea').each(function () {
        if ($(this).attr("data-tienetooltip") == undefined && $(this).attr('type') != "radio") {
            $(this).attr("data-tienetooltip", 1);
            $(this).tooltip({'trigger': 'focus hover', 'title': $(this).attr("placeholder")});
        }
    });
    $('.jqueryDatePicker').datepicker({
        format: "dd/mm/yyyy",
        todayBtn: "linked",
        language: "es"
    }).on('changeDate', function (ev) {
        $(this).datepicker('hide');
    });
    //chosen - improves select
    $('[data-rel="chosen"],[rel="chosen"]').chosen();
    //select list
    $('select[data-child]').unbind('change');
    $('select[data-child]').change(function () {
        if ($(this).val() == "") {
            return;
        }
        var child = $(this).data('child');
        var url = 'administracion/tablas/' + $(this).data('url');
        var formParent = $(this).closest('form');
        $.ajax({
            type: "GET",
            url: baseUrl + url + "/" + $(this).val(),
            cache: false,
            dataType: 'json',
            success: function (data) //Si se ejecuta correctamente
            {
                var selectChild = $(formParent).find('#' + child);
                selectChild.empty();
                var ultimo, cantidad = 0;
                if (data != null) {
                    $.each(data, function (i, value) {
                        if (i != "") {
                            ultimo = i;
                        }
                        cantidad++;
                        selectChild.append("<option value='" + i + "'>" + value + "</option>");
                    });
                    if (cantidad == 2) {
                        selectChild.val(ultimo);
                        selectChild.change();
                    } else {
                        selectChild.val("");
                    }
                }
            }
        });
    });
    //popover
    $('[data-toggle="popover"]').popover();
    //star rating
    $('.raty').raty({
        score: 4 //default stars
    });
    
    $('table.jqueryTable').each(function () {
        if ($(this).attr('data-esdatatable') == undefined) {
            $(this).attr('data-esdatatable', true);
            $(this).DataTable({
                "aaSorting": [],
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });
        }
    });

    $('.form-eliminar').unbind('submit');
    $('.form-eliminar').submit(function (e) {
        e.preventDefault();
        var form = this;
        confirmarIntencion("¿Esta seguro que desea eliminar el elemento seleccionado?", function () {
            $(form).unbind('submit');
            $(form).submit();
        });
    });
    $('.btn-volver').unbind('click');
    $('.btn-volver').click(function () {
        var urlAtras = location.href;
        sect = urlAtras.split('?')[0].split('/');
        if (!isNaN(sect[sect.length - 1])) {
            delete sect[sect.length - 1];
            delete sect[sect.length - 2];
        } else {
            delete sect[sect.length - 1];
        }
        var url = sect.join('/');
        url = url.slice(0, -1);
        if (url.endsWith("/")) {
            url = url.slice(0, -1);
        }
        location.href = url;
    });
    $("form.saveajax").unbind('submit');
    $("form.saveajax").submit(function (e) {
        var data, contenido;
        if ($(this).attr('enctype') == "multipart/form-data") {
            data = new FormData(this);
            contenido = false;
        } else {
            data = $(this).serialize();
            contenido = 'application/x-www-form-urlencoded; charset=UTF-8';
        }
        $(this).find('input, textarea, select, checkbox, radio').parent().removeClass("has-error");
        $(this).find('.help-block').remove();
        $.ajax({
            url: $(this).attr('action'),
            data: data,
            cache: false,
            processData: false,
            contentType: contenido,
            formulario: this,
            dataType: 'json',
            method: $(this).attr("method") == undefined ? "POST" : $(this).attr("method"),
            success: function (data) {
                if (data.mensaje != "") {
                    mostrarMensaje(data.mensaje);
                }
                var callback = $(this.formulario).attr('data-callback');
                if (callback != undefined && callback != "") {
                    window[callback](data);
                }
                if (data.vista != undefined) {
                    $(this.formulario).parent().html(data.vista);
                }
            },
            error: function (data)
            {
                var formulario = this.formulario;
                if (data.status == 400) {
                    mostrarError(procesarErrores(data.responseJSON.errores));
                    $.each(data.responseJSON.errores, function (key, value) {
                        $('#' + key).parent().addClass('has-error has-feedback');
                        $.each(value, function (key2, value2) {
                            $(formulario).find('#' + key).parent().append("<span class='help-block'>" + value2 + "</span>");
                        });
                    });
                }
            }
        });
        e.preventDefault();
    });
    $('a.glyphicon-pencil').unbind('click');
    $('a.glyphicon-pencil').click(function () {
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var div = $(this).closest('.panel-body');
        $.ajax({
            url: baseUrl + url + "/" + id,
            success: function (data) {
                div.html(data);
            }
        });
    });
    $('a.glyphicon-trash').unbind('click');
    $('a.glyphicon-trash').click(function () {
        var btn = this;
        confirmarIntencion("¿Esta seguro que desea eliminar el elemento seleccionado?", function () {
            var id = $(btn).attr('data-id');
            var url = $(btn).attr('data-url');
            var div = $(btn).closest('.panel-body');
            $.ajax({
                url: baseUrl + url + "?id=" + id,
                method: 'delete',
                success: function (data) {
                    div.html(data.vista);
                    mostrarMensaje(data.mensaje);
                }
            });
        });
    });
}

function confirmarIntencion(mensaje, confirmado) {
    $('#modalConfirmacion').modal('show');
    $('#mensajeModalConfirmacion').html(mensaje);
    $('#okModalConfirmacion').unbind('click');
    $('#okModalConfirmacion').click(confirmado);
    $('#okModalConfirmacion').click(function () {
        $('#modalConfirmacion').modal('hide');
    });
}

function mostrarMensaje(mensaje) {
    $("[id=contenedorCorrecto]").each(function () {
        $(this).fadeIn(500);
        $(this).html("<span class='glyphicon glyphicon-ok'></span> " + mensaje);
    });
    setTimeout(function () {
        $("[id=contenedorCorrecto]").each(function () {
            $(this).fadeOut(500);
        });
    }, 4000);
}

function mostrarEspera(mensaje) {
    $("[id=contenedorEspera]").each(function () {
        $(this).fadeIn(500);
        $(this).html("<img src='" + baseUrl + "img/loader.gif'> " + mensaje);
    });
}
function mostrarError(mensaje) {
    $("[id=contenedorError]").each(function () {
        $(this).fadeIn(500);
        $(this).html(mensaje);
    });
    setTimeout(function () {
        $("[id=contenedorError]").each(function () {
            $(this).fadeOut(500);
        });
    }, 4000);
}

if (typeof String.prototype.endsWith !== 'function') {
    String.prototype.endsWith = function (suffix) {
        return this.indexOf(suffix, this.length - suffix.length) !== -1;
    };
}

function procesarErrores(errores) {
    var mensaje = "";
    try {
        $.each(errores, function (key, value) {
            $.each(value, function (key2, value2) {
                mensaje += "<span class='glyphicon glyphicon-remove'></span> " + value2 + "</br>";
            });
        });
    } catch (err) {
        return mensaje = "<span class='glyphicon glyphicon-remove'></span> " + errores + "</br>";
    }
    return mensaje;
}

function habilitaCampo(disparador, boton, idPregunta) {
    if (disparador == boton) {
        $('#respuesta' + idPregunta).removeAttr('disabled');
    } else {
        $('#respuesta' + idPregunta).attr('disabled', true);
    }
}

function mostrarOcultar(ocultar, div, parent) {
    if(parent==undefined){
        parent = document;
    }
    if (ocultar) {
        $(parent).find('#' + div).find('input,select').removeAttr('required');
        $(parent).find('#' + div).hide();
    } else {
        $(parent).find('#' + div).show();
        $(parent).find('#' + div).find('input,select').attr('required', 'required');
    }
}

$.fn.clearForm = function () {
    return this.each(function () {
        var type = this.type, tag = this.tagName.toLowerCase();
        if (tag == 'form')
            return $(':input', this).clearForm();
        if (type == 'text' || type == 'password' || tag == 'textarea')
            this.value = '';
        else if (type == 'checkbox' || type == 'radio')
            this.checked = false;
        else if (tag == 'select')
            $(this).val("");
        else if(type == 'hidden' && $(this).attr('name')!='solicitud_id')
            $(this).val("");
    });
};