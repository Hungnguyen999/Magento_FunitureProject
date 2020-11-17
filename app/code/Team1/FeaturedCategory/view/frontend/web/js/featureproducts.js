require(['jquery', 'slick', 'domReady!'], function ($) {
    $(document).ready(function () {
        $('.featured-slider').slick({
            dots: true,
            infinite: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            speed: 1000,
            rows: 3,
            swipeToSlide: true,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: false,
                        dots: true
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        infinite: false,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 375,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });
});