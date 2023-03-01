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
* PERFORMANCE CPT
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

/*
* SOCIAL MEDIA ACOUNTS CPT
*/
  
function social_custom_post_type() {
  
	// Set UI labels for Custom Post Type
			$labels = array(
					'name'                => _x( 'Socials', 'Post Type General Name', 'neve' ),
					'singular_name'       => _x( 'Social', 'Post Type Singular Name', 'neve' ),
					'menu_name'           => __( 'Socials', 'neve' ),
					'parent_item_colon'   => __( 'Parent Social', 'neve' ),
					'all_items'           => __( 'All Socials', 'neve' ),
					'view_item'           => __( 'View Social', 'neve' ),
					'add_new_item'        => __( 'Add New Social', 'neve' ),
					'add_new'             => __( 'Add New', 'neve' ),
					'edit_item'           => __( 'Edit Social', 'neve' ),
					'update_item'         => __( 'Update Social', 'neve' ),
					'search_items'        => __( 'Search Social', 'neve' ),
					'not_found'           => __( 'Not Found', 'neve' ),
					'not_found_in_trash'  => __( 'Not found in Trash', 'neve' ),
			);
			 
	// Set other options for Custom Post Type
			 
			$args = array(
					'label'               => __( 'socials', 'neve' ),
					'description'         => __( 'Social Media Accounts', 'neve' ),
					'labels'              => $labels,
					// Features this CPT supports in Post Editor
					'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
					// You can associate this CPT with a taxonomy or custom taxonomy. 
					'taxonomies'          => array( 'social', 'socials' ),
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
					'menu_icon'						=> "dashicons-share",
					'can_export'          => true,
					'has_archive'         => true,
					'exclude_from_search' => false,
					'publicly_queryable'  => true,
					'capability_type'     => 'post',
					'show_in_rest' => true,
	 
			);
			 
			// Registering your Custom Post Type
			register_post_type( 'socials', $args );
	 
	}
	 
 /* Hook into the 'init' action so that the function
 * Containing our post type registration is not 
 * unnecessarily executed. 
 */
	 
 add_action( 'init', 'social_custom_post_type', 0 );
	
/**
 * Customer Footer
 */
	function my_theme_register_footer_menu() {
		register_nav_menu('footer-menu',__( 'Custom Footer Menu' ));
	}
	add_action( 'init', 'my_theme_register_footer_menu' );

/**
 * Enqueue scripts and styles.
 */
// Enqueue CSS
function enqueue_styles() {
    wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/style.css', array(), '1.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_styles' );

function child_theme_scripts() {
  wp_enqueue_script( 'child_theme_script', get_stylesheet_directory_uri() . '/js/scripts.js', array(), '1.0', true );
  // You can add more scripts by calling wp_enqueue_script again with different parameters
}

add_action( 'wp_enqueue_scripts', 'child_theme_scripts' );



