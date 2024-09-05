<?php
/**
 * Clock Widget
 *
 * @package ViteBuilder
 */
namespace ViteBuilder\inc;
require_once('C:/xampp/htdocs/wordpress/wp-content/themes/ViteBuilder/inc/trait/trait-singleton.php');

use WP_Widget;

use ViteBuilder\inc\trait\singleton;

class Clock_Widget extends WP_Widget {

	use singleton;

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'clock_widget', // Base ID
			'Clock', // Name
			[ 'description' => __( 'Clock Widget', 'ViteBuilder' ), ] // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 *
	 * @see WP_Widget::widget()
	 *
	 */
	public function widget( $args, $instance ) {
		extract( $args );
        print_r($instance);
        
		$title = apply_filters( 'widget_title', $instance['title'] );
        
		echo $before_widget;

		if ( ! empty( $title ) ) {
			echo $before_title . $title . $after_title;
		}
		?>
		<section class="card">
			<div class="clock card-body">
				<span id="time"></span>
				<span id="ampm"></span>
				<span id="time-emoji"></span>
			</div>
		</section>
		<?php
		echo $after_widget;
	}

    public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'New title', 'ViteBuilder' );
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:', 'ViteBuilder' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
			       name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
			       value="<?php echo esc_attr( $title ); ?>"/>
		</p>


		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance          = [];
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

}