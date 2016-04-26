<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Passionate
 */

get_header(); ?>

	<div class="container">
		<div class="dt-error-page dt-main-cont">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div id="primary" class="content-area">
						<main id="main" class="site-main" role="main">

							<section class="error-404 not-found">
								<header class="page-header">
									<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'passionate' ); ?></h1>
								</header><!-- .page-header -->

								<div class="page-content">
									<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'passionate' ); ?></p>
								</div><!-- .page-content -->
							</section><!-- .error-404 -->

						</main><!-- #main -->
					</div><!-- #primary -->
				</div><!-- .col-lg-12 .col-md-12 -->
			</div><!-- .row -->
		</div><!-- .dt-error-page dt-main-cont -->
	</div><!-- .container -->

<?php get_footer(); ?>
