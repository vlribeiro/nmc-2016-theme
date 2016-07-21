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

    var linearGradient = 'linear-gradient(135deg, rgba(80,0,80,.6) 0%, rgba(255,27,116,.6) 50%, rgba(255,204,0,.6) 100%)';

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

  NmcApp.fullBleed = (function() {
    var config = function() {
      $('.conteudo-post p:has(.bleed-image)').addClass('full-bleed');
    }

    return {
      config: config
    }
  })();

  NmcApp.init = function() {
    NmcApp.events.config();
    NmcApp.fullBleed.config();
  }

  $w.addEventListener('load', NmcApp.init);

}) ($, window);
