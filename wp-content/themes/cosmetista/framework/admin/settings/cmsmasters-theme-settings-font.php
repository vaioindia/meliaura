<?php 
/**
 * @package 	WordPress
 * @subpackage 	Cosmetista
 * @version		1.0.2
 * 
 * Admin Panel Fonts Options
 * Created by CMSMasters
 * 
 */


function cosmetista_options_font_tabs() {
	$tabs = array();
	
	$tabs['content'] = esc_attr__('Content', 'cosmetista');
	$tabs['link'] = esc_attr__('Links', 'cosmetista');
	$tabs['nav'] = esc_attr__('Navigation', 'cosmetista');
	$tabs['heading'] = esc_attr__('Heading', 'cosmetista');
	$tabs['other'] = esc_attr__('Other', 'cosmetista');
	$tabs['google'] = esc_attr__('Google Fonts', 'cosmetista');
	
	return apply_filters('cmsmasters_options_font_tabs_filter', $tabs);
}


function cosmetista_options_font_sections() {
	$tab = cosmetista_get_the_tab();
	
	switch ($tab) {
	case 'content':
		$sections = array();
		
		$sections['content_section'] = esc_html__('Content Font Options', 'cosmetista');
		
		break;
	case 'link':
		$sections = array();
		
		$sections['link_section'] = esc_html__('Links Font Options', 'cosmetista');
		
		break;
	case 'nav':
		$sections = array();
		
		$sections['nav_section'] = esc_html__('Navigation Font Options', 'cosmetista');
		
		break;
	case 'heading':
		$sections = array();
		
		$sections['heading_section'] = esc_html__('Headings Font Options', 'cosmetista');
		
		break;
	case 'other':
		$sections = array();
		
		$sections['other_section'] = esc_html__('Other Fonts Options', 'cosmetista');
		
		break;
	case 'google':
		$sections = array();
		
		$sections['google_section'] = esc_html__('Serving Google Fonts from CDN', 'cosmetista');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return apply_filters('cmsmasters_options_font_sections_filter', $sections, $tab);
} 


function cosmetista_options_font_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = cosmetista_get_the_tab();
	}
	
	
	$options = array();
	
	
	$defaults = cosmetista_settings_font_defaults();
	
	
	switch ($tab) {
	case 'content':
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'cosmetista' . '_content_font', 
			'title' => esc_html__('Main Content Font', 'cosmetista'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['cosmetista' . '_content_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style' 
			) 
		);
		
		break;
	case 'link':
		$options[] = array( 
			'section' => 'link_section', 
			'id' => 'cosmetista' . '_link_font', 
			'title' => esc_html__('Links Font', 'cosmetista'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['cosmetista' . '_link_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'link_section', 
			'id' => 'cosmetista' . '_link_hover_decoration', 
			'title' => esc_html__('Links Hover Text Decoration', 'cosmetista'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => $defaults[$tab]['cosmetista' . '_link_hover_decoration'], 
			'choices' => cosmetista_text_decoration_list() 
		);
		
		break;
	case 'nav':
		$options[] = array( 
			'section' => 'nav_section', 
			'id' => 'cosmetista' . '_nav_title_font', 
			'title' => esc_html__('Navigation Title Font', 'cosmetista'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['cosmetista' . '_nav_title_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		$options[] = array( 
			'section' => 'nav_section', 
			'id' => 'cosmetista' . '_nav_dropdown_font', 
			'title' => esc_html__('Navigation Dropdown Font', 'cosmetista'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['cosmetista' . '_nav_dropdown_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		break;
	case 'heading':
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'cosmetista' . '_h1_font', 
			'title' => esc_html__('H1 Tag Font', 'cosmetista'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['cosmetista' . '_h1_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'cosmetista' . '_h2_font', 
			'title' => esc_html__('H2 Tag Font', 'cosmetista'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['cosmetista' . '_h2_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'cosmetista' . '_h3_font', 
			'title' => esc_html__('H3 Tag Font', 'cosmetista'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['cosmetista' . '_h3_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'cosmetista' . '_h4_font', 
			'title' => esc_html__('H4 Tag Font', 'cosmetista'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['cosmetista' . '_h4_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'cosmetista' . '_h5_font', 
			'title' => esc_html__('H5 Tag Font', 'cosmetista'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['cosmetista' . '_h5_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'cosmetista' . '_h6_font', 
			'title' => esc_html__('H6 Tag Font', 'cosmetista'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['cosmetista' . '_h6_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		break;
	case 'other':
		$options[] = array( 
			'section' => 'other_section', 
			'id' => 'cosmetista' . '_button_font', 
			'title' => esc_html__('Button Font', 'cosmetista'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['cosmetista' . '_button_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		$options[] = array( 
			'section' => 'other_section', 
			'id' => 'cosmetista' . '_small_font', 
			'title' => esc_html__('Small Tag Font', 'cosmetista'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['cosmetista' . '_small_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		$options[] = array( 
			'section' => 'other_section', 
			'id' => 'cosmetista' . '_input_font', 
			'title' => esc_html__('Text Fields Font', 'cosmetista'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['cosmetista' . '_input_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style' 
			) 
		);
		
		$options[] = array( 
			'section' => 'other_section', 
			'id' => 'cosmetista' . '_quote_font', 
			'title' => esc_html__('Blockquote Font', 'cosmetista'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['cosmetista' . '_quote_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style' 
			) 
		);
		
		break;
	case 'google':
		$options[] = array( 
			'section' => 'google_section', 
			'id' => 'cosmetista' . '_google_web_fonts', 
			'title' => esc_html__('Google Fonts', 'cosmetista'), 
			'desc' => '', 
			'type' => 'google_web_fonts', 
			'std' => $defaults[$tab]['cosmetista' . '_google_web_fonts'] 
		);
		
		$options[] = array( 
			'section' => 'google_section', 
			'id' => 'cosmetista' . '_google_web_fonts_subset', 
			'title' => esc_html__('Google Fonts Subset', 'cosmetista'), 
			'desc' => '', 
			'type' => 'select_multiple', 
			'std' => '', 
			'choices' => array( 
				esc_html__('Latin Extended', 'cosmetista') . '|' . 'latin-ext', 
				esc_html__('Arabic', 'cosmetista') . '|' . 'arabic', 
				esc_html__('Cyrillic', 'cosmetista') . '|' . 'cyrillic', 
				esc_html__('Cyrillic Extended', 'cosmetista') . '|' . 'cyrillic-ext', 
				esc_html__('Greek', 'cosmetista') . '|' . 'greek', 
				esc_html__('Greek Extended', 'cosmetista') . '|' . 'greek-ext', 
				esc_html__('Vietnamese', 'cosmetista') . '|' . 'vietnamese', 
				esc_html__('Japanese', 'cosmetista') . '|' . 'japanese', 
				esc_html__('Korean', 'cosmetista') . '|' . 'korean', 
				esc_html__('Thai', 'cosmetista') . '|' . 'thai', 
				esc_html__('Bengali', 'cosmetista') . '|' . 'bengali', 
				esc_html__('Devanagari', 'cosmetista') . '|' . 'devanagari', 
				esc_html__('Gujarati', 'cosmetista') . '|' . 'gujarati', 
				esc_html__('Gurmukhi', 'cosmetista') . '|' . 'gurmukhi', 
				esc_html__('Hebrew', 'cosmetista') . '|' . 'hebrew', 
				esc_html__('Kannada', 'cosmetista') . '|' . 'kannada', 
				esc_html__('Khmer', 'cosmetista') . '|' . 'khmer', 
				esc_html__('Malayalam', 'cosmetista') . '|' . 'malayalam', 
				esc_html__('Myanmar', 'cosmetista') . '|' . 'myanmar', 
				esc_html__('Oriya', 'cosmetista') . '|' . 'oriya', 
				esc_html__('Sinhala', 'cosmetista') . '|' . 'sinhala', 
				esc_html__('Tamil', 'cosmetista') . '|' . 'tamil', 
				esc_html__('Telugu', 'cosmetista') . '|' . 'telugu' 
			) 
		);
		
		break;
	}
	
	return apply_filters('cmsmasters_options_font_fields_filter', $options, $tab);	
}

