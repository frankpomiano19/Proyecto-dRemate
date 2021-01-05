@extends('layouts.app')


@section('cont_cabe')
    <title>Subtitulo - dRemate</title>

@endsection

@section('contenidoJS')

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>


@endsection

@section('contenidoCSS')
    @livewireStyles

    <link rel="stylesheet" href="{{asset('css/styleChatRealTime.css')}}">
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
    <div class="row">
        <div class="col-md-6">
            <div class="row col-md-12 d-flex justify-content-center" >
                <img src="{{$producto->image_name1}}" class="img-formated" alt="">
                
            </div>
            <hr class="linea-divisora-medio">
            <div class="row col-md-12 py-3">
                <p class="text-align-center" for="">Precio base de S/{{$producto->precio_inicial}}</p>
            </div>
            
            <div class="row col-md-12">
                <ul style="color: red; font-size:0.8em;">
                    <li>Este producto permite ser negociado tomando como precio incial al precio base</li>
                    <li>Cuando presiones el boton "Establecer comunicacion" se le mandara una notificacion al vendedor, para ir a un chat y negociar</li>
                </ul>
            </div>
            
            <div class="row col-md-12">
            </div>
            

            <div class="row container">
                <div class="col-md-6">
                    <label for="" class="label-fuerte">Producto :  </label> <label>{{$producto->nombre_producto}}</label>
                </div>
                <div class="col-md-6">
                    <label for="" class="label-fuerte">Condicion :  </label> <label>{{$producto->condicion}}</label>    
                </div>
            </div>
            <hr class="linea-divisora-medio">
            <div class="row">
                <div class="col-md-6">
                    <label for="" class="label-fuerte">Garantia :  </label> <label>{{$producto->garantia}}</label>
                </div>
                <div class="col-md-6">
                    <label for="" class="label-fuerte">Precio base :  </label> <label>{{$producto->precio_inicial}}</label>
                </div>
            </div>                    
            <hr class="linea-divisora-medio">
            <div class="row ">
                <div class="col-md-12 d-flex justify-content-center">
                    <label for="" class="label-fuerte">Descripcion  </label>
                </div>                    
            </div>
            <p class="text-center">{{$producto->descripcion}}</p>
        </div>

        <div class="col-md-6">
            <div class="inbox_msg">



                {{-- <div class="inbox_people">
                    <div class="headind_srch">
                        <div class="recent_heading">
                            <h4>Recent</h4>
                        </div>
                        <div class="srch_bar">
                            <div class="stylish-input-group">
                                <input type="text" class="search-bar" placeholder="Search">
                                <span class="input-group-addon">
                                    <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="inbox_chat">
                        <div class="chat_list active_chat">
                            <div class="chat_people">
                                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png"
                                        alt="sunil"> </div>
                                <div class="chat_ib">
                                    <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                    <p>Test, which is a new approach to have all solutions
                                        astrology under one roof.</p>
                                </div>
                            </div>
                        </div>
                        <div class="chat_list">
                            <div class="chat_people">
                                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png"
                                        alt="sunil"> </div>
                                <div class="chat_ib">
                                    <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                    <p>Test, which is a new approach to have all solutions
                                        astrology under one roof.</p>
                                </div>
                            </div>
                        </div>
                        <div class="chat_list">
                            <div class="chat_people">
                                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png"
                                        alt="sunil"> </div>
                                <div class="chat_ib">
                                    <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                    <p>Test, which is a new approach to have all solutions
                                        astrology under one roof.</p>
                                </div>
                            </div>
                        </div>
                        <div class="chat_list">
                            <div class="chat_people">
                                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png"
                                        alt="sunil"> </div>
                                <div class="chat_ib">
                                    <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                    <p>Test, which is a new approach to have all solutions
                                        astrology under one roof.</p>
                                </div>
                            </div>
                        </div>
                        <div class="chat_list">
                            <div class="chat_people">
                                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png"
                                        alt="sunil"> </div>
                                <div class="chat_ib">
                                    <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                    <p>Test, which is a new approach to have all solutions
                                        astrology under one roof.</p>
                                </div>
                            </div>
                        </div>
                        <div class="chat_list">
                            <div class="chat_people">
                                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png"
                                        alt="sunil"> </div>
                                <div class="chat_ib">
                                    <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                    <p>Test, which is a new approach to have all solutions
                                        astrology under one roof.</p>
                                </div>
                            </div>
                        </div>
                        <div class="chat_list">
                            <div class="chat_people">
                                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png"
                                        alt="sunil"> </div>
                                <div class="chat_ib">
                                    <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                    <p>Test, which is a new approach to have all solutions
                                        astrology under one roof.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}



                <div class="mesgs">
                    <div class="msg_history">
                        {{-- mensaje recibido --}}
                        <div class="incoming_msg">
                            <div class="incoming_msg_img"> <img src="{{asset('img/assets/antique-1125467_1920.jpg')}}"
                                    alt="sunil"> </div>
                            <div class="received_msg">
                                <div class="received_withd_msg">
                                    <p>Hola mascota como tas</p>
                                    <span class="time_date"> 11:01 AM | Junio 9</span>
                                </div>
                            </div>
                        </div>
                        <div class="incoming_msg">
                            <div class="incoming_msg_img"> <img src="{{asset('img/assets/antique-1125467_1920.jpg')}}"
                                    alt="sunil"> </div>
                            <div class="received_msg">
                                <div class="received_withd_msg">
                                    <p>Aea manito</p>
                                    <span class="time_date"> 11:01 AM | Junio 9</span>
                                </div>
                            </div>
                        </div>


                        {{-- Mensaje enviado --}}
                        <div class="outgoing_msg">
                            <div class="sent_msg">
                                <p>Calla mascota</p>
                                <span class="time_date"> 11:01 AM | Junio 9</span>
                            </div>
                        </div>
                    </div>
                    {{-- Entrada de mensaje --}}
                    <div class="type_msg">
                        <div class="input_msg_write">
                            <input type="text" class="write_msg" placeholder="Inserte su mensaje" />
                            <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o"
                                    aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <br>
                    <br>
                    @livewire("chat-form")
                    <br>
                    <br>
                    @livewire("chat-list")

                </div>
            </div>
            <div class="row col-md-12 py-2 d-flex justify-content-around">
                <button class="btn btn-danger btn-rojo-comu">Terminar Conversacion</button>
                <button class="btn btn-primary btn-rojo-mens">Enviar mensaje al vendedor</button>
            </div>

        </div>
    </div>




@endsection

@section('contenidoJSabajo')


@livewireScripts
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
