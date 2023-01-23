<?php

/**
 * Registers the `others` post type.
 */
function others_init() {
	register_post_type( 'others', array(
		'labels'                => array(
			'name'                  => __( 'others', 'greenplace' ),
			'singular_name'         => __( 'others', 'greenplace' ),
			'all_items'             => __( 'All others', 'greenplace' ),
			'archives'              => __( 'others Archives', 'greenplace' ),
			'attributes'            => __( 'others Attributes', 'greenplace' ),
			'insert_into_item'      => __( 'Insert into others', 'greenplace' ),
			'uploaded_to_this_item' => __( 'Uploaded to this others', 'greenplace' ),
			'featured_image'        => _x( 'Featured Image', 'others', 'greenplace' ),
			'set_featured_image'    => _x( 'Set featured image', 'others', 'greenplace' ),
			'remove_featured_image' => _x( 'Remove featured image', 'others', 'greenplace' ),
			'use_featured_image'    => _x( 'Use as featured image', 'others', 'greenplace' ),
			'filter_items_list'     => __( 'Filter others list', 'greenplace' ),
			'items_list_navigation' => __( 'others list navigation', 'greenplace' ),
			'items_list'            => __( 'others list', 'greenplace' ),
			'new_item'              => __( 'New others', 'greenplace' ),
			'add_new'               => __( 'Add New', 'greenplace' ),
			'add_new_item'          => __( 'Add New others', 'greenplace' ),
			'edit_item'             => __( 'Edit others', 'greenplace' ),
			'view_item'             => __( 'View others', 'greenplace' ),
			'view_items'            => __( 'View others', 'greenplace' ),
			'search_items'          => __( 'Search others', 'greenplace' ),
			'not_found'             => __( 'No others found', 'greenplace' ),
			'not_found_in_trash'    => __( 'No others found in trash', 'greenplace' ),
			'parent_item_colon'     => __( 'Parent others:', 'greenplace' ),
			'menu_name'             => __( 'others', 'greenplace' ),
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
		'rest_base'             => 'others',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'others_init' );

/**
 * Sets the post updated messages for the `others` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `others` post type.
 */
function others_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['others'] = array(
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
add_filter( 'post_updated_messages', 'others_updated_messages' );
