<?php
/**
 * Template Name: Others Template
 * Template Post Type: post, page
 *
 * @package Greenplace
 */

get_header();

$posts = get_posts( array(
	'post_type'      => 'others',
	'posts_per_page' => -1,
	'meta_key'       => 'order',
	'meta_type'      => 'NUMERIC',
	'orderby'        => 'meta_value',
	'order'          => 'ASC'
) );

$last_guide = new WP_Query( array(
	'post_type'      => 'guide',
	'posts_per_page' => 1,
	'meta_key'       => 'version',
	'orderby'        => 'meta_value_num',
	'order'          => 'DESC'
) );
?>

<main class="layout__body bodyothers">
	<?php get_template_part( 'template-parts/page-headline', get_post_type() ); ?>

	<div class="container pt-4 pb-2 fx-grow">
		<div class="row row--padded">
			<div class="col whiteAreaContent col--md-12 pt-3">
				
				<?php the_content(); ?>

			</div>

		</div>
	</div>

<!--	--><?php //get_template_part( 'template-parts/content-call-contact', get_post_type() ); ?>
</main>

<?php get_footer(); ?>
