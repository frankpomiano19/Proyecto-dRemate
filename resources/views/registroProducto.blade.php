<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registro de producto</title>

        <!-- Styles -->
        <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <style type="text/css">
            body{
                background-color: #0093E9;
                background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
            }
            .cuerpo{
                margin-top: 20px;
                margin-bottom: 20px;
                background-color: #fff;
                width: 90%;
            }
            .linea{
                border-top:solid 1px #d9e3e8;
                width:100%;
                height:10px;
            }
            #parrafo{
                margin-left: 20px;
            }
            #siguiente{
                float: none;
                text-align: center;
            }
            #mapa{
                width: 100%;
                height: 400px;

            }
        </style>
        
    </head>
    <body class="antialiased" >
        <div class="container-md border rounded-lg cuerpo">
            <form class="needs-validation" method="POST"  action="{{ route('producto.registroe')}}" novalidate>
            @csrf
            <h1 class="text-center">Registro de producto</h1><br>
            <p id="parrafo"><br>Primero registra tu producto para mostrarlo a los usuarios<br></p>
            
            <div class="linea"></div>
            @error('precio_inicial')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    El precio debe estar entre 1,00 y 99,99
                    Vuelve a ingresar una imagen
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
            @enderror
            @error('inicio_subasta')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Debes ingresar la fecha de inicio de subasta
                    Vuelve a ingresar una imagen
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
            @enderror
            @error('final_subasta')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Debes ingresar la fecha de fin de subasta
                    Vuelve a ingresar una imagen
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
            @enderror
    
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
    
            <div class="col-sm-12 col-md-8 col-lg-7 col-xl-6">
                <label for="formGroupExampleInput"><h3>Título</h3></label><br>
                @error('nombre_producto')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Brinda un buen nombre de tu producto
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @enderror
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
    
            <div class="col-sm-12 col-md-8 col-lg-7 col-xl-6 form-group">
                <h3>Descripción</h3>
                @error('descripcion')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Brinda una mejor descripción de tu producto
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @enderror
                <small class="form-text text-muted">Brinda todos los detalles de tu producto aquí</small>
                <input type="text" name="descripcion" value="{{ old('descripcion') }}" class="form-control" placeholder="Añade una descripción" id="" rows="4">
                <div class="invalid-feedback">
                    Es necesaria una descripción
                </div>
            </div>
            
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
                <br><br>
                <div class="linea"></div>
            </div>

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
            <div class="col-sm-12 col-md-8 col-lg-7 col-xl-6">
                <h3>Condicion</h3>
                <select class="form-control" name="condicion">
                    <option value="Nuevo" selected>Nuevo</option> 
                    <option value="Usado">Usado</option>
                </select>
                <br><br>
                <div class="linea"></div>
            </div>
    
            <div class="col-sm-12 col-md-8 col-lg-7 col-xl-6">
                <h3>Agregar fotos</h3>
                <small class="form-text text-muted">Una imagen vale más que mil palabras</small>
                @error('imagen')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Comparte cómo se ve tu producto. Max tamaño: 2MB
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @enderror
                <div class="custom-file">
                    <input type="file" name="imagen" value="{{ old('imagen') }}" class="custom-file-input">
                    <label class="custom-file-label" for="customFile">Selecciona tus imágenes</label>
                </div>          
                <br>
                <div class="linea"></div>
            </div>
    
            <div class="col-sm-12 col-md-8 col-lg-7 col-xl-6">
                <h3>Garantía</h3>
                @error('garantia')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    La garantia es requerida
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @enderror
                <small class="form-text text-muted">Brinda detalles de tu garantía, esto le brindará cierta confianza al comprador</small>
                <input type="text" name="garantia" value="{{ old('garantia') }}" class="form-control" placeholder="Añade una descripción" id="validationCustom05" rows="2">
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
