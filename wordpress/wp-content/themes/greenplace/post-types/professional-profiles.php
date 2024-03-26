<?php

/**
 * Registers the `professional_profile` post type.
 */
function professional_profile_init() {
	register_post_type( 'professional_profile', array(
		'labels'                => array(
			'name'                  => __( 'Professional profile', 'greenplace' ),
			'singular_name'         => __( 'Professional profile', 'greenplace' ),
			'all_items'             => __( 'All Professional profile', 'greenplace' ),
			'archives'              => __( 'Professional profile Archives', 'greenplace' ),
			'attributes'            => __( 'Professional profile Attributes', 'greenplace' ),
			'insert_into_item'      => __( 'Insert into professional profile', 'greenplace' ),
			'uploaded_to_this_item' => __( 'Uploaded to this professional_profile', 'greenplace' ),
			'featured_image'        => _x( 'Featured Image', 'professional_profile', 'greenplace' ),
			'set_featured_image'    => _x( 'Set featured image', 'professional_profile', 'greenplace' ),
			'remove_featured_image' => _x( 'Remove featured image', 'professional_profile', 'greenplace' ),
			'use_featured_image'    => _x( 'Use as featured image', 'professional_profile', 'greenplace' ),
			'filter_items_list'     => __( 'Filter professional profile list', 'greenplace' ),
			'items_list_navigation' => __( 'Professional profile list navigation', 'greenplace' ),
			'items_list'            => __( 'Professional profile list', 'greenplace' ),
			'new_item'              => __( 'New Professional profile', 'greenplace' ),
			'add_new'               => __( 'Add New', 'greenplace' ),
			'add_new_item'          => __( 'Add New Professional Profile', 'greenplace' ),
			'edit_item'             => __( 'Edit Professional Profile', 'greenplace' ),
			'view_item'             => __( 'View Professional Profile', 'greenplace' ),
			'view_items'            => __( 'View Professional Profile', 'greenplace' ),
			'search_items'          => __( 'Search Professional Profile', 'greenplace' ),
			'not_found'             => __( 'No professional profile found', 'greenplace' ),
			'not_found_in_trash'    => __( 'No professional profile found in trash', 'greenplace' ),
			'parent_item_colon'     => __( 'Parent Professional profile:', 'greenplace' ),
			'menu_name'             => __( 'Professional Profile', 'greenplace' ),
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
		'rest_base'             => 'professional_profile',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'professional_profile_init' );

/**
 * Sets the post updated messages for the `professional_profile` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `professional_profile` post type.
 */
function professional_profile_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['professional_profile'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Professional profile ac updated. <a target="_blank" href="%s">View professional profile ac</a>', 'greenplace' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'greenplace' ),
		3  => __( 'Custom field deleted.', 'greenplace' ),
		4  => __( 'Professional profile updated.', 'greenplace' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'professional profile restored to revision from %s', 'greenplace' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Mpac ac published. <a href="%s">View professional profile ac</a>', 'greenplace' ), esc_url( $permalink ) ),
		7  => __( 'Professional profile saved.', 'greenplace' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Professional profile submitted. <a target="_blank" href="%s">Preview professional profile</a>', 'greenplace' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Professional profile ac scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview professional profile ac</a>', 'greenplace' ),
		date_i18n( __( 'M j, Y @ G:i', 'greenplace' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Professional profile ac draft updated. <a target="_blank" href="%s">Preview professionalsac</a>', 'greenplace' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'professional_profile_updated_messages' );

function professional_profile_filter_title( $title, $post_id ) {
	if ( $new_title = get_post_meta( $post_id, 'version', true ) ) {
		return __( 'Professionals', 'greenplace' ) . ' ' . $new_title;
	}

	return $title;
}
add_filter( 'the_title', 'professional_profile_filter_title', 10, 2 );
