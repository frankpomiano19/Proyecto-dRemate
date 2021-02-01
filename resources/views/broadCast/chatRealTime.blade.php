@extends('layouts.app')


@section('cont_cabe')
    <title>Subtitulo - dRemate</title>

@endsection

@section('contenidoJS')

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>


@endsection

@section('contenidoCSS')

    <link rel="stylesheet" href="{{ asset('css/styleChatRealTime.css') }}">

@endsection


@section('contenido')
    <br>
    <br>
    <br>
    {{-- <h1>Pusher</h1> --}}


    {{-- <ul id="myList">
        <li>Primer mensaje</li>
    </ul> --}}
    <h3 class=" text-center">Mensajes</h3>
    <div class="row left-side">
        <div class="col-md-6">
            <div class="row col-md-12 d-flex justify-content-center">
                <img src="{{ $producto->image_name1 }}" class="img-formated" alt="">

            </div>
            <hr class="linea-divisora-medio">
            <div class="row col-md-12 py-3">
                <p class="text-align-center" for="">Precio base de S/{{ $producto->precio_inicial }}</p>
            </div>

            <div class="row col-md-12">
            </div>

            <div class="row col-md-12">
            </div>


            <div class="row container">
                <div class="col-md-6">
                    <label for="" class="label-fuerte">Producto : </label> <label>{{ $producto->nombre_producto }}</label>
                </div>
                <div class="col-md-6">
                    <label for="" class="label-fuerte">Condicion : </label> <label>{{ $producto->condicion }}</label>
                </div>
            </div>
            <hr class="linea-divisora-medio">
            <div class="row">
                <div class="col-md-6">
                    <label for="" class="label-fuerte">Garantia : </label> <label>{{ $producto->garantia }}</label>
                </div>
                <div class="col-md-6">
                    <label for="" class="label-fuerte">Precio base : </label> <label>{{ $producto->precio_inicial }}</label>
                </div>
            </div>
            <hr class="linea-divisora-medio">
            <div class="row ">
                <div class="col-md-12 d-flex justify-content-center">
                    <label for="" class="label-fuerte">Descripcion </label>
                </div>
            </div>
            <p class="text-center">{{ $producto->descripcion }}</p>
        </div>

        <div class="col-md-6">
            <div class="inbox_msg">
                <div class="mesgs">
                    <div class="msg_history">
                        <div class="text-danger">Todos los mensajes en el chat NO SE GRABAN, se pierden cuando se actualiza
                            o cierra la pagina</div>
                        {{-- mensaje recibido --}}
                        <div class="incoming_msg">
                            <div class="incoming_msg_img"> <img src="{{ asset('img/assets/antique-1125467_1920.jpg') }}"
                                    alt="sunil"> </div>
                            <div class="received_msg">
                                <div class="received_withd_msg">
                                    <p class="text-muted">Inserte mensaje</p>
                                    <span class="time_date"> Sistema</span>
                                </div>
                            </div>
                        </div>


                        {{-- Mensaje enviado --}}
                        <div class="outgoing_msg">
                            <div class="sent_msg">
                                <p>Inserte mensaje</p>
                                <span class="time_date"> Sistema</span>
                        </div>
                        </div>

                        @livewire("chat-list",['nombreProducto'=>$producto])


                    </div>
                    {{-- Entrada de mensaje --}}
                    @livewire("chat-form")
                </div>
            </div>
            <div class="cuadro-1">

                <div class="row col-md-12 d-flex justify-content-around">
                    <h2>Comandos</h2>
                </div>
                <div>
                    <div>
                        <div class="row col-md-12 py-2 d-flex justify-content-around">
                            <a href="{{ url('/') }}" class="btn btn-danger btn-rojo-comu">Terminar Conversacion</a>
                            {{-- <button class="btn btn-primary btn-rojo-mens">Iniciar Negociacion</button> --}}
                        </div>

                    </div>
                </div>
            </div>



        </div>
    </div>



@endsection

@section('contenidoJSabajo')


    {{-- <script>
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
            const message = data.data
            var node = document.createElement("li");
            var textnode = document.createTextNode(message.user + "=>" + message.message);
            node.appendChild(textnode);
            // document.getElementById("myList").appendChild(node);
            document.getElementsByClassName('msg_history')[0].appendChild(node);

        });

    </script> --}}

    {{-- Para enviar mensaje --}}

    <script>

    </script>
@endsection
