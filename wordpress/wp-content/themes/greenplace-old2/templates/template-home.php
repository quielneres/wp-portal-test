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
			<div class="col col--xl-8 fx">
				<?php get_template_part('template-parts/content-learn-process', ''); ?>
			</div>
			<div class="col col--xl-4">
				<?php get_template_part('template-parts/home-guides', ''); ?>
			</div>

		</div>

		<div class="row row--padded">
			<style>
				.comb-select {
					/*background-color: red;*/
					max-height: 12rem;
					min-height: 7rem;
					padding: 0 0 0 0;
					margin: 4rem 0 0.85rem 0;
				}

				.desc-time-line {
					padding-bottom: 2.88rem
				}

				.text-profile{
					margin-top: 0.9rem;
				}
				.text-select-profile{
					margin-top: 2rem;
				}
			</style>
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
