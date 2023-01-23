<?php

/**
 * Registers the `standard` post type.
 */
function standard_init() {
	register_post_type( 'standard', array(
		'labels'                => array(
			'name'                  => __( 'Standard', 'greenplace' ),
			'singular_name'         => __( 'Standard', 'greenplace' ),
			'all_items'             => __( 'All standard', 'greenplace' ),
			'archives'              => __( 'Standard Archives', 'greenplace' ),
			'attributes'            => __( 'Standard Attributes', 'greenplace' ),
			'insert_into_item'      => __( 'Insert into standard', 'greenplace' ),
			'uploaded_to_this_item' => __( 'Uploaded to this standard', 'greenplace' ),
			'featured_image'        => _x( 'Featured Image', 'standard', 'greenplace' ),
			'set_featured_image'    => _x( 'Set featured image', 'standard', 'greenplace' ),
			'remove_featured_image' => _x( 'Remove featured image', 'standard', 'greenplace' ),
			'use_featured_image'    => _x( 'Use as featured image', 'standard', 'greenplace' ),
			'filter_items_list'     => __( 'Filter standard list', 'greenplace' ),
			'items_list_navigation' => __( 'Standard list navigation', 'greenplace' ),
			'items_list'            => __( 'Standard list', 'greenplace' ),
			'new_item'              => __( 'New standard', 'greenplace' ),
			'add_new'               => __( 'Add New', 'greenplace' ),
			'add_new_item'          => __( 'Add New standard', 'greenplace' ),
			'edit_item'             => __( 'Edit standard', 'greenplace' ),
			'view_item'             => __( 'View standard', 'greenplace' ),
			'view_items'            => __( 'View standard', 'greenplace' ),
			'search_items'          => __( 'Search standard', 'greenplace' ),
			'not_found'             => __( 'No standard found', 'greenplace' ),
			'not_found_in_trash'    => __( 'No standard found in trash', 'greenplace' ),
			'parent_item_colon'     => __( 'Parent standard:', 'greenplace' ),
			'menu_name'             => __( 'Standard', 'greenplace' ),
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
		'rest_base'             => 'standard',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'standard_init' );

/**
 * Sets the post updated messages for the `standard` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `standard` post type.
 */
function standard_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['standard'] = array(
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
add_filter( 'post_updated_messages', 'standard_updated_messages' );
