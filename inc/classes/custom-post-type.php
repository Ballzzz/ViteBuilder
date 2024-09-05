<?php
/**
 * LoadMore
 *
 * @package ViteBuilder
 */
namespace ViteBuilder\inc;
require_once('C:/xampp/htdocs/wordpress/wp-content/themes/ViteBuilder/inc/trait/trait-singleton.php');
use ViteBuilder\inc\trait\singleton;

class movie{
    use singleton;
    
	protected function __construct() {
		$this->setup_hooks();
	}

	/**
	 * To register action/filter.
	 *
	 * @return void
	 */
	protected function setup_hooks() {
        add_action( 'init', [$this,'create_movie_cpt'], 0 );
		/**
		 * Actions
		 */
		
	}

     // Register Custom Post Type Movie
    public function create_movie_cpt() {

	 $labels = array(
		'name' => _x( 'movies', 'Post Type General Name', 'ViteBuilder' ),
		'singular_name' => _x( 'Movie', 'Post Type Singular Name', 'ViteBuilder' ),
		'menu_name' => _x( 'movies', 'Admin Menu text', 'ViteBuilder' ),
		'name_admin_bar' => _x( 'Movie', 'Add New on Toolbar', 'ViteBuilder' ),
		'archives' => __( 'Movie Archives', 'ViteBuilder' ),
		'attributes' => __( 'Movie Attributes', 'ViteBuilder' ),
		'parent_item_colon' => __( 'Parent Movie:', 'ViteBuilder' ),
		'all_items' => __( 'All movies', 'ViteBuilder' ),
		'add_new_item' => __( 'Add New Movie', 'ViteBuilder' ),
		'add_new' => __( 'Add New', 'ViteBuilder' ),
		'new_item' => __( 'New Movie', 'ViteBuilder' ),
		'edit_item' => __( 'Edit Movie', 'ViteBuilder' ),
		'update_item' => __( 'Update Movie', 'ViteBuilder' ),
		'view_item' => __( 'View Movie', 'ViteBuilder' ),
		'view_items' => __( 'View movies', 'ViteBuilder' ),
		'search_items' => __( 'Search Movie', 'ViteBuilder' ),
		'not_found' => __( 'Not found', 'ViteBuilder' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'ViteBuilder' ),
		'featured_image' => __( 'Featured Image', 'ViteBuilder' ),
		'set_featured_image' => __( 'Set featured image', 'ViteBuilder' ),
		'remove_featured_image' => __( 'Remove featured image', 'ViteBuilder' ),
		'use_featured_image' => __( 'Use as featured image', 'ViteBuilder' ),
		'insert_into_item' => __( 'Insert into Movie', 'aulia' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Movie', 'ViteBuilder' ),
		'items_list' => __( 'movies list', 'aulia' ),
		'items_list_navigation' => __( 'movies list navigation', 'ViteBuilder' ),
		'filter_items_list' => __( 'Filter movies list', 'ViteBuilder' ),
	 );
	 $args = array(
		'label' => __( 'Movie', 'ViteBuilder' ),
		'description' => __( 'The movies', 'ViteBuilder' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-video-alt',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'comments', 'trackbacks', 'page-attributes', 'custom-fields'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	 );
	 register_post_type( 'movie', $args );

    }   
}