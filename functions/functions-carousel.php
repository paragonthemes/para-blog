<?php 
/**
* Featured Carousel on header front page.
 */
if(!function_exists( 'para_blog_header_carousel' ) ) :
	function para_blog_header_carousel(){ 
		if( is_front_page() ){
		$show_carousel = absint( get_theme_mod( 'para_blog_show_slider_header' ) );
		if( $show_carousel == 1 ){
			 
		  $stickypost =get_theme_mod( 'para_blog_header_sticky_post_carousel' );
		 
			para_blog_get_carousel($stickypost); 
		 }
		} // is_front_page
	}
endif;
