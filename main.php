add_filter( 'woocommerce_get_terms_and_conditions_checkbox_text', 'custom_terms_and_conditions_text' );

function custom_terms_and_conditions_text( $text ) {

	if ( ! WC()->cart || WC()->cart->is_empty() ) {
		return $text;
	}

	$product_titles = array();

	foreach ( WC()->cart->get_cart() as $item ) {

		$product_name = wp_strip_all_tags( $item['data']->get_name() );

		if ( ! empty( $product_name ) ) {
			$product_titles[] = '<u>' . esc_html( $product_name ) . '</u>';
		}
	}

	if ( empty( $product_titles ) ) {
		return $text;
	}

	$product_count = count( $product_titles );

	if ( 1 === $product_count ) {
		$product_titles_text = $product_titles[0];
		$product_word = 'محصول';
	} else {
		$product_titles_text = implode( ' و ', $product_titles );
		$product_word = 'محصولات';
	}

	$store_name = get_bloginfo( 'name' );

	return sprintf(
		'من [terms] %s و %s %s را مطالعه کرده و می‌پذیرم.',
		esc_html( $store_name ),
		$product_word,
		$product_titles_text
	);
}
