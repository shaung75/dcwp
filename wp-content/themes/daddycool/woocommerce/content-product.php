<?php
/**
 * @cmsmasters_package  Green Farm
 * @cmsmasters_version  1.0.8
 */


global $product;

$attachment_ids = $product->get_gallery_image_ids();

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
  return;
}

?>
<li <?php post_class(); ?>>
  <article class="cmsmasters_product">
    <?php
    /**
     * woocommerce_before_shop_loop_item hook.
     *
     * @hooked woocommerce_template_loop_product_link_open - 10
     */
    remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
    
    do_action( 'woocommerce_before_shop_loop_item' );
    ?>
    <figure class="cmsmasters_product_img">
      <?php
      green_farm_woocommerce_add_to_cart_button();
      ?>
      <a href="<?php the_permalink(); ?>">
        <?php 
        
        
        if (has_post_thumbnail()) {
          woocommerce_template_loop_product_thumbnail();
        }
        
        
        if ($attachment_ids) {
          $attachment_id = $attachment_ids[0];
          
          $image = wp_get_attachment_image($attachment_id, apply_filters('single_product_small_thumbnail_size', 'shop_catalog'));
          
          echo apply_filters('woocommerce_single_product_image_thumbnail_html', sprintf($image));
        }
        
        
        if (!has_post_thumbnail() && !$attachment_ids) {
          echo '<span class="cmsms_product_placeholder"></span>';
        }
        ?>
      </a>
      <?php 
        woocommerce_show_product_loop_sale_flash();
        
        $availability = $product->get_availability();

        if (esc_attr($availability['class']) == 'out-of-stock') {
          echo apply_filters('woocommerce_stock_html', '<span class="' . esc_attr( $availability['class'] ) . '"><span>' . esc_html( $availability['availability'] ) . '</span></span>', $availability['availability']);
        }
      ?>
    </figure>
    <div class="cmsmasters_product_inner">
      <?php
      /**
       * woocommerce_before_shop_loop_item_title hook.
       *
       * @hooked woocommerce_show_product_loop_sale_flash - 10
       * @hooked woocommerce_template_loop_product_thumbnail - 10
       */
      remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
      remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
      
      do_action( 'woocommerce_before_shop_loop_item_title' );
      
      
      /**
       * woocommerce_shop_loop_item_title hook.
       *
       * @hooked woocommerce_template_loop_product_title - 10
       */
      remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
      
      do_action( 'woocommerce_shop_loop_item_title' );
      
      
      if (get_the_terms($product->get_id(), 'product_cat')) {
        echo '<div class="cmsmasters_product_cat entry-meta">' . 
          green_farm_get_the_category_list($product->get_id(), 'product_cat', ', ') . 
        '</div>';
      }
      ?>
      <header class="cmsmasters_product_header entry-header">
        <h3 class="cmsmasters_product_title entry-title">
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
      </header>
      <?php
        green_farm_woocommerce_rating('cmsmasters_theme_icon_star_empty', 'cmsmasters_theme_icon_star_full');
      ?>
      <div class="cmsmasters_product_info">
      <?php
        woocommerce_template_loop_price();
        
        
        /**
         * woocommerce_after_shop_loop_item_title hook.
         *
         * @hooked woocommerce_template_loop_rating - 5
         * @hooked woocommerce_template_loop_price - 10
         */
        remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
        remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
        
        do_action( 'woocommerce_after_shop_loop_item_title' );
      ?>
      </div>
    </div>
  </article>
  <div class="dc-buttons">
    <?php
    /**
     * woocommerce_after_shop_loop_item hook.
     *
     * @hooked woocommerce_template_loop_product_link_close - 5
     * @hooked woocommerce_template_loop_add_to_cart - 10
     */
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
    //remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
    
    do_action( 'woocommerce_after_shop_loop_item' );
    ?>
  </div>
</li>