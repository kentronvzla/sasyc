$(document).ready(function () {
    $('#nombre, #apellido').prop("disabled", true);
    $("#tipo_nacionalidad_id, #ci").change(buscarPersona);
    $('.salvar-persona').click(crearPersona);
    $('#ind_mismo_benef').change(mostrarOcultarSolicitante);
    function mostrarOcultarSolicitante(evt)
    {
        alert($(evt.target).val());
    }
    
    function buscarPersona(evt)
    {
        var parent = $(evt.target).closest('.row').parent();
        var variables = parent.find('input, select').serialize();
        if(parent.find('#tipo_nacionalidad_id').val()=="" || parent.find('#ci').val()==""){
            return;
        }
        $.ajax({
            url: baseUrl + "personas/buscar",
            data: variables,
            dataType: 'json',
            method: "GET",
            success: function (data)
            {
                if (data.persona.id != undefined){
                    parent.find('#persona_solicitante_id, #persona_beneficiario_id').val(data.persona.id);
                    parent.find('#nombre').first().val(data.persona.nombre);
                    parent.find('#apellido').val(data.persona.apellido);
                    parent.find('#nombre, #apellido').prop("disabled", true);
                    parent.find('.salvar-persona').hide();
                } else {
                    parent.find('#nombre, #apellido').prop("disabled", false);
                    parent.find('#nombre, #apellido').val("");
                    parent.find('.salvar-persona').show();
                }
            }
        });
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
});


