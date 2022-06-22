<?php
/**
 * Template Name: Contracts Template
 * Template Post Type: post, page
 *
 * @package Greenplace
 */

get_header();

$systems = get_posts( array(
	'post_type'      => 'system',
	'posts_per_page' => -1,
	'orderby'        => 'title',
	'order'          => 'ASC'
) );

$contracts = get_posts( array(
	'post_type'      => 'contract',
	'posts_per_page' => -1,
	'orderby'        => 'title',
	'order'          => 'ASC'
) );

$companies = get_posts( array(
	'post_type'      => 'company',
	'posts_per_page' => -1,
	'orderby'        => 'title',
	'order'          => 'ASC'
) );


$tipo_contratos = get_posts( array(
	'post_type'      => 'categoria',
	'posts_per_page' => -1,
	'orderby'        => 'title',
	'order'          => 'ASC'
) );

$post__in   = array();
$meta_query = array();

$system    = false;
$system_id = null;

switch (get_query_var( 'type' )) {
	case 'system':

		$system = true;
		$system_id = get_query_var( 'system_id' );

		break;

	case 'contract':
		$post__in[] = get_query_var( 'contract_id' );
		break;

	case 'company':
		$meta_query[] = array(
			'key'     => 'company_id',
			'value'   => get_query_var( 'company_id' ),
			'compare' => '='
		);
		break;
}


if ($system) {

	$the_query = new WP_Query( array(
		'post_type'   => 'contract',
		'post__in'    => $post__in,
		'meta_key' => 'categoria',
		'meta_value' => $system_id,
		'numberposts' => -1,
		'meta_query'  => $meta_query,
        'posts_per_page' => -1
	) );


	$the_query30 = new WP_Query( array(
		'post_type'   => 'contract',
		'post__in'    => $post__in,
		'meta_key' => 'categoria',
		'meta_value' => $system_id,
		'numberposts' => 30,
		'meta_query'  => $meta_query,
		'limit' => 30,
		'nopaging' => false,
		'no_found_rows' => true
	) );

} else {
	$the_query = new WP_Query( array(
		'post_type'   => 'contract',
		'post__in'    => $post__in,
		'numberposts' => -1,
		'meta_query'  => $meta_query,
        'posts_per_page' => -1
	) );


	$the_query30 = new WP_Query( array(
		'post_type'   => 'contract',
		'post__in'    => $post__in,
		'numberposts' => 30,
		'meta_query'  => $meta_query,
		'limit' => 30,
		'nopaging' => false,
		'no_found_rows' => true
	) );
}


?>

<div class="normal" style="display: none;"><?php var_dump($the_query); ?></div>
<div class="normal30" style="display: none;"><?php var_dump($the_query30); ?></div>

<main class="layout__body">
	<?php get_template_part( 'template-parts/page-headline', get_post_type() ); ?>

	<div class="bg-white">
		<div class="container pt-4 pb-2 fx-grow">
			<form class="form contract" action="<?php echo get_page_link( get_page_by_title( 'Contratos' )->ID ); ?>">
				<div class="row">
					<div class="col col--md-7">
						<div class="form-field form-field--horizontal">
							<div class="form-label">Aplicar filtros:</div>

							<div class="form-options row">

								<label class="form-label col col--xl-4" for="system">
									<input class="form-radio" type="radio" id="system" value="system" name="type"<?php if ( get_query_var( 'type' ) == 'system' || get_query_var( 'type' ) == '' ): ?> checked="true"<?php endif; ?>>por Tipo de Contrato
								</label>



								<label class="form-label col col--xl-4" for="company">
									<input class="form-radio" type="radio" id="company" value="company" name="type"<?php if ( get_query_var( 'type' ) == 'company' ): ?> checked="true"<?php endif; ?>>por Empresa
								</label>
							</div>
						</div>
					</div>

					<div class="col col--md-4">
						<div id="select-system" class="form-field is-hidden">
							<div class="form-select">
								<select name="system_id">
									<option value="" hidden="true">Selecione uma opção</option>
									<option value="acionamento" >Acionamento</option>
									<option value="fsw">Fábrica de Software</option>
								</select>
							</div>
						</div>

						<div id="select-contract" class="form-field is-hidden">
							<div class="form-select">
								<select name="contract_id">
									<option value="" hidden="true">Selecione uma opção</option>

									<?php
									if ( $contracts ):

										foreach($contracts as $post):

											setup_postdata( $post )
											?>
											<option value="<?php the_id(); ?>"<?php if ( get_query_var( 'contract_id' ) == $post->ID ): ?> selected="true"<?php endif; ?>><?php the_title(); ?></option>
										<?php endforeach;

									endif;

									wp_reset_postdata();
									?>

								</select>
							</div>
						</div>

						<div id="select-company" class="form-field is-hidden">
							<div class="form-select">
								<select name="company_id">
									<option value="" hidden="true">Selecione uma opção</option>

									<?php
									if ( $companies ):

										foreach($companies as $post):

											setup_postdata( $post )
											?>
											<option value="<?php the_id(); ?>"<?php if ( get_query_var( 'company_id' ) == $post->ID ): ?> selected="true"<?php endif; ?>><?php the_title(); ?></option>
										<?php endforeach;

									endif;

									wp_reset_postdata();
									?>

								</select>
							</div>
						</div>
					</div>

					<div class="col col--md-1 fx fx--row">
						<!-- <button class="btn btn--success fx-grow">Buscar</button> -->
						<!-- <button class="btn btn--link btn--block" type="reset">Limpar</button> -->
						<a href="<?php echo get_page_link( get_page_by_title( 'Contratos' )->ID ); ?>" class="btn btn--link btn--block">Limpar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="container pt-4 pb-2 fx-grow">
		<div class="row row--padded">
			<?php
			if ( $the_query->have_posts() ):

				while ( $the_query->have_posts() ) : $the_query->the_post();
					?>

					<div class="col col--md-6 col--lg-4 content__contract">
						<a class="widget" href="<?php the_permalink(); ?>">
							<div class="widget__head aspect-ratio aspect-ratio--25x9 cover cover--top light-purple">
								<div class="cover__img"></div>
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
					</div>

				<?php endwhile;

			endif;

			wp_reset_postdata();
			?>
		</div>

		<h2 class="h4 mt-3">Empresas Parceiras</h2>

		<div class="row provider">
			<?php
			if ( $companies ):

				foreach($companies as $post):

					setup_postdata( $post )
					?>

					<div class="col col--md-3 provider__item">
						<?php
						$current_rel_uri = add_query_arg( array(
							'type' => 'company',
							'company_id' => get_the_ID()
						) );
						?>
						<a class="provider__link logo" href="<?php echo $current_rel_uri; ?>">
							<img class="logo__img" src="<?php the_field( 'logo' ); ?>" alt="<?php the_title(); ?>" style="max-width: 13rem">
						</a>
					</div>

				<?php endforeach;

			endif;

			wp_reset_postdata();
			?>
		</div>
	</div>
</main>
<?php get_footer(); ?>
