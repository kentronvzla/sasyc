$(document).ready(function () {
    $('input[id=fecha_nacimiento]').each(function () {
        $(this).change(calcularEdad);
    });

    //$('#form-familiares').find('#nombre, #apellido').prop("disabled", true);
    $('#form-familiares').find("#tipo_nacionalidad_id, #ci").on('change', buscarPersona);

    $('#form-informe').find('#total_ingresos').prop("disabled", true);
    $('#form-bitacora').find('input,select').removeAttr('required');

    $('a.glyphicon-transfer').unbind('click');
    $('a.glyphicon-transfer').click(copiarDireccion);

    $('[id=ind_inmediata]').each(function () {
        $(this).on('change', atencionInmediata);
    });

    $('[id=ind_asegurado]').each(function () {
        $(this).on('change', beneficiarioAsegurado);
    });

    $('[id=ind_trabaja]').each(function () {
        $(this).on('change', personaTrabaja);
    });
    
    $('[id=ind_alarma]').each(function () {
        $(this).on('change', bitacoraAlarma);
    });
    
});

function copiarDireccion() {
    var btn = this;
    confirmarIntencion("¿Esta seguro que desea copiar la dirección?", function () {
        var id = $(btn).attr('data-id');
        var url = $(btn).attr('data-url');
        var div = $(btn).closest('#direccion_solicitante');
        $.ajax({
            url: baseUrl + url + "/" + id,
            method: 'get',
            success: function (data) {
                div.html(data.vista);
                $('a.glyphicon-transfer').unbind('click');
                $('a.glyphicon-transfer').click(copiarDireccion);
            }
        });
    });
}
;
};

function solicitudCreada(data)
{
    var sol = data.solicitud;
    $('#form-solicitud').find('#id').val(sol.id);
    $('#span-solicitud-id').text(sol.id);
    $('#form-presupuesto').find('#solicitud_id').val(sol.id);
    $('#form-informe').find('#id').val(sol.id);
    $("#PanelSeis").children().load(baseUrl + "recaudossolicitud/modificar/" + sol.id);
    
    history.pushState(null, null, baseUrl + 'solicitudes/modificar/' + sol.id);
}

function calcularEdad(evt)
{
    var form = $(evt.target).closest("form");
    $.getJSON(baseUrl + "helpers/edad?fecha_nacimiento=" + $(evt.target).val(), function (data) {
        $(form).find("#edad").val(data.edad);
    });
}

function buscarPersona(evt)
{
    var parent = $('#form-familiares');
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
                $.each(data.persona, function (index, val) {
                    parent.find('#' + index).val(val);
                });

                parent.find('#nombre, #apellido').prop("disabled", true);
            } else {
                parent.find('#nombre, #apellido').prop("disabled", false);
                parent.not('#nombre, #apellido').val("");
            }
        }
    });
}
function mostrarOcultar(mostrar, div) {
    if (mostrar) {
        $('#'+div).find('input,select').removeAttr('required');
        $('#'+div).hide();
    } else {
        $('#'+div).show();
        $('#'+div).find('input,select').attr('required', 'required');
    }
}

function atencionInmediata(evt)
{
    var parent = $(evt.target).closest('.form-group').parent();
    mostrarOcultar(parent.find('input[name=ind_inmediata]:checked').val() == 0, 'div-inmediata');
}

function beneficiarioAsegurado(evt)
{
    var parent = $(evt.target).closest('.form-group').parent();
    mostrarOcultar(parent.find('input[name=ind_asegurado]:checked').val() == 0,'div-asegurado');
}

function personaTrabaja(evt)
{
    var parent = $(evt.target).closest('.form-group').parent();
    mostrarOcultar(parent.find('input[name=ind_trabaja]:checked').val() == 0, 'div-trabaja');
}

function bitacoraAlarma(evt)
{
    var parent = $(evt.target).closest('.form-group').parent();
    mostrarOcultar(parent.find('input[name=ind_alarma]:checked').val() == 0, 'div-fecha-bitacora');
}
