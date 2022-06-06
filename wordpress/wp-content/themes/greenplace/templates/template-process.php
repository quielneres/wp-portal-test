<?php
/**
 * Template Name: Process Template
 * Template Post Type: post, page
 *
 * @package Greenplace
 */

get_header();
?>

<main class="layout__body">
	<?php get_template_part( 'template-parts/page-headline', get_post_type() ); ?>

	<div class="container pt-4 pb-2 fx-grow">
		<div class="row row--padded">

			<div class="col col--md-8">
				<?php get_template_part('template-parts/content-list-process', ''); ?>
			</div>

			<div class="col col--md-4">
				<?php dynamic_sidebar( 'process-sidebar-1' ); ?>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>
