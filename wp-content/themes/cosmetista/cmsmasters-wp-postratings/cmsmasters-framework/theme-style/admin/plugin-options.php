<?php 
/**
 * @package 	WordPress
 * @subpackage 	Cosmetista
 * @version 	1.0.0
 * 
 * WP-PostRating Admin Options
 * Created by CMSMasters
 * 
 */


/* Filter for Options */
function cosmetista_cmsmasters_rating_meta_fields($custom_all_meta_fields) {
	$cmsmasters_option = cosmetista_get_global_options();
	
	
	$cmsmasters_global_portfolio_project_rating = (isset($cmsmasters_option['cosmetista' . '_portfolio_project_rating']) && $cmsmasters_option['cosmetista' . '_portfolio_project_rating'] !== '') ? $cmsmasters_option['cosmetista' . '_portfolio_project_rating'] : '';
	
	$custom_all_meta_fields_new = array();
	
	
	if (
		(isset($_GET['post_type']) && $_GET['post_type'] == 'project') || 
		(isset($_POST['post_type']) && $_POST['post_type'] == 'project') || 
		(isset($_GET['post']) && get_post_type($_GET['post']) == 'project') 
	) {
		foreach ($custom_all_meta_fields as $custom_all_meta_field) {
			if ($custom_all_meta_field['id'] == 'cmsmasters_project_size') {
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__("Review Rating", 'cosmetista'), 
					'desc' => esc_html__('Show', 'cosmetista'), 
					'id'	=> 'cmsmasters_project_rating', 
					'type'	=> 'checkbox', 
					'hide'	=> '', 
					'std'	=> $cmsmasters_global_portfolio_project_rating
				);
				
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} else {
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			}
		}
	} else {
		$custom_all_meta_fields_new = $custom_all_meta_fields;
	}
	
	
	return $custom_all_meta_fields_new;
}

add_filter('get_custom_all_meta_fields_filter', 'cosmetista_cmsmasters_rating_meta_fields');

