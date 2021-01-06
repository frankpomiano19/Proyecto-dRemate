// const { default: Swal } = require("sweetalert2");

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') //Obtiene el token 										csrf
    }
});

$('#submitButton').click(function() {
    var datosForm = $('#formMessage').serialize();
    $.ajax({
        url: "/producto/storeMessage", //URL DE LA RUTA
        type: 'POST',
        data: datosForm,
        success: function(response) {
            // alert(JSON.stringify(response.respuestas));
            if(response.enviado==true){
                Swal.fire("Enviado ","Mensaje enviado con exito","success");
                $('#contentSubject').val("");
                $('#contentText').val("");
            }else{
                Swal.fire({
                    title: "Error de envio",
                    html: `<div class="alert alert-danger alert-dismissible" role="alert">
                                <ul>
                                    <li>Asegurese de llenar el campo de asunto</li>
                                    <li>Asegurese de llenar el campo de texto</li>
                                </ul>
                            </div>`,
                    icon:"error"
                });
            }
        },




        beforeSend: function(thisXHR) {
            Swal.fire('Enviando . . .');
            Swal.showLoading();
            // $("#mensajeria-perfil").addClass('div-disabled');
        },
        //  $('#mensajeria-perfil').html(response);
        //  $("#mensajeria-perfil").removeClass('div-disabled');

        statusCode: {
            404: function() {
                alert("pagina no encontrada mascota");
            }
        },
        error: function(jqXHR, status, error) {
            Swal.fire("Error","Ocurrio error en el servidor : " + error,"error");
        }
    });
});



