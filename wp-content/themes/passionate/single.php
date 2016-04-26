<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Passionate
 */

get_header(); ?>

	<div class="container">
		<div class="dt-main-cont">
			<div class="row">

				<?php if ( get_theme_mod( 'passionate_single_page_layout', 0 ) == 'left_sidebar' ) : ?>
					<div class="col-lg-4 col-md-4">
						<?php get_sidebar( 'left' ); ?>
					</div><!-- .col-lg-4 .col-md-4 -->
				<?php endif; ?>

				<div class="<?php if ( get_theme_mod( 'passionate_single_page_layout', 0 ) == 'left_sidebar' || get_theme_mod( 'passionate_single_page_layout', 0 ) == 'right_sidebar' ) : ?>col-lg-8 col-md-8<?php else: ?>col-lg-12 col-md-12<?php endif; ?>">
					<div id="primary" class="content-area">
						<main id="main" class="site-main" role="main">

							<?php while ( have_posts() ) : the_post(); ?>

								<?php get_template_part( 'template-parts/content', 'single' ); ?>

								<?php the_post_navigation(); ?>

								<?php
								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
								?>

							<?php endwhile; // End of the loop. ?>

						</main><!-- #main -->
					</div><!-- #primary -->
				</div><!-- .col-lg-8 .col-md-8 -->

				<?php if ( get_theme_mod( 'passionate_single_page_layout', 0 ) == 'right_sidebar' ) : ?>
					<div class="col-lg-4 col-md-4">
						<?php get_sidebar(); ?>
					</div><!-- .col-lg-4 .col-md-4 -->
				<?php endif; ?>

			</div><!-- .row -->
		</div><!-- .dt-main-cont -->
	</div><!-- .container -->

<?php get_footer(); ?>
