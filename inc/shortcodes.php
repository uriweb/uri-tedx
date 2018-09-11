<?php
/**
 * Shortcodes
 *
 * @package uri-tedx
 */

/**
 * Global Nav shortcode
 *
 * @param arr $atts the attributes.
 * @param str $content the content.
 */
function uri_tedx_shortcode_gn( $atts, $content = null ) {

	// Attributes.
	extract(
		shortcode_atts(
			array(
				'style' => '',
			),
			$atts
		)
	);

	$output = '<div class="globalnav breakout ' . $style . '">';

	ob_start();
	get_template_part( 'header-parts/globalnav' );
	$output .= ob_get_clean();

	$output .= '</div>';
	return $output;

}
add_shortcode( 'uri-tedx-gn', 'uri_tedx_shortcode_gn' );
