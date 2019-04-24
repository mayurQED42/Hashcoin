jQuery( document ).ready(function() {
    window.onscroll = function() {myFunction()};
    jQuery("ul.we-mega-menu-ul.nav.nav-tabs").attr('id', 'custom-header')
    var header = document.getElementById("custom-header");
    var sticky = header.offsetTop;

    function myFunction() {
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
    }
});
