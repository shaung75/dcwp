<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Hook Woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="cont-50 _md" id="n" align="center">

		<?php
			/**
			 * Hook: woocommerce_before_single_product_summary.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
		?>

	</div>

	<div class="cont-50 _md" style="padding-left: 20px">

		<?php
			/**
			 * Hook: Woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>

	</div>
</div>

<?php
	// Show some video reviews
	$vids = get_post_meta($post->ID, 'youtube', false);
	if( count( $vids ) != 0 ):
?>
  <div>
    <h2>Video Reviews:</h2>
    <div id="vidreviews">
      <ul class="bxslider">
        <?php
        foreach($vids as $vid) {

        	$ytvid = explode("\n", $vid);
        	$ytvid[video_desc] = "";
        	for($i = 1; $i < count($ytvid); $i++) {
        		$ytvid[video_desc] .= $ytvid[$i] . " ";
        	}
        ?>
        <li>
          <iframe src="https://www.youtube.com/embed/<?php echo $ytvid[0];?>" frameborder="0" allowfullscreen></iframe>              
          <p><strong>Comment:</strong> <?php echo stripslashes($ytvid[video_desc]); ?></p>
        </li>
        <?php  
          //print_r($ytvid);  
          //print_r("<BR>");  
        }
        ?>
      </ul>
    </div>              
  </div>
<?php
	endif;
?>
            <script> $('.bxslider').bxSlider({video: true,useCSS: false}); </script>

<?php
	// Show some related products
	$args = array(
	        'posts_per_page' => 3,
	        'columns' => 3,
	        'orderby' => 'rand'
	 );
    woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) );
?>

<?php do_action( 'woocommerce_after_single_product' ); ?>
