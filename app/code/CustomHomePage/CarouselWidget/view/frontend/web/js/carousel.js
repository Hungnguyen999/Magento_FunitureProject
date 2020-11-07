define([
    'jquery',
    'CustomHomePage_CarouselWidget/js/carousel/owl.carousel.min',
    'CustomHomePage_CarouselWidget/js/carousel/slick.min'
], function ($) {
    'use strict';

    $('#owl-carousel-mainbanner').owlCarousel({
        loop: true,
        items: 1, 
        nav: true,
        autoplay:false,
        autoplayTimeout:1000,
        autoplayHoverPause:true,
        dots: false,
        navText : ["<span class='icon-chevron-left'></span>","<span class='icon-chevron-right'></span>"]

    });
    $('.owl-carousel').owlCarousel({
        loop: true,
        items: 5, 
        nav: true,
        autoplay:false,
        autoplayTimeout:1000,
        autoplayHoverPause:true,
        dots: true,
        navText : ["<span class='icon-chevron-left'></span>","<span class='icon-chevron-right'></span>"],
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

    /** Related product in detail page */
    jQuery(document).ready(function () {
        jQuery("#related").slick({
            rows: 2,
            infinite: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: $(".prev-btn"),
            nextArrow: $(".next-btn"),
            // responsive: [
            //     {
            //         breakpoint: 1280,
            //         settings: {
            //             slidesToShow: 3,
            //             slidesToScroll: 3
            //         }
            //     },
            //     {
            //         breakpoint: 768,
            //         settings: {
            //             slidesToShow: 2,
            //             slidesToScroll: 2
            //         }
            //     },
            //     {
            //         breakpoint: 600,
            //         settings: {
            //             slidesToShow: 1,
            //             slidesToScroll: 1
            //         }
            //     }
            // ]
        });
    });
});