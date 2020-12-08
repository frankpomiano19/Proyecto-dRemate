$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') //Obtiene el token 										csrf
    }
});

$('#enviar-datos-perso').click(function() {
    var datosForm = $('#usuario-perso-form-id').serialize();
    $.ajax({
        url: "/home/perfil/edit-per", //URL DE LA RUTA
        type: 'POST',
        data: datosForm,
        success: function(response) {
            $('#usuario-perso-id').html(response);
            $('#alerta-aparece-2').removeClass('esconder-alerta');
            $("#usuario-perso-id").removeClass('div-disabled');
            $('#enviar-datos-perso').removeClass('div-disabled');
        },
        beforeSend: function(thisXHR) {
            $("#usuario-perso-id").addClass('div-disabled');
            $('#enviar-datos-perso').addClass('div-disabled')
        },

        statusCode: {
            404: function() {
                alert("pagina no encontrada mascota");
            }
        },
        error: function(jqXHR, status, error) {
            $('#alerta-aparece-1').removeClass('esconder-alerta');
            alert("Error al cargar");
        }
    });
});



$('#enviar-datos-publi').click(function() {
    var datosForm = $('#form-publi-id').serialize();
    $.ajax({
        url: "/home/perfil/edit-publi", //URL DE LA RUTA
        type: 'POST',
        data: datosForm,
        success: function(response) {
            $('#usuario-publi-id').html(response);
            $('#alerta-aparece-4').removeClass('esconder-alerta');
            $("#usuario-publi-id").removeClass('div-disabled');
            $('#enviar-datos-publi').removeClass('div-disabled');
        },
        beforeSend: function(thisXHR) {
            $("#usuario-publi-id").addClass('div-disabled');
            $('#enviar-datos-publi').addClass('div-disabled')
        },

        statusCode: {
            404: function() {
                alert("pagina no encontrada mascota");
            }
        },
        error: function(jqXHR, status, error) {
            alert("Error al cargar");
            $('#alerta-aparece-3').removeClass('esconder-alerta');
        }
    });
});






$('#enviar-pago-now').click(function() {
    $.ajax({
        url: "/home/perfil/edit-pago", //URL DE LA RUTA
        type: 'POST',
        data: {
            'dinero': 40,
        },
        success: function(response) {
            $('#datos-pago').html(response);
            $("#datos-pago").removeClass('div-disabled');
            $('#enviar-pago-now').removeClass('div-disabled');
        },
        beforeSend: function(thisXHR) {
            $("#datos-pago").addClass('div-disabled');
            $('#enviar-pago-now').addClass('div-disabled')
        },

        statusCode: {
            404: function() {
                alert("pagina no encontrada mascota");
            }
        },
        error: function(jqXHR, status, error) {
            alert("Error al cargar");
        }
    });
});
