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
              <div class="row">
                  <div class="col-md-4 d-flex justify-content-center">
                    <img src="{{ asset('img/assets/imgHelp/HomeHelp1.png') }}" class="img-thumbnail imagenes-help" alt="Subastar producto"> 
                  </div>
                  <div class="col-md-8 d-flex flex-wrap align-content-center">
                    <p class="text-center">  
                    En esta seccion permite subir el producto y a la misma vez poder subastarlo
                  </p>
                  </div>
  
              </div>
              <div class="row">
                <div class="col-md-4 d-flex justify-content-center">
                  <img src="{{ asset('img/assets/imgHelp/HomeHelp2.png') }}" class="img-thumbnail imagenes-help" alt="Subastar producto"> 
                </div>
                <div class="col-md-8 d-flex flex-wrap align-content-center">
                  <p class="text-center">  
                    Podemos ver productos que estan en subasta
                  </p>
                </div>

              </div>


              <div class="row">
                <div class="col-md-4 d-flex justify-content-center">
                  <img src="{{ asset('img/assets/imgHelp/HomeHelp3.png') }}" class="img-thumbnail imagenes-help" alt="Subastar producto"> 
                </div>
                <div class="col-md-8 d-flex flex-wrap align-content-center">
                  <p class="text-center">  
                    Dinero con el que dispones actualmente
                  </p>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4 d-flex justify-content-center">
                  <img src="{{ asset('img/assets/imgHelp/HomeHelp4.png') }}" class="img-thumbnail imagenes-help" alt="Subastar producto"> 
                </div>
                <div class="col-md-8 d-flex flex-wrap align-content-center">
                  <p class="text-center">  
                    Serie de opciones que te permiten gestionar tus productos, se libre de investigar
                  </p>
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
