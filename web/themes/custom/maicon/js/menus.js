(function ($) {
    'use strict';
    $(".we-mega-menu-li.dropdown-menu > a").click(function(e){
        if ($(window).width() <= '767') {
        $('.we-mega-menu-submenu').hide();
            e.preventDefault();
            $(this).parent().toggleClass("active-menu");
        }
    })

})(jQuery);