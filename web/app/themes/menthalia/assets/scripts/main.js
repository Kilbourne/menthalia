(function($) {
        function maxH($el,cond){
          if(cond){
            $el.height("auto");
            var maxHeight = Math.max.apply(null, $el.map(function (){return $(this).height();}).get());
            var filtred=$el.filter(function(){ return $(this).height()!==maxHeight;});
            filtred.height(maxHeight);
              }
        }

        function setMaxH(fn){
            setTimeout(fn,500);
            $(window).resize(fn);
        }
  var Sage = {

    'common': {
      init: function() {
        var s = skrollr.init({forceHeight: false});
        //$('video').each(function(index, el) {
        //  if(el.attributes.autoplay.value=="true") el.play();
        //});
        $('.site-claim').flowtype({minFont : 19,maxFont: 32});
        $('.aree-menthalia .area-title').flowtype({minFont : 40,maxFont: 70,maximum : 1280,fontRatio : 10});
        $('.video-cont .claim').flowtype({minFont : 24,maxFont: 48,maximum : 1280,fontRatio : 25});
      },
    },
    'home': {
      init: function() {

        setMaxH(        function (){
          var posts=$("article.post"),
          cond=$(window).width()>530;

          maxH(posts.find(".entry-title"),cond);
          maxH(posts.find(".entry-image"),cond);
          maxH(posts,cond);
        });

      }
    },
    'page_template_area_methalia': {
      init: function() {
       //        var imageRatio=0.46875,
       //inverseRatio=1.6;
       var menuMinHeight=118;
       //          var parallax=$('#parallax'),images,
       //  parallaxImages=parallax.add(parallax.children('.background'));
       //  //parallaxResize();
       //$(window).resize(function() { //parallaxResize();
       //  moveFiammifero();
       //})
       function ScrollDesc(){
          var dest=$('#services-desc').offset().top-(( $(window).height() - $('#services-desc').height() )/2);
                  if( Math.abs(dest-$(window).scrollTop())<$(window).height()*.4   ) return;
                              $('html,body').animate({
                scrollTop: dest
            }, 1250, 'swing');
        }
//$(window).scroll(moveFiammifero);
        $('.service>a').click(function(event) {
            event.preventDefault();

            var parent =$(this).parent();
            if(parent.hasClass('active')){ ScrollDesc(); return; }
            $('.service').removeClass('active');
            parent.addClass('active');
            var i =parent.index('.service');
            $('.service-desc.active').fadeOut('400', function() {
              $(this).removeClass('active');

              $('.service-desc').eq(i).fadeIn('400', function() {
                  $(this).addClass('active');

              });
            });
ScrollDesc();
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
           setMaxH(        function (){
          maxH($(".service-title"),true);
        });

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
    'ecm':{
      init:function(){
        setTimeout(function(){
                  var maxHeight = Math.max.apply(null, $("article.eventi .entry-summary").map(function ()
{
    return $(this).height();
}).get());
        $('article.eventi .entry-summary').find('.data,.entry-title').height(maxHeight);
        $('article.eventi .entry-summary .data').css('lineHeight',maxHeight+'px');
        },500);

      }
    },
    'single_post':{
      init:function(){
        $('.entry-title').flowtype({maxFont : 52,minFont:24,fontRatio:15,maximum:1800});
        $('.type-post').flowtype({maxFont : 22,minFont:18,fontRatio:30,maximum:1800});
      }
    },
    'blog':{
      init:function(){
        $.fn.almComplete = function(alm){

          alm.disable_ajax &&
          $('.posts-navigation').show();
        };
      }
    },
    'purple_people':{
      init:function(){
        $('.gallery-icon>a').magnificPopup({
          type: 'image',
          gallery:{
            preload: [0,2],
            enabled:true
          }
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
