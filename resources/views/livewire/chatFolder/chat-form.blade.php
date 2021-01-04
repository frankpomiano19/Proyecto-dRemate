<div>
    <div class="form-group">
        <label for="">Nombre</label>
        <input type="text" name="" id="name" wire:model="name">
        <h1>{{$name}}</h1>
    </div>

    <div class="form-group">
        <label for="">Mensaje</label>
        <input type="text" name="" id="message" wire:model="name">
    </div>

    <div id="avisoSucess" class="">Se ha enviado</div>

    <div>
        <h5 class="mt-3"> <strong>Lista de mensajes</strong>
            @foreach($messages as $message)
                <li>{{$message}}</li>
            @endforeach

        </h5>
    </div>


    <button class="btn btn-primary" wire:click="sendMessage">Enviar</button>
    <script>
        window.livewire.on('mensajeEnviado',function(){
            $("#avisoSucess").fadeIn("slow");
            setTimeout(function(){
                $("#avisoSucess").fadeOut("slow");
            },3000)
        });
    </script>

</div>
