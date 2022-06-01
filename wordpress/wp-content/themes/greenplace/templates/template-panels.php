<?php
/**
 * Template Name: Panels Template
 * Template Post Type: post, page
 *
 * @package Greenplace
 */

get_header();

$posts = get_posts( array(
	'post_type'      => 'panel',
	'posts_per_page' => -1
) );
?>

<main class="layout__body">
	<?php get_template_part( 'template-parts/page-headline', get_post_type() ); ?>

	<div class="container pt-4 pb-2 fx-grow">
		<div class="row row--padded">
			<?php
				if ( $posts ):

					foreach($posts as $post):

						setup_postdata( $post )
						?>

                        <?php get_template_part( 'template-parts/content-panels-body', get_post_type() ); ?>

					<?php endforeach;

				endif;

				wp_reset_postdata();
			?>
		</div>
	</div>
</main>

<?php get_footer(); ?>
