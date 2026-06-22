<?php
/**
 * Plugin Name: WooCommerce Dynamic Terms Products
 * Plugin URI: https://github.com/amirrezashf/woocommerce-dynamic-terms-products
 * Description: Dynamically displays product names inside the WooCommerce terms and conditions checkbox text during checkout.
 * Version: 1.0.0
 * Author: Amirreza Shayesteh Far
 * Author URI: https://amirrezaa.ir/
 * Text Domain: wc-dynamic-terms-products
 * Requires Plugins: woocommerce
 * Requires at least: 6.0
 * Requires PHP: 7.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class WCDTP_Dynamic_Terms_Products {

	const VERSION = '1.0.0';

	public function __construct() {
		add_filter(
			'woocommerce_get_terms_and_conditions_checkbox_text',
			array( $this, 'modify_terms_text' ),
			10,
			1
		);
	}

	/**
	 * Modify checkout terms text.
	 */
	public function modify_terms_text( $text ) {

		if ( ! function_exists( 'WC' ) ) {
			return $text;
		}

		if ( ! WC()->cart || WC()->cart->is_empty() ) {
			return $text;
		}

		$product_titles = array();

		foreach ( WC()->cart->get_cart() as $item ) {

			if ( empty( $item['data'] ) ) {
				continue;
			}

			$product_name = wp_strip_all_tags(
				$item['data']->get_name()
			);

			if ( empty( $product_name ) ) {
				continue;
			}

			$product_titles[] = sprintf(
				'<u>%s</u>',
				esc_html( $product_name )
			);
		}

		if ( empty( $product_titles ) ) {
			return $text;
		}

		$product_count = count( $product_titles );

		if ( 1 === $product_count ) {
			$product_word = 'محصول';
			$product_list = $product_titles[0];
		} else {
			$product_word = 'محصولات';
			$product_list = implode( ' و ', $product_titles );
		}

		$store_name = get_bloginfo( 'name' );

		return sprintf(
			'من [terms] %s و %s %s را مطالعه کرده و می‌پذیرم.',
			esc_html( $store_name ),
			$product_word,
			$product_list
		);
	}
}

new WCDTP_Dynamic_Terms_Products();
