<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package uri-tedx
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php
	if ( is_single() ) {

		if ( ! uri_tedx_get_field( 'pagetitle' ) ) {
		?>
		<header class="entry-header">
		   <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
		<?php
		}
		if ( ! has_post_format( 'video' ) && ! uri_tedx_get_field( 'uri_tedx_hide_featured_image' ) ) {
			get_template_part( 'template-parts/featured-image' );
		}
} else {
		?>
		<header class="entry-header">
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		</header><!-- .entry-header -->
		<?php
		if ( ! has_post_format( 'video' ) ) {
			get_template_part( 'template-parts/featured-image' );
		}
	}

	?>

	<div class="entry-content">
		<?php

		$continue = sprintf(
			/* translators: %s: Name of current post. */
						wp_kses( __( '<span class="continue-reading">Continue reading %s <span class="meta-nav">&rarr;</span></span>', 'uri' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		);

		if ( ! is_single() && ! is_page() && $excerpt = get_the_excerpt() ) {
			the_excerpt();
			echo '<a class="continue-reading-link" href="' . get_permalink() . '">' . $continue . '</a>';
		} else {
			the_content( $continue );

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'uri' ),
					'after'  => '</div>',
				)
			);
		}
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php uri_tedx_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
