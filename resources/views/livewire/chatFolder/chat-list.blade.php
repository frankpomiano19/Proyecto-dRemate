<div>
    @foreach($mensajes as $mensaje)

    @if($mensaje['idUsuario'] == Auth::user()->id)
    <div class="outgoing_msg">
        <div class="sent_msg">
            <p>{{$mensaje['mensaje']}}</p>
            {{-- <span class="time_date"></span> --}}
        </div>
    </div>
    @else
    <div class="incoming_msg">
        <div class="incoming_msg_img"> <img src="{{asset('img/assets/antique-1125467_1920.jpg')}}"
                alt="sunil"> </div>
        <div class="received_msg">
            <div class="received_withd_msg">
                <p>{{$mensaje['mensaje']}}</p>
                {{-- <span class="time_date"> 11:01 AM | Junio 9</span> --}}
            </div>
        </div>
    </div>
    @endif




    @endforeach


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