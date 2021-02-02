<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h3>Productos populares</h3>
        </div>
    </div>
    <div class="row my-3">

        <div class="col">
            <div>
                <select wire:model="categoria">
                    <option value="0">Todas</option>
                    <option value="1">Tecnología</option>
                    <option value="2">Hogar</option>
                    <option value="3">Electrodomésticos</option>
                    <option value="4">Joyas</option>
                    <option value="5">Instrumento musical</option>

                </select>
            </div>
        </div>

        <div class="col">
            <div>
                <select wire:model="orden">
                    <option value="asc">Ascendente</option>
                    <option value="desc">Descendente</option>
                </select>
            </div>
        </div>
        
    </div>

    <div class="row my-3">
        @foreach ($productos as $pro)
            <div class="col-3 border m-1">
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
        
                                                    @if($favoritoL == 1)
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
                    <a href="{{ route('producto.detalles', $pro->id) }}">{{ $pro->nombre_producto }}</a>
                    <p>Me gusta: {{ $pro->favorito }}</p>
                    <img src="{{ $pro->image_name1 }}" class="img-fluid">
            </div>
        @endforeach
    </div>
</div>
