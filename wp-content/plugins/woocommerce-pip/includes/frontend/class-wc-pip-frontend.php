<?php
/**
 * WooCommerce Print Invoices/Packing Lists
 *
 * This source file is subject to the GNU General Public License v3.0
 * that is bundled with this package in the file license.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.html
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@skyverge.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade WooCommerce Print
 * Invoices/Packing Lists to newer versions in the future. If you wish to
 * customize WooCommerce Print Invoices/Packing Lists for your needs please refer
 * to http://docs.woocommerce.com/document/woocommerce-print-invoice-packing-list/
 *
 * @package   WC-Print-Invoices-Packing-Lists/Frontend
 * @author    SkyVerge
 * @copyright Copyright (c) 2011-2017, SkyVerge, Inc.
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3.0
 */

defined( 'ABSPATH' ) or exit;

/**
 * PIP Frontend class
 *
 * Handles frontend and customer facing features
 *
 * @since 3.0.0
 */
class WC_PIP_Frontend {


	/**
	 * Frontend constructor.
	 *
	 * @since 3.0.0
	 */
	public function __construct() {

		// add My Account actions
		add_filter( 'woocommerce_my_account_my_orders_actions', array( $this, 'my_orders_actions' ), 10, 2 );

		// add actions to My Account view order screen
		add_action( 'woocommerce_order_details_after_order_table', array( $this, 'view_order_action' ) );

		// add inline JS
		add_action( 'woocommerce_after_my_account', array( $this, 'enqueue_js' ) );

		// do not open the print dialog when viewing an invoice from My Account page
		add_filter( 'wc_pip_show_print_dialog', '__return_false' );
	}


	/**
	 * Get an array of valid order statuses
	 * for displaying an invoice in account pages
	 *
	 * @since 3.0.0
	 * @param WC_Order|null $order Optional order object passed in filter
	 * @return array
	 */
	public function get_invoice_order_statuses( $order = null ) {

		if ( SV_WC_Plugin_Compatibility::is_wc_version_gte_3_0() ) {
			$paid_statuses = wc_get_is_paid_statuses();
		} else {
			$paid_statuses = apply_filters( 'woocommerce_order_is_paid_statuses', array( 'processing', 'completed' ) );
		}

		/**
		 * Filters the order statuses valid to display an invoice to the customer on the My Account page.
		 *
		 * @since 3.0.0
		 * @param array $order_statuses Array of allowed order statuses
		 * @param WC_Order|null $order
		 */
		return apply_filters( 'wc_pip_my_account_invoice_order_statuses', $paid_statuses, $order );
	}


	/**
	 * Add HTML invoice button to My Orders in My Account page
	 * so customers can view and print their invoices
	 *
	 * @since 3.0.0
	 * @param array $actions Associative array of actions
	 * @param WC_Order $order Order object
	 * @return array Associative array of actions
	 */
	public function my_orders_actions( $actions, $order ) {

		// this checks if a user is logged in and if is allowed to view invoices
		if ( true !== wc_pip()->get_handler_instance()->customer_can_view_invoices() ) {
			return $actions;
		}

		if ( in_array( $order->get_status(), $this->get_invoice_order_statuses( $order ), true ) ) {

			$invoice = wc_pip()->get_document( 'invoice', array( 'order' => $order ) );

			if ( $invoice->has_invoice_number() ) {

				$actions['wc_pip_view_invoice'] = array(
					'url' => wp_nonce_url(
						add_query_arg( array(
							'wc_pip_action'   => 'print',
							'wc_pip_document' => 'invoice',
							'order_id'        => SV_WC_Order_Compatibility::get_prop( $order, 'id' ),
						) ),
						'wc_pip_document' ),
					'name' => __( 'View invoice', 'woocommerce-pip' ),
				);
			}
		}

		return $actions;
	}


	/**
	 * Print actions on single order screen
	 *
	 * @since 3.0.0
	 * @param int $order_id Order id
	 */
	public function view_order_action( $order_id ) {

		// this checks if a user is logged in and if is allowed to view invoices
		if ( true !== wc_pip()->get_handler_instance()->customer_can_view_invoices() ) {
			return;
		}

		$wc_order = wc_get_order( $order_id );

		if ( $wc_order && in_array( $wc_order->get_status(), $this->get_invoice_order_statuses( $wc_order ), true ) ) {

			$invoice = wc_pip()->get_document( 'invoice', array( 'order' => $wc_order ) );

			if ( ! $invoice || ! $invoice->has_invoice_number() ) {
				return;
			}

			$invoice_url = esc_url( $invoice->get_print_invoice_url() );
			$button      = '<a class="button wc_pip_view_invoice" target="_blank" href="' . $invoice_url . '">' . esc_html__( 'View Invoice', 'woocommerce-pip' ) . '</a><br><br>';

			/**
			 * Outputs the "View Invoice" button in order summary in frontend
			 *
			 * @since 3.1.1
			 * @param string $button Button HTML
			 * @param string $action 'print' or 'send_email' for button context
			 * @param string $invoice_url View invoice URL (escaped)
			 * @param \WC_PIP_Document_Invoice $invoice
			 */
			echo apply_filters( 'wc_pip_view_invoice_button_html', $button, 'print', $invoice_url, $invoice );
		}
	}


	/**
	 * Add inline script to the account page
	 *
	 * @since 3.0.0
	 */
	public function enqueue_js() {
		?>
		<script type="text/javascript">
			jQuery( document ).ready( function ( $ ) {
				$( '.wc_pip_view_invoice' ).attr( 'target', '_blank' );
			} );
		</script>
		<?php
	}


}