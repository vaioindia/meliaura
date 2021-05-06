<?php 
/**
 * @package 	WordPress
 * @subpackage 	Cosmetista
 * @version 	1.0.0
 * 
 * Admin Panel Element Options
 * Created by CMSMasters
 * 
 */


function cosmetista_options_element_tabs() {
	$tabs = array();
	
	$tabs['sidebar'] = esc_attr__('Sidebars', 'cosmetista');
	
	if (class_exists('Cmsmasters_Content_Composer')) {
		$tabs['icon'] = esc_attr__('Social Icons', 'cosmetista');
	}
	
	$tabs['lightbox'] = esc_attr__('Lightbox', 'cosmetista');
	$tabs['sitemap'] = esc_attr__('Sitemap', 'cosmetista');
	$tabs['error'] = esc_attr__('404', 'cosmetista');
	$tabs['code'] = esc_attr__('Custom Codes', 'cosmetista');
	
	if (class_exists('Cmsmasters_Form_Builder')) {
		$tabs['recaptcha'] = esc_attr__('reCAPTCHA', 'cosmetista');
	}
	
	return apply_filters('cmsmasters_options_element_tabs_filter', $tabs);
}


function cosmetista_options_element_sections() {
	$tab = cosmetista_get_the_tab();
	
	switch ($tab) {
	case 'sidebar':
		$sections = array();
		
		$sections['sidebar_section'] = esc_attr__('Custom Sidebars', 'cosmetista');
		
		break;
	case 'icon':
		$sections = array();
		
		$sections['icon_section'] = esc_attr__('Social Icons', 'cosmetista');
		
		break;
	case 'lightbox':
		$sections = array();
		
		$sections['lightbox_section'] = esc_attr__('Theme Lightbox Options', 'cosmetista');
		
		break;
	case 'sitemap':
		$sections = array();
		
		$sections['sitemap_section'] = esc_attr__('Sitemap Page Options', 'cosmetista');
		
		break;
	case 'error':
		$sections = array();
		
		$sections['error_section'] = esc_attr__('404 Error Page Options', 'cosmetista');
		
		break;
	case 'code':
		$sections = array();
		
		$sections['code_section'] = esc_attr__('Custom Codes', 'cosmetista');
		
		break;
	case 'recaptcha':
		$sections = array();
		
		$sections['recaptcha_section'] = esc_attr__('Form Builder Plugin reCAPTCHA Keys', 'cosmetista');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return apply_filters('cmsmasters_options_element_sections_filter', $sections, $tab);	
} 


function cosmetista_options_element_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = cosmetista_get_the_tab();
	}
	
	
	$options = array();
	
	
	$defaults = cosmetista_settings_element_defaults();
	
	
	switch ($tab) {
	case 'sidebar':
		$options[] = array( 
			'section' => 'sidebar_section', 
			'id' => 'cosmetista' . '_sidebar', 
			'title' => esc_html__('Custom Sidebars', 'cosmetista'), 
			'desc' => '', 
			'type' => 'sidebar', 
			'std' => $defaults[$tab]['cosmetista' . '_sidebar'] 
		);
		
		break;
	case 'icon':
		$options[] = array( 
			'section' => 'icon_section', 
			'id' => 'cosmetista' . '_social_icons', 
			'title' => esc_html__('Social Icons', 'cosmetista'), 
			'desc' => '', 
			'type' => 'social', 
			'std' => $defaults[$tab]['cosmetista' . '_social_icons'] 
		);
		
		break;
	case 'lightbox':
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'cosmetista' . '_ilightbox_skin', 
			'title' => esc_html__('Skin', 'cosmetista'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['cosmetista' . '_ilightbox_skin'], 
			'choices' => array( 
				esc_html__('Dark', 'cosmetista') . '|dark', 
				esc_html__('Light', 'cosmetista') . '|light', 
				esc_html__('Mac', 'cosmetista') . '|mac', 
				esc_html__('Metro Black', 'cosmetista') . '|metro-black', 
				esc_html__('Metro White', 'cosmetista') . '|metro-white', 
				esc_html__('Parade', 'cosmetista') . '|parade', 
				esc_html__('Smooth', 'cosmetista') . '|smooth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'cosmetista' . '_ilightbox_path', 
			'title' => esc_html__('Path', 'cosmetista'), 
			'desc' => esc_html__('Sets path for switching windows', 'cosmetista'), 
			'type' => 'radio', 
			'std' => $defaults[$tab]['cosmetista' . '_ilightbox_path'], 
			'choices' => array( 
				esc_html__('Vertical', 'cosmetista') . '|vertical', 
				esc_html__('Horizontal', 'cosmetista') . '|horizontal' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'cosmetista' . '_ilightbox_infinite', 
			'title' => esc_html__('Infinite', 'cosmetista'), 
			'desc' => esc_html__('Sets the ability to infinite the group', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_ilightbox_infinite'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'cosmetista' . '_ilightbox_aspect_ratio', 
			'title' => esc_html__('Keep Aspect Ratio', 'cosmetista'), 
			'desc' => esc_html__('Sets the resizing method used to keep aspect ratio within the viewport', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_ilightbox_aspect_ratio'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'cosmetista' . '_ilightbox_mobile_optimizer', 
			'title' => esc_html__('Mobile Optimizer', 'cosmetista'), 
			'desc' => esc_html__('Make lightboxes optimized for giving better experience with mobile devices', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_ilightbox_mobile_optimizer'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'cosmetista' . '_ilightbox_max_scale', 
			'title' => esc_html__('Max Scale', 'cosmetista'), 
			'desc' => esc_html__('Sets the maximum viewport scale of the content', 'cosmetista'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['cosmetista' . '_ilightbox_max_scale'], 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'cosmetista' . '_ilightbox_min_scale', 
			'title' => esc_html__('Min Scale', 'cosmetista'), 
			'desc' => esc_html__('Sets the minimum viewport scale of the content', 'cosmetista'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['cosmetista' . '_ilightbox_min_scale'], 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'cosmetista' . '_ilightbox_inner_toolbar', 
			'title' => esc_html__('Inner Toolbar', 'cosmetista'), 
			'desc' => esc_html__('Bring buttons into windows, or let them be over the overlay', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_ilightbox_inner_toolbar'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'cosmetista' . '_ilightbox_smart_recognition', 
			'title' => esc_html__('Smart Recognition', 'cosmetista'), 
			'desc' => esc_html__('Sets content auto recognize from web pages', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_ilightbox_smart_recognition'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'cosmetista' . '_ilightbox_fullscreen_one_slide', 
			'title' => esc_html__('Fullscreen One Slide', 'cosmetista'), 
			'desc' => esc_html__('Decide to fullscreen only one slide or hole gallery the fullscreen mode', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_ilightbox_fullscreen_one_slide'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'cosmetista' . '_ilightbox_fullscreen_viewport', 
			'title' => esc_html__('Fullscreen Viewport', 'cosmetista'), 
			'desc' => esc_html__('Sets the resizing method used to fit content within the fullscreen mode', 'cosmetista'), 
			'type' => 'select', 
			'std' => $defaults[$tab]['cosmetista' . '_ilightbox_fullscreen_viewport'], 
			'choices' => array( 
				esc_html__('Center', 'cosmetista') . '|center', 
				esc_html__('Fit', 'cosmetista') . '|fit', 
				esc_html__('Fill', 'cosmetista') . '|fill', 
				esc_html__('Stretch', 'cosmetista') . '|stretch' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'cosmetista' . '_ilightbox_controls_toolbar', 
			'title' => esc_html__('Toolbar Controls', 'cosmetista'), 
			'desc' => esc_html__('Sets buttons be available or not', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_ilightbox_controls_toolbar'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'cosmetista' . '_ilightbox_controls_arrows', 
			'title' => esc_html__('Arrow Controls', 'cosmetista'), 
			'desc' => esc_html__('Enable the arrow buttons', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_ilightbox_controls_arrows'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'cosmetista' . '_ilightbox_controls_fullscreen', 
			'title' => esc_html__('Fullscreen Controls', 'cosmetista'), 
			'desc' => esc_html__('Sets the fullscreen button', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_ilightbox_controls_fullscreen'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'cosmetista' . '_ilightbox_controls_thumbnail', 
			'title' => esc_html__('Thumbnails Controls', 'cosmetista'), 
			'desc' => esc_html__('Sets the thumbnail navigation', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_ilightbox_controls_thumbnail'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'cosmetista' . '_ilightbox_controls_keyboard', 
			'title' => esc_html__('Keyboard Controls', 'cosmetista'), 
			'desc' => esc_html__('Sets the keyboard navigation', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_ilightbox_controls_keyboard'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'cosmetista' . '_ilightbox_controls_mousewheel', 
			'title' => esc_html__('Mouse Wheel Controls', 'cosmetista'), 
			'desc' => esc_html__('Sets the mousewheel navigation', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_ilightbox_controls_mousewheel'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'cosmetista' . '_ilightbox_controls_swipe', 
			'title' => esc_html__('Swipe Controls', 'cosmetista'), 
			'desc' => esc_html__('Sets the swipe navigation', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_ilightbox_controls_swipe'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'cosmetista' . '_ilightbox_controls_slideshow', 
			'title' => esc_html__('Slideshow Controls', 'cosmetista'), 
			'desc' => esc_html__('Enable the slideshow feature and button', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_ilightbox_controls_slideshow'] 
		);
		
		break;
	case 'sitemap':
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'cosmetista' . '_sitemap_nav', 
			'title' => esc_html__('Website Pages', 'cosmetista'), 
			'desc' => esc_html__('show', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_sitemap_nav'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'cosmetista' . '_sitemap_categs', 
			'title' => esc_html__('Blog Archives by Categories', 'cosmetista'), 
			'desc' => esc_html__('show', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_sitemap_categs'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'cosmetista' . '_sitemap_tags', 
			'title' => esc_html__('Blog Archives by Tags', 'cosmetista'), 
			'desc' => esc_html__('show', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_sitemap_tags'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'cosmetista' . '_sitemap_month', 
			'title' => esc_html__('Blog Archives by Month', 'cosmetista'), 
			'desc' => esc_html__('show', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_sitemap_month'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'cosmetista' . '_sitemap_pj_categs', 
			'title' => esc_html__('Portfolio Archives by Categories', 'cosmetista'), 
			'desc' => esc_html__('show', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_sitemap_pj_categs'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'cosmetista' . '_sitemap_pj_tags', 
			'title' => esc_html__('Portfolio Archives by Tags', 'cosmetista'), 
			'desc' => esc_html__('show', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_sitemap_pj_tags'] 
		);
		
		break;
	case 'error':
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'cosmetista' . '_error_color', 
			'title' => esc_html__('Text Color', 'cosmetista'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['cosmetista' . '_error_color'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'cosmetista' . '_error_bg_color', 
			'title' => esc_html__('Background Color', 'cosmetista'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['cosmetista' . '_error_bg_color'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'cosmetista' . '_error_bg_img_enable', 
			'title' => esc_html__('Background Image Visibility', 'cosmetista'), 
			'desc' => esc_html__('show', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_error_bg_img_enable'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'cosmetista' . '_error_bg_image', 
			'title' => esc_html__('Background Image', 'cosmetista'), 
			'desc' => esc_html__('Choose your custom error page background image.', 'cosmetista'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['cosmetista' . '_error_bg_image'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'cosmetista' . '_error_bg_rep', 
			'title' => esc_html__('Background Repeat', 'cosmetista'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['cosmetista' . '_error_bg_rep'], 
			'choices' => array( 
				esc_html__('No Repeat', 'cosmetista') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'cosmetista') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'cosmetista') . '|repeat-y', 
				esc_html__('Repeat', 'cosmetista') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'cosmetista' . '_error_bg_pos', 
			'title' => esc_html__('Background Position', 'cosmetista'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['cosmetista' . '_error_bg_pos'], 
			'choices' => array( 
				esc_html__('Top Left', 'cosmetista') . '|top left', 
				esc_html__('Top Center', 'cosmetista') . '|top center', 
				esc_html__('Top Right', 'cosmetista') . '|top right', 
				esc_html__('Center Left', 'cosmetista') . '|center left', 
				esc_html__('Center Center', 'cosmetista') . '|center center', 
				esc_html__('Center Right', 'cosmetista') . '|center right', 
				esc_html__('Bottom Left', 'cosmetista') . '|bottom left', 
				esc_html__('Bottom Center', 'cosmetista') . '|bottom center', 
				esc_html__('Bottom Right', 'cosmetista') . '|bottom right' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'cosmetista' . '_error_bg_att', 
			'title' => esc_html__('Background Attachment', 'cosmetista'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['cosmetista' . '_error_bg_att'], 
			'choices' => array( 
				esc_html__('Scroll', 'cosmetista') . '|scroll', 
				esc_html__('Fixed', 'cosmetista') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'cosmetista' . '_error_bg_size', 
			'title' => esc_html__('Background Size', 'cosmetista'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['cosmetista' . '_error_bg_size'], 
			'choices' => array( 
				esc_html__('Auto', 'cosmetista') . '|auto', 
				esc_html__('Cover', 'cosmetista') . '|cover', 
				esc_html__('Contain', 'cosmetista') . '|contain' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'cosmetista' . '_error_search', 
			'title' => esc_html__('Search Line', 'cosmetista'), 
			'desc' => esc_html__('show', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_error_search'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'cosmetista' . '_error_sitemap_button', 
			'title' => esc_html__('Sitemap Button', 'cosmetista'), 
			'desc' => esc_html__('show', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_error_sitemap_button'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'cosmetista' . '_error_sitemap_link', 
			'title' => esc_html__('Sitemap Page URL', 'cosmetista'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['cosmetista' . '_error_sitemap_link'], 
			'class' => '' 
		);
		
		break;
	case 'code':
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'cosmetista' . '_custom_css', 
			'title' => esc_html__('Custom CSS', 'cosmetista'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['cosmetista' . '_custom_css'], 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'cosmetista' . '_custom_js', 
			'title' => esc_html__('Custom JavaScript', 'cosmetista'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['cosmetista' . '_custom_js'], 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'cosmetista' . '_gmap_api_key', 
			'title' => esc_html__('Google Maps API key', 'cosmetista'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['cosmetista' . '_gmap_api_key'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'cosmetista' . '_api_key', 
			'title' => esc_html__('Twitter API key', 'cosmetista'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['cosmetista' . '_api_key'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'cosmetista' . '_api_secret', 
			'title' => esc_html__('Twitter API secret', 'cosmetista'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['cosmetista' . '_api_secret'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'cosmetista' . '_access_token', 
			'title' => esc_html__('Twitter Access token', 'cosmetista'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['cosmetista' . '_access_token'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'cosmetista' . '_access_token_secret', 
			'title' => esc_html__('Twitter Access token secret', 'cosmetista'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['cosmetista' . '_access_token_secret'], 
			'class' => '' 
		);
		
		break;
	case 'recaptcha':
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => 'cosmetista' . '_recaptcha_public_key', 
			'title' => esc_html__('reCAPTCHA Public Key', 'cosmetista'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['cosmetista' . '_recaptcha_public_key'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => 'cosmetista' . '_recaptcha_private_key', 
			'title' => esc_html__('reCAPTCHA Private Key', 'cosmetista'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['cosmetista' . '_recaptcha_private_key'], 
			'class' => '' 
		);
		
		break;
	}
	
	return apply_filters('cmsmasters_options_element_fields_filter', $options, $tab);	
}

