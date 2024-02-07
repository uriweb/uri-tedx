<?php
/**
 * The template for displaying archive-talk pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package uri-tedx
 */


get_header(); ?>

	<main id="main" class="site-main" role="main">

	<?php

	query_posts(
		 array(
			 'post_type' => 'talk',
			 'meta_key' => 'event',
			 'orderby' => 'meta_value',
			 'order' => 'ASC',
		 )
		);

	if ( have_posts() ) :
	?>

			<header class="page-header">
				<h1 class="entry-header">Browse Talks</h1>
			</header><!-- .page-header -->
			
			<div class="cl-tiles fourths">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'talk' );

			endwhile;

			?>
			</div>
			<?php

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		
	</main><!-- #main -->

<?php
get_footer();
