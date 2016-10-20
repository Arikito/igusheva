<div class="b-blog-search">
	<form class="b-form form-search" role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="input-wrap">
			<i class="icon-search"></i>
			<input type="text" name="s" class="form-control" placeholder="<?php echo esc_attr__( 'Search..', 'boson' ); ?>" value="<?php echo get_search_query(); ?>" />
		</div>
	</form>
</div>
