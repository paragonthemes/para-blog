<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Para_Blog
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php 
	$site_layout_class = 'hfeed site';
	$site_layout = esc_attr( get_theme_mod( 'para_blog_layout' ) );
	if($site_layout == 'boxed-layout')
		$site_layout_class = 'hfeed site container';
	?>
	<div id="wrapper" class="<?php echo esc_attr($site_layout_class); ?>">

	<header id="masthead" class="site-header" role="banner">
		<div class="search-bar-box">
			<?php get_search_form(); ?>
		</div>
		<div class="header-top">
			<div class="container">
				<div class="header-date col-sm-7">
					<?php  para_blog_date_display(); ?>
				</div>
				<div class="col-sm-5 header-right">
						<?php
						$show_search = absint( get_theme_mod( 'para_blog_social_icons' ) );
						if($show_search == 1){
							wp_nav_menu( array(
								'theme_location'    => 'social',
								'menu_class'           => 'para-blog-menu-social',
								'depth'             => 0,
								'fallback_cb'		=> false
								)
							);
						}
						?>
						<?php 
						$show_search = absint( get_theme_mod( 'para_blog_search_icon' ) );
						if( $show_search == 1 ){
							?>
							<div class="search-wrapper"> <a href="#"> <i class="fa fa-search"></i> </a> </div>
							<?php 
						} 
						?>
				</div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-mid">
			<div class="container">	
				<div class="row main-head text-center">
					<div class="site-branding col-sm-12">
						<?php if( has_custom_logo() ){ ?>
						<div class="logo-container">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							  <?php the_custom_logo();?>
							</a>
						</div>
						<?php }else{ ?>
								<div class="logo-desc">
							<?php if ( is_front_page() && is_home() ) : ?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php else : ?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php endif; ?>
							<p class="site-description"><?php bloginfo( 'description' ); ?></p>
						</div>
						<?php	} ?>
					</div><!-- .site-branding -->
				</div> <!-- .row -->
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="container">
			<nav class="navbar">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only"><?php esc_html__('Toggle navigation','para-blog');?></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<?php
				wp_nav_menu( array(
					'theme_location'    => 'primary',
					'depth'             =>  4,
					'container'         => 'div',
					'container_class'   => 'collapse navbar-collapse navbar-center',
					'container_id'      => 'bs-example-navbar-collapse-1',
					'menu_class'        => 'nav navbar-nav',
					'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
					'walker'            => new wp_bootstrap_navwalker())
				);
				?>
			</nav> <!-- .navbar -->
		</div><!-- /.container-fluid -->
	</header><!-- #masthead -->
	<section class="section-slider">
		<div class="container">
			<?php
		   	if(get_header_image())
		   	{ ?>
               	<div class="header-image" style="background-image: url(<?php header_image(); ?>);"></div>
		   <?php }
		   else
		   {
		   ?>
			<div class="header-carousel">
			  <?php para_blog_header_carousel(); ?>
			</div>
		 <?php } ?>	
		</div>
	</section>
	<div id="content" class="site-content">
		<div class="container">
			 