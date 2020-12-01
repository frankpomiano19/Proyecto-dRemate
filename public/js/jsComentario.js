$(document).ready(function () {
    $(document).on('click', '#comentarios-recientes-partial .pagination a', function (event) {
        event.preventDefault();
        var page0 = $(this).attr('href').split('page=')[1];
        fetch_data_coment(page0);
    });

    function fetch_data_coment(page0) {
        var formId = jQuery('#hidden-id-user').val();
        $.ajax({
            type: 'GET',
            data: {
                'idUser': formId
            },
            url: "/info/fetch_data_coment-" + formId + "?page=" + page0,
            success: function (response) {
                $('#comentarios-recientes-partial').html(response);
                $('#comentarios-recientes-partial').removeClass('div-disabled');
                $('#cuadro-texto-comentario').removeClass('div-disabled');
                $('#input-text-area-id').val("");
                $('#comentar-button').addClass('div-disabled');
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
        })
    }



});


var limite = 400;
$("#input-text-area-id").on('input', function () {
    var inicial = $(this).val().length;

    $("#input-text-area-id").attr('maxlength', limite);

    if (inicial < limite) {
        $('#contadorCaracteres').text("400/" + inicial + " letras");
        inicial++;
    } else {
        $('#contadorCaracteres').text("400/" + inicial + " letras");

    }
    if (inicial < 2) {
        $('#comentar-button').addClass('div-disabled');
    }
    if (inicial >= 2) {
        $('#comentar-button').removeClass('div-disabled');
    }

});




$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') //Obtiene el token 										csrf
    }

});

$('#comentar-button').click(function () {
    var datosForm = $('#form-comentar').serialize();
    $.ajax({
        url: "/info-crear", //URL DE LA RUTA
        type: 'POST',
        data: datosForm,
        success: function (response) {

            $('#comentarios-recientes-partial').html(response);
            $('#comentarios-recientes-partial').removeClass('div-disabled');
            $('#cuadro-texto-comentario').removeClass('div-disabled');
            $('#input-text-area-id').val("");
            $('#comentar-button').addClass('div-disabled');
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
