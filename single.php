<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Para_Blog
 */

get_header(); 
$sidebar = para_blog_get_sidebar_option();
$main_box_class = para_blog_get_main_class($sidebar);
$sidebar_class = para_blog_get_sidebar_class($sidebar);
?>
<div class="row">

	<div class="<?php echo esc_attr( $main_box_class ); ?>">

		<div id="primary" class="content-area">

			<main id="main" class="site-main all-blogs" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			<?php 
			the_post_navigation( array(
			
	            'next_text' =>
	            '<span class="screen-reader-text">' . __( 'Next post:', 'para-blog' ) . '</span> ' .
				'<span class="post-title">%title</span>'.'<span class="meta-nav" aria-hidden="true">' . __( '>>', 'para-blog' ) . '</span> '
				,
				'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( '<<', 'para-blog' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Previous post:', 'para-blog' ) . '</span> ' .
					'<span class="post-title">%title</span>',
				'screen_reader_text' => ' ',
			) );

			?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; ?>


		</main>
	</div>

</div> 

<?php if($sidebar != 'no-sidebar'){ ?>
<div class="<?php echo esc_attr( $sidebar_class ) ?>">
	<?php get_sidebar(); ?>
</div> 

<?php } ?>

</div> 

<?php get_footer(); ?>
