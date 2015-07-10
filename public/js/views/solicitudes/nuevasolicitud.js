$(document).ajaxComplete(function () {
    $(".fa-arrow-down").unbind("click");
    $(".fa-arrow-down").click(usarPersona);
});

$(document).ready(function () {
    $('#div-solicitante').find('input,select').removeAttr('required');
    $('#nombre, #apellido').prop("disabled", true);
    $("#tipo_nacionalidad_id, #ci").change(buscarPersona);
    $('.salvar-persona').click(crearPersona);
    $('.buscar-cne').on('click', buscarCNE);
    $('.buscar-sate').on('click', buscarSATE);
    $('.siguiente').click(validarPersonas);
    $('#div-solicitante').hide();

    $('[id=ind_mismo_benef]').each(function () {
        $(this).on('change', mostrarOcultarSolicitante);
    });

    $('[id=ind_beneficiario_menor]').each(function () {
        $(this).change(mostrarOcultarMenor);
    });
});


function usarPersona(evt)
{
    $.getJSON(baseUrl + "personas/buscarid/" + $(evt.target).attr('data-id'), function (data) {
        $('#div-beneficiario').find('#tipo_nacionalidad_id').val(data.persona.tipo_nacionalidad_id);
        $('#div-beneficiario').find('#ci').val(data.persona.ci);
        $('#div-beneficiario').find('#ci').trigger('change');
        $('#div-beneficiario').find('#persona_beneficiario_id').val(data.persona.id);
        $('#div-beneficiario').find('#nombre').val(data.persona.nombre);
        $('#div-beneficiario').find('#apellido').val(data.persona.apellido);
    });
}

function validarPersonas(evt)
{
    if ($("#div-mismo-benef").find('input[name=ind_mismo_benef]:checked').val() == 0 &&
            $('#div-solicitante').find('#persona_solicitante_id').val() == "") {
        mostrarError("Debe guardar los datos del solicitante");
        return false;
    }
    if ($('#div-beneficiario').find('#persona_beneficiario_id').val() == "") {
        mostrarError("Debe guardar los datos del beneficiario");
        return false;
    }
}

function mostrarOcultarSolicitante(evt)
{
    var parent = $(evt.target).closest('.form-group').parent();
    if (parent.find('input[name=ind_mismo_benef]:checked').val() == 1) {
        $('#div-solicitante').find('input,select').removeAttr('required');
        $('#div-solicitante').hide();
    } else {
        $('#div-solicitante').find('input,select').attr('required', 'required');
        $('#div-solicitante').show();
    }
}

function mostrarOcultarMenor(evt)
{
    var parent = $(evt.target).closest('.form-group').parent();
    var seleccion = parent.find('input[name=ind_beneficiario_menor]:checked').val();
    if (seleccion == 1) {
        $('#div-beneficiario').find('#nombre, #apellido').prop("disabled", false);
        $('#div-menor').find('input,select').attr('required');
        $('#div-menor').hide();
        $('#div-mismo-benef').hide();
        $('[id=ind_mismo_benef]:checked').val("0");
        $('[id=ind_mismo_benef]:checked').trigger("change");
        $('#div-beneficiario').find('.salvar-persona').show();
    } else {
        $('#div-menor').find('input,select').removeAttr('required', 'required');
        $('#div-menor').show();
        $('#div-mismo-benef').show();
        $('#div-beneficiario').find('.salvar-persona').hide();
        $('#div-beneficiario').find('#nombre, #apellido').prop("disabled", true);
    }
}

function buscarPersona(evt)
{
    var parent = $(evt.target).closest('.row').parent();
    var variables = parent.find('input, select').serialize();
    if (parent.find('#tipo_nacionalidad_id').val() == "" || parent.find('#ci').val() == "") {
        return;
    }
    $.ajax({
        url: baseUrl + "personas/buscar",
        data: variables,
        dataType: 'json',
        method: "GET",
        success: function (data)
        {
            if (data.persona.id != undefined) {
                parent.find('#persona_solicitante_id, #persona_beneficiario_id').val(data.persona.id);
                parent.find('#nombre').first().val(data.persona.nombre);
                parent.find('#apellido').val(data.persona.apellido);
                parent.find('#nombre, #apellido').prop("disabled", true);
                parent.find('.salvar-persona').hide();
            } else {
                parent.find('#persona_solicitante_id, #persona_beneficiario_id').val("");
                parent.find('#nombre, #apellido').prop("disabled", false);
                parent.find('#nombre, #apellido').val("");
                parent.find('.salvar-persona').show();
            }
            if (parent.attr('id') == 'div-solicitante') {
                $('#lista-relacionados').html(data.vistaFamiliares);
            }
            if (parent.attr('id') == 'div-beneficiario') {
                $('#lista-solicitudesanteriores').html(data.vistaSolicitudes);
            }
        }
    });
}

function buscarCNE(evt)
{
    var parent = $(evt.target).closest('.row').parent();
    if (parent.find('#ci').val() == "") {
        return;
    }
    //var mDivDestino = $('#cne');
    var pUrl = "http://www.cne.gob.ve/web/registro_electoral/ce.php?nacionalidad=V&cedula=" + parent.find('#ci').val();
    var icne = $('#icne');
    icne.attr('src', pUrl);
    $('#div-cne').show();
    icne.contents().find('head').append('<meta charset="utf-8">');
}

function buscarSATE(evt)
{
    //var parent = $(evt.target).closest('.row').parent();
    //if (parent.find('#ci').val() == "") {
    //    return;
    //}
    //var mDivDestino = $('#cne');
    var pUrl = "http://172.27.8.23/institucional/sistemas/sas/paginas/classBienvenida.php/classRegistro.php";
    var isate = $('#isate');
    isate.attr('src', pUrl);
    $('#div-sate').show();
    isate.contents().find('head').append('<meta charset="utf-8">');
}

function crearPersona(evt)
{
    var parent = $(evt.target).closest('.row').parent();
    var variables = parent.find('input, select').serialize();
    parent.find('input, textarea, select, checkbox, radio').parent().removeClass("has-error");
    parent.find('.help-block').remove();

    $.ajax({
        url: baseUrl + "personas/crear",
        data: variables,
        dataType: 'json',
        method: "POST",
        formulario: parent,
        success: function (data)
        {
            mostrarMensaje(data.mensaje);
            parent.find('#persona_solicitante_id, #persona_beneficiario_id').val(data.persona.id);
            if (parent.attr('id') == 'div-solicitante') {
                $.get(baseUrl + "personas/familiaressolicitante/" + data.persona.id, function (data) {
                    $('#lista-relacionados').html(data);
                });
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
}


