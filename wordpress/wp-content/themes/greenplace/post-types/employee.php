<?php

/**
 * Registers the `employee` post type.
 */
function employee_init() {
	register_post_type( 'employee', array(
		'labels'                => array(
			'name'                  => __( 'Employees', 'greenplace' ),
			'singular_name'         => __( 'Employee', 'greenplace' ),
			'all_items'             => __( 'All Employees', 'greenplace' ),
			'archives'              => __( 'Employee Archives', 'greenplace' ),
			'attributes'            => __( 'Employee Attributes', 'greenplace' ),
			'insert_into_item'      => __( 'Insert into Employee', 'greenplace' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Employee', 'greenplace' ),
			'featured_image'        => _x( 'Featured Image', 'employee', 'greenplace' ),
			'set_featured_image'    => _x( 'Set featured image', 'employee', 'greenplace' ),
			'remove_featured_image' => _x( 'Remove featured image', 'employee', 'greenplace' ),
			'use_featured_image'    => _x( 'Use as featured image', 'employee', 'greenplace' ),
			'filter_items_list'     => __( 'Filter Employees list', 'greenplace' ),
			'items_list_navigation' => __( 'Employees list navigation', 'greenplace' ),
			'items_list'            => __( 'Employees list', 'greenplace' ),
			'new_item'              => __( 'New Employee', 'greenplace' ),
			'add_new'               => __( 'Add New', 'greenplace' ),
			'add_new_item'          => __( 'Add New Employee', 'greenplace' ),
			'edit_item'             => __( 'Edit Employee', 'greenplace' ),
			'view_item'             => __( 'View Employee', 'greenplace' ),
			'view_items'            => __( 'View Employees', 'greenplace' ),
			'search_items'          => __( 'Search Employees', 'greenplace' ),
			'not_found'             => __( 'No Employees found', 'greenplace' ),
			'not_found_in_trash'    => __( 'No Employees found in trash', 'greenplace' ),
			'parent_item_colon'     => __( 'Parent Employee:', 'greenplace' ),
			'menu_name'             => __( 'Employees', 'greenplace' ),
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
		'menu_icon'             => 'dashicons-editor-help',
		'show_in_rest'          => true,
		'rest_base'             => 'employee',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'employee_init' );

/**
 * Sets the post updated messages for the `employee` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `employee` post type.
 */
function employee_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['employee'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Qmployee updated. <a target="_blank" href="%s">View Employee</a>', 'greenplace' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'greenplace' ),
		3  => __( 'Custom field deleted.', 'greenplace' ),
		4  => __( 'Employee updated.', 'greenplace' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Employee restored to revision from %s', 'greenplace' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Employee published. <a href="%s">View Employee</a>', 'greenplace' ), esc_url( $permalink ) ),
		7  => __( 'Employee saved.', 'greenplace' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Employee submitted. <a target="_blank" href="%s">Preview Employee</a>', 'greenplace' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Employee scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Employee</a>', 'greenplace' ),
			date_i18n( __( 'M j, Y @ G:i', 'greenplace' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Employee draft updated. <a target="_blank" href="%s">Preview Employee</a>', 'greenplace' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'employee_updated_messages' );
