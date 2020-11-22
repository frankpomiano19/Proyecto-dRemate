<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registro de Subasta</title>

        <!-- Styles -->
        <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

        
        
    </head>
    <body class="antialiased" >
      <form class="needs-validation" method="POST"  action="{{ route('producto.registroee')}}" novalidate>
        @csrf

        <h1 class="text-center">Registro de producto</h1><br>
        <p id="parrafo"><br>Primero registra tu producto para mostrarlo a los usuarios<br></p>        
        <div class="linea"></div>

        {{-- Ingreso categoría --}}
        <col-md-6>
            <div class="col-sm-12 col-md-8 col-lg-7 col-xl-6">
                <label for="formGroupExampleInput"><h3>Categoría</h3></label><br>
                <small  class="form-text text-muted">Escoja su categoría</small>
                <select class="form-control" name="categoria_id">
                  <option selected value="1">Tecnología</option>
                  <option value="2">Hogar</option>
                  <option value="3">Electrodomésticos</option>
                  <option value="4">Joyas</option>
                  <option value="5">Instrumento musical</option>
                  <option value="6">Juguetes</option>  
                </select>
            <div class="invalid-feedback">
                Seleccione una categoría
            </div>
            <br>
            <div class="linea"></div>
        </div>
        {{-- Fin categoría --}}

        {{-- Ingreso nombre --}}
        <div class="col-sm-12 col-md-8 col-lg-7 col-xl-6">
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
            <input type="text" name="nombre_producto" value="{{ old('nombre_producto') }}" class="form-control" id="titulo" placeholder="Nombre del producto">
            <div class="invalid-feedback">
                Not nice >:v
            </div>
            <div class="valid-feedback">
                Nice!
            </div>
            <br>
            <div class="linea"></div>
        </div>
        {{-- Fin nombre --}}

        {{-- Ingreso descripcion --}}
        <div class="col-sm-12 col-md-8 col-lg-7 col-xl-6 form-group">
            @error('descripción')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Brinda una mejor descripción de tu producto
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @enderror
            <h3>Descripción</h3>
            <small class="form-text text-muted">Brinda todos los detalles de tu producto aquí</small>
            <input type="text" name="descripcion" value="{{ old('descripcion') }}" class="form-control" placeholder="Añade una descripción" id="" rows="4">
            <div class="invalid-feedback">
                Es necesaria una descripción
            </div>
        </div>
        {{-- Fin descripción --}}

        {{-- Ingreso departamento - distrito --}}
        <div class="col-sm-12 col-md-8 col-lg-7 col-xl-6">
            <h3>Departamento</h3>
            <select class="form-control" name="ubicacion">
                <option value="Amazonas" >Amazonas</option> 
                <option value="Ancash">Ancash</option>
                <option value="Apurimac">Apurimac</option>
                <option value="Arequipa" >Arequipa</option> 
                <option value="Ayacucho">Ayacucho</option>
                <option value="Cajamarca">Cajamarca</option>
                <option value="Callao" >Callao</option> 
                <option value="Cusco">Cusco</option>
                <option value="Huancavelica">Huancavelica</option>
                <option value="Huanuco" >Huanuco</option> 
                <option value="Ica">Ica</option>
                <option value="Junín">Junín</option>
                <option value="La Libertad" >La Libertad</option> 
                <option value="Lambayeque">Lambayeque</option>
                <option value="Lima" selected>Lima</option>
                <option value="Loreto" >Loreto</option> 
                <option value="Madre de Dios">Madre de Dios</option>
                <option value="Moquegua">Moquegua</option>
                <option value="Pasco" >Pasco</option> 
                <option value="Piura">Piura</option>
                <option value="Puno">Puno</option>
                <option value="San Martin">San Martin</option> 
                <option value="Tacna">Tacna</option>
                <option value="Tumbes">Tumbes</option>
                <option value="Ucayali">Ucayali</option>
            </select>
            <select class="form-control" name="distrito" onchange="cambiaDistrito()" required="">
                <option>Seleccione la Provincia</option>
            </select>
            <br><br>
            <div class="linea"></div>
        </div>
        {{-- Fin departamento - distrito --}}

        {{-- Ingreso estado --}}
        <div class="col-sm-12 col-md-8 col-lg-7 col-xl-6">
            <h3>Estado</h3>
            <select class="form-control" name="estado">
                <option value="Disponible" selected>Disponible</option> 
                <option value="No disponible">No disponible</option>
                <option value="En curso">En curso</option>
            </select>
            <br><br>
            <div class="linea"></div>
        </div>
        {{-- Fin estado --}}

        {{-- Ingreso condicion --}}
        <div class="col-sm-12 col-md-8 col-lg-7 col-xl-6">
            <h3>Condicion</h3>
            <select class="form-control" name="condicion">
                <option value="Nuevo" selected>Nuevo</option> 
                <option value="Usado">Usado</option>
            </select>
            <br><br>
            <div class="linea"></div>
        </div>
        {{-- Fin condición --}}

        {{-- Ingreso foto --}}
        <div class="col-sm-12 col-md-8 col-lg-7 col-xl-6">
            <h3>Agregar fotos</h3>
            <small class="form-text text-muted">Una imagen vale más que mil palabras</small>

            <div class="custom-file">
                <input type="file" name="imagen" value="{{ old('imagen') }}" class="custom-file-input">
                <label class="custom-file-label" for="customFile">Selecciona tus imágenes</label>
            </div>          
            <br>
            <div class="linea"></div>
        </div>
        {{-- Fin foto --}}

        {{-- Ingreso garantía --}}
        <div class="col-sm-12 col-md-8 col-lg-7 col-xl-6">
            @error('garantía')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                De no bridar garantía puedes escribir "Sin garantía"
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @enderror
            <h3>Garantía</h3>
            <small class="form-text text-muted">Brinda detalles si brindas garantía, esto le brindará cierta confianza al comprador</small>
            <input type="text" name="garantia" value="{{ old('garantia') }}" class="form-control" placeholder="Añade una descripción" id="validationCustom05" rows="2">
            <br>
        </div>
        {{-- Fin garantia --}}

        {{-- Inicio Precio inicial --}}
        <div class="col-sm-12 col-md-8 col-lg-7 col-xl-6">
            @error('precio_inicial')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              El precio debe estar entre 1,00 y 99,99
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @enderror
            <label for="formGroupExampleInput">Precio inicial</label><br>  
            <div class="input-group mb-3">
                <div class="input-group-prepend" id="button-addon3">
                    <button class="btn btn-outline-secondary" type="button">S/</button>
                    <button class="btn btn-outline-secondary" type="button">$</button>
                </div>
                <input type="text" name="precio_inicial" value="{{ old('precio_inicial') }}" class="form-control" placeholder="">
            </div>
        </div>
        {{-- Fin precio inicial --}}

        {{-- Fecha inicio subasta --}}
        <div class="col-sm-12 col-md-8 col-lg-7 col-xl-6">
            @error('inicio_subasta')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              Debes ingresar la fecha de inicio de subasta
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @enderror
            <div>
              <label for="form-group">Fecha de inicio de la subasta</label>
              <input type="date" value="{{ old('inicio_subasta') }}" name="inicio_subasta" min="2020-11-02" id="fechaInicio"><br><br>
            </div>
            
        </div>
        {{-- Fin fecha inicio subasta --}}

        {{-- Inicio fecha fin subasta --}}
        <div class="col-sm-12 col-md-8 col-lg-7 col-xl-6">
          @error('final_subasta')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              Debes ingresar la fecha de fin de subasta
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @enderror
          <div>
            <label for="form-group">Fecha de fin de la subasta</label>
            <input type="date" name="final_subasta" value="{{ old('final_subasta') }}" id=""><br><br>
          </div>
        </div>
        {{-- Fin fecha fin subasta --}}

        <div id="siguiente">
            <button type="submit" class="btn btn-success btn-block">Registrar Producto</button>
            <br><br>
        </div>
        </form>
      
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
