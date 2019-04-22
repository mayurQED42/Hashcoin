(function ($) {
    'use strict';
  
    Drupal.behaviors.slider = {
      attach: function (context, settings) {
        jQuery(document).ready(function($) {
          //alert('hello');
          $('.block-block-banner').slick({
            centerMode: true,
            centerPadding: '30px',
            slidesToShow: 6,
            prevArrow: false,
            nextArrow: false,
            swipeToSlide: true,
            responsive: [
              {
                breakpoint: 768,
                settings: {
                  arrows: false,
                  centerMode: true,
                  centerPadding: '40px',
                  slidesToShow: 3
                }
              },
              {
                breakpoint: 480,
                settings: {
                  arrows: false,
                  centerMode: true,
                  centerPadding: '40px',
                  slidesToShow: 1
                }
              }
            ]
          });
  
        });
      },
    };
  })(jQuery, Drupal);