@extends('layouts.app')


@section('cont_cabe')
    <title>Subtitulo - dRemate</title>

@endsection

@section('contenidoJS')
    <!-- Colocar js-->
        <script src="js/jquery-3.5.1.js"></script>
        <script src="parsley.min.js"></script>
@endsection

@section('contenidoCSS')
    <!-- Colocar css-->
    <link rel="stylesheet" href="css/inicio.css">
    <link rel="stylesheet" href="css/footer.css">
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}" />
    
   
  
@endsection


@section('contenido')

<div class="container-md border rounded-lg cuerpo">
    <h1 class="text-center">Registrar subasta</h1><br>
    <p id="parrafo"><br>Revisa la información del producto y llena los campos de la subasta para empezar :)<br><br></p>
    <div class="row">
        
        <!-- Aquí va la información del producto -->
        <div class="col-sm-12 col-md-6 colum">
        <!--<div class="col-sm-12 col-md-6 col-lg-5">-->
                <h2>Información del producto</h2><br>
                <div class="col-sm-12">
                    
                    <label for="formGroupExampleInput"><h3>Categoría</h3></label><br>
                    <small>Escoja su categoría</small>
                    <select class="form-control" required>
                        <option value="">-Seleccione-</option>
                        <option value="1">Antiguedades</option>
                        <option value="2">Tecnología</option>
                        <option value="3">Fósiles</option>
                        <option value="4">Fisi</option>
                        <option value="5">Nulo</option>
                    </select>
                    <div class="invalid-feedback">
                        Seleccione una cateroría
                    </div>
                    <br>
                    <div class="linea"></div>
                </div>
        
                <div class="col-sm-12">
                    <label for="formGroupExampleInput"><h3>Título</h3></label><br>
                    <small>Un buen título atrae más miradas</small>
                    <input type="text" class="form-control" id="titulo" placeholder="Nombre del producto" required>
                    <div class="invalid-feedback">
                        Por favor, inserte un título
                    </div>
                    <div class="valid-feedback">
                        ¡Bien!
                    </div>
                    <br>
                    <div class="linea"></div>
                </div>
        
                <div class="col-sm-12">
                    <h3>Descripción</h3>
                    <small>Brinda todos los detalles de tu producto aquí</small>
                    <textarea input type="text" class="form-control" placeholder="Añade una descripción" id="validationCustom05" rows="4" required></textarea>
                    <div class="invalid-feedback">
                        Es necesaria una descripción
                    </div>
                </div>
                
                <div class="col-sm-12">
                    <h3>Estado</h3>
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Nuevo</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" checked>
                        <label class="form-check-label" for="inlineRadio2">Usado</label>
                    </div>
                    <br><br>
                    <div class="linea"></div>
                </div>
        
                <div class="col-sm-12">
                    <h3>Agregar fotos</h3>
                    <small>Una imagen vale más que mil palabras</small>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" required>
                        <label class="custom-file-label" for="customFile">Selecciona tus imágenes</label>
                    </div>          
                    <br>
                    <div class="linea"></div>
                </div>
        
                <div class="col-sm-12">
                    <h3>Garantía</h3>
                    <small>Brinda detalles de tu garantía o déjalo en blanco si no ofreces ninguna</small>
                    <textarea input type="text" class="form-control" placeholder="Añade una descripción" id="validationCustom05" rows="2"></textarea>
                    <br>
                </div>
                
            <div id="center">
                <a href="{{URL::to('registroProducto')}}" class="btn btn-primary boton">Editar</a>
                <br><br>
            </div>
        </div>
        
        <!--Columna separadora
        <div class="col-1 d-none d-lg-block">

        </div>-->

        <!-- Esta es la información de la subasta 
        <div class="col-sm-12 col-md-6 col-lg-5">-->
        <div class="col-sm-12 col-md-6 colum">
            <h2>Información de la subasta</h2><br>
            <form id="demo-form" data-parsley-validate="" novalidate  method="POST" action="{{ route('producto.registroe')}}" enctype="multipart/form-data" novalidate>
                <div>
                    <label for="formGroupExampleInput"><h3>Precio inicial</h3></label>
                    <small><br>Ingrese la cantidad en Soles (S/)</small>
                    <input data-parsley-type="number" class="form-control" id="precioInicial" placeholder="Precio inicial" data-parsley-required="true"   data-parsley-error-message="Ingrese el precio inicial">
                    <div class="invalid-feedback">
                        Not nice >:v
                    </div>
                    <div class="valid-feedback">
                        Nice!
                    </div>
                    <br>
                    <div class="linea"></div>
                </div>
                
                <div>
                    <label for="formGroupExampleInput"><h3>Fecha de inicio</h3></label><br>
                    <input type="date" class="form-control" id="titulo" placeholder="Nombre del producto" required  data-parsley-error-message="Seleccione la fecha de inicio">
                    <div class="invalid-feedback">
                        Seleccione una fecha
                    </div>
                    <div class="valid-feedback">
                        ¡Bien!
                    </div>
                    <br>
                    <div class="linea"></div>
                </div>
                
                <div>
                    <label for="formGroupExampleInput"><h3>Fecha de fin de la subasta</h3></label><br>
                    <input type="date" class="form-control" id="titulo" required  data-parsley-error-message="Seleccione la fecha de fin de la subasta">
                    <div class="invalid-feedback">
                        Seleccione una fecha
                    </div>
                    <div class="valid-feedback">
                        ¡Bien!
                    </div>
                    <br>
                    <div class="linea"></div>
                </div>

                <div class="form-group">
                    <h3>Descripción</h3>
                    <small>Brinda todos los detalles de tu producto aquí</small>
                    <textarea input type="text" class="form-control" placeholder="Añade una descripción" id="validationCustom05" rows="4" required   data-parsley-error-message="Es necesaria una descripción"></textarea>
                    <div class="invalid-feedback">
                        Es necesaria una descripción
                    </div>
                </div>
        
                <div>
                    <h3>Ubicación</h3>
                    <select name="selectDepartamento" onchange="cambia()" class="form-control" required=""  data-parsley-error-message="Escoja su ubicación">
                        <option value="">Seleccione</option>
                        <option value="Amazonas">Amazonas</option>
                        <option value="Ancash">Ancash</option>
                        <option value="Apurímac">Apurímac</option>
                        <option value="Arequipa">Arequipa</option>
                        <option value="Ayacucho">Ayacucho</option>
                        <option value="Cajamarca">Cajamarca</option>
                        <option value="Callao">Callao</option>
                        <option value="Cuzco">Cuzco </option>
                        <option value="Huancavelica">Huancavelica</option>
                        <option value="Huánuco">Huánuco</option>
                        <option value="Ica">Ica</option>
                        <option value="Junín">Junín</option>
                        <option value="La_Libertad">La Libertad</option>
                        <option value="Lambayeque">Lambayeque</option>
                        <option value="Lima">Lima</option>
                        <option value="Loreto">Loreto</option>
                        <option value="Madre_de_Dios">Madre de Dios</option>
                        <option value="Moquegua">Moquegua</option>
                        <option value="Pasco">Pasco</option>
                        <option value="Piura">Piura</option>
                        <option value="Puno">Puno</option>
                        <option value="San_Martín">San Martín</option>
                        <option value="Tacna">Tacna</option>
                        <option value="Tumbes">Tumbes</option>
                        <option value="Ucayali">Ucayali</option>
                    </select><br>
                    
                    <select class="form-control" name="selectProvincia" onchange="cambiaDistrito()" required="">
                        <option>Seleccione la Provincia</option>
                    </select>
                    <br>
                    <div class="linea"></div>
                </div>

                <div>
                    <h3>Agregar fotos</h3>
                    <small>Una imagen vale más que mil palabras</small>
                    <div class="custom-file">
                        <input type="file"  class="custom-file" accept=".png, .jpeg" required  data-parsley-error-message="Seleccione por lo menos un archivo">
                    </div>          
                    <br>
                    <div class="linea"></div>
                </div>
        
                <div>
                    <h3>Garantía</h3>
                    <small  >Brinda detalles de tu garantía o déjalo en blanco si no ofreces ninguna</small>
                    <textarea input type="text" class="form-control" placeholder="Añade una descripción" id="validationCustom05" rows="2"></textarea>
                    <br>
                </div>
        
                <div id="center">
                
                <!--Remplazar el # por la vista a donde debería llevar-->
                <!--<a href="{{URL::to('#')}}" type="submit" class="btn btn-primary boton">Siguiente</a>-->
                <button type="submit" class="btn boton" value="validate">Subastar</button>
                <br><br>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset(mix('js/app.js')) }}"></script>
<script src="/js/parsley.js"></script>
<script src="{{ asset('js/producto.js') }}"></script>

@endsection

@section('contenidoJSabajo')
@endsection
