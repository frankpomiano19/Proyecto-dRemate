<form action="{{ route('edit-datos-per') }}" id="usuario-perso-form-id" method="POST">
    @csrf

    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-danger alert-dismissible esconder-alerta" id="alerta-aparece-1" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <span> &times;</span>
                </button>
                <strong>Error : </strong>No se pudo editar los datos
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-success alert-dismissible esconder-alerta" id="alerta-aparece-2" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <span> &times;</span>
                </button>
                <strong>Datos cambiados correctmente : </strong>Se modificaron los datos satisfactoriamente
            </div>

        </div>
    </div>



    <div class="row py-2">
        <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="label-input" for="">Usuario</label> <input class="input-cuadro" type="text" name="usuario"
                placeholder="{{ Auth::user()->usuario }}" value="{{ Auth::user()->usuario }}">
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="label-input" for="">Celular</label> <input type="text" name="celular" placeholder="Celular">
        </div>
    </div>
    <div class="row py-2">
        <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="label-input" for="">Correo</label> <input type="text" disabled
                placeholder="{{ Auth::user()->email }}" value="{{ Auth::user()->email }}">
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="label-input" for="">Sexo</label>
            <select name="sexo">
                <option value="Ninguno">Prefiero no decir</option>
                <option value="Femenino">Femenino</option>
                <option value="Masculino">Masculino</option>
            </select>
        </div>

    </div>
    <div class="row py-2">
        <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="label-input">Nombre : </label> <input class="input-cuadro" type="text" name="password"
                placeholder="Nombre" value="{{ Auth::user()->nombres }}" disabled>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="label-input">Apellidos : </label> <input class="input-cuadro" type="text" name="password"
                placeholder="Apellidos" value="{{ Auth::user()->apellidos }}" disabled>
        </div>
    </div>


    <div class="row py-2">
        <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="label-input">Cambiar contraseña</label> <input class="input-cuadro" type="text"
                name="password" placeholder="Contraseña" value="">
        </div>
    </div>
    <div class="row py-2">
        <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="label-input">Telefono : </label> <input class="input-cuadro" type="text" name="telefono"
                placeholder="Telefono" value="{{ Auth::user()->telefono }}">
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="label-input">Fecha de nacimiento : </label> <input class="input-cuadro" type="text"
                name="fecha de nacimiento" placeholder="Fecha de nacimiento"
                value="{{ Auth::user()->fechadenacimiento }}" disabled>
        </div>
    </div>


</form>
