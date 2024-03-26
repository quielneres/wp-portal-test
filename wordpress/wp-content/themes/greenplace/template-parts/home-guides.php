<?php $args = ['guide-acionamento', 'guide']; ?>

<div class="row widget" style="overflow: hidden">
	<div class="tabs__guide">

		<ul>
			<li>
				<h2 class="widget__title">
					<a href="#">Guia USTIBB</a>
				</h2>
			</li>

			<!--			<li><a href="#">Guia USTIBB <br> Fábrica</a></li>-->
		</ul>

		<div>
			<?php get_template_part('template-parts/content-guides', null, $args); ?>
		</div>
	</div>
</div>
