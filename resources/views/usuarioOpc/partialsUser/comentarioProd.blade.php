<div class="row">
    @foreach($productUser_s as $productUser)
    <div class="col-md-3 col-sm-4">
        <div class="card info-prod-div">
            <img class="card-img-top image-perso" src="{{$productUser->image_name1}}" alt="Card image cap">
            <div class="card-body">
                <a href="{{ route('producto.detalles', $productUser->id) }}" class="d-flex justify-content-center text-center">
                    {{$productUser->nombre_producto}}
                </a>
                <hr class="line-separation-1">
            <p class="card-text parrafo-1">Some quick example text to build on the card title and make up the bulk of the card's content. dawd awdawd wadawdadawdawdawd wadawd awdawd</p>
            </div>
        </div>
    </div>
    @endforeach
</div><!-- row -->
<div class="row d-flex justify-content-center py-4">
    {{$productUser_s->links()}}

</div>
