jQuery(document).ready(function() {

    // Detect Screen Width
    var window_width = jQuery(window).width();

    // Top Search bar
    jQuery( '.dt-search-icon' ).on( 'click', function(){
        if (window_width > 768){
            jQuery( '.dt-search-wrap' ).addClass( 'dt-search-wrap-extend' );
        } else {
            jQuery( '.dt-search-md-wrap' ).toggleClass( 'dt-search-md-wrap-extend' );
        }
    });

    jQuery(document).on( 'click', function (e) {
        if ( jQuery( e.target).closest( '.dt-search-wrap-extend, .dt-search-wrap, .dt-search-md-wrap, .dt-search-md-wrap-extend' ).length === 0 ) {
            jQuery( '.dt-search-wrap' ).removeClass( 'dt-search-wrap-extend' );
            jQuery( '.dt-search-md-wrap' ).removeClass( 'dt-search-md-wrap-extend' );
        }
    });

    // Main Menu Mobile
    jQuery( '.dt-nav-md-trigger' ).on( 'click', function(){
        jQuery( '.dt-nav-md' ).toggleClass( 'dt-nav-md-expand' );
        jQuery(this).find( '.fa' ).toggleClass( 'fa-bars fa-close' );
    });

    // Convert Hex to RGBA
    function convertHex( hex, opacity ){
        hex = hex.replace('#','');
        r = parseInt(hex.substring(0,2), 16);
        g = parseInt(hex.substring(2,4), 16);
        b = parseInt(hex.substring(4,6), 16);

        result = 'rgba('+r+','+g+','+b+','+opacity/100+')';
        return result;
    }

    // Initialize post slider
    var swiper = new Swiper( '.swiper-container', {
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        autoplay: 3000,
        speed: 800
    });

    // Initialize Testimonial slider
    var dt_testimonial_slider = new Swiper( '.dt-testimonial-slider', {
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        autoplay: 3000,
        speed: 800
    });

    // Back to Top
    if (jQuery('#back-to-top').length) {
        var scrollTrigger = 500, // px
            backToTop = function () {
                var scrollTop = jQuery(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    jQuery('#back-to-top').addClass('show');
                } else {
                    jQuery('#back-to-top').removeClass('show');
                }
            };
        backToTop();
        jQuery(window).on('scroll', function () {
            backToTop();
        });
        jQuery('#back-to-top').on('click', function (e) {
            e.preventDefault();
            jQuery('html,body').animate({
                scrollTop: 0
            }, 600);
        });
    }

    // Sticky Menu
    var stickyNavTop = jQuery( '.dt-sticky' );

    if (!stickyNavTop.length) {
        return;
    }

    var stickyNavTop = stickyNavTop.offset().top;

    var stickyNav = function(){
        var scrollTop = jQuery(window).scrollTop();

        if (scrollTop > stickyNavTop) {
            jQuery( '.dt-sticky' ).addClass( 'dt-menu-bar-sticky');
        } else {
            jQuery( '.dt-sticky' ).removeClass( 'dt-menu-bar-sticky' );
        }
    };

    stickyNav();
    jQuery(window).scroll(function() {
        stickyNav();
    });

});
