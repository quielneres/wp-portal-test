<?php
/**
 * Template Name: Panels Template
 * Template Post Type: post, page
 *
 * @package Greenplace
 */

get_header();

$posts = get_posts( array(
	'post_type'      => 'panel',
	'posts_per_page' => -1
) );
?>

<main class="layout__body">
	<?php get_template_part( 'template-parts/page-headline', get_post_type() ); ?>

	<div class="container pt-4 pb-2 fx-grow">
		<div class="row row--padded">
			<?php
				if ( $posts ):

					foreach($posts as $post):

						setup_postdata( $post )
						?>

						<div class="col col--lg-6">
							<div class="row widget" style="overflow: hidden">
								<a class="col col--md-6 widget__head bg-blue cover cover--top aspect-ratio aspect-ratio--1x1" href="<?php the_field( 'url' ); ?>" target="_blank">
									<div class="cover__img" style="background-image: url(<?php the_field( 'background' ); ?>)"></div>

									<div class="aspect-ratio__content">
										<div class="pos pos--center pos--middle"><i class="i i--report fs-big"></i></div>
										<!-- <div class="pos pos--top pos--right mt-3 mr-3"><i class="i i--lock fs-xl"></i></div> -->
									</div>
								</a>

								<div class="col col--md-6 widget__body">
									<h3 class="h4">
										<a href="<?php the_field( 'url' ); ?>" target="_blank"><?php the_title(); ?></a>
									</h3>

									<div class="tx-sm"><?php the_content(); ?></div>
								</div>
							</div>
						</div>

					<?php endforeach;

				endif;

				wp_reset_postdata();
			?>
		</div>
	</div>

	<?php get_template_part( 'template-parts/content-call-contact', get_post_type() ); ?>
</main>

<?php get_footer(); ?>
