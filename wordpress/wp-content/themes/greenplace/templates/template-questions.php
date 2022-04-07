<?php
/**
 * Template Name: Questions Template
 * Template Post Type: post, page
 *
 * @package Greenplace
 */

get_header();

$posts = get_posts( array(
	'post_type'      => 'question',
	'posts_per_page' => -1,
	'meta_key'       => 'id',
	'meta_type'      => 'NUMERIC',
	'orderby'        => 'meta_value',
	'order'          => 'ASC'
) );
?>

<main class="layout__body">
	<?php get_template_part( 'template-parts/page-headline', get_post_type() ); ?>

	<div class="container pt-4 pb-2 fx-grow">
		<div class="content">
			<?php
				if ( $posts ):

					foreach($posts as $post):

						setup_postdata( $post )
						?>

						<div class="content__body question">
							<div class="question__id"><?php the_field( 'id' ); ?></div>

							<h2 class="question__title">
								<a class="question__link" href="#"><?php the_title(); ?></a>
							</h2>

							<div class="question__answer">
								<?php the_content(); ?>

								<!-- <a class="btn btn--primary" href="<?php the_permalink(); ?>">Link da Faq</a> -->
							</div>
						</div>

					<?php endforeach;

				endif;

				wp_reset_postdata();
			?>
		</div>
	</div>

	<?php get_template_part( 'template-parts/content-call-contact', get_post_type() ); ?>
</main>

<?php get_footer(); ?>
