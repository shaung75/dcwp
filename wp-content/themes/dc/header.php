<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1 ">
<title><?php echo get_bloginfo( 'name' ); ?></title>

<?php
  /**
   * Get featured image
   */
  if (has_post_thumbnail( $post->ID ) ):
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
  else:
    $image[] = get_bloginfo('template_directory') . '/img/daddycools.png';
  endif;

  /**
   * Get current URL
   */
  global $wp;
  $current_url = home_url( $wp->request );

  /**
   * Get page title
   */
  if (is_front_page()):
    $title = get_bloginfo( 'name' );
  elseif (is_product_category()):
    $title = single_term_title("", false) . ' - ' . get_bloginfo( 'name' );
  else:
    $title = get_the_title() . ' - ' . get_bloginfo( 'name' );
  endif;

  /**
   * Description
   */
  $desc = "We are incredibly proud of our products and are sure there will be something for everyone within our range, we enjoy delivering that home-made and hand made produce to all our customers, why not give us a try";

?>
<meta property="og:url" content="<?php echo $current_url ?>"/>
<meta property="og:title" content="<?php echo $title; ?>"/>
<meta property="og:description" content="<?php echo $desc ?>"/>
<meta property="og:type" content="website" />
<meta property="og:image" content="<?php echo $image[0];?>" />

<!--  Favicons and Touch incons -->
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_bloginfo('template_directory'); ?>/favicons/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_bloginfo('template_directory'); ?>/favicons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_bloginfo('template_directory'); ?>/favicons/favicon-16x16.png">
<link rel="manifest" href="<?php echo get_bloginfo('template_directory'); ?>/favicons/site.webmanifest">
<link rel="mask-icon" href="<?php echo get_bloginfo('template_directory'); ?>/favicons/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">

<meta name="viewport" content="initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,width=device-width,height=device-height,target-densitydpi=device-dpi,user-scalable=no" />
<link type="text/css" rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/css/default.css"/>
<link type="text/css" rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/style.css" />
<script src="<?php echo get_bloginfo('template_directory'); ?>/js/jquery-1.12.2.min.js"></script>
<script src="<?php echo get_bloginfo('template_directory'); ?>/js/web.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/fancybox/jquery.fancybox.js"></script>
<link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/fancybox/jquery.fancybox.css" type="text/css"/>
<link type="text/css" rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/css/flexslider.css"/>
<script src="<?php echo get_bloginfo('template_directory'); ?>/js/jquery.flexslider.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_directory'); ?>/bxslider/jquery.bxslider.css">
<script src="<?php echo get_bloginfo('template_directory'); ?>/bxslider/plugins/jquery.fitvids.js"></script>
<script src="<?php echo get_bloginfo('template_directory'); ?>/bxslider/jquery.bxslider.min.js"></script>

<style>
  body { /* background: none; */ }
  nav { background:#590b0b; }
</style>

<script>
  $(document).ready(function() {
        $('.flexslider.banner').flexslider({
      controlNav: false,
        directionNav: false
    });

    $('.flexslider.prod-slider').flexslider({
      animation: "slide",
      animationLoop: false,
      itemWidth: 210,
      itemMargin: 5,
      minItems: 1,
      maxItems: 4,
      controlNav: false,
        directionNav: true
    });

    });
</script>
<?php

$sid=session_id();
?>
<script src='https://www.google.com/recaptcha/api.js'></script>

<?php wp_head();?>

</head>

<?php include "inc/eucookielaw.php"; ?>

<script>
function getSearchProducts(){
  if($('#top_search_box').val() == ""){
    return false;
  }
}
</script>
<body>
  <div class="wrapper">
      <div class="content">
            <header class="clear-fx">
                <ul class="header-top">
                    <li class="_mail"><img src="<?php echo get_bloginfo('template_directory'); ?>/img/mail-icon.png" />info@daddycoolschillisauce.co.uk</li>
                    <li class="_ph"><img src="<?php echo get_bloginfo('template_directory'); ?>/img/ph-icon.png" /> <h5> 07583 403560</h5></li>
                    <li class="_smlink">
                        <a href="http://www.facebook.com/daddycoolshotpeppersauce/" target="_blank"><img src="<?php echo get_bloginfo('template_directory'); ?>/img/fb-icon.png" /></a>
                        <a href="http://twitter.com/chillidadd" target="_blank"><img src="<?php echo get_bloginfo('template_directory'); ?>/img/twit-icon.png" /></a>
                        <a href="http://www.instagram.com/daddycoolspeppersauce/" target="_blank"><img src="<?php echo get_bloginfo('template_directory'); ?>/img/inst-icon.png" /></a>
                        <a href="http://uk.pinterest.com/daddycoolssauce/" target="_blank"><img src="<?php echo get_bloginfo('template_directory'); ?>/img/pr-icon.png" /></a>
                        <a href="https://plus.google.com/u/0/111487607876041732045/posts" target="_blank"><img src="<?php echo get_bloginfo('template_directory'); ?>/img/google-plus.png"  alt=""/></a>
                    </li>
                </ul>
                <a class="logo" href="<?php echo get_bloginfo( 'wpurl' );?>">
                  <img  src="<?php echo get_bloginfo('template_directory'); ?>/img/daddycools.png" />
                </a>
                <img src="<?php echo get_bloginfo('template_directory'); ?>/img/punchline-img.png" class="logo-txt" />
                <div class="header-right">
                    
                    <?php get_search_form();?>  
                    
                    <?php 
                      if ( is_user_logged_in() ) {
                    ?>
                        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','woothemes'); ?>"><img src="<?php echo get_bloginfo('template_directory'); ?>/img/member-icon.png" />&nbsp; <?php _e('My Account','woothemes'); ?></a> <a href="<?php echo wp_logout_url( get_permalink( woocommerce_get_page_id( 'myaccount' ) ) );?>">Logout</a>
                    <?php
                      } else { 
                    ?>
                        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','woothemes'); ?>"><img src="<?php echo get_bloginfo('template_directory'); ?>/img/member-icon.png" /><?php _e('Login','woothemes'); ?></a>
                    <?php
                      }
                    ?>

                    <a href="<?php echo WC()->cart->get_cart_url();?>">
                    <img src="<?php echo get_bloginfo('template_directory'); ?>/img/cart-icon.png" /> My Cart(<?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?>)
                    </a>
                    <a class="nav-toggle-butn"><img src="<?php echo get_bloginfo('template_directory'); ?>/img/menu_button.png" /></a>
                    <a class="srch-toggle-butn"><img src="<?php echo get_bloginfo('template_directory'); ?>/img/srch-icon.png" /></a>
                </div>
            </header>

            <?php include ('navigation.php'); ?>
