jQuery(document).ready(function($) {

    var cols = {},

        messageIsOpen = false;

    cols.showOverlay = function() {
        $('body').addClass('show-main-overlay');
    };
    cols.hideOverlay = function() {
        $('body').removeClass('show-main-overlay');
    };


    cols.showMessage = function() {
        $('body').addClass('show-message');
        messageIsOpen = true;
    };
    cols.hideMessage = function() {
        $('body').removeClass('show-message');
        $('#main .message-list li').removeClass('active');
        messageIsOpen = false;
    };


    cols.showSidebar = function() {
        $('body').addClass('show-sidebar');
    };
    cols.hideSidebar = function() {
        $('body').removeClass('show-sidebar');
    };


    // Show sidebar when trigger is clicked

    $('.trigger-toggle-sidebar').on('click', function() {
        cols.showSidebar();
        cols.showOverlay();
    });


    $('.trigger-message-close').on('click', function() {
        cols.hideMessage();
        cols.hideOverlay();
    });


    // This will prevent click from triggering twice when clicking checkbox/label

    $('input[type=checkbox]').on('click', function(e) {
        e.stopImmediatePropagation();
    });



    // When you click the overlay, close everything

    $('#main > .overlay').on('click', function() {
        cols.hideOverlay();
        cols.hideMessage();
        cols.hideSidebar();
    });



    // Enable sexy scrollbars
    $('.nano').nanoScroller();

});