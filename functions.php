<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! function_exists( 'neve_child_load_css' ) ):
	/**
	 * Load CSS file.
	 */
	function neve_child_load_css() {
		wp_enqueue_style( 'neve-child-style', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'neve-style' ), NEVE_VERSION );
	}
endif;
add_action( 'wp_enqueue_scripts', 'neve_child_load_css', 20 );

/*
* Creating a function to create our CPT
*/
  
function performance_custom_post_type() {
  
	// Set UI labels for Custom Post Type
			$labels = array(
					'name'                => _x( 'Performances', 'Post Type General Name', 'neve' ),
					'singular_name'       => _x( 'Performance', 'Post Type Singular Name', 'neve' ),
					'menu_name'           => __( 'Performances', 'neve' ),
					'parent_item_colon'   => __( 'Parent Performance', 'neve' ),
					'all_items'           => __( 'All Performances', 'neve' ),
					'view_item'           => __( 'View Performance', 'neve' ),
					'add_new_item'        => __( 'Add New Performance', 'neve' ),
					'add_new'             => __( 'Add New', 'neve' ),
					'edit_item'           => __( 'Edit Performance', 'neve' ),
					'update_item'         => __( 'Update Performance', 'neve' ),
					'search_items'        => __( 'Search Performance', 'neve' ),
					'not_found'           => __( 'Not Found', 'neve' ),
					'not_found_in_trash'  => __( 'Not found in Trash', 'neve' ),
			);
				
	// Set other options for Custom Post Type
				
			$args = array(
					'label'               => __( 'performances', 'neve' ),
					'description'         => __( 'Performance news and reviews', 'neve' ),
					'labels'              => $labels,
					// Features this CPT supports in Post Editor
					'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
					// You can associate this CPT with a taxonomy or custom taxonomy. 
					'taxonomies'          => array( 'performance', 'performances' ),
					/* A hierarchical CPT is like Pages and can have
					* Parent and child items. A non-hierarchical CPT
					* is like Posts.
					*/
					'hierarchical'        => false,
					'public'              => true,
					'show_ui'             => true,
					'show_in_menu'        => true,
					'show_in_nav_menus'   => true,
					'show_in_admin_bar'   => true,
					'menu_position'       => 5,
					'menu_icon'						=> "dashicons-microphone",
					'can_export'          => true,
					'has_archive'         => true,
					'exclude_from_search' => false,
					'publicly_queryable'  => true,
					'capability_type'     => 'post',
					'show_in_rest' => true,
		
			);
				
			// Registering your Custom Post Type
			register_post_type( 'performances', $args );
		
	}
		
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not 
	* unnecessarily executed. 
	*/
		
	add_action( 'init', 'performance_custom_post_type', 0 );

//archives-page-functions.php add widgets and enqueues archives-page-style.css

// require get_theme_file_path('/archives-page-functions.php');