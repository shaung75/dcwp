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
 * @package   WC-Print-Invoices-Packing-Lists/Document/Pick-List
 * @author    SkyVerge
 * @copyright Copyright (c) 2011-2017, SkyVerge, Inc.
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3.0
 */

defined( 'ABSPATH' ) or exit;

/**
 * PIP Pick List for Shop Manager class
 *
 * Packing List document object for Shop Managers
 *
 * @since 3.0.0
 */
class WC_PIP_Document_Pick_List extends WC_PIP_Document_Packing_List {


	/** @var string Customer setting to output items in pick list by orders or categories */
	private $list_output_type;


	/**
	 * PIP Shop Manager Pick List document constructor
	 *
	 * @since 3.0.0
	 * @param array $args
	 */
	public function __construct( array $args ) {

		parent::__construct( $args );

		$this->type        = 'pick-list';
		$this->name        = __( 'Pick List', 'woocommerce-pip' );
		$this->name_plural = __( 'Pick Lists', 'woocommerce-pip' );

		$this->table_headers = array(
			'sku'      => __( 'SKU' , 'woocommerce-pip' ),
			'product'  => __( 'Product' , 'woocommerce-pip' ),
			'details'  => __( 'Details', 'woocommerce-pip' ),
			'quantity' => __( 'Quantity' , 'woocommerce-pip' ),
			/* translators: Placeholder: %s - weight measurement unit */
			'weight'   => sprintf( __( 'Total Weight (%s)' , 'woocommerce-pip' ), get_option( 'woocommerce_weight_unit' ) ),
			'id'       => '', // leave this blank
		);

		$this->column_widths = array(
			'sku'      => 18,
			'product'  => 30,
			'details'  => 25,
			'quantity' => 10,
			'weight'   => 17,
		);

		$this->show_shipping_address     = false;
		$this->show_billing_address      = false;
		$this->show_terms_and_conditions = false;
		$this->show_shipping_method      = false;
		$this->show_customer_note        = false;
		$this->show_customer_details     = false;
		$this->show_header               = false;
		$this->show_footer               = false;
		$this->hide_virtual_items        = 'yes' === get_option( 'wc_pip_pick_list_exclude_virtual_items', 'no' );
		$this->list_output_type          = get_option( 'wc_pip_pick_list_output_type', 'order' );

		// Remove invoice number from document title
		add_filter( 'wc_pip_document_title', array( $this, 'get_document_title' ), 100 );

		// Filter the Packing List table rows
		add_filter( 'wc_pip_document_table_row_cells', array( $this, 'filter_table_row_cells' ), 1, 5 );
	}


	/**
	 * Change the document title in template
	 *
	 * @since 3.0.0
	 * @return string
	 */
	public function get_document_title() {

		// Site name - Pick List (Today's date)
		return sprintf( esc_html( '%1$s - %2$s (%3$s)' ), get_bloginfo( 'name' ), esc_html( $this->name ), date_i18n( wc_date_format(), time() ) );
	}


	/**
	 * Set the packing list table body cells contents
	 *
	 * @since 3.0.0
	 * @param array $row Table row cells as an associative array
	 * @param string $type WC_PIP_Document type
	 * @param int $item_id Order item id
	 * @param array $item Order item
	 * @param WC_Product $product Product object
	 * @return array Table row cells
	 */
	public function filter_table_row_cells( $row, $type, $item_id, $item, $product ) {

		if ( 'pick-list' === $type ) {

			$row = array(
				'sku'      => $this->get_order_item_sku_html( $product, $item ),
				'product'  => $this->get_order_item_name_html( $product, $item ),
				'details'  => $this->get_order_item_meta_html( $item_id, $item, $product ),
				'quantity' => $this->get_order_item_quantity_html( $item_id, $item ),
				'weight'   => $this->get_order_item_weight_html( $item_id, $item, $product ),
				'id'       => $this->get_order_item_id_html( $item_id ),
			);
		}

		return $row;
	}


	/**
	 * Get an heading to insert in packing list table for grouping orders
	 *
	 * @see \WC_PIP_Document_Packing_List::add_table_rows_headings()
	 *
	 * @since 3.1.1
	 * @return array
	 */
	protected function add_table_order_heading() {

		$column_widths   = $this->get_column_widths();
		$shipping_method = $this->order->get_shipping_method();
		$edit_post_url   = get_edit_post_link( SV_WC_Order_Compatibility::get_prop( $this->order, 'id' ) );

		$heading = array(

			'headings' => array(

				'order-number'    => array(
					/* translators: Placeholders: %1$s - order number, %2$s - invoice number */
					'content' => sprintf( '<strong><a href="' . esc_url( $edit_post_url ). '" target="_blank">' . __( 'Order %1$s - Invoice %2$s', 'woocommerce-pip' ) . '</a></strong>', '#' . $this->order->get_order_number(), $this->get_invoice_number() ),
					'colspan' => ceil( count( $column_widths ) / 2 ),
				),

				'shipping-method' => array(
					'content' => '<em>' . ( $shipping_method ? $shipping_method : __( 'No shipping', 'woocommerce-pip' ) ) . '</em>',
					'colspan' => floor( count( $column_widths ) / 2 ),
				),
			),

			'items' => array(),
		);

		return $heading;
	}


	/**
	 * Get the document template HTML
	 *
	 * @since 3.0.0
	 * @param array $args
	 */
	public function output_template( $args = array() ) {

		if ( ! $this->order instanceof WC_Order ) {
			return;
		}

		$template_args = wp_parse_args( $args, array(
			'document'  => $this,
			'order'     => $this->order,
			'order_id'  => $this->order_id,
			'order_ids' => $this->order_ids,
			'type'      => $this->type,
		) );

		$original_order = $this->order;

		wc_pip()->get_template( 'head', $template_args );

		// this is a fallback for some customizations that might want to include a single order action for pick lists
		if ( empty( $this->order_ids ) && ! empty( $this->order_id ) ) {
			$order_ids                  = (array) $this->order_id;
			$template_args['order_ids'] = $order_ids;
		} else {
			$order_ids = $this->order_ids;
		}

		if ( ! empty( $order_ids ) ) {

			wc_pip()->get_template( 'content/order-table-before', $template_args );
			wc_pip()->get_template( 'content/order-table', $template_args );

			if ( 'order' === $this->group_items_by() ) {

				// documents for multiple orders
				foreach ( $order_ids as $order_id ) {

					$wc_order = wc_get_order( (int) $order_id );

					$template_args['order']    = $this->order = $wc_order;
					$template_args['order_id'] = $this->order_id = SV_WC_Order_Compatibility::get_prop( $wc_order, 'id' );

					if ( $wc_order ) {
						wc_pip()->get_template( 'content/order-table-items', $template_args );
					}
				}

			} else {

				wc_pip()->get_template( 'content/order-table-items', $template_args );
			}

			// Restore the original order
			$template_args['order']    = $this->order = $original_order;
			$template_args['order_id'] = $this->order_id = SV_WC_Order_Compatibility::get_prop( $original_order, 'id' );

			wc_pip()->get_template( 'content/order-table-after', $template_args );
		}

		wc_pip()->get_template( 'foot', $template_args );
	}


	/**
	 * Get pick list template output type whether items are grouped by orders or categories
	 *
	 * @since 3.3.0
	 * @return string
	 */
	public function group_items_by() {
		return $this->list_output_type;
	}


	/**
	 * Get pick list item SKU for grouped by category.
	 *
	 * @since 3.3.0
	 * @param array $item_data Order item data
	 * @return string HTML
	 */
	protected function get_category_items_sku_html( $item_data ) {

		$product = $item_data['product'];

		$sku_array = array();

		foreach ( $item_data['item'] as $item_id => $item ) {

			$sku = $product instanceof WC_Product ? $product->get_sku() : '';

			if ( ! empty( $item_data['orders'] ) ) {

				foreach ( $item_data['orders'] as $order ) {

					/* this filter is documented in /includes/abstract-wc-pip-document.php */
					$sku = apply_filters( 'wc_pip_order_item_sku', $sku, $item, $this->type, $product, $order );

					$sku_array[] = '<span class="sku">' . $sku . '</span>';
				}
			}
		}

		// returning final SKU html markup
		return implode( '<br />', array_unique( $sku_array ) );
	}


	/**
	 *  Get pick list item name for grouped by category.
	 *
	 * @since 3.3.0
	 * @param array $item_data Order item data
	 * @return string HTML
	 */
	protected function get_category_items_names_html( $item_data ) {

		$product = $item_data['product'];

		$has_product = $product instanceof WC_Product;

		$product_names = array();

		foreach ( $item_data['item'] as $item_id => $item ) {

			$wrapper_class = 'product product-name';
			$is_visible    = false;

			if ( $has_product ) {

				$product_name  = wp_strip_all_tags( $product->get_title() );
				$wrapper_class = $this->get_order_item_product_classes( $product, $item ) . ' ' . $wrapper_class;

				if ( $is_visible = $product->is_visible() ) {
					$product_name = sprintf( '<a href="%1$s" target="_blank">%2$s</a>', get_permalink( $product->get_id() ), $product_name );
				}

			} elseif ( is_array( $item ) && ! empty( $item['name'] ) ) {

				$product_name = wp_strip_all_tags( $item['name'] );
			}

			if ( ! empty( $item_data['orders'] ) ) {

				foreach ( $item_data['orders'] as $order ) {

					if ( isset( $product_name ) ) {

						/* this filter is documented in /includes/abstract-wc-pip-document.php */
						$product_name = apply_filters( 'wc_pip_order_item_name', $product_name, $item, $is_visible, $this->type, $product, $order );

						$product_name_html = '<span class="' . esc_attr( $wrapper_class ) . '">' . $product_name . '</span>';

					} else {

						$product_name_html = '<span class="product">&ndash;</span>';
					}

					$product_names[] = $product_name_html;
				}
			}
		}

		// returning final product names html markup
		return implode( '<br />', array_unique( $product_names ) );
	}


	/**
	 * Get pick list item meta for grouped by category.
	 *
	 * @since 3.3.0
	 * @param array $item_data Order item data
	 * @return string HTML
	 */
	protected function get_category_items_meta_html( $item_data ) {

		$product = $item_data['product'];

		$items_meta_html_array = array();

		foreach ( $item_data['item'] as $item_id => $item ) {

			$has_product   = $product instanceof WC_Product;
			$wrapper_class = 'product-meta';

			if ( $has_product ) {
				$wrapper_class = $this->get_order_item_product_classes( $product, $item ) . ' ' . $wrapper_class;
			}

			if ( ! empty( $item_data['orders'] ) ) {

				/* @type \WC_Order $order */
				foreach ( $item_data['orders'] as $order ) {

					$item_meta_html = '<div class="' . esc_attr( $wrapper_class ) . '">';

					ob_start();

					/* this action is documented in /includes/abstract-wc-pip-document.php */
					do_action( 'wc_pip_order_item_meta_start', $item_id, $item, $order );

					$item_meta_html .= ob_get_clean() . $this->get_order_item_meta( $item_id, $item, $product );

					ob_start();

					/* this action is documented in /includes/abstract-wc-pip-document.php */
					do_action( 'wc_pip_order_item_meta_end', $item_id, $item, $order );

					$item_meta_html .= ob_get_clean();

					/* this filter is documented in /includes/abstract-wc-pip-document.php */
					$show_purchase_note = (bool) apply_filters( 'wc_pip_order_item_meta_show_purchase_note', true, $this->type, $product );

					if ( $has_product && true === $show_purchase_note && $order->is_paid() ) {

						$purchase_note = SV_WC_Product_Compatibility::get_meta( $product, '_purchase_note', true );

						$item_meta_html .= ! empty( $purchase_note ) ? '<br><blockquote>' . wpautop( do_shortcode( wp_kses_post( $purchase_note ) ) ) . '</blockquote>' : '';
					}

					$item_meta_html .= '</div>';

					/* this filter is documented in /includes/abstract-wc-pip-document.php */
					$items_meta_html_array[] = apply_filters( 'wc_pip_order_item_meta', $item_meta_html, $item_id, $item, $this->type, $order );
				}
			}
		}

		// returning final items meta html markup
		return implode( '<br />', array_unique( $items_meta_html_array ) );
	}


	/**
	 * Get pick list item quantity for grouped by category.
	 *
	 * @since 3.3.0
	 * @param array $item_data Order item data
	 * @return string HTML
	 */
	protected function get_category_items_total_quantity_html( $item_data ) {

		$item_quantity   = 0;
		$refund_quantity = 0;

		foreach ( $item_data['item'] as $item_id => $item ) {

			$item_quantity += isset( $item['qty'] ) ? max( 0, (int) $item['qty'] ) : 0;

			if ( $this->has_refunds && ( $order = isset( $item['order_id'] ) ? wc_get_order( (int) $item['order_id'] ) : null ) ) {
				// use absolute value since WC used negative integers prior to 3.0, but positive int in WC 3.0+
				$refund_quantity += absint( $order->get_qty_refunded_for_item( $item_id ) );
			}
		}

		if ( $refund_quantity > 0 ) {
			$refund_quantity      = $item_quantity - $refund_quantity;
			$items_total_quantity = '<span class="quantity"><del>' . $item_quantity . '</del></span> <span class="refund-quantity">' . $refund_quantity . '</span>';
		} else {
			$items_total_quantity = '<span class="quantity">' . $item_quantity . '</span>';
		}

		return $items_total_quantity;
	}


	/**
	 * Get total weight of pick list items grouped by category.
	 *
	 * @since 3.3.0
	 * @param array $item_data Order item data
	 * @return string HTML
	 */
	protected function get_category_items_total_weight_html( $item_data ) {

		$product = $item_data['product'];

		$total_weight   = 0;
		$product_weight = SV_WC_Product_Compatibility::get_prop( $product, 'weight', 'view' );

		if ( is_numeric( $product_weight ) ) {

			foreach ( $item_data['item'] as $item_id => $item ) {

				$item_quantity   = isset( $item['qty'] ) ? max( 0, (int) $item['qty'] ) : 0;
				$refund_quantity = 0;

				if ( $this->has_refunds && ( $order = isset( $item['order_id'] ) ? wc_get_order( $item['order_id'] ) : null ) ) {
					$refund_quantity = absint( $order->get_qty_refunded_for_item( $item_id ) );
				}

				if ( ! empty( $item_data['orders'] ) ) {

					foreach ( $item_data[ 'orders' ] as $order ) {

						/* this filter is documented in /includes/abstract-wc-pip-document.php */
						$item_weight = apply_filters( 'wc_pip_order_item_weight', max( 0, (float) ( $product_weight * max( 0, $item_quantity - $refund_quantity ) ) ), $item_id, $item, $product, $order );

						$total_weight += $item_weight;
					}
				}
			}
		}

		return '<span class="weight">' . $total_weight . '</span>';
	}


	/**
	 * Get document table body's rows for pick list items grouped by category.
	 *
	 * This is generally a list of pick list items grouped by category.
	 *
	 * @since 3.3.0
	 *
	 * @return array
	 */
	private function get_category_table_rows() {

		$cat_table_rows = array();

		foreach ( $this->order_ids as $order_id ) {

			$this->order = wc_get_order( (int) $order_id );

			if ( $this->order && $this->get_items_count() > 0 ) {

				/** @var array|\WC_Order_Item_Product[] $items product items according to WC version */
				$items = $this->order->get_items();

				foreach ( $items as $item_id => $item ) {

					$product_id = isset( $item['variation_id'] ) && (int) $item['variation_id'] > 0 ? (int) $item['variation_id'] : ( isset( $item['product_id'] ) ? (int) $item['product_id'] : 0 );
					$product    = wc_get_product( $product_id );

					// store $product_id to use for grouping items by category for pick list
					$actual_id = $product_id;

					// skip any invalid or hidden items
					if ( ! $product || $this->maybe_hide_virtual_item( $item ) ) {
						continue;
					}

					$product_id = $product->is_type( 'variation' ) ? SV_WC_Product_Compatibility::get_parent( $product )->get_id() : $product->get_id();

					$product_categories = wc_get_product_terms( $product_id, 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) );

					/**
					 * Force a product to be grouped as uncategorized.
					 *
					 * @since 3.3.0
					 *
					 * @param bool $group_as_uncategorized whether to force group a product as uncategorized (default false)
					 * @param array $item the order item being grouped
					 * @param \WC_Order $order the order the item belongs to
					 */
					$group_as_uncategorized = apply_filters( 'wc_pip_pick_list_group_item_as_uncategorized', false, $item, $this->order );

					if ( $group_as_uncategorized || is_wp_error( $product_categories ) || empty( $product_categories[0] ) ) {

						$key = '0';

					} else {

						// we necessarily have to pick one individual category to build breadcrumbs later
						$child_category  = $product_categories[0];
						// get the top most parent as it will appear first in breadcrumbs later (left to right hierarchy)
						$parent_category = $this->get_parent_category( $child_category );
						// parent is used for indexing, child for pretty breadcrumbs later
						$key = $parent_category->name . ' |pip| ' . $child_category->name;
					}

					$formatted_meta = array();

					if ( SV_WC_Plugin_Compatibility::is_wc_version_gte_3_1() ) {

						$object_meta = $item->get_formatted_meta_data( '_', true );

						foreach ( $object_meta as $meta_id => $meta_object ) {

							if ( ! empty( $meta_object->key ) ) {

								$formatted_meta[] = array(
									'key'           => $meta_object->key,
									'value'         => $meta_object->value,
									'label'         => $meta_object->display_key,
									'display_key'   => $meta_object->display_key,
									'display_value' => $meta_object->display_value,
								);
							}
						}

					} else {

						$item_meta      = new WC_Order_Item_Meta( $item );
						$formatted_meta = $item_meta->get_formatted();
					}

					// counter to store multiple orders in category array
					$order_counter = 0;

					// set default meta key as actual product id for grouping items by category for pick list
					$meta_key = "{$actual_id}_";

					// generate unique meta key based on item meta key-value pair for grouping items by category for pick list
					if ( ! empty( $formatted_meta ) ) {

						foreach ( $formatted_meta as $meta_values ) {

							$meta_key .= trim( $meta_values['key'] ) . '_' . trim( $meta_values['value'] ) . '_';
						}
					}

					$meta_key = rtrim( $meta_key, '_' );

					if ( ! empty( $cat_table_rows[ $key ][ $meta_key ]['orders'] ) ) {
						$order_counter++;
					}

					$cat_table_rows[ $key ][ $meta_key ]['orders'][ $order_counter ] = $this->order;
					$cat_table_rows[ $key ][ $meta_key ]['item'][ $item_id ]         = $item;
					$cat_table_rows[ $key ][ $meta_key ]['product']                  = SV_WC_Plugin_Compatibility::is_wc_version_gte_3_0() ? $item->get_product() : $this->order->get_product_from_item( $item );
				}
			}
		}

		/** This filter is documented in includes/abstract-wc-pip-document.php */
		$sort_alphabetically = apply_filters( 'wc_pip_document_sort_order_items_alphabetically', true, SV_WC_Order_Compatibility::get_prop( $this->order, 'id' ), $this->type );

		// sort category groups alphabetically
		if ( false !== $sort_alphabetically ) {
			ksort( $cat_table_rows );
		}

		$new_table_rows = array();

		if ( ! empty( $cat_table_rows ) ) {

			$i = 0;

			foreach ( $cat_table_rows as $term_name => $data ) {

				$items = array();
				$j     = 0;

				foreach ( $data as $item_data ) {

					if ( ! empty( $item_data['item'] ) ) {

						$items[ $j ]['sku']      = $this->get_category_items_sku_html( $item_data );
						$items[ $j ]['product']  = $this->get_category_items_names_html( $item_data );
						$items[ $j ]['details']  = $this->get_category_items_meta_html( $item_data );
						$items[ $j ]['quantity'] = $this->get_category_items_total_quantity_html( $item_data );
						$items[ $j ]['weight']   = $this->get_category_items_total_weight_html( $item_data );

						$j++;
					}
				}

				// sort items within categories as well
				if ( false !== $sort_alphabetically ) {
					usort( $items, array( $this, 'sort_order_items_by_column_key' ) );
				}

				$new_table_rows[ $i ] = array(
					'headings' => array(
						'breadcrumbs' => array(
							'content' => $this->get_table_order_items_group_breadcrumb( $term_name ),
							'colspan' => count( $this->get_column_widths() ),
						),
					),
					'items'    => $items,
				);

				$i++;
			}
		}

		return $new_table_rows;
	}


	/**
	 * Get document table body's rows.
	 *
	 * This is generally a list of order items.
	 *
	 * @since 3.3.0
	 *
	 * @return array
	 */
	public function get_table_rows() {

		if ( 'category' === $this->group_items_by() ) {

			return $this->get_category_table_rows();
		}

		return parent::get_table_rows();
	}


}
