<div class="type_msg">
    <div class="input_msg_write">
        <input type="text" class="write_msg" name="messageForm" wire:model="message" placeholder="Inserte su mensaje">

        <button class="msg_send_btn" type="button" wire:click="sendMessage" wire:loading.attr="disabled" wire:offline.attr="disabled"><i class="fa fa-paper-plane-o"
                aria-hidden="true"></i></button>
                @error('message')
                <small class="text-danger">{{$message}}</small>
            @enderror
    
    </div>
</div>

{{-- <input type="text" name="idUsuarioForm" wire:model="idUsuario" value="{{ Auth::user()->id }}" placeholder="id"> --}}

<div>
    <div class="form-group" style="display: none;">
        <input type="hidden" name="nameForm" id="nameForm" wire:model="name">
        @error('name')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>

    {{-- <div>
        <h5 class="mt-3"> <strong>Lista de mensajes</strong>
            @foreach($messages as $message)
                <li>{{$message}}</li>
            @endforeach

        </h5>
    </div> --}}


    {{-- <button class="btn btn-primary">Enviar</button> --}}
    <script>
        window.livewire.on('mensajeEnviado',function(){
            $("#avisoSucess").fadeIn("slow");
            setTimeout(function(){
                $("#avisoSucess").fadeOut("slow");
            },100)
        });
    </script>

</div>
