<?php /* Loop Template used for archives/search */ ?>
<article <?php post_class('content-list clearfix'); ?>>
	<div class="content-thumb content-list-thumb">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php if (has_post_thumbnail()) { the_post_thumbnail('content-list'); } else { echo '<img src="' . get_template_directory_uri() . '/images/placeholder-content-list.jpg' . '" alt="No Picture" />'; } ?></a>
	</div>
	<header class="content-list-header">
		<?php mh_newsdesk_lite_post_meta(); ?>
		<h3 class="content-list-title"><a href="<?php echo get_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
	</header>
	<div class="content-list-excerpt">
		<?php the_excerpt(); ?>
	</div>
</article>
<hr class="mh-separator content-list-separator">