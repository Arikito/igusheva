<?php get_header(); ?>
<div class="main-content">
	<?php while(have_posts()){
		the_post();
		get_template_part( 'content', 'page' );?>
		<h2 class="single_post_title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
		<article class="block">
			<div class="content"><?php the_content();?></div>
		</article>
	<?php } ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>