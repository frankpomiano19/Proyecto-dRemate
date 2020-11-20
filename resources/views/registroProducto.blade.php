@extends('layouts.app')


@section('cont_cabe')
    <title>Registro Producto</title>

@endsection

@section('contenidoJS')
    <!-- Colocar js-->
@endsection

@section('contenidoCSS')
    <!-- Colocar css-->
    <link rel="stylesheet" href="css/inicio.css">
    <link rel="stylesheet" href="css/footer.css">
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <!-- Styles -->
    <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
   
  
@endsection
    <body>
        <div class="container-md border rounded-lg cuerpo">
            <form class="needs-validation"  method="POST" action="{{ route('producto.registroe')}}" enctype="multipart/form-data" novalidate>
            @csrf
            <h1 class="text-center">Registro de producto</h1><br>
            <p id="parrafo"><br>Primero registra tu producto para mostrarlo a los usuarios<br><br></p>
            
            <div class="linea"></div>
    
            <div class="col-sm-12 col-md-8 col-lg-7 col-xl-6 form-group">
                <label for="formGroupExampleInput"><h3>Categoría</h3></label><br>
                <small  class="form-text text-muted">Escoja su categoría</small>
                <select class="form-control" name="categoria">
                    <option value="1">Antiguedades</option>
                    <option value="2">Tecnología</option>
                    <option value="3">Fósiles</option>
                    <option value="4">Fisi</option>
                    <option value="5">Otra</option>
                </select>
                <div class="invalid-feedback">
                    Seleccione una cateroría
                </div>
                <br>
                <div class="linea"></div>
            </div>
    
            <div class="col-sm-12 col-md-8 col-lg-7 col-xl-6 form-group"></div>
    
            <div class="col-sm-12 col-md-8 col-lg-7 col-xl-6">
                <label for="formGroupExampleInput"><h3>Título</h3></label>
                <small  class="form-text text-muted">Un buen título atrae más miradas</small>
                <input type="text" class="form-control" id="titulo" placeholder="Nombre del producto" required>
                <div class="invalid-feedback">
                    Por favor, ingrese un título
                </div>
                <div class="valid-feedback">
                    ¡Bien!
                </div>
                <br>
                <div class="linea"></div>
            </div>
    
            <div class="col-sm-12 col-md-8 col-lg-7 col-xl-6 form-group">
                <h3>Descripción</h3>
                <small class="form-text text-muted">Brinda todos los detalles de tu producto aquí</small>
                <textarea input type="text" class="form-control" placeholder="Añade una descripción" id="validationCustom05" rows="4" required></textarea>
                <div class="invalid-feedback">
                    Es necesaria una descripción
                </div>
            </div>
            
            <div class="col-sm-12 col-md-8 col-lg-7 col-xl-6">
                <h3>Estado</h3>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                    <label class="form-check-label" for="inlineRadio1">Nuevo</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" checked>
                    <label class="form-check-label" for="inlineRadio2">Usado</label>
                </div>
                <br>
                <div class="linea"></div>
            </div>
    
            <div class="col-sm-12 col-md-8 col-lg-7 col-xl-6">
                <h3>Agregar fotos</h3>
                <small class="form-text text-muted">Una imagen vale más que mil palabras</small>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" required>
                    <label class="custom-file-label" for="customFile">Selecciona tus imágenes</label>
                </div>    
                <br>
                <div class="linea"></div>
            </div>
    
            <div class="col-sm-12 col-md-8 col-lg-7 col-xl-6">
                <h3>Garantía</h3>
                <small class="form-text text-muted">Brinda detalles de tu garantía o déjalo en blanco si no ofreces ninguna</small>
                <textarea input type="text" class="form-control" placeholder="Añade una descripción" id="validationCustom05" rows="2"></textarea>
                <br>
            </div>
    
            <div id="siguiente">
                <button type="submit" class="btn btn-primary">Siguiente</button>
                <br><br>
            </div>
          </form>
        </div>
        

        <script src="{{ asset(mix('js/app.js')) }}"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        
        <script src="{{ asset('js/producto.js') }}"></script>
    </body>
</html>
