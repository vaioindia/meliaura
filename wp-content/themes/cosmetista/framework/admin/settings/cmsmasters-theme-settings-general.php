<?php 
/**
 * @package 	WordPress
 * @subpackage 	Cosmetista
 * @version 	1.0.2
 * 
 * Admin Panel General Options
 * Created by CMSMasters
 * 
 */


function cosmetista_options_general_tabs() {
	$cmsmasters_option = cosmetista_get_global_options();
	
	$tabs = array();
	
	$tabs['general'] = esc_attr__('General', 'cosmetista');
	
	if ($cmsmasters_option['cosmetista' . '_theme_layout'] === 'boxed') {
		$tabs['bg'] = esc_attr__('Background', 'cosmetista');
	}
	
	if (CMSMASTERS_THEME_STYLE_COMPATIBILITY) {
		$tabs['theme_style'] = esc_attr__('Theme Style', 'cosmetista');
	}
	
	$tabs['header'] = esc_attr__('Header', 'cosmetista');
	$tabs['content'] = esc_attr__('Content', 'cosmetista');
	$tabs['footer'] = esc_attr__('Footer', 'cosmetista');
	
	return apply_filters('cmsmasters_options_general_tabs_filter', $tabs);
}


function cosmetista_options_general_sections() {
	$tab = cosmetista_get_the_tab();
	
	switch ($tab) {
	case 'general':
		$sections = array();
		
		$sections['general_section'] = esc_attr__('General Options', 'cosmetista');
		
		break;
	case 'bg':
		$sections = array();
		
		$sections['bg_section'] = esc_attr__('Background Options', 'cosmetista');
		
		break;
	case 'theme_style':
		$sections = array();
		
		$sections['theme_style_section'] = esc_attr__('Theme Design Style', 'cosmetista');
		
		break;
	case 'header':
		$sections = array();
		
		$sections['header_section'] = esc_attr__('Header Options', 'cosmetista');
		
		break;
	case 'content':
		$sections = array();
		
		$sections['content_section'] = esc_attr__('Content Options', 'cosmetista');
		
		break;
	case 'footer':
		$sections = array();
		
		$sections['footer_section'] = esc_attr__('Footer Options', 'cosmetista');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return apply_filters('cmsmasters_options_general_sections_filter', $sections, $tab);
} 


function cosmetista_options_general_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = cosmetista_get_the_tab();
	}
	
	$options = array();
	
	
	$defaults = cosmetista_settings_general_defaults();
	
	
	switch ($tab) {
	case 'general':
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'cosmetista' . '_theme_layout', 
			'title' => esc_html__('Theme Layout', 'cosmetista'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['cosmetista' . '_theme_layout'], 
			'choices' => array( 
				esc_html__('Liquid', 'cosmetista') . '|liquid', 
				esc_html__('Boxed', 'cosmetista') . '|boxed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'cosmetista' . '_logo_type', 
			'title' => esc_html__('Logo Type', 'cosmetista'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['cosmetista' . '_logo_type'], 
			'choices' => array( 
				esc_html__('Image', 'cosmetista') . '|image', 
				esc_html__('Text', 'cosmetista') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'cosmetista' . '_logo_url', 
			'title' => esc_html__('Logo Image', 'cosmetista'), 
			'desc' => esc_html__('Choose your website logo image.', 'cosmetista'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['cosmetista' . '_logo_url'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'cosmetista' . '_logo_url_retina', 
			'title' => esc_html__('Retina Logo Image', 'cosmetista'), 
			'desc' => esc_html__('Choose logo image for retina displays. Logo for Retina displays should be twice the size of the default one.', 'cosmetista'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['cosmetista' . '_logo_url_retina'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'cosmetista' . '_logo_title', 
			'title' => esc_html__('Logo Title', 'cosmetista'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['cosmetista' . '_logo_title'], 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'cosmetista' . '_logo_subtitle', 
			'title' => esc_html__('Logo Subtitle', 'cosmetista'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['cosmetista' . '_logo_subtitle'], 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'cosmetista' . '_logo_custom_color', 
			'title' => esc_html__('Custom Text Colors', 'cosmetista'), 
			'desc' => esc_html__('enable', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_logo_custom_color'] 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'cosmetista' . '_logo_title_color', 
			'title' => esc_html__('Logo Title Color', 'cosmetista'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['cosmetista' . '_logo_title_color'] 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'cosmetista' . '_logo_subtitle_color', 
			'title' => esc_html__('Logo Subtitle Color', 'cosmetista'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['cosmetista' . '_logo_subtitle_color'] 
		);
		
		break;
	case 'bg':
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'cosmetista' . '_bg_col', 
			'title' => esc_html__('Background Color', 'cosmetista'), 
			'desc' => '', 
			'type' => 'color', 
			'std' => $defaults[$tab]['cosmetista' . '_bg_col'] 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'cosmetista' . '_bg_img_enable', 
			'title' => esc_html__('Background Image Visibility', 'cosmetista'), 
			'desc' => esc_html__('show', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_bg_img_enable'] 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'cosmetista' . '_bg_img', 
			'title' => esc_html__('Background Image', 'cosmetista'), 
			'desc' => esc_html__('Choose your custom website background image url.', 'cosmetista'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['cosmetista' . '_bg_img'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'cosmetista' . '_bg_rep', 
			'title' => esc_html__('Background Repeat', 'cosmetista'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['cosmetista' . '_bg_rep'], 
			'choices' => array( 
				esc_html__('No Repeat', 'cosmetista') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'cosmetista') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'cosmetista') . '|repeat-y', 
				esc_html__('Repeat', 'cosmetista') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'cosmetista' . '_bg_pos', 
			'title' => esc_html__('Background Position', 'cosmetista'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['cosmetista' . '_bg_pos'], 
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
			'section' => 'bg_section', 
			'id' => 'cosmetista' . '_bg_att', 
			'title' => esc_html__('Background Attachment', 'cosmetista'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['cosmetista' . '_bg_att'], 
			'choices' => array( 
				esc_html__('Scroll', 'cosmetista') . '|scroll', 
				esc_html__('Fixed', 'cosmetista') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'cosmetista' . '_bg_size', 
			'title' => esc_html__('Background Size', 'cosmetista'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['cosmetista' . '_bg_size'], 
			'choices' => array( 
				esc_html__('Auto', 'cosmetista') . '|auto', 
				esc_html__('Cover', 'cosmetista') . '|cover', 
				esc_html__('Contain', 'cosmetista') . '|contain' 
			) 
		);
		
		break;
	case 'theme_style':
		$options[] = array( 
			'section' => 'theme_style_section', 
			'id' => 'cosmetista' . '_theme_style', 
			'title' => esc_html__('Choose Theme Style', 'cosmetista'), 
			'desc' => '', 
			'type' => 'select_theme_style', 
			'std' => '', 
			'choices' => cosmetista_all_theme_styles() 
		);
		
		break;
	case 'header':
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'cosmetista' . '_fixed_header', 
			'title' => esc_html__('Fixed Header', 'cosmetista'), 
			'desc' => esc_html__('enable', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_fixed_header'] 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'cosmetista' . '_header_overlaps', 
			'title' => esc_html__('Header Overlaps Content by Default', 'cosmetista'), 
			'desc' => esc_html__('enable', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_header_overlaps'] 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'cosmetista' . '_header_top_line', 
			'title' => esc_html__('Top Line', 'cosmetista'), 
			'desc' => esc_html__('show', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_header_top_line'] 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'cosmetista' . '_header_top_height', 
			'title' => esc_html__('Top Height', 'cosmetista'), 
			'desc' => esc_html__('pixels', 'cosmetista'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['cosmetista' . '_header_top_height'], 
			'min' => '10' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'cosmetista' . '_header_top_line_short_info', 
			'title' => esc_html__('Top Short Info', 'cosmetista'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'cosmetista') . '</strong>', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['cosmetista' . '_header_top_line_short_info'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'cosmetista' . '_header_top_line_add_cont', 
			'title' => esc_html__('Top Additional Content', 'cosmetista'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['cosmetista' . '_header_top_line_add_cont'], 
			'choices' => array( 
				esc_html__('None', 'cosmetista') . '|none', 
				esc_html__('Top Line Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'cosmetista') . '|social', 
				esc_html__('Top Line Navigation (will be shown if set in Appearance - Menus tab)', 'cosmetista') . '|nav' 
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'cosmetista' . '_header_styles', 
			'title' => esc_html__('Header Styles', 'cosmetista'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['cosmetista' . '_header_styles'], 
			'choices' => array( 
				esc_html__('Default Style', 'cosmetista') . '|default', 
				esc_html__('Compact Style Left Navigation', 'cosmetista') . '|l_nav', 
				esc_html__('Compact Style Right Navigation', 'cosmetista') . '|r_nav', 
				esc_html__('Compact Style Center Navigation', 'cosmetista') . '|c_nav'
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'cosmetista' . '_header_mid_height', 
			'title' => esc_html__('Header Middle Height', 'cosmetista'), 
			'desc' => esc_html__('pixels', 'cosmetista'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['cosmetista' . '_header_mid_height'], 
			'min' => '40' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'cosmetista' . '_header_bot_height', 
			'title' => esc_html__('Header Bottom Height', 'cosmetista'), 
			'desc' => esc_html__('pixels', 'cosmetista'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['cosmetista' . '_header_bot_height'], 
			'min' => '20' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'cosmetista' . '_header_search', 
			'title' => esc_html__('Header Search', 'cosmetista'), 
			'desc' => esc_html__('show', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_header_search'] 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'cosmetista' . '_header_add_cont', 
			'title' => esc_html__('Header Additional Content', 'cosmetista'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['cosmetista' . '_header_add_cont'], 
			'choices' => array( 
				esc_html__('None', 'cosmetista') . '|none', 
				esc_html__('Header Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'cosmetista') . '|social', 
				esc_html__('Header Custom HTML', 'cosmetista') . '|cust_html' 
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'cosmetista' . '_header_add_cont_cust_html', 
			'title' => esc_html__('Header Custom HTML', 'cosmetista'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'cosmetista') . '</strong>', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['cosmetista' . '_header_add_cont_cust_html'], 
			'class' => '' 
		);
		
		break;
	case 'content':
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'cosmetista' . '_layout', 
			'title' => esc_html__('Layout Type by Default', 'cosmetista'), 
			'desc' => esc_html__('Choosing layout with a sidebar please make sure to add widgets to the Sidebar in the Appearance - Widgets tab. The empty sidebar won\'t be displayed.', 'cosmetista'), 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['cosmetista' . '_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'cosmetista') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'cosmetista') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'cosmetista') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'cosmetista' . '_archives_layout', 
			'title' => esc_html__('Archives Layout Type', 'cosmetista'), 
			'desc' => esc_html__('Choosing layout with a sidebar please make sure to add widgets to the Archive Sidebar in the Appearance - Widgets tab. The empty sidebar won\'t be displayed.', 'cosmetista'), 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['cosmetista' . '_archives_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'cosmetista') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'cosmetista') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'cosmetista') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'cosmetista' . '_search_layout', 
			'title' => esc_html__('Search Layout Type', 'cosmetista'), 
			'desc' => esc_html__('Choosing layout with a sidebar please make sure to add widgets to the Search Sidebar in the Appearance - Widgets tab. The empty sidebar won\'t be displayed.', 'cosmetista'), 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['cosmetista' . '_search_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'cosmetista') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'cosmetista') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'cosmetista') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'cosmetista' . '_other_layout', 
			'title' => esc_html__('Other Layout Type', 'cosmetista'), 
			'desc' => esc_html__('Layout for pages of non-listed types. Choosing layout with a sidebar please make sure to add widgets to the Sidebar in the Appearance - Widgets tab. The empty sidebar won\'t be displayed.', 'cosmetista'), 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['cosmetista' . '_other_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'cosmetista') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'cosmetista') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'cosmetista') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'cosmetista' . '_heading_alignment', 
			'title' => esc_html__('Heading Alignment by Default', 'cosmetista'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['cosmetista' . '_heading_alignment'], 
			'choices' => array( 
				esc_html__('Left', 'cosmetista') . '|left', 
				esc_html__('Right', 'cosmetista') . '|right', 
				esc_html__('Center', 'cosmetista') . '|center' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'cosmetista' . '_heading_scheme', 
			'title' => esc_html__('Heading Color Scheme by Default', 'cosmetista'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => $defaults[$tab]['cosmetista' . '_heading_scheme'], 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'cosmetista' . '_heading_bg_image_enable', 
			'title' => esc_html__('Heading Background Image Visibility by Default', 'cosmetista'), 
			'desc' => esc_html__('show', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_heading_bg_image_enable'] 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'cosmetista' . '_heading_bg_image', 
			'title' => esc_html__('Heading Background Image by Default', 'cosmetista'), 
			'desc' => esc_html__('Choose your custom heading background image by default.', 'cosmetista'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['cosmetista' . '_heading_bg_image'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'cosmetista' . '_heading_bg_repeat', 
			'title' => esc_html__('Heading Background Repeat by Default', 'cosmetista'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['cosmetista' . '_heading_bg_repeat'], 
			'choices' => array( 
				esc_html__('No Repeat', 'cosmetista') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'cosmetista') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'cosmetista') . '|repeat-y', 
				esc_html__('Repeat', 'cosmetista') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'cosmetista' . '_heading_bg_attachment', 
			'title' => esc_html__('Heading Background Attachment by Default', 'cosmetista'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['cosmetista' . '_heading_bg_attachment'], 
			'choices' => array( 
				esc_html__('Scroll', 'cosmetista') . '|scroll', 
				esc_html__('Fixed', 'cosmetista') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'cosmetista' . '_heading_bg_size', 
			'title' => esc_html__('Heading Background Size by Default', 'cosmetista'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['cosmetista' . '_heading_bg_size'], 
			'choices' => array( 
				esc_html__('Auto', 'cosmetista') . '|auto', 
				esc_html__('Cover', 'cosmetista') . '|cover', 
				esc_html__('Contain', 'cosmetista') . '|contain' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'cosmetista' . '_heading_bg_color', 
			'title' => esc_html__('Heading Background Color Overlay by Default', 'cosmetista'), 
			'desc' => '',  
			'type' => 'rgba', 
			'std' => $defaults[$tab]['cosmetista' . '_heading_bg_color'] 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'cosmetista' . '_heading_height', 
			'title' => esc_html__('Heading Height by Default', 'cosmetista'), 
			'desc' => esc_html__('pixels', 'cosmetista'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['cosmetista' . '_heading_height'], 
			'min' => '0' 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'cosmetista' . '_breadcrumbs', 
			'title' => esc_html__('Breadcrumbs Visibility by Default', 'cosmetista'), 
			'desc' => esc_html__('show', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_breadcrumbs'] 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'cosmetista' . '_bottom_scheme', 
			'title' => esc_html__('Bottom Color Scheme', 'cosmetista'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => $defaults[$tab]['cosmetista' . '_bottom_scheme'], 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'cosmetista' . '_bottom_sidebar', 
			'title' => esc_html__('Bottom Sidebar Visibility by Default', 'cosmetista'), 
			'desc' => esc_html__('show', 'cosmetista') . '<br><br>' . esc_html__('Please make sure to add widgets in the Appearance - Widgets tab. The empty sidebar won\'t be displayed.', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_bottom_sidebar'] 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'cosmetista' . '_bottom_sidebar_layout', 
			'title' => esc_html__('Bottom Sidebar Layout by Default', 'cosmetista'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['cosmetista' . '_bottom_sidebar_layout'], 
			'choices' => array( 
				'1/1|11', 
				'1/2 + 1/2|1212', 
				'1/3 + 2/3|1323', 
				'2/3 + 1/3|2313', 
				'1/4 + 3/4|1434', 
				'3/4 + 1/4|3414', 
				'1/3 + 1/3 + 1/3|131313', 
				'1/2 + 1/4 + 1/4|121414', 
				'1/4 + 1/2 + 1/4|141214', 
				'1/4 + 1/4 + 1/2|141412', 
				'1/4 + 1/4 + 1/4 + 1/4|14141414' 
			) 
		);
		
		break;
	case 'footer':
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'cosmetista' . '_footer_scheme', 
			'title' => esc_html__('Footer Color Scheme', 'cosmetista'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => $defaults[$tab]['cosmetista' . '_footer_scheme'], 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'cosmetista' . '_footer_type', 
			'title' => esc_html__('Footer Type', 'cosmetista'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['cosmetista' . '_footer_type'], 
			'choices' => array( 
				esc_html__('Default', 'cosmetista') . '|default', 
				esc_html__('Small', 'cosmetista') . '|small' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'cosmetista' . '_footer_additional_content', 
			'title' => esc_html__('Footer Additional Content', 'cosmetista'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['cosmetista' . '_footer_additional_content'], 
			'choices' => array( 
				esc_html__('None', 'cosmetista') . '|none', 
				esc_html__('Footer Navigation (will be shown if set in Appearance - Menus tab)', 'cosmetista') . '|nav', 
				esc_html__('Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'cosmetista') . '|social', 
				esc_html__('Custom HTML', 'cosmetista') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'cosmetista' . '_footer_logo', 
			'title' => esc_html__('Footer Logo', 'cosmetista'), 
			'desc' => esc_html__('show', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_footer_logo'] 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'cosmetista' . '_footer_logo_url', 
			'title' => esc_html__('Footer Logo', 'cosmetista'), 
			'desc' => esc_html__('Choose your website footer logo image.', 'cosmetista'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['cosmetista' . '_footer_logo_url'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'cosmetista' . '_footer_logo_url_retina', 
			'title' => esc_html__('Footer Logo for Retina', 'cosmetista'), 
			'desc' => esc_html__('Choose your website footer logo image for retina.', 'cosmetista'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['cosmetista' . '_footer_logo_url_retina'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'cosmetista' . '_footer_nav', 
			'title' => esc_html__('Footer Navigation', 'cosmetista'), 
			'desc' => esc_html__('show', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_footer_nav'] 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'cosmetista' . '_footer_social', 
			'title' => esc_html__('Footer Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'cosmetista'), 
			'desc' => esc_html__('show', 'cosmetista'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['cosmetista' . '_footer_social'] 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'cosmetista' . '_footer_html', 
			'title' => esc_html__('Footer Custom HTML', 'cosmetista'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'cosmetista') . '</strong>', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['cosmetista' . '_footer_html'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'cosmetista' . '_footer_copyright', 
			'title' => esc_html__('Copyright Text', 'cosmetista'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['cosmetista' . '_footer_copyright'], 
			'class' => '' 
		);
		
		break;
	}
	
	return apply_filters('cmsmasters_options_general_fields_filter', $options, $tab);
}

