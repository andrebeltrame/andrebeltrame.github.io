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
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
        $('.testimonial .read-more').on('click', function(event){
          event.preventDefault();
          var $this = $(this),
            $div = $this.parent();

          $div.find('.content').toggleClass('ellipsis');
        });

        $(".testimonials-slider").slick({
          autoplay: true,
          fade: true,
          prevArrow: '<button type="button" class="slick-prev">Anterior</button>',
          nextArrow: '<button type="button" class="slick-next">Próximo</button>'
        });

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
    // About us page, note the change from about-us to about_us.
    'duofresh': {
      init: function() {
        // JavaScript to be fired on the about us page

      },
      finalize: function() {
        $("#business-slider-feature").slick({
          autoplay: true,
          fade: true,
          mobileFirst: true,
          prevArrow: '<button type="button" class="slick-prev">Anterior</button>',
          nextArrow: '<button type="button" class="slick-next">Próximo</button>',
          dots: true
        });

        $("#business-slider, .feature-slider .row").slick({

          fade: true,
          mobileFirst: true,
          arrows: false,
          dots: true,
          responsive: [{
            breakpoint: 180,
            settings: {
              autoplay: true
            }
          }, {
            breakpoint: 768,
            settings: "unslick" // destroys slick
          }]
        });

        var url = document.location.toString();
        if (url.match('#')) {
          $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
          $('html, body').animate({
              scrollTop: ($('#' + url.split('#')[1]).offset().top - $('.nav-tabs').height())
          }, 600);
        }

        // Change hash for page-reload
        $('.nav-tabs a').on('shown.bs.tab', function (e) {
          $('html, body').animate({
              scrollTop: ($(e.target.hash).offset().top - $('.nav-tabs').height())
          }, 600);

          // window.location.hash = e.target.hash;
          $("#business-slider-feature").slick('unslick');
          $("#business-slider, .feature-slider .row").slick('unslick');

          $("#business-slider-feature").slick({
            autoplay: true,
            fade: true,
            mobileFirst: true,
            prevArrow: '<button type="button" class="slick-prev">Anterior</button>',
            nextArrow: '<button type="button" class="slick-next">Próximo</button>',
            dots: true
          });

          $("#business-slider, .feature-slider .row").slick({

            fade: true,
            mobileFirst: true,
            arrows: false,
            dots: true,
            responsive: [{
              breakpoint: 180,
              settings: {
                autoplay: true
              }
            }, {
              breakpoint: 768,
              settings: "unslick" // destroys slick
            }]
          });

        });

        // Clink on page menu
        $('.menu-duofresh .sub-menu a').on('click', function(e) {
          e.preventDefault();
          var menuUrl = $(this).attr("href");
          $('.nav-tabs a[href="#' + menuUrl.split('#')[1] + '"]').tab('show');
          $('html, body').animate({
              scrollTop: ($('#' + url.split('#')[1]).offset().top - $('.nav-tabs').height())
          }, 600);
        });

        $(".modal-wide").on("show.bs.modal", function() {
          var height = $(window).height() - 200;
          $(this).find(".modal-body").css("max-height", height);
        });

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
