<?php
/**
 * This file will include all available function files.
 * 
 * @package bootstrap-basic4
 */


if( function_exists('acf_add_options_page') ) {
	acf_add_options_sub_page(array(
		'page_title' 	=> 'General Settings',
		'menu_title'	=> 'General Settings',
		'menu_slug' 	=> 'general-settings',
		'parent_slug'	=> 'index.php',
		'icon_url' 		=> 'dashicons-welcome-widgets-menus',
		'position' => 1,
		'redirect'		=> false
	));
}


// Register Careers custom Post Type
function services_post_type() {
  $labels = array(
      'name' => __('service', 'Post Type General Name', 'post-type'),
      'singular_name' => _x('service', 'Post Type Singular Name', 'post-type'),
      'menu_name' => __('service', 'post-type'),
      'parent_item_colon' => __('Parent service:', 'post-type'),
      'all_items' => __('All', 'post-type'),
      'view_item' => __('View service', 'post-type'),
      'add_new_item' => __('Add New service', 'post-type'),
      'add_new' => __('Add New', 'post-type'),
      'edit_item' => __('Edit service', 'post-type'),
      'update_item' => __('Update service', 'post-type'),
      'search_items' => __('Search service', 'post-type'),
      'not_found' => __('Not found', 'post-type'),
      'not_found_in_trash' => __('Not found in Trash', 'post-type'),
  );
  $args = array(
      'labels' => $labels,
      'supports' => array('title','revisions','editor','thumbnail',),
      'hierarchical' => false,
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'show_in_nav_menus' => true,
      'show_in_admin_bar' => true,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-welcome-widgets-menus',
      'can_export' => true,
      'has_archive' => true,
      'exclude_from_search' => false,
      'publicly_queryable' => true,
      'capability_type' => 'page',
      'show_in_rest' => true,


  );
  register_post_type('services', $args);
}

// Hook into the 'init' action
add_action('init', 'services_post_type', 0);


//register taxonomy for custom post tags
register_taxonomy( 
'services-tag', //taxonomy 
'services', //post-type
array( 
  'hierarchical'  => true, 
  'label'         => __( 'service Tags','taxonomy general name'), 
  'singular_name' => __( 'Tag', 'taxonomy general name' ), 
  'rewrite'       => true, 
  'query_var'     => true 
));
