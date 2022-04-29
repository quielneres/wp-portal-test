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
			<div class="col col--lg-4">
				<?php get_template_part('template-parts/home-contract-search', ''); ?>
			</div>

			<div class="col col--lg-8 fx">
				<?php get_template_part('template-parts/home-slide', ''); ?>
			</div>
		</div>

		<div class="row row--padded">
			<div class="col col--xl-4">
				<?php get_template_part('template-parts/home-guides', ''); ?>
			</div>

			<?php if ( is_active_sidebar( 'home-mid-1' ) ) : ?>

				<div class="col col--xl-8 fx">
					<?php dynamic_sidebar( 'home-mid-1' ); ?>
				</div>

			<?php endif; ?>
		</div>


		<div class="row row--padded">
            <style>
                .comb-select {
                    /*background-color: red;*/
                    max-height: 12rem;
                    min-height: 12rem ;
                    padding: 25px 0 0 0;
                    margin: 0 0 1rem;
                }
                .title--profiles{
                    margin-top: 20px;
                }
            </style>
			<div class="col col--md-6">
				<?php get_template_part('template-parts/content-professional-profiles', ''); ?>

			</div>

			<div class="col col--md-6">
				<?php get_template_part('template-parts/content-panels-timeline', ''); ?>

			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>
