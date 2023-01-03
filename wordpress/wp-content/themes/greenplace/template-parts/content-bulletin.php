<?php
/**
 * Template part for displaying ...
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Greenplace
 */

$posts = get_posts( array(
	'post_type'      => 'bulletin',
	'post__not_in'   => array( get_the_ID() ),
	'posts_per_page' => 2
) );
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
								<a class="breadcrumb__link" href="<?php echo get_page_link( get_page_by_title( 'Comunicados' )->ID ); ?>">Comunicados</a>
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

			<div class="headline__title headline__mt">
				<h1 class="head head--xl mb-2">
					<span class="head__title" style="text-transform: none"><?php the_title(); ?></span>
				</h1>

				<p><?php the_field( 'summary' ); ?></p>
			</div>
		</div>
	</header>

	<div class="container pt-4 pb-2 fx-grow push-up">
		<div class="row row--padded">
			<div class="col col--md-8">
				<div class="content">
					<div class="content__body content__body--comun">
						<ul class="meta row">
							<li class="meta__item col col--md-6">Por <?php echo get_the_author_meta( 'display_name' ); ?></li>
							<li class="meta__item col col--md-6 end-sm"><?php the_date(); ?></li>
						</ul>

						<div class="html">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			</div>

			<div class="col col--md-4 push-down">
				<h2 class="h4">Veja Também</h2>

				<?php
					if ( $posts ):

						foreach($posts as $post):

							setup_postdata( $post )
							?>

								<div class="widget">
									<a class="widget__head cover cover--center bg-blue" href="<?php the_permalink(); ?>">
										<div class="cover__img" style="background-image: url(<?php the_field( 'background' ); ?>)"></div>
										<h1 class="head head--sm mt-5">
											<span class="head__title"><?php the_title(); ?></span>
										</h1>
									</a>
									<div class="widget__body">
										<?php the_excerpt(); ?>
									</div>
								</div>

						<?php endforeach;

					endif;

					wp_reset_postdata();
				?>
			</div>
		</div>
	</div>
</main>
