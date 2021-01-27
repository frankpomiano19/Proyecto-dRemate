<div class="container">
    <br><br>
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
            <div class="col-3">
                <p>Nombre: {{ $pro->nombre_producto }}, MG: {{ $pro->favorito }}</p>
            </div>
        @endforeach
    </div>
</div>
