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
                        @if(count($productos) == 1)
                            <h5>Se encontró 1 producto</h5>                        
                        @else
                            <h5>Se encontraron {{ count($productos) }} productos</h5>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>{{$producto->nombre_producto}}</h3>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-2">
                                    @auth
                                    <form method="POST" enctype="multipart/form-data" action="{{ route('producto.favorito') }}">
                                        {{ csrf_field() }}
                                                @csrf
                                                <input type="hidden" name="favorito" value={{ $producto->id }}>
        
                                                    @foreach ($favs as $fav)
        
                                                        @if ($fav == $producto->id)
                                                            <?php
                                                                $favoritoL = 1;
                                                            ?>
                                                            @break
                                                        @else
                                                            <?php
                                                                $favoritoL = 0;
                                                            ?>
                                                        @endif
        
                                                    @endforeach
        
                                                    @if($favoritoL == 1)
                                                                
                                            <button type="submit" class="btn" data-toggle="tooltip" data-placement="bottom" title="Quitar de favorito"><div id="heart-icon-active"></div></button>
                                            
                                          @else
                                            <button type="submit" class="btn" data-toggle="tooltip" data-placement="bottom" title="Agregar como favorito"><div id="heart-icon-noActive"></div></button>
                                          @endif   
                                        </form>
                                    @else
                                        <button type="" class="btn" data-toggle="tooltip" data-placement="bottom" title="Agregar como favorito"><img src="{{asset('img/assets/corazonR.png')}}"></button>
                                    @endauth
                                </div>
                            </div>                              
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


