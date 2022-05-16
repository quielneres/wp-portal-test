<?php
/**
 * Template Name: Process Template
 * Template Post Type: post, page
 *
 * @package Greenplace
 */

get_header();


$last_guide = new WP_Query( array(
	'post_type'      => 'guide',
	'posts_per_page' => 1,
	'meta_key'       => 'version',
	'orderby'        => 'meta_value_num',
	'order'          => 'DESC'
) );
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

				<div class="widget">
					<div class="widget__body">
						<div class="row">
							<div class="col center-xs">
								<h2 class="h3 mb-0">Acesso Fácil</h2>

								<p class="mb-4">Para mais orientações, acesse:</p>

								<div class="row center-xs">

									<?php
										if ( $last_guide->have_posts() ):

											while ( $last_guide->have_posts() ) : $last_guide->the_post();
											?>

												<div class="col col--xs-6">
													<a class="shortcut" href="<?php the_field( 'file' ); ?>" target="_blank">
														<div class="shortcut__media media media--sm bg-green">
															<div class="media__icon"><i class="i i--file-check"></i></div>
														</div>

														<div class="shortcut__title" style="white-space: nowrap">
															<i class="i i--download tx-muted"></i>
															<span>Guia USTIBB <?php the_field( 'version' ); ?></span>
														</div>
													</a>
												</div>

											<?php endwhile;

										endif;

										wp_reset_postdata();
									?>

									<div class="col col--xs-6">
										<a class="shortcut" href="<?= get_post_meta( '790', '_menu_item_url', true ); ?>" target="_blank">
											<div class="shortcut__media media media--sm bg-green">
												<div class="media__icon"><i class="i i--bookmark-document"></i></div>
											</div>
											<div class="shortcut__title"><span>IN1187</span>
												<small class="i i--external tx-muted"></small>
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="widget widget--lined">
					<div class="widget__body">
						<p><i class="i i--question tx-align"></i> Ainda tem dúvidas? Consulte nosso <a href="<?php echo get_page_link( get_page_by_title( 'FAQ' )->ID ); ?>">FAQ</a>.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php get_template_part( 'template-parts/content-call-contact', get_post_type() ); ?>
</main>

<?php get_footer(); ?>
