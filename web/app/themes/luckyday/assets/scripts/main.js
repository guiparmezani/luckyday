/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
        $('.wp_pp_button_other_amt_section').html($('.wp_pp_button_other_amt_section input'));

        $('.generic-card-wrapper').click(function(e){
          e.preventDefault();
          var clickedElement = $(this);

          $('.generic-full-profile .generic-image-src').attr('src', clickedElement.find('.generic-image-src').text());
          $('.generic-full-profile .generic-name').text(clickedElement.find('.generic-name').text());
          $('.generic-full-profile .generic-content').text(clickedElement.find('.generic-content.hidden').text());

          $('.buy-it-section .stripe-games').each(function(){
            if ($(this).hasClass(clickedElement.find('.generic-card').attr('id'))) {
              $(this).show();
            } else {
              $(this).hide();
            }
          });

          $('.buy-it-section .paypal-games').each(function(){
            if ($(this).hasClass(clickedElement.find('.generic-card').attr('id'))) {
              $(this).show();
            } else {
              $(this).hide();
            }
          });

          if($(this).attr('href') === '#buy-it-section') {
            $('#donate-section').hide();
            $('#buy-it-section').show();
            $(window).scrollTo('#buy-it-section', 500);
            return;
          } if($(this).attr('href') === '#donate-section') {
            $('#donate-section').show();
            $('#buy-it-section').hide();
            $(window).scrollTo('#donate-section', 500);
            return;
          }

          $(window).scrollTo('.generic-full-profile', 500);

        });

        $('.main-banner .down-angle').click(function(){
          $(window).scrollTo('.presentation', 500);
        });

        $('.launch-modal-gallery').click(function(){
          var clickedElement = $(this).closest('.gallery-card');
          var i = 0;

          $('.gallery-modal .carousel-inner').html('');
          $('.gallery-modal .modal-header h4').text(clickedElement.find('.gallery-name').text());

          clickedElement.find('.gallery-photo').each(function(){
            if (i===0) {
              $('.gallery-modal .carousel-inner').append('<div class="item active"><img src="' + $(this).text() + '" alt="' + $(this).text() + '"></div>');
            } else {
              $('.gallery-modal .carousel-inner').append('<div class="item"><img src="' + $(this).text() + '" alt="' + $(this).text() + '"></div>');
            }
            i++;
          });
        });

        $('.wp_pp_button_submit_btn input').addClass('stripe-button-el');

      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // Buy It page
    'buy_it': {
      init: function() {
        // JavaScript to be fired on the buy it page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
