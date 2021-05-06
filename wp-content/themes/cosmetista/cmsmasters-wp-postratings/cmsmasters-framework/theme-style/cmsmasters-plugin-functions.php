<?php
/**
 * @package 	WordPress
 * @subpackage 	Cosmetista
 * @version		1.0.2
 * 
 * WP-PostRating Functions
 * Created by CMSMasters
 * 
 */


/* Load Parts */
require_once(get_template_directory() . '/cmsmasters-wp-postratings/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/admin/plugin-settings.php');
require_once(get_template_directory() . '/cmsmasters-wp-postratings/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/admin/plugin-options.php');


/* Register CSS Styles and Scripts */
function cosmetista_cmsmasters_rating_register_styles_scripts() {
	
	// WP-PostRating styles
	wp_enqueue_style('theme-cmsmasters-rating-style', get_template_directory_uri() . '/cmsmasters-wp-postratings/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/css/plugin-style.css', array(), '1.0.0', 'screen');
}

add_action('wp_enqueue_scripts', 'cosmetista_cmsmasters_rating_register_styles_scripts');



// WP Post Ratings Override plugin images, from plugin source
function cosmetista_cmsmasters_rating_deregister_script() {
	$postratings_max = intval(get_option('postratings_max'));
	$postratings_ajax_style = get_option('postratings_ajax_style');
	$postratings_custom = intval(get_option('postratings_customrating'));
	
	
	if ($postratings_custom) {
		for($i = 1; $i <= $postratings_max; $i++) {
			$postratings_javascript .= 'var ratings_' . $i . '_mouseover_image=new Image();ratings_' . $i . '_mouseover_image.src=ratingsL10n.plugin_url+"/images/"+ratingsL10n.image+"/rating_' . $i . '_over."+ratingsL10n.image_ext;';
		}
	} else {
		$postratings_javascript = 'var ratings_mouseover_image=new Image();ratings_mouseover_image.src=ratingsL10n.plugin_url+"/images/"+ratingsL10n.image+"/rating_over."+ratingsL10n.image_ext;';
	}
	
	
	wp_dequeue_script('wp-postratings');
	
	wp_enqueue_script('wp-postratings', plugins_url('wp-postratings/js/postratings-js.js'), array('jquery'), WP_POSTRATINGS_VERSION, true);
	
	wp_localize_script('wp-postratings', 'ratingsL10n', array(
		'plugin_url'		=> get_template_directory_uri() . '/cmsmasters-wp-postratings/cmsmasters-framework/theme-style',
		'ajax_url' 			=> admin_url('admin-ajax.php'),
		'text_wait'			=> esc_html__('Please rate only 1 post at a time.', 'cosmetista'),
		'image'				=> get_option('postratings_image'),
		'image_ext' 		=> 'png',
		'max' 				=> $postratings_max,
		'show_loading' 		=> intval($postratings_ajax_style['loading']),
		'show_fading' 		=> intval($postratings_ajax_style['fading']),
		'custom' 			=> $postratings_custom,
		'l10n_print_after' 	=> $postratings_javascript
	));
}

add_action('wp_print_scripts', 'cosmetista_cmsmasters_rating_deregister_script', 100);



// Fixing WP Post Ratings plugin initial output, to match Design
function cosmetista_cmsmasters_rating_prefix_fix($html) {
	$search = plugins_url( '/wp-postratings/images/stars_png/' );
	
	$replace = get_template_directory_uri() . '/cmsmasters-wp-postratings/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/images/stars_png/';
	
	$html = str_replace($search, $replace, $html);
	
	
	return $html;
}

add_filter( 'expand_ratings_template', 'cosmetista_cmsmasters_rating_prefix_fix', 999, 1 );



// Set WP Post Ratings default image format to PNG
function cosmetista_cmsmasters_rating_custom_image_extension() {
    return 'png';
}

add_filter('wp_postratings_image_extension', 'cosmetista_cmsmasters_rating_custom_image_extension');



// WP-PostRatings Unregister Widget & Pages & Override Plugin Defaults
if(is_admin()) {
	// Remove rating columnts for all post types except projects	
	function cosmetista_rating_columns_remove_init() {
		function cosmetista_rating_columns_remove($columns) {
			unset($columns['ratings']);
			
			return $columns;
		}
		
		
		$post_types = get_post_types('','names');
		
		foreach($post_types as $post_type) {
			if($post_type != 'project') {
				$filter = 'manage_' . esc_html($post_type) . '_posts_columns';
				
				add_filter($filter, 'cosmetista_rating_columns_remove');
			}
		}
		
		add_filter('manage_pages_columns' , 'cosmetista_rating_columns_remove');
	}
	
	
	add_action('admin_menu' , 'cosmetista_rating_columns_remove_init');
	
	
	function cosmetista_cmsmasters_rating_settings_page_removing() {
		remove_submenu_page('wp-postratings/postratings-manager.php', 'wp-postratings/postratings-templates.php');
	}
	
	add_action('admin_menu', 'cosmetista_cmsmasters_rating_settings_page_removing');
	
	
	function cosmetista_cmsmasters_rating_unregister_widget() {
		unregister_widget('WP_Widget_PostRatings');
	}
	
	add_action( 'widgets_init', 'cosmetista_cmsmasters_rating_unregister_widget' );
}



function cosmetista_cmsmasters_rating_options() {
	$current_value = get_option('postratings_image');
	$custom_value = 'stars_png';
	
	
	if ($current_value != $custom_value) {
		// Ratings Options
		update_option('postratings_image', $custom_value);
		
		update_option('postratings_logging_method', '4');
		
		update_option('postratings_ajax_style_loading', '0');
		
		
		// Ratings Templates
		update_option('postratings_template_vote', '%RATINGS_IMAGES_VOTE%');
		
		update_option('postratings_template_text', '%RATINGS_IMAGES%');
		
		update_option('postratings_template_permission', '%RATINGS_IMAGES%');
		
		update_option('postratings_template_none', '%RATINGS_IMAGES_VOTE%');
		
		update_option('postratings_template_highestrated', '' );
		
		update_option('postratings_template_mostrated', '' );
	}
}

add_action('wp_enqueue_scripts', 'cosmetista_cmsmasters_rating_options');



// Display functions
function cosmetista_cmsmasters_rating($cmsmasters_id, $show = true) {	
	$cmsmasters_option = cosmetista_get_global_options();
	
	$out = '';
	
	
	if (!isset($cmsmasters_option['cosmetista' . '_portfolio_project_rating']) || (isset($cmsmasters_option['cosmetista' . '_portfolio_project_rating'])) && $cmsmasters_option['cosmetista' . '_portfolio_project_rating']) {
		$out = '<div class="cmsmasters_rating">' . 
			'<div class="cmsmasters_rating_wrap">' . the_ratings('div', $cmsmasters_id, false) . '</div>' . 
		'</div>';
	}
	
	
	if ($show) {
		print $out;
	} else {
		return $out;
	}
}

