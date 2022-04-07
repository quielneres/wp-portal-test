<?php

/**
 * Registers the `tutorial` post type.
 */
function tutorial_init() {
	register_post_type( 'tutorial', array(
		'labels'                => array(
			'name'                  => __( 'Tutorials', 'greenplace' ),
			'singular_name'         => __( 'Tutorial', 'greenplace' ),
			'all_items'             => __( 'All Tutorials', 'greenplace' ),
			'archives'              => __( 'Tutorial Archives', 'greenplace' ),
			'attributes'            => __( 'Tutorial Attributes', 'greenplace' ),
			'insert_into_item'      => __( 'Insert into Tutorial', 'greenplace' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Tutorial', 'greenplace' ),
			'featured_image'        => _x( 'Featured Image', 'tutorial', 'greenplace' ),
			'set_featured_image'    => _x( 'Set featured image', 'tutorial', 'greenplace' ),
			'remove_featured_image' => _x( 'Remove featured image', 'tutorial', 'greenplace' ),
			'use_featured_image'    => _x( 'Use as featured image', 'tutorial', 'greenplace' ),
			'filter_items_list'     => __( 'Filter Tutorials list', 'greenplace' ),
			'items_list_navigation' => __( 'Tutorials list navigation', 'greenplace' ),
			'items_list'            => __( 'Tutorials list', 'greenplace' ),
			'new_item'              => __( 'New Tutorial', 'greenplace' ),
			'add_new'               => __( 'Add New', 'greenplace' ),
			'add_new_item'          => __( 'Add New Tutorial', 'greenplace' ),
			'edit_item'             => __( 'Edit Tutorial', 'greenplace' ),
			'view_item'             => __( 'View Tutorial', 'greenplace' ),
			'view_items'            => __( 'View Tutorials', 'greenplace' ),
			'search_items'          => __( 'Search Tutorials', 'greenplace' ),
			'not_found'             => __( 'No Tutorials found', 'greenplace' ),
			'not_found_in_trash'    => __( 'No Tutorials found in trash', 'greenplace' ),
			'parent_item_colon'     => __( 'Parent Tutorial:', 'greenplace' ),
			'menu_name'             => __( 'Tutorials', 'greenplace' ),
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
		'menu_icon'             => 'dashicons-welcome-learn-more',
		'show_in_rest'          => true,
		'rest_base'             => 'tutorial',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'tutorial_init' );

/**
 * Sets the post updated messages for the `tutorial` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `tutorial` post type.
 */
function tutorial_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['tutorial'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Tutorial updated. <a target="_blank" href="%s">View Tutorial</a>', 'greenplace' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'greenplace' ),
		3  => __( 'Custom field deleted.', 'greenplace' ),
		4  => __( 'Tutorial updated.', 'greenplace' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Tutorial restored to revision from %s', 'greenplace' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Tutorial published. <a href="%s">View Tutorial</a>', 'greenplace' ), esc_url( $permalink ) ),
		7  => __( 'Tutorial saved.', 'greenplace' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Tutorial submitted. <a target="_blank" href="%s">Preview Tutorial</a>', 'greenplace' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Tutorial scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Tutorial</a>', 'greenplace' ),
		date_i18n( __( 'M j, Y @ G:i', 'greenplace' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Tutorial draft updated. <a target="_blank" href="%s">Preview Tutorial</a>', 'greenplace' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'tutorial_updated_messages' );
