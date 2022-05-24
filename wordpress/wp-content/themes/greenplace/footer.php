<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Greenplace
 */
?>
			<footer class="layout__foot">
				<div class="bg-dark py-5">
					<div class="container">
						<div class="row middle-md">
							<div class="col col--md-3">
								<h2 class="spec mb-0">
									<div class="spec__sup">Nossos</div>
									<div class="spec__big">Números</div>
								</h2>
							</div>

							<div class="col col--md-9">
								<div class="row">
									<div class="col col--sm-6 col--xl-4">
										<div class="tip tip--sm mb-0">
											<div class="tip__media media media--sm bg-trans" style="margin-right: 0.2rem">
												<div class="media__text tx-warning fs-lg"><?php echo wp_count_posts( 'contract' )->publish; ?></div>
											</div>

											<div class="tip__body">
												<div class="tip__title">Contratos Ativos</div>
											</div>
										</div>
									</div>

									<div class="col col--sm-6 col--xl-4">
										<div class="tip tip--sm mb-0">
											<div class="tip__media media media--sm bg-trans" style="margin-right: -0.5rem;">
												<div class="media__text tx-warning fs-lg"><?php echo wp_count_posts( 'company' )->publish; ?></div>
											</div>

											<div class="tip__body">
												<div class="tip__title">Empresas Parceiras</div>
											</div>
										</div>
									</div>

									<div class="col col--sm-6 col--xl-4">
										<div class="tip tip--sm mb-0">
											<div class="tip__media media media--sm bg-trans" style="margin-right: 3.5rem;">
												<div class="media__text tx-warning fs-lg">

												<?php
													$contracts = new WP_Query( array(
														'post_type'   => 'contract',
														'numberposts' => -1,
													) );

													if ( $contracts->have_posts() ) {
														$employees = 0;

														while ( $contracts->have_posts() ) {
																$contracts->the_post();

																$employees = $employees + get_post_meta( get_the_id(), 'qty_employees', true );
														}

														echo $employees;

														wp_reset_postdata();
													}
												?>

												</div>
											</div>

											<div class="tip__body">
												<div class="tip__title">Colaboradores</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>

		<div class="bg-darker">
			<div class="container">
				<div class="row middle-xl">
					<div class="col col--xl-2">
						<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<figure class="brand__logo">
								<img class="brand__img--footer" src="<?php echo get_template_directory_uri(); ?>/img/logo-bb.svg" alt="Banco do Brasil" style="max-height: 1.25rem">
							</figure>
						</a>
					</div>

					<div class="col col--xl end-xl">
						<p class="mt-3 fs-xs">As informações disponíveis neste portal são de uso exclusivamente interno, salvo disposição expressa em contrário em conteúdos específicos, conforme IN 421-1-6-1.</p>
					</div>

					<a class="gotop" href="#top"><i class="i i--double-arrow"></i></a>
				</div>
			</div>
		</div>

		<?php wp_footer(); ?>
	</body>
</html>
