@extends('layouts.app')

@section('cont_cabe')
    <title>Subtitulo - dRemate</title>

@endsection

@section('contenidoJS')
    <!-- Colocar js-->
@endsection

@section('contenidoCSS')
    <!-- Colocar css-->
    <link rel="stylesheet" href="css/inicio.css">
    <link rel="stylesheet" href="css/footer.css">
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    
   
  
@endsection

@section('contenido')

<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
            <a href="javascript:void(0)" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em; width:100px;" id="createNewCompany">Add Company</a>
            <table class="table table-bordered">
              <thead>
                  <tr>
                     <th>nombre_producto</th>
                     <th>estado</th>
                     <th>condicion</th>
                     <th>descripcion</th>
                     <th width="200px">Action</th>
                  </tr>
              </thead>

              <tbody>
              </tbody>

            </table>
              @include('company.modal')
           </div>
           <div class="row">
           <div class="col-xs-8"></div>
           <button type="button" justify-content="center" class="btn btn-warning">Registrar</button>
        </div>
        </div>
        
    </div>
</div>
@endsection

@push('ajax_crud')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script src="/js/ajax.js"></script>

@endpush 
@section('contenidoJSabajo')

    <!-- Colocar js abajo-->
@endsection