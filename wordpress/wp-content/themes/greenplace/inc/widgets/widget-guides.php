<?php
/**
 * Greenplace_Widget_Process class
 *
 * @package Greenplace
 */

/**
 * Core class used to implement a Text widget.
 *
 * @see WP_Widget
 */
class Greenplace_Widget_Guides extends WP_Widget {

	/**
	 * Sets up a new Guides widget instance.
	 */
	public function __construct() {

		$widget_ops  = array(
			'classname'   => 'widget_guides',
			'description' => __( 'Arbitrary text.' ),
		);

		$control_ops = array(
			'width'  => 400,
			'height' => 350,
		);

		parent::__construct( 'guides', __( 'Guides' ), $widget_ops, $control_ops );
	}

	/**
	 * Outputs the content for the current Guides widget instance.
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Guides widget instance.
	 *@global WP_Post $post Global post object.
	 *
	 */
	public function widget( $args, $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';

		echo $args['before_widget']; ?>

		<div class="row widget" style="overflow: hidden">
			<div class="tabs__guide">

				<ul>
					<li>
						<h2 class="widget__title">
							<a href="#"><?= $title; ?></a>
						</h2>
					</li>
				</ul>

				<div>
					<div>
						<div class="row">
							<?php
							$get_guides = get_guides('guide-acionamento');

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

				</div>
			</div>
		</div>


		<?php echo $args['after_widget'];
	}

	/**
	 * Outputs the Guides widget settings form.
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$instance = wp_parse_args(
			(array) $instance,
			array('title' => '')
		);
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>"/>
		</p>
		<?php
	}
}

add_action( 'widgets_init', function() {
	register_widget( 'Greenplace_Widget_Guides' );
});
