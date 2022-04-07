<?php
/**
 * Template Name: Bulletins Template
 * Template Post Type: post, page
 *
 * @package Greenplace
 */

get_header();

$featured = new WP_Query( array(
	'post_type'      => 'bulletin',
	'posts_per_page' => 1,
	'meta_key'       => 'featured',
	'meta_value'     => 1
) );

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$posts = new WP_Query( array(
	'post_type'      => 'bulletin',
	'post__not_in'   => wp_list_pluck( $featured->posts, 'ID' ),
	'posts_per_page' => 6,
	'paged' => $paged
) );
?>

<main class="layout__body">
	<?php get_template_part( 'template-parts/page-headline', get_post_type() ); ?>

	<div class="container pt-4 pb-2 fx-grow">
		<h2 class="h3">Em Destaque</h2>
		<div class="fx">
			<?php
				if ( $featured->have_posts() ):

					while ( $featured->have_posts() ) : $featured->the_post();
					?>

						<div class="widget row" style="overflow: hidden">
							<a class="widget__head aspect-ratio aspect-ratio--16x9 cover cover--center bg-blue col col--md-5" href="<?php the_permalink(); ?>">
								<div class="cover__img" style="background-image: url(<?php the_field( 'background' ); ?>)"></div>

								<div class="aspect-ratio__content">
									<div class="pos pos--center pos--middle"><i class="i i--announcement fs-big"></i></div>
								</div>
							</a>

							<div class="widget__body col col--md-7">
								<h3 class="h2 mb-2">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3>

								<ul class="meta row">
									<li class="meta__item col col--md-6">Por <?php echo get_the_author_meta( 'display_name' ); ?></li>
									<li class="meta__item col col--md-6 end-sm"><?php the_date(); ?></li>
								</ul>

								<div class="tx-sm"><?php the_excerpt(); ?></div>
							</div>
						</div>

						<?php endwhile;

				endif;

				wp_reset_postdata();
			?>
		</div>

		<h2 class="h4 mt-3">Mais Novidades</h2>

		<div class="row row--padded">
			<?php
				if ( $posts->have_posts() ):

					while ( $posts->have_posts() ) : $posts->the_post();
					?>

						<div class="col col--md-4 fx">
							<div class="widget fx-grow">
								<a class="widget__head aspect-ratio aspect-ratio--16x9 cover cover--center bg-blue" href="<?php the_permalink(); ?>">
									<div class="cover__img" style="background-image: url(<?php the_field( 'background' ); ?>)"></div>
									<div class="aspect-ratio__content pos pos--bottom">
										<h1 class="head head--sm">
											<span class="head__title"><?php the_title(); ?></span>
										</h1>
									</div>
								</a>

								<div class="widget__body pt-3">
									<ul class="meta row">
										<li class="meta__item col col--md-6">Por <?php echo get_the_author_meta( 'display_name' ); ?></li>
										<li class="meta__item col col--md-6 end-sm"><?php the_date(); ?></li>
									</ul>

									<?php the_excerpt(); ?>
								</div>
							</div>
						</div>

					<?php endwhile;

				endif;

				wp_reset_postdata();
			?>
		</div>

		<?php
			if (function_exists('wp_pagenavi')):
				wp_pagenavi( array(
					'wrapper_class' => 'pagination pagination--center mb-5',
					// 'wrapper_tag' => 'ol',
					'query' => $posts,
					'type' => 'bulletin'
				) );
			endif;
		?>

		<!-- <ol class="pagination pagination--center mb-5">
			<li class="pagination__item"><span class="pagination__text" href="">Anterior</span></li>
			<li class="pagination__item"><a class="pagination__action" href="">1</a></li>
			<li class="pagination__item"><a class="pagination__action" href="">2</a></li>
			<li class="pagination__item"><a class="pagination__action" href="">3</a></li>
			<li class="pagination__item"><span class="pagination__text"><i class="i i--more"></i></span></li>
			<li class="pagination__item"><a class="pagination__action" href="">7</a></li>
			<li class="pagination__item is-active"><a class="pagination__action" href="">8</a></li>
			<li class="pagination__item"><a class="pagination__action" href="">9</a></li>
			<li class="pagination__item"><span class="pagination__text"><i class="i i--more"></i></span></li>
			<li class="pagination__item"><a class="pagination__action" href="">13</a></li>
			<li class="pagination__item"><a class="pagination__action" href="">14</a></li>
			<li class="pagination__item"><a class="pagination__action" href="">15</a></li>
			<li class="pagination__item"><a class="pagination__link" href="">Próxima</a></li>
		</ol> -->

	</div>

	<?php get_template_part( 'template-parts/content-call-contact', get_post_type() ); ?>
</main>

<?php get_footer(); ?>
