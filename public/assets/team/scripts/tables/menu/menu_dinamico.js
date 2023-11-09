$(document).ready(function () {
    $('#nestable').nestable().on('change', function () {
        const data = {
            menu: window.JSON.stringify($('#nestable').nestable('serialize')),
            _token: $('input[name=_token]').val()
        };        
        $.ajax({
            url: 'menu-dinamico/guardarorden',
            type: 'POST',
            dataType: 'JSON',
            data: data,
            success: function (respuesta) {
                Biblioteca.notificaciones(respuesta.respuesta, 'Cambio efectuado', 'success');              
                location.reload();
            }
        });
    });

   

    $('#nestable').nestable('expandAll');
});
