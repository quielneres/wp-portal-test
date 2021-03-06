<?php

/**
 * Registers the `user` post type.
 */
function user_init() {
	register_post_type( 'user', array(
		'labels'                => array(
			'name'                  => __( 'Users', 'greenplace' ),
			'singular_name'         => __( 'User', 'greenplace' ),
			'all_items'             => __( 'All Users', 'greenplace' ),
			'archives'              => __( 'User Archives', 'greenplace' ),
			'attributes'            => __( 'User Attributes', 'greenplace' ),
			'insert_into_item'      => __( 'Insert into user', 'greenplace' ),
			'uploaded_to_this_item' => __( 'Uploaded to this user', 'greenplace' ),
			'featured_image'        => _x( 'Featured Image', 'user', 'greenplace' ),
			'set_featured_image'    => _x( 'Set featured image', 'user', 'greenplace' ),
			'remove_featured_image' => _x( 'Remove featured image', 'user', 'greenplace' ),
			'use_featured_image'    => _x( 'Use as featured image', 'user', 'greenplace' ),
			'filter_items_list'     => __( 'Filter users list', 'greenplace' ),
			'items_list_navigation' => __( 'Users list navigation', 'greenplace' ),
			'items_list'            => __( 'Users list', 'greenplace' ),
			'new_item'              => __( 'New User', 'greenplace' ),
			'add_new'               => __( 'Add New', 'greenplace' ),
			'add_new_item'          => __( 'Add New User', 'greenplace' ),
			'edit_item'             => __( 'Edit User', 'greenplace' ),
			'view_item'             => __( 'View User', 'greenplace' ),
			'view_items'            => __( 'View Users', 'greenplace' ),
			'search_items'          => __( 'Search users', 'greenplace' ),
			'not_found'             => __( 'No users found', 'greenplace' ),
			'not_found_in_trash'    => __( 'No users found in trash', 'greenplace' ),
			'parent_item_colon'     => __( 'Parent User:', 'greenplace' ),
			'menu_name'             => __( 'Users', 'greenplace' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => false,
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_position'         => null,
		'menu_icon'             => 'dashicons-admin-post',
		'show_in_rest'          => true,
		'rest_base'             => 'user',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'user_init' );

/**
 * Sets the post updated messages for the `user` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `user` post type.
 */
function user_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['user'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'User updated. <a target="_blank" href="%s">View user</a>', 'greenplace' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'greenplace' ),
		3  => __( 'Custom field deleted.', 'greenplace' ),
		4  => __( 'User updated.', 'greenplace' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'User restored to revision from %s', 'greenplace' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'User published. <a href="%s">View user</a>', 'greenplace' ), esc_url( $permalink ) ),
		7  => __( 'User saved.', 'greenplace' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'User submitted. <a target="_blank" href="%s">Preview user</a>', 'greenplace' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'User scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview user</a>', 'greenplace' ),
		date_i18n( __( 'M j, Y @ G:i', 'greenplace' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'User draft updated. <a target="_blank" href="%s">Preview user</a>', 'greenplace' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'user_updated_messages' );

/**
 *
 */
function user_filter_title( $title, $post_id ) {
	if ( $new_title = get_post_meta( $post_id, 'name', true ) ) {
		return $new_title;
	}

	return $title;
}
add_filter( 'the_title', 'user_filter_title', 10, 2 );
