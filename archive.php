<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Para_Blog
 */

get_header(); 
$sidebar = para_blog_get_sidebar_option();
$main_box_class = para_blog_get_main_class($sidebar);
$sidebar_class = para_blog_get_sidebar_class($sidebar);
?>
<div class="row">
	<div class="<?php echo esc_attr($main_box_class); ?>">
		<div id="primary" class="content-area">
			<main id="main" class="site-main all-blogs" role="main">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</header><!-- .page-header -->

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
					?>

				<?php endwhile; ?>

				<div class="post-navigation-block">
					<?php the_posts_navigation(); ?>
				</div>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>


		</main><!-- #main -->
	</div><!-- #primary -->
</div> <!-- .col-sm-8 --> 
<?php if($sidebar != 'no-sidebar'){ ?>
<div class="<?php echo esc_attr($sidebar_class) ?>">
	<?php get_sidebar(); ?>
</div> <!-- .col-sm-4 -->
<?php } ?>
</div> <!-- .row -->
<?php get_footer(); ?>
