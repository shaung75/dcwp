<?php
/**
 * Single Product title
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/title.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author     WooThemes
 * @package    WooCommerce/Templates
 * @version    1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

the_title( '<h1 class="product_title entry-title">', '</h1>' );

// Show the heat rating
if ( get_post_meta(get_the_id(), 'heat', true) && get_post_meta(get_the_id(), 'heat', true) >= 0 && get_post_meta(get_the_id(), 'heat', true) <= 6 ) :

	$rating = get_post_meta(get_the_id(), 'heat', true);

	echo '<img style="display:block;" src="'.get_bloginfo('template_directory').'/img/Chilli'.$rating.'.png" height="40">';

endif;