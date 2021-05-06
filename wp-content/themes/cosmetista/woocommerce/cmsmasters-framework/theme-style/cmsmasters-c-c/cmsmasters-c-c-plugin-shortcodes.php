<?php
/**
 * @package 	WordPress
 * @subpackage 	Cosmetista
 * @version 	1.0.0
 * 
 * WooCommerce Content Composer Shortcodes
 * Created by CMSMasters
 * 
 */


function cosmetista_woocommerce_shortcodes($shortcodes) {
	$shortcodes[] = 'cmsmasters_products';
	
	$shortcodes[] = 'cmsmasters_selected_products';
	
	$shortcodes[] = 'cmsmasters_product_category';
	
	
	return $shortcodes;
}

add_filter('cmsmasters_custom_shortcodes_filter', 'cosmetista_woocommerce_shortcodes');


/**
 * Products
 */
function cmsmasters_products($atts, $content = null) {
	extract(shortcode_atts(array( 
		'shortcode_id' => 			'', 
		'products_shortcode' => 	'recent_products', 
		'orderby' => 				'date', 
		'order' => 					'DESC', 
		'count' => 					'10', 
		'columns' => 				'4', 
		'classes' => 				'' 
	), $atts));
	
	
    $out = '<div class="cmsmasters_products_shortcode' . ' cmsmasters_' . $products_shortcode . 
	(($classes != '') ? ' ' . $classes : '') . 
	'">';
	
	
	if (!is_admin()) {
		$out .= do_shortcode('[' . $products_shortcode . ' ' . (($products_shortcode != 'best_selling_products' && $products_shortcode != 'top_rated_products') ? 'orderby="' . $orderby . '" order="' . $order . '" ' : '') . 'limit="' . $count . '" columns="' . $columns . '"]');
	}
	
	
	$out .= '</div>';
	
	
	return $out;
}



/**
 * Selected Products
 */
function cmsmasters_selected_products($atts, $content = null) {
	extract(shortcode_atts(array( 
		'shortcode_id' => 			'', 
		'orderby' => 				'date', 
		'order' => 					'DESC', 
		'ids' => 					'', 
		'columns' => 				'4', 
		'classes' => 				'' 
	), $atts));
	
	
    $out = '<div class="cmsmasters_selected_products_shortcode' . 
	(($classes != '') ? ' ' . $classes : '') . 
	'">';
	
	
	if (!is_admin()) {
		$out .= do_shortcode('[products orderby="' . $orderby . '" order="' . $order . '" columns="' . $columns . '" ids="' . $ids . '"]');
	}
	
	
	$out .= '</div>';
	
	
	return $out;
}



/**
 * Products Category
 */
function cmsmasters_product_category($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_product_category_atts_filter', array( 
		'shortcode_id' => 			'', 
		'layout' => 				'grid', 
		'columns' => 				'4', 
		'count' => 					'4', 
		'category' => 				'', 
		'orderby' => 				'date', 
		'order' => 					'DESC', 
		'product_metadata' => 		'categories,title,rating,price', 
		'classes' => 				'' 
    ) );
	
	
	$shortcode_name = 'product-category';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (cosmetista_locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = $shortcode_id;
	
	
	$product_category_atts = array(
		'cmsmasters_product_layout' => 		$layout, 
		'cmsmasters_product_metadata' => 	$product_metadata 
	);
	
	$args = array( 
		'ignore_sticky_posts' => 	1, 
		'orderby' => 				$orderby, 
		'order' => 					$order, 
		'posts_per_page' => 		$count 
	);
	
	
	if ($category != '') {
		$cat_array = explode(",", $category);
		
		$args['tax_query'] = array(
			array( 
				'taxonomy' => 	'product_cat', 
				'field' => 		'slug', 
				'terms' => 		$cat_array 
			)
		);
	} else {
		$args['post_type'] = 'product';
	}
	
	
	$query = new WP_Query($args);
	
	
	$out = '';
	
	
	if ($query->have_posts()) : 
	
		$out .= '<div id="cmsmasters_product_category_shortcode_' . esc_attr($unique_id) . '" class="cmsmasters_product_category_shortcode ' . esc_attr($layout) . 
		(($classes != '') ? ' ' . $classes : '') . '"' . 
			' data-layout="' . esc_attr($layout) . '"' . 
			' data-url="' . CMSMASTERS_CONTENT_COMPOSER_URL . '"' . 
			' data-categories="' . esc_attr($category) . '"' . 
			' data-orderby="' . esc_attr($orderby) . '"' . 
			' data-order="' . esc_attr($order) . '"' . 
			' data-metadata="' . esc_attr($product_metadata) . '"' . 
		'>';
		
			$out .= '<div class="woocommerce">' . 
				'<ul class="products cmsmasters_products' . (($layout == 'grid') ? ' columns-' . $columns : '') . '" category="' . $category . '" orderby="' . $orderby . '" order="' . $order . '">';
			
			
					while ($query->have_posts()) : $query->the_post();
						
						$out .= cmsmasters_composer_ob_load_template('woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/templates/content-product-category.php', $product_category_atts);
						
					endwhile;
					
				$out .= '</ul>' . 
			'</div>';
			
			
		$out .= '</div>';
		
	endif;
	
	
	wp_reset_postdata();
	
	
	return $out;
}
