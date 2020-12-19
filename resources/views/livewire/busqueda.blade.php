<div style="text-align: center">
    <br><br><br>
    <input
        wire:model="search"
        class = "forms-control"
        type="text"
        placeholder="buscar"
        value={{$search}}    
    >
    {{-- <button wire:click="increment">+</button>
    <h1>{{ $count }}</h1> --}}
    <br><br><br><br>
    <p>{{ $search }}</p>

    

    @if($productos->count())
    <div>
        <div>Hay resultados</div>
        @foreach ($productos as $producto)

            <div class="row">
                <div class="col-12 mx-2">
                    <div class="card" style="">
                        <div class="card-body">
                            <h5 class="card-title">{{$producto->nombre_producto}}</h5>
                            <p class="card-text">{{$producto->descripcion}}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{$producto->ubicacion}}</li>
                            <li class="list-group-item">{{$producto->distrito}}</li>
                            <li class="list-group-item">{{$producto->precio_inicial}}</li>
                            <li class="list-group-item">{{$producto->categoria_id}}</li>
                        </ul>
                        <div class="card-body">
                        <a href="#" class="card-link">Nada</a>
                        <a href="#" class="card-link">Comprar</a>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
    @else
    <div>
        Nel no hay resultados
    </div>
    @endif
</div>