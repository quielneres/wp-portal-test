<div class="col col--lg-6 content__panels">
	<div class="row widget" style="overflow: hidden">

		<div class="col col--md-6 widget__body">
			<h3 class="h4">
				<a href="<?php the_field( 'url' ); ?>" class="link--panels" target="_blank"><?php the_title(); ?></a>
			</h3>

			<div class="tx-sm"><?php the_content(); ?></div>
		</div>


		<a class="col col--md-6 widget__head dark-purple cover cover--top aspect-ratio aspect-ratio--1x1" href="<?php the_field( 'url' ); ?>" target="_blank">
			<div class="cover__img" style="background-image: url(<?php the_field( 'background' ); ?>)"></div>

			<div class="aspect-ratio__content">
				<div class="pos pos--center pos--middle"><i class="i i--report fs-big"></i></div>
			</div>
		</a>

	</div>
</div>
