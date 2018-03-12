  jQuery(document).ready(function($){

    // Search in Header
    if( $('.search-wrapper').length > 0 ) {
      $('.search-wrapper a').click(function(e){
        e.preventDefault();
        $(".search-bar-box").toggle(500);
      });

    }

    // Initialize bxslider for carousel
    if ( $('.bxslider').length > 0 ) {
      jQuery('.bxslider').show().bxSlider({
        minSlides: 1,
        maxSlides: 1,
        adaptiveHeight: 500,
        slideMargin: 0,
        pager: false,
        auto: true
      });
    }

  // Initialize bxslider for carousel
  if ( $('.bxslider-carousel-footer').length > 0 ) {
    jQuery('.bxslider-carousel-footer').bxSlider({
      minSlides: 6,
      maxSlides: 6,
      slideWidth: 500,
      slideMargin: 0,
      auto: true,
      pager: false,
    });
  }


    // Initialize gototop for carousel
    if ( $('#toTop').length > 0 ) {
    // Hide the toTop button when the page loads.
    $("#toTop").css("display", "none");
    
      // This function runs every time the user scrolls the page.
      $(window).scroll(function(){

        // Check weather the user has scrolled down (if "scrollTop()"" is more than 0)
        if($(window).scrollTop() > 0){

          // If it's more than or equal to 0, show the toTop button.
          $("#toTop").fadeIn("slow");
        }
        else {
          // If it's less than 0 (at the top), hide the toTop button.
          $("#toTop").fadeOut("slow");

        }
      });

      // When the user clicks the toTop button, we want the page to scroll to the top.
      jQuery("#toTop").click(function($){

        // Disable the default behaviour when a user clicks an empty anchor link.
        // (The page jumps to the top instead of // animating)
        event.preventDefault();

        // Animate the scrolling motion.
        jQuery("html, body").animate({
          scrollTop:0
        },"slow");

      });
    }


  });