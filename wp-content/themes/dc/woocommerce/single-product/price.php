<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

$price_html = $product->get_price_html();

$price_html_array = price_array($price_html);

function price_array($price){
    $del = array('<span class="amount">', '</span>','<del>','<ins>');
    $price = str_replace($del, '', $price);
    $price = str_replace('</del>', '|', $price);
    $price = str_replace('</ins>', '|', $price);
    $price_arr = explode('|', $price);
    $price_arr = array_filter($price_arr);
    return $price_arr;
}
?>

<?php 
	// Regular Price
	if( count($price_html_array) == 1):
?>
	
		<strong style="font-size:20px; color:#c60200;">
			<span id="itemprice"><?php echo $price_html_array[0];?></span>
		</strong><br/>

<?php
	// Product on Sale
	else:
?>
		<strong style="color:#c60200;">
			<strike><span id="itemprice"><?php echo $price_html_array[0];?></span></strike>
		</strong>
		&nbsp;&nbsp;&nbsp;
		<strong style="font-size:20px; color:#c60200;">
			<span id="itemprice"><?php echo $price_html_array[1];?></span>
		</strong><br/>
<?php
	endif;
?>