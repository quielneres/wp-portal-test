<?php

/**
 * Registers the `process` post type.
 */
function process_init() {
	register_post_type( 'process', array(
		'labels'                => array(
			'name'                  => __( 'Processes', 'greenplace' ),
			'singular_name'         => __( 'Process', 'greenplace' ),
			'all_items'             => __( 'All Processes', 'greenplace' ),
			'archives'              => __( 'Process Archives', 'greenplace' ),
			'attributes'            => __( 'Process Attributes', 'greenplace' ),
			'insert_into_item'      => __( 'Insert into Process', 'greenplace' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Process', 'greenplace' ),
			'featured_image'        => _x( 'Featured Image', 'process', 'greenplace' ),
			'set_featured_image'    => _x( 'Set featured image', 'process', 'greenplace' ),
			'remove_featured_image' => _x( 'Remove featured image', 'process', 'greenplace' ),
			'use_featured_image'    => _x( 'Use as featured image', 'process', 'greenplace' ),
			'filter_items_list'     => __( 'Filter Processes list', 'greenplace' ),
			'items_list_navigation' => __( 'Processes list navigation', 'greenplace' ),
			'items_list'            => __( 'Processes list', 'greenplace' ),
			'new_item'              => __( 'New Process', 'greenplace' ),
			'add_new'               => __( 'Add New', 'greenplace' ),
			'add_new_item'          => __( 'Add New Process', 'greenplace' ),
			'edit_item'             => __( 'Edit Process', 'greenplace' ),
			'view_item'             => __( 'View Process', 'greenplace' ),
			'view_items'            => __( 'View Processes', 'greenplace' ),
			'search_items'          => __( 'Search Processes', 'greenplace' ),
			'not_found'             => __( 'No Processes found', 'greenplace' ),
			'not_found_in_trash'    => __( 'No Processes found in trash', 'greenplace' ),
			'parent_item_colon'     => __( 'Parent Process:', 'greenplace' ),
			'menu_name'             => __( 'Processes', 'greenplace' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_position'         => null,
		'menu_icon'             => 'dashicons-book-alt',
		'show_in_rest'          => true,
		'rest_base'             => 'process',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'process_init' );

/**
 * Sets the post updated messages for the `process` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `process` post type.
 */
function process_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['process'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Process updated. <a target="_blank" href="%s">View Process</a>', 'greenplace' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'greenplace' ),
		3  => __( 'Custom field deleted.', 'greenplace' ),
		4  => __( 'Process updated.', 'greenplace' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Process restored to revision from %s', 'greenplace' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Process published. <a href="%s">View Process</a>', 'greenplace' ), esc_url( $permalink ) ),
		7  => __( 'Process saved.', 'greenplace' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Process submitted. <a target="_blank" href="%s">Preview Process</a>', 'greenplace' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Process scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Process</a>', 'greenplace' ),
		date_i18n( __( 'M j, Y @ G:i', 'greenplace' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Process draft updated. <a target="_blank" href="%s">Preview Process</a>', 'greenplace' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'process_updated_messages' );
