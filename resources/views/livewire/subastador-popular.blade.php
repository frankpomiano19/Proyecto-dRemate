    <div id="cont-subastadores">
        <div id="subastadores-superior">
            <div id="buscador">
                <form class="form-wrapper cf">
                    <input type="text" placeholder="Nombre subastador" name="subastador" wire:model="subastador" required>
                    <button type="submit">
                        USUARIO
                    </button> 
                    
                </form>
            </div>
            <div id="ordenar-por">
                <div id="input-ordenar-por">
                    <form action="">
                        <div class="select">
                            <select name="slct" wire:model="orden"  id="slct">
                              <option value="0" selected >Más vistas</option>
                              <option value="1">Más subastas</option>
                            </select>
                          </div>
                    </form>
                </div>            
                <div id="texto-ordenar-por">Ordenar por&nbsp</div>
            </div>
            <div style="clear: both;"></div>
        </div>

        @php

        $i = 1;    
        @endphp

        @foreach ($us_sub as $sub)
            <div class="subastador">
                <div class="wrapright"> 	  
                    <div class="right">
                        <span class="nom-subastador">
                            <a
                            href="{{ route('comentarios-now', $sub->id) }}">{{ $sub->usuario}}</a>    
                        </span><br>
                        <div class="abajo">
                            @php
                                $idSubs = $sub->id;
                                $ab = date_default_timezone_get(); //Obtiene la fecha actual
                                date_default_timezone_set('America/Lima'); //Obtiene la fecha de Lima Peru
                                $valorN = date('Y-m-d H:i:s');//Sale el formato 2020-10-29 15:29:12
                                $cuenta = App\Models\Producto::where('user_id','=',$idSubs)->where('inicio_subasta','<',$valorN)->get();

                                $subastaUsuario = App\Models\User::where('id','=',$idSubs)->first();
                                $subastaUsuario->subastas = $cuenta->count();
                                $subastaUsuario->save();

                                // {{ $cuenta->count() }}


                            @endphp
                            <i class="fa fa-gavel">
                                </i>&nbsp<span>{{ $sub->subastas }}</span><span>&nbspSubastas realizadas</span><br>
                            <span><img src="img/location-icon.png" alt="li"></span>
                            <span>{{ $sub->departamento}}</span><span>,&nbsp</span><span>{{ $sub->distrito}}</span>
                        </div>
                        @if($sub->visita==1)
                            <div class="vistas-sub">
                                <i class="fa fa-eye"></i><span>{{ $sub->visita }}</span><span>&nbspVisita</span>
                            </div>
                        @else
                            <div class="vistas-sub">
                                <i class="fa fa-eye"></i><span> {{ $sub->visita }}</span><span>&nbspVisitas</span>
                            </div>
                        @endif
                        
                    </div>
                </div>
                <div class="left">
                    <div class="flex cont-number">
                        <div class="number flex">
                            <span>{{ $i++}}</span>
                        </div>
                    </div>
                    <div class="cont-sub-ima">
                        <img class="sub-ima" src="img/coin/coin1.png" alt="subastador-X">
                    </div>
                </div> 
            </div>
        @endforeach

        {{-- Paginación --}}
        <div id="pag-sub" class="flex">
            <div>
            </div>
        </div>
    </div>