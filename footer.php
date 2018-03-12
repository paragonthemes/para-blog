<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Para_Blog
 */

?>
</div> <!-- .container -->
</div><!-- #content -->
<div class="instagram">
   <?php  dynamic_sidebar( 'instagram-feed' ); ?>
</div>
<!-- Featured Carousel on Footer Section. -->
<footer id="colophon" class="site-footer" role="contentinfo">
    
    <?php
    $show_footer_widget = absint( get_theme_mod( 'para_blog_footer_widget' ) );
    if( $show_footer_widget == 1 ) {
        ?>
        <div class="footer-widget-area">

            <div class="container">
                <div class="row">
                    <?php 
                      
                    if( is_active_sidebar( 'footer-1' ) ) : ?>
                        <div class="col-sm-4">
                            <?php dynamic_sidebar( 'footer-1' ); ?>
                        </div> <!-- .col-sm-3 -->
                    <?php endif; ?>
                    <?php if (is_active_sidebar( 'footer-2' )) : ?>
                        <div class="col-sm-4">
                            <?php dynamic_sidebar( 'footer-2' ); ?>
                        </div> <!-- .col-sm-3 -->
                    <?php endif; ?>
                    <?php if (is_active_sidebar('footer-3')) : ?>
                        <div class="col-sm-4">
                            <?php dynamic_sidebar('footer-3'); ?>
                        </div> <!-- .col-sm-3 -->
                    <?php endif; ?>
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </div> <!-- .footer-widget-area -->
    <?php
    } //footer_widget
    ?>
        <div class="site-info container text-center">
            <?php echo wp_kses_post( get_theme_mod( 'para_blog_copyright_text')); ?> |
            <?php printf( esc_html__( '%1$s by %2$s', 'para-blog' ), 'Para Blog', '<a href="https://www.paragonthemes.com/" rel="designer">Paragon Themes</a>' ); ?>
        </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->
<?php
para_blog_go_to_top();
wp_footer(); ?>
</body>
</html>