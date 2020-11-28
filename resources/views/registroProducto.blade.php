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

<div class="container-md border rounded-lg cuerpo">
    <div class="contenido"></div>
        <form  id="demo-form" data-parsley-validate="" novalidate method="POST"  enctype="multipart/form-data"  action="{{ route('producto.registroe')}}"  novalidate>
            @csrf
            <h1 class="text-center">Registro de producto</h1><br>
            <p id="parrafo"><br>Primero registra tu producto para mostrarlo a los usuarios<br><br></p>
            
            <div class="linea"></div>
            
            
                <div class="col-sm-12 col-md-8 col-lg-6 col-xl-6 form-group">
                    <label for="formGroupExampleInput"><h3>Categoría</h3></label><br>
                    <select class="form-control" name="categoria" id="heard" required="" data-parsley-error-message="Seleccione una categoría">
                        <option value="">Seleccione...</option>
                        <option value="1">Artículos de moda</option>
                        <option value="2">Productos tecnológicos</option>
                        <option value="3">Artículos para el hogar</option>
                        <option value="4">Deportes y ocio</option>
                        <option value="5">Antigüedades</option>
                    </select>
                    <div class="invalid-feedback">
                        Seleccione una categoría por favor
                    </div>
                    <br>
                    <div class="linea"></div>
                </div>
        
                <div class="col-sm-12 col-md-8 col-lg-6 col-xl-6 form-group"></div>
        
                <div class="col-sm-12 col-md-8 col-lg-7 col-xl-6">
                    <label for="formGroupExampleInput"><h3>Título</h3></label><br>
                    <input type="text" class="form-control" name="nombre" id="titulo" placeholder="Nombre del producto" required  data-parsley-error-message="Es necesario un título">
                    <div class="invalid-feedback">
                        Por favor, ingrese un título
                    </div>
                    <br>
                    <div class="linea"></div>
                </div>
            
    
            <div class="col-sm-12 col-md-8 col-lg-7 col-xl-6 form-group">
                <h3 for="message">Descripción</h3>
                <small>Brinda todos los detalles de tu producto aquí</small>
                <textarea input type="text" class="form-control" placeholder="Añade una descripción" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="200" data-parsley-minlength-message="Tu descripción debe tener por lo menos 20 caracteres" data-parsley-validation-threshold="10" rows="4"></textarea>
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
                <small>Una imagen vale más que mil palabras</small>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" required  data-parsley-error-message="Sube por lo menos una imagen"><br>
                    <label class="custom-file-label" name="imagen" for="customFile">Selecciona tus imágenes</label>
                </div>
                <div class="invalid-feedback">
                    Sube por lo menos una imagen
                </div>
                <br>
                <div class="linea"></div>
            </div>
    
            <div class="col-sm-12 col-md-8 col-lg-7 col-xl-6">
                <br><h3>Garantía</h3>
                <small>Brinda detalles de tu garantía o déjalo en blanco si no ofreces ninguna</small>
                <textarea input type="text" class="form-control" name='garantia' placeholder="Añade una descripción" id="validationCustom05" rows="2"></textarea>
                <br>
            </div>
    
            <div id="siguiente">
                <button type="submit" class="btn boton" value="validate">Registrar</button>
                <br><br>
            </div>
        </form>

    </div>

    
</div>

<script src="{{ asset(mix('js/app.js')) }}"></script>  
<script src="/js/parsley.js"></script>
<script src="{{ asset('js/producto.js') }}"></script>
@section('contenidoJSabajo')
@endsection
