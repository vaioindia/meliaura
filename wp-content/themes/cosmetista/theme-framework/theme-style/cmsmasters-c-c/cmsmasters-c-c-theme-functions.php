<?php
/**
 * @package 	WordPress
 * @subpackage 	Cosmetista
 * @version 	1.0.0
 * 
 * Theme Content Composer Functions
 * Created by CMSMasters
 * 
 */


/* Register JS Scripts */
function cosmetista_theme_register_c_c_scripts() {
	global $pagenow;
	
	
	if ( 
		$pagenow == 'post-new.php' || 
		($pagenow == 'post.php' && isset($_GET['post']) && get_post_type($_GET['post']) != 'attachment') 
	) {
		wp_enqueue_script('cosmetista-cmsmasters-c-c-theme-extend', get_template_directory_uri() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-c-c/js/cmsmasters-c-c-theme-extend.js', array('cmsmasters_composer_shortcodes_js'), '1.0.0', true);
		
		wp_localize_script('cosmetista-cmsmasters-c-c-theme-extend', 'cmsmasters_theme_shortcodes', array( 
			'gallery_field_layout_descr_note' => 				esc_attr__('For Hover Slider it is recommended that you use images with min size of 860&#215;560 or larger, but with the same image ratio', 'cosmetista'),
			'choice_rating' => 									esc_attr__('Rating', 'cosmetista'),
			'choice_rating_status' => 							CMSMASTERS_RATING,
			'posts_slider_field_poststype_choice_review' => 	esc_attr__('Reviews', 'cosmetista'), 
			'posts_slider_field_review_categ_title' => 			esc_attr__('Reviews Categories', 'cosmetista'), 
			'posts_slider_field_review_categ_descr' => 			esc_attr__('Show reviews associated with certain categories.', 'cosmetista'), 
			'posts_slider_field_review_categ_descr_note' => 	esc_attr__('If you don\'t choose any review categories, all your reviews will be shown', 'cosmetista'), 
			'posts_slider_field_review_meta_title' => 			esc_attr__('Reviews Metadata', 'cosmetista'), 
			'posts_slider_field_review_meta_descr' => 			esc_attr__('Choose reviews metadata you want to be shown', 'cosmetista'), 
			'reviews_title' => 									esc_attr__('Reviews', 'cosmetista'), 
			'reviews_field_orderby_descr' => 					esc_attr__('Choose your reviews order by parameter', 'cosmetista'), 
			'reviews_field_number_title' => 					esc_attr__('Reviews Number', 'cosmetista'), 
			'reviews_field_number_descr' => 					esc_attr__('Enter the number of reviews for showing per page', 'cosmetista'), 
			'reviews_field_number_descr_note' => 				esc_attr__('number, if empty - show all reviews', 'cosmetista'), 
			'reviews_field_categories_descr' => 				esc_attr__('Show reviews associated with certain categories.', 'cosmetista'), 
			'reviews_field_categories_descr_note' => 			esc_attr__('If you don\'t choose any review categories, all your reviews will be shown', 'cosmetista'), 
			'reviews_field_layout_descr' => 					esc_attr__('Choose layout type for your reviews', 'cosmetista'), 
			'reviews_field_layout_choice_grid' => 				esc_attr__('Reviews Grid', 'cosmetista'), 
			'reviews_field_layout_mode_descr' => 				esc_attr__('Choose grid layout mode for your reviews', 'cosmetista'), 
			'reviews_field_col_count_descr' => 					esc_attr__('Choose number of reviews per row', 'cosmetista'), 
			'reviews_field_metadata_descr' => 					esc_attr__('Choose reviews metadata that you want to show', 'cosmetista'), 
			'reviews_field_gap_descr' => 						esc_attr__('Choose the gap between reviews', 'cosmetista'), 
			'reviews_field_filter_descr' => 					esc_attr__('If checked, enable reviews category filter', 'cosmetista'), 
			'reviews_field_sorting_descr' => 					esc_attr__('If checked, enable reviews date & name sorting', 'cosmetista'), 
			'choice_views' => 									esc_attr__('Views', 'cosmetista')
		));
	}
}

add_action('admin_enqueue_scripts', 'cosmetista_theme_register_c_c_scripts');

