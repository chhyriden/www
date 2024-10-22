// preloader
jQuery(window).on('load', function() {
  jQuery('#status').fadeOut();
  jQuery('#preloader').delay(350).fadeOut('slow');
  jQuery('body').delay(350).css({'overflow':'visible'});
})

// toggle button
jQuery(function($){
  $( '.toggle-nav button' ).click( function(e){
    $( 'body' ).toggleClass( 'show-main-menu' );
    var element = $( '.sidenav' );
    foodie_review_blog_trapFocus( element );
  });

  $( '.close-button' ).click( function(e){
    $( '.toggle-nav button' ).click();
    $( '.toggle-nav button' ).focus();
  });
  $( document ).on( 'keyup',function(evt) {
    if ( $( 'body' ).hasClass( 'show-main-menu' ) && evt.keyCode == 27 ) {
      $( '.toggle-nav button' ).click();
      $( '.toggle-nav button' ).focus();
    }
  });
});

function foodie_review_blog_trapFocus( element, namespace ) {
  var foodie_review_blog_focusableEls = element.find( 'a, button' );
  var foodie_review_blog_firstFocusableEl = foodie_review_blog_focusableEls[0];
  var foodie_review_blog_lastFocusableEl = foodie_review_blog_focusableEls[foodie_review_blog_focusableEls.length - 1];
  var KEYCODE_TAB = 9;

  element.keydown( function(e) {
    var isTabPressed = ( e.key === 'Tab' || e.keyCode === KEYCODE_TAB );

    if ( !isTabPressed ) {
      return;
    }

    if ( e.shiftKey ) /* shift + tab */ {
      if ( document.activeElement === foodie_review_blog_firstFocusableEl ) {
        foodie_review_blog_lastFocusableEl.focus();
        e.preventDefault();
      }
    } else /* tab */ {
      if ( document.activeElement === foodie_review_blog_lastFocusableEl ) {
        foodie_review_blog_firstFocusableEl.focus();
        e.preventDefault();
      }
    }
  });
}

// scroll to top
jQuery(document).ready(function () {
  jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 0) {
      jQuery('#button').fadeIn();
    } else {
      jQuery('#button').fadeOut();
    }
  });
  jQuery('#button').click(function () {
    jQuery("html, body").animate({
      scrollTop: 0
    }, 600);
    return false;
  });

  foodie_review_blog_search_focus();
  
});

// search
function foodie_review_blog_search_focus() {

  /* First and last elements in the menu */
  var foodie_review_blog_search_firstTab = jQuery('.serach_inner input[type="search"]');
  var foodie_review_blog_search_lastTab  = jQuery('button.search-close'); /* Cancel button will always be last */

  jQuery(".search-open").click(function(e){
    e.preventDefault();
    e.stopPropagation();
    jQuery('body').addClass("search-focus");
    foodie_review_blog_search_firstTab.focus();
  });

  jQuery("button.search-close").click(function(e){
    e.preventDefault();
    e.stopPropagation();
    jQuery('body').removeClass("search-focus");
    jQuery(".search-open").focus();
  });

  /* Redirect last tab to first input */
  foodie_review_blog_search_lastTab.on('keydown', function (e) {
    if (jQuery('body').hasClass('search-focus'))
    if ((e.which === 9 && !e.shiftKey)) {
      e.preventDefault();
      foodie_review_blog_search_firstTab.focus();
    }
  });

  /* Redirect first shift+tab to last input*/
  foodie_review_blog_search_firstTab.on('keydown', function (e) {
    if (jQuery('body').hasClass('search-focus'))
    if ((e.which === 9 && e.shiftKey)) {
      e.preventDefault();
      foodie_review_blog_search_lastTab.focus();
    }
  });

  /* Allow escape key to close menu */
  jQuery('.serach_inner').on('keyup', function(e){
    if (jQuery('body').hasClass('search-focus'))
    if (e.keyCode === 27 ) {
      jQuery('body').removeClass('search-focus');
      foodie_review_blog_search_lastTab.focus();
    };
  });
}

// Slider
jQuery(document).ready(function() {
  jQuery('.owl-carousel').owlCarousel({
    loop: true,
    margin: 0,
    nav: true,
    navText: ["<i class='fa-solid fa-arrow-left'></i>", "<i class='fa-solid fa-arrow-right'></i>"],
    dots: false,
    rtl: false,
    items: 1,
    autoplay: true,
  });
});

// Title Color
jQuery( document ).ready(function() {
  jQuery("#slider-cat h1 a, .video-content .video-title").each(function() {
    var t = jQuery(this).text();
    var splitT = t.split(" ");
    console.log(splitT);
    var halfIndex = 2;
    var newText = "";
    for(var i = 0; i < splitT.length; i++) {
      if(i == halfIndex) {
        newText += "<span style='color:#44A05B'>";
        newText += splitT[i] + " ";
        newText += "</span>";
      }else{
        newText += splitT[i] + " ";
      }     
    }   
    jQuery(this).html(newText);
  });
});

// Social Links
jQuery('document').ready(function($){
  jQuery('.share-btn-parent').on('click', function(){
    jQuery(this).parent('.socialbox').find('.show-icon').toggleClass('show_hide');
  });
  jQuery('.share-btn-parent').on('click', function(){
    jQuery(this).find('.share-i').toggleClass('green');
  });
});