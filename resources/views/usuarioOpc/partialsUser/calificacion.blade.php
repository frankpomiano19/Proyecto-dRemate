@if ($calificaPerfil_s->count() > 0)
 <div class="row">
            @foreach ($calificaPerfil_s  as $calificaPerfil)
                   <label class="">Calificación:</label>
                   <div class="rating-group">
                                  <input disabled checked class="rating__input rating__input--none" name="score" id="rating3-none" value="0" type="radio">
                                  <label aria-label="1 star" class="rating__label" for="rating3-1">
                                  <i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                  <input class="rating__input" name="score" id="rating3-1" value="1" type="radio" required>
                                  <label aria-label="2 stars" class="rating__label" for="rating3-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                  <input class="rating__input" name="score" id="rating3-2" value="2" type="radio" >
                                  <label aria-label="3 stars" class="rating__label" for="rating3-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                  <input class="rating__input" name="score" id="rating3-3" value="3" type="radio">
                                  <label aria-label="4 stars" class="rating__label" for="rating3-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                  <input class="rating__input" name="score" id="rating3-4" value="4" type="radio" >
                                  <label aria-label="5 stars" class="rating__label" for="rating3-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                  <input class="rating__input" name="score" id="rating3-5" value="5" type="radio" >
                     </div>
                                  (
                                      <span class="num-ratings"> </span>
                                        <label class="">votos, promedio</label>

                                        
                                      
                                        )
            @endforeach

    </div>


    <div class="row d-flex justify-content-center py-4">
    {{ $calificaPerfil_s->links() }}

    </div>
    @else
    <h5 class="text-center comt-titulo-1">No se encontró aún calificación</h4>

    @endif