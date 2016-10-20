<div class="post-preview <?php if( is_sticky() )echo "sticky"; ?>">
    <h2><a href="<?php the_permalink(); ?>" class="dark-link"><?php the_title(); ?></a></h2>
    <div class="post-meta">
        <?php _e( 'Posted by', 'boson' )?> <span class="meta-author"><a href="<?php the_author_link(); ?>"><?php echo  ucwords( get_the_author() ); ?></a></span>
        <span class="meta-date"><?php _e( 'On', 'boson' );?> <?php echo get_the_date( 'M d, Y' ); ?></span>
        <span class="meta-tags"><?php the_tags('' ,',','' ); ?></span>
        <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
            <span class="meta-comment"><?php comments_popup_link(
            __( '0 comment', 'boson' ),
            __( '1 Comment', 'boson' ),
            __( '% Comments', 'boson' )
        ); ?></span>
        <?php endif; ?>
    </div>
    <div class="post-image-wrap">
        <a href="<?php the_permalink(); ?>" class="post-image">
            <?php echo get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'img-responsive' ) ); ?>
        </a>
    </div>
    <?php 
      echo boson_get_excerpt();
    ?>
</div>