<?php

/**
 * Register menu for Daddy Cool theme
 * @return [type] [description]
 */
function register_dc_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_dc_menu' );

function dcwp_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'dcwp_add_woocommerce_support' );

/**
 * Returns a shorter version of the excerpt
 * @param  int      $limit  Number of characters
 * @param  string   $source Content to shorten. Defaults to the ecerpt
 */
function get_excerpt($limit, $source = null){
  if($source == "content" ? ($excerpt = get_the_content()) : ($excerpt = get_the_excerpt()));
  $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
  $excerpt = strip_shortcodes($excerpt);
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $limit);
  $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
  $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
  $excerpt = $excerpt.'...';
  return $excerpt;
}

/**
 * Navigation Walker
 */
class DC_Walker extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = array() ) {
    $output .= "<ul>\n";
	}
	function end_lvl( &$output, $depth = 0, $args = array() ) {
    $output .= "</ul>\n";
	}
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

    $output .= (in_array("menu-item-has-children", $item->classes)) ? "<span>" : "" ;

    $output .= $item->menu_item_parent ? '<li>' : '';
    $output .= "<a ".$attributes.">".esc_attr($item->title);
	}
	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output .= $depth == 0 && in_array("menu-item-has-children", $item->classes) ? "" : "</a>";
    $output .= $item->menu_item_parent ? "</li>\n" : "\n";
    $output .= (in_array("menu-item-has-children", $item->classes)) ? "</span>" : "" ;
	}
}

