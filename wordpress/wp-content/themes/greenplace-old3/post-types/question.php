<?php

/**
 * Registers the `question` post type.
 */
function question_init() {
	register_post_type( 'question', array(
		'labels'                => array(
			'name'                  => __( 'Questions', 'greenplace' ),
			'singular_name'         => __( 'Question', 'greenplace' ),
			'all_items'             => __( 'All Questions', 'greenplace' ),
			'archives'              => __( 'Question Archives', 'greenplace' ),
			'attributes'            => __( 'Question Attributes', 'greenplace' ),
			'insert_into_item'      => __( 'Insert into Question', 'greenplace' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Question', 'greenplace' ),
			'featured_image'        => _x( 'Featured Image', 'question', 'greenplace' ),
			'set_featured_image'    => _x( 'Set featured image', 'question', 'greenplace' ),
			'remove_featured_image' => _x( 'Remove featured image', 'question', 'greenplace' ),
			'use_featured_image'    => _x( 'Use as featured image', 'question', 'greenplace' ),
			'filter_items_list'     => __( 'Filter Questions list', 'greenplace' ),
			'items_list_navigation' => __( 'Questions list navigation', 'greenplace' ),
			'items_list'            => __( 'Questions list', 'greenplace' ),
			'new_item'              => __( 'New Question', 'greenplace' ),
			'add_new'               => __( 'Add New', 'greenplace' ),
			'add_new_item'          => __( 'Add New Question', 'greenplace' ),
			'edit_item'             => __( 'Edit Question', 'greenplace' ),
			'view_item'             => __( 'View Question', 'greenplace' ),
			'view_items'            => __( 'View Questions', 'greenplace' ),
			'search_items'          => __( 'Search Questions', 'greenplace' ),
			'not_found'             => __( 'No Questions found', 'greenplace' ),
			'not_found_in_trash'    => __( 'No Questions found in trash', 'greenplace' ),
			'parent_item_colon'     => __( 'Parent Question:', 'greenplace' ),
			'menu_name'             => __( 'Questions', 'greenplace' ),
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
		'rest_base'             => 'question',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'question_init' );

/**
 * Sets the post updated messages for the `question` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `question` post type.
 */
function question_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['question'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Question updated. <a target="_blank" href="%s">View Question</a>', 'greenplace' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'greenplace' ),
		3  => __( 'Custom field deleted.', 'greenplace' ),
		4  => __( 'Question updated.', 'greenplace' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Question restored to revision from %s', 'greenplace' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Question published. <a href="%s">View Question</a>', 'greenplace' ), esc_url( $permalink ) ),
		7  => __( 'Question saved.', 'greenplace' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Question submitted. <a target="_blank" href="%s">Preview Question</a>', 'greenplace' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Question scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Question</a>', 'greenplace' ),
		date_i18n( __( 'M j, Y @ G:i', 'greenplace' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Question draft updated. <a target="_blank" href="%s">Preview Question</a>', 'greenplace' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'question_updated_messages' );
