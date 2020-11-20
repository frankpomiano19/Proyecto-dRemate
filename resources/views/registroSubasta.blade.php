<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registro de Subasta</title>

        <!-- Styles -->
        <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/registro.css') }}" />

        <script src="js/jquery-3.5.1.js"></script>
        <script src="parsley.min.js"></script>
        
        
    </head>
    <body class="antialiased" >

        <div class="container-md border rounded-lg cuerpo">
            <h1 class="text-center">Registrar subasta</h1><br>
            <p id="parrafo"><br>Revisa la información del producto y llena los campos de la subasta para empezar :)<br><br></p>
            <div class="row">
                
                
                <!-- Aquí va la información del producto -->
                <div class="col-sm-12 col-md-6 col-lg-5">
                        <h2>Información del producto</h2><br>
                        <div class="col-sm-12">
                            
                            <label for="formGroupExampleInput"><h3>Categoría</h3></label><br>
                            <small  class="form-text text-muted">Escoja su categoría</small>
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
                            <small  class="form-text text-muted">Un buen título atrae más miradas</small>
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
                            <small class="form-text text-muted">Brinda todos los detalles de tu producto aquí</small>
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
                            <small class="form-text text-muted">Una imagen vale más que mil palabras</small>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" required>
                                <label class="custom-file-label" for="customFile">Selecciona tus imágenes</label>
                            </div>          
                            <br>
                            <div class="linea"></div>
                        </div>
                
                        <div class="col-sm-12">
                            <h3>Garantía</h3>
                            <small class="form-text text-muted">Brinda detalles de tu garantía o déjalo en blanco si no ofreces ninguna</small>
                            <textarea input type="text" class="form-control" placeholder="Añade una descripción" id="validationCustom05" rows="2"></textarea>
                            <br>
                        </div>
                        
                    <div id="center">
                        <a href="{{URL::to('registroProducto')}}" class="btn btn-primary">Editar</a>
                        <br><br>
                    </div>
                </div>
                
                <!--Columna separadora-->
                <div class="col-1 d-none d-lg-block">

                </div>

                <!-- Esta es la información de la subasta -->
                <div class="col-sm-12 col-md-6 col-lg-5">
                    <h2>Información de la subasta</h2><br>
                    <form novalidate data-parsley-validate>
                        
                        <div>
                            <label for="formGroupExampleInput"><h3>Precio inicial</h3></label>
                            <small class="form-text text-muted">Ingrese la cantidad en Soles (S/)</small>
                            <input data-parsley-type="email" class="form-control" id="precioInicial" placeholder="Precio inicial" data-parsley-required="true">
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
                            <input type="date" class="form-control" id="titulo" placeholder="Nombre del producto" required>
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
                            <input type="date" class="form-control" id="titulo" required>
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
                            <small class="form-text text-muted">Brinda todos los detalles de tu producto aquí</small>
                            <textarea input type="text" class="form-control" placeholder="Añade una descripción" id="validationCustom05" rows="4" required></textarea>
                            <div class="invalid-feedback">
                                Es necesaria una descripción
                            </div>
                        </div>
                
                        <div>
                            <h3>Ubicación</h3>
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
                            
                            <div class="invalid-feedback">
                                Complete los campos
                            </div>
                            <br>
                            <div class="linea"></div>
                        </div>

                        <div>
                            <h3>Agregar fotos</h3>
                            <small class="form-text text-muted">Una imagen vale más que mil palabras</small>
                            <div class="custom-file">
                                <input type="file"  class="custom-file" accept=".png, .jpeg" required>
                            </div>          
                            <br>
                            <div class="linea"></div>
                        </div>
                
                        <div>
                            <h3>Garantía</h3>
                            <small class="form-text text-muted">Brinda detalles de tu garantía o déjalo en blanco si no ofreces ninguna</small>
                            <textarea input type="text" class="form-control" placeholder="Añade una descripción" id="validationCustom05" rows="2"></textarea>
                            <br>
                        </div>
                
                        <div id="center">
                        
                        <!--Remplazar el # por la vista a donde debería llevar-->
                        <a href="{{URL::to('#')}}"><button type="submit" class="btn btn-primary">Siguiente</button></a>
                        <br><br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/producto.js') }}"></script>
    </body>
</html>
