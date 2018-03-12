<?php
/**
 * Para Blog functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package Para_Blog
 */

if ( ! function_exists( 'para_blog_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function para_blog_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on para_blog, use a find and replace
	 * to change 'para_blog' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'para-blog');

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Custom Header Implemented
	 */
	add_theme_support( 'custom-header' );

	/*
	 * Custom Logo implemeted from WordPress Core
	 */

	add_theme_support( 'custom-logo', array(
            'height'      => 70,
            'width'       => 290,
            'flex-height' => true,
            'flex-width' => true
        ) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'para-blog' ),
		'social'   => esc_html__( 'Social Menu', 'para-blog' ),
		) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
	    'comment-list',
		'gallery',
		'caption',
		) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'para_blog_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
		) ) );
}
endif; // para_blog_setup
add_action( 'after_setup_theme', 'para_blog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function para_blog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'para_blog_content_width', 1140 );
}
add_action( 'after_setup_theme', 'para_blog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function para_blog_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'para-blog' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		) );

    register_sidebar( array(
		'name'          => esc_html__( 'Instagram Feed', 'para-blog' ),
		'id'            => 'instagram-feed',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '<br/><i class="fa fa-instagram"></i></h3>'
		) );
 
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'para-blog' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'para-blog' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'para-blog' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		) );	
}
add_action( 'widgets_init', 'para_blog_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function para_blog_scripts() {
	wp_enqueue_style( 'para-blog-google-fonts', '//fonts.googleapis.com/css?family=Roboto:400,500,700|Rubik:400,500,700,900');
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'bxslider', get_template_directory_uri() . '/css/jquery.bxslider.css' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'smartmenus', get_template_directory_uri() . '/css/jquery.smartmenus.bootstrap.css' );
	wp_enqueue_style( 'para-blog-style', get_stylesheet_uri() );

	wp_enqueue_script( 'bxslider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), '20120206', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '20120206', true );
	wp_enqueue_script( 'smartmenus', get_template_directory_uri() . '/js/jquery.smartmenus.min.js', array('jquery'), '20120206', true );
	wp_enqueue_script( 'smartmenus-bootstrap', get_template_directory_uri() . '/js/jquery.smartmenus.bootstrap.js', array('jquery'), '20120206', true );
	wp_enqueue_script( 'para-blog-custom-script', get_template_directory_uri() . '/js/custom.js', array('jquery'), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'para_blog_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Bootstrap Navwalder class.
 */

if ( ! class_exists( 'wp_bootstrap_navwalker' )) {
    require_once get_template_directory() . '/inc/wp_bootstrap_navwalker.php';
}

/**
 * Load custom customizer.
 */
require get_template_directory() . '/functions/theme-options.php';
require get_template_directory() . '/functions/sanitize-callback.php';
require get_template_directory() . '/functions/add-control-category-select.php';
require get_template_directory() . '/functions/custom-functions.php';
require get_template_directory() . '/functions/functions-carousel.php';
require get_template_directory() . '/functions/custom-widget.php';
require get_template_directory() . '/functions/paragon-ads-widget.php';


$show_carousel = absint( get_theme_mod( 'para_blog_show_slider_header' ) );

if(is_home())
{
	$stickypost =get_theme_mod( 'para_blog_header_sticky_post_carousel' );
	if( $show_carousel == 1 && $stickypost=='sticky_posts'){
	 	     /**
			 * Snippet Name: Ignore sticky posts from the main query
			 * Snippet URL: http://www.wpcustoms.net/snippets/ignore-sticky-posts-main-query/
			 */
			 function wpc_ignore_sticky($query)
			{
			    if (is_home() && $query->is_main_query())
			        $query->set('ignore_sticky_posts', true);
			        $query->set('post__not_in', get_option('sticky_posts'));
			}
			add_action('pre_get_posts', 'wpc_ignore_sticky');
	}

}
// Enable shortcodes in text widgets
add_filter('widget_text','do_shortcode');