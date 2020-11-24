@extends('layouts.app')


@section('cont_cabe')
    <title>Registrar subasta</title>

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
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">D'REMATE</a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarCollapse" style="">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">HOME <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            CATEGORIAS
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Articulos de moda</a>
                <a class="dropdown-item" href="#">Productos tecnologicos</a>
                <a class="dropdown-item" href="#">Articulos para el hogar</a>
                <a class="dropdown-item" href="#">Deportes y ocio</a>
                <a class="dropdown-item" href="#">Antigüedades</a>
                <a class="dropdown-item" href="#">Articulos de jardineria</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Ver todas</a>
            </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">SUBASTAS EN VIVO</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">NOVEDADES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">ABOUT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">REGISTRATE</a>
        </li>
      </ul>
      <ul>
          <li>
            <form class="form-inline mt-2 mt-md-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </li>
      </ul>
      
    </div>
</nav>

    <body class="antialiased" >

        <div class="container-md border rounded-lg cuerpo">
            <h1 class="text-center">Registrar y subastar producto</h1><br>
            <p id="parrafo"><br>Revisa la información del producto y llena los campos de la subasta para empezar :)</p>
            <div class="row">
                
                <!-- Aquí va la información del producto -->
                <div class="col-sm-12 col-md-6 colum">
                <!--<div class="col-sm-12 col-md-6 col-lg-5">-->
                    <h2>Información del producto</h2><br>
                    <form class="needs-validation" method="POST" enctype="multipart/form-data"  action="{{ route('producto.registroee')}}" novalidate>
                        {{csrf_field()}}
                        @csrf
                        <div class="col-sm-12">
                            <label for="formGroupExampleInput"><h3>Categoría</h3></label><br>
                            <small>Escoja su categoría</small>
                            <select name="categoria_id" class="form-control" required>
                                <option value="1" selected>Tecnología</option>
                                <option value="2">Hogar</option>
                                <option value="3">Electrodomésticos</option>
                                <option value="4">Joyas</option>
                                <option value="5">Instrumento musical</option>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione una cateroría
                            </div>
                            <br>
                            <div class="linea"></div>
                        </div>
                
                        <div class="col-sm-12">
                            <label for="formGroupExampleInput"><h3>Título</h3></label><br>
                            @error('nombre_producto')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Describe tu producto en al menos en 8 caracteres
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror
                            <small>Un buen título atrae más miradas</small>
                            <input type="text" name="nombre_producto" value="{{ old('nombre_producto') }}" class="form-control" id="titulo" placeholder="Nombre del producto" required>
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
                            @error('descripcion')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Brinda una mejor descripción de tu producto
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror
                            <small>Brinda todos los detalles de tu producto aquí</small>
                            <textarea input name="descripcion" id="" class="form-control" cols="30" rows="4" placeholder="Añade una descripción" required>{{ old('descripcion') }}</textarea>
                            <div class="invalid-feedback">
                                Es necesaria una descripción
                            </div>
                            <br>
                            <div class="linea"></div>
                        </div>
                        
                        <div class="col-sm-12">
                            <h3>Estado</h3>
                            <select class="form-control" name="estado">
                                <option value="Disponible" selected>Disponible</option> 
                                <option value="No disponible">No disponible</option>
                                <option value="En curso">En curso</option>
                            </select>
                            <br>
                            <div class="linea"></div>
                        </div>
                    
                        <div class="col-sm-12">
                            <h3>Condicion</h3>
                            <select class="form-control" name="condicion">
                                <option value="Nuevo" selected>Nuevo</option> 
                                <option value="Usado">Usado</option>
                            </select>
                            <br>
                            <div class="linea"></div>
                        </div>   
                        <div class="col-sm-12">
                            <h3>Agregar fotos</h3>
                            <small class="form-text text-muted">Una imagen vale más que mil palabras</small>
                            @error('image_name1')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <small>Solo se acepta imagen con formato JPEG,BMP,JPG o PNG (máx 6MB)</small>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                            <div class="form-group">
                                <input type="file" name="image_name1" class="form-control" id="name1" value="" required>
                            </div>

                            @error('image_name2')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <small>Solo se acepta imagen con formato JPEG,BMP,JPG o PNG (máx 6MB)</small>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                            <div class="form-group">
                                <input type="file" name="image_name2" class="form-control" id="name2" value="" required>
                            </div>

                            @error('image_name3')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <small>Solo se acepta imagen con formato JPEG,BMP,JPG o PNG (máx 6MB)</small>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                            <div class="form-group">
                                <input type="file" name="image_name3" class="form-control" id="name3" value="" required>
                            </div>

                            @error('image_name4')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <small>Solo se acepta imagen con formato JPEG,BMP,JPG o PNG (máx 6MB)</small>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                            <div class="form-group">
                                <input type="file" name="image_name4" class="form-control" id="name4" value="" required>
                            </div>      
                            <br>
                            <div class="linea"></div>
                        </div>  

                </div>
                
                <!--Columna separadora
                <div class="col-1 d-none d-lg-block">

                </div>-->

                <!-- Esta es la información de la subasta 
                <div class="col-sm-12 col-md-6 col-lg-5">-->
                <div class="col-sm-12 col-md-6 colum">
                    <h2>Información de la subasta</h2>
                    <br>
                    <div>
                        <label for="formGroupExampleInput"><h3>Precio inicial</h3></label>
                        <small class="form-text text-muted">Ingrese la cantidad en Soles (S/) y máximo con dos decimales. Ejemplo: 25.50</small>
                        @error('precio_inicial')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Precio mínimo 10.00 - Precio máximo 999.99
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        @enderror
                        <input type="text" name="precio_inicial" value="{{ old('precio_inicial') }}" class="form-control" id="precioInicial" placeholder="Precio mínimo 10.00 - Precio máximo 999.99" required>
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
                        @error('inicio_subasta')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Debes ingresar la fecha de inicio de subasta
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        @enderror
                        <input type="date" class="form-control" value="{{ old('inicio_subasta') }}" name="inicio_subasta" min="2020-11-02" id="fechaInicio" required>
                        <div class="invalid-feedback">
                            Seleccione una fecha
                        </div>
                        <div class="valid-feedback">
                            ¡Bien!
                        </div>
                        <br><br>
                        <div class="linea"></div>
                    </div>
                    
                    <div>
                        <label for="formGroupExampleInput"><h3>Fecha de fin de la subasta</h3></label><br>
                        @error('final_subasta')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            La subasta debe durar mínimo 1 día
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @enderror
                        <input type="date" class="form-control" name="final_subasta" min="2020-11-02" value="{{ old('final_subasta') }}" id="fechaInicioF" required>
                        <div class="invalid-feedback">
                            Seleccione una fecha
                        </div>
                        <div class="valid-feedback">
                            ¡Bien!
                        </div>
                        <br><br>
                        <div class="linea"></div>
                    </div>
            
                    <div>
                        <h3>Departamento y Provincia</h3>
                        <select name="selectDepartamento" onchange="cambia()" class="form-control" required="">
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
                            <option value="Lima" selected>Lima</option>
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
                        
                        <div class="invalid-feedback">
                            Complete los campos
                        </div>
                        <br>
                        <div class="linea"></div>
                    </div>

                    <div>
                        <h3>Garantía</h3>
                        @error('garantia')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            De no brindar garantía puedes escribir "Sin garantía"
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                        <small class="form-text text-muted">Brinda detalles de tu garantía</small>
                        <textarea input id="validationCustom05" name="garantia" id="" class="form-control" cols="30" rows="4" placeholder="Detalla la garantía" required>{{ old('garantia') }}</textarea>
                        <br>
                    </div>
            
                    <div id="center">
                    
                        <!--Remplazar el # por la vista a donde debería llevar-->
                        <div id="siguiente">
                            <button type="submit" class="btn btn-success btn-block">Registrar y Subastar Producto</button>
                            <br><br>
                        </div>
                        <br><br>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="{{ asset(mix('js/app.js')) }}"></script>
        <script src="{{ asset('js/fechaSubasta.js') }}"></script>
        <script src="{{ asset('js/producto.js') }}"></script>
        <script src="/js/parsley.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        
        

        @endsection

        @section('contenidoJSabajo')
        <script src="https://use.fontawesome.com/c9d7a705d9.js"></script>
            <!-- Colocar js abajo-->
        @endsection
