(function($) {
    'use strict';

    // Initialize Swiper
    var swiper = new Swiper('.swiper-container', {
     effect: 'coverflow',
     grabCursor: false,
     centeredSlides: true,
     slidesPerView: 'auto',
     autoplay:true,
     navigation: {
       nextEl: '.icon-next',
       prevEl: '.icon-prev',
     },
      autoplay: {
        delay: 3000,
       },
       loop:true,
     coverflowEffect: {
       rotate:1,
       stretch: 600,
       depth: 180,
       modifier: 1,
       slideShadows : true,
     },
   });
})(jQuery)
