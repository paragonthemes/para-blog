<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * You can add an optional custom header image to header.php like so &hellip
 *
 * @link http://codex.wordpress.org/Custom_Headers
 *
 * @package Para_Blog
 */

function para_blog_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'para_blog_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'b08653',
		'flex-height'            => true,
		'wp-head-callback'       => 'para_blog_header_style',
		
	) ) );
}
add_action( 'after_setup_theme', 'para_blog_custom_header_setup' );

if ( ! function_exists( 'para_blog_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see para_blog_custom_header_setup().
 */
function para_blog_header_style() {
	$header_text_color = get_header_textcolor();
	if (get_theme_support('custom-header', 'default-text-color') === $header_text_color) {
			return;
		}
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' === $header_text_color ) :
	?>
		.site-title a,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // para_blog_header_style



