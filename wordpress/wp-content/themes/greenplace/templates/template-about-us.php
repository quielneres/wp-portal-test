<?php
/**
 * Template Name: About Us Template
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

$manager = get_field_object( 'manager_user_id' )[ 'value' ];

$teams = get_posts( array(
	'post_type'      => 'team',
	'posts_per_page' => -1,
	'orderby'        => 'name',
	'order'          => 'ASC'
) );
?>

<main class="layout__body">
	<?php get_template_part( 'template-parts/page-headline', get_post_type() ); ?>

	<div class="pt-5 pb-4">
		<div class="container">
			<div class="row">
				<div class="col col--lg-6 col--lg-offset-3 center-lg">
					<blockquote class="blockquote blockquote--quoted">
						<p class="blockquote__body"><span class="blockquote__icon"><i class="i i--quote-left tx-white"></i></span><?php the_field( 'mission' ); ?><span class="blockquote__icon"><i class="i i--quote-right tx-white"></i></span></p>
					</blockquote>
				</div>
			</div>
		</div>
	</div>

	<div class="bg-green pt-4 pb-2">
		<div class="container">
			<div class="row">
				<div class="col col--lg-6 col--lg-offset-3 center-lg">
					<div class="tip tip--xl">
						<a class="tip__media media media--xl mr-3 bd" href="https://humanograma.intranet.bb.com.br/<?php echo get_post_field( 'key', $manager ); ?>" target="_blank">
							<img class="media__img" src="https://humanograma.intranet.bb.com.br/avatar/<?php echo get_post_field( 'key', $manager ); ?>" alt="<?php echo get_post_field( 'name', $manager ); ?>">
						</a>

						<div class="tip__body">
							<a class="head head--lg" href="https://humanograma.intranet.bb.com.br/<?php echo get_post_field( 'key', $manager ); ?>" target="_blank">
								<span class="head__title"><?php echo get_post_field( 'name', $manager ); ?></span>
								<span class="head__desc"><?php echo get_post_field( 'role_name', $manager ); ?></span>
							</a>

							<ul class="list list--inline tx-sm">
								<li class="list__item">
									<a class="list__link" href="tel:<?php echo get_post_field( 'phone', $manager ); ?>"><i class="i i--phone tx-muted"></i><strong><?php echo get_post_field( 'phone', $manager ); ?></strong></a>
								</li>

								<li class="list__item">
									<a class="list__link" href="https://humanograma.intranet.bb.com.br/<?php echo get_post_field( 'key', $manager ); ?>" target="_blank">
										<small class="i i--external tx-muted"></small>
										<strong><?php echo get_post_field( 'key', $manager ); ?></strong>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container pt-5 pb-2">
		<div class="row row--padded">

			<?php
				if ( $teams ):

					foreach($teams as $post):

						setup_postdata( $post )
						?>

						<?php
							$manager = get_field_object( 'manager_user_id' )[ 'value' ];
							$analysts = get_field_object( 'analysts' )[ 'value' ];
						?>

						<div class="col col--xl-4 fx">
							<h2 class="h3 ta-center"><?php the_field( 'name' ); ?></h2>

							<div class="widget fx fx-grow" style="overflow: hidden">
								<div class="widget__head bg-blue">
									<div class="tip tip--sm">
										<a class="tip__media media media--sm mr-3 bd" href="https://humanograma.intranet.bb.com.br/<?php echo get_post_field( 'key', $manager ); ?>" target="_blank">
											<img class="media__img" src="https://humanograma.intranet.bb.com.br/avatar/<?php echo get_post_field( 'key', $manager ); ?>" alt="Wladys Terraciano">
										</a>

										<div class="tip__body">
											<a class="head head--sm mb-0" href="https://humanograma.intranet.bb.com.br/<?php echo get_post_field( 'key', $manager ); ?>" target="_blank"><span class="head__title"><?php echo get_post_field( 'name', $manager ); ?></span><span class="head__desc"><?php echo get_post_field( 'role_name', $manager ); ?></span></a>

											<ul class="list list--inline tx-xs mb-0">
												<li class="list__item"><a class="list__link" href="tel:<?php echo get_post_field( 'phone', $manager ); ?>"><i class="i i--phone tx-muted"></i><strong><?php echo get_post_field( 'phone', $manager ); ?></strong></a></li>
												<li class="list__item">
													<a class="list__link" href="https://humanograma.intranet.bb.com.br/<?php echo get_post_field( 'key', $manager ); ?>" target="_blank">
														<small class="i i--external tx-muted"></small><span><?php echo get_post_field( 'key', $manager ); ?></span></a>
												</li>
											</ul>
										</div>
									</div>
								</div>

								<div class="widget__body fx-grow">
									<div class="tx-sm"><?php the_field( 'description' ); ?></div>
								</div>

								<div class="widget__foot" style="min-height: 17rem">
									<h3 class="h5 tx-muted">Analistas</h3>

									<div class="row">

									<?php
										if ( $analysts ):

											foreach($analysts as $post):

												setup_postdata( $post )
												?>

													<div class="col col--sm-4 col--xl-6">
														<a class="tip tip--xs" href="https://humanograma.intranet.bb.com.br/<?php the_field( 'key' ); ?>" target="_blank">
															<div class="tip__media media media--xs">
																<img class="media__img" src="https://humanograma.intranet.bb.com.br/avatar/<?php the_field( 'key' ); ?>" alt="<?php the_field( 'name' ); ?>">
															</div>

															<div class="tip__body head head--xs">
																<span class="head__title"><?php the_field( 'name' ); ?></span>
															</div>

														</a>
													</div>

												<?php endforeach;

											endif;

											wp_reset_postdata();
										?>

									</div>
								</div>
							</div>
						</div>

					<?php endforeach;

				endif;

				wp_reset_postdata();
			?>

		</div>
	</div>

	<div class="pt-5 pb-4 bg-white">
		<div class="container">
			<div class="row">
				<div class="col col--md-8 col--md-offset-2 center-xs">
					<h2 class="h3 mb-0">Acesso Fácil</h2>

					<p class="mb-4">Para mais orientações, acesse:</p>

					<div class="row center-xs">
						<div class="col col--xs-4">
							<a class="shortcut" href="<?php echo get_page_link( get_page_by_title( 'Processo' )->ID ); ?>">
								<div class="shortcut__media media media--md bg-green">
									<div class="media__icon"><i class="i i--planet-book"></i></div>
								</div>
								<div class="shortcut__title">Ciclo de Vida da OF</div>
							</a>
						</div>

						<?php
							if ( $last_guide->have_posts() ):

								while ( $last_guide->have_posts() ) : $last_guide->the_post();
								?>

									<div class="col col--xs-4">
										<a class="shortcut" href="<?php the_field( 'file' ); ?>" target="_blank">
											<div class="shortcut__media media media--md bg-green">
												<div class="media__icon"><i class="i i--file-check"></i></div>
											</div>

											<div class="shortcut__title"><i class="i i--download tx-muted mx-2"></i><span>Guia USTIBB <?php the_field( 'version' ); ?></span></div>
										</a>
									</div>

								<?php endwhile;

							endif;

							wp_reset_postdata();
						?>

						<div class="col col--xs-4">
							<a class="shortcut" href="<?= get_post_meta( '790', '_menu_item_url', true ); ?>" target="_blank">
								<div class="shortcut__media media media--md bg-green">
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
</main>

<?php get_footer(); ?>
