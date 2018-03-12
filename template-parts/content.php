<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Para_Blog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if(has_post_thumbnail()){ ?>
	<div class="image-holder">
		<a href="<?php the_permalink(); ?>"> 
			<?php 
			$sidebar = para_blog_get_sidebar_option();
			if($sidebar == 'no-sidebar')
				the_post_thumbnail('full', array('class' => 'img-responsive' ));
			else
				the_post_thumbnail('full', array('class' => 'img-responsive' ));
			?> 
		</a>
	</div>
	<?php } ?>	
	<div class="content-bg">
		<header class="entry-header text-center">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php if ( 'post' === get_post_type() ) : ?>
				<?php para_blog_show_post_meta(); ?>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<div class="row">
				<div class="col-sm-10 col-md-10">
					<?php para_blog_entry_footer(); ?>
				</div>
				<div class="col-sm-2 col-md-2">
					<a class="more-btn" href="<?php the_permalink() ?>"><?php echo esc_html__('Read More','para-blog') ?></a>
				</div>
			</div>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->  
