<?php
/**
 * Greenplace_Widget_Important class
 *
 * @package Greenplace
 */

/**
 * Core class used to implement a Text widget.
 *
 * @see WP_Widget
 */
class Greenplace_Widget_Important extends WP_Widget
{

	/**
	 * Sets up a new Important widget instance.
	 */
	public function __construct()
	{
		add_action('admin_enqueue_scripts', array($this, 'scripts'));

		$widget_ops = array(
			'classname' => 'widget_important',
			'description' => __('Arbitrary text.'),
		);

		$control_ops = array(
			'width' => 400,
			'height' => 350,
		);

		parent::__construct('important', __('Important'), $widget_ops, $control_ops);
	}

	/**
	 * Outputs the content for the current Important widget instance.
	 *
	 * @param array $args Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Important widget instance.
	 * @global WP_Post $post Global post object.
	 *
	 */
	public function widget($args, $instance)
	{
		$title = !empty($instance['title']) ? $instance['title'] : '';
		$description = !empty($instance['description']) ? $instance['description'] : '';
		$text = !empty($instance['text']) ? $instance['text'] : '';
		$image = !empty($instance['image']) ? $instance['image'] : '';

		echo $args['before_widget']; ?>

		<div class="widget__head aspect-ratio aspect-ratio--21x9 cover cover--top bg-blue">
			<div class="cover__img" style="background-image: url(<?php echo $image; ?>)"></div>

			<div class="aspect-ratio__content pos pos--bottom">
				<h1 class="head head--sm"><span class="head__title"><?php echo $title; ?></span></h1>
			</div>
		</div>
		<?php if ($description): ?>

		<div class="widget__body bg-blue">
			<p><?php echo $description; ?></p>
		</div>
	<?php endif; ?>


		<?php if ($text): ?>
		<div class="widget__body">
			<p><?php echo $text; ?></p>
		</div>
	<?php endif; ?>

		<?php echo $args['after_widget'];
	}

	/**
	 * Outputs the Important widget settings form.
	 *
	 * @param array $instance Current settings.
	 */
	public function form($instance)
	{
		$instance = wp_parse_args(
			(array)$instance,
			array(
				'title' => '',
				'description' => '',
				'text' => '',
				'image' => ''
			)
		);
		?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
				   name="<?php echo $this->get_field_name('title'); ?>" type="text"
				   value="<?php echo esc_attr($instance['title']); ?>"/>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('description'); ?>"><?php _e('Description:'); ?></label>
			<textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id('description'); ?>"
					  name="<?php echo $this->get_field_name('description'); ?>"><?php echo esc_textarea($instance['description']); ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text:'); ?></label>
			<textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id('text'); ?>"
					  name="<?php echo $this->get_field_name('text'); ?>"><?php echo esc_textarea($instance['text']); ?></textarea>
		</p>

		<?php wp_editor(esc_attr($instance['text']), $this->get_field_id('text')); ?>

		<p>
			<label for="<?php echo $this->get_field_id('image'); ?>"><?php _e('Image:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('image'); ?>"
				   name="<?php echo $this->get_field_name('image'); ?>" type="text"
				   value="<?php echo esc_url($instance['image']); ?>"/>
			<button class="upload_image_button button button-primary">Upload Image</button>
		</p>

		<?php
	}

	public function scripts()
	{
		wp_enqueue_script('media-upload');
		wp_enqueue_media();
		wp_enqueue_script('upload', get_template_directory_uri() . '/js/upload.js', array('jquery'));
	}
}

add_action('widgets_init', function () {
	register_widget('Greenplace_Widget_Important');
});
