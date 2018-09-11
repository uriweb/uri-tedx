<?php
/**
 * URI Modern Theme Customizer
 *
 * @package uri-tedx
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function uri_tedx_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// remove unwanted sections.
	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'background_image' );

	// add custom sections and settings/controls
	uri_tedx_options_posts( $wp_customize );
}
add_action( 'customize_register', 'uri_tedx_customize_register' );


/**
 * Creates options for posts
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function uri_tedx_options_posts( $wp_customize ) {

	// Add section for post options.
	$wp_customize->add_section(
		'uri_tedx_customizer_posts',
		array(
			'title'    => __( 'Post Options', 'uri' ),
			'priority' => 70,
		)
	);

	/* Display categories */
	$wp_customize->add_setting(
		'display_post_categories',
		array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => 'uri_tedx_validate_checkbox',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'display_post_categories',
			array(
				'section'     => 'uri_tedx_customizer_posts',
				'label'       => __( 'Display post categories', 'uri' ),
				'description' => __( 'Display categories on posts and archive pages', 'uri' ),
				'type'        => 'checkbox',
			)
		)
	);

	/* Display tags */
	$wp_customize->add_setting(
		'display_post_tags',
		array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => 'uri_tedx_validate_checkbox',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'display_post_tags',
			array(
				'section'     => 'uri_tedx_customizer_posts',
				'label'       => __( 'Display post tags', 'uri' ),
				'description' => __( 'Display tags on posts and archive pages', 'uri' ),
				'type'        => 'checkbox',
			)
		)
	);

}


/**
 * Sanitize input from a checkbox.  It'll be 0 or 1.
 *
 * @param mixed $value the value to be sanitized.
 * @return int
 */
function uri_tedx_validate_checkbox( $value ) {
		return filter_var( $value, FILTER_SANITIZE_NUMBER_INT );
}


/**
 * Sanitizes a URL
 * esc_url_raw() could also do it, but the UX is less robust.
 * This function improves on esc_url_raw in that it
 * provides feedback when URLs are invalid
 * (mostly, that is. One can still fool the validator to add sanitized but malformed URLs
 * like https://twitter.comuniversityofri but TLDs are hard to validate these days.)
 *
 * @param str $url is the URL to test.
 * @return mixed: str on success; NULL on failure
 */
function uri_tedx_sanitize_url( $url ) {
		$out = filter_var( $url, FILTER_VALIDATE_URL );
		if ( ! empty( $url ) && false === $out ) {
		// returning NULL triggers the WP UI to show that the value is unacceptable.
		return null;
			} else {
	return $out;
			}
}


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function uri_tedx_customize_preview_js() {
		wp_enqueue_script( 'uri-tedx-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), uri_tedx_cache_buster(), true );
}
add_action( 'customize_preview_init', 'uri_tedx_customize_preview_js' );
