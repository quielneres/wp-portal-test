<?php

/**
 * Registers the `guide` post type.
 */
function guide_init() {
	register_post_type( 'guide', array(
		'labels'                => array(
			'name'                  => __( 'Guides', 'greenplace' ),
			'singular_name'         => __( 'Guide', 'greenplace' ),
			'all_items'             => __( 'All Guides', 'greenplace' ),
			'archives'              => __( 'Guide Archives', 'greenplace' ),
			'attributes'            => __( 'Guide Attributes', 'greenplace' ),
			'insert_into_item'      => __( 'Insert into guide', 'greenplace' ),
			'uploaded_to_this_item' => __( 'Uploaded to this guide', 'greenplace' ),
			'featured_image'        => _x( 'Featured Image', 'guide', 'greenplace' ),
			'set_featured_image'    => _x( 'Set featured image', 'guide', 'greenplace' ),
			'remove_featured_image' => _x( 'Remove featured image', 'guide', 'greenplace' ),
			'use_featured_image'    => _x( 'Use as featured image', 'guide', 'greenplace' ),
			'filter_items_list'     => __( 'Filter guides list', 'greenplace' ),
			'items_list_navigation' => __( 'Guides list navigation', 'greenplace' ),
			'items_list'            => __( 'Guides list', 'greenplace' ),
			'new_item'              => __( 'New Guide', 'greenplace' ),
			'add_new'               => __( 'Add New', 'greenplace' ),
			'add_new_item'          => __( 'Add New Guide', 'greenplace' ),
			'edit_item'             => __( 'Edit Guide', 'greenplace' ),
			'view_item'             => __( 'View Guide', 'greenplace' ),
			'view_items'            => __( 'View Guides', 'greenplace' ),
			'search_items'          => __( 'Search guides', 'greenplace' ),
			'not_found'             => __( 'No guides found', 'greenplace' ),
			'not_found_in_trash'    => __( 'No guides found in trash', 'greenplace' ),
			'parent_item_colon'     => __( 'Parent Guide:', 'greenplace' ),
			'menu_name'             => __( 'Guides Fábrica', 'greenplace' ),
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
		'menu_icon'             => 'dashicons-book',
		'show_in_rest'          => true,
		'rest_base'             => 'guide',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'guide_init' );

/**
 * Sets the post updated messages for the `guide` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `guide` post type.
 */
function guide_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['guide'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Guide updated. <a target="_blank" href="%s">View guide</a>', 'greenplace' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'greenplace' ),
		3  => __( 'Custom field deleted.', 'greenplace' ),
		4  => __( 'Guide updated.', 'greenplace' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Guide restored to revision from %s', 'greenplace' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Guide published. <a href="%s">View guide</a>', 'greenplace' ), esc_url( $permalink ) ),
		7  => __( 'Guide saved.', 'greenplace' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Guide submitted. <a target="_blank" href="%s">Preview guide</a>', 'greenplace' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Guide scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview guide</a>', 'greenplace' ),
		date_i18n( __( 'M j, Y @ G:i', 'greenplace' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Guide draft updated. <a target="_blank" href="%s">Preview guide</a>', 'greenplace' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'guide_updated_messages' );

/**
 *
 */
function guide_filter_title( $title, $post_id ) {
	if ( $new_title = get_post_meta( $post_id, 'version', true ) ) {
		return __( 'Guide', 'greenplace' ) . ' ' . $new_title;
	}

	return $title;
}
add_filter( 'the_title', 'guide_filter_title', 10, 2 );
