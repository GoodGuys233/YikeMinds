;(function ($) {
    "use strict";

    /*============= 益科slogan预加载动画=============*/

    $('#preloader').addClass('loading');
    $(window).on( 'load', function() {
        setTimeout(function () {
            $('#preloader').fadeOut(300, function () {
                $('#preloader').removeClass('loading');
            });
        }, 300);
    })

})(jQuery)