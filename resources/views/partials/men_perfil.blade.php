{{-- <ul class="nav nav-pills nav-fill">
    <li class="nav-item">
        <a class="nav-link active" href="#">Recibidos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Enviados</a>
    </li>
</ul>
--}}

<ul class="nav nav-pills mb-5 " id="pills-tab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
            aria-controls="pills-home" aria-selected="true">Recibidos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
            aria-controls="pills-profile" aria-selected="false">Enviados</a>
    </li>
</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="">
            <div class="mail-box">
                <aside class="lg-side">
                    {{-- <div class="inbox-head">
                        <h3>Inbox</h3>
                        <form action="#" class="pull-right position">
                            <div class="input-append">
                                <input type="text" class="sr-input" placeholder="Search Mail">
                                <button class="btn sr-btn" type="button"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div> --}}
                    <div class="inbox-body">
                        @if ($errors->respuesta->any())
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                
                            <button type="button" class="close" data-dismiss="alert">
                                <span> &times;</span>
                            </button>

                                <ul>
                                    @foreach ($errors->respuesta->all() as $error)
                                        <li>{{ $error }}</li>

                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <table class="table table-inbox table-hover">
                            <tbody>
                                @if ($mensaje_s->count() > 0)

                                    @foreach ($mensaje_s as $mensaje)

                                        <tr class="unread element-td-now" data-toggle="modal"
                                            data-target="#modalMensajeMostrar" data-whatever="@mdo">
                                            <td class="inbox-small-cells">
                                                <input type="checkbox" class="mail-checkbox">
                                            </td>
                                            {{-- <td class="inbox-small-cells"><i
                                                    class="fa fa-star"></i></td> --}}
                                            <td class="view-message  dont-show">
                                                <strong>{{ $mensaje->mensajeUserEmisor->usuario }}</strong>
                                            </td>
                                            <td class="view-message text-center"> <strong>Asunto</strong>
                                                <br>{{ $mensaje->men_asunto }}
                                            </td>
                                            <td class="view-message "><strong>Producto</strong> <br>
                                                {{ $mensaje->mensajeProducto->nombre_producto }}
                                            </td>
                                            {{-- <td
                                                class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i>
                                            </td> --}}
                                            <td>
                                                <strong>Fecha</strong>
                                                <br> 
                                                {{$mensaje->created_at}}
                                                <div class="colocarFecha">
                                                    {{-- <script>
                                                        var formateado = (function(){
                                                            $(".colocarFecha")[{{$loop->iteration - 1}}].text(moment('{{$mensaje->created_at}}').locale('es').format('DD [de] MMMM [del] YYYY'));
                                                        }());
                                                    </script>  --}}
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-dark" style="padding:2px;" data-toggle="modal"
                                                    data-target="#modalMensajeMostrar" data-whatever="@mdo">Abrir
                                                    mensaje</button>
                                            </td>
                                            <input type="hidden" class="cMensajeProducto"
                                                value="{{ $mensaje->mensajeProducto->nombre_producto }}">
                                            <input type="hidden" class="cMensajeEmisor"
                                                value="{{ $mensaje->mensajeUserEmisor->usuario }}">
                                            <input type="hidden" class="cMensajeId"
                                                value="{{ $mensaje->use_id_emisor }}">
                                            <input type="hidden" class="cMensajeAsunto"
                                                value="{{ $mensaje->men_asunto }}">
                                            <input type="hidden" class="cMensajeTexto"
                                                value="{{ $mensaje->men_mensaje }}">
                                            <input type="hidden" class="cMensajeIdProducto"
                                                value="{{ $mensaje->mensajeProducto->id }}">
                                        </tr>
                                    @endforeach
                                    <div class="d-flex justify-content-center">{{$mensaje_s->links()}}</div>
                                    
                                @else
                                    <h3 class="text-center">No se encontro mensajes</h2>
                                @endif
                                {{-- <tr class="">
                                    <td class="inbox-small-cells">
                                        <input type="checkbox" class="mail-checkbox">
                                    </td>
                                    <td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>
                                    <td class="view-message dont-show">Freelancer.com <span
                                            class="label label-danger pull-right">urgent</span></td>
                                    <td class="view-message">Stop wasting your visitors </td>
                                    <td class="view-message inbox-small-cells"></td>
                                    <td class="view-message text-right">May 23</td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </aside>
            </div>
        </div>


    </div>

    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <div class="">
            <div class="mail-box">
                <aside class="lg-side">
                    <div class="inbox-body">
                        <table class="table table-inbox table-hover">
                            <tbody>
                                @if ($mensajeEnviado_s->count() > 0)
                                    {{ $mensajeEnviado_s }}
                                    @foreach ($mensajeEnviado_s as $mensajeEnviado)

                                        <tr class="unread element-td-enviados-now" data-toggle="modal"
                                            data-target="#modalMensajeEnviadoMostrar" data-whatever="@mdo">
                                            <td class="inbox-small-cells">
                                                <input type="checkbox" class="mail-checkbox">
                                            </td>
                                            {{-- <td class="inbox-small-cells"><i
                                                    class="fa fa-star"></i></td> --}}
                                            <td class="view-message  dont-show">
                                                <strong>{{ $mensajeEnviado->mensajeUserEmisor->usuario }}</strong>
                                            </td>
                                            <td class="view-message text-center"> <strong>Asunto</strong>
                                                <br>{{ $mensajeEnviado->men_asunto }}
                                            </td>
                                            <td class="view-message "><strong>Producto</strong> <br>
                                                {{ $mensajeEnviado->mensajeProducto->nombre_producto }}
                                            </td>
                                            {{-- <td
                                                class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i>
                                            </td> --}}
                                            <td>
                                                <strong>Fecha</strong>
                                                <br> {{ $mensajeEnviado->created_at }}
                                            </td>
                                            <td>
                                                <button class="btn btn-dark" style="padding:2px;" data-toggle="modal"
                                                    data-target="#modalMensajeEnviadoMostrar" data-whatever="@mdo">Abrir
                                                    mensaje</button>
                                            </td>
                                            <input type="hidden" class="cMensajeProducto"
                                                value="{{ $mensajeEnviado->mensajeProducto->nombre_producto }}">
                                            <input type="hidden" class="cMensajeEmisor"
                                                value="{{ $mensajeEnviado->mensajeUserEmisor->usuario }}">
                                            <input type="hidden" class="cMensajeId"
                                                value="{{ $mensajeEnviado->use_id_emisor }}">
                                            <input type="hidden" class="cMensajeAsunto"
                                                value="{{ $mensajeEnviado->men_asunto }}">
                                            <input type="hidden" class="cMensajeTexto"
                                                value="{{ $mensajeEnviado->men_mensaje }}">
                                            <input type="hidden" class="cMensajeIdProducto"
                                                value="{{ $mensajeEnviado->mensajeProducto->id }}">

                                        </tr>
                                    @endforeach
                                    <div class="d-flex justify-content-center">{{$mensajeEnviado_s->links()}}</div>
                                @else
                                    <h3 class="text-center">No se encontro mensajes</h2>
                                @endif
                                {{-- <tr class="">
                                    <td class="inbox-small-cells">
                                        <input type="checkbox" class="mail-checkbox">
                                    </td>
                                    <td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>
                                    <td class="view-message dont-show">Freelancer.com <span
                                            class="label label-danger pull-right">urgent</span></td>
                                    <td class="view-message">Stop wasting your visitors </td>
                                    <td class="view-message inbox-small-cells"></td>
                                    <td class="view-message text-right">May 23</td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
