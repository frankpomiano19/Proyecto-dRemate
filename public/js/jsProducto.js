alert("asdlñfkj");
var galleryThumbs = new Swiper('.gallery-thumbs', {
    spaceBetween: 10,
    slidesPerView: 4,
    loop: true,
    freeMode: true,
    loopedSlides: 5, //looped slides should be the same
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
});
var galleryTop = new Swiper('.gallery-top', {
    spaceBetween: 10,
    loop: true,
    loopedSlides: 5, //looped slides should be the same
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    thumbs: {
        swiper: galleryThumbs,
    },
});

$(document).on('dragstart', 'img', function(evt) {
    evt.preventDefault();
});
$(fn) {
$("#nuevo-acuerdo").click(function() {
    $('#texto-nuevo-acuerdo').hide(1);
    $('#inputAcuerdo').show(1);

});
$("#historialClick").click(function() {
    $('#tablas_pujas').show(1);
});
});