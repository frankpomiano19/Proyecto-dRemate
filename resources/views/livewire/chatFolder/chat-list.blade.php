<div class="mt-3">

    <h3><strong>Últimos 5 mensajes</strong></h3>    

    @foreach($mensajes as $mensaje)
        <li class="alert alert-warning">{{$mensaje['mensaje']}} - {{$mensaje['usuario']}}</li>
    @endforeach

    <div class="card">        
        <div class="card-body">
        </div>
    </div>    

    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
  
        var pusher = new Pusher('{{env('PUSHER_APP_KEY')}}', {
            cluster: '{{env('PUSHER_APP_CLUSTER')}}',
            forceTLS: true
        });
        
        var channel = pusher.subscribe('canal-chat');
        
        channel.bind('my-event', function(data) {            
            window.livewire.emit('mensajeRecibido', data);
        });
        
        // setTimeout(function(){ window.livewire.emit('solicitaUsuario'); }, 100);
    </script>

</div>




{{-- <div>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
        var pusher = new Pusher('3bac7671fc18cafa7fe4', {
            cluster: 'us2',
            forceTLS: true
        });
    
        var channel = pusher.subscribe('canal-chat');
        channel.bind('my-event', function(data) {
            // alert(JSON.stringify(data));
            // console.log(data.data)
            //  alert(JSON.stringify(data));
            // const message = data.data
            // var node = document.createElement("li");
            // var textnode = document.createTextNode(message.user + "=>" + message.message);
            // node.appendChild(textnode);
            // // document.getElementById("myList").appendChild(node);
            // document.getElementsByClassName('msg_history')[0].appendChild(node);
            window.livewire.emit("mensajeRecibido",data);
        });
    
    </script>
</div> --}}