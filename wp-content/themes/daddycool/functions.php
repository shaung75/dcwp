<?php
/**
 * @package 	WordPress
 * @subpackage 	Green Farm Child
 * @version		1.0.0
 * 
 * Child Theme Functions File
 * Created by CMSMasters
 * 
 */


function green_farm_child_enqueue_styles() {
    wp_enqueue_style('green-farm-child-style', get_stylesheet_uri(), array(), '1.0.0', 'screen, print');
}

add_action('wp_enqueue_scripts', 'green_farm_child_enqueue_styles', 11);

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
  function loop_columns() {
    return 3; // 3 products per row
  }
}