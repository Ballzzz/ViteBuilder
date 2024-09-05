<?php
/**
 * Theme functions
 * 
 * @package ViteBuilder
 */
/** Add widgets support to current theme **/
require_once('C:/xampp/htdocs/wordpress/wp-content/themes/ViteBuilder/inc/classes/class-asset.php');
if ( ! defined( 'VITEBUILDER_ARCHIVE_POST_PER_PAGE' ) ) {
	define( 'VITEBUILDER_ARCHIVE_POST_PER_PAGE', 3 );
}
add_filter( 'current_theme_supports-widgets', function( $supports ) {
    $supports = false ? true : $supports;
    return $supports;
} );
function ViteBuilder_get_theme_instance() {
	asset::get_instance();
}

ViteBuilder_get_theme_instance();

function ViteBuilder_enqueue_style(){

   
    // Register and enqueue styles
    wp_register_style('slick-css',get_template_directory_uri() . "/css/slick-theme.css" ,  ['stylesheet'],false, 'all');
    wp_register_style('stylesheet', get_stylesheet_uri(), [], filemtime(get_template_directory() . '/style.css'),false, 'all');
    wp_register_style('bootstrap-css',get_template_directory_uri()."/assets/src/library/css/bootstrap.min.css", [], false , 'all');
    wp_register_style('font-css',get_template_directory_uri()."/assets/src/library/font/font.css", [], false , 'all');
    wp_enqueue_style('stylesheet');
    wp_enqueue_style('bootstrap-css');
    wp_enqueue_style('slick-css');
    
    
    // Register and enqueue scripts
    wp_register_script('main', get_template_directory_uri() . "/dist/main.js", ['jquery','slick-js'], FALSE, true);
    wp_register_script('path', get_template_directory_uri() . "/dist/path.js", ['jquery','slick-js'], false, true);
    wp_register_script('slick-js', get_template_directory_uri() . "/slick.min.js", ['jquery'], false, true);
    wp_register_script('bootstrap-js',get_template_directory_uri()."/assets/src/library/js/bootstrap.min.js", ['jquery'], false ,true);
    wp_enqueue_script('main');
    wp_enqueue_script('bootstrap-js');
    wp_enqueue_script('slick-js');
    if ( is_author() ) {
        wp_enqueue_script( 'path' );
    }

    wp_localize_script( 'main', 'siteConfig', [
        'ajaxUrl'    => admin_url( 'admin-ajax.php' ),
        'ajax_nonce' => wp_create_nonce( 'loadmore_post_nonce' ),
    ] );
    
    
}


add_action('wp_enqueue_scripts', 'ViteBuilder_enqueue_style');


function setup_theme(){
    

    // Add theme support for title-tag
    add_theme_support('title-tag');
    
    // Add theme support for custom-logo
    add_theme_support(
        'custom-logo',
        [
            'header-text' => [
                'site-title',
                'site-description',
            ],
            'height'      => 100,
            'width'       => 400,
            'flex-height' => true,
            'flex-width'  => true,
        ]
    );
    
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'featured-thumbnail', 350, 233, true );

    add_theme_support( 'customize-selective-refresh-widgets' );

    add_theme_support('automatic-feed-links');

    add_theme_support( 'html5',array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

    add_editor_style();

    add_theme_support('wp-block-styles');

    add_theme_support('align-wide');
}

// Hooking the function to after_setup_theme action

add_action('after_setup_theme', 'setup_theme');
// Correct hook to enqueue styles and scripts
$args = array(
    'default-color' => '#fff',
    'default-image' =>  '',
);
add_theme_support( 'custom-background', $args );
function register_menus(){
    register_nav_menus( array(
        'ViteBuilder_primary_menu' => esc_html__( 'Header Menu', 'ViteBuilder' ),
        'ViteBuilder_footer_menu'  =>esc_html__( 'Footer Menu', 'ViteBuilder' ),
    ) );
}
add_action('init', 'register_menus');

 
function custom_meta_box_html( $post ) {

		$value = get_post_meta( $post->ID, '_hide_page_title', true );

        wp_nonce_field( plugin_basename(__FILE__), 'hide_title_meta_box_nonce_name' );
		

		?>
		<label for="ViteBuilder-field"><?php esc_html_e( 'Hide the page title', 'ViteBuilder' ); ?></label>
		<select name="ViteBuilder_hide_title_field" id="ViteBuilder-field" class="postbox">
			<option value=""><?php esc_html_e( 'Select', 'ViteBuilder' ); ?></option>
			<option value="yes" <?php selected( $value, 'yes' ); ?>>
				<?php esc_html_e( 'Yes', 'ViteBuilder' ); ?>
			</option>
			<option value="no" <?php selected( $value, 'no' ); ?>>
				<?php esc_html_e( 'No', 'ViteBuilder' ); ?>
			</option>
		</select>
		<?php
	}
    function add_custom_meta_box() {
		$screens = [ 'post' ];
		foreach ( $screens as $screen ) {
			add_meta_box(
				'hide-page-title',           // Unique ID
				__( 'Hide page title', 'ViteBuilder' ),  // Box title
				'custom_meta_box_html' ,  // Content callback, must be of type callable
				$screen,                   // Post type
				'side' // context
			);
		}
	}
add_action( 'add_meta_boxes',  'add_custom_meta_box' );
function wporg_save_postdata( $post_id ) {
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    /**
     * Check if the nonce value we received is the same we created.
     */
    if ( ! isset( $_POST['hide_title_meta_box_nonce_name'] ) ||
         ! wp_verify_nonce( $_POST['hide_title_meta_box_nonce_name'], plugin_basename(__FILE__) )
    ) {
        return;
    }


	if ( array_key_exists( 'ViteBuilder_hide_title_field', $_POST ) ) {
		update_post_meta(
			$post_id,
			'_hide_page_title',
			$_POST['ViteBuilder_hide_title_field']
		);
	}
}
add_action( 'save_post', 'wporg_save_postdata' );



?>
