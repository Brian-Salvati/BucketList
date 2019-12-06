if (typeof jQuery != "undefined") {
    (function($) {
      $('.accordion dt').each(function() {
        $(this).on('click', function(){
          $(this).toggleClass('on').siblings('.on').removeClass('on').end()
            .next('dd').slideToggle().siblings('dd').slideUp();
        }).next('dd').hide();
      });
    })(jQuery);
  }
  