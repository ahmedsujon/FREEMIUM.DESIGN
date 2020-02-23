(function ($) {
    "use strict";

    // Preloader
    $('body').addClass('preloader-active');
    $(window).on('load', function () {
        $('.preloader').fadeOut();
        $('.preloader-spinner').delay(550).fadeOut('slow');
        $('body').removeClass('preloader-active');
    });

    // $('.search-btn').click(function(){
    //     $('.search-btn').toggleClass('search-btn-active');
    // });
    // features slider active
    $('.featured').slick({
        autoplay: false,
        autoplaySpeed: 5000,
        dots: false,
        speed: 1000,
        arrows: true,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        prevArrow: '<i class="fas fa-chevron-left"></i>',
        nextArrow: '<i class="fas fa-chevron-right"></i>',
        responsive: [{
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    arrows: false,
                }
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                }
            }
        ]
    });


    //Scroll top
    $(".scroll-top").click(function () {
        $("html,body").animate({
            scrollTop: 0
        }, 1000);
    });
    $(window).scroll(function () {
        if ($(this).scrollTop() > 180) {
            $(".scroll-top").fadeIn();
        } else {
            $(".scroll-top").fadeOut();
        }
    });

})(jQuery);
