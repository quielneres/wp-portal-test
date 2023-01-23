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
	<header class="headline cover cover--top bg-leaf">
		<div class="cover__img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/table.jpg)"></div>
		<div class="container">
			<div class="headline__sup">
				<ul class="breadcrumb tx-muted mb-0">
					<li class="breadcrumb__item">
						<a class="breadcrumb__link" href="<?php echo esc_url( home_url( '/' ) ); ?>">Página Inicial</a>
					</li>

					<li class="breadcrumb__item">
						<a class="breadcrumb__link" href="<?php echo get_page_link( get_page_by_title( 'Painéis' )->ID ); ?>">Painéis</a>
					</li>

					<li class="breadcrumb__item">
						<span class="breadcrumb__text"><?php the_title(); ?></span>
					</li>
				</ul>
			</div>
		</div>
	</header>

	<iframe class="iframe iframe--full" src="<?php the_field( 'url' ); ?>" frameborder="0"></iframe>
</main>
