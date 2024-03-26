<?php

/**
 * Registers the `map` post type.
 */
function portal_map_init() {
	register_post_type( 'portal-map', array(
		'labels'                => array(
			'name'                  => __( 'Map portal', 'greenplace' ),
			'singular_name'         => __( 'Map portal', 'greenplace' ),
			'all_items'             => __( 'All Map portal', 'greenplace' ),
			'archives'              => __( 'Map portal Archives', 'greenplace' ),
			'attributes'            => __( 'Map portal Attributes', 'greenplace' ),
			'insert_into_item'      => __( 'Insert into map', 'greenplace' ),
			'uploaded_to_this_item' => __( 'Uploaded to this portal-map', 'greenplace' ),
			'featured_image'        => _x( 'Featured Image', 'portal-map', 'greenplace' ),
			'set_featured_image'    => _x( 'Set featured image', 'portal-map', 'greenplace' ),
			'remove_featured_image' => _x( 'Remove featured image', 'portal-map', 'greenplace' ),
			'use_featured_image'    => _x( 'Use as featured image', 'portal-map', 'greenplace' ),
			'filter_items_list'     => __( 'Filter map list', 'greenplace' ),
			'items_list_navigation' => __( 'Map portal list navigation', 'greenplace' ),
			'items_list'            => __( 'Map portal list', 'greenplace' ),
			'new_item'              => __( 'New Map portal', 'greenplace' ),
			'add_new'               => __( 'Add New', 'greenplace' ),
			'add_new_item'          => __( 'Add New Map Portal', 'greenplace' ),
			'edit_item'             => __( 'Edit Map Portal', 'greenplace' ),
			'view_item'             => __( 'View Map Portal', 'greenplace' ),
			'view_items'            => __( 'View Map Portal', 'greenplace' ),
			'search_items'          => __( 'Search Maps Portal', 'greenplace' ),
			'not_found'             => __( 'No maps found', 'greenplace' ),
			'not_found_in_trash'    => __( 'No maps found in trash', 'greenplace' ),
			'parent_item_colon'     => __( 'Parent Map portal:', 'greenplace' ),
			'menu_name'             => __( 'Map Portal', 'greenplace' ),
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
		'rest_base'             => 'portal-map',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'portal_map_init' );

/**
 * Sets the post updated messages for the `map` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `map` post type.
 */
function portal_map_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['portal-map'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Map ac updated. <a target="_blank" href="%s">View map ac</a>', 'greenplace' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'greenplace' ),
		3  => __( 'Custom field deleted.', 'greenplace' ),
		4  => __( 'Map Portal updated.', 'greenplace' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'map restored to revision from %s', 'greenplace' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Mpac ac published. <a href="%s">View map ac</a>', 'greenplace' ), esc_url( $permalink ) ),
		7  => __( 'Map Portal saved.', 'greenplace' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Map portal submitted. <a target="_blank" href="%s">Preview map</a>', 'greenplace' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Map ac scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview map ac</a>', 'greenplace' ),
		date_i18n( __( 'M j, Y @ G:i', 'greenplace' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Map ac draft updated. <a target="_blank" href="%s">Preview mapac</a>', 'greenplace' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'portal_map_updated_messages' );

function portal_map_filter_title( $title, $post_id ) {
	if ( $new_title = get_post_meta( $post_id, 'version', true ) ) {
		return __( 'Map', 'greenplace' ) . ' ' . $new_title;
	}

	return $title;
}
add_filter( 'the_title', 'portal_map_filter_title', 10, 2 );
