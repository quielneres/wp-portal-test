<?php

/**
 * Registers the `panel` post type.
 */
function panel_init() {
	register_post_type( 'panel', array(
		'labels'                => array(
			'name'                  => __( 'Panels', 'greenplace' ),
			'singular_name'         => __( 'Panel', 'greenplace' ),
			'all_items'             => __( 'All Panels', 'greenplace' ),
			'archives'              => __( 'Panel Archives', 'greenplace' ),
			'attributes'            => __( 'Panel Attributes', 'greenplace' ),
			'insert_into_item'      => __( 'Insert into Panel', 'greenplace' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Panel', 'greenplace' ),
			'featured_image'        => _x( 'Featured Image', 'panel', 'greenplace' ),
			'set_featured_image'    => _x( 'Set featured image', 'panel', 'greenplace' ),
			'remove_featured_image' => _x( 'Remove featured image', 'panel', 'greenplace' ),
			'use_featured_image'    => _x( 'Use as featured image', 'panel', 'greenplace' ),
			'filter_items_list'     => __( 'Filter Panels list', 'greenplace' ),
			'items_list_navigation' => __( 'Panels list navigation', 'greenplace' ),
			'items_list'            => __( 'Panels list', 'greenplace' ),
			'new_item'              => __( 'New Panel', 'greenplace' ),
			'add_new'               => __( 'Add New', 'greenplace' ),
			'add_new_item'          => __( 'Add New Panel', 'greenplace' ),
			'edit_item'             => __( 'Edit Panel', 'greenplace' ),
			'view_item'             => __( 'View Panel', 'greenplace' ),
			'view_items'            => __( 'View Panels', 'greenplace' ),
			'search_items'          => __( 'Search Panels', 'greenplace' ),
			'not_found'             => __( 'No Panels found', 'greenplace' ),
			'not_found_in_trash'    => __( 'No Panels found in trash', 'greenplace' ),
			'parent_item_colon'     => __( 'Parent Panel:', 'greenplace' ),
			'menu_name'             => __( 'Panels', 'greenplace' ),
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
		'menu_icon'             => 'dashicons-chart-area',
		'show_in_rest'          => true,
		'rest_base'             => 'panel',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'panel_init' );

/**
 * Sets the post updated messages for the `panel` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `panel` post type.
 */
function panel_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['panel'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Panel updated. <a target="_blank" href="%s">View Panel</a>', 'greenplace' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'greenplace' ),
		3  => __( 'Custom field deleted.', 'greenplace' ),
		4  => __( 'Panel updated.', 'greenplace' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Panel restored to revision from %s', 'greenplace' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Panel published. <a href="%s">View Panel</a>', 'greenplace' ), esc_url( $permalink ) ),
		7  => __( 'Panel saved.', 'greenplace' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Panel submitted. <a target="_blank" href="%s">Preview Panel</a>', 'greenplace' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Panel scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Panel</a>', 'greenplace' ),
		date_i18n( __( 'M j, Y @ G:i', 'greenplace' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Panel draft updated. <a target="_blank" href="%s">Preview Panel</a>', 'greenplace' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'panel_updated_messages' );
