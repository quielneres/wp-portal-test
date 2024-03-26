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
class Greenplace_Widget_Timeline extends WP_Widget {

	/**
	 * Sets up a new Process widget instance.
	 */
	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'scripts' ) );

		$widget_ops  = array(
			'classname'   => 'widget_timeline',
			'description' => __( 'Arbitrary text.' ),
		);

		$control_ops = array(
			'width'  => 400,
			'height' => 350,
		);

		parent::__construct( 'timeline', __( 'Timeline' ), $widget_ops, $control_ops );
	}

	/**
	 * Outputs the content for the current Process widget instance.
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Process widget instance.
	 *@global WP_Post $post Global post object.
	 *
	 */
	public function widget( $args, $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$description = ! empty( $instance['description'] ) ? $instance['description'] : '';
		$link = ! empty( $instance['link'] ) ? $instance['link'] : '';
		$image = ! empty( $instance['image'] ) ? $instance['image'] : '';

		echo $args['before_widget']; ?>

		<section id="block-3" class="widget widget_block" style="min-height: 18rem;">
			<div class="widget__body">
				<div class="row middle-xs">
					<div class="col col--sm-6 col--md-12 col--lg-6 last-lg">
						<figure class="widget__figure">
							<img class="widget__img" src="<?php echo $image; ?>" alt="<?php echo $title; ?>" style="max-height: 13rem">
						</figure>
					</div>

					<div class="col col--sm desc-time-line">
						<h2 class="widget__title">
							<a href="#" class="disabled-link"><?php echo $title; ?></a>
						</h2>
						<p><?php echo $description; ?></p>
                        <p><a href="<?php echo $link; ?>" target="_blank" style="font-weight: bold">Clique e avalie</a><p>
					</div>
				</div>
			</div>
		</section>




		<!--            <div>-->
		<!--			<div class="widget__body">-->
		<!--				<div class="row middle-xs">-->
		<!---->
		<!--					<div class="col col--md-8 col--xl-7">-->
		<!--						--><?php //if ( ! empty( $title ) ) :
//							echo $args['before_title']; ?>
		<!--								<a href="--><?php //echo $link; ?><!--" class="disabled-link">--><?php //echo $title; ?><!--</a>-->
		<!--							--><?php //echo $args['after_title'];
//						endif ?>
		<!---->
		<!--						<p>--><?php //echo $description; ?><!--</p>-->
		<!---->
		<!--					</div>-->
		<!--				</div>-->
		<!--			</div>-->
		<!---->
		<!--            <div class="col col--md-4 col--xl-5 figure-learn-process">-->
		<!--                <figure class="widget__figure">-->
		<!--                    <img class="widget__img" src="--><?php //echo $image; ?><!--" alt="--><?php //echo $title; ?><!--" style="max-height: 16rem">-->
		<!--                </figure>-->
		<!--            </div>-->

		<?php echo $args['after_widget'];
	}

	/**
	 * Outputs the Process widget settings form.
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title' => '',
				'description' => '',
				'link' => '',
				'image' => ''
			)
		);
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>"/>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Description:' ); ?></label>
			<textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>"><?php echo esc_textarea( $instance['description'] ); ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e( 'Link:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="url" value="<?php echo esc_attr( $instance['link'] ); ?>"/>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'Image:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="text" value="<?php echo esc_url( $instance['image'] ); ?>" />
			<button class="upload_image_button button button-primary">Upload Image</button>
		</p>

		<?php
	}

	public function scripts() {
		wp_enqueue_script( 'media-upload' );
		wp_enqueue_media();
		wp_enqueue_script('upload', get_template_directory_uri() . '/js/upload.js', array('jquery'));
	}
}

add_action( 'widgets_init', function() {
	register_widget( 'Greenplace_Widget_Timeline' );
});
