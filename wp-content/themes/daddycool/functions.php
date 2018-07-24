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
?>