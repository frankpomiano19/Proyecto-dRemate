

var indexClassVal = -1;

function editarOn(indexComentario) {
    indexClassVal = indexComentario;
    classBotonEditar[indexComentario].classList.add('div-ocultar');
    classBotonCancelar[indexComentario].classList.remove('div-ocultar');
    classBotonConfirmar[indexComentario].classList.remove('div-ocultar');
    classParrafoComentario[indexComentario].classList.remove('div-ocultar');
    classParrafoComentarioEdit[indexComentario].classList.remove('div-ocultar');

}

function editarOff(indexComentario) {
    indexClassVal = indexComentario;
    classBotonEditar[indexComentario].classList.remove('div-ocultar');
    classBotonCancelar[indexComentario].classList.add('div-ocultar');
    classBotonConfirmar[indexComentario].classList.add('div-ocultar');
    classParrafoComentario[indexComentario].classList.add('div-ocultar');
    classParrafoComentarioEdit[indexComentario].classList.add('div-ocultar');

}


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') //Obtiene el token 										csrf
    }

});

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


/*
$('.boton-confirmar').click(function () {
    alert("listo");
    var datosForm = $('#' + indexClassVal).serialize();
    $.ajax({
        url: "/info-editar", //URL DE LA RUTA
        type: 'POST',
        data: datosForm,
        success: function (response) {

            $('#comentarios-recientes-partial').html(response);
            $('#comentarios-recientes-partial').removeClass('div-disabled');
            $('#cuadro-texto-comentario').removeClass('div-disabled');
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
});*/
function enviarEdicionComentarios() {
    var datosForm = $('#' + indexClassVal).serialize();
    $.ajax({
        url: "/info-editar", //URL DE LA RUTA
        type: 'POST',
        data: datosForm,
        success: function (response) {

            $('#comentarios-recientes-partial').html(response);
            $('#comentarios-recientes-partial').removeClass('div-disabled');
            $('#cuadro-texto-comentario').removeClass('div-disabled');
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
}



$(document)
    .one('focus.autoExpand', 'textarea.autoExpand', function () {
        var savedValue = this.value;
        this.value = '';
        this.baseScrollHeight = this.scrollHeight;
        this.value = savedValue;
    })
    .on('input.autoExpand', 'textarea.autoExpand', function () {
        var minRows = this.getAttribute('data-min-rows') | 0, rows;
        this.rows = minRows;
        rows = Math.ceil((this.scrollHeight - this.baseScrollHeight) / 17);
        this.rows = minRows + rows;
    });
//Paginacion para productos
    axios.interceptors.request.use(function (config) {
        // Do something before request is sent
        $('#comentarios-recientes-partial').addClass('div-disabled');
        $('#cuadro-texto-comentario').addClass('div-disabled');
        return config;
      }, function (error) {
        // Do something with request error
        return Promise.reject(error);
      });

$(document).on('click', '#info-prod-2 .pagination a', function (event) {


    event.preventDefault();
    var formId = jQuery('#hidden-id-user').val();
    var page0 = $(this).attr('href').split('page=')[1];
    axios.get('/info/fetch_data_product-'+formId+"?page="+page0,{
        params:{
            idUser: formId
        },
    })
    .then(response=>{
        $('#info-prod-2').html(response.data);
        $('#info-prod-2').removeClass('div-disabled');
        $('#comentarios-recientes-partial').removeClass('div-disabled');
        $('#cuadro-texto-comentario').removeClass('div-disabled');
    })
    .catch(e=>{
        alert("Error al enviar");
    })
});


