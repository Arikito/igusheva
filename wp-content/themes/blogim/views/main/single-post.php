<?php
if(have_posts()) : while(have_posts()) : the_post();

$blogim_class_format = 'content single-content';
$blogim_format = get_post_format();
$blogim_thumb = get_post_thumbnail_id();
$blogim_img_url = esc_url( wp_get_attachment_url( $blogim_thumb,'full') ); //get img URL

$blogim_img = aq_resize($blogim_img_url, 220, 150, true, true, true); //resize & crop img
$blogim_img = ($blogim_img == '') ? esc_url( get_template_directory_uri() ) . '/assets/img/fallback-220x150.jpg' : $blogim_img;
?>
<div itemscope itemtype="http://schema.org/BlogPosting" <?php post_class($blogim_class_format);?>>
	 <div class="meta">
		<meta itemprop="datePublished" content="<?php the_time('c'); ?>"/>
		<meta itemprop="image" content="<?php echo $blogim_img_url;?>"/>
		<meta itemprop="description" content="<?php echo get_the_excerpt(); ?>"/>
		<meta itemprop="url" content="<?php the_permalink();?>">
		<h1 itemprop="name"  class="title"><?php the_title();?></h1>
		<strong  class="cat s-10"><?php the_category(' , ');?></strong>
		<span class="date s-11"><?php the_time('M d, Y'); ?></span>
		<span class="date s-11"><a href="<?php esc_url(the_permalink());?>#comments"><?php comments_number(__('No Comments', 'blogim'),__('1 Comment', 'blogim'),__('% Comments', 'blogim')); ?></a></span>
	</div><!-- end of meta -->
       
	<div itemprop="articleBody" class="format-text">
		<?php if($blogim_format == 'image'){
			the_post_thumbnail('full');
		}?>
		<?php the_content();?>
	</div><!-- end of format text -->
	
	<div class="single-util">
		<?php the_post_navigation( array(
	            'prev_text'                 => __( 'previous', 'blogim' ),
	            'next_text'                 => __( 'next', 'blogim' ),
	            'screen_reader_text' 		=> __(' ', 'blogim'),
        ) ); ?>
		<?php if(has_tag()):?>
			<div class="single-tags">
				<span><?php _e('Tags', 'blogim');?> : </span>
				<?php the_tags('',' , ','');?>
			</div><!-- end of single tags -->
		<?php endif;?>
	<div class="clear"></div>
	</div><!-- end of single util -->

</div><!-- end of content -->

<div class="author-content">
	<?php
		global $post;
		$blogim_social = array(
			'facebook' => '<i class="fa fa-facebook"></i>',
			'twitter' => '<i class="fa fa-twitter"></i>',
		);
		$blogim_author_id = $post->post_author;
		$blogim_desc = get_the_author_meta('description',$blogim_author_id);
		$blogim_name = ( get_the_author_meta('display_name',$blogim_author_id) == '' ) ? get_the_author_meta('user_nicename',$blogim_author_id) : get_the_author_meta('display_name',$blogim_author_id);
		$blogim_ava = get_avatar($blogim_author_id,80);
	?>
	<?php if($blogim_ava != ''):?>
	<figure>
		<?php echo $blogim_ava;?>
	</figure>
	<?php endif;?>
	<div class="caption">
		<h3 class="title"><?php echo $blogim_name;?></h3>
		<p><?php echo $blogim_desc;?></p>
		<div class="author-social">
			<?php foreach($blogim_social as $blogim_s => $blogim_i):
				$blogim_url = get_the_author_meta($blogim_s,$blogim_author_id);
				if($blogim_url != ''):
				?>
					<a href="<?php echo esc_url($blogim_url);?>" title="<?php echo esc_attr($blogim_s);?>"><?php echo $blogim_i;?></a>
				<?php
				endif;
				endforeach;
			?>
		</div><!-- end of author social -->
	</div><!-- end of caption -->
	<div class="clear"></div>
</div><!-- end of of author content -->

<div class="related-content">
	<h3 class="widget-title"><?php _e('You Might Also Like', 'blogim');?></h3>
	<div class="row">
		 <?php
			global $post;
	    	$blogim_related = get_posts(
			array(
			      'category__in' => wp_get_post_categories($post->ID),
			      'numberposts' => 3,
			      'post__not_in' => array($post->ID),
			      'orderby'=> 'rand'
		       )
	       );
	       if( $blogim_related ) foreach( $blogim_related as $post ) {
	       setup_postdata($post);
		       $blogim_thumb = get_post_thumbnail_id($post->ID);
		       $blogim_img_url = esc_url( wp_get_attachment_url( $blogim_thumb,'full') ); //get img URL
		       $blogim_image = aq_resize( $blogim_img_url, 360, 245, true,true,true ); //resize & crop img
		       $blogim_image = ($blogim_image == '') ? esc_url( get_template_directory_uri() ) .'/assets/img/fallback-360x245.jpg' : $blogim_image;
		       $blogim_class_format = 'content grid-post col-md-4 col-xs-6';
	       ?>
	       
	       <div <?php post_class($blogim_class_format);?>>
			<?php if($blogim_image != ''):?>
				<figure>
					<a href="<?php esc_url(the_permalink());?>"><img src="<?php echo $blogim_image;?>" alt="<?php esc_attr(the_title_attribute());?>"></a>
				</figure>
			<?php endif;?>
			 <div class="caption">
				 <div class="meta">
					<h4><a href="<?php esc_url(the_permalink()); ?>"><?php the_title();?></a></h4>
					<strong  class="cat s-10"><?php the_category(' , ');?></strong>
					<span class="date s-11"><?php the_time(get_option( 'date_format' )); ?></span>
				 </div>
			 </div><!-- end of caption -->
		 </div><!-- end of content -->
	       
	       <?php }else{
		   ?><div class="col-md-12 format-text spacer"><p><?php _e('No related post available', 'blogim');?></p></div><?php
	       }
	       wp_reset_postdata(); ?>
	</div><!-- end of row -->
</div><!-- end of related content -->

<?php if(comments_open()):?>
	<div class="comment-area form-basic">
		<?php comments_template(); ?>
	</div>
<?php endif;?>

<?php endwhile;?>
<?php else : ?>
        <div class="no-post-found">
            <div class="format-text the-content">
				<p><?php _e('Sorry, no posts matched your criteria. Try something else. ', 'blogim')?></p>
            </div>
        </div>
<?php endif;?>