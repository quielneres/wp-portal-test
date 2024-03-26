<div class="tabs_process">

	<?php
	if (get_process('acionamento')):

		foreach (get_process('acionamento') as $post):

			setup_postdata($post)
			?>


			<div class="widget">

				<div id="content__process">
					<div class="content-circle">
						<div class="widget-circle-number">
							<span><?php the_field('order'); ?></span>
						</div>
					</div>
					<div class="widget__body">
						<h2 class="head head--lg">
							<span class="head__title"><?php the_title(); ?></span>
							<label class="fs-md">Executor: <span
									class="head__desc"><?php the_field('mediator'); ?></span></label>
						</h2>

						<?php the_content(); ?>
					</div>
				</div>
			</div>

		<?php endforeach;
	endif;

	wp_reset_postdata();
	?>
</div>
