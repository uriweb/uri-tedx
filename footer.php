<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package uri-tedx
 */

?>

	</div><!-- #content -->

	<footer id="globalfooter">
		<div class="content-width">
			<div id="footer-content">
				<ul id="footer-nav">
					<li><a href="https://www.uri.edu/tedx/talks">Talks</a></li>
					<li><a href="https://www.uri.edu/tedx/speakers">Speakers</a></li>
					<li><a href="https://www.uri.edu/tedx/attend">Attend</a></li>
					<li><a href="https://www.uri.edu/tedx/about">About</a></li>
					<li><a href="https://www.ted.com/tedx">TEDx</a></li>
					<li><a href="https://www.uri.edu/">uri.edu</a></li>
				</ul>
				<div id="footer-social">

					<?php
					if ( function_exists( 'uri_cl_shortcode_social' ) ) {
						$facebook  = 'https://www.facebook.com/TEDxURI';
						$twitter   = 'https://twitter.com/TEDxURI';
						$youtube   = 'https://www.youtube.com/channel/UCbhjVxILP8IBOVKsbo7kbnQ';
						echo do_shortcode( '[cl-social style="light" facebook="' . $facebook . '" twitter="' . $twitter . '" youtube="' . $youtube . '"]' );
					}
					?>

				</div>
			</div>
			<div id="disclaimer">This independent TEDx event is operated under license from TED.</div>
		</div>
	</footer><!-- #globalfooter -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
