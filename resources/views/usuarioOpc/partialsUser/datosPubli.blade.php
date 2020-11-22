<form action="{{ route('edit-datos-publi') }}" id="form-publi-id" method="POST">
    <div class="row py-2">
        <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="btn btn-social-icon btn-youtube">
                <span class="fa fa-youtube"></span>
            </label>
            <input type="url" name="youtube" placeholder="youtube url">
        </div>

        <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="btn btn-social-icon btn-facebook">
                <span class="fa fa-facebook"></span>
            </label>
            <input type="url" name="twitter" placeholder="facebook-url">

        </div>
    </div>
    <div class="row py-2">

        <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="btn btn-social-icon btn-twitter">
                <span class="fa fa-twitter"></span>
            </label>
            <input type="url" name="twitter" placeholder="twitter url">
        </div>

        <div class="col-sm-6 col-md-6 col-lg-6">
            <label class="btn btn-social-icon btn-twitch">
                <span class="fa fa-twitch"></span>
            </label>
            <input type="url" name="twitch" placeholder="twitch-url">

        </div>


    </div>
</form>
