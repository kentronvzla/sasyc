

$(document).ready(function () {
     agregarEventos();
    var current = location.href;
    $('a[href="'+current+'"]').children().addClass('active');
    
});

function agregarEventos() {
    $('.ckeditor').each(function () {
        $(this).ckeditor();
    });
}




