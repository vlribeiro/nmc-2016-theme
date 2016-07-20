(function ($, $w) {
  'use strict';

  var NmcApp = {};

  NmcApp.events = (function() {
    var config = function() {
      $('.nmc-top-bar__action-button').on('click', toggleMenuClick);
      $('a.capa-post').on('mouseenter mouseleave', hoverCapa);
    }

    var toggleMenuClick = function(e) {
      $('.nmc-top-bar__menu').toggleClass('hide');
      $('.nmc-top-bar__action-button').toggleClass('fa-bars');
      $('.nmc-top-bar__action-button').toggleClass('fa-times');
    }

    var linearGradient = 'linear-gradient(135deg, rgba(90,38,87,.4) 0%, rgba(238,43,114,.4) 50%, rgba(254,189,36,.4) 100%)';

    var hoverCapa = function(e) {
      var capaPost = $(this);
      var actualBackgroundImage = capaPost.css('background-image');

      if (e.type == "mouseenter") {
        capaPost.css('background-image', linearGradient + ',' + actualBackgroundImage);
      }
      else {
        capaPost.css('background-image', actualBackgroundImage.match(/url.+$/));
      }
    }

    return {
      config: config
    }
  })();

  NmcApp.init = function() {
    NmcApp.events.config();
  }

  $w.addEventListener('load', NmcApp.init);

}) ($, window);
