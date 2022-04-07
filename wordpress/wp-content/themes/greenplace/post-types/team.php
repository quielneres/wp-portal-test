<?php

/**
 * Registers the `team` post type.
 */
function team_init() {
	register_post_type( 'team', array(
		'labels'                => array(
			'name'                  => __( 'Teams', 'greenplace' ),
			'singular_name'         => __( 'Team', 'greenplace' ),
			'all_items'             => __( 'All Teams', 'greenplace' ),
			'archives'              => __( 'Team Archives', 'greenplace' ),
			'attributes'            => __( 'Team Attributes', 'greenplace' ),
			'insert_into_item'      => __( 'Insert into team', 'greenplace' ),
			'uploaded_to_this_item' => __( 'Uploaded to this team', 'greenplace' ),
			'featured_image'        => _x( 'Featured Image', 'team', 'greenplace' ),
			'set_featured_image'    => _x( 'Set featured image', 'team', 'greenplace' ),
			'remove_featured_image' => _x( 'Remove featured image', 'team', 'greenplace' ),
			'use_featured_image'    => _x( 'Use as featured image', 'team', 'greenplace' ),
			'filter_items_list'     => __( 'Filter teams list', 'greenplace' ),
			'items_list_navigation' => __( 'Teams list navigation', 'greenplace' ),
			'items_list'            => __( 'Teams list', 'greenplace' ),
			'new_item'              => __( 'New Team', 'greenplace' ),
			'add_new'               => __( 'Add New', 'greenplace' ),
			'add_new_item'          => __( 'Add New Team', 'greenplace' ),
			'edit_item'             => __( 'Edit Team', 'greenplace' ),
			'view_item'             => __( 'View Team', 'greenplace' ),
			'view_items'            => __( 'View Teams', 'greenplace' ),
			'search_items'          => __( 'Search teams', 'greenplace' ),
			'not_found'             => __( 'No teams found', 'greenplace' ),
			'not_found_in_trash'    => __( 'No teams found in trash', 'greenplace' ),
			'parent_item_colon'     => __( 'Parent Team:', 'greenplace' ),
			'menu_name'             => __( 'Teams', 'greenplace' ),
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
		'menu_icon'             => 'dashicons-businessman',
		'show_in_rest'          => true,
		'rest_base'             => 'team',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'team_init' );

/**
 * Sets the post updated messages for the `team` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `team` post type.
 */
function team_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['team'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Team updated. <a target="_blank" href="%s">View team</a>', 'greenplace' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'greenplace' ),
		3  => __( 'Custom field deleted.', 'greenplace' ),
		4  => __( 'Team updated.', 'greenplace' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Team restored to revision from %s', 'greenplace' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Team published. <a href="%s">View team</a>', 'greenplace' ), esc_url( $permalink ) ),
		7  => __( 'Team saved.', 'greenplace' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Team submitted. <a target="_blank" href="%s">Preview team</a>', 'greenplace' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Team scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview team</a>', 'greenplace' ),
		date_i18n( __( 'M j, Y @ G:i', 'greenplace' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Team draft updated. <a target="_blank" href="%s">Preview team</a>', 'greenplace' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'team_updated_messages' );
