<?php
/**
 * Template Name: Tutorials Template
 * Template Post Type: post, page
 *
 * @package Greenplace
 */

get_header();

$posts = get_posts( array(
	'post_type'      => 'tutorial',
	'posts_per_page' => -1
) );
?>

<main class="layout__body">
	<header class="cover cover--top bg-leaf">
		<div class="cover__img" style="background-image: url(<?php the_field( 'background' ); ?>)"></div>
		<div class="container">
			<h1 class="head head--xl"><span class="head__desc">Dicas e</span><span class="head__title" style="text-transform: none">Instruções</span></h1>
			<p>Assista aos os vídeos explicativos e recomendações de melhores práticas relacionados à contratação de serviços de fábrica de software.</p>
		</div>
	</header>

	<div class="container pt-4 pb-2 fx-grow">
		<?php
			if ( $posts ):

				foreach($posts as $post):

					setup_postdata( $post )
					?>
					<div class="row widget" style="overflow: hidden">
						<a class="col col--md-3 widget__head bg-blue cover cover--top aspect-ratio aspect-ratio--16x9" href="/">
							<div class="cover__img" style="background-image: url(&quot;/videos/abertura-de-of-visao-geral.jpg&quot;)"></div>
							<div class="aspect-ratio__content">
								<div class="pos pos--center pos--middle"><i class="i i--play fs-big"></i></div>
							</div>
						</a>

						<div class="col col--md-9 widget__body">
							<h3 class="h4"><a href="/"><?php the_title(); ?></a></h3>
							<div class="tx-sm">
								<p class="lc-5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum, quaerat aut perferendis eum excepturi ullam officiis facilis provident, repellendus reiciendis porro aliquam voluptatem perspiciatis earum! Facere harum maiores laudantium eveniet illo dicta illum labore maxime aliquid, quia dolores hic at?</p>
							</div>
						</div>
					</div>
				<?php endforeach;

			endif;

			wp_reset_postdata();
		?>
	</div>

<!--	--><?php //get_template_part( 'template-parts/content-call-contact', get_post_type() ); ?>
</main>

<?php get_footer(); ?>
