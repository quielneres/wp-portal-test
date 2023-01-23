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
class Greenplace_Widget_Process extends WP_Widget {

	/**
	 * Sets up a new Process widget instance.
	 */
	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'scripts' ) );

		$widget_ops  = array(
			'classname'   => 'widget_process',
			'description' => __( 'Arbitrary text.' ),
		);

		$control_ops = array(
			'width'  => 400,
			'height' => 350,
		);

		parent::__construct( 'process', __( 'Process' ), $widget_ops, $control_ops );
	}

	/**
	 * Outputs the content for the current Process widget instance.
	 *
	 * @global WP_Post $post Global post object.
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Process widget instance.
	 */
	public function widget( $args, $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$description = ! empty( $instance['description'] ) ? $instance['description'] : '';
		$link = ! empty( $instance['link'] ) ? $instance['link'] : '';
		$image = ! empty( $instance['image'] ) ? $instance['image'] : '';

		echo $args['before_widget']; ?>

			<div class="widget__body">
				<div class="row middle-xs">
					<div class="col col--md-4 col--xl-5">
						<figure class="widget__figure">
							<img class="widget__img" src="<?php echo $image; ?>" alt="<?php echo $title; ?>" style="max-height: 12rem">
						</figure>
					</div>

					<div class="col col--md-8 col--xl-7">
						<?php if ( ! empty( $title ) ) :
							echo $args['before_title']; ?>
								<a href="<?php echo $link; ?>"><?php echo $title; ?></a>
							<?php echo $args['after_title'];
						endif ?>

						<p><?php echo $description; ?></p>

						<hr class="hr">

						<?php process_menu('process', 'list', 'list--dot row mb-0 mb-sm-3'); ?>
					</div>
				</div>
			</div>

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
	register_widget( 'Greenplace_Widget_Process' );
});
