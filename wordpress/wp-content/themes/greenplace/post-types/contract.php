<?php

/**
 * Registers the `contract` post type.
 */
function contract_init() {
	register_post_type( 'contract', array(
		'labels'                => array(
			'name'                  => __( 'Contracts', 'greenplace' ),
			'singular_name'         => __( 'Contract', 'greenplace' ),
			'all_items'             => __( 'All Contracts', 'greenplace' ),
			'archives'              => __( 'Contract Archives', 'greenplace' ),
			'attributes'            => __( 'Contract Attributes', 'greenplace' ),
			'insert_into_item'      => __( 'Insert into Contract', 'greenplace' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Contract', 'greenplace' ),
			'featured_image'        => _x( 'Featured Image', 'contract', 'greenplace' ),
			'set_featured_image'    => _x( 'Set featured image', 'contract', 'greenplace' ),
			'remove_featured_image' => _x( 'Remove featured image', 'contract', 'greenplace' ),
			'use_featured_image'    => _x( 'Use as featured image', 'contract', 'greenplace' ),
			'filter_items_list'     => __( 'Filter Contracts list', 'greenplace' ),
			'items_list_navigation' => __( 'Contracts list navigation', 'greenplace' ),
			'items_list'            => __( 'Contracts list', 'greenplace' ),
			'new_item'              => __( 'New Contract', 'greenplace' ),
			'add_new'               => __( 'Add New', 'greenplace' ),
			'add_new_item'          => __( 'Add New Contract', 'greenplace' ),
			'edit_item'             => __( 'Edit Contract', 'greenplace' ),
			'view_item'             => __( 'View Contract', 'greenplace' ),
			'view_items'            => __( 'View Contracts', 'greenplace' ),
			'search_items'          => __( 'Search Contracts', 'greenplace' ),
			'not_found'             => __( 'No Contracts found', 'greenplace' ),
			'not_found_in_trash'    => __( 'No Contracts found in trash', 'greenplace' ),
			'parent_item_colon'     => __( 'Parent Contract:', 'greenplace' ),
			'menu_name'             => __( 'Contracts', 'greenplace' ),
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
		'menu_icon'             => 'dashicons-text-page',
		'show_in_rest'          => true,
		'rest_base'             => 'contract',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'contract_init' );

/**
 * Sets the post updated messages for the `contract` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `contract` post type.
 */
function contract_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['contract'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Contract updated. <a target="_blank" href="%s">View Contract</a>', 'greenplace' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'greenplace' ),
		3  => __( 'Custom field deleted.', 'greenplace' ),
		4  => __( 'Contract updated.', 'greenplace' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Contract restored to revision from %s', 'greenplace' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Contract published. <a href="%s">View Contract</a>', 'greenplace' ), esc_url( $permalink ) ),
		7  => __( 'Contract saved.', 'greenplace' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Contract submitted. <a target="_blank" href="%s">Preview Contract</a>', 'greenplace' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Contract scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Contract</a>', 'greenplace' ),
		date_i18n( __( 'M j, Y @ G:i', 'greenplace' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Contract draft updated. <a target="_blank" href="%s">Preview Contract</a>', 'greenplace' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'contract_updated_messages' );
