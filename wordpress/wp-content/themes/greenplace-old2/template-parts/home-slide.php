<?php
/**
 * Template part for displaying ...
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Greenplace
 */

$bulletins = new WP_Query( array(
	'post_type'      => 'bulletin',
	'posts_per_page' => 5
) );
?>

<div class="widget fx-grow fx" style="overflow: hidden">
	<div class="glide" id="intro">
		<div class="glide__track" data-glide-el="track">
			<ul class="glide__slides">
				<?php
				if ( $bulletins->have_posts() ):

					while ( $bulletins->have_posts() ) : $bulletins->the_post();
						?>
						<li class="glide__slide" data-link="<?php the_permalink(); ?>" style="cursor: pointer">
							<div class="glide__img" style="background-image: url('<?php echo the_field( 'background' ); ?>')"></div>
							<div class="row middle-xs fx-grow">
								<div class="col col--md-12">
									<h1 class="head head--xl">
										<span class="head__title" style="text-transform: none"><?php the_title(); ?></span>
									</h1>

									<?php the_excerpt(); ?>

								</div>
							</div>
						</li>
					<?php endwhile;

				endif;

				wp_reset_postdata();
				?>
			</ul>
		</div>

		<div class="glide__arrows hidden-xs" data-glide-el="controls">
			<button class="glide__arrow glide__arrow--left" data-glide-dir="&lt;"><i class="i i--arrow-left"></i></button>
			<button class="glide__arrow glide__arrow--right" data-glide-dir="&gt;"><i class="i i--arrow-right"></i></button>
		</div>

		<div class="glide__bullets" data-glide-el="controls[nav]">
			<?php for ($bullet = 0; $bullet < $bulletins->found_posts; $bullet++) : ?>
				<?php if($bullet < 5) :	?>
					<button class="glide__bullet" data-glide-dir="=<?php echo $bullet; ?>"></button>
				<?php endif?>
			<?php endfor; ?>
		</div>
	</div>
</div>

<script type="text/javascript">
	jQuery( function($) {
		$('.glide__track > ul > li').click(function () {
			$(location).attr('href', $(this).data('link'));
		})
	} );
</script>
