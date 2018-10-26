jQuery(document).ready(function($) { 
	
    /**
    * Document ready (jQuery)
    */
    $(function () {

        /**
         * Activate superfish menu.
         */
        $('.sf-menu').superfish({
            'speed': 'fast',
            'delay' : 0,
            'animation': {
                'height': 'show'
            }
        });

    });

        /**
         * SlickNav
         */

	$('#menu-main-slick').slicknav({
		prependTo:'.navbar-header',
		label: flemingStrings.slicknav_menu_home,
		allowParentLinks: true
	});

	jQuery(".site-flexslider").flexslider({
	        selector: ".site-slideshow-list > .site-slideshow-item",
		animation: "slide",
		animationLoop: true,
	        initDelay: 500,
		smoothHeight: false,
		slideshow: false,
		slideshowSpeed: 5000,
		pauseOnAction: true,
		pauseOnHover: false,
	        controlNav: true,
		directionNav: false,
		useCSS: true,
		touch: false,
	        animationSpeed: 600,
		rtl: false,
		reverse: false
	});

    function mobileadjust() {
        
        var windowWidth = $(window).width();

        if( typeof window.orientation === 'undefined' ) {
            $('#menu-main').removeAttr('style');
         }

        if( windowWidth < 769 ) {
            $('#menu-main').addClass('mobile-menu');
         }
 
    }
    
    mobileadjust();

    $(window).resize(function() {
        mobileadjust();
    });

});