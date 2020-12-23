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
                {{-- <div class="mail-option">
                    <div class="chk-all">
                        <input type="checkbox" class="mail-checkbox mail-group-checkbox">
                        <div class="btn-group">
                            <a data-toggle="dropdown" href="#" class="btn mini all" aria-expanded="false">
                                All
                                <i class="fa fa-angle-down "></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#"> None</a></li>
                                <li><a href="#"> Read</a></li>
                                <li><a href="#"> Unread</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="btn-group">
                        <a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#"
                            class="btn mini tooltips">
                            <i class=" fa fa-refresh"></i>
                        </a>
                    </div>
                    <div class="btn-group hidden-phone">
                        <a data-toggle="dropdown" href="#" class="btn mini blue" aria-expanded="false">
                            More
                            <i class="fa fa-angle-down "></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
                            <li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <a data-toggle="dropdown" href="#" class="btn mini blue">
                            Move to
                            <i class="fa fa-angle-down "></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
                            <li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                        </ul>
                    </div>

                    <ul class="unstyled inbox-pagination">
                        <li><span>1-50 of 234</span></li>
                        <li>
                            <a class="np-btn" href="#"><i class="fa fa-angle-left  pagination-left"></i></a>
                        </li>
                        <li>
                            <a class="np-btn" href="#"><i class="fa fa-angle-right pagination-right"></i></a>
                        </li>
                    </ul>
                </div> --}}
                <table class="table table-inbox table-hover">
                    <tbody>
                        <tr class="unread element-td-now" data-toggle="modal" data-target="#modalMensajeMostrar" data-whatever="@mdo">
                            <td class="inbox-small-cells">
                                <input type="checkbox" class="mail-checkbox">
                            </td>
                            {{-- <td class="inbox-small-cells"><i class="fa fa-star"></i></td> --}}
                            <td class="view-message  dont-show"> <strong>Pedro el Escamoso</strong> </td>
                            <td class="view-message text-center"> <strong>Asunto</strong>  <br>Negociacion del producto</td>
                            <td class="view-message "><strong>Producto</strong>  <br> Libro panseca</td>
                            {{-- <td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i></td> --}}
                            <td>
                                    <strong>Fecha</strong>                                
                                    <br> 9:27AM                          
                            </td>
                            <td>
                                <button class="btn btn-dark" style="padding:2px;" data-toggle="modal" data-target="#modalMensajeMostrar" data-whatever="@mdo" >Abrir mensaje</button>                                
                            </td>
                        </tr>
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

<div class="modal fade" id="modalMensajeMostrar" tabindex="-1" role="dialog" aria-labelledby="modalMensajeMostrar" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMensajeMostrarLabel">Mensaje</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Producto :</label>
              <input type="text" class="form-control" id="recipient-name-1" name="producto-dest" value="Nombre producto" disabled>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Usuario destino :</label>
              <input type="text" class="form-control" id="recipient-name-2" name="usuario-dest" value="Usuario que envio" disabled>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Asunto :</label>
              <input type="text" class="form-control" id="recipient-name-3" name="asunto-dest" placeholder="inserte el asunto" >
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Mensaje:</label>
              <textarea class="form-control" id="mensaje-recibido" disabled>Aca se muestra el mensaje</textarea>
            </div>

            <div class="form-group">
                <label for="message-text" class="col-form-label">Mensaje:</label>
                <textarea class="form-control" id="mensaje-respondido" placeholder="Responder mensaje">Aca se muestra el mensaje</textarea>
            </div>
  
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Responder mensaje</button>
        </div>
      </div>
    </div>
  </div>



