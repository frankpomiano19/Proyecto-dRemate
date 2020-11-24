$(document).ready(function () {

    get_product_data()
    
    $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    
    //Get all company
    function get_product_data() {
        
        $.ajax({
            url: root_url,
            type:'GET',
            data: { }
        }).done(function(data){
            table_data_row(data.data)
        });
    }
    
    //Company table row
    function table_data_row(data) {
    
        var	rows = '';
        
        $.each( data, function( key, value ) {
            
              rows = rows + '<tr>';
              rows = rows + '<td>'+value.nombre_producto+'</td>';
              rows = rows + '<td>'+value.descripcion+'</td>';
              rows = rows + '<td>'+value.categoria_id+'</td>';
              rows = rows + '<td data-id="'+value.id+'">';
                    rows = rows + '<a class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" id="editCompany" data-id="'+value.id+'" data-toggle="modal" data-target="#modal-id">Edit</a> ';
                    rows = rows + '<a class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" id="deleteCompany" data-id="'+value.id+'" >Delete</a> ';
                    rows = rows + '</td>';
              rows = rows + '</tr>';
        });
    
        $("tbody").html(rows);
    }
    
 
    //Edit modal window
    $('body').on('click', '#editProduct', function (event) {
    
        event.preventDefault();
        var id = $(this).data('id');
       
        $.get(store+'/'+ id+'/edit', function (data) {
             
             $('#userCrudModal').html("Edit product");
             $('#submit').val("Edit product");
             $('#modal-id').modal('show');
             $('#product_id').val(data.data.id);
             $('#nombre_producto').val(data.data.nombre_producto);
             $('#descripcion').val(data.data.descripcion);
             $('#categoria_id').val(data.data.categoria_id);
         })
    });
    
     //DeleteCompany
     $('body').on('click', '#deleteProduct', function (event) {
        if(!confirm("Do you really want to do this?")) {
           return false;
         }
    
         event.preventDefault();
        var id = $(this).attr('data-id');
     
        $.ajax(
            {
              url: store+'/'+id,
              type: 'DELETE',
              data: {
                    id: id
            },
            success: function (response){
              
                Swal.fire(
                  'Remind!',
                  'product deleted successfully!',
                  'success'
                )
                get_company_data()
            }
         });
          return false;
       });
    
    }); 