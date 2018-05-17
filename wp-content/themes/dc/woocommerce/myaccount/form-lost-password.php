<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
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
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices(); ?>


<div class="contenter">
	<br>
	<br>
	<form method="post" class="form-1 clear-fx woocommerce-ResetPassword lost_reset_password" style="width:400px; margin:0 auto;">

		<h3>Reset Password</h3>

		<label for="user_login"><?php esc_html_e( 'Email Address:', 'woocommerce' ); ?></label>
		<input class="woocommerce-Input woocommerce-Input--text input-text" type="email" name="user_login" id="user_login" />


		<?php do_action( 'woocommerce_lostpassword_form' ); ?>

		<br>
		<br>

		<input type="hidden" name="wc_reset_password" value="true" />
		<button type="submit" class="butn-1 pull-right" value="<?php esc_attr_e( 'Reset password', 'woocommerce' ); ?>">Submit&nbsp;&nbsp;<img src="<?php echo get_bloginfo('template_directory'); ?>/img/arrow-right.png" height="15" style="height: 15px; display:inline-block; vertical-align:middle;"></button>
	
		<?php wp_nonce_field( 'lost_password' ); ?>

	</form>
</div>