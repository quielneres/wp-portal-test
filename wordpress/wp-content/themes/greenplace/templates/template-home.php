<?php
/**
 * Template Name: Home Template
 * Template Post Type: post, page
 *
 * @package Greenplace
 */

get_header();
?>

<main class="layout__body">
	<div class="container pt-4 pb-2 fx-grow">
		<div class="row row--padded">

			<div class="col col--lg-8 fx">
				<?php get_template_part('template-parts/home-slide', ''); ?>
			</div>

			<div class="col col--lg-4">
				<?php get_template_part('template-parts/home-contract-search', ''); ?>
			</div>

		</div>

		<div class="row row--padded">
			<!--			<div class="col col--xl-8 fx">-->
			<!--				--><?php //get_template_part('template-parts/content-learn-process', ''); ?>
			<!--			</div>-->

			<?php if ( is_active_sidebar( 'home-mid-1' ) ) : ?>

				<div class="col col--xl-8 fx">
					<?php dynamic_sidebar( 'home-mid-1' ); ?>
				</div>

			<?php endif; ?>

			<div class="col col--xl-4">
				<?php get_template_part('template-parts/home-guides', ''); ?>
			</div>
		</div>

		<div class="row row--padded prifiles-collaborators">
			<div class="col col--md-6">
				<?php get_template_part('template-parts/content-professional-profiles', ''); ?>
			</div>

			<div class="col col--md-6">
				<?php get_template_part('template-parts/content-collaborators-timeline', ''); ?>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>
