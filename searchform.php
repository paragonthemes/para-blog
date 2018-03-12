<?php 
	$para_blog_placeholder_text = '';
	$para_blog_placeholder = esc_attr(get_theme_mod('para_blog_search_placeholder', __('Search..', 'para-blog')));
	if(!empty($para_blog_placeholder))
		$para_blog_placeholder_text = ' placeholder="' .  $para_blog_placeholder . '" ';
?>
<form method="get" class="search-form" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="search-field" <?php echo $para_blog_placeholder_text; ?> name="s" id="s" value="<?php echo get_search_query();?>"/> 
</form>