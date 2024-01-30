<?php
/**
 * Set up Talks post type and custom fields
 *
 * @package uri-tedx
 */

/**
 * Create the talk post type
 */
function uri_tedx_create_talk_post_type() {
register_post_type(
	   'talk',
	array(
		'label' => 'Talk',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'rewrite' => array( 'slug' => 'talks' ),
		'query_var' => true,
		'has_archive' => true,
		'exclude_from_search' => false,
		'supports' => array( 'title', 'thumbnail', 'revisions' ),
		'taxonomies' => array( 'post_tag', 'category' ),
		'labels' => array(
			'name' => __( 'Talks' ),
			'singular_name' => __( 'Talk' ),
			'add_new'            => __( 'Add New', 'Talk' ),
			'add_new_item'       => __( 'Add New Talk' ),
			'edit_item'          => __( 'Edit Talk' ),
			'new_item'           => __( 'New Talk' ),
			'all_items'          => __( 'All Talks' ),
			'view_item'          => __( 'View Talk' ),
			'search_items'       => __( 'Search talks' ),
			'not_found'          => __( 'No talks found' ),
			'not_found_in_trash' => __( 'No talks found in the Trash' ),
			'parent_item_colon'  => '',
			'menu_name'          => 'Talks',
		),
		'menu_icon' => 'dashicons-testimonial',
	)
  );
}
add_action( 'init', 'uri_tedx_create_talk_post_type' );


/**
 * Add the talk post type custom fields
 */
if ( function_exists( 'register_field_group' ) ) {
	register_field_group(
		array(
			'id' => 'acf_talks',
			'title' => 'Talks',
			'fields' => array(
				array(
					'key' => 'field_5a970a87efcb4',
					'label' => 'Name',
					'name' => 'name',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'none',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5c4a1d241cc69',
					'label' => 'Sort Name',
					'name' => 'sortname',
					'type' => 'text',
					'instructions' => 'Used for sorting on archive pages',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'none',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5a970aadefcb5',
					'label' => 'Talk Title',
					'name' => 'title',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'none',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5a971f083fd32',
					'label' => 'Talk Description',
					'name' => 'description',
					'type' => 'textarea',
					'required' => '0',
					'default_value' => '',
					'formatting' => 'br',
				),
				array(
					'key' => 'field_5a970ad1efcb6',
					'label' => 'Youtube ID',
					'name' => 'ytid',
					'type' => 'text',
					'instructions' => 'Enter the YouTube video id found in the YouTube url.	For example, if the URL is "https://www.youtube.com/watch?v=XzAurHQwIcU", enter "XzAurHQwIcU"',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'none',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5a98331154a7a',
					'label' => 'Event Name',
					'name' => 'event',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5a970b5eefcb7',
					'label' => 'Bio',
					'name' => 'bio',
					'type' => 'textarea',
					'required' => '0',
					'default_value' => '',
					'formatting' => 'br',
				),
				array(
					'key' => 'field_5a970bbbefcb8',
					'label' => 'Profession',
					'name' => 'profession',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'none',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5a970bc9efcb9',
					'label' => 'Transcript',
					'name' => 'transcript',
					'type' => 'textarea',
					'required' => '0',
					'default_value' => '',
					'formatting' => 'br',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'talk',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array(
				'position' => 'acf_after_title',
				'layout' => 'no_box',
				'hide_on_screen' => array(),
			),
			'menu_order' => 0,
		)
		);
}
