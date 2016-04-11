<?php get_header(); ?>
<div class="main-content">
	<?php if(have_posts()){
		while(have_posts()){ ?>
			<?php the_post();?>

			<!-- Test -->
			<H1>Test</H1>
			<h2>Test2</h2>
			
			<article class="block">
				<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
				<a href="<?php the_permalink();?>" class="thumbnail"><?php the_post_thumbnail();?></a>
				<div class="content"><?php the_excerpt();?></div>
			</article>
		<?php }
	}else{
		echo "Пусто";
	}?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>