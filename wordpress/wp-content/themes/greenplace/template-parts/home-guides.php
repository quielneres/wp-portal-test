<?php
/**
 * Template part for displaying ...
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Greenplace
 */

/**
 *
 */
// function filter_case($orderby = '') {
// 	$orderby .= " CASE WHEN wp_postmeta.meta_value RLIKE '^[0-9]' THEN '' ELSE wp_postmeta.meta_value END ASC, wp_postmeta.meta_value+0 ASC";

// 	return $orderby;
// }

// add_filter( 'posts_orderby', 'filter_case' );

$last_guide = new WP_Query( array(
	'post_type'      => 'guide',
	'posts_per_page' => 1,
	'meta_key'       => 'version',
	'orderby'        => 'meta_value_num',
	'order'          => 'DESC'
) );

// echo $last_guide->request;

// remove_filter( 'posts_orderby', 'filter_case' );

$two_next_guides = new WP_Query( array(
	'post_type'      => 'guide',
	'posts_per_page' => 2,
	'meta_key'       => 'version',
	'orderby'        => 'meta_value_num',
	'order'          => 'DESC',
	'offset'         => 1
) );

?>

<div class="row widget" style="overflow: hidden">
    <?php get_template_part('template-parts/content-guides', ''); ?>

</div>
