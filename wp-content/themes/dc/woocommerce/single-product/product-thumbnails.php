<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.2
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$attachment_ids = $product->get_gallery_image_ids();

if ( $attachment_ids && has_post_thumbnail() ) {

	$html .= '';
	$html  = '<ul class="slides" style="width: 600%; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">';
	
	foreach ( $attachment_ids as $attachment_id ) {
		//echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', wc_get_gallery_image_html( $attachment_id  ), $attachment_id );
		
		$image_attributes = wp_get_attachment_image_src( $attachment_id );

		$html .= '<li onclick="dipaly_Swap(\''.$attachment_id.'\')" style="width: 50px; float: left; display: block;"><img src="'.$image_attributes[0].'"></li>';
	}

	$html .= '</ul>';

	echo $html;
}