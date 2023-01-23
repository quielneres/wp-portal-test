<?php

/**
 * Registers the `system` post type.
 */
function system_init() {
	register_post_type( 'system', array(
		'labels'                => array(
			'name'                  => __( 'Systems', 'greenplace' ),
			'singular_name'         => __( 'System', 'greenplace' ),
			'all_items'             => __( 'All Systems', 'greenplace' ),
			'archives'              => __( 'System Archives', 'greenplace' ),
			'attributes'            => __( 'System Attributes', 'greenplace' ),
			'insert_into_item'      => __( 'Insert into system', 'greenplace' ),
			'uploaded_to_this_item' => __( 'Uploaded to this system', 'greenplace' ),
			'featured_image'        => _x( 'Featured Image', 'system', 'greenplace' ),
			'set_featured_image'    => _x( 'Set featured image', 'system', 'greenplace' ),
			'remove_featured_image' => _x( 'Remove featured image', 'system', 'greenplace' ),
			'use_featured_image'    => _x( 'Use as featured image', 'system', 'greenplace' ),
			'filter_items_list'     => __( 'Filter systems list', 'greenplace' ),
			'items_list_navigation' => __( 'Systems list navigation', 'greenplace' ),
			'items_list'            => __( 'Systems list', 'greenplace' ),
			'new_item'              => __( 'New System', 'greenplace' ),
			'add_new'               => __( 'Add New', 'greenplace' ),
			'add_new_item'          => __( 'Add New System', 'greenplace' ),
			'edit_item'             => __( 'Edit System', 'greenplace' ),
			'view_item'             => __( 'View System', 'greenplace' ),
			'view_items'            => __( 'View Systems', 'greenplace' ),
			'search_items'          => __( 'Search systems', 'greenplace' ),
			'not_found'             => __( 'No systems found', 'greenplace' ),
			'not_found_in_trash'    => __( 'No systems found in trash', 'greenplace' ),
			'parent_item_colon'     => __( 'Parent System:', 'greenplace' ),
			'menu_name'             => __( 'Systems', 'greenplace' ),
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
		'menu_icon'             => 'dashicons-admin-generic',
		'show_in_rest'          => true,
		'rest_base'             => 'system',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'system_init' );

/**
 * Sets the post updated messages for the `system` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `system` post type.
 */
function system_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['system'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'System updated. <a target="_blank" href="%s">View system</a>', 'greenplace' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'greenplace' ),
		3  => __( 'Custom field deleted.', 'greenplace' ),
		4  => __( 'System updated.', 'greenplace' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'System restored to revision from %s', 'greenplace' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'System published. <a href="%s">View system</a>', 'greenplace' ), esc_url( $permalink ) ),
		7  => __( 'System saved.', 'greenplace' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'System submitted. <a target="_blank" href="%s">Preview system</a>', 'greenplace' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'System scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview system</a>', 'greenplace' ),
		date_i18n( __( 'M j, Y @ G:i', 'greenplace' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'System draft updated. <a target="_blank" href="%s">Preview system</a>', 'greenplace' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'system_updated_messages' );

/**
 *
 */
function system_filter_title( $title, $post_id ) {
	$abbr = get_post_meta( $post_id, 'abbr', true );
	$name = get_post_meta( $post_id, 'name', true );

	if ( $abbr && $name ) {
		return $abbr . ' - ' . $name;
	}

	return $title;
}
add_filter( 'the_title', 'system_filter_title', 11, 2 );

/**
 *
 */
function system_save_post( $post_ID ) {
	global $wpdb;

	if ( get_post_type( $post_ID ) == 'system' ) {
		$abbr = get_post_meta( $post_ID, 'abbr', true );
		$name = get_post_meta( $post_ID, 'name', true );

		if ( $abbr && $name ) {
			$wpdb->update(
				$wpdb->posts,
				array( 'post_title' => $abbr . ' - ' . $name ),
				array( 'ID' => $post_ID )
			);
		}
	}
}
add_filter( 'acf/save_post', 'system_save_post', 12, 2 );
