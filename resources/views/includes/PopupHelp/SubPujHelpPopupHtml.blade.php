  <!-- Modal de ayuda-->
  @auth
  @if ($ayudaRuta == 1 )    
    <div class="modal fade" id="staticBackdropHelp" data-backdrop="static" data-keyboard="false"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" >
          <div class="modal-header" id="contentPopupHelpNowHeader">
            <h5 class="modal-title" id="staticBackdropLabel">El producto  ha sido bloqueado</h5>
             
          </div>
          <div class="modal-body" id="contentPopupHelpNowBody">
              <div class="row">
                  <div class="col-md-6">
                      Pujas
                  </div>
                  <div class="col-md-6">
                      Cava
                  </div>
  
              </div>
              <div class="row">
                  <div class="col-md-6">
                      Cava
                  </div>
                  <div class="col-md-6">
                      Cava
                  </div>
  
              </div>
  
              <div class="row">
                  <div class="col-md-6">
                      Cava
                  </div>
                  <div class="col-md-6">
                      Cava
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
