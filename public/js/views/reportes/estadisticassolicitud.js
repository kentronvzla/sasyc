$(document).ready(function () {
    $('#agregar-tabla').click(function(){
        var fila = $('#plantilla-fila').clone();
        fila.find('select').selectedIndex = 0;
        $('#contenedor-tablas').append(fila);
    });
});