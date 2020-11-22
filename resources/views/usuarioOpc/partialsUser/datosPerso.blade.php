<form action="{{ route('edit-datos-per') }}" id="usuario-perso-form-id" method="POST">
    @csrf
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
            <label class="label-input">Cambiar contraseña</label> <input class="input-cuadro" type="text"
                name="password" placeholder="Contraseña" value="">
        </div>
    </div>
</form>
