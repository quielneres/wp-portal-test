<?php

/**
 * Registers the `outsourcing_journey` post type.
 */
function outsourcing_journey_init() {
	register_post_type( 'outsourcing_journey', array(
		'labels'                => array(
			'name'                  => __( 'Outsourcing journey', 'greenplace' ),
			'singular_name'         => __( 'Outsourcing journey', 'greenplace' ),
			'all_items'             => __( 'All Outsourcing journey', 'greenplace' ),
			'archives'              => __( 'Outsourcing journey Archives', 'greenplace' ),
			'attributes'            => __( 'Outsourcing journey Attributes', 'greenplace' ),
			'insert_into_item'      => __( 'Insert into Outsourcing journey', 'greenplace' ),
			'uploaded_to_this_item' => __( 'Uploaded to this outsourcing_journey', 'greenplace' ),
			'featured_image'        => _x( 'Featured Image', 'outsourcing_journey', 'greenplace' ),
			'set_featured_image'    => _x( 'Set featured image', 'outsourcing_journey', 'greenplace' ),
			'remove_featured_image' => _x( 'Remove featured image', 'outsourcing_journey', 'greenplace' ),
			'use_featured_image'    => _x( 'Use as featured image', 'outsourcing_journey', 'greenplace' ),
			'filter_items_list'     => __( 'Filter Outsourcing journey list', 'greenplace' ),
			'items_list_navigation' => __( 'Outsourcing journey list navigation', 'greenplace' ),
			'items_list'            => __( 'Outsourcing journey list', 'greenplace' ),
			'new_item'              => __( 'New Outsourcing journey', 'greenplace' ),
			'add_new'               => __( 'Add New', 'greenplace' ),
			'add_new_item'          => __( 'Add New Outsourcing Journey', 'greenplace' ),
			'edit_item'             => __( 'Edit Outsourcing Journey', 'greenplace' ),
			'view_item'             => __( 'View Outsourcing Journey', 'greenplace' ),
			'view_items'            => __( 'View Outsourcing Journey', 'greenplace' ),
			'search_items'          => __( 'Search Outsourcing Journey', 'greenplace' ),
			'not_found'             => __( 'No Outsourcing journey found', 'greenplace' ),
			'not_found_in_trash'    => __( 'No Outsourcing journey found in trash', 'greenplace' ),
			'parent_item_colon'     => __( 'Parent Outsourcing journey:', 'greenplace' ),
			'menu_name'             => __( 'Outsourcing Journey', 'greenplace' ),
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
		'rest_base'             => 'outsourcing_journey',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'outsourcing_journey_init' );

/**
 * Sets the post updated messages for the `outsourcing_journey` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `outsourcing_journey` post type.
 */
function outsourcing_journey_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['outsourcing_journey'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Outsourcing journey ac updated. <a target="_blank" href="%s">View Outsourcing journey ac</a>', 'greenplace' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'greenplace' ),
		3  => __( 'Custom field deleted.', 'greenplace' ),
		4  => __( 'Outsourcing journey updated.', 'greenplace' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Outsourcing journey restored to revision from %s', 'greenplace' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Mpac ac published. <a href="%s">View Outsourcing journey ac</a>', 'greenplace' ), esc_url( $permalink ) ),
		7  => __( 'Outsourcing journey saved.', 'greenplace' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Outsourcing journey submitted. <a target="_blank" href="%s">Preview Outsourcing journey</a>', 'greenplace' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Outsourcing journey ac scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Outsourcing journey ac</a>', 'greenplace' ),
		date_i18n( __( 'M j, Y @ G:i', 'greenplace' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Outsourcing journey ac draft updated. <a target="_blank" href="%s">Preview outsourcingsac</a>', 'greenplace' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'outsourcing_journey_updated_messages' );

function outsourcing_journey_filter_title( $title, $post_id ) {
	if ( $new_title = get_post_meta( $post_id, 'version', true ) ) {
		return __( 'Outsourcings', 'greenplace' ) . ' ' . $new_title;
	}

	return $title;
}
add_filter( 'the_title', 'outsourcing_journey_filter_title', 10, 2 );
