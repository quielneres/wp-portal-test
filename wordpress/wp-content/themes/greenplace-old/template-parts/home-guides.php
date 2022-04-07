<?php
/**
 * Template part for displaying ...
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Greenplace
 */

/**
 *
 */
// function filter_case($orderby = '') {
// 	$orderby .= " CASE WHEN wp_postmeta.meta_value RLIKE '^[0-9]' THEN '' ELSE wp_postmeta.meta_value END ASC, wp_postmeta.meta_value+0 ASC";

// 	return $orderby;
// }

// add_filter( 'posts_orderby', 'filter_case' );

$last_guide = new WP_Query( array(
	'post_type'      => 'guide',
	'posts_per_page' => 1,
	'meta_key'       => 'version',
	'orderby'        => 'meta_value_num',
	'order'          => 'DESC'
) );

// echo $last_guide->request;

// remove_filter( 'posts_orderby', 'filter_case' );

$two_next_guides = new WP_Query( array(
	'post_type'      => 'guide',
	'posts_per_page' => 2,
	'meta_key'       => 'version',
	'orderby'        => 'meta_value_num',
	'order'          => 'DESC',
	'offset'         => 1
) );

?>

<div class="row widget" style="overflow: hidden">
	<div class="col col--lg-7 col--xl-12 widget__head bg-leaf">
		<?php
			if ( $last_guide->have_posts() ):

				while ( $last_guide->have_posts() ) : $last_guide->the_post();
				?>

					<div class="row">
						<div class="col col--md-6 col--xl-12">
							<a class="tip tip--lg tx-white" href="<?php the_field( 'file' ); ?>" target="_blank">
								<div class="tip__media media media--sm bg-trans">
									<div class="media__icon">
										<i class="i i--file-check" style="color: #72fff0"></i>
									</div>
								</div>

								<div class="tip__body head head--lg">
									<span class="head__title" style="text-transform: none">Guia USTIBB</span>
									<span class="head__desc">Acesse já!</span>
								</div>
							</a>
						</div>

						<div class="col col--md-6 col--xl-12">
							<h3 class="h5 tx-muted mb-0">Versão Atual</h3>

							<div class="mb-3">
								<a class="fw-450 fs-lg tx-white" href="<?php the_field( 'file' ); ?>" target="_blank">
									<i class="i i--download tx-muted"></i>
									<span>Guia USTIBB <?php the_field( 'version' ); ?></span>
								</a>
							</div>
						</div>
					</div>

				<?php endwhile;

			endif;

			wp_reset_postdata();
		?>
	</div>

	<div class="col col--lg col--xl-12 widget__body">
		<h4 class="h5 tx-muted mb-0">Versões Anteriores</h4>

		<div class="row">
			<?php
				if ( $two_next_guides->have_posts() ):

					while ( $two_next_guides->have_posts() ) : $two_next_guides->the_post();
					?>

					<div class="col col--sm">
						<div class="mb-3">
							<a class="fw-450" href="<?php the_field( 'file' ); ?>" target="_blank">
								<i class="i i--download tx-muted"></i>
								<span>Guia USTIBB <?php the_field( 'version' ); ?></span>
							</a>
						</div>
					</div>

					<?php endwhile;

				endif;

				wp_reset_postdata();
			?>
		</div>
	</div>
</div>
