<?php

/**
 * Registers the `company` post type.
 */
function company_init() {
	register_post_type( 'company', array(
		'labels'                => array(
			'name'                  => __( 'Companies', 'greenplace' ),
			'singular_name'         => __( 'Company', 'greenplace' ),
			'all_items'             => __( 'All Companies', 'greenplace' ),
			'archives'              => __( 'Company Archives', 'greenplace' ),
			'attributes'            => __( 'Company Attributes', 'greenplace' ),
			'insert_into_item'      => __( 'Insert into company', 'greenplace' ),
			'uploaded_to_this_item' => __( 'Uploaded to this company', 'greenplace' ),
			'featured_image'        => _x( 'Featured Image', 'company', 'greenplace' ),
			'set_featured_image'    => _x( 'Set featured image', 'company', 'greenplace' ),
			'remove_featured_image' => _x( 'Remove featured image', 'company', 'greenplace' ),
			'use_featured_image'    => _x( 'Use as featured image', 'company', 'greenplace' ),
			'filter_items_list'     => __( 'Filter companies list', 'greenplace' ),
			'items_list_navigation' => __( 'Companies list navigation', 'greenplace' ),
			'items_list'            => __( 'Companies list', 'greenplace' ),
			'new_item'              => __( 'New Company', 'greenplace' ),
			'add_new'               => __( 'Add New', 'greenplace' ),
			'add_new_item'          => __( 'Add New Company', 'greenplace' ),
			'edit_item'             => __( 'Edit Company', 'greenplace' ),
			'view_item'             => __( 'View Company', 'greenplace' ),
			'view_items'            => __( 'View Companies', 'greenplace' ),
			'search_items'          => __( 'Search companies', 'greenplace' ),
			'not_found'             => __( 'No companies found', 'greenplace' ),
			'not_found_in_trash'    => __( 'No companies found in trash', 'greenplace' ),
			'parent_item_colon'     => __( 'Parent Company:', 'greenplace' ),
			'menu_name'             => __( 'Companies', 'greenplace' ),
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
		'menu_icon'             => 'dashicons-businessman',
		'show_in_rest'          => true,
		'rest_base'             => 'company',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'company_init' );

/**
 * Sets the post updated messages for the `company` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `company` post type.
 */
function company_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['company'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Company updated. <a target="_blank" href="%s">View company</a>', 'greenplace' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'greenplace' ),
		3  => __( 'Custom field deleted.', 'greenplace' ),
		4  => __( 'Company updated.', 'greenplace' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Company restored to revision from %s', 'greenplace' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Company published. <a href="%s">View company</a>', 'greenplace' ), esc_url( $permalink ) ),
		7  => __( 'Company saved.', 'greenplace' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Company submitted. <a target="_blank" href="%s">Preview company</a>', 'greenplace' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Company scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview company</a>', 'greenplace' ),
		date_i18n( __( 'M j, Y @ G:i', 'greenplace' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Company draft updated. <a target="_blank" href="%s">Preview company</a>', 'greenplace' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'company_updated_messages' );
