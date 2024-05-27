(function($){    
  var stickyMenu = function (arg) {
      this.navWrapper = arg.navWrapper;
      this.navMenu = arg.navMenu;
      this.init();
      var that = this;
      $(window).resize(function () {
          that.init();
      });
  };

  stickyMenu.prototype.init = function(){
    var navSelector = this.navMenu;
    var navWrapperSelector = this.navWrapper;
    var navHeight = $(navSelector).outerHeight();
    $(navWrapperSelector).css('height', navHeight+'px');
  }    
  //creating object
  var stickyMenuObj = new stickyMenu ({"navWrapper":".navigation-wrap", "navMenu": ".nav-search-outer"});
    
}(jQuery));
 
jQuery(document).ready(function($) { "use strict";

    /**
     * PRE LOADER 
    */
    $('.spidermag-preloader').delay(300).fadeOut('slow');
    
    /**
     * Date and Time Settings 
    */
    try {
        var datetime = null,
        date = null;
        var update = function() {
          date = moment( new Date() )
          datetime.html(date.format('dddd, D MMMM  YYYY, h:mm:ss a'));
        };
        datetime = $('#time-date')
        update();
        setInterval(update, 1000);
    } catch(err) {

    }

    /**
      * ScrollUp
    */
    jQuery(window).scroll(function() {
       if (jQuery(this).scrollTop() > 1000) {
           jQuery('.scrollup').fadeIn();
       } else {
           jQuery('.scrollup').fadeOut();
       }
    });

    jQuery('.scrollup').click(function() {
       jQuery("html, body").animate({
           scrollTop: 0
       }, 2000);
       return false;
    });    

    /**
      * MASONRY
    */
    $('.grid').masonry({
      itemSelector: '.masonry-item',
    });
    setTimeout(function(){
        $('.grid').masonry({
        itemSelector: '.masonry-item',
      });
    },5000)

    /**
     * MASONRY BLOG LINK NUDGING
    */
    $('.masonry-item a.more').hover(function() { //mouse in
      $(this).animate({
        paddingLeft: '30px'
      }, 400);
      }, function() { //mouse out
        $(this).animate({
        paddingLeft: 15
      }, 400);
    });


    /**
     * WOW ANIMATION
    */
    new WOW().init();

    /**
    * MODAL BOXES & POP UP WINDOWS OR IMAGES
    */
    $('.open-popup-link').magnificPopup({
      removalDelay: 500, //delay removal by X to allow out-animation
      callbacks: {
        beforeOpen: function() {
          this.st.mainClass = this.st.el.attr('data-effect');
        }
      },
      midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
    });

    $('.popup-img').magnificPopup({
      type: 'image'
    }); 
   

    /**
     * SEARCH BAR
    */
    $(".search-container").hide();
      $(".toggle-search").on("click", function(e) {
      e.preventDefault();
      e.stopPropagation();
      $(".search-container").slideToggle(500, function() {
        $("#search-bar").focus();
      });
    });

    /**
     * Close the search bar if user clicks anywhere
    */
    $(document).click(function(e) {
      var searchWrap = $(".search-container");
      if (!searchWrap.is(e.target) && searchWrap.has(e.target).length === 0 ) {
        searchWrap.slideUp(500);
      }
    });

    /**
     * ADDING SLIDE UP AND ANIMATION TO DROPDOWN
    */
    enquire.register("screen and (min-width:767px)", { match: function() {
      $(".dropdown").hover(function() {
          $('.dropdown-menu', this).stop().fadeIn("slow");
        }, function() {
          $('.dropdown-menu', this).stop().fadeOut("slow");
        });
      },
    });


    /**
     * SpiderMag Sub Menu
    */
    $('.navbar .menu-item-has-children').append('<span class="sub-toggle"> <i class="fa fa-plus"></i> </span>');
    $('.navbar .page_item_has_children').append('<span class="sub-toggle-children"> <i class="fa fa-plus"></i> </span>');

    $('.navbar .sub-toggle').click(function() {
        $(this).parent('.menu-item-has-children').children('ul.dropdown-menu').first().slideToggle('1000');
        $(this).children('.fa-plus').first().toggleClass('fa-minus');
    });

    $('.navbar .sub-toggle-children').click(function() {
        $(this).parent('.page_item_has_children').children('ul.children').first().slideToggle('1000');
        $(this).children('.fa-plus').first().toggleClass('fa-minus');
    });

    /**
     * STICKY NAVIGATION
    */
    try {
        $(window).scroll(function() {
          var menuOffset = $('.nav-search-outer').offset().top;
            if ($(window).scrollTop() >= menuOffset) {
            $('.nav-search-outer').addClass('navbar-fixed-top');
          }
          if ($(window).scrollTop() >= 100) {
            $('.nav-search-outer').addClass('show');
            } else {
            $('.nav-search-outer').removeClass('show navbar-fixed-top');
          }
        });
    } catch(err) {

    }
    
    /**
     * HOT NEWS
    */
    try{
        $('.js-news').ticker();
    }catch(e){
        //console.log( e );
    } 

    $(".vid-thumbs").lightSlider({
        item:1,
        pager:true,
        vertical:true,
        loop:true,
        speed:400,
        controls:false,
        auto:false,
        slideMargin:0
    });

    /**
     *  Thumbinalk Banner
    */
    $(".banner-thumbs").lightSlider({
        item:4,
        pager:false,
        loop:true,
        speed:600,
        controls:true,
        slideMargin:10,
        auto:true,
        pauseOnHover:true,
        onSliderLoad: function() {
            $('.banner-thumbs').removeClass('cS-hidden');
        },
        responsive : [
            {
                breakpoint:1199,
                settings: {
                    item:3,
                    slideMove:1,
                    slideMargin:6,
                  }
            },
            {
                breakpoint:979,
                settings: {
                    item:2,
                    slideMove:1,
                  }
            },
            {
                breakpoint:480,
                settings: {
                    item:1,
                    slideMove:1,
                  }
            }
        ]
    });


    /**
     *  Thumbinalk Banner
    */
    $(".owl-lifestyle").lightSlider({
        item:3,
        pager:false,
        loop:true,
        speed:600,
        controls:true,
        slideMargin:10,
        auto:true,
        pauseOnHover:true,
        onSliderLoad: function() {
            $('.owl-lifestyle').removeClass('cS-hidden');
        },
        responsive : [
            {
                breakpoint:1199,
                settings: {
                    item:3,
                    slideMove:1,
                    slideMargin:6,
                  }
            },
            {
                breakpoint:979,
                settings: {
                    item:2,
                    slideMove:1,
                  }
            },
            {
                breakpoint:480,
                settings: {
                    item:1,
                    slideMove:1,
                  }
            }
        ]
    });

    
    $('.spider_slider').lightSlider({
        gallery:true,
        item:1,
        thumbItem:4,
        thumbMargin:10,
        slideMargin:0,
        loop:true,
        onSliderLoad: function() {
            $('.spider_slider').removeClass('cS-hidden');
        },
    });
});