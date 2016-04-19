<?php
/**
 * Template for displaying search forms in Twenty Sixteen
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<div class="searchWraper">
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<button type="submit" class="search-submit"><i class="material-icons">search</i></button> 
	<!-- <input class="search-submit hidden" type="image" src="wp-content\themes\mytheme\img\ZoomSmall.png" /> -->
	
	<label>
		<!-- <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'twentysixteen' ); ?></span> -->
		<!-- <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'twentysixteen' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'twentysixteen' ); ?>" /> -->

		<input type="search" class="search-field" placeholder="Поиск..." value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'twentysixteen' ); ?>" />
	</label>	
</form>
</div>	
<div class="searchBtnsWraper">
	<i class="material-icons openSearchBtn">search</i>
	<i class="material-icons closeSearchBtn">close</i>
</div>