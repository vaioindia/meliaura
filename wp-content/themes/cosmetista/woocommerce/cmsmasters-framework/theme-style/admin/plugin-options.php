<?php 
/**
 * @package 	WordPress
 * @subpackage 	Cosmetista
 * @version 	1.0.0
 * 
 * WooCommerce Admin Options
 * Created by CMSMasters
 * 
 */


/* Filter for Product Options */
function cosmetista_product_meta_fields($custom_all_meta_fields) {
	$custom_all_meta_fields_new = array();
	
	$cmsmasters_option_name = 'cmsmasters_product_';
	
	
	if (
		(isset($_GET['post_type']) && $_GET['post_type'] == 'product') || 
		(isset($_POST['post_type']) && $_POST['post_type'] == 'product') || 
		(isset($_GET['post']) && get_post_type($_GET['post']) == 'product') 
	) {
		foreach ($custom_all_meta_fields as $custom_all_meta_field) {
			if ($custom_all_meta_field['id'] == 'cmsmasters_sidebar_id') {
				$custom_all_meta_field['std'] = 'sidebar_shop';
				
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} elseif ($custom_all_meta_field['id'] == 'cmsmasters_other_tabs') {
				$custom_all_meta_field['std'] = 'cmsmasters_product';
				
				
				$tabs_array = array();
				
				$tabs_array['cmsmasters_product'] = array( 
					'label' => esc_html__('Product', 'cosmetista'), 
					'value'	=> 'cmsmasters_product' 
				);
				
				
				foreach ($custom_all_meta_field['options'] as $key => $val) {
					$tabs_array[$key] = $val;
				}
				
				
				$custom_all_meta_field['options'] = $tabs_array;
				
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} elseif (
				$custom_all_meta_field['id'] == 'cmsmasters_layout' && 
				$custom_all_meta_field['type'] == 'tab_start'
			) {
				$custom_all_meta_field['std'] = '';
				
				
				$custom_all_meta_fields_new[] = array( 
					'id'	=> 'cmsmasters_product', 
					'type'	=> 'tab_start', 
					'std'	=> 'true' 
				);
				
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__('Sharing Box', 'cosmetista'), 
					'desc'	=> esc_html__('Show', 'cosmetista'), 
					'id'	=> $cmsmasters_option_name . 'sharing_box', 
					'type'	=> 'checkbox', 
					'hide'	=> '', 
					'std'	=> 'true' 
				); 
				
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__('Product Size', 'cosmetista'), 
					'desc'	=> esc_html__('Recommended Featured Image dimensions, or other size, with the same ratio', 'cosmetista') . ' - ', 
					'id'	=> $cmsmasters_option_name . 'size', 
					'type'	=> 'radio_img_pj', 
					'hide'	=> '', 
					'std'	=> 'one_x_one', 
					'options' => array( 
						'one_x_one' => array( 
							'img'	=> get_template_directory_uri() . '/framework/admin/inc/img/one_x_one.jpg', 
							'size' => '480 x 331', 
							'label' => '1 x 1', 
							'value'	=> 'one_x_one' 
						), 
						'one_x_two' => array( 
							'img'	=> get_template_directory_uri() . '/framework/admin/inc/img/one_x_two.jpg', 
							'size' => '480 x 662', 
							'label' => '1 x 2', 
							'value'	=> 'one_x_two' 
						), 
						'one_x_three' => array( 
							'img'	=> get_template_directory_uri() . '/framework/admin/inc/img/one_x_three.jpg', 
							'size' => '480 x 993', 
							'label' => '1 x 3', 
							'value'	=> 'one_x_three' 
						), 
						'two_x_one' => array( 
							'img'	=> get_template_directory_uri() . '/framework/admin/inc/img/two_x_one.jpg', 
							'size' => '960 x 331', 
							'label' => '2 x 1', 
							'value'	=> 'two_x_one' 
						), 
						'two_x_two' => array( 
							'img'	=> get_template_directory_uri() . '/framework/admin/inc/img/two_x_two.jpg', 
							'size' => '960 x 662', 
							'label' => '2 x 2', 
							'value'	=> 'two_x_two' 
						), 
						'two_x_three' => array( 
							'img'	=> get_template_directory_uri() . '/framework/admin/inc/img/two_x_three.jpg', 
							'size' => '960 x 993', 
							'label' => '2 x 3', 
							'value'	=> 'two_x_three' 
						), 
						'three_x_one' => array( 
							'img'	=> get_template_directory_uri() . '/framework/admin/inc/img/three_x_one.jpg', 
							'size' => '1440 x 331', 
							'label' => '3 x 1', 
							'value'	=> 'three_x_one' 
						), 
						'three_x_two' => array( 
							'img'	=> get_template_directory_uri() . '/framework/admin/inc/img/three_x_two.jpg', 
							'size' => '1440 x 662', 
							'label' => '3 x 2', 
							'value'	=> 'three_x_two' 
						), 
						'three_x_three' => array( 
							'img'	=> get_template_directory_uri() . '/framework/admin/inc/img/three_x_three.jpg', 
							'size' => '1440 x 993', 
							'label' => '3 x 3', 
							'value'	=> 'three_x_three' 
						), 
						'four_x_four' => array( 
							'img'	=> get_template_directory_uri() . '/framework/admin/inc/img/four_x_four.jpg', 
							'size' => '1920 x 1324', 
							'label' => '4 x 4', 
							'value'	=> 'four_x_four' 
						) 
					) 
				);
				
				$custom_all_meta_fields_new[] = array( 
					'id'	=> 'cmsmasters_product', 
					'type'	=> 'tab_finish' 
				);
				
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			}  else {
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			}
		}
	} else {
		$custom_all_meta_fields_new = $custom_all_meta_fields;
	}
	
	
	return $custom_all_meta_fields_new;
}

add_filter('get_custom_all_meta_fields_filter', 'cosmetista_product_meta_fields');