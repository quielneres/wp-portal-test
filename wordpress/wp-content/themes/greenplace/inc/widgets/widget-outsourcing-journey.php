<?php
/**
 * Greenplace_Widget_Outsourcing_Jouney class
 *
 * @package Greenplace
 */

/**
 * Core class used to implement a Text widget.
 *
 * @see WP_Widget
 */
class Greenplace_Widget_Outsourcing_Jouney extends WP_Widget {

	/**
	 * Sets up a new Outsourcing Journey widget instance.
	 */
	public function __construct() {
		$widget_ops  = array(
			'classname'   => 'widget_outsourcing_journey',
			'description' => __( 'Arbitrary text.' ),
		);

		$control_ops = array(
			'width'  => 400,
			'height' => 350,
		);

		parent::__construct( 'outsourcing_journey', __( 'Outsourcing Journey' ), $widget_ops, $control_ops );
	}

	/**
	 * Outputs the content for the current Outsourcing Journey widget instance.
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Outsourcing Journey widget instance.
	 *@global WP_Post $post Global post object.
	 *
	 */
	public function widget( $args, $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$description = ! empty( $instance['description'] ) ? $instance['description'] : '';

		echo $args['before_widget']; ?>
                <section id="process-2" class="widget fx-grow widget_process">
                    <div>
                        <div class="widget__body">
                            <div class="row middle-xs">
                                <div class="col col--md-12">
                                    <h2 class="widget__title">
                                        <a href="#" class="disabled-link"><?php echo $title; ?></a>
                                    </h2>
                                    <p class="text-profile"><?php echo $description; ?></p>

                                    <hr class="hr">

                                    <ul class="list list--dot row mb-0 mb-sm-3 list__process">

                                        <?php  $outsourcing_journey = get_content_outsourcing_journey();
                                        foreach ($outsourcing_journey as $journey) : ?>
                                            <li class="list__item col col--sm-12  list__item--788"><a
                                                href="<?= $journey['link'] ?>" class="list__link fw-450" target="_blank">
                                            <?= $journey['title'] ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

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
			)
		);
		?>

<p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
        name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
        value="<?php echo esc_attr( $instance['title'] ); ?>" />
</p>

<p>
    <label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Description:' ); ?></label>
    <textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id( 'description' ); ?>"
        name="<?php echo $this->get_field_name( 'description' ); ?>"><?php echo esc_textarea( $instance['description'] ); ?></textarea>
</p>

<?php
	}
}

add_action( 'widgets_init', function() {
	register_widget( 'Greenplace_Widget_Outsourcing_Jouney' );
});
