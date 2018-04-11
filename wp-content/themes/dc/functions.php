<?php

/*
	Fucntions file for Daddy Cool's Chilli Sacue
*/

function register_dc_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_dc_menu' );

function dcwp_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'dcwp_add_woocommerce_support' );

function get_excerpt($limit, $source = null){

    if($source == "content" ? ($excerpt = get_the_content()) : ($excerpt = get_the_excerpt()));
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    // $excerpt = $excerpt.'... <a href="'.get_permalink($post->ID).'">more</a>';
    $excerpt = $excerpt.'...';
    return $excerpt;
}
