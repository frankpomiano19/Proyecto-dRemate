// const { default: Swal } = require("sweetalert2");

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


//Paginacion para productos registrados
axios.interceptors.request.use(function (config) {
    $('#historial_prod_reg').addClass('div-disabled');
    $('#historial_prod_sub').addClass('div-disabled');
    return config;
  }, function (error) {
    return Promise.reject(error);
  });

$(document).on('click', '#historial_prod_reg .pagination a', function (event) {
    event.preventDefault();
    // var formId = jQuery('#hidden-id-user').val();
    var page0 = $(this).attr('href').split('pagination-prod-reg=')[1];
    axios.get('/producto/pagination_data_prod_reg?pagination-prod-reg='+page0)
    .then(response=>{
        $('#historial_prod_reg').html(response.data);
        $('#historial_prod_reg').removeClass('div-disabled');
        $('#historial_prod_sub').removeClass('div-disabled');
    })
    .catch(e=>{
        alert("Error al enviar");
    })
});


//Paginacion para productos en subasta

$(document).on('click', '#historial_prod_sub .pagination a', function (event) {
    event.preventDefault();
    // var formId = jQuery('#hidden-id-user').val();
    var page0 = $(this).attr('href').split('pagination-prod-sub=')[1];
    axios.get('/producto/pagination_data_prod_sub?pagination-prod-sub='+page0)
    .then(response=>{
        $('#historial_prod_sub').html(response.data);
        $('#historial_prod_reg').removeClass('div-disabled');
        $('#historial_prod_sub').removeClass('div-disabled');
    })
    .catch(e=>{
        alert("Error al enviar");
    })
});

$(document).on('click', '#historial_puj .pagination a', function (event) {
    event.preventDefault();
    // var formId = jQuery('#hidden-id-user').val();
    var page0 = $(this).attr('href').split('pagination-hist-puj=')[1];
    axios.get('/producto/pagination_hist_pujas?pagination-hist-puj='+page0)
    .then(response=>{
        $('#historial_puj').html(response.data);
        $('#historial_puj').removeClass('div-disabled');
        
    })
    .catch(e=>{
        alert("Error al enviar");
    })
});

// Colocar valores en el popup form de mensajeria
$(document).on('click','.element-td-now',function(event){
    $('#modalMensajeMostrar #recipientMensajeModal').val($(this).find('.cMensajeProducto').val());
    $('#modalMensajeMostrar #recipientReceptorModal').val($(this).find('.cMensajeEmisor').val());
    $('#modalMensajeMostrar #recipientIdModal').val($(this).find('.cMensajeId').val());
    $('#modalMensajeMostrar #recipientAsuntoModal').val($(this).find('.cMensajeAsunto').val());
    $('#modalMensajeMostrar #recipientMensajeEmisor').val($(this).find('.cMensajeTexto').val());
    $('#modalMensajeMostrar #recipientIdProductoModal').val($(this).find('.cMensajeIdProducto').val());
        
});
// Colocar valores en el popup de mostrar en mensajeria
$(document).on('click','.element-td-enviados-now',function(){
    $('#modalMensajeEnviadoMostrar #recipientMensajeModal2').val($(this).find('.cMensajeProducto').val());
    $('#modalMensajeEnviadoMostrar #recipientReceptorModal2').val($(this).find('.cMensajeEmisor').val());
    $('#modalMensajeEnviadoMostrar #recipientAsuntoModal2').val($(this).find('.cMensajeAsunto').val());
    $('#modalMensajeEnviadoMostrar #recipientMensajeEmisor2').val($(this).find('.cMensajeTexto').val()); 
});


// Enviar form
$('#enviarRespuestaNow').click(function() {
    var datosForm2 = $('#formResponderMensaje').serialize();
     $.ajax({
        url: "/home/perfil/enviar-mensaje", //URL DE LA RUTA
        type: 'POST',
        data: datosForm2,
        success: function(response) {
            Swal.close();            
            $('#mensajeria-perfil').html(response);
            $("#mensajeria-perfil").removeClass('div-disabled');
        },
        beforeSend: function(thisXHR) {
            Swal.fire('Enviando . . .');
            Swal.showLoading();
            $("#mensajeria-perfil").addClass('div-disabled');
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