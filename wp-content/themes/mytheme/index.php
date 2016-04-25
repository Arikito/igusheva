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
					<a class="comments-title">
					<?php
						$comments_number = get_comments_number();
						$strNumbLast =  substr($comments_number, -1);
						$strNumbPreLast =  substr($comments_number, -2, 1);
						if ($comments_number == 1 || $strNumbLast == 1 && $strNumbPreLast != 1) {		
							printf( 								
								_nx(
									'%1$s комментарий',
									'%1$s комментарий',
									$comments_number,
									'comments title',
									'twentysixteen'
								),
								number_format_i18n( $comments_number ),
								get_the_title()
								);
						}else if ($comments_number == 0){ 
							printf(							
								_nx(
									'НЕТ комментариев',
									'НЕТ комментариев',
									$comments_number,
									'comments title',
									'twentysixteen'
								),
								number_format_i18n( $comments_number ),
								get_the_title()
							);
						}else if ($comments_number >= 2 && 
							$comments_number <= 4 || $strNumbLast >= 2 && $strNumbLast <= 4 && $strNumbPreLast != 1){ 
							printf(							
								_nx(
									'%1$s комментария',
									'%1$s комментария',
									$comments_number,
									'comments title',
									'twentysixteen'
								),
								number_format_i18n( $comments_number ),
								get_the_title()
							);
						}else {
							printf(							
								_nx(
									'%1$s комментариев',
									'%1$s комментариев',
									$comments_number,
									'comments title',
									'twentysixteen'
								),
								number_format_i18n( $comments_number ),
								get_the_title()
							);
						}
					?>
					</a>
					<div class="articleSocial">
						<span>Поделиться:</span>
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
	<div class="pagination"><?php echo paginate_links(array('format' => '?paged=%#%', 'show_all' => false, 'prev_next' => true)); ?></div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
