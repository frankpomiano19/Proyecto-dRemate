<div class="container" id="cuerpo">
    <h1>Productos Populares</h1>
    <br>
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div id="categoria">
                <div class="input-ordenar-por">
                    <form action="">
                        <div class="select">
                            <select name="slct" id="slct" wire:model="categoria">
                              <option value="0">Todas</option>
                              <option value="1">Tecnología</option>
                              <option value="2">Hogar</option>
                              <option value="3">Electrodomésticos</option>
                              <option value="4">Instrumentos musicales</option>
                              <option value="5">Hogar</option>
                            </select>
                          </div>
                    </form>
                </div>            
                <div class="texto-ordenar-por">Categoría&nbsp;</div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="ordenar-por">
                <div class="input-ordenar-por">
                    <form action="">
                        <div class="select">
                            <select name="slct" id="slct" wire:model="orden">
                              <option value="asc">Menos populares</option>
                              <option value="desc">Más populares</option>
                            </select>
                          </div>
                    </form>
                </div>            
                <div class="texto-ordenar-por">Ordenar por&nbsp;</div>
            </div>
        </div>
    </div>

    {{-- Lista de productos --}}
    <div id="lista-productos">
        {{-- <div class="row">
            <div class="col-sm-12 col-lg-6"> --}}

                <div class="row">

                    @foreach ($productos as $pro)

                    <div class="col-6">
                    
                    @auth

                    <form method="POST" enctype="multipart/form-data" action="{{ route('producto.favorito') }}">
                        {{ csrf_field() }}
                        @csrf
                        <input type="hidden" name="favorito" value={{ $pro->id }}>
                        @foreach ($favs as $fav)
        
                            @if ($fav == $pro->id)
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
                        
                        <div class="producto fix my-2">
                            <div class="contenedor-imagen">
                                <div style="width: 100%; height: 100%;" class="flex">
                                    <img src="{{ $pro->image_name1 }}" alt="pic-auction" class="imagen-sub">
                                </div>
                            </div>
                            
                            <div class="texto"> 
                                <div class="titulo row">
                                    <div class="row">
                                        <div class="col"><h3><a href="{{ route('producto.detalles', $pro->id) }}">{{ $pro->nombre_producto }}</a></h3></div>
                                        <div class="col float-right">@if($favoritoL == 1)
                                            <input type="hidden" name="fav" value="0"> 
                                            <button type="submit" class="btn" data-toggle="tooltip" data-placement="bottom" title="Quitar de favorito"><img src="{{asset('img/assets/corazon.png')}}"></button>
                                                            
                                        @else
                                            <input type="hidden" name="fav" value="1">
                                            <button type="submit" class="btn" data-toggle="tooltip" data-placement="bottom" title="Agregar como favorito"><img src="{{asset('img/assets/corazonR.png')}}"></button>
                                        @endif
                    </form>
                    @else
                            <button type="" class="btn" data-toggle="tooltip" data-placement="bottom" title="Agregar como favorito"><img src="{{asset('img/assets/corazonR.png')}}"></button>
                    @endauth
                    {{ $pro->favorito }} Me gusta</div>
                    </div>
                                    
                    
                    </div>
                        <h5>S/ {{ $pro->precio_inicial }}</h5>
                        <p class="texto-descripcion">
                            {{ $pro->descripcion }}<br>
                        </p>
                        <div class="ubicacion">
                            {{ $pro->ubicacion }}, {{ $pro->distrito }}
                        </div> 
                    </div>  
                </div>
                    
                
                    </div>
                    @endforeach
                </div>

            {{-- </div>
            
        </div> --}}
    </div>
    

</div>

