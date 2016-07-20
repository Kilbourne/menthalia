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
        var s = skrollr.init();
        $('.site-claim').flowtype({minFont : 19,maxFont: 32});
        $('.aree-menthalia .area-title').flowtype({minFont : 40,maxFont: 70,maximum : 1280,fontRatio : 10});
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
    // About us page, note the change from about-us to about_us.
    'page_template_service': {
      init: function() {
                var imageRatio=0.46875,
        inverseRatio=1.6,
        menuMinHeight=118;
                  var parallax=$('#parallax'),images,
          parallaxImages=parallax.add(parallax.children('.background'));
          //parallaxResize();
        $(window).resize(function() { //parallaxResize(); 
          moveFiammifero();
        })
$(window).scroll(moveFiammifero);
        $('.service>a').click(function(event) {
            event.preventDefault();

            var parent =$(this).parent();
            if(parent.hasClass('active')) return;
            $('.service').removeClass('active');
            parent.addClass('active');
            var i =parent.index('.service');
            $('.service-desc.active').fadeOut('400', function() {
              $(this).removeClass('active');
              $('.service-desc').eq(i).fadeIn('400', function() {
                  $(this).addClass('active');
              });
            });

        });
function moveFiammifero() {
            var y = $(window).scrollTop(),
            fiammifero=$(".fiammifero"),
            h=fiammifero.height(),
            y2=(parallax.height()*35)/100;
            if(y<h*0.27){
             fiammifero.css('top', y2);  
            }else{
             fiammifero.css('top', y+y2-(h/4));
            }           
}
        function parallaxResize(){
          var vpW=$( window ).width()*imageRatio,H=$( window ).height()-menuMinHeight;
          var val=vpW>H?H:vpW;
          parallax.height(val);
          parallaxImages.width(val*inverseRatio);          
          moveFiammifero();
        }
      }
    },
    'post_type_archive_eventi':{
      init:function(){
        $('.entry-title').flowtype({maxFont : 24,fontRatio:25,minimum:500,maximum:1000});
      }
    },
    'eventi_passati':{
      init:function(){
        $('.entry-title').flowtype({maxFont : 24,fontRatio:25,minimum:500,maximum:1000});
      }
    },
    'blog':{
      init:function(){
        $.fn.almComplete = function(alm){

          alm.disable_ajax &&
          $('.posts-navigation').show();
        };
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
