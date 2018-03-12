<?php 
/*
* Load Custom Functions required on theme. 
*
*/
if ( !function_exists('para_blog_list_category') ) :
    function para_blog_list_category( $post_id = 0 ) {

        if( 0 == $post_id ){
            global $post;
            if( isset( $post->ID )){
                $post_id = $post->ID;
            }
        }
        if( 0 == $post_id ){
            return null;
        }
        $categories = get_the_category($post_id);
        $separator = '&nbsp;';
        $output = '';
        if($categories) {
            $output .= '<span class="cat-name">';
            foreach($categories as $category) {
                $output .= '<a href="'.esc_url( get_category_link( $category->term_id ) ).'"  rel="category tag">'.esc_html( $category->cat_name ).'</a>'.$separator;
            }
            $output .='</span>';
            echo trim($output, $separator);
        }

    }
endif;



/*
* Remove [...] from default fallback excerpt content
*
*/
function para_blog_excerpt_more( $more ) {
	if(is_admin())
	{
		return $more;
	}
	return '';
}
add_filter( 'excerpt_more', 'para_blog_excerpt_more');


/**
 * Date functions
 */

function para_blog_date_display( $format = 'l, F j, Y') {
    echo esc_html( date_i18n( $format, current_time( 'timestamp' ) ) );
}

/**
 * Goto Top functions
 */

function para_blog_go_to_top(){
	$go_to_top = absint( get_theme_mod( 'para_blog_goto_top' ) );
	if ( $go_to_top == 1 ) {
	    ?>
	    <a id="toTop" href="#" title="<?php esc_attr_e('Go to Top','para-blog');?>"><i class="fa fa-angle-double-up"></i></a>
	<?php }
}

/**
 * Change font size of tag cloud, making it same size for all
 */
add_filter( 'widget_tag_cloud_args','para_blog_set_cloud_tag_size' );
function para_blog_set_cloud_tag_size( $args ) {
	$args = array( 'smallest'    => 12, 'largest'    => 12 );
	return $args;
}


/**
 * Get selected sidebar option on customizer
 */
function para_blog_get_sidebar_option(){
	$sidebar = esc_attr( get_theme_mod( 'para_blog_sidebar-options' ) );
	return $sidebar;
}

/**
 * CSS class for main content div based on sidebar selected
 */
function para_blog_get_main_class( $sidebar ){
	if( $sidebar == 'no-sidebar' ){
		$main_box_class = 'col-sm-12';
	}elseif( $sidebar == 'left-sidebar' ){
		$main_box_class = 'col-sm-9 col-sm-push-3';
		$sidebar_class = 'col-sm-3 col-sm-pull-9';
	}else{
		$main_box_class = 'col-sm-9';
	}
	return $main_box_class;
}

/**
 * CSS class for sidebar content div based on sidebar selected
 */
function para_blog_get_sidebar_class( $sidebar ){
	if( $sidebar == 'no-sidebar' ){
		$sidebar_class = '';
	}elseif( $sidebar == 'left-sidebar' ){
		$sidebar_class = 'col-sm-3 col-sm-pull-9';
	}else{
		$sidebar_class = 'col-sm-3';
	}
	return $sidebar_class;
}


/**
 * Change Excerpt Length.
 */
if( ! function_exists( 'para_blog_excerpt_length' ) ) :
	function para_blog_excerpt_length( $length ) {
		$excerpt_length = 40;
               if(!is_admin()){
		$length = absint( get_theme_mod( 'para_blog_excerpt_length' ) );
		if( !empty( $length ) ){
			$excerpt_length = $length;
		}
}
		return $excerpt_length;
	}
	endif;
	add_filter( 'excerpt_length', 'para_blog_excerpt_length', 999 );

/*
* Exclude Categories From WordPress Loop
*/
if( ! function_exists( 'para_blog_exclude_category' ) ) :
	function para_blog_exclude_category( $query ) {
		if( $query->is_home && $query->is_main_query()   ) {
			$cat_array = get_theme_mod( 'para_blog_category_hide' );

            if( ( !empty( $cat_array ) ) && ( !is_string( $cat_array ) ) ) {
                $category_array = array();
                foreach( $cat_array as $value ) {
                    $category_array[] = '-' . absint( $value );
                }

                if( !empty( $category_array ) ) {
                    set_query_var( 'category__not_in', $category_array );
                }
            }

		}

	}
	endif;
	add_action( 'pre_get_posts', 'para_blog_exclude_category' );

/**
 * Show post meta 
 */
function para_blog_show_post_meta(){
	$hide_post_meta = absint( get_theme_mod( 'para_blog_post_meta' ) );
	if( empty( $hide_post_meta ) ){
		?>
		<div class="entry-meta">
			<?php 
				para_blog_posted_on(); 
			?>
		</div><!-- .entry-meta -->
		<?php
	}
}


/**
 * Carousel on front page
 */
function para_blog_get_carousel($stickypost){
    $args = array(
	'posts_per_page' => -1,
	'post__in'  => get_option($stickypost),
	'ignore_sticky_posts' => 1
);
	$slider_query = new WP_Query( $args );
	if( $slider_query-> have_posts() ): 
		?>
	<div class="cat-carousel">
		<ul class="bxslider">
			<?php while( $slider_query->have_posts() ) : $slider_query->the_post(); ?>
				<li>
					<a href="<?php the_permalink(); ?>">
						<?php 
						if( has_post_thumbnail() ){
							the_post_thumbnail( 'full');
						}
						?>
						</a>
						<div class="slide-details">
							<div class="slider-content-inner">
  								<div class="slider-content">
									<?php para_blog_list_category(); ?>
									<h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>

									<p><?php the_excerpt();?></p>
									<a href="<?php the_permalink()?>" class="para-blog-read-more">
									    <?php esc_html_e( 'Read More', 'para-blog' );?>
									</a>
								</div>
							</div>
						</div>
						<div class="overly"></div>
				</li>
			<?php endwhile; wp_reset_postdata(); ?>
		</ul>
	</div>
	<?php
	endif;

} # para_blog_get_carousel


/**
 * Change Color Scheme as selected on customizer
 */
add_action( 'wp_head', 'para_blog_color_scheme', 100 );
if( ! function_exists( 'para_blog_color_scheme' ) ) :
	function para_blog_color_scheme(){
		$color_scheme = esc_attr( get_theme_mod( 'para_blog_color_scheme' ) );
		if( $color_scheme != 'default' ){
			?>
			<style type="text/css">
				.cat-links a,
				.comments-link a,
				.tags-links a,
				a:hover,
				.site-branding div,
				.tags-links a:hover,
				.entry-meta a,
				.comments-area .comment-body .comment-metadata time,
				.widget_categories ul li a::after, 
				.widget_archive ul li a::after{
					color: #<?php echo $color_scheme ?>;
				}
				.tags-links a,
				.all-blogs article.sticky,
				.wp-pagenavi span,
				.wp-pagenavi a,
				.wp-pagenavi span.current,
				.widget-title,
				.nav .open > a,
				.nav .open > a:focus,
				.nav .open > a:hover{
					border-color: #<?php echo $color_scheme ?>;
				}
				.widget #today,
				#toTop, .search-wrapper a,
				.search-bar-box,
				.search-bar-box input,
				#menu-social li a,
				.nav > li > a:focus,
				.nav > li > a:hover,
				.dropdown-menu > li > a:focus,
				.dropdown-menu > li > a:hover,
				.nav .open > a,
				.nav .open > a:focus,
				.nav .open > a:hover{
					background-color: #<?php echo $color_scheme ?>;
				}
				.wp-pagenavi span.current,
				.more-btn,
				.slider-content .cat-name a,
				.post-navigation-block a,
				.nav-previous a, .nav-next a,
				.search-wrapper,
				input[type="submit"],
				.comments-area .comment-body .reply a{
					background:  #<?php echo $color_scheme ?>;
				}


			</style>
			<?php
		}

	} # para_blog_color_scheme
	endif;