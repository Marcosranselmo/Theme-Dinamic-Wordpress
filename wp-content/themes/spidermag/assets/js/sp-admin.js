jQuery(document).ready(function( $ ) {
  /** 
    * Preloader Selection 
  */  
  $(".cmizer-preloader").click(function (e) {
      e.preventDefault();
      var preloader = $(this).attr("preloader");
      
      $(this).parents(".cmizer-preloader-container").find('.cmizer-preloader').removeClass('active');
      $(this).addClass('active');
      $(this).parents(".cmizer-preloader-container").next('input:hidden').val(preloader).change();
  });

});


(function ($) {
    jQuery(document).ready(function ($) {


        $('.sparkle-customizer').on( 'click', function( evt ){
            evt.preventDefault();
            section = $(this).data('section');
            if ( section ) {
                wp.customize.section( section ).focus();
            }
        });

    });
})(jQuery);