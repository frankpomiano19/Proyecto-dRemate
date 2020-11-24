<form action="{{ route('edit-datos-publi') }}" id="form-publi-id" method="POST">
    <label class="texto-advertencia" for="">* Toda la información colocada en esta seccion sera pública y
        aparecera en tu subasta</label>



    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-danger alert-dismissible esconder-alerta" id="alerta-aparece-3" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <span> &times;</span>
                </button>
                <strong>Error : </strong>No se pudo editar los datos
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-success alert-dismissible esconder-alerta" id="alerta-aparece-4" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <span> &times;</span>
                </button>
                <strong>Datos cambiados correctmente : </strong>Se modificaron los datos satisfactoriamente
            </div>

        </div>
    </div>




    <div class="row py-2">
        <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="btn btn-social-icon btn-youtube">
                <span class="fa fa-youtube"></span>
            </label>
            <input type="url" name="youtube" placeholder="youtube url" value="{{ Auth::user()->us_youtube }}">
        </div>

        <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="btn btn-social-icon btn-facebook">
                <span class="fa fa-facebook"></span>
            </label>
            <input type="url" name="facebook" placeholder="facebook-url" value="{{ Auth::user()->us_facebook }}">

        </div>
    </div>
    <div class="row py-2">

        <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="btn btn-social-icon btn-twitter">
                <span class="fa fa-twitter"></span>
            </label>
            <input type="url" name="twitter" placeholder="twitter url" value="{{ Auth::user()->us_twitter }}">
        </div>

        <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="btn btn-social-icon btn-twitch">
                <span class="fa fa-twitch"></span>
            </label>
            <input type="url" name="twitch" placeholder="twitch-url" value="{{ Auth::user()->us_twitch }}">

        </div>


    </div>
</form>
