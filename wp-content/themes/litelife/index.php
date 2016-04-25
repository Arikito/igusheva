<?php get_header(); ?>
<div class="main-content">
	<?php if(have_posts()){
		while(have_posts()){ ?>
			<?php the_post();?>			
			<article class="block">
				<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
				<a href="<?php the_permalink();?>" class="thumbnail"><?php the_post_thumbnail();?></a>
				<div class="content"><?php the_excerpt();?>
				</div>
				<div class="readMore"><a href="<?php the_permalink();?>">Читать далее</a></div>
				<div class="articleFooter">
					<h2 class="comments-title">
					<?php
						$comments_number = get_comments_number();
						$strNumbLast =  substr($comments_number, -1);
						$strNumbPreLast =  substr($comments_number, -2, 1);
						if ($comments_number == 0) {		
							printf( __( 'No comments', 'litelife' ));
						}else{ 
							printf( _nx( 'One thought', '%1$s thoughts', get_comments_number(), 'comments title', 'litelife' ),
								number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
						}
					?>
					</h2>
					<div class="articleSocial">
						<h2>ПОДЕЛИТЬСЯ:</h2> 
						<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&title=<?php the_title();?>" class="facebook" target="_blank" title="facebook">
						<i class="fa fa-facebook"></i></a>
						<a href="http://vk.com/share.php?url=http://mysite.comhttp://vk.com/share.php?url=<?php the_permalink();?>&title=<?php the_title();?>" class="vk" target="_blank" title="vk"><i class="fa fa-vk"></i></a>
						<a href="https://twitter.com/share?url=<?php the_permalink();?>&title=<?php the_title();?>"  class="twitter" target="_blank" title="twitter"><i class="fa fa-twitter"></i></a>
						<a href="https://plus.google.com/share?url=<?php the_permalink();?>&title=<?php the_title();?>"  class="google-plus" target="_blank" title="google-plus"><i class="fa fa-google-plus"></i></a>
					</div>
				</div>
			</article>
		<?php }
	}else{
		echo "Пусто";
	}?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>