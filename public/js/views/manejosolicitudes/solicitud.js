$(document).ready(function () {
    $('input[id=fecha_nacimiento]').each(function () {
        $(this).change(calcularEdad);
    });

    $('#form-familiares').find('#nombre, #apellido').prop("disabled", true);
    $('#form-familiares').find("#tipo_nacionalidad_id, #ci").change(buscarPersona);

    $('a.glyphicon-transfer').unbind('click');
    $('a.glyphicon-transfer').click(copiarDireccion);

    $('#div-inmediata').find('input,select').removeAttr('required');
    $('#div-inmediata').hide();
    $('[id=ind_inmediata]').each(function () {
        $(this).change(atencionInmediata);
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

function solicitudCreada(data)
{
    var sol = data.solicitud;
    $('#form-solicitud').find('#id').val(sol.id);
    $('#span-solicitud-id').text(sol.id);
    $('#form-presupuesto').find('#solicitud_id').val(sol.id);
    $("#PanelSeis").children().load(baseUrl + "recaudossolicitud/modificar?solicitud_id=" + sol.id);
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

function atencionInmediata(evt)
{
    var parent = $(evt.target).closest('.form-group').parent();
    if (parent.find('input[name=ind_inmediata]:checked').val() == 0) {
        $('#div-inmediata').find('input,select').removeAttr('required');
        $('#div-inmediata').hide();
    } else {
        $('#div-inmediata').find('input,select').attr('required', 'required');
        $('#div-inmediata').show();
    }
}
