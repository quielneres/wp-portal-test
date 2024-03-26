<?php
$maps = get_content_portal_maps_footer(); ?>

<div class="footer-nav-acessibility">
	<div class="col col--xl-2 footer-nav-link-col">
		<div class="footer-card-image-primary">
			<a class="brand footer-card-logo" href="<?php echo esc_url(home_url('/')); ?>">
				<figure class="footer-card-image-logo">
					<img class="footer-card-image"
						 src="<?php echo get_template_directory_uri(); ?>/img/cropped-LOGO-PORTAL1.png"
						 alt="Banco do Brasil">
				</figure>
			</a>
		</div>
		<p class="footer-card-text">
		<h1 class="brand__text footer-card-image-text">
			<span class="brand__name hidden-xs footer-card-text-figure">Gestão de</span>
			<span class="footer-card-primary-text hidden-xs">Fábricas de Software</span>
		</h1>
		</p>
	</div>

	<?php foreach ($maps as $title => $contents): ?>
		<div class="col col--xl-2 footer-nav-link-col">
			<h1 class="brand__text">
				<span class="footer-card-title"><?= $title ?></span>
			</h1>
			<ul class="list list--dot row mb-0 mb-sm-3 list__process">
				<?php foreach ($contents as $index => $content):
					if (empty($content['url'])) { ?>
						<li class="col col--sm-12">
							<span class="footer-card-text"><?= $content['post_type'] ?></span>
						</li>
					<?php } else { ?>
						<li class="col col--sm-12">
							<a href="<?= $content['url'] ?>"
							   title="<?= $content['description'] ?>"
							   target="<?= $content['target'] ?>" class="footer-card-text">
								<?= $content['post_type'] ?>
							</a>
						</li>
					<?php } endforeach; ?>
			</ul>
		</div>
	<?php endforeach; ?>

</div>
