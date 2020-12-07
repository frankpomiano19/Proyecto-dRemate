<!DOCTYPE html>

<html>
<head>
<title>Laravel7 CRUD @fahmidasclassroom.com</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
@yield('content')
</div>
</body>
<script>
$(document).ready(function () {

/* When click New customer button */
$('#new-producto').click(function () {
$('#btn-save').val("create-producto");
$('#producto').trigger("reset");
$('#productoCrudModal').html("Add New Producto");
$('#crud-modal').modal('show');
});

/* Edit customer */
$('body').on('click', '#edit-producto', function () {
var producto_id = $(this).data('id');
$.get('productos/'+producto_id+'/edit', function (data) {
$('#productoCrudModal').html("Edit producto");
$('#btn-update').val("Update");
$('#btn-save').prop('disabled',false);
$('#crud-modal').modal('show');
$('#producto_id').val(data.id);
$('#nombre_producto').val(data.nombre_producto);
$('#descripcion').val(data.descripcion);
$('#estado').val(data.estado);
})
});
/* Show customer */
$('body').on('click', '#show-producto', function () {
$('#productoCrudModal-show').html("Producto Details");
$('#crud-modal-show').modal('show');
});

/* Delete customer */
$('body').on('click', '#delete-producto', function () {
var producto_id = $(this).data("id");
var token = $("meta[name='csrf-token']").attr("content");
confirm("Are You sure want to delete !");

$.ajax({
type: "DELETE",
url: 'productos/'+producto_id,
data: {
"id": producto_id,
"_token": token,
},
success: function (data) {
$('#msg').html('Product entry deleted successfully');
$("#producto_id_" + producto_id).remove();
},
error: function (data) {
console.log('Error:', data);
}
});
});
});

</script>
</html>
