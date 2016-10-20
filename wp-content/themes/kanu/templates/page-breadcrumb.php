<div class="b-titlebar">
	<div class="layout">
		<!-- Bread Crumbs -->
		<ul class="crumbs">
			<li><?php _e( 'You are here:', 'boson' ); ?></li>
			<li><a href="<?php echo get_home_url(); ?>"><?php echo esc_html__( 'Home', 'boson' ); ?></a></li>
			<li><a href="#"><?php 
                if( is_home() || is_single() ) :
                    echo __( '<span>Our</span> Blog', 'boson' );
                elseif ( is_category() ) :
                	printf( __( '<span>Category:</span> %s', 'boson' ), single_cat_title( '', false ) );
                elseif ( is_tag() ) :
                	printf( __( '<span>Tag:</span> %s', 'boson' ), single_tag_title( '', false ) );
                elseif ( is_day() ) :
                	printf( __( '<span>Daily:</span> %s', 'boson' ), get_the_date() );
                elseif ( is_month() ) :
                	printf( __( '<span>Monthly:</span> %s', 'boson' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'boson' ) ) );
                elseif ( is_year() ) :
                	printf( __( '<span>Yearly:</span> %s', 'boson' ), get_the_date( _x( 'Y', 'yearly archives date format', 'boson' ) ) );
                elseif ( is_search() ) :
                    printf( __( 'Search Result: %s', 'boson' ), get_search_query() );
                elseif( is_404() ):
                        echo __( '404 - Page Not Found', 'boson' );
                else :
                	echo get_the_title( get_queried_object_id() );
                endif;
            ?></a></li>
		</ul>
		<!-- Title -->
		<h1>
            <?php 
                if( is_home() || is_single() ) :
                    echo __( '<span>Our</span> Blog', 'boson' );
                elseif ( is_category() ) :
                	printf( __( '<span>Category:</span> %s', 'boson' ), single_cat_title( '', false ) );
                elseif ( is_tag() ) :
                	printf( __( '<span>Tag:</span> %s', 'boson' ), single_tag_title( '', false ) );
                elseif ( is_day() ) :
                	printf( __( '<span>Daily:</span> %s', 'boson' ), get_the_date() );
                elseif ( is_month() ) :
                	printf( __( '<span>Monthly:</span> %s', 'boson' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'boson' ) ) );
                elseif ( is_year() ) :
                	printf( __( '<span>Yearly:</span> %s', 'boson' ), get_the_date( _x( 'Y', 'yearly archives date format', 'boson' ) ) );
                elseif ( is_search() ) :
                    printf( __( 'Search Result: %s', 'boson' ), get_search_query() );
                elseif( is_404() ):
                        echo __( '404 - Page Not Found', 'boson' );
                else :
                	echo get_the_title( get_queried_object_id() );
                endif;
            ?>
         </h1>
	</div>
</div>