
(function ($,Drupal) {
    'use strict';

    console.log("hello");
    Drupal.behaviors.mainnav={
        attach:function(context,settings){
            console.log("rendering");
            var stickyOffset = $('.sticky').offset().top;
            console.log(stickyOffset);
            var body = $('body');
$(window).scroll(function(){
  var sticky = $('.sticky'),
  
      scroll = $(window).scrollTop();

  if (scroll >= stickyOffset) {
      sticky.addClass('fixed');
      body.addClass('header-fixed');
  }
  else {
      sticky.removeClass('fixed');
      body.removeClass('header-fixed');
  }
});
    },
    };
})(jQuery,Drupal);


