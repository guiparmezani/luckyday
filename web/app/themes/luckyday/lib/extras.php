<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

if(function_exists('acf_add_options_page')) {
  acf_add_options_page();
}

// Models Custom Post Type
add_action('init', function() {

  $labels = array(
    'name' => _x('Models', 'post type general name'),
    'singular_name' => _x('Model', 'post type singular name'),
    'add_new' => _x('Add New', 'model'),
    'add_new_item' => __('Add New Model'),
    'edit_item' => __('Edit Model'),
    'new_item' => __('New Model'),
    'all_items' => __('All Models'),
    'view_item' => __('View Model'),
    'search_items' => __('Search Models'),
    'not_found' => __('No models found'),
    'not_found_in_trash' => __('No models found in the Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'Models'
  );

  $args = array(
    'labels' => $labels,
    'description' => 'Holds models data',
    'public' => false,
    'publicly_queryable' => false,
    'capability_type'    => 'post',
    'hierarchical'       => false,
    'show_ui'            => true,
    'query_var'          => true,
    'menu_position' => 5,
    'show_in_nav_menus' => false,
    'supports' => array( 'title', 'thumbnail', 'excerpt', 'editor' ),
    'has_archive' => false,
    'exclude_from_search' => true,
    'rewrite' => array(
      'slug' => __('models', 'luckyday'),
      'with_front' => true
    ),
  );

  register_post_type('model', $args);
});

