<?php 
/**
 * @package 	WordPress
 * @subpackage 	Cosmetista
 * @version 	1.0.0
 * 
 * WP-PostRating Admin Settings
 * Created by CMSMasters
 * 
 */


/* Single Settings */
function cosmetista_cmsmasters_rating_options_single_fields($options, $tab) {
	$options_new = array();
	
	
	if ($tab == 'project') {
		foreach($options as $option) {
			if ($option['id'] == 'cosmetista_portfolio_project_share_box') {
				$options_new[] = array( 
					'section' => 'project_section', 
					'id' => 'cosmetista' . '_portfolio_project_rating', 
					'title' => esc_html__('Review Rating', 'cosmetista'), 
					'desc' => esc_html__('Show', 'cosmetista'), 
					'type' => 'checkbox', 
					'std' => 1
				);
				
				$options_new[] = $option;
			} else {
				$options_new[] = $option;
			}
		}
	} else {
		$options_new = $options;
	}
	
	
	return $options_new;
}

add_filter('cmsmasters_options_single_fields_filter', 'cosmetista_cmsmasters_rating_options_single_fields', 10, 2);

