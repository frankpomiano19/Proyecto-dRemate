  <!-- Modal de ayuda-->
  @auth
  @if ($ayudaRuta == 1 )    
    <div class="modal fade" id="staticBackdropHelp" data-backdrop="static" data-keyboard="false"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" >
          <div class="modal-header" id="contentPopupHelpNowHeader">
            <h5 class="modal-title" id="staticBackdropLabel" style="color: black;">Mensaje de Ayuda</h5>
             
          </div>
          <div class="modal-body" id="contentPopupHelpNowBody">



            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-list1" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                  <div class="col-md-4 d-flex justify-content-center">
                    <img src="{{ asset('img/assets/imgHelp/InfoPerfilHelp1.png') }}" class="img-thumbnail imagenes-help" alt="Subastar producto"> 
                  </div>
                  <div class="col-md-8 d-flex flex-wrap align-content-center">
                    <p class="text-center">  
                      Puedes ver tus productos registrados pero <strong>que no estan en subasta</strong> 
                    </p>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-4 d-flex justify-content-center">
                    <img src="{{ asset('img/assets/imgHelp/InfoPerfilHelp2.png') }}" class="img-thumbnail imagenes-help" alt="Subastar producto"> 
                  </div>
                  <div class="col-md-8 d-flex flex-wrap align-content-center">
                    <p class="text-center">  
                        Puedes ver tus productos que estan en subasta
                    </p>
                  </div>
                </div>


                <br>

              </div>

              <div class="tab-pane fade" id="pills-list2" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row">
                  <div class="col-md-4 d-flex justify-content-center">
                    <img src="{{ asset('img/assets/imgHelp/InfoPerfilHelp3.png') }}" class="img-thumbnail imagenes-help" alt="Subastar producto"> 
                  </div>
                  <div class="col-md-8 d-flex flex-wrap align-content-center">
                    <p class="text-center">  
                      Aca estan las subastas que ganaste y puedes enviar el dinero al subastador que esta retenido por el sistema 
                    </p>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-4 d-flex justify-content-center">
                      <img src="{{ asset('img/assets/imgHelp/InfoPerfilHelp4.png') }}" class="img-thumbnail imagenes-help" alt="Subastar producto"> 
                    </div>
                    <div class="col-md-8 d-flex flex-wrap align-content-center">
                      <p class="text-center">  
                        Seccion donde recibes mensajes, puedes enviar mensajes solo cuando entras al perfil de un usuario y le das en <Strong>Establecer comunicacion</Strong> 
                      </p>
                    </div>
                  </div>
  

              </div>
            </div>

              {{-- Botones dentro del popup --}}
              <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" style="font-weight: bold;" id="pills-home-tab" data-toggle="pill" href="#pills-list1" role="tab" aria-controls="pills-home" aria-selected="true">O</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" style="font-weight: bold;" id="pills-profile-tab" data-toggle="pill" href="#pills-list2" role="tab" aria-controls="pills-profile" aria-selected="false">O</a>
                    </li>
                  </ul>
  
                </div>
              </div>



          </div>
          <div class="modal-footer">
              <button type="button" id="noShowOneHelp" class="btn btn-danger" data-dismiss="modal">Close</button>
            <a class="btn btn-success" id="noShowMoreHelps" data-dismiss="modal" role="button">No quiero mas ayuda</a>
          </div>
        </div>
      </div>
    </div>
    @endif
    @endauth
