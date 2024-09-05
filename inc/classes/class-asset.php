<?php
/**
 * Clock Widget
 *
 * @package ViteBuilder
 */
require_once('C:/xampp/htdocs/wordpress/wp-content/themes/ViteBuilder/inc/classes/class-clock-widget.php');
require_once('C:/xampp/htdocs/wordpress/wp-content/themes/ViteBuilder/inc/classes/loadMorePost.php');
require_once('C:/xampp/htdocs/wordpress/wp-content/themes/ViteBuilder/inc/classes/custom-post-type.php');



use ViteBuilder\inc\trait\singleton;

class asset {

	use singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {
		ViteBuilder\inc\Loadmore_Posts::get_instance();
		ViteBuilder\inc\movie::get_instance();
		$this->setup_hooks();
	}

	/**
	 * To register action/filter.
	 *
	 * @return void
	 */
	protected function setup_hooks() {

		/**
		 * Actions
		 */
		add_action( 'widgets_init', [ $this, 'register_sidebars' ] );
		add_action( 'widgets_init', [ $this, 'register_clock_widget' ] );

	}

	/**
	 * Register widgets.
	 *
	 * @action widgets_init
	 */
	public function register_sidebars() {

		register_sidebar(
			[
				'name'          => esc_html__( 'Sidebar', 'ViteBuilder' ),
				'id'            => 'sidebar-1',
				'description'   => '',
				'before_widget' => '<div id="%1$s" class="widget widget-sidebar %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			]
		);

		register_sidebar(
			[
				'name'          => esc_html__( 'Footer', 'ViteBuilder' ),
				'id'            => 'sidebar-2',
				'description'   => '',
				'before_widget' => '<div id="%1$s" class="widget widget-footer cell column %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			]
		);

	}

	public function register_clock_widget() {
		register_widget( 'ViteBuilder\inc\Clock_Widget' );
	}

}
