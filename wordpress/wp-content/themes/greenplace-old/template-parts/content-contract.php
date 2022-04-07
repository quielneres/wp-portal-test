<?php
/**
 * Template part for displaying ...
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Greenplace
 */

$contracts = new WP_Query( array(
	'post_type'    => 'contract',
	'post__not_in' => array( get_the_ID() ),
	'numberposts'  => -1,
	'meta_query'   => array(
		array(
			'key'     => 'company_id',
			'value'   => get_post_field( 'ID', get_field_object( 'company_id' )[ 'value' ] ),
			'compare' => '='
		)
	)
) );

?>

<main class="layout__body">
	<header class="headline cover cover--top bg-leaf">
		<div class="cover__img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/table.jpg)"></div>
		<div class="container">
			<div class="headline__sup">
				<ul class="breadcrumb tx-muted mb-0">
					<li class="breadcrumb__item">
						<a class="breadcrumb__link" href="<?php echo esc_url( home_url( '/' ) ); ?>">Página Inicial</a>
					</li>

					<li class="breadcrumb__item">
						<a class="breadcrumb__link" href="<?php echo get_page_link( get_page_by_title( 'Contratos' )->ID ); ?>">Contratos</a>
					</li>

					<li class="breadcrumb__item">
						<span class="breadcrumb__text"><?php the_field( 'contract_num' ); ?></span>
					</li>
				</ul>
			</div>
		</div>
	</header>

	<div class="container pt-4 pb-2 fx-grow">
		<div class="row row--padded">
			<div class="col col--md-8">
				<h2 class="h3 titlePage"><?php the_title(); ?></h2>

				<div class="content">
					<div class="content__body">
						<div class="row">
							<div class="col col--lg-7">
							<p><span class="fw-450">Objeto do Contrato: </span><?php the_field( 'object_sum' ); ?></p>
							</div>

							<div class="col col--lg-5 end-xs">
								<div class="logo">
									<img class="logo__img" src="<?php echo get_field( 'logo', get_field_object( 'company_id' )[ 'value' ] ); ?>" alt="<?php echo get_post_field( 'post_title', get_field_object( 'company_id' )[ 'value' ] ); ?>" style="max-width: 13rem">
								</div>
							</div>
						</div>
					</div>

					<div class="content__body">
						<div class="row">
							<div class="col col--lg-6">
								<dl class="mb-0 mb-lg-3 dl1">
									<?php if (get_field('contract_num')): ?>
										<dt>Contrato</dt>
										<dd><?php the_field( 'contract_num' ); ?></dd>
									<?php endif; ?>

									<?php if (get_field('company_id')): ?>
										<dt>Empresa</dt>
										<dd><?php echo get_post_field( 'post_title', get_field_object( 'company_id' )[ 'value' ] ); ?></dd>
									<?php endif; ?>

									<?php if (get_field('started_at')): ?>
										<dt>Início da vigência</dt>
										<dd><?php the_field( 'started_at' ); ?></dd>
									<?php endif; ?>
									
									<?php if (get_field('qty_months')): ?>
										<dt>Prazo de vigência</dt>
										<dd><?php the_field( 'qty_months' ); ?> meses*</dd>
									<?php endif; ?>

									

									<!-- <?php //if (get_field('metrics_guide')): ?>
										<dt>Guia de Métricas</dt>
										<dd><a href="<?php //the_field( 'link_metrics_guide' ); ?>" target="_blank"><?php //the_field( 'metrics_guide' ); ?></a></dd>
									<?php //endif; ?>

									<?php //if (get_field('another_attachments')): ?>
										<dt>Outros Anexos</dt>
										<dd><a href="<?php //the_field( 'link_another_attachments' ); ?>" target="_blank"><?php //the_field( 'another_attachments' ); ?></a></dd>
									<?php //endif; ?>-->
									

									<!-- <?php //if (get_field('started_at') && get_field('qty_months')): ?>
										<dt>Previsão de término</dt>
										<dd>
											<?php
												//$started_at = strtotime( str_replace( '/', '-', get_field( 'started_at' ) ) );
												//$ended_at = strtotime('+' . get_field( 'qty_months' ) . ' months', $started_at);

												//echo date( 'd/m/Y', $ended_at );
											?>
										</dd>
									<?php //endif; ?> -->

								</dl>
							</div>

							<div class="col col--lg-6">
								<dl class="dl2">
									<?php if (get_field('qty_units')): ?>
										<dt>Qtde Contratada</dt>
										<dd><?php echo number_format( get_field( 'qty_units' ), 0, '', '.' ); ?></dd>
									<?php endif; ?>
<!-- 
									<?php //if (get_field('qty_months') && get_field('qty_units')): ?>
										<dt>Estimativa Mensal</dt> 
										<dd><?php //echo number_format( get_field( 'qty_units' ) / get_field( 'qty_months' ), 0, '', '.' ); ?></dd>
									<?php //endif; ?> -->

									<?php if (get_field('measure_unit')): ?>
										<dt>Unidade de Medida</dt>
										<dd><?php the_field( 'measure_unit' ); ?></dd>
									<?php endif; ?>

									<?php if (get_field('price')): ?>
										<dt>Valor Unidade</dt>
										<dd><?php echo number_format( get_field( 'price' ), 2,",","." ); ?></dd>
									<?php endif; ?>

									<?php if (get_field('qty_employees')): ?>
										<dt>Qtde Colaboradores</dt>
										<dd><?php the_field( 'qty_employees' ); ?></dd>
									<?php endif; ?>


									<!--<?php //if (get_field('metrics_guide')): ?>
										<dt>Guia de Métricas</dt>
										<dd><a href="<?php //the_field( 'link_metrics_guide' ); ?>" target="_blank"><?php //the_field( 'metrics_guide' ); ?></a></dd>
									<?php //endif; ?>

									<?php //if (get_field('another_attachments')): ?>
										<dt>Outros Anexos</dt>
										<dd><a href="<?php //the_field( 'link_another_attachments' ); ?>" target="_blank"><?php //the_field( 'another_attachments' ); ?></a></dd>
									<?php //endif; ?> -->

								</dl>
							</div>
						</div>

						<div class="row obsRemove">
							<div class="col">
								<div class="mb-0 mb-lg-3">
									<p class="mx-0 fs-xs">* Pode ser finalizado antes do prazo máximo da vigência, se houver esgotamento do saldo contratado.</p>
								</div>
							</div>
						</div>

					</div>
				</div>

				<?php
					$fiscal = get_field_object( 'fiscal_user_id' )[ 'value' ];
					$factory = get_field_object( 'factory_user_id' )[ 'value' ];

					if ( $fiscal || $factory ): ?>

					<h3 class="h4">Contatos</h3>

					<div class="widget">
						<div class="widget__body">
							<div class="row">
								<?php if ($fiscal): ?>
									<div class="col col--lg-4">
										<h4 class="h6 mb-2">Fiscal de Serviço</h4>
										<div>
											<div class="tip tip--xs">
												<div class="tip__media media media--xs">
													<img class="media__img" src="https://humanograma.intranet.bb.com.br/avatar/<?php echo get_post_field( 'key', $fiscal ); ?>" alt="<?php echo get_post_field( 'name', $fiscal ); ?>">
												</div>
												<div class="tip__body head head--xs">
													<a class="head__title" href="https://humanograma.intranet.bb.com.br/<?php echo get_post_field( 'key', $fiscal ); ?>" target="_blank"><?php echo get_post_field( 'name', $fiscal ); ?></a>
													<span class="head__desc">
														<i class="i i--phone tx-muted"></i>
														<strong><?php echo get_post_field( 'phone', $fiscal ); ?></strong>
													</span>
												</div>
											</div>
										</div>
									</div>
								<?php endif; ?>

								<?php if ($factory): ?>
									<div class="col col--lg-4">
										<h4 class="h6 mb-2">Contato Empresa</h4>
										<div>
											<div class="tip tip--xs">
												<div class="tip__media media media--xs">
													<img class="media__img" src="https://humanograma.intranet.bb.com.br/avatar/<?php echo get_post_field( 'key', $factory ); ?>" alt="<?php echo get_post_field( 'name', $factory ); ?>">
												</div>
												<div class="tip__body head head--xs">
													<a class="head__title" href="https://humanograma.intranet.bb.com.br/<?php echo get_post_field( 'key', $factory ); ?>" target="_blank"><?php echo get_post_field( 'name', $factory ); ?></a>
													<span class="head__desc">
														<i class="i i--phone tx-muted"></i>
														<strong><?php echo get_post_field( 'phone', $factory ); ?></strong>
													</span>
												</div>
											</div>
										</div>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>

			<div class="col col--md-4">
				<h2 class="h4">Contratos com a mesma empresa</h2>
				
				<?php
					if ( $contracts->have_posts() ):

						while ( $contracts->have_posts() ) : $contracts->the_post(); ?>

						<a class="widget" href="<?php the_permalink(); ?>">
							<div class="widget__head aspect-ratio aspect-ratio--21x9 cover cover--top bg-blue">
								<div class="cover__img" style="background-image: url(<?php the_field( 'background' ); ?>)"></div>
								<div class="aspect-ratio__content pos pos--bottom">
									<h1 class="head head--sm"><span class="head__title"><?php the_title(); ?></span></h1>
								</div>
							</div>

							<div class="widget__body">
								<div class="info">
									<span class="info__title"><?php echo get_post_field( 'post_title', get_field_object( 'company_id' )[ 'value' ] ); ?></span>
									<span class="info__desc"><?php the_field( 'contract_num' ); ?></span>
								</div>
							</div>
						</a>

						<?php endwhile;

					else: ?>

						<div class="widget widget--lined">
							<div class="widget__body">
								<p><i class="i i--info tx-align"></i> Essa empresa não possui outros contratos.</p>
							</div>
						</div>

					<?php endif;

					wp_reset_postdata();
				?>
			</div>
		</div>
	</div>

	<?php get_template_part( 'template-parts/content-call-contact', get_post_type() ); ?>
</main>

<script>
		
	var getTitlePost = document.getElementsByClassName("titlePage")[0].innerHTML;

	var newHtmlElementFiles = ``;

	<?php if (get_field('metrics_guide')): ?>
	
		newHtmlElementFiles += `<dt>Guia de Métricas</dt>
		<dd><a href="<?php the_field( 'link_metrics_guide' ); ?>" target="_blank"><?php the_field( 'metrics_guide' ); ?></a></dd>`;

	<?php endif; ?>

	<?php if (get_field('another_attachments')): ?>

		newHtmlElementFiles += `<dt>Outros Anexos</dt>
		<dd><a href="<?php the_field( 'link_another_attachments' ); ?>" target="_blank"><?php the_field( 'another_attachments' ); ?></a></dd>`;
	
	<?php endif; ?>

	if(getTitlePost.match(/Acionamento/)){

		document.getElementsByClassName("obsRemove")[0].style.display = "none";
		document.getElementsByClassName("dl2")[0].innerHTML += newHtmlElementFiles;

	}else{

		document.getElementsByClassName("obsRemove")[0].style.display = "block";
		document.getElementsByClassName("dl1")[0].innerHTML += newHtmlElementFiles;

	}

</script>