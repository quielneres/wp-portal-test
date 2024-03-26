<style>
	.manager-team .bg-blue {
		color: #052B4C;
		background: linear-gradient(#EEEEEE 40%, #ACA8F5 40%, #ACA8F5 60%);
	}

	.manager-team .bd {
		border: 0;
	}

	.manager-team .ta-center {
		font-weight: 300;
		margin-bottom: 0;
	}

	.manager-team .media--sm {
		font-size: .87rem;
		height: 6rem;
		width: 6rem;
	}

	.manager-team .widget:not(.widget--lined) {
		/*box-shadow: unset;*/
		-webkit-box-shadow: 0 4px 4px 0 rgb(0 0 0 / 16%);
		box-shadow: 0 4px 4px 0 rgb(0 0 0 / 16%);
	}

	.manager-team .widget__head .tip__body {
		margin-top: 2.5rem;
	}

	.manager-team .tip {
		margin-bottom: .2rem;
	}

	.manager-team .head__desc {
		/*font-size: 0.8rem;*/
		font-weight: normal;
		opacity: unset;
	}

	.manager-team .tip__body .list__item strong {
		font-weight: normal;
	}

	.manager-team .tip__body .list__item a, button {
		font-weight: normal;
	}

	.manager-team .widget__body p, strong {
		font-weight: normal;
	}

	.manager-team .widget__foot h3 {
		font-weight: normal;
	}

	.manager-team .widget__foot .row div {
		margin-bottom: 0.5rem;
	}
</style>

<div class="row row--padded manager-team">

	<?php
	$teams = get_posts(array(
		'post_type' => 'team',
		'posts_per_page' => -1,
		'orderby' => 'name',
		'order' => 'ASC'
	));
	if ($teams):

		foreach ($teams as $key => $post):

			setup_postdata($post)
			?>

			<?php
			$manager = get_field_object('manager_user_id')['value'];
			$analysts = get_field_object('analysts')['value'];


			$avatar_user_url = "https://humanograma.intranet.bb.com.br/avatar/" . get_post_field('key', $manager);

//            if ($_SERVER['SERVER_NAME'] == 'localhost') {
//                $avatar_user_url = get_template_directory_uri() . "/img/avatar-user.png";
//            }
			?>

			<div class="col col--xl-4 fx">
				<h2 class="h3 ta-center"><?php the_field('name'); ?></h2>
				<div class="widget__head bg-blue">
					<div class="tip tip--sm">
						<a class="tip__media media media--sm mr-3 bd"
						   href="https://humanograma.intranet.bb.com.br/<?php echo get_post_field('key', $manager); ?>"
						   target="_blank">
							<img class="media__img" src="<?= $avatar_user_url; ?>" alt="Wladys Terraciano">
						</a>

						<div class="tip__body">
							<a class="head head--sm mb-0"
							   href="https://humanograma.intranet.bb.com.br/<?php echo get_post_field('key', $manager); ?>"
							   target="_blank"><span
									class="head__title"><?php echo get_post_field('name', $manager); ?></span><span
									class="head__desc"><?php echo get_post_field('role_name', $manager); ?></span></a>

							<ul class="list list--inline tx-xs mb-0">
								<li class="list__item"><a class="list__link"
														  href="tel:<?php echo get_post_field('phone', $manager); ?>"><i
											class="i i--phone tx-muted"></i><strong><?php echo get_post_field('phone', $manager); ?></strong></a>
								</li>
								<li class="list__item">
									<a class="list__link"
									   href="https://humanograma.intranet.bb.com.br/<?php echo get_post_field('key', $manager); ?>"
									   target="_blank">
										<small class="i i--external tx-muted"></small><span><?php echo get_post_field('key', $manager); ?></span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="widget fx fx-grow" style="overflow: hidden">


					<div class="widget__body fx-grow">
						<div class="tx-sm"><?php the_field('description'); ?></div>
					</div>

					<div class="widget__foot" style="min-height: 19rem; margin-top: 1rem">
						<h3 class="h5 tx-muted">Analistas</h3>

						<div class="row">

							<?php
							if ($analysts):

								foreach ($analysts as $post):

									setup_postdata($post);
									get_template_part('template-parts/content-about-us-teams', get_post_type());
								endforeach;

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
