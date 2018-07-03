<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package uri-tedx
 */

get_header(); ?>

<div class="marginator">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="content-block error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Not all those who wander are lost.', 'uri' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( "We're probably to blame.  Unfortunately, we can't seem to find what you're looking for here.", 'uri' ); ?></p>
				</div><!-- .page-content -->
			</div><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

</div>
<?php
get_footer();
