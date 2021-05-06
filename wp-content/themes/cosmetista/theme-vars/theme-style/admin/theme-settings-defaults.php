<?php 
/**
 * @package 	WordPress
 * @subpackage 	Cosmetista
 * @version		1.0.2
 * 
 * Theme Settings Defaults
 * Created by CMSMasters
 * 
 */


/* Theme Settings General Default Values */
if (!function_exists('cosmetista_settings_general_defaults')) {

function cosmetista_settings_general_defaults($id = false) {
	$settings = array( 
		'general' => array( 
			'cosmetista' . '_theme_layout' => 		'liquid', 
			'cosmetista' . '_logo_type' => 			'image', 
			'cosmetista' . '_logo_url' => 			'|' . get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo.png', 
			'cosmetista' . '_logo_url_retina' => 	'|' . get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo_retina.png', 
			'cosmetista' . '_logo_title' => 		get_bloginfo('name') ? get_bloginfo('name') : 'Cosmetista', 
			'cosmetista' . '_logo_subtitle' => 		'', 
			'cosmetista' . '_logo_custom_color' => 	0, 
			'cosmetista' . '_logo_title_color' => 	'', 
			'cosmetista' . '_logo_subtitle_color' => '' 
		), 
		'bg' => array( 
			'cosmetista' . '_bg_col' => 			'#ffffff', 
			'cosmetista' . '_bg_img_enable' => 		0, 
			'cosmetista' . '_bg_img' => 			'', 
			'cosmetista' . '_bg_rep' => 			'no-repeat', 
			'cosmetista' . '_bg_pos' => 			'top center', 
			'cosmetista' . '_bg_att' => 			'scroll', 
			'cosmetista' . '_bg_size' => 			'cover' 
		), 
		'header' => array( 
			'cosmetista' . '_fixed_header' => 				1, 
			'cosmetista' . '_header_overlaps' => 			0, 
			'cosmetista' . '_header_top_line' => 			0, 
			'cosmetista' . '_header_top_height' => 			'45', 
			'cosmetista' . '_header_top_line_short_info' => '', 
			'cosmetista' . '_header_top_line_add_cont' => 	'nav', 
			'cosmetista' . '_header_styles' => 				'c_nav', 
			'cosmetista' . '_header_mid_height' => 			'128', 
			'cosmetista' . '_header_bot_height' => 			'46', 
			'cosmetista' . '_header_search' => 				0, 
			'cosmetista' . '_header_add_cont' => 			'none', 
			'cosmetista' . '_header_add_cont_cust_html' => 	'',
			'cosmetista' . '_woocommerce_cart_dropdown' => 	0, 
		), 
		'content' => array( 
			'cosmetista' . '_layout' => 				'r_sidebar', 
			'cosmetista' . '_archives_layout' => 		'r_sidebar', 
			'cosmetista' . '_search_layout' => 			'r_sidebar', 
			'cosmetista' . '_other_layout' => 			'r_sidebar', 
			'cosmetista' . '_heading_alignment' => 		'center', 
			'cosmetista' . '_heading_scheme' => 		'default', 
			'cosmetista' . '_heading_bg_image_enable' => 0, 
			'cosmetista' . '_heading_bg_image' => 		'', 
			'cosmetista' . '_heading_bg_repeat' => 		'no-repeat', 
			'cosmetista' . '_heading_bg_attachment' => 	'scroll', 
			'cosmetista' . '_heading_bg_size' => 		'cover', 
			'cosmetista' . '_heading_bg_color' => 		'', 
			'cosmetista' . '_heading_height' => 		'165', 
			'cosmetista' . '_breadcrumbs' => 			1, 
			'cosmetista' . '_bottom_scheme' => 			'default', 
			'cosmetista' . '_bottom_sidebar' => 		0, 
			'cosmetista' . '_bottom_sidebar_layout' => 	'14141414' 
		), 
		'footer' => array( 
			'cosmetista' . '_footer_scheme' => 				'footer', 
			'cosmetista' . '_footer_type' => 				'small', 
			'cosmetista' . '_footer_additional_content' => 	'nav', 
			'cosmetista' . '_footer_logo' => 				1, 
			'cosmetista' . '_footer_logo_url' => 			'|' . get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo_footer.png', 
			'cosmetista' . '_footer_logo_url_retina' => 	'|' . get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo_footer_retina.png', 
			'cosmetista' . '_footer_nav' => 				1, 
			'cosmetista' . '_footer_social' => 				1, 
			'cosmetista' . '_footer_html' => 				'', 
			'cosmetista' . '_footer_copyright' => 			'&copy; ' . date('Y') . ' Cosmetista. ' . esc_html__('All Rights Reserved', 'cosmetista') 
		) 
	);
	
	
	$settings = apply_filters('cosmetista_settings_general_defaults_filter', $settings);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



/* Theme Settings Fonts Default Values */
if (!function_exists('cosmetista_settings_font_defaults')) {

function cosmetista_settings_font_defaults($id = false) {
	$settings = array( 
		'content' => array( 
			'cosmetista' . '_content_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Crimson+Text:400,400i,600,600i,700,700i', 
				'font_size' => 			'17', 
				'line_height' => 		'26', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal' 
			) 
		), 
		'link' => array( 
			'cosmetista' . '_link_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Crimson+Text:400,400i,600,600i,700,700i', 
				'font_size' => 			'17', 
				'line_height' => 		'26', 
				'font_weight' => 		'normal', 
				'font_style' => 		'italic', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'cosmetista' . '_link_hover_decoration' => 	'none' 
		), 
		'nav' => array( 
			'cosmetista' . '_nav_title_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Open+Sans:300,300italic,400,400italic,700,700italic', 
				'font_size' => 			'12', 
				'line_height' => 		'20', 
				'font_weight' => 		'bold', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase' 
			), 
			'cosmetista' . '_nav_dropdown_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Open+Sans:300,300italic,400,400italic,700,700italic', 
				'font_size' => 			'11', 
				'line_height' => 		'18', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase' 
			) 
		), 
		'heading' => array( 
			'cosmetista' . '_h1_font' => array( 
				'system_font' => 		"Georgia, Times, 'Century Schoolbook L', serif", 
				'google_font' => 		'Josefin+Sans:400,400i,600,600i,700,700i', 
				'font_size' => 			'36', 
				'line_height' => 		'50', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'cosmetista' . '_h2_font' => array( 
				'system_font' => 		"Georgia, Times, 'Century Schoolbook L', serif", 
				'google_font' => 		'Josefin+Sans:400,400i,600,600i,700,700i', 
				'font_size' => 			'26', 
				'line_height' => 		'36', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'cosmetista' . '_h3_font' => array( 
				'system_font' => 		"Georgia, Times, 'Century Schoolbook L', serif", 
				'google_font' => 		'Josefin+Sans:400,400i,600,600i,700,700i', 
				'font_size' => 			'18', 
				'line_height' => 		'24', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'cosmetista' . '_h4_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Open+Sans:300,300italic,400,400italic,700,700italic', 
				'font_size' => 			'14', 
				'line_height' => 		'20', 
				'font_weight' => 		'bold', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'cosmetista' . '_h5_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Open+Sans:300,300italic,400,400italic,700,700italic', 
				'font_size' => 			'12', 
				'line_height' => 		'20', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase', 
				'text_decoration' => 	'none' 
			), 
			'cosmetista' . '_h6_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Crimson+Text:400,400i,600,600i,700,700i', 
				'font_size' => 			'15', 
				'line_height' => 		'20', 
				'font_weight' => 		'normal', 
				'font_style' => 		'italic', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			) 
		), 
		'other' => array( 
			'cosmetista' . '_button_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Open+Sans:300,300italic,400,400italic,700,700italic', 
				'font_size' => 			'11', 
				'line_height' => 		'38', 
				'font_weight' => 		'bold', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase' 
			), 
			'cosmetista' . '_small_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Crimson+Text:400,400i,600,600i,700,700i', 
				'font_size' => 			'15', 
				'line_height' => 		'20', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none' 
			), 
			'cosmetista' . '_input_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Crimson+Text:400,400i,600,600i,700,700i', 
				'font_size' => 			'15', 
				'line_height' => 		'20', 
				'font_weight' => 		'normal', 
				'font_style' => 		'italic' 
			), 
			'cosmetista' . '_quote_font' => array( 
				'system_font' => 		"Georgia, Times, 'Century Schoolbook L', serif", 
				'google_font' => 		'Josefin+Sans:400,400i,600,600i,700,700i', 
				'font_size' => 			'18', 
				'line_height' => 		'28', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal' 
			) 
		), 
		'google' => array( 
			'cosmetista' . '_google_web_fonts' => array( 
				'Crimson+Text:400,400i,600,600i,700,700i|Crimson Text', 
				'Josefin+Sans:400,400i,600,600i,700,700i|Josefin Sans', 
				'Roboto:300,300italic,400,400italic,500,500italic,700,700italic|Roboto', 
				'Roboto+Condensed:400,400italic,700,700italic|Roboto Condensed', 
				'Open+Sans:300,300italic,400,400italic,700,700italic|Open Sans', 
				'Open+Sans+Condensed:300,300italic,700|Open Sans Condensed', 
				'Droid+Sans:400,700|Droid Sans', 
				'Droid+Serif:400,400italic,700,700italic|Droid Serif', 
				'PT+Sans:400,400italic,700,700italic|PT Sans', 
				'PT+Sans+Caption:400,700|PT Sans Caption', 
				'PT+Sans+Narrow:400,700|PT Sans Narrow', 
				'PT+Serif:400,400italic,700,700italic|PT Serif', 
				'Ubuntu:400,400italic,700,700italic|Ubuntu', 
				'Ubuntu+Condensed|Ubuntu Condensed', 
				'Headland+One|Headland One', 
				'Source+Sans+Pro:300,300italic,400,400italic,700,700italic|Source Sans Pro', 
				'Lato:400,400italic,700,700italic|Lato', 
				'Cuprum:400,400italic,700,700italic|Cuprum', 
				'Oswald:300,400,700|Oswald', 
				'Yanone+Kaffeesatz:300,400,700|Yanone Kaffeesatz', 
				'Lobster|Lobster', 
				'Lobster+Two:400,400italic,700,700italic|Lobster Two', 
				'Questrial|Questrial', 
				'Raleway:300,400,500,600,700|Raleway', 
				'Dosis:300,400,500,700|Dosis', 
				'Cutive+Mono|Cutive Mono', 
				'Quicksand:300,400,700|Quicksand', 
				'Montserrat:400,700|Montserrat', 
				'Cookie|Cookie', 
			) 
		) 
	);
	
	
	$settings = apply_filters('cosmetista_settings_font_defaults_filter', $settings);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



// WP Color Picker Palettes
if (!function_exists('cmsmasters_color_picker_palettes')) {

function cmsmasters_color_picker_palettes() {
	$palettes = array( 
		'#616161', 
		'#f36eae', 
		'#929292', 
		'#191919', 
		'#ffffff', 
		'#fafafa', 
		'#d9d9d9'
	);
	
	
	return $palettes;
}

}



// Theme Settings Color Schemes Default Colors
if (!function_exists('cosmetista_color_schemes_defaults')) {

function cosmetista_color_schemes_defaults($id = false) {
	$settings = array( 
		'default' => array( // content default color scheme
			'color' => 		'#616161', 
			'link' => 		'#f36eae', 
			'hover' => 		'#929292', 
			'heading' => 	'#191919', 
			'bg' => 		'#ffffff', 
			'alternate' => 	'#fafafa', 
			'border' => 	'#e0e0e0' 
		), 
		'header' => array( // Header color scheme
			'mid_color' => 		'#616161', 
			'mid_link' => 		'#191919', 
			'mid_hover' => 		'#929292', 
			'mid_bg' => 		'#ffffff', 
			'mid_bg_scroll' => 	'#ffffff', 
			'mid_border' => 	'#e5e5e5', 
			'bot_color' => 		'#616161', 
			'bot_link' => 		'#191919', 
			'bot_hover' => 		'#929292', 
			'bot_bg' => 		'#ffffff', 
			'bot_bg_scroll' => 	'#ffffff', 
			'bot_border' => 	'#e5e5e5' 
		), 
		'navigation' => array( // Navigation color scheme
			'title_link' => 			'#191919', 
			'title_link_hover' => 		'#f36eae', 
			'title_link_current' => 	'#929292', 
			'title_link_subtitle' => 	'#b8b8b8', 
			'title_link_bg' => 			'rgba(255,255,255,0)', 
			'title_link_bg_hover' => 	'rgba(255,255,255,0)', 
			'title_link_bg_current' => 	'rgba(255,255,255,0)', 
			'title_link_border' => 		'rgba(255,255,255,0)', 
			'dropdown_text' => 			'#616161', 
			'dropdown_bg' => 			'#ffffff', 
			'dropdown_border' => 		'#d9d9d9', 
			'dropdown_link' => 			'#191919', 
			'dropdown_link_hover' => 	'#929292', 
			'dropdown_link_subtitle' => '#b8b8b8', 
			'dropdown_link_highlight' => '#ffffff', 
			'dropdown_link_border' => 	'#ffffff' 
		), 
		'header_top' => array( // Header Top color scheme
			'color' => 					'#616161', 
			'link' => 					'#191919', 
			'hover' => 					'#929292', 
			'bg' => 					'#ffffff', 
			'border' => 				'#d9d9d9', 
			'title_link' => 			'#191919', 
			'title_link_hover' => 		'#929292', 
			'title_link_bg' => 			'#ffffff', 
			'title_link_bg_hover' => 	'#ffffff', 
			'title_link_border' => 		'rgba(255,255,255,0)', 
			'dropdown_bg' => 			'#ffffff', 
			'dropdown_border' => 		'#d9d9d9', 
			'dropdown_link' => 			'#191919', 
			'dropdown_link_hover' => 	'#929292', 
			'dropdown_link_highlight' => '#ffffff', 
			'dropdown_link_border' => 	'#ffffff' 
		), 
		'footer' => array( // Footer color scheme
			'color' => 		'#999999', 
			'link' => 		'#ffffff', 
			'hover' => 		'#aaaaaa', 
			'heading' => 	'#ffffff', 
			'bg' => 		'#0a0a0a', 
			'alternate' => 	'#fafafa', 
			'border' => 	'#0a0a0a' 
		), 
		'first' => array( // custom color scheme 1
			'color' => 		'#baadaa', 
			'link' => 		'#848180', 
			'hover' => 		'#272220', 
			'heading' => 	'#272220', 
			'bg' => 		'#f8efea', 
			'alternate' => 	'#ffffff', 
			'border' => 	'#ebebeb' 
		), 
		'second' => array( // custom color scheme 2
			'color' => 		'#929292', 
			'link' => 		'#f36eae', 
			'hover' => 		'#929292', 
			'heading' => 	'#ffffff', 
			'bg' => 		'#191919', 
			'alternate' => 	'#191919', 
			'border' => 	'#616161' 
		), 
		'third' => array( // custom color scheme 3
			'color' => 		'#616161', 
			'link' => 		'#f36eae', 
			'hover' => 		'#929292', 
			'heading' => 	'#191919', 
			'bg' => 		'#ffffff', 
			'alternate' => 	'#fafafa', 
			'border' => 	'#e0e0e0' 
		) 
	);
	
	
	$settings = apply_filters('cosmetista_color_schemes_defaults_filter', $settings);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



// Theme Settings Elements Default Values
if (!function_exists('cosmetista_settings_element_defaults')) {

function cosmetista_settings_element_defaults($id = false) {
	$settings = array( 
		'sidebar' => array( 
			'cosmetista' . '_sidebar' => 	'' 
		), 
		'icon' => array( 
			'cosmetista' . '_social_icons' => array( 
				'cmsmasters-icon-facebook-1|#|' . esc_html__('Facebook', 'cosmetista') . '|true||', 
				'cmsmasters-icon-twitter|#|' . esc_html__('Twitter', 'cosmetista') . '|true||', 
				'cmsmasters-icon-custom-instagram|#|' . esc_html__('Instagram', 'cosmetista') . '|true||', 
				'cmsmasters-icon-heart-1|#|' . esc_html__('Bloglovin', 'cosmetista') . '|true||', 
				'cmsmasters-icon-pinterest-circled|#|' . esc_html__('Pinterest', 'cosmetista') . '|true||' 
			) 
		), 
		'lightbox' => array( 
			'cosmetista' . '_ilightbox_skin' => 				'dark', 
			'cosmetista' . '_ilightbox_path' => 				'vertical', 
			'cosmetista' . '_ilightbox_infinite' => 			0, 
			'cosmetista' . '_ilightbox_aspect_ratio' => 		1, 
			'cosmetista' . '_ilightbox_mobile_optimizer' => 	1, 
			'cosmetista' . '_ilightbox_max_scale' => 			1, 
			'cosmetista' . '_ilightbox_min_scale' => 			0.2, 
			'cosmetista' . '_ilightbox_inner_toolbar' => 		0, 
			'cosmetista' . '_ilightbox_smart_recognition' => 	0, 
			'cosmetista' . '_ilightbox_fullscreen_one_slide' => 0, 
			'cosmetista' . '_ilightbox_fullscreen_viewport' => 	'center', 
			'cosmetista' . '_ilightbox_controls_toolbar' => 	1, 
			'cosmetista' . '_ilightbox_controls_arrows' => 		0, 
			'cosmetista' . '_ilightbox_controls_fullscreen' => 	1, 
			'cosmetista' . '_ilightbox_controls_thumbnail' => 	1, 
			'cosmetista' . '_ilightbox_controls_keyboard' => 	1, 
			'cosmetista' . '_ilightbox_controls_mousewheel' => 	1, 
			'cosmetista' . '_ilightbox_controls_swipe' => 		1, 
			'cosmetista' . '_ilightbox_controls_slideshow' => 	0 
		), 
		'sitemap' => array( 
			'cosmetista' . '_sitemap_nav' => 		1, 
			'cosmetista' . '_sitemap_categs' => 	1, 
			'cosmetista' . '_sitemap_tags' => 		1, 
			'cosmetista' . '_sitemap_month' => 		1, 
			'cosmetista' . '_sitemap_pj_categs' => 	1, 
			'cosmetista' . '_sitemap_pj_tags' => 	1 
		), 
		'error' => array( 
			'cosmetista' . '_error_color' => 		'#f36eae', 
			'cosmetista' . '_error_bg_color' => 	'#ffffff', 
			'cosmetista' . '_error_bg_img_enable' => 0, 
			'cosmetista' . '_error_bg_image' => 	'', 
			'cosmetista' . '_error_bg_rep' => 		'no-repeat', 
			'cosmetista' . '_error_bg_pos' => 		'top center', 
			'cosmetista' . '_error_bg_att' => 		'scroll', 
			'cosmetista' . '_error_bg_size' => 		'cover', 
			'cosmetista' . '_error_search' => 		1, 
			'cosmetista' . '_error_sitemap_button' => 1, 
			'cosmetista' . '_error_sitemap_link' => '' 
		), 
		'code' => array( 
			'cosmetista' . '_custom_css' => 		'', 
			'cosmetista' . '_custom_js' => 			'', 
			'cosmetista' . '_gmap_api_key' => 		'', 
			'cosmetista' . '_api_key' => 			'', 
			'cosmetista' . '_api_secret' => 		'', 
			'cosmetista' . '_access_token' => 		'', 
			'cosmetista' . '_access_token_secret' => '' 
		), 
		'recaptcha' => array( 
			'cosmetista' . '_recaptcha_public_key' => 	'', 
			'cosmetista' . '_recaptcha_private_key' => 	'' 
		) 
	);
	
	
	$settings = apply_filters('cosmetista_settings_element_defaults_filter', $settings);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



// Theme Settings Single Posts Default Values
if (!function_exists('cosmetista_settings_single_defaults')) {

function cosmetista_settings_single_defaults($id = false) {
	$settings = array( 
		'post' => array( 
			'cosmetista' . '_blog_post_layout' => 		'r_sidebar', 
			'cosmetista' . '_blog_post_title' => 		1, 
			'cosmetista' . '_blog_post_date' => 		1, 
			'cosmetista' . '_blog_post_cat' => 			1, 
			'cosmetista' . '_blog_post_author' => 		1, 
			'cosmetista' . '_blog_post_comment' => 		1, 
			'cosmetista' . '_blog_post_tag' => 			1, 
			'cosmetista' . '_blog_post_like' => 		1, 
			'cosmetista' . '_blog_post_nav_box' => 		1, 
			'cosmetista' . '_blog_post_nav_order_cat' => 0, 
			'cosmetista' . '_blog_post_share_box' => 	1, 
			'cosmetista' . '_blog_post_author_box' => 	1, 
			'cosmetista' . '_blog_more_posts_box' => 	'popular', 
			'cosmetista' . '_blog_more_posts_count' => 	'3', 
			'cosmetista' . '_blog_more_posts_pause' => 	'5' 
		), 
		'project' => array( 
			'cosmetista' . '_portfolio_project_title' => 		1, 
			'cosmetista' . '_portfolio_project_details_title' => esc_html__('Review Details', 'cosmetista'), 
			'cosmetista' . '_portfolio_project_date' => 		1, 
			'cosmetista' . '_portfolio_project_cat' => 			1, 
			'cosmetista' . '_portfolio_project_author' => 		1, 
			'cosmetista' . '_portfolio_project_comment' => 		0, 
			'cosmetista' . '_portfolio_project_tag' => 			0, 
			'cosmetista' . '_portfolio_project_like' => 		1, 
			'cosmetista' . '_portfolio_project_link' => 		0, 
			'cosmetista' . '_portfolio_project_share_box' => 	1, 
			'cosmetista' . '_portfolio_project_nav_box' => 		1, 
			'cosmetista' . '_portfolio_project_nav_order_cat' => 0, 
			'cosmetista' . '_portfolio_project_author_box' => 	1, 
			'cosmetista' . '_portfolio_more_projects_box' => 	'popular', 
			'cosmetista' . '_portfolio_more_projects_count' => 	'4', 
			'cosmetista' . '_portfolio_more_projects_pause' => 	'5', 
			'cosmetista' . '_portfolio_project_slug' => 		'review', 
			'cosmetista' . '_portfolio_pj_categs_slug' => 		'pj-categs', 
			'cosmetista' . '_portfolio_pj_tags_slug' => 		'pj-tags' 
		), 
		'profile' => array( 
			'cosmetista' . '_profile_post_title' => 			1, 
			'cosmetista' . '_profile_post_details_title' => 	'', 
			'cosmetista' . '_profile_post_cat' => 				1, 
			'cosmetista' . '_profile_post_comment' => 			1, 
			'cosmetista' . '_profile_post_like' => 				1, 
			'cosmetista' . '_profile_post_nav_box' => 			1, 
			'cosmetista' . '_profile_post_nav_order_cat' => 	0,
			'cosmetista' . '_profile_post_share_box' => 		1, 
			'cosmetista' . '_profile_post_slug' => 				'profile', 
			'cosmetista' . '_profile_pl_categs_slug' => 		'pl-categs' 
		) 
	);
	
	
	$settings = apply_filters('cosmetista_settings_single_defaults_filter', $settings);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



/* Project Puzzle Proportion */
if (!function_exists('cosmetista_project_puzzle_proportion')) {

function cosmetista_project_puzzle_proportion() {
	return 1;
}

}



/* Project Puzzle Proportion */
if (!function_exists('cosmetista_project_puzzle_large_gar_parameters')) {

function cosmetista_project_puzzle_large_gar_parameters() {
	$parameter = array ( 
		'container_width' 		=> 1160, 
		'bottomStaticPadding' 	=> 2 
	);
	
	
	return $parameter;
}

}



/* Theme Image Thumbnails Size */
if (!function_exists('cosmetista_get_image_thumbnail_list')) {

function cosmetista_get_image_thumbnail_list() {
	$list = array( 
		'cmsmasters-small-thumb' => array( 
			'width' => 		68, 
			'height' => 	68, 
			'crop' => 		true 
		), 
		'cmsmasters-square-thumb' => array( 
			'width' => 		360, 
			'height' => 	360, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Square', 'cosmetista') 
		), 
		'cmsmasters-blog-masonry-thumb' => array( 
			'width' => 		580, 
			'height' => 	367, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Masonry Blog', 'cosmetista') 
		), 
		'cmsmasters-project-thumb' => array( 
			'width' => 		580, 
			'height' => 	580, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Review', 'cosmetista') 
		), 
		'cmsmasters-project-masonry-thumb' => array( 
			'width' => 		580, 
			'height' => 	9999, 
			'title' => 		esc_attr__('Masonry Review', 'cosmetista') 
		), 
		'cmsmasters-profile-thumb' => array( 
			'width' => 		360, 
			'height' => 	360, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Profile', 'cosmetista') 
		), 
		'post-thumbnail' => array( 
			'width' => 		860, 
			'height' => 	486, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Featured', 'cosmetista') 
		), 
		'cmsmasters-masonry-thumb' => array( 
			'width' => 		860, 
			'height' => 	9999, 
			'title' => 		esc_attr__('Masonry', 'cosmetista') 
		), 
		'cmsmasters-full-thumb' => array( 
			'width' => 		860, 
			'height' => 	500, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Full', 'cosmetista') 
		), 
		'cmsmasters-project-full-thumb' => array( 
			'width' => 		760, 
			'height' => 	530, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Review Full', 'cosmetista') 
		), 
		'cmsmasters-full-masonry-thumb' => array( 
			'width' => 		1160, 
			'height' => 	9999, 
			'title' => 		esc_attr__('Masonry Full', 'cosmetista') 
		) 
	);
	
	
	return $list;
}

}



/* Project Post Type Registration Rename */
if (!function_exists('cosmetista_project_labels')) {

function cosmetista_project_labels() {
	return array( 
		'name' => 					esc_html__('Reviews', 'cosmetista'), 
		'singular_name' => 			esc_html__('Review', 'cosmetista'), 
		'menu_name' => 				esc_html__('Reviews', 'cosmetista'), 
		'all_items' => 				esc_html__('All Reviews', 'cosmetista'), 
		'add_new' => 				esc_html__('Add New', 'cosmetista'), 
		'add_new_item' => 			esc_html__('Add New Review', 'cosmetista'), 
		'edit_item' => 				esc_html__('Edit Review', 'cosmetista'), 
		'new_item' => 				esc_html__('New Review', 'cosmetista'), 
		'view_item' => 				esc_html__('View Review', 'cosmetista'), 
		'search_items' => 			esc_html__('Search Reviews', 'cosmetista'), 
		'not_found' => 				esc_html__('No reviews found', 'cosmetista'), 
		'not_found_in_trash' => 	esc_html__('No reviews found in Trash', 'cosmetista') 
	);
}

}

add_filter('cmsmasters_project_labels_filter', 'cosmetista_project_labels');


if (!function_exists('cosmetista_pj_categs_labels')) {

function cosmetista_pj_categs_labels() {
	return array( 
		'name' => 					esc_html__('Review Categories', 'cosmetista'), 
		'singular_name' => 			esc_html__('Review Category', 'cosmetista') 
	);
}

}

add_filter('cmsmasters_pj_categs_labels_filter', 'cosmetista_pj_categs_labels');


if (!function_exists('cosmetista_pj_tags_labels')) {

function cosmetista_pj_tags_labels() {
	return array( 
		'name' => 					esc_html__('Review Tags', 'cosmetista'), 
		'singular_name' => 			esc_html__('Review Tag', 'cosmetista') 
	);
}

}

add_filter('cmsmasters_pj_tags_labels_filter', 'cosmetista_pj_tags_labels');



/* Profile Post Type Registration Rename */
if (!function_exists('cosmetista_profile_labels')) {

function cosmetista_profile_labels() {
	return array( 
		'name' => 					esc_html__('Profiles', 'cosmetista'), 
		'singular_name' => 			esc_html__('Profiles', 'cosmetista'), 
		'menu_name' => 				esc_html__('Profiles', 'cosmetista'), 
		'all_items' => 				esc_html__('All Profiles', 'cosmetista'), 
		'add_new' => 				esc_html__('Add New', 'cosmetista'), 
		'add_new_item' => 			esc_html__('Add New Profile', 'cosmetista'), 
		'edit_item' => 				esc_html__('Edit Profile', 'cosmetista'), 
		'new_item' => 				esc_html__('New Profile', 'cosmetista'), 
		'view_item' => 				esc_html__('View Profile', 'cosmetista'), 
		'search_items' => 			esc_html__('Search Profiles', 'cosmetista'), 
		'not_found' => 				esc_html__('No Profiles found', 'cosmetista'), 
		'not_found_in_trash' => 	esc_html__('No Profiles found in Trash', 'cosmetista') 
	);
}

}

// add_filter('cmsmasters_profile_labels_filter', 'cosmetista_profile_labels');


if (!function_exists('cosmetista_pl_categs_labels')) {

function cosmetista_pl_categs_labels() {
	return array( 
		'name' => 					esc_html__('Profile Categories', 'cosmetista'), 
		'singular_name' => 			esc_html__('Profile Category', 'cosmetista') 
	);
}

}

// add_filter('cmsmasters_pl_categs_labels_filter', 'cosmetista_pl_categs_labels');

