<?php
/**
 * @package 	WordPress
 * @subpackage 	Cosmetista
 * @version 	1.0.0
 * 
 * WooCommerce Colors Rules
 * Created by CMSMasters
 * 
 */


function cosmetista_woocommerce_colors($custom_css) {
	$cmsmasters_option = cosmetista_get_global_options();
	
	
	$cmsmasters_color_schemes = cmsmasters_color_schemes_list();
	
	
	foreach ($cmsmasters_color_schemes as $scheme => $title) {
		$rule = (($scheme != 'default') ? "html .cmsmasters_color_scheme_{$scheme} " : '');
		
		
		$custom_css .= "
/***************** Start {$title} WooCommerce Color Scheme Rules ******************/

	/* Start Main Content Font Color */  
	{$rule}.select2-container .select2-choice, 
	{$rule}.select2-container.select2-drop-above .select2-choice, 
	{$rule}.select2-container.select2-container-active .select2-choice, 
	{$rule}.select2-container.select2-container-active.select2-drop-above .select2-choice, 
	{$rule}.select2-drop.select2-drop-active, 
	{$rule}.select2-drop.select2-drop-above.select2-drop-active,
	{$rule}.select2-container .select2-selection--single .select2-selection__rendered {
		" . cmsmasters_color_css('color', $cmsmasters_option['cosmetista' . '_' . $scheme . '_color']) . "
	}
	/* Finish Main Content Font Color */
	
	
	/* Start Primary Color */
	{$rule}.cmsmasters_products .product.product-category .woocommerce-loop-category__title:hover,
	{$rule}.cmsmasters_products .product.product-category .woocommerce-loop-category__title .count,
	{$rule}.cmsmasters_product .cmsmasters_product_title a:hover, 
	{$rule}.cmsmasters_single_product .cmsmasters_product_cat a:hover, 
	{$rule}.cmsmasters_product .cmsmasters_product_cat a:hover, 
	{$rule}.required, 
	{$rule}.shop_table.woocommerce-checkout-review-order-table .cart-subtotal th, 
	{$rule}.shop_table.woocommerce-checkout-review-order-table .cart-subtotal td, 
	{$rule}.shop_table.woocommerce-checkout-review-order-table .product-name strong, 
	{$rule}.shop_table.order_details tfoot tr:last-child th, 
	{$rule}.shop_table.order_details tfoot tr:last-child td, 
	{$rule}.shop_table.order_details .product-name strong, 
	{$rule}.shop_table.order_details tfoot tr:first-child th, 
	{$rule}.shop_table.order_details tfoot tr:first-child td,
	{$rule}.woocommerce-store-notice .woocommerce-store-notice__dismiss-link {
		" . cmsmasters_color_css('color', $cmsmasters_option['cosmetista' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cart_totals .cart-subtotal th,
	{$rule}.cart_totals .cart-subtotal td,
	{$rule}.cmsmasters_dynamic_cart .widget_shopping_cart_content .button, 
	{$rule}.input-checkbox + label:after, 
	{$rule}.input-radio + label:after, 
	{$rule}input.shipping_method + label:after, 
	{$rule}.widget_price_filter .ui-slider-handle, 
	{$rule}.widget_price_filter .ui-slider-range,
	{$rule}.woocommerce-store-notice {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['cosmetista' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cart_totals .cart-subtotal th,
	{$rule}.cart_totals .cart-subtotal td,
	{$rule}.cmsmasters_dynamic_cart .widget_shopping_cart_content .button {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['cosmetista' . '_' . $scheme . '_link']) . "
	}
	/* Finish Primary Color */
	
	
	/* Start Highlight Color */
	{$rule}.cmsmasters_single_product .price del,
	{$rule}.cmsmasters_single_product .cmsmasters_product_cat,
	{$rule}.cmsmasters_product .price del, 
	{$rule}.cmsmasters_product .cmsmasters_product_cat, 
	{$rule}.widget_rating_filter ul li a:hover, 
	{$rule}.widget_layered_nav ul li a:hover, 
	{$rule}.widget_layered_nav ul li.chosen a, 
	{$rule}.widget_layered_nav_filters ul li a:hover, 
	{$rule}.widget_layered_nav_filters ul li.chosen a, 
	{$rule}.widget_product_categories ul li a:hover, 
	{$rule}.widget_product_categories ul li.current-cat a, 
	{$rule}.shop_table a:not(.button):hover, 
	{$rule}#page .remove:hover, 
	{$rule}.widget_shopping_cart .cart_list a:hover, 
	{$rule}.cmsmasters_dynamic_cart .widget_shopping_cart_content .cart_list a:hover, 
	{$rule}.widget > .product_list_widget a:hover {
		" . cmsmasters_color_css('color', $cmsmasters_option['cosmetista' . '_' . $scheme . '_hover']) . "
	}
	
	{$rule}.widget_product_tag_cloud a:hover {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['cosmetista' . '_' . $scheme . '_hover']) . "
	}
	
	{$rule}.widget_product_tag_cloud a:hover, 
	{$rule}.select2-drop.select2-drop-active, 
	{$rule}.select2-drop.select2-drop-above.select2-drop-active,
	{$rule}.select2-container.select2-container--open .select2-selection--single,
	{$rule}.select2-container.select2-container--focus .select2-selection--single,
	{$rule}.select2-container.select2-container-active .select2-choice, 
	{$rule}.select2-container.select2-container-active.select2-drop-above .select2-choice, 
	{$rule}.link_hover_color {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['cosmetista' . '_' . $scheme . '_hover']) . "
	}
	/* Finish Highlight Color */
	
	
	/* Start Headings Color */
	{$rule}.comment-form-rating .stars > span a:hover, 
	{$rule}.comment-form-rating .stars > span a.active, 
	{$rule}.cmsmasters_single_product .price, 
	{$rule}.cmsmasters_single_product .price ins,
	{$rule}.cmsmasters_product .price, 
	{$rule}.cmsmasters_product .price ins,
	{$rule}.cmsmasters_star_rating .cmsmasters_star_color_wrap, 
	{$rule}.widget_product_tag_cloud a,
	{$rule}.widget_shopping_cart .total strong,
	{$rule}.cmsmasters_added_product_info_text,
	{$rule}.shop_table.woocommerce-checkout-review-order-table td.product-name,
	{$rule}.cmsmasters_dynamic_cart .widget_shopping_cart_content .cart_list a,
	{$rule}.cmsmasters_dynamic_cart .widget_shopping_cart_content .total strong,
	{$rule}.cmsmasters_dynamic_cart .widget_shopping_cart_content .button:hover,
	{$rule}.cmsmasters_product .cmsmasters_product_cat a, 
	{$rule}.cmsmasters_single_product .cmsmasters_product_cat a,
	{$rule}.woocommerce-info, 
	{$rule}.woocommerce-message, 
	{$rule}.woocommerce-error li, 
	{$rule}#page .remove, 
	{$rule}.cmsmasters_woo_wrap_result .woocommerce-result-count, 
	{$rule}.cmsmasters_single_product .product_meta, 
	{$rule}.shop_attributes th, 
	{$rule}.shop_table a:not(.button), 
	{$rule}.cart_totals table, 
	{$rule}ul.order_details strong, 
	{$rule}.widget_rating_filter ul li a, 
	{$rule}.widget_layered_nav ul li a, 
	{$rule}.widget_layered_nav_filters ul li a, 
	{$rule}.widget_product_categories ul li a, 
	{$rule}.widget > .product_list_widget a, 
	{$rule}.widget_shopping_cart .cart_list a,
	{$rule}ul.order_details,
	{$rule}.woocommerce table thead tr th {
		" . cmsmasters_color_css('color', $cmsmasters_option['cosmetista' . '_' . $scheme . '_heading']) . "
	}
	
	{$rule}.out-of-stock {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['cosmetista' . '_' . $scheme . '_heading']) . "
	}
	
	{$rule}.cmsmasters_product .cmsmasters_product_add_wrap {
		background-color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['cosmetista' . '_' . $scheme . '_heading']) . ", 0.05);
	}
	/* Finish Headings Color */
	
	
	/* Start Main Background Color */
	{$rule}.woocommerce-store-notice, 
	{$rule}.woocommerce-store-notice p a, 
	{$rule}.woocommerce-store-notice p a:hover, 
	{$rule}.widget_product_tag_cloud a:hover,
	{$rule}.cart_totals .cart-subtotal th,
	{$rule}.cart_totals .cart-subtotal td,
	{$rule}.cmsmasters_dynamic_cart .widget_shopping_cart_content .button {
		" . cmsmasters_color_css('color', $cmsmasters_option['cosmetista' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.select2-container .select2-selection--single,
	{$rule}.select2-container .select2-selection--single,
	{$rule}.widget_product_tag_cloud a,
	{$rule}.cmsmasters_added_product_info, 
	{$rule}.woocommerce-checkout-payment .payment_methods .payment_box, 
	{$rule}.input-checkbox + label:before, 
	{$rule}.input-radio + label:before, 
	{$rule}input.shipping_method + label:before, 
	{$rule}.woocommerce-checkout-payment, 
	{$rule}.select2-drop.select2-drop-active, 
	{$rule}.select2-drop.select2-drop-above.select2-drop-active, 
	{$rule}.select2-container .select2-choice, 
	{$rule}.select2-container.select2-drop-above .select2-choice, 
	{$rule}.select2-container.select2-container-active .select2-choice, 
	{$rule}.select2-container.select2-container-active.select2-drop-above .select2-choice, 
	{$rule}.woocommerce-info, 
	{$rule}.woocommerce-message, 
	{$rule}.woocommerce-error, 
	{$rule}.cmsmasters_dynamic_cart .widget_shopping_cart_content .button:hover,
	{$rule}.woocommerce-store-notice .woocommerce-store-notice__dismiss-link,
	{$rule}.shop_table.order_details tfoot tr:last-child th, 
	{$rule}.shop_table.order_details tfoot tr:last-child td,
	{$rule}.woocommerce table thead tr th {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['cosmetista' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_product_category_shortcode.puzzle .cmsmasters_products .cmsmasters_product .cmsmasters_product_inner {
		background-color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['cosmetista' . '_' . $scheme . '_bg']) . ", 0.95);
	}
	/* Finish Main Background Color */
	
	
	/* Start Alternate Background Color */
	{$rule}.onsale, 
	{$rule}.out-of-stock, 
	{$rule}.stock {
		" . cmsmasters_color_css('color', $cmsmasters_option['cosmetista' . '_' . $scheme . '_alternate']) . "
	}

	{$rule}.woocommerce-checkout-payment .payment_methods .payment_box {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['cosmetista' . '_' . $scheme . '_alternate']) . "
	}
	/* Finish Alternate Background Color */
	
	
	/* Start Borders Color */
	{$rule}.cmsmasters_star_rating .cmsmasters_star_trans_wrap, 
	{$rule}.comment-form-rating .stars > span {
		" . cmsmasters_color_css('color', $cmsmasters_option['cosmetista' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.widget_price_filter .price_slider, 
	{$rule}.cmsmasters_woo_tabs:before, 
	{$rule}div.products:before {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['cosmetista' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}section.products,
	{$rule}.widget_product_tag_cloud a,
	{$rule}.widget_rating_filter ul li, 
	{$rule}.widget_layered_nav ul li, 
	{$rule}.widget_layered_nav_filters ul li, 
	{$rule}.widget_product_categories ul li,
	{$rule}.cmsmasters_added_product_info, 
	{$rule}.woocommerce-checkout-payment .payment_methods .payment_box, 
	{$rule}.woocommerce-checkout-payment, 
	{$rule}.woocommerce-info, 
	{$rule}.woocommerce-message, 
	{$rule}.woocommerce-error, 
	{$rule}.cmsmasters_dynamic_cart .widget_shopping_cart_content .button:hover,
	{$rule}.cmsmasters_product_category_shortcode.puzzle .cmsmasters_products .cmsmasters_product .cmsmasters_product_add_inner, 
	{$rule}.select2-container .select2-choice, 
	{$rule}.select2-container.select2-drop-above .select2-choice, 
	{$rule}.input-checkbox + label:before, 
	{$rule}.input-radio + label:before, 
	{$rule}input.shipping_method + label:before, 
	{$rule}.shop_table td, 
	{$rule}.cart_totals table th, 
	{$rule}.cart_totals table td, 
	{$rule}.shop_table .cart_item,
	{$rule}.select2-dropdown,
	{$rule}.select2-container .select2-selection--single,
	{$rule}table thead tr th,
	{$rule}ul.order_details {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['cosmetista' . '_' . $scheme . '_border']) . "
	}
	
	@media only screen and (max-width: 768px) {
		{$rule}.shop_table.cart {
			" . cmsmasters_color_css('border-color', $cmsmasters_option['cosmetista' . '_' . $scheme . '_border']) . "
		}
	}
	/* Finish Borders Color */

/***************** Finish {$title} WooCommerce Color Scheme Rules ******************/

";
	}
	
	
	return $custom_css;
}

add_filter('cosmetista_theme_colors_secondary_filter', 'cosmetista_woocommerce_colors');

