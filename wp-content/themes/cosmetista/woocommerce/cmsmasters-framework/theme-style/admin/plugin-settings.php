<?php
/**
 * @package 	WordPress
 * @subpackage 	Cosmetista
 * @version 	1.0.0
 *
 * CMSMasters WooCommerce Admin Settings
 * Created by CMSMasters
 *
 */


/* Single Settings */
function cosmetista_woocommerce_options_general_fields($options, $tab) {
	$defaults = cosmetista_settings_general_defaults();

	if ($tab == 'header') {
		$options[] = array(
			'section' => 'header_section',
			'id' => 'cosmetista' . '_woocommerce_cart_dropdown',
			'title' => esc_html__('Disable WooCommerce Cart', 'cosmetista'),
			'desc' => '',
			'type' => 'checkbox',
			'std' => $defaults[$tab]['cosmetista' . '_woocommerce_cart_dropdown']
		);
	}

	return $options;
}

add_filter('cmsmasters_options_general_fields_filter', 'cosmetista_woocommerce_options_general_fields', 10, 2);

