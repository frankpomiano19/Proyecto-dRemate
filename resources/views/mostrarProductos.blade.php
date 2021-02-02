@extends('layouts.app')


@section('cont_cabe')
    <title>Subasta rapida - dRemate</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('contenidoJS')

    <link rel="stylesheet" href="css/mostrarProductos.css">

    <!-- Colocar js-->
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/jquery.countdown.package-2.1.0/js/jquery.plugin.min.js"></script>
    <script src="js/jquery.countdown.package-2.1.0/js/jquery.countdown.js"></script>
@endsection

@section('contenidoCSS')
    <link rel="stylesheet" href="css/styleSubastaRapida.css">
@endsection

@section('contenido')

    <div class="container-lg cuerpo">
        <div class="row">
            <div class="col-3 d-none d-md-block">                
                <div id="filtro">
                    <div id="texto-filtro">
                        <h4 id="titulo">Filtros</h4>
                    </div>
                    <form>
                        <div>
                            <h5>Categoría</h5>
                            <!--Select-->
                            <div class="selector">
                                <select id="select_id" style="display:none"></select>
                                <div class="desplegable">
                                    <p>Mostrar todo</p>
                                </div>
                                <ul class="menu">
                                    <li class="sup">Mostrar todo</li>
                                    <li>Tecnología</li>
                                    <li>Hogar</li>
                                    <li>Electrodomésticos</li>
                                    <li>Joyas</li>
                                    <li>Instrumentos musicales</li>
                                    </ul>
                            </div>
                        </div>

                        <div>
                            <h5>Ubicación</h5>
                            <!--Select-->
                            <div class="selector">
                                <select id="select_id" style="display:none"></select>
                                <div class="desplegable">
                                    <p>Mostrar todos</p>
                                </div>
                                <ul class="menu">
                                    <li value="" selected>Mostrar todos</li>
                                    <li value="Amazonas">Amazonas</li>
                                    <li value="Ancash">Ancash</li>
                                    <li value="Apurímac">Apurímac</li>
                                    <li value="Arequipa">Arequipa</li>
                                    <li value="Ayacucho">Ayacucho</li>
                                    <li value="Cajamarca">Cajamarca</li>
                                    <li value="Callao">Callao</li>
                                    <li value="Cuzco">Cuzco </li>
                                    <li value="Huancavelica">Huancavelica</li>
                                    <li value="Huánuco">Huánuco</li>
                                    <li value="Ica">Ica</li>
                                    <li value="Junín">Junín</li>
                                    <li value="La_Libertad">La Libertad</li>
                                    <li value="Lambayeque">Lambayeque</li>
                                    <li value="Lima">Lima</li>
                                    <li value="Loreto">Loreto</li>
                                    <li value="Madre_de_Dios">Madre de Dios</li>
                                    <li value="Moquegua">Moquegua</li>
                                    <li value="Pasco">Pasco</li>
                                    <li value="Piura">Piura</li>
                                    <li value="Puno">Puno</li>
                                    <li value="San_Martín">San Martín</li>
                                    <li value="Tacna">Tacna</li>
                                    <li value="Tumbes">Tumbes</li>
                                    <li value="Ucayali">Ucayali</li>
                                </ul>
                            </div>
                        </div>

                        <div>
                            <h5>Estado</h5>
                            <!--Select-->
                            <div class="selector" id="selector-ordenar">
                                <select id="select_id" style="display:none"></select>
                                <div class="desplegable">
                                    <p>Mostrar todos</p>
                                </div>
                                <ul class="menu">
                                <li class="sup">Mostrar todos</li>
                                <li>Nuevo</li>
                                <li>Usado</li>
                                </ul>
                            </div>
                        </div>

                        <div>
                            <h5>Precio mínimo</h5>
                            <div class="centrado"><input type="number" class="selector precio" min="0" max="99999999"></div>
                            <h5>Precio máximo</h5>
                            <div class="centrado"><input type="number" class="selector precio" min="0" max="99999999"></div>
                        </div>

                        
                    </form>
                </div>
            </div>

            <div class="col-sm-12 col-lg-9">
                <div id="superior">

                    <div id="desplegable-select">
                        <div class="selector">
                            <select id="select_id" style="display:none"></select>
                            <div class="desplegable">
                                <p>Relevancia</p>
                            </div>
                            <ul class="menu">
                                <li>Relevancia</li>
                                <li class="sup">Menor precio</li>
                                <li>Mayor precio</li>
                                <li>Menor tiempo</li>
                                <li>Mayor tiempo</li>
                            </ul>
                        </div>   
                    </div>
                    
                    <div id="ordenar-por">
                        Ordenar por
                    </div>
                    <div id="cantidad-resultados">
                        <h4>Se encontraron 654 resultados</h4>
                    </div>
                    

                    <div style="clear: both"></div>
                </div>

                <div class="lista-productos">
                    <div class="producto fix">
                        <div class="contenedor-imagen">
                            <img src="img/assets/subasta4.jpg" alt="" class="imagen">
                        </div>
                        
                        <div class="texto"> 
                            <div class="titulo">          
                                <h3>Mazo</h3>
                                <i class="fa fa-heart cora"></i>                                
                            </div>
                            <h5>S/321</h5>
                            <p class="texto-descripcion">
                                Lorem ipsum dolor sit amet...
                            </p>
                            <p>2 días, 22:51:51</p>
                            <div class="ubicacion">
                                Surco, Lima
                            </div> 
                        </div>  
                        
                    </div>  
                    <div class="abajo-producto"></div>

                    <div class="producto fix">
                        <div class="contenedor-imagen">
                            <img src="img/assets/car-718781_1920.jpg" alt="" class="imagen">
                        </div>
                        
                        <div class="texto"> 
                            <div class="titulo">          
                                <h3>Mazo</h3>
                                <i class="fa fa-heart cora"></i>                                
                            </div>
                            <h5>S/321</h5>
                            <p class="texto-descripcion">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                            </p>
                            <p>2 días, 22:51:51</p>
                            <div class="ubicacion">
                                Callao, Lima
                            </div>           
                        </div>            
                    </div>
                    <div class="abajo-producto"></div> 

                    <div class="producto fix">
                        <div class="contenedor-imagen">
                            <img src="img/assets/subasta_3.png" alt="" class="imagen">
                        </div>
                        
                        <div class="texto"> 
                            <div class="titulo">          
                                <h3>Mazo</h3>
                                <i class="fa fa-heart cora"></i>                                
                            </div>
                            <h5>S/321</h5>
                            <p class="texto-descripcion">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                            </p>
                            <p>2 días, 22:51:51</p>
                            <div class="ubicacion">
                                Callao, Lima
                            </div>           
                        </div>            
                    </div>
                    <div class="abajo-producto"></div> 

                    <div class="producto fix">
                        <div class="contenedor-imagen">
                            <img src="img/assets/subasta_3.png" alt="" class="imagen">
                        </div>
                        
                        <div class="texto"> 
                            <div class="titulo">          
                                <h3>Mazo</h3>
                                <i class="fa fa-heart cora"></i>                                
                            </div>
                            <h5>S/321</h5>
                            <p class="texto-descripcion">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                            </p>
                            <p>2 días, 22:51:51</p>
                            <div class="ubicacion">
                                Callao, Lima
                            </div>           
                        </div>            
                    </div>
                    <div class="abajo-producto"></div> 
                    
                </div>

                
                      
            </div>
        </div>

        <div class="row">
            <div id="centro-pie">
                <div id="pie">
                    <span>
                        &lt&ltAnterior
                    </span>
                    <span class="numeros">
                        1
                    </span>                      
                    <span class="numeros">
                        2
                    </span>                       
                    <span class="numeros">
                        3
                    </span>                
                    <span id="sig">
                        Siguiente&gt&gt
                    </span> 
                </div>                 
            </div>
        </div>

    </div>

@endsection

@section('contenidoJSabajo')
    <script src="js/jsSubastaRapida.js"></script>
    <script src="js/jquery.chrony.js"></script>
    <script src="js/jquery.countdown.package-2.1.0/js/jquery.plugin.min.js"></script>
    <script src="js/jquery.countdown.package-2.1.0/js/jquery.countdown.js"></script>
    <script src="js/moment-2.29.1.js"></script>    
    <script src="{{ asset('js/producto.js') }}"></script>
    <script>

        $(document).ready(function(){
            $(".desplegable").click(function(){
                let clase = $(this);
                $(clase).closest(".selector").find("ul").toggleClass("showMenu");
                $(clase).closest(".selector").find("ul.menu > li").click(function(){
                    $(clase).closest(".selector").find("div.desplegable > p").html($(this).html());
                    $(clase).closest(".selector").find("ul.menu").removeClass("showMenu");
                });
            });
        });

    </script>
@endsection
