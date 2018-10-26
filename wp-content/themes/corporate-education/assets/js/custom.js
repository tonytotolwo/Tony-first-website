jQuery(document).ready(function($) {

/*------------------------------------------------
            PRELOADER
------------------------------------------------*/

$('#loader').fadeOut();
$('#loader-container').fadeOut();

$('.display-none').css({'display' : 'block'});

/*------------------------------------------------
                BACK TO TOP
------------------------------------------------*/

 $(window).scroll(function(){
    if ($(this).scrollTop() > 1) {
    $('.backtotop').fadeIn();
    } else {
    $('.backtotop').fadeOut();
    }
    });
    $('.backtotop').click(function() {
    $('html, body').animate({scrollTop: '0px'}, 800);
    return false;
});

/*------------------------------------------------
                MENU ACTIVE AND STICKY
------------------------------------------------*/

$('.main-navigation ul li').click(function(){
    $('.main-navigation ul li').removeClass('current-menu-item');
    $(this).addClass('current-menu-item');
});

$('.main-navigation .menu-toggle').click(function(){
    $('.main-navigation ul.nav-menu').slideToggle();
});

$('.main-navigation .menu-item-has-children > a').after('<button class="dropdown-toggle" aria-expanded="false"><span class="screen-reader-text">expand child menu</span><i class="fa fa-angle-down"></i></button>');

$('.main-navigation button.dropdown-toggle').click(function() {
    $(this).toggleClass('active');
    $(this).parent().find('.sub-menu').first().slideToggle();
});

$(window).scroll(function() {    
    var scroll = $(window).scrollTop(); 
    if (scroll >= 100) {
        $(".site-header.sticky-header").addClass("is-sticky");
    }
    else {
         $(".site-header.sticky-header").removeClass("is-sticky");
    }
});


if ($(window).width() < 992) {
   $('#site-navigation').insertBefore('.site-branding-wrapper');

   $('.main-navigation ul li.menu-item-has-children > a').click(function() {
       $(this).parent().find('.sub-menu').first().slideToggle();
       $(this).toggleClass('dropdown-toggled');
   });
}

$(window).resize(function() {
    if ($(window).width() < 992) {
       $('#site-navigation').insertBefore('.site-branding-wrapper');
    }
    else 
       $('#site-navigation').insertAfter('#news-ticker');
});
/*------------------------------------------------
               SLICK SLIDER
------------------------------------------------*/
$('.news-ticker-slider').slick();

$('#main-slider .regular').slick();

$('.featured-events-slider').slick();

$('.featured-news-slider').slick();

$('.testimonial-slider').slick({
    responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2
      }
    },
    {
      breakpoint: 599,
      settings: {
        slidesToShow: 1
      }
    }
  ]
});


/*------------------------------------------------
                    PARALLAX   
------------------------------------------------*/
$.stellar({
    horizontalScrolling: false,
    verticalOffset: 3000
});

/*------------------------------------------------
                    COUNTER   
------------------------------------------------*/
function count($this){
    var current = parseInt($this.html(), 10);
    current = current + 1; /* Where 50 is increment */
    $this.html(++current);
    if(current > $this.data('count')){
        $this.html($this.data('count'));
    } 
    else {    
        setTimeout(function(){count($this)}, 50);
    }
}        
    
$(".stat-count").each(function() {
    $(this).data('count', parseInt($(this).html(), 10));
    $(this).html('0');
    count($(this));
});

/*------------------------------------------------
                    EVENTS AND NEWS   
------------------------------------------------*/

$(".featured-events-slider .slick-item").hover(function(){
    var imgurl = $(this).data("hoverimage");
    $(this).css("background-image", "url(" + imgurl + ")")
}, function(){
    $(this).css("background-image", "").fadeIn('800');
});


$(".featured-news-slider .slick-item").hover(function(){
    var imgurl = $(this).data("hoverimage");
    $(this).css("background-image", "url(" + imgurl + ")")
}, function(){
    $(this).css("background-image", "").fadeIn('800');
});


/*------------------------------------------------
                ABROAD COUNTRIES
------------------------------------------------*/
if( $(window).width() > 992 ) {
    var activeCountry = $('.abroad-countries-list .hentry:nth-child(2)');
    activeCountry.addClass('active');

    $('.abroad-countries-list .hentry').mouseenter(function() {
        $('.abroad-countries-list .hentry').removeClass('active');
        $(this).addClass('active');
    });

    $('.abroad-countries-list .hentry').mouseleave(function() {
        $('.abroad-countries-list .hentry').removeClass('active');
        $('.abroad-countries-list .hentry:nth-child(2)').addClass('active');
    });
}

/*------------------------------------------------
                SERVICES
------------------------------------------------*/
if( $(window).width() < 992 ) {
    $('#main-services .hentry:nth-child(2)').insertAfter('#main-services .hentry:nth-child(3)');
    $('#main-services .hentry:nth-child(3)').insertAfter('#main-services .hentry:nth-child(2)');
}

if($('#content section').hasClass('map')) {
    $('body').addClass('map-enabled');
}

/*------------------------------------------------
                SECTION DISABLED   
------------------------------------------------*/
if($('body.home #main-slider').hasClass('main-featured-slider')) {
    $('body').addClass('main-slider-enabled');
}
else {
    $('body').addClass('main-slider-disabled');
}

/*------------------------------------------------
                TABS   
------------------------------------------------*/
$('.tp-tabs li').click(function() {
    var tab_id = $(this).attr('data-tab');

    $('ul.tp-tabs li').removeClass('active');
    $(this).addClass('active');
    $('.tab-content').removeClass('active');
    $('.tab-content').hide();
    $("#"+tab_id).show();
});

/*------------------------------------------------
                STICKY POST   
------------------------------------------------*/

if($('.blog .archive-blog-wrapper article').hasClass('sticky')) {
    $('body').addClass('has-sticky-post');
}
else {
    $('body').addClass('no-sticky-post');
}

/*------------------------------------------------
                Header Custom Info   
------------------------------------------------*/

$('#masthead .widget_call_to_action li').click(function() {
   $(this).toggleClass('active');
   if($('#masthead .widget_call_to_action li').hasClass('active')) {
       $('#masthead .widget_call_to_action li').removeClass('active');
       $(this).addClass('active');
   }
});

$(document).click(function (e) {
    var container = $("#masthead .widget_call_to_action li");
    if (!container.is(e.target) && container.has(e.target).length === 0) {
        $('#masthead .widget_call_to_action li').removeClass('active');
    }
});

/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});