var $progress = $('.progress');
var $progressBar = $('.progress-bar');
var $alert = $('.alert');

$progressBar.animate({ width: "100%" }, 100);
$progress.delay(1000).fadeOut(500);

setTimeout(function () {
    $progress.css('display', 'none');
    $alert.css('display', 'block');
}, 500); 