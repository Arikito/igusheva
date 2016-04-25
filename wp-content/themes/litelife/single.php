<?php get_header(); ?>
<div class="main-content">
	<?php while(have_posts()){ ?>
		<?php the_post(); ?>
		
		<h1 class="single_post_title"><?php the_title(); ?></h2>
		<article class="block">
			<div class="content"><?php the_content(); ?></div>
			<div class="articleFooter">
				<div class="tags"><?php the_tags(); ?></div>
				<div class="articleSocial">
					<span><?php echo __('Share:', 'litelife') ?></span> 
					<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&title=<?php the_title();?>" class="facebook" target="_blank" title="facebook">
					<i class="fa fa-facebook"></i></a>
					<a href="http://vk.com/share.php?url=http://mysite.comhttp://vk.com/share.php?url=<?php the_permalink();?>&title=<?php the_title();?>" class="vk" target="_blank" title="vk"><i class="fa fa-vk"></i></a>
					<a href="https://twitter.com/share?url=<?php the_permalink();?>&title=<?php the_title();?>"  class="twitter" target="_blank" title="twitter"><i class="fa fa-twitter"></i></a>
					<a href="https://plus.google.com/share?url=<?php the_permalink();?>&title=<?php the_title();?>"  class="google-plus" target="_blank" title="google-plus"><i class="fa fa-google-plus"></i></a>
				</div>
			</div>
		</article>
			<div class="comment list">
				<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if(comments_open() || get_comments_number()){
					comments_template();
				} ?>
			</div>
	<?php } ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>