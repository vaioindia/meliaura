<?php
/**
 * @package 	WordPress
 * @subpackage 	Cosmetista
 * @version 	1.0.4
 * 
 * Admin Panel Scripts & Styles
 * Created by CMSMasters
 * 
 */


function cosmetista_admin_register($hook) {
	global $pagenow;
	
	$screen = get_current_screen();
	
	
	wp_enqueue_style('wp-color-picker');
	
	wp_enqueue_script('wp-color-picker');
	
	wp_localize_script( 'wp-color-picker', 'wpColorPickerL10n', array(
		'clear' => 					__('Clear', 'cosmetista'),
		'clearAriaLabel' => 		__('Clear color', 'cosmetista'),
		'defaultLabel' => 			__('Color value', 'cosmetista'),
		'defaultString' => 			__('Default', 'cosmetista'),
		'defaultAriaLabel' => 		__('Select default color', 'cosmetista'),
		'pick' => 					__('Select Color', 'cosmetista'),
	) ); 
	
	wp_enqueue_script('wp-color-picker-alpha', get_template_directory_uri() . '/framework/admin/inc/js/wp-color-picker-alpha.js', array('jquery', 'wp-color-picker'), '2.1.4', true);
	
	
	wp_enqueue_style('cosmetista-admin-icons-font', get_template_directory_uri() . '/framework/admin/inc/css/admin-icons-font.css', array(), '1.0.0', 'screen');
	
	wp_enqueue_style('cosmetista-lightbox', get_template_directory_uri() . '/framework/admin/inc/css/jquery.cmsmastersLightbox.css', array(), '1.0.0', 'screen');
	
	if (is_rtl()) {
		wp_enqueue_style('cosmetista-lightbox-rtl', get_template_directory_uri() . '/framework/admin/inc/css/jquery.cmsmastersLightbox-rtl.css', array(), '1.0.0', 'screen');
	}
	
	
	wp_enqueue_script('cosmetista-uploader-js', get_template_directory_uri() . '/framework/admin/inc/js/jquery.cmsmastersUploader.js', array('jquery'), '1.0.0', true);
	
	wp_localize_script('cosmetista-uploader-js', 'cmsmasters_admin_uploader', array( 
		'choose' => 				esc_attr__('Choose image', 'cosmetista'), 
		'insert' => 				esc_attr__('Insert image', 'cosmetista'), 
		'remove' => 				esc_attr__('Remove', 'cosmetista'), 
		'edit_gallery' => 			esc_attr__('Edit gallery', 'cosmetista') 
	));
	
	
	wp_enqueue_script('cosmetista-lightbox-js', get_template_directory_uri() . '/framework/admin/inc/js/jquery.cmsmastersLightbox.js', array('jquery'), '1.0.0', true);
	
	wp_localize_script('cosmetista-lightbox-js', 'cmsmasters_admin_lightbox', array( 
		'cancel' => 				esc_attr__('Cancel', 'cosmetista'), 
		'insert' => 				esc_attr__('Insert', 'cosmetista'), 
		'deselect' => 				esc_attr__('Deselect', 'cosmetista'), 
		'choose_icon' => 			esc_attr__('Choose Icon', 'cosmetista'), 
		'find_icons' => 			esc_attr__('Find icons', 'cosmetista'), 
		'min_length' => 			esc_attr__('min 2 symbols', 'cosmetista'), 
		'choose_font' => 			esc_attr__('Choose icons font', 'cosmetista'), 
		'error_on_page' => 			esc_attr__("Error on page!\nReload page and try again.", 'cosmetista') 
	));
	
	
	if ( 
		$hook == 'post.php' || 
		$hook == 'post-new.php' || 
		$hook == 'widgets.php' || 
		$hook == 'term.php' || 
		$hook == 'edit-tags.php' || 
		$hook == 'nav-menus.php' || 
		str_replace('cmsmasters-settings-element', '', $screen->id) != $screen->id 
	) {
		wp_enqueue_style('cosmetista-icons', get_template_directory_uri() . '/css/fontello.css', array(), '1.0.0', 'screen');
		
		wp_enqueue_style('cosmetista-icons-custom', get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/css/fontello-custom.css', array(), '1.0.0', 'screen');
	}
	
	
	if ( 
		$hook == 'widgets.php' || 
		$hook == 'nav-menus.php' 
	) {
		wp_enqueue_media();
	}
	
	
	wp_enqueue_style('cosmetista-admin-styles', get_template_directory_uri() . '/framework/admin/inc/css/admin-theme-styles.css', array(), '1.0.0', 'screen');
	
	if (is_rtl()) {
		wp_enqueue_style('cosmetista-admin-styles-rtl', get_template_directory_uri() . '/framework/admin/inc/css/admin-theme-styles-rtl.css', array(), '1.0.0', 'screen');
	}
	
	
	wp_enqueue_script('cosmetista-admin-scripts', get_template_directory_uri() . '/framework/admin/inc/js/admin-theme-scripts.js', array('jquery'), '1.0.0', true);
	
	
	if ($hook == 'widgets.php') {
		wp_enqueue_style('cosmetista-widgets-styles', get_template_directory_uri() . '/framework/admin/inc/css/widgets-styles.css', array(), '1.0.0', 'screen');
		
		wp_enqueue_script('cosmetista-widgets-scripts', get_template_directory_uri() . '/framework/admin/inc/js/widgets-scripts.js', array('jquery'), '1.0.0', true);
	}
}

add_action('admin_enqueue_scripts', 'cosmetista_admin_register');

add_action('admin_enqueue_scripts', 'cmsmasters_composer_icons');

