<section style="padding-bottom:0px; padding-top:0px">
    <div class="row">
        @foreach ($productUser_s as $productUser)
            <div class="col-md-4 col-lg-3">
                <div class="card-content">
                    <div class="card-img">
                        <img class="image-perso" src="{{ $productUser->image_name1 }}" alt="Card image cap">
                        @if($productUser->inicio_subasta !=null)
                        <span class="pro-registrado">
                            <h5 class="text-align-center">Subasta</h5>
                        </span>
                        @else
                        <span>
                            <h5 class="text-align-center">Registro</h5>
                        </span>
                        @endif
                
                    </div>
                    <div class="card-desc">
                        <a href="{{ route('producto.detalles', $productUser->id) }}" style="font-weight: bold;"
                            class="d-flex justify-content-center text-center">
                            {{ $productUser->nombre_producto }}
                        </a>
                        <p class="card-text parrafo-1">{{ $productUser->descripcion }}</p>
                        <hr class="line-separation-1">
                        @if($productUser->inicio_subasta !=null)
                        <a href="{{ route('producto.detalles', $productUser->id) }}" class="btn btn-primary d-flex justify-content-center" style="background-color: red;">Ver subasta</a>
                        @else
                        <div class="d-flex justify-content-center ">
                            <a href="{{ route('infoProducto', [$productUser->id,$productUser->user_id]) }}" class="btn btn-primary d-flex justify-content-center" style="background-color: #00BCD4;">Establecer comunicacion</a>
                            &nbsp;
                            <div  class="d-flex flex-wrap align-content-center">
                                <i class="fa fa-question-circle-o" style="cursor: help;" aria-hidden="true" data-toggle="tooltip" data-html="true" title="Al dar click, permite notificar al usuario para la comuncacion sincronica"></i>

                            </div>
    
                        </div>

                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div><!-- row -->
</section>
<div class="row d-flex justify-content-center py-4">
    {{ $productUser_s->links() }}

</div>
