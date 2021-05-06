<?php 
/**
 * @package 	WordPress
 * @subpackage 	Cosmetista
 * @version		1.0.0
 * 
 * Theme Admin Settings
 * Created by CMSMasters
 * 
 */

 
/* Single Posts Settings */
function cosmetista_theme_options_single_tabs_fields($tabs) {
	$tabs['project'] = esc_attr__('Review', 'cosmetista');
	
	
	return $tabs;
}

add_filter('cmsmasters_options_single_tabs_filter', 'cosmetista_theme_options_single_tabs_fields', 10, 2);



function cosmetista_theme_options_single_sections_fields($sections, $tab) {
	if ($tab == 'project') {
		$sections['project_section'] = esc_attr__('Review Options', 'cosmetista');
	}
	
	
	return $sections;
}

add_filter('cmsmasters_options_single_sections_filter', 'cosmetista_theme_options_single_sections_fields', 10, 2);



function cosmetista_theme_options_single_fields($options, $tab) {
	$new_options = array();
	
	if ($tab == 'post') {
		foreach ($options as $option) {
			if ($option['id'] == 'cosmetista' . '_blog_post_like') {
				$new_options[] = array( 
					'section' => 'post_section', 
					'id' => 'cosmetista' . '_blog_post_view', 
					'title' => esc_html__('Post Views', 'cosmetista'), 
					'desc' => esc_html__('show', 'cosmetista'), 
					'type' => 'checkbox', 
					'std' => 1 
				);
				
				$new_options[] = $option;
			} else {
				$new_options[] = $option;
			}
		}
	} else if ($tab == 'project') {
		foreach ($options as $option) {
			if ($option['id'] == 'cosmetista' . '_portfolio_project_like') {
				$new_options[] = array( 
					'section' => 'project_section', 
					'id' => 'cosmetista' . '_portfolio_project_view', 
					'title' => esc_html__('Review Views', 'cosmetista'), 
					'desc' => esc_html__('show', 'cosmetista'), 
					'type' => 'checkbox', 
					'std' => 0 
				);
				
				$new_options[] = $option;
			} else if ($option['id'] == 'cosmetista' . '_portfolio_project_title') {
				$option['title'] = esc_html__('Review Title', 'cosmetista'); 
				
				$new_options[] = $option;
			} else if ($option['id'] == 'cosmetista' . '_portfolio_project_details_title') {
				$option['title'] = esc_html__('Review Details Title', 'cosmetista'); 
				$option['desc'] = esc_html__('Enter a review details block title', 'cosmetista'); 
				$option['std'] = esc_html__('Review Details', 'cosmetista'); 
				
				$new_options[] = $option;
			} else if ($option['id'] == 'cosmetista' . '_portfolio_project_date') {
				$option['title'] = esc_html__('Review Date', 'cosmetista'); 
				
				$new_options[] = $option;
			} else if ($option['id'] == 'cosmetista' . '_portfolio_project_cat') {
				$option['title'] = esc_html__('Review Categories', 'cosmetista'); 
				
				$new_options[] = $option;
			} else if ($option['id'] == 'cosmetista' . '_portfolio_project_author') {
				$option['title'] = esc_html__('Review Author', 'cosmetista'); 
				
				$new_options[] = $option;
			} else if ($option['id'] == 'cosmetista' . '_portfolio_project_comment') {
				$option['title'] = esc_html__('Review Comments', 'cosmetista'); 
				
				$new_options[] = $option;
			} else if ($option['id'] == 'cosmetista' . '_portfolio_project_tag') {
				$option['title'] = esc_html__('Review Tags', 'cosmetista'); 
				
				$new_options[] = $option;
			} else if ($option['id'] == 'cosmetista' . '_portfolio_project_like') {
				$option['title'] = esc_html__('Review Likes', 'cosmetista'); 
				
				$new_options[] = $option;
			} else if ($option['id'] == 'cosmetista' . '_portfolio_project_link') {
				$option['title'] = esc_html__('Review Link', 'cosmetista'); 
				
				$new_options[] = $option;
			} else if ($option['id'] == 'cosmetista' . '_portfolio_project_nav_box') {
				$option['title'] = esc_html__('Reviews Navigation Box', 'cosmetista'); 
				
				$new_options[] = $option;
			} else if ($option['id'] == 'cosmetista' . '_portfolio_project_nav_order_cat') {
				$option['title'] = esc_html__('Reviews Navigation Order by Category', 'cosmetista'); 
				
				$new_options[] = $option;
			} else if ($option['id'] == 'cosmetista' . '_portfolio_more_projects_box') {
				$option['title'] = esc_html__('More Reviews Box', 'cosmetista'); 
				$option['choices'] = array( 
					esc_html__('Show Related Reviews', 'cosmetista') . '|related', 
					esc_html__('Show Popular Reviews', 'cosmetista') . '|popular', 
					esc_html__('Show Recent Reviews', 'cosmetista') . '|recent', 
					esc_html__('Hide More Reviews Box', 'cosmetista') . '|hide' 
				);
				
				$new_options[] = $option;
			} else if ($option['id'] == 'cosmetista' . '_portfolio_more_projects_count') {
				$option['title'] = esc_html__('More Reviews Box Items Number', 'cosmetista'); 
				$option['desc'] = esc_html__('reviews', 'cosmetista'); 
				
				$new_options[] = $option;
			} else if ($option['id'] == 'cosmetista' . '_portfolio_more_projects_pause') {
				$option['title'] = esc_html__('More Reviews Slider Pause Time', 'cosmetista'); 
				
				$new_options[] = $option;
			} else if ($option['id'] == 'cosmetista' . '_portfolio_project_slug') {
				$option['title'] = esc_html__('Review Slug', 'cosmetista'); 
				$option['desc'] = esc_html__('Enter a page slug that should be used for your reviews single item', 'cosmetista'); 
				
				$new_options[] = $option;
			} else if ($option['id'] == 'cosmetista' . '_portfolio_pj_categs_slug') {
				$option['title'] = esc_html__('Review Categories Slug', 'cosmetista'); 
				$option['desc'] = esc_html__('Enter page slug that should be used on reviews categories archive page', 'cosmetista'); 
				
				$new_options[] = $option;
			} else if ($option['id'] == 'cosmetista' . '_portfolio_pj_tags_slug') {
				$option['title'] = esc_html__('Review Tags Slug', 'cosmetista'); 
				$option['desc'] = esc_html__('Enter page slug that should be used on reviews tags archive page', 'cosmetista'); 
				
				$new_options[] = $option;
			} else {
				$new_options[] = $option;
			}
		}
	} else {
		$new_options = $options;
	}
	
	
	return $new_options;
}

add_filter('cmsmasters_options_single_fields_filter', 'cosmetista_theme_options_single_fields', 10, 2);
