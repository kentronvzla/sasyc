$(document).ajaxComplete(function (data) {
    $('[id=ind_alarma]').unbind('change');
    $('[id=ind_alarma]').each(function () {
        $(this).on('change', bitacoraAlarma);
    });

    $('#form-bitacora').find('input,select').removeAttr('required');
    $('#form-familiares').find("#tipo_nacionalidad_id, #ci").unbind('change');
    $('#form-familiares').find("#tipo_nacionalidad_id, #ci").on('change', buscarPersona);
    $('#gallery').photobox('a');
    beneficiarioKerux();
});

$(document).ready(function () {
    beneficiarioKerux();
    $('input[id=fecha_nacimiento]').each(function () {
        $(this).change(calcularEdad);
    });

    $('#form-familiares').find("#tipo_nacionalidad_id, #ci").on('change', buscarPersona);

    $('#form-informe').find('#total_ingresos').prop("disabled", true);

    $('a.glyphicon-transfer').click(copiarDireccion);
    $('#form-bitacora').find('input,select').removeAttr('required');
    $('[id=ind_inmediata]').each(function () {
        $(this).on('change', atencionInmediata);
        $(this).trigger('change');
    });

    $('[id=ind_asegurado]').each(function () {
        $(this).on('change', beneficiarioAsegurado);
        $(this).trigger('change');
    });

    $('[id=ind_trabaja]').each(function () {
        $(this).on('change', personaTrabaja);
        $(this).trigger('change');
    });

    $('[id=ind_alarma]').each(function () {
        $(this).on('change', bitacoraAlarma);
    });
    $('#gallery').photobox('a');

    $('body').on('change', '#proceso_id', function(){
        var formulario = $(this).closest('form');
        if($(this).val()==""){
            return;
        }
        $.get(baseUrl+'administracion/tablas/procesos/proceso/'+$(this).val(), function(data){
            //Se ocultan todos para que sea mas facil trabajarlos
            $(formulario).find('#beneficiario-id-div').hide();
            $(formulario).find('#btn-agregar-beneficiario').hide();
            $(formulario).find('#monto').hide().removeAttr('required');
            $(formulario).find('#cantidad').hide().removeAttr('required');

            if(data.ind_beneficiario){
                $(formulario).find('#beneficiario-id-div').show();
                $(formulario).find('#btn-agregar-beneficiario').show();
            }
            if(data.ind_monto){
                $(formulario).find('#monto').show();
                $(formulario).find('#monto').attr('required',true);
            }
            if(data.ind_cantidad){
                $(formulario).find('#cantidad').show();
                $(formulario).find('#cantidad').attr('required',true);
            }
        });
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
                parent.find('#persona_solicitante_id, #persona_beneficiario_id, #id').val(data.persona.id);
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
    mostrarOcultar(parent.find('input[name=ind_inmediata]:checked').val() == 0, 'div-inmediata');
}

function beneficiarioAsegurado(evt)
{
    var parent = $(evt.target).closest('.form-group').parent();
    mostrarOcultar(parent.find('input[name=ind_asegurado]:checked').val() == 0, 'div-asegurado');
}

function personaTrabaja(evt)
{
    var parent = $(evt.target).closest('form').parent();
    mostrarOcultar(parent.find('input[name=ind_trabaja]:checked').val() == 0, 'div-trabaja', parent);
}

function bitacoraAlarma(evt)
{
    var parent = $(evt.target).closest('.form-group').parent();
    mostrarOcultar(parent.find('input[name=ind_alarma]:checked').val() == 0, 'div-fecha-bitacora');
}

function grupoFamiliar(data) {
    var solicitud_id = $('#form-solicitud').find('#id').val();
    $.get(baseUrl + 'solicitudes/modificar/' + solicitud_id, function (data) {
        $('#total_ingresos').autoNumeric('set', data.solicitud.total_ingresos);
    });
}

function beneficiarioKerux() {
    $('#agregar-beneficiario').find('input, select').removeAttr('required');
    $('#btn-agregar-beneficiario').click(function () {
        var parent = $(this).closest('form');
        $(parent).find('#beneficiario-id-div').hide();
        $(this).hide();
        $('#agregar-beneficiario').show();
        $('#agregar-beneficiario').find('input, select').attr('required', 'required');
        $('#ind_creando_benef').val(1);
    });
    $('#btn-seleccionar-beneficiario').click(function () {
        var parent = $(this).closest('form');
        $(parent).find('#beneficiario-id-div').show();
        $('#agregar-beneficiario').find('input, select').removeAttr('required');
        $('#btn-agregar-beneficiario').show();
        $('#agregar-beneficiario').hide();
        $('#ind_creando_benef').val(0);
    });
}