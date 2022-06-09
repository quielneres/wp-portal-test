<?php
$guides = $args;

foreach ($guides as $guide): ?>
	<div>
		<div class="row">
			<?php
			$get_guides = get_guides($guide);

			if ($get_guides['last_guide']->have_posts()):

				while ($get_guides['last_guide']->have_posts()) : $get_guides['last_guide']->the_post();
					?>

					<div class="col col--sm">
						<div class="mb-3">
							<h5>Versão atual:</h5>
							<a class="fw-450" href="<?php the_field('file'); ?>" target="_blank">
								<i class="i i--download tx-muted"></i>
								<span>Guia USTIBB versão <?php the_field('version'); ?></span>
							</a>
						</div>
					</div>
				<?php endwhile;

			endif;

			wp_reset_postdata();
			?>
		</div>

		<div class="row">
			<div class="col col--sm">

				<?php if ($get_guides['two_next_guides']->have_posts()): ?>
					<h5>Versões anteriores:</h5>
					<div class="mb-3 previous-versions">
						<?php
						while ($get_guides['two_next_guides']->have_posts()) : $get_guides['two_next_guides']->the_post();
							?>

							<a class="fw-450" href="<?php the_field('file'); ?>" target="_blank">
								<i class="i i--download tx-muted"></i>
								<span>Guia USTIBB <?php the_field('version'); ?></span>
							</a>
						<?php endwhile;

						wp_reset_postdata();
						?>
					</div>
				<?php  else: ?>
					<div style="padding: 2.65rem"></div>
				<?php endif;?>
			</div>
		</div>
	</div>
<?php endforeach; ?>



