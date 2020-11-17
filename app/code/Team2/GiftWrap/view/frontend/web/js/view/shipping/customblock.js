define(
    [
        'uiComponent',
        'jquery',
        'ko'
    ],
    function(
        Component,
        $,
        ko
    ) {
        'use strict';
        $('.owl-carousel').owlCarousel({
            loop: true,
            items: 5, 
            nav: true,
            autoplay:false,
            autoplayTimeout:1000,
            autoplayHoverPause:true,
            dots: true,
            navText : ["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
            itemsDesktop : [1199,3],
            itemsDesktopSmall : [900,3], // betweem 900px and 601px
            itemsTablet: [700,2], // 2 items between 600 and 480
            itemsMobile : [479,1] , // 1 item between 479 and 0
            responsiveClass:true,
            responsive:{
                0:{
                    items:2,
                    nav:true
                },
                600:{
                    items:3,
                    nav:false
                },
                1000:{
                    items:5,
                    nav:true,
                    loop:false
                }
            }
        });
        return Component.extend({
            defaults: {
                template: 'Team2_GiftWrap/shipping/customblock'
            },

            initialize: function () {
                var self = this;
                this._super();
            }
            
        });
        
    }
    
);