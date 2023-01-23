<header class="headline cover cover--top bg-leaf">
	<div class="cover__img" style="background-image: url(<?php the_field( 'background' ); ?>)"></div>

	<div class="container">
		<?php if ( ! is_home() ) : ?>
			<?php if ( function_exists('get_breadcrumb') ) : ?>
				<div class="headline__sup">
					<?php get_breadcrumb(); ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>

		<div class="headline__title">
			<?php if ( get_field( 'summary' ) ) : ?>
				<div class="row">
					<div class="col col--md-6 col--xl-4">
			<?php endif; ?>

						<h1 class="head head--xl">
							<span class="head__desc"><?php the_field( 'head_title' ); ?></span>
							<span class="head__title" style="text-transform: none"><?php the_field( 'head_desc' ); ?></span>
						</h1>

						<p><?php the_field( 'description' ); ?></p>

			<?php if ( get_field( 'summary' ) ) : ?>
					</div>

					<div class="col col--md-6 col--xl-5 col--xl-offset-3">
						<?php the_field( 'summary' ); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</header>
