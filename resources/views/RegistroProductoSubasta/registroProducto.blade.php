@extends('layouts.app')


@section('cont_cabe')
    <title>Registrar producto</title>

@endsection

@section('contenidoJS')
    <!-- Colocar js-->
    <script src="parsley.min.js"></script>
@endsection

@section('contenidoCSS')
    <!--footer.css pal footer / barra.css pal navbar / no es necesario el fontawesome-->
    <link rel="stylesheet" href="css/inicio.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/barra.css">
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/menuSubasta.css">
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}" />
@endsection


@section('contenido')

<div class="container-md border rounded-lg cuerpo">
    <h1 class="text-center">Registrar Producto</h1>
    <p id="parrafo">Revisa la información del producto y llena los campos de la subasta para empezar :)</p>
    <div class="row">


        <!-- Aquí va la información del producto -->
        <div class="col-sm-12 col-md-6 colum">
            <h2>Información del producto</h2>
            <form class="needs-validation" method="POST" enctype="multipart/form-data"
                action="{{ route('producto.registroe') }}" novalidate>
                {{ csrf_field() }}
                @csrf
                <div class="col-sm-12">
                    <label for="formGroupExampleInput">
                        <h3>Categoría</h3>
                    </label><br>
                    <small>Escoja su categoría</small>
                    <select name="categoria_id" class="form-control" required>
                        <option value="1" selected>Tecnología</option>
                        <option value="2">Hogar</option>
                        <option value="3">Electrodomésticos</option>
                        <option value="4">Joyas</option>
                        <option value="5">Instrumento musical</option>
                    </select>
                    <div class="invalid-feedback">
                        Seleccione una categoría
                    </div>
                    <br>
                    <div class="linea"></div>
                </div>

                <div class="col-sm-12">
                    <label for="formGroupExampleInput">
                        <h3>Título</h3>
                    </label><br>
                    @error('nombre_producto')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Describe tu producto en al menos en 8 caracteres
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                    <small>Un buen título atrae más miradas</small>
                    <input type="text" name="nombre_producto" value="{{ old('nombre_producto') }}"
                        class="form-control" id="titulo" placeholder="Nombre del producto" required>
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
                    <textarea input name="descripcion" id="" class="form-control" cols="30" rows="4"
                        placeholder="Añade una descripción" required>{{ old('descripcion') }}</textarea>
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
                    <br><br>
                    <div class="linea"></div>
                </div>

        </div>

        <div class="col-sm-12 col-md-6 colum">
            <br>
            <div>
                <h3>Departamento y Provincia</h3>
                <select name="selectDepartamento" onchange="cambia()" class="form-control" required=""
                    data-parsley-error-message="Escoja su ubicación">
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
                <h3>Garantía</h3>
                @error('garantia')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Garantía de minimo 8 caracteres
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @enderror
                <small>Brinda detalles de tu garantía o déjalo en blanco si no ofreces ninguna</small>
                <textarea input id="validationCustom05" name="garantia" id="" class="form-control" cols="30"
                    rows="4" placeholder="Detalla la garantía" required>{{ old('garantia') }}</textarea>
                <br>
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

                <div class="linea"></div>
            </div>



            <div id="center">
                <div id="siguiente">
                    <button type="submit" class="btn btn-success btn-block">Registrar Producto</button>
                </div>
                <br>
            </div>

            </form>
            <a href="{{ url('/menuSubasta') }}" class="btn btn-danger btn-block"
                style="text-decoration: none; color:white;">Cancelar</a>
             
        </div>
    </div>
</div>
        

@endsection

@section('contenidoJSabajo')
    <!-- Colocar js abajo-->
    <script src="{{ asset(mix('js/app.js')) }}"></script>
    <script src="{{ asset('js/fechaSubasta.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script src="/js/parsley.js"></script>
    <script src="{{ asset('js/producto.js') }}"></script>
@endsection
