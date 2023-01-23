<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Greenplace
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div class="bg-gray fs-xs" id="top">
			<div class="container">
				<div class="row middle-lg">
					<div class="col col--xl hidden-xs hidden-sm hidden-md hidden-lg">
						<?php bem_menu('top', 'list', 'list--inline mb-0'); ?>
					</div>
                    <div class="col col--xl-3 end-xl">
                     <?php get_template_part( 'template-parts/content-usuario-intranet', 'none' ); ?>
					</div>
				</div>
			</div>
		</div>

		<div class="layout">
			<header class="layout__head">
				<div class="header has-pill">
					<div class="header__float bg-leaf">
						<div class="container">
							<div class="header__bar">
								<div class="header__brand">
									<a class="brand has-pill" href="<?php echo esc_url( home_url( '/' ) ); ?>">
										<figure class="brand__logo">

											<!-- <img class="brand__img" src="<?php echo get_template_directory_uri(); ?>/img/icon-bb.svg" alt="Banco do Brasil">-->

											<?php
												$custom_logo_id = get_theme_mod( 'custom_logo' );
												$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
												$url_logo = $logo[0];

												if ( has_custom_logo() ) {
													echo '<img class="brand__img" src="' . esc_url( $url_logo ) . '" alt="Banco do Brasil">';

												} else {
													?>
											        <img class="brand__img" src="<?php echo get_template_directory_uri(); ?>/img/icon-bb.svg" alt="Banco do Brasil">
													<?php
												}
											?>
										</figure>

										<h1 class="brand__text">
											<span class="brand__name hidden-xs"><?php bloginfo( 'name' ); ?></span>
											<span class="brand__abbr hidden-xs"><?php bloginfo( 'description' ); ?></span>
										</h1>
									</a>
								</div>

								<div class="header__pre hidden-lg hidden-xl"></div >

								<div class="header__nav">
									<input type="checkbox" id="header__menu--bt" class="header__menu--bt">
									<?php bem_menu('menu-1', 'nav', 'hidden__menu--xs hidden__menu--sm hidden__menu--md'); ?>
									<label for="header__menu--bt" class="header__menu--icone hidden-lg hidden-xl">&#9776;</label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
