<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
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
 * @version 3.3.2
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
	'woocommerce-product-gallery',
	'woocommerce-product-gallery--' . ( has_post_thumbnail() ? 'with-images' : 'without-images' ),
	'woocommerce-product-gallery--columns-' . absint( $columns ),
	'images',
) );
?>


<div id="andymainimg">
	<div class="prod-img-large">
		<?php
			if ( has_post_thumbnail() ) {
				
				$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );

				echo '<img id="zoom_03" src="'.$img[0].'" data-id="'.$loop->post->ID.'" onclick="showImgPopup(\'\');" data-zoom-img="'.$img[0].'" style="position: absolute;">';
			}
		?>
	</div>
	<script>
    $(window).load(function() {
			$('.flexslider.prod-img-thumb').flexslider({
				animation: "slide",
				animationLoop: false,
				itemWidth: 50,
				itemMargin: 5,
				minItems: 1,
				maxItems: 7,
				controlNav: false,
				directionNav: true
				
			});
		});
  </script>
</div>

<?php
	do_action( 'woocommerce_product_thumbnails' );
?>

<script>
	$(function(){
		$('.fancybox.levarply').fancybox();	
	});

	function dipaly_Swap(received_id){
		var url="<?php echo $global_site_url['site_url']; ?>ajax_file.php";
		var image_id=received_id;
		var prod_id=$("#product_id").val();
		$.post(url,{"choice":"showpics","image_Id":image_id,"product_id":prod_id},function(res){
			$("#andymainimg").html(res);
			$('.flexslider.prod-img-thumb').flexslider({
				animation: "slide",
				animationLoop: false,
				itemWidth: 50,
				itemMargin: 5,
				minItems: 1,
				maxItems: 7,
				controlNav: false,
				directionNav: true
			});
			
			$("#zoom_03").elevateZoom({gallery:'gallery_01', cursor: 'pointer', galleryActiveClass: 'active', imageCrossfade: true, loadingIcon: ''});
            $("#zoom_03").bind("click", function(e) { var ez = $('#zoom_03').data('elevateZoom');	$.fancybox(ez.getGalleryList()); return false; });
		});
	}
</script>

<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
	<figure class="woocommerce-product-gallery__wrapper">
		<?php
		if ( has_post_thumbnail() ) {
			$html  = wc_get_gallery_image_html( $post_thumbnail_id, true );
		} else {
			$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
			$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
			$html .= '</div>';
		}
		echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id );
		do_action( 'woocommerce_product_thumbnails' );
		?>
	</figure>
</div>