var $progress = $('.progress');
var $progressBar = $('.progress-bar');
var $alert = $('.alert');




$progressBar.animate({ width: "100%" }, 50000);
$progress.delay(100000).fadeOut(50000);

setTimeout(function () {
    $progress.css('display', 'none');
    $alert.css('display', 'block');
}, 50000);

/*
$progressBar.animate({ width: "100%" }, 100);
$progress.delay(1000).fadeOut(500);

setTimeout(function () {
    $progress.css('display', 'none');
    $alert.css('display', 'block');
}, 500); */


/*

(function ($) {
    $.fn.animateProgress = function (progress, callback) {
        return this.each(function () {
            $(this).animate({
                width: progress + '%'
            }, {
                duration: 20000,

                easing: 'swing',

                step: function (progress) {
                    var labelEl = $('.ui-label', this),
                        valueEl = $('.value', labelEl);

                    if (Math.ceil(progress) < 20 && $('.ui-label', this).is(":visible")) {
                        labelEl.hide();
                    } else {
                        if (labelEl.is(":hidden")) {
                            labelEl.fadeIn();
                        };
                    }

                    if (Math.ceil(progress) == 100) {
                        labelEl.text('Done');
                        setTimeout(function () {
                            labelEl.fadeOut();
                        }, 1000);
                    } else {
                        valueEl.text(Math.ceil(progress) + '%');
                    }
                },
                complete: function (scope, i, elem) {
                    if (callback) {
                        callback.call(this, i, elem);
                    };
                }
            });
        });
    };
})(jQuery);

$(function () {
    $('#progress_bar .ui-progress .ui-label').hide();
    $('#progress_bar .ui-progress').css('width', '7%');

    $('#progress_bar .ui-progress').animateProgress(43, function () {
        $(this).animateProgress(79, function () {
            setTimeout(function () {
                $('#progress_bar .ui-progress').animateProgress(100, function () {
                    $('#main_content').slideDown();
                });
            }, 2000);
        });
    });

});
*/
/*http://facilwebpro.com/como-hacer-una-barra-de-progreso-usando-jquery/*/





