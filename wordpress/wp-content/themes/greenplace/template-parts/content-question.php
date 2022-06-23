<?php
/**
 * Template part for displaying ...
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Greenplace
 */

?>

<main class="layout__body">
	<header class="headline cover cover--center cover--head bg-leaf">
		<div class="cover__img" style="background-image: url(<?php the_field( 'background' ); ?>)"></div>
		<div class="container mb-5">
			<div class="headline__sup">
				<div class="row middle-sm">
					<div class="col col--sm-6">
						<ul class="breadcrumb tx-muted mb-0">
							<li class="breadcrumb__item">
								<a class="breadcrumb__link" href="<?php echo esc_url( home_url( '/' ) ); ?>">Página Inicial</a>
							</li>

							<li class="breadcrumb__item">
								<a class="breadcrumb__link" href="<?php echo get_page_link( get_page_by_title( 'FAQ' )->ID ); ?>">FAQ</a>
							</li>

							<li class="breadcrumb__item">
								<span class="breadcrumb__text">
									<?php
										if ( get_field( 'breadcrumb' ) ):
											the_field( 'breadcrumb' );
										else :
											the_title();
										endif;
									?>
								</span>
							</li>
						</ul>
					</div>

					<!-- <div class="col col--sm-6 end-sm hidden-xs">
						<ul class="list list--inline tx-muted mb-0">
							<li class="list__item">
								<a class="list__link" href="/">
									<i class="i i--printer"></i>
								</a>
							</li>
							<li class="list__item">
								<a class="list__link" href="/">
									<i class="i i--share"></i>
								</a>
							</li>
						</ul>
					</div> -->
				</div>
			</div>

			<div class="headline__title">
				<h1 class="head head--xl mb-2">
					<span class="head__title" style="text-transform: none"><?php the_title(); ?></span>
				</h1>

				<p><?php the_field( 'summary' ); ?></p>
			</div>
		</div>
	</header>

	<div class="container pt-4 pb-2 fx-grow push-up">
		<div class="content">
			<div class="content__body">
				<div class="html">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>

<!--	--><?php //get_template_part( 'template-parts/content-call-contact', get_post_type() ); ?>
</main>
