jQuery(document).ready(function($) {

/*------------------------------------------------
            DECLARATIONS
------------------------------------------------*/

    var scroll              = $(window).scrollTop();  
    var scrollup            = $('.backtotop');
    var menu_toggle         = $('.menu-toggle');
    var dropdown_toggle     = $('button.dropdown-toggle');
    var nav_menu            = $('.main-navigation');
    var project_slider      = $('.project-slider');

/*------------------------------------------------
            BACK TO TOP
------------------------------------------------*/

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            scrollup.css({bottom:"25px"});
        } 
        else {
            scrollup.css({bottom:"-100px"});
        }
    });

    scrollup.click(function() {
        $('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });

/*------------------------------------------------
            MAIN NAVIGATION
------------------------------------------------*/

    menu_toggle.click(function(){
        nav_menu.slideToggle();
        $(this).toggleClass('active');
        $('.menu-overlay').toggleClass('active');
        $('.main-navigation').toggleClass('menu-open');
        $('body').toggleClass('main-navigation-active');
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            $('.menu-sticky #masthead').addClass('nav-shrink');
        }
        else {
            $('.menu-sticky #masthead').removeClass('nav-shrink');
        }
    });

    dropdown_toggle.click(function() {
        $(this).toggleClass('active');
       $(this).parent().find('.sub-menu').first().slideToggle();
    });

/*------------------------------------------------
            Sliders
------------------------------------------------*/

project_slider.slick({
    responsive: [
    {
    breakpoint: 992,
        settings: {
            slidesToShow: 2,
            arrows: false
        }
    },
    {
        breakpoint: 600,
            settings: {
            slidesToShow: 1,
            arrows: false
        }
    }
    ]
});

/*------------------------------------------------
            Match Height
------------------------------------------------*/
/*$('.project-slider .entry-container').matchHeight();*/

/*------------------------------------------------
            Accordion
------------------------------------------------*/
var faq = $('.faq-group');

faq.find('.each-faq').each(function() {
    if( !$(this).hasClass('open') ) {
        $(this).find('.faq-content').hide();
    }
});

faq.find('.faq-trigger').on('click', function(el) {
    var openFaq = $(this).closest('.each-faq');

    openFaq.toggleClass('open').find('.faq-content').slideToggle( 300 );
    openFaq.siblings('.each-faq:visible').each(function() {
        $(this).removeClass('open').find('.faq-content').slideUp( 300 );
    });

});


/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});