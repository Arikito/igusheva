<?php
/**
 * Template Name: Front Page
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Passionate
 */

get_header(); ?>

<?php if( is_active_sidebar( 'dt-image-slider' ) ) : ?>

	<div class="dt-front-slider">
		<?php dynamic_sidebar( 'dt-image-slider' ); ?>
	</div><!-- .dt-front-slider -->

<?php endif; ?>

<?php if( is_active_sidebar( 'dt-front-page-widgets' ) ) : ?>
	<?php dynamic_sidebar( 'dt-front-page-widgets' ); ?>
<?php else : ?>

	<div class="container">
		<div class="dt-main-cont">
			<div class="row">
				<div class="col-lg-8 col-md-8">
					<div id="primary" class="content-area">
						<main id="main" class="site-main" role="main">

							<?php if ( have_posts() ) : ?>

								<div class="dt-archive-posts">
									<?php
									while ( have_posts() ) : the_post(); ?>

										<div class="dt-archive-post">
											<header class="entry-header">
												<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

												<?php if ( 'post' === get_post_type() ) : ?>
													<div class="entry-meta">
														<?php passionate_posted_on(); ?>
													</div><!-- .entry-meta -->
												<?php endif; ?>
											</header><!-- .entry-header -->

											<figure class="dt-archive-img">

												<?php
												if ( has_post_thumbnail() ) :

													$dt_work_page_thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'passionate-archive-img' );
													$dt_work_page_thumbnail_url = $dt_work_page_thumbnail_src[0];

													?>
													<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( $dt_work_page_thumbnail_url ); ?>" alt="<?php echo get_the_title(); ?>"></a>

												<?php
												endif;
												?>

												<div class="clearfix"></div>
											</figure><!-- .dt-archive-img -->

											<div class="dt-archive-post-content">
												<div class="dt-archive-post-desc">
													<p><?php
														$excerpt = get_the_excerpt();
														$limit   = "260";
														$pad     = "...";

														if( strlen( $excerpt ) <= $limit ) {
															echo esc_html( $excerpt );
														} else {
															$excerpt = substr( $excerpt, 0, $limit ) . $pad;
															echo esc_html( $excerpt );
														}
														?></p>
												</div><!-- .dt-archive-post-desc -->

												<footer class="entry-footer">
													<?php passionate_entry_footer(); ?>
												</footer><!-- .entry-footer -->
											</div><!-- .dt-archive-post-content -->

											<div class="dt-archive-post-readmore">
												<a class="transition35" href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php _e( 'Read more', 'passionate'); ?></a>
											</div><!-- .dt-archive-post-readmore -->

										</div><!-- .dt-archive-post -->

									<?php endwhile; ?>

									<?php wp_reset_postdata(); ?>
								</div><!-- .dt-category-posts -->

								<div class="clearfix"></div>

								<div class="dt-pagination-nav">
									<?php echo paginate_links(); ?>
								</div><!---- .jw-pagination-nav ---->

							<?php endif; ?>

						</main><!-- #main -->
					</div><!-- #primary -->
				</div><!-- .col-lg-8 .col-md-8 -->

				<div class="col-lg-4 col-md-4">
					<?php get_sidebar(); ?>
				</div><!-- .col-lg-4 .col-md-4 -->
			</div>
		</div>
	</div>

<?php endif; ?>

<?php get_footer(); ?>
