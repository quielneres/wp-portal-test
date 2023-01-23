<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Greenplace
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function greenplace_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'greenplace_body_classes' );

/**
 *
 */
function greenplace_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'greenplace_excerpt_length', 999 );

/**
 *
*/
// function greenplace_nav_menu_css_class($classes, $item){
// 	if ( in_array( 'current-menu-item', $classes ) ) {
// 		$classes[] = 'active ';
// 	}

// 	return $classes;
// }
// add_filter( 'nav_menu_css_class' , 'greenplace_nav_menu_css_class' , 10 , 2 );

/**
 *
*/
// add_filter( 'nav_menu_link_attributes', function ( $atts, $item ) {
// 	if ( 'menu-item' === $item->classes[1] ) {
// 		$atts['data-text'] = $item->title;
// 		$atts['title'] = $item->title;
// 		$atts['class'] = 'item__link';
// 	}

// 	return $atts;
// }, 10, 3 );

/**
 *
 */
function add_query_vars_filter( $vars ) {
	$vars[] = 'type';
	$vars[] = 'system_id';
	$vars[] = 'contract_id';
	$vars[] = 'company_id';

	return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );

/**
 *
*/
add_filter('wpcf7_form_elements', function($content) {
	$content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

	return $content;
});

add_filter('wpcf7_autop_or_not', '__return_false');

/**
 *
 */
// function fix_decimal($value, $post_id, $field) {
// 	$value = number_format($value, 0, '', '.');

// 	return $value;
// }
// add_filter( 'acf/format_value/name=qty_units', 'fix_decimal', 20, 3 );
// add_filter( 'acf/format_value/name=qty_employees', 'fix_decimal', 20, 3 );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function greenplace_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'greenplace_pingback_header' );

/**
 *
 */
function greenplace_disable_dashboard_widgets() {
	remove_meta_box( 'dashboard_primary', 'dashboard', 'core' );
	remove_meta_box( 'commentsdiv' , 'system' , 'normal' );
	remove_meta_box( 'commentstatusdiv', 'system', 'normal' );
}
add_action( 'admin_menu', 'greenplace_disable_dashboard_widgets' );

/**
 *
 */
function greenplace_disable_menu_page() {
	remove_submenu_page( 'index.php', 'update-core.php' );
}
add_action( 'admin_init', 'greenplace_disable_menu_page' );

/**
 *
 */
function greenplace_remove_transient_updates() {
	global $wp_version;

	return ( object ) array( 'last_checked' => time(), 'version_checked' => $wp_version );
}
add_filter( 'pre_site_transient_update_core', 'greenplace_remove_transient_updates' );
add_filter( 'pre_site_transient_update_plugins', 'greenplace_remove_transient_updates' );
add_filter( 'pre_site_transient_update_themes', 'greenplace_remove_transient_updates' );

/**
 *
 */
function custom_wp_pagenavi_class( $class_name ) {
	switch( $class_name ) {
		case 'pages':
			$class_name = 'pagination__text';
			break;
		case 'first':
			$class_name = 'first';
			break;
		case 'previouspostslink':
			$class_name = 'pagination__link';
			break;
		case 'extend':
			$class_name = 'extend';
			break;
		case 'smaller':
			$class_name = 'smaller';
			break;
		case 'page':
			$class_name = 'pagination__action';
			break;
		case 'current':
			$class_name = 'pagination__text';
			break;
		case 'larger':
			$class_name = 'larger';
			break;
		case 'nextpostslink':
			$class_name = 'pagination__link';
			break;
		case 'last':
			$class_name = 'last';
			break;
	}

	return $class_name;
}
add_filter( 'wp_pagenavi_class_pages', 'custom_wp_pagenavi_class' );
add_filter( 'wp_pagenavi_class_current', 'custom_wp_pagenavi_class' );
add_filter( 'wp_pagenavi_class_previouspostslink', 'custom_wp_pagenavi_class' );
add_filter( 'wp_pagenavi_class_nextpostslink', 'custom_wp_pagenavi_class' );
add_filter( 'wp_pagenavi_class_page', 'custom_wp_pagenavi_class' );
add_filter( 'wp_pagenavi_class_larger', 'custom_wp_pagenavi_class' );
add_filter( 'wp_pagenavi_class_smaller', 'custom_wp_pagenavi_class' );
add_filter( 'wp_pagenavi_class_extend', 'custom_wp_pagenavi_class' );
add_filter( 'wp_pagenavi_class_last', 'custom_wp_pagenavi_class' );
add_filter( 'wp_pagenavi_class_first', 'custom_wp_pagenavi_class' );
