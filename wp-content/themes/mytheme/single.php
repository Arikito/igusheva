<?php get_header(); ?>
<div class="main-content">
	<?php while(have_posts()){ ?>
		<?php the_post(); ?>
		<h1 class="single_post_title"><?php the_title(); ?></h2>
		<article class="block">
			<div class="content"><?php the_content(); ?></div>
			<div class="tags"><?php the_tags(); ?></div>
		</article>
	<?php } ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>