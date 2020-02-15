"use strict";

function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

var scroll = new SmoothScroll('a[href*="#"]', {
  // Selectors
  ignore: 'no-scroll',
  // Selector for links to ignore (must be a valid CSS selector)
  header: null,
  // Selector for fixed headers (must be a valid CSS selector)
  // Speed & Easing
  speed: 666,
  // Integer. How fast to complete the scroll in milliseconds
  offset: 0,
  // Integer or Function returning an integer. How far to offset the scrolling anchor location in pixels
  easing: 'easeInOutQuint',
  // Easing pattern to use
  //customEasing: function (time) {}, // Function. Custom easing pattern
  // Callback API
  before: function before() {},
  // Callback to run before scroll
  after: function after() {} // Callback to run after scroll

});

(function ($) {
  $(document).ready(function () {
    $('.scroll-top').hide();
    $(window).scroll(function showScrollButton() {
      if (100 < $(this).scrollTop()) {
        // if the window's position is greater than 100 pixels away from the top
        // of the page, fade the scroll button ins
        $('.scroll-top').fadeIn();
      } else {
        // if not, fade the button so it's out of the way
        $('.scroll-top').fadeOut();
      }
    }); // Make sure that iframes and embeds are wrapped properly for responsive display
    // collect everything that might contain embedded content

    var allIframes = $('iframe[ src*="//player.vimeo.com" ], iframe[ src*="//www.youtube.com" ], iframe[ src*="//www.google.com/maps" ], object, embed, video');
    allIframes.each(function () {
      // clean up the iframe element and add a
      // responsive class to key on later for adding wrappers
      $(this).removeAttr('height width').addClass('embed-responsive-item'); // add a wrapper around the iframe

      $(this).wrap('<div class="embed-responsive embed-responsive-16by9"></div>');
    }); // Sexy checkboxes

    $('.gfield_checkbox li ').each(function () {
      var li = $(this);
      li.children('label').append(li.children('input')).append('<span class="cr"><i class="cr-icon fas fa-check"></i></span>');
    }); // Add noreferrer attribute to all links that aren't in-page navigation

    $('a:not([href^="#"])').each(function () {
      var elem = $(this);
      elem.attr('rel', 'noreferrer');
    });
  }); // Future-proofing the forms

  $('.gform_fields > li:not([class~="col-"])').addClass('col-xs-12'); // This function pushes the footer down
  // on pages that have short content

  $(window).on('load resize', function stickyFooter() {
    // sticky footer stuff
    var windowHeight = $(window).height(),
        adminbarHeight = $('#wpadminbar').height(),
        contentHeight = $('.wrapper').outerHeight(),
        footerHeight = $('footer').outerHeight();

    if (contentHeight + footerHeight < windowHeight) {
      if ($('#wpadminbar').length) {
        $('.wrapper').css('margin-bottom', windowHeight - (contentHeight + footerHeight + adminbarHeight));
      } else {
        $('.wrapper').css('margin-bottom', windowHeight - (contentHeight + footerHeight));
      }
    }
  }); // Resize the masthead so that it better keeps the aspect ratio
  // of the original background image regardless of screen width.

  $(window).on('resize', function mastheadSize() {
    var width = $('.jumbotron').width();
    var height = $('.jumbotron .row').height();
    var mqxs = window.matchMedia('screen and ( max-width: 767px )');

    if (mqxs.matches === false || _typeof(mqxs.matches) === undefined) {
      $('.jumbotron.upper-masthead').css('padding-top', width * 0.329 - height);
      $('.jumbotron.lower-masthead').css('padding-bottom', width * 0.43 - height);
      $('.jumbotron.landing-masthead').css('padding-top', width * 0.329 - height);
      $('.jumbotron.landing-masthead').css('text-align', 'right');
    } else {
      $('.jumbotron.upper-masthead, .jumbotron.landing-masthead .masthead-copy-area').removeAttr('style');
      $('.jumbotron.landing-masthead').css('padding-top', width * 0.5 - height);
      console.log($(window).width());
    }
  }).trigger('resize');
})(jQuery);