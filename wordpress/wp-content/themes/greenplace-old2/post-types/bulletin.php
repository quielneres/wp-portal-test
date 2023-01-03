<?php

/**
 * Registers the `bulletin` post type.
 */
function bulletin_init() {
	register_post_type( 'bulletin', array(
		'labels'                => array(
			'name'                  => __( 'Bulletins', 'greenplace' ),
			'singular_name'         => __( 'Bulletin', 'greenplace' ),
			'all_items'             => __( 'All Bulletins', 'greenplace' ),
			'archives'              => __( 'Bulletin Archives', 'greenplace' ),
			'attributes'            => __( 'Bulletin Attributes', 'greenplace' ),
			'insert_into_item'      => __( 'Insert into bulletin', 'greenplace' ),
			'uploaded_to_this_item' => __( 'Uploaded to this bulletin', 'greenplace' ),
			'featured_image'        => _x( 'Featured Image', 'bulletin', 'greenplace' ),
			'set_featured_image'    => _x( 'Set featured image', 'bulletin', 'greenplace' ),
			'remove_featured_image' => _x( 'Remove featured image', 'bulletin', 'greenplace' ),
			'use_featured_image'    => _x( 'Use as featured image', 'bulletin', 'greenplace' ),
			'filter_items_list'     => __( 'Filter bulletins list', 'greenplace' ),
			'items_list_navigation' => __( 'Bulletins list navigation', 'greenplace' ),
			'items_list'            => __( 'Bulletins list', 'greenplace' ),
			'new_item'              => __( 'New Bulletin', 'greenplace' ),
			'add_new'               => __( 'Add New', 'greenplace' ),
			'add_new_item'          => __( 'Add New Bulletin', 'greenplace' ),
			'edit_item'             => __( 'Edit Bulletin', 'greenplace' ),
			'view_item'             => __( 'View Bulletin', 'greenplace' ),
			'view_items'            => __( 'View Bulletins', 'greenplace' ),
			'search_items'          => __( 'Search bulletins', 'greenplace' ),
			'not_found'             => __( 'No bulletins found', 'greenplace' ),
			'not_found_in_trash'    => __( 'No bulletins found in trash', 'greenplace' ),
			'parent_item_colon'     => __( 'Parent Bulletin:', 'greenplace' ),
			'menu_name'             => __( 'Bulletins', 'greenplace' ),
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
		'menu_icon'             => 'dashicons-megaphone',
		'show_in_rest'          => true,
		'rest_base'             => 'bulletin',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'bulletin_init' );

/**
 * Sets the post updated messages for the `bulletin` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `bulletin` post type.
 */
function bulletin_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['bulletin'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Bulletin updated. <a target="_blank" href="%s">View bulletin</a>', 'greenplace' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'greenplace' ),
		3  => __( 'Custom field deleted.', 'greenplace' ),
		4  => __( 'Bulletin updated.', 'greenplace' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Bulletin restored to revision from %s', 'greenplace' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Bulletin published. <a href="%s">View bulletin</a>', 'greenplace' ), esc_url( $permalink ) ),
		7  => __( 'Bulletin saved.', 'greenplace' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Bulletin submitted. <a target="_blank" href="%s">Preview bulletin</a>', 'greenplace' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Bulletin scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview bulletin</a>', 'greenplace' ),
		date_i18n( __( 'M j, Y @ G:i', 'greenplace' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Bulletin draft updated. <a target="_blank" href="%s">Preview bulletin</a>', 'greenplace' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'bulletin_updated_messages' );
