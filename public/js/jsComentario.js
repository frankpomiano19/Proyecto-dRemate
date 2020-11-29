$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') //Obtiene el token 										csrf
    }
});

$('#comentar-button').click(function () {
    var datosForm = $('#form-comentar').serialize();
    $.ajax({
        url: "/comentario-crear", //URL DE LA RUTA
        type: 'POST',
        data: datosForm,
        success: function (response) {

            $('#comentarios-recientes-partial').html(response);
            $('#comentarios-recientes-partial').removeClass('div-disabled');
            $('#cuadro-texto-comentario').removeClass('div-disabled');
            $('#input-text-area-id').val("");
        },
        beforeSend: function (thisXHR) {
            $('#comentarios-recientes-partial').addClass('div-disabled');
            $('#cuadro-texto-comentario').addClass('div-disabled');
        },

        statusCode: {
            404: function () {
                alert("pagina no encontrada mascota");
            }
        },
        error: function (jqXHR, status, error) {
            alert("Error al enviar");
        }
    });
});
