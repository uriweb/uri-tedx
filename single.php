<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package uri-modern
 */

get_header();
?>

	<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) :
			the_post();

			$post_format = get_post_format();
			if ( get_post_type() === 'talk' ) {
				$post_format = 'talk';
			}

			get_template_part( 'template-parts/content', $post_format );

			if ( get_post_type() !== 'talk' ) {
				the_post_navigation(
					array(
						'prev_text' => 'Previous post',
						'next_text' => 'Next post',
					)
				);
			}

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
