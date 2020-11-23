<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registro de Producto</title>

        <!-- Styles -->
        <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/registro.css') }}" />
        
        
    </head>
    <body class="antialiased" >

        <div class="container-md border rounded-lg cuerpo">
            <h1 class="text-center">Registrar producto</h1>
            <div class="linea"></div>
            <h2 class="text-center">Información del producto</h2>
            <h6 class="text-center" id="parrafo">Revisa la información del producto que será subastado cuando estés listo :)</h6><br><br>
            <form class="needs-validation" method="POST" enctype="multipart/form-data"  action="{{ route('producto.registroe')}}" novalidate>
            {{csrf_field()}}
            @csrf
            
            <div class="row">
                
                
                <!-- Aquí va la información del producto -->
                <div class="col-sm-12 col-md-6 col-lg-5">
                        <div class="col-sm-12">
                            
                            <label for="formGroupExampleInput"><h3>Categoría</h3></label><br>
                            <small  class="form-text text-muted">Escoja su categoría</small>
                            <select class="form-control" name="categoria_id" required>
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
                            @error('nombre_producto')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Describe tu producto en al menos en 8 caracteres
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror
                            <label for="formGroupExampleInput"><h3>Título</h3></label><br>
                            <small  class="form-text text-muted">Un buen título atrae más miradas</small>
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
                            @error('descripción')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Brinda una mejor descripción de tu producto
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror
                            <small class="form-text text-muted">Brinda todos los detalles de tu producto aquí</small>
                            <input type="text" name="descripcion" value="{{ old('descripcion') }}" class="form-control" placeholder="Añade una descripción" id="" rows="4" required>
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
                
                <!--Columna separadora-->
                <div class="col-1 d-none d-lg-block">

                </div>

                <!-- Esta es la información de la subasta -->
                <div class="col-sm-12 col-md-6 col-lg-5">
                
                        <div>
                            <h3>Ubicación</h3>
                            <select name="ubicacion" onchange="cambia()" class="form-control" required="">
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
                            
                            <select class="form-control" name="distrito" onchange="cambiaDistrito()" required="">
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
                                Garantía de minimo 8 caracteres
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror
                            <small class="form-text text-muted">Brinda detalles de tu garantía</small>
                            <input type="text" name="garantia" value="{{ old('garantia') }}" class="form-control" placeholder="Añade una descripción" id="validationCustom05" rows="4" required>
                            <br>
                            <div class="linea"></div>
                        </div>
                        <div class="col-sm-12">
                            <h3>Agregar fotos</h3>
                            <small class="form-text text-muted">Una imagen vale más que mil palabras</small>
                            {{-- IMAGEN UNO --}}
                            <div class="form-group{{ $errors->has('name1') ? ' has-error' : '' }}">
                                <input type="file" name="image_name1" class="form-control" id="name1" value="" required>
                                @if($errors->has('image_name1'))
                                    <span class="help-block">{{ $errors->first('image_name1') }}</span>
                                @endif
                            </div>

                            {{-- IMAGEN DOS --}}
                            <div class="form-group{{ $errors->has('name2') ? ' has-error' : '' }}">
                                <input type="file" name="image_name2" class="form-control" id="name2" value="" required>
                                @if($errors->has('image_name2'))
                                    <span class="help-block">{{ $errors->first('image_name2') }}</span>
                                @endif
                            </div>

                            {{-- IMAGEN TRES --}}
                            <div class="form-group{{ $errors->has('name3') ? ' has-error' : '' }}">
                                <input type="file" name="image_name3" class="form-control" id="name3" value="" required>
                                @if($errors->has('image_name3'))
                                    <span class="help-block">{{ $errors->first('image_name3') }}</span>
                                @endif
                            </div>

                            {{-- IMAGEN CUATRO --}}
                            <div class="form-group{{ $errors->has('name4') ? ' has-error' : '' }}">
                                <input type="file" name="image_name4" class="form-control" id="name4" value="" required>
                                @if($errors->has('image_name4'))
                                    <span class="help-block">{{ $errors->first('image_name4') }}</span>
                                @endif
                            </div>      
                            <br>
                            <div class="linea"></div>
                        </div>
                
                        <div id="center">
                        
                            <!--Remplazar el # por la vista a donde debería llevar-->
                            <div id="siguiente">
                                <button type="submit" class="btn btn-success btn-block">Registrar Producto</button>
                                <br><br>
                            </div>
                            <br><br>
                        </div>

                </div>
            </form>
            </div>
        </div>
        <script src="{{ asset('js/fechaSubasta.js') }}"></script>
        <script src="{{ asset('js/producto.js') }}"></script>
        <script src="{{ asset(mix('js/app.js')) }}"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script>
          // Example starter JavaScript for disabling form submissions if there are invalid fields
          (function() {
              'use strict';
              window.addEventListener('load', function() {
              // Fetch all the forms we want to apply custom Bootstrap validation styles to
              var forms = document.getElementsByClassName('needs-validation');
              // Loop over them and prevent submission
              var validation = Array.prototype.filter.call(forms, function(form) {
                  form.addEventListener('submit', function(event) {
                  if (form.checkValidity() === false) {
                      event.preventDefault();
                      event.stopPropagation();
                  }
                  form.classList.add('was-validated');
                  }, false);
              });
              }, false);
          })();
      </script>
    </body>
</html>