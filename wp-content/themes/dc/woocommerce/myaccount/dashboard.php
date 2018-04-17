<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<div class="title_1">My Profile</div>

<?php wc_get_template( 'myaccount/my-address.php' ); ?>

<?php
$customer_orders = get_posts( array(
    'numberposts' => -1,
    'meta_key'    => '_customer_user',
    'meta_value'  => get_current_user_id(),
    'post_type'   => wc_get_order_types(),
    'post_status' => array_keys( wc_get_order_statuses() ),
) );
?>
<div class="box_panel">
	<div class="_title">Order History</div>
	<div class="_content">
		<div class="table_panel">
			<div class="_th">
				<div class="_td">Order</div>
				<div class="_td">Date</div>
				<div class="_td">Status</div>
				<div class="_td">Total</div>
				<div class="_td">Actions</div>
			</div>

		<?php
			if(count($customer_orders) > 0):
				// Customer has orders
				foreach($customer_orders as $customer_order):
					$wc_order = wc_get_order($customer_order->ID);
					//echo "<pre>";
					//print_r($wc_order);
					//echo "</pre>";
		?>
					<div class="_tr">
						<div class="_td">
							<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') );?>&view-order=<?php echo $customer_order->ID;?>"><?php echo $customer_order->ID;?></a>
						</div>
						<div class="_td">
							<?php echo date_format(date_create($customer_order->post_date), "F d, Y");?>
						</div>
						<div class="_td">
							<?php echo $wc_order->status;?>
						</div>
						<div class="_td">
							&pound;<?php echo $wc_order->total;?>
						</div>
						<div class="_td">
							<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') );?>&view-order=<?php echo $customer_order->ID;?>">View</a>
						</div>
					</div>
		<?php
				endforeach;
			else:
				// Customer does not
		?>
				You have not place any orders so far.
		<?php                         
      endif;
		?>
			<div class="clear"></div>
		</div>
	</div>
</div>
<?php //wc_get_template( 'myaccount/orders.php' ); ?>


<p><?php
	/* translators: 1: user display name 2: logout url */
	printf(
		__( 'Hello %1$s (not %1$s? <a href="%2$s">Log out</a>)', 'woocommerce' ),
		'<strong>' . esc_html( $current_user->display_name ) . '</strong>',
		esc_url( wc_logout_url( wc_get_page_permalink( 'myaccount' ) ) )
	);
?></p>

<p><?php
	printf(
		__( 'From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">shipping and billing addresses</a> and <a href="%3$s">edit your password and account details</a>.', 'woocommerce' ),
		esc_url( wc_get_endpoint_url( 'orders' ) ),
		esc_url( wc_get_endpoint_url( 'edit-address' ) ),
		esc_url( wc_get_endpoint_url( 'edit-account' ) )
	);
?></p>

<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
