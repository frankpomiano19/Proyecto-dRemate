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
            <form class="needs-validation"  method="POST" action="{{ route('producto.registroe')}}" enctype="multipart/form-data" novalidate>
            @csrf
            <h1 class="text-center">Registro de producto</h1><br>
            <p id="parrafo"><br>Primero registra tu producto para mostrarlo a los usuarios<br></p>
            
            <div class="linea"></div>
    
            <div class="col-sm-12 col-md-8 col-lg-7 col-xl-6">
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
                    Seleccione una categoría
                </div>
                <br>
                <div class="linea"></div>
            </div>
    
            <div class="col-sm-12 col-md-8 col-lg-7 col-xl-6">
                <label for="formGroupExampleInput"><h3>Título</h3></label><br>
                <small  class="form-text text-muted">Un buen título atrae más miradas</small>
                <input type="text" name="nombre" class="form-control" id="titulo" placeholder="Nombre del producto" required>
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
                <small class="form-text text-muted">Brinda todos los detalles de tu producto aquí</small>
                <textarea input type="text" name="descripcion" class="form-control" placeholder="Añade una descripción" id="validationCustom05" rows="4" required></textarea>
                <div class="invalid-feedback">
                    Es necesaria una descripción
                </div>
            </div>
            
            <div class="col-sm-12 col-md-8 col-lg-7 col-xl-6">
                <h3>Estado</h3>
                <select name="estado">
                    <option value="Disponible" selected>Disponible</option> 
                    <option value="No disponible">No disponible</option>
                    <option value="En curso">En curso</option>
                </select>
                <br><br>
                <div class="linea"></div>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-7 col-xl-6">
                <h3>Condicion</h3>
                <select name="condicion">
                    <option value="Nuevo" selected>Nuevo</option> 
                    <option value="Usado">No Usado</option>
                </select>
                <br><br>
                <div class="linea"></div>
            </div>
    
            <div class="col-12">
                <h3>Ubicación</h3>
                <small  class="form-text text-muted">¿Dónde se encuentra su producto?</small>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15607.301886182962!2d-77.08160471552735!3d-12.055526440052137!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2spe!4v1605044901305!5m2!1ses!2spe" id="mapa" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                <div class="invalid-feedback">
                    Not nice >:v
                </div>
                <div class="valid-feedback">
                    Nice!
                </div>
                <br>
                <div class="linea"></div>
            </div>
    
            <div class="col-sm-12 col-md-8 col-lg-7 col-xl-6">
                <h3>Agregar fotos</h3>
                <small class="form-text text-muted">Una imagen vale más que mil palabras</small>
                <div class="custom-file">
                    <input type="file" name="imagen" class="custom-file-input" required>
                    <label class="custom-file-label" for="customFile">Selecciona tus imágenes</label>
                    </div>          
                <br>
                <div class="linea"></div>
            </div>
    
            <div class="col-sm-12 col-md-8 col-lg-7 col-xl-6">
                <h3>Garantía</h3>
                <small class="form-text text-muted">Brinda detalles de tu garantía o déjalo en blanco si no ofreces ninguna</small>
                <textarea input type="text" name="garantia" class="form-control" placeholder="Añade una descripción" id="validationCustom05" rows="2"></textarea>
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
