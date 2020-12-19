{{-- @section('contenidoJS')
    <style>
        .cuerpo {
            margin-top: 80px;
            margin-bottom: 40px;
        }
        .uno {
            background-color: blueviolet;
        }
        .dos {
            background-color: red;
            height: 400px;
        }
    </style>


    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/jquery.countdown.package-2.1.0/js/jquery.plugin.min.js"></script>
    <script src="js/jquery.countdown.package-2.1.0/js/jquery.countdown.js"></script>
@endsection

<div class="container">
    
    <br><br>
    <div class="row">
        <div class="col-3">



            <h5>Precio desde</h5>
            @error('precioMin')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
            <input type="text" class="form-control" name="precioMin" wire:model="precioMin">

            <h5>Hasta</h5>
            @error('precioMax')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
            <input type="text" class="form-control" name="precioMax" wire:model="precioMax">

            <h5>Categoria</h5>
            @error('categoria')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
            <select name="categoria" class="form-control" id="" wire:model="categoria">
                <option value="1">Tecnología</option>
                <option value="2">Hogar</option>
                <option value="3">Electrodomésticos</option>
                <option value="4">Joyas</option>
                <option value="5">Instrumento musical</option>
            </select>

            <h5>Condicion</h5>
            @error('condicion')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
                <select class="form-control" name="condicion" id="" wire:model="condicion">
                    <option value="Nuevo" >Nuevo</option>
                    <option value="Usado">Usado</option>
                </select>

            <h5>Departamento</h5>
            @error('departamento')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
                <select name="selectDepartamento" onchange="cambia()" class="form-control mb-1" required=""
                data-parsley-error-message="Escoja su ubicación" wire:model="departamento">
                    <option value="" selected>Seleccionar</option>
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
                </select>
                <br><br>
        </div>

        <div class="col-9">
            <div class="row">
                <div class="col-12 mb-2">
                    @if($categoria==1)
                        <h5>Categoria: Tecnología > Condicion: {{ $condicion }} > Departamento: {{ $departamento }}</h5>
                    @elseif($categoria==2)
                        <h5>Categoria: Hogar > Condicion: {{ $condicion }} > Departamento: {{ $departamento }}</h5>
                    @elseif($categoria==3)
                        <h5>Categoria: Electrodomésticos > Condicion: {{ $condicion }} > Departamento: {{ $departamento }}</h5>
                    @elseif($categoria==4)
                        <h5>Categoria: Joyas > Condicion: {{ $condicion }} > Departamento: {{ $departamento }}</h5>
                    @else
                        <h5>Categoria: Instrumento Musical > Condicion: {{ $condicion }} > Departamento: {{ $departamento }}</h5>
                    @endif
                </div>
            </div>

            @if($productos->count())
                <div class="row">
            
                @foreach ($productos as $producto)
                    <div class="col-4">
                        <div class="card m-1 p-0">
                            <div class="card-body">
                                <h5 class="card-title">{{$producto->nombre_producto}}</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{$producto->ubicacion}}</li>
                                <li class="list-group-item">{{$producto->precio_inicial}}</li>
                                <li class="list-group-item">{{$producto->categoria_id}}</li>
                            </ul>
                            <div class="card-body">
                                <a href="#" class="card-link">{{$producto->condicion}}</a>
                                <a href="#" class="card-link">{{$producto->ubicacion}}</a>
                            </div>
                        </div>
                    </div>
                    
                @endforeach
                </div>
            @else
                <div class="text-center">
                    <h4 class="my-1">Ups, no existe producto con esas condiciones.</h4>
                    <img class="img-fluid my-3 animate__animated animate__bounceInLeft" src="{{ asset('img/undraw_Taken_re_yn20.svg') }}" style="width: 30%; heigth: 30%;" alt="insertar SVG con la etiqueta image">
                </div>
            @endif
        </div>
    </div>
</div>
@section('contenidoJSabajo')
    <script src="js/jsSubastaRapida.js"></script>
    <script src="js/jquery.chrony.js"></script>
    <script src="js/jquery.countdown.package-2.1.0/js/jquery.plugin.min.js"></script>
    <script src="js/jquery.countdown.package-2.1.0/js/jquery.countdown.js"></script>
    <script src="js/moment-2.29.1.js"></script>    
    <script src="{{ asset('js/producto.js') }}"></script>
@endsection --}}

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
                            <select style="color:white " wire:model="categoria" class="desplegable">
                                <option style="background: #c72d32;" value="1">Tecnología</option>
                                <option style="background: #c72d32;" value="2">Hogar</option>
                                <option style="background: #c72d32;" value="3">Electrodomésticos</option>
                                <option style="background: #c72d32;" value="4">Joyas</option>
                                <option style="background: #c72d32;" value="5">Instrumento musical</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <h5>Departamento</h5>
                        @error('departamento')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <!--Select-->
                        <div class="selector">
                            <select style="color:white " class="desplegable" wire:model="departamento">
                                <option style="background: #c72d32;" value="Amazonas">Amazonas</option>
                                <option style="background: #c72d32;" value="Ancash">Ancash</option>
                                <option style="background: #c72d32;" value="Apurímac">Apurímac</option>
                                <option style="background: #c72d32;" value="Arequipa">Arequipa</option>
                                <option style="background: #c72d32;" value="Ayacucho">Ayacucho</option>
                                <option style="background: #c72d32;" value="Cajamarca">Cajamarca</option>
                                <option style="background: #c72d32;" value="Callao">Callao</option>
                                <option style="background: #c72d32;" value="Cuzco">Cuzco </option>
                                <option style="background: #c72d32;" value="Huancavelica">Huancavelica</option>
                                <option style="background: #c72d32;" style="background: #c72d32;"n value="Huánuco">Huánuco</option>
                                <option style="background: #c72d32;" value="Ica">Ica</option>
                                <option style="background: #c72d32;" value="Junín">Junín</option>
                                <option style="background: #c72d32;" value="La_Libertad">La Libertad</option>
                                <option style="background: #c72d32;" value="Lambayeque">Lambayeque</option>
                                <option style="background: #c72d32;" value="Lima">Lima</option>
                                <option style="background: #c72d32;" value="Loreto">Loreto</option>
                                <option style="background: #c72d32;" value="Madre_de_Dios">Madre de Dios</option>
                                <option style="background: #c72d32;" value="Moquegua">Moquegua</option>
                                <option style="background: #c72d32;" value="Pasco">Pasco</option>
                                <option style="background: #c72d32;" value="Piura">Piura</option>
                                <option style="background: #c72d32;" value="Puno">Puno</option>
                                <option style="background: #c72d32;" value="San_Martín">San Martín</option>
                                <option style="background: #c72d32;" value="Tacna">Tacna</option>
                                <option style="background: #c72d32;" value="Tumbes">Tumbes</option>
                                <option style="background: #c72d32;" value="Ucayali">Ucayali</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <h5>Condicion</h5>
                        <!--Select-->
                        @error('condicion')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="selector" id="selector-ordenar" wire:model="condicion">
                            <select style="color:white " class="desplegable">
                                <option value="Nuevo" style="background: #c72d32;">Nuevo</option>
                                <option value="Usado" style="background: #c72d32;">Usado</option>
                            </select>
                        </div>
                    </div>

                    <div>

                        <h5>Precio mínimo</h5>
                        @error('precioMin')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="centrado"><input type="text" class="selector precio" name="precioMin" wire:model="precioMin"></div>


                        <h5>Precio máximo</h5>
                        @error('precioMax')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="centrado"><input type="text" class="selector precio" name="precioMax" wire:model="precioMax"></div>
                    </div>

                    
                </form>
            </div>
        </div>

        <div class="col-sm-12 col-lg-9">
            <div id="superior">
                
                <div class="row">
                    <div class="col-12">
                        @if($categoria==1)
                            <h5>Categoria: Tecnología > Condicion: {{ $condicion }} > Departamento: {{ $departamento }}</h5>
                        @elseif($categoria==2)
                            <h5>Categoria: Hogar > Condicion: {{ $condicion }} > Departamento: {{ $departamento }}</h5>
                        @elseif($categoria==3)
                            <h5>Categoria: Electrodomésticos > Condicion: {{ $condicion }} > Departamento: {{ $departamento }}</h5>
                        @elseif($categoria==4)
                            <h5>Categoria: Joyas > Condicion: {{ $condicion }} > Departamento: {{ $departamento }}</h5>
                        @else
                            <h5>Categoria: Instrumento Musical > Condicion: {{ $condicion }} > Departamento: {{ $departamento }}</h5>
                        @endif
                    </div>
                </div>
                

                {{-- <div style="clear: both"></div> --}}
            </div>
            @if($productos->count())
                @foreach ($productos as $producto)

                <div class="producto fix">
                    <div class="contenedor-imagen">
                        <img src="{{$producto->image_name1}}" alt="" class="imagen">
                    </div>
                    
                    <div class="texto"> 
                        <div class="titulo">          
                            <h3>{{$producto->nombre_producto}}</h3>
                            <i class="fa fa-heart cora"></i>                                
                        </div>
                        <h5>Precio inicial: S/ {{$producto->precio_inicial}}</h5>
                        <p class="texto-descripcion">
                            {{$producto->descripcion}}
                        </p>
                        <div class="ubicacion">
                            <h6>{{$producto->ubicacion}}</h6>
                            
                        </div> 
                    </div>  
                    
                    
                </div>
                <div class="abajo-producto"></div>
                @endforeach 
                @else
                <div class="text-center">
                    <h4 class="my-1">Ups, no existe producto con esas condiciones.</h4>
                    <img class="img-fluid my-3 animate__animated  animate__flash" src="{{ asset('img/undraw_Taken_re_yn20.svg') }}" style="width: 30%; heigth: 30%;" alt="insertar SVG con la etiqueta image">
                </div>
            @endif
                
            </div>
                  
        </div>
    </div>
</div>


