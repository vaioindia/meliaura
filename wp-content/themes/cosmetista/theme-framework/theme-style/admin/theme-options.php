<?php 
/**
 * @package 	WordPress
 * @subpackage 	Cosmetista
 * @version		1.0.0
 * 
 * Theme Admin Options
 * Created by CMSMasters
 * 
 */


/* Filter for Options */
function cosmetista_theme_meta_fields($custom_all_meta_fields) {
	$cmsmasters_option = cosmetista_get_global_options();
	
	
	$custom_all_meta_fields_new = array();
	
	
	if (
		(isset($_GET['post_type']) && $_GET['post_type'] == 'post') || 
		(isset($_POST['post_type']) && $_POST['post_type'] == 'post') || 
		(isset($_GET['post']) && get_post_type($_GET['post']) == 'post') 
	) {
		foreach ($custom_all_meta_fields as $custom_all_meta_field) {
			if ($custom_all_meta_field['id'] == 'cmsmasters_post_sharing_box') { 
                $custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__('Default Blog Post Layout', 'cosmetista'), 
					'desc'	=> esc_html__('Fullwidth', 'cosmetista'), 
					'id'	=> 'cmsmasters_post_fullwidth_layout', 
					'type'	=> 'checkbox', 
					'hide'	=> '', 
					'std'	=> 'false'
                );
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} else {
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			}
		}
	} else if (
		(isset($_GET['post_type']) && $_GET['post_type'] == 'project') || 
		(isset($_POST['post_type']) && $_POST['post_type'] == 'project') || 
		(isset($_GET['post']) && get_post_type($_GET['post']) == 'project') 
	) {
		foreach ($custom_all_meta_fields as $custom_all_meta_field) {
			
			if ($custom_all_meta_field['id'] == 'cmsmasters_heading') {
				$custom_all_meta_field['std'] = 'custom';
				
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} else if ($custom_all_meta_field['id'] == 'cmsmasters_project_images') {	
				$custom_all_meta_field['label'] = esc_html__('Review Images', 'cosmetista');
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} else if ($custom_all_meta_field['id'] == 'cmsmasters_project_image_show') {	
				$custom_all_meta_field['label'] = esc_html__('Don\'t Show Featured Image in Open Review', 'cosmetista');
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} else if ($custom_all_meta_field['id'] == 'cmsmasters_project_title') {
				$custom_all_meta_field['label'] = esc_html__('Review Title', 'cosmetista');
                
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} else if ($custom_all_meta_field['id'] == 'cmsmasters_project_size') {	
				$custom_all_meta_field['label'] = esc_html__('Review Puzzle Image Size', 'cosmetista');
				$custom_all_meta_field['desc'] = esc_html__('Recommended Review Puzzle Image dimensions, or other size, with the same ratio', 'cosmetista');
				
                $custom_all_meta_fields_new[] = array( 
                    'label'  	=> esc_html__('Review Subtitle', 'cosmetista'), 
                    'desc'    	=> '', 
                    'id'    	=> 'cmsmasters_project_subtitle', 
                    'type'   	=> 'text_long', 
                    'hide'    	=> '', 
                    'std'    	=> '' 
                );
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} else if ($custom_all_meta_field['id'] == 'cmsmasters_project_puzzle_image') {	
				$custom_all_meta_field['label'] = esc_html__('Review Puzzle Image', 'cosmetista');
				$custom_all_meta_field['desc'] = esc_html__('Choose image for Masonry Puzzle reviews', 'cosmetista');
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} else if ($custom_all_meta_field['id'] == 'cmsmasters_project_details_title') {	
				$custom_all_meta_field['label'] = esc_html__('Review Details Title', 'cosmetista');
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} else if ($custom_all_meta_field['id'] == 'cmsmasters_project_features') {	
				$custom_all_meta_field['label'] = esc_html__('Review Info', 'cosmetista');
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} else if ($custom_all_meta_field['id'] == 'cmsmasters_project_link_text') {	
				$custom_all_meta_field['label'] = esc_html__('Review Link Text', 'cosmetista');
				$custom_all_meta_field['std'] = esc_html__('Read More', 'cosmetista');
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} else if ($custom_all_meta_field['id'] == 'cmsmasters_project_link_url') {	
				$custom_all_meta_field['label'] = esc_html__('Review Link URL', 'cosmetista');
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} else if ($custom_all_meta_field['id'] == 'cmsmasters_project_link_redirect') {	
				$custom_all_meta_field['desc'] = esc_html__('Redirect to review link URL instead of opening review page', 'cosmetista');
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} else if ($custom_all_meta_field['id'] == 'cmsmasters_project_link_target') {	
				$custom_all_meta_field['label'] = esc_html__('Review Link Target', 'cosmetista');
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} else if ($custom_all_meta_field['id'] == 'cmsmasters_project_features_one_title') {	
				$custom_all_meta_field['label'] = esc_html__('Review Features 1 Title', 'cosmetista');
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} else if ($custom_all_meta_field['id'] == 'cmsmasters_project_features_one') {	
				$custom_all_meta_field['label'] = esc_html__('Review Features 1', 'cosmetista');
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} else if ($custom_all_meta_field['id'] == 'cmsmasters_project_features_two_title') {	
				$custom_all_meta_field['label'] = esc_html__('Review Features 2 Title', 'cosmetista');
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} else if ($custom_all_meta_field['id'] == 'cmsmasters_project_features_two') {	
				$custom_all_meta_field['label'] = esc_html__('Review Features 2', 'cosmetista');
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} else if ($custom_all_meta_field['id'] == 'cmsmasters_project_features_three_title') {	
				$custom_all_meta_field['label'] = esc_html__('Review Features 3 Title', 'cosmetista');
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} else if ($custom_all_meta_field['id'] == 'cmsmasters_project_features_three') {	
				$custom_all_meta_field['label'] = esc_html__('Review Features 3', 'cosmetista');
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} else if ($custom_all_meta_field['id'] == 'cmsmasters_project_tabs') {
				$custom_all_meta_field['options']['cmsmasters_project']['label'] = esc_html__('Review', 'cosmetista');
				
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

add_filter('get_custom_all_meta_fields_filter', 'cosmetista_theme_meta_fields');

