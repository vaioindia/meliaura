<?php
/**
 * @package 	WordPress
 * @subpackage 	Cosmetista
 * @version 	1.0.2
 * 
 * Theme Fonts Rules
 * Created by CMSMasters
 * 
 */


function cosmetista_theme_fonts() {
	$cmsmasters_option = cosmetista_get_global_options();
	
	
	$custom_css = "/**
 * @package 	WordPress
 * @subpackage 	Cosmetista
 * @version 	1.0.2
 * 
 * Theme Fonts Rules
 * Created by CMSMasters
 * 
 */


/***************** Start Theme Font Styles ******************/ 

	/* Start Content Font */
	body,
	.subpage_nav a {
		font-family:" . cosmetista_get_google_font($cmsmasters_option['cosmetista' . '_content_font_google_font']) . $cmsmasters_option['cosmetista' . '_content_font_system_font'] . ";
		font-size:" . $cmsmasters_option['cosmetista' . '_content_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['cosmetista' . '_content_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['cosmetista' . '_content_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['cosmetista' . '_content_font_font_style'] . ";
	}
	
	.cmsmasters_icon_list_items li:before {
		line-height:" . $cmsmasters_option['cosmetista' . '_content_font_line_height'] . "px;
	}
	
	.subpage_nav a {
		font-size:" . ((int) $cmsmasters_option['cosmetista' . '_content_font_font_size'] + 2) . "px;
		line-height:" . ((int) $cmsmasters_option['cosmetista' . '_content_font_line_height'] + 2) . "px;
	}
	/* Finish Content Font */


	/* Start Link Font */
	a,
	.subpage_nav > strong,
	.subpage_nav > span,
	.subpage_nav > a,
	.widget_categories li, 
	.widget_archive li, 
	.widget_meta li,
	.widget_pages li,
	.widget_nav_menu li,
	.comment-respond .comment-reply-title a,
	.subpage_nav > span:not([class]) {
		font-family:" . cosmetista_get_google_font($cmsmasters_option['cosmetista' . '_link_font_google_font']) . $cmsmasters_option['cosmetista' . '_link_font_system_font'] . ";
		font-size:" . $cmsmasters_option['cosmetista' . '_link_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['cosmetista' . '_link_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['cosmetista' . '_link_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['cosmetista' . '_link_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['cosmetista' . '_link_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['cosmetista' . '_link_font_text_decoration'] . ";
	}
	
	a:hover {
		text-decoration:" . $cmsmasters_option['cosmetista' . '_link_hover_decoration'] . ";
	}
	/* Finish Link Font */


	/* Start Navigation Title Font */
	.cmsmasters_dynamic_cart .cmsmasters_dynamic_cart_button span,
	.header_top_meta,
	.header_top_meta a,
	.navigation > li > a, 
	.top_line_nav > li > a,
	nav > div > ul div.menu-item-mega-container > ul > li > a {
		font-family:" . cosmetista_get_google_font($cmsmasters_option['cosmetista' . '_nav_title_font_google_font']) . $cmsmasters_option['cosmetista' . '_nav_title_font_system_font'] . ";
		font-size:" . $cmsmasters_option['cosmetista' . '_nav_title_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['cosmetista' . '_nav_title_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['cosmetista' . '_nav_title_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['cosmetista' . '_nav_title_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['cosmetista' . '_nav_title_font_text_transform'] . ";
	}
	
	.cmsmasters_dynamic_cart .cmsmasters_dynamic_cart_button span {
		font-size:" . ((int) $cmsmasters_option['cosmetista' . '_nav_title_font_font_size'] - 1) . "px;
		font-weight:normal;
	}
	
	.navigation .nav_subtitle {
		font-size:" . ((int) $cmsmasters_option['cosmetista' . '_nav_title_font_font_size'] - 1) . "px;
		font-weight:normal;
		text-transform:none;
	}
	
	.navigation .nav_tag {
		font-size:" . ((int) $cmsmasters_option['cosmetista' . '_nav_title_font_font_size'] - 4) . "px;
		line-height:" . ((int) $cmsmasters_option['cosmetista' . '_nav_title_font_line_height'] - 4) . "px;
	}
	
	.header_top_meta,
	.header_top_meta a,
	ul.top_line_nav > li > a {
		font-size:" . ((int) $cmsmasters_option['cosmetista' . '_nav_title_font_font_size'] - 1) . "px;
		line-height:" . ((int) $cmsmasters_option['cosmetista' . '_nav_title_font_line_height'] - 2) . "px;
	}
	
	#header .navigation .cmsmasters_resp_nav_toggle {
		height:" . $cmsmasters_option['cosmetista' . '_nav_title_font_line_height'] . "px;
	}
	/* Finish Navigation Title Font */


	/* Start Navigation Dropdown Font */
	.navigation ul li a,
	.top_line_nav ul li a, 
	.footer_nav > li > a {
		font-family:" . cosmetista_get_google_font($cmsmasters_option['cosmetista' . '_nav_dropdown_font_google_font']) . $cmsmasters_option['cosmetista' . '_nav_dropdown_font_system_font'] . ";
		font-size:" . $cmsmasters_option['cosmetista' . '_nav_dropdown_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['cosmetista' . '_nav_dropdown_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['cosmetista' . '_nav_dropdown_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['cosmetista' . '_nav_dropdown_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['cosmetista' . '_nav_dropdown_font_text_transform'] . ";
	}
	
	.top_line_nav ul li a {
		font-size:" . ((int) $cmsmasters_option['cosmetista' . '_nav_dropdown_font_font_size'] - 1) . "px;
		line-height:" . ((int) $cmsmasters_option['cosmetista' . '_nav_dropdown_font_line_height'] - 2) . "px;
	}
	
	.footer_nav_wrap {
		line-height:" . $cmsmasters_option['cosmetista' . '_nav_dropdown_font_line_height'] . "px;
	}
	/* Finish Navigation Dropdown Font */


	/* Start H1 Font */
	h1,
	h1 a,
	.logo .title, 
	.cmsmasters_pricing_table .cmsmasters_currency,
	.cmsmasters_pricing_table .cmsmasters_price,
	.cmsmasters_pricing_table .cmsmasters_coins,
	.cmsmasters_post_timeline .cmsmasters_post_date .cmsmasters_day,
	.cmsmasters_header_search_form input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]),
	.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_counter_wrap, 
	.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_counter_wrap {
		font-family:" . cosmetista_get_google_font($cmsmasters_option['cosmetista' . '_h1_font_google_font']) . $cmsmasters_option['cosmetista' . '_h1_font_system_font'] . ";
		font-size:" . $cmsmasters_option['cosmetista' . '_h1_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['cosmetista' . '_h1_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['cosmetista' . '_h1_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['cosmetista' . '_h1_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['cosmetista' . '_h1_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['cosmetista' . '_h1_font_text_decoration'] . ";
	}
	
	@media only screen and (max-width: 768px) {
		.cmsmasters_open_project .cmsmasters_project_header .cmsmasters_project_title {
			font-size:" . ((int) $cmsmasters_option['cosmetista' . '_h1_font_font_size'] - 6) . "px;
			line-height:" . ((int) $cmsmasters_option['cosmetista' . '_h1_font_line_height'] - 10) . "px;
		}
	}
	
	.cmsmasters_quotes_slider .cmsmasters_quote_placeholder:before,
	blockquote:before, 
	.cmsmasters_quotes_grid .cmsmasters_quotes_list:after,
	.cmsmasters_dropcap {
		font-family:" . cosmetista_get_google_font($cmsmasters_option['cosmetista' . '_h1_font_google_font']) . $cmsmasters_option['cosmetista' . '_h1_font_system_font'] . ";
		font-weight:" . $cmsmasters_option['cosmetista' . '_h1_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['cosmetista' . '_h1_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['cosmetista' . '_h1_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['cosmetista' . '_h1_font_text_decoration'] . ";
	}
	
	.cmsmasters_icon_list_items.cmsmasters_icon_list_icon_type_number .cmsmasters_icon_list_item .cmsmasters_icon_list_icon:before,
	.cmsmasters_icon_box.box_icon_type_number:before,
	.cmsmasters_icon_box.cmsmasters_icon_heading_left.box_icon_type_number .icon_box_heading:before {
		font-family:" . cosmetista_get_google_font($cmsmasters_option['cosmetista' . '_h1_font_google_font']) . $cmsmasters_option['cosmetista' . '_h1_font_system_font'] . ";
		font-weight:" . $cmsmasters_option['cosmetista' . '_h1_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['cosmetista' . '_h1_font_font_style'] . ";
	}
	
	.cmsmasters_header_search_form input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]) {
		font-size:70px; /* static */
		line-height:80px; /* static */
		height:80px; /* static */
	}
	
	blockquote:before {
		font-size:72px; /* static */
		line-height:72px; /* static */
	}
	
	.cmsmasters_quotes_slider .cmsmasters_quote_placeholder:before {
		font-size:120px; /* static */
		line-height:190px; /* static */
		font-style:italic; /* static */
	}
	
	.cmsmasters_quotes_grid .cmsmasters_quotes_list:after {
		font-size:70px; /* static */
		line-height:105px; /* static */
		font-style:italic; /* static */
	}
	
	.cmsmasters_dropcap.type1 {
		font-size:56px; /* static */
	}
	
	.cmsmasters_dropcap.type2 {
		font-size:34px; /* static */
		line-height:60px; /* static */
	}
	
	.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_counter_wrap {
		font-size:" . ((int) $cmsmasters_option['cosmetista' . '_h1_font_font_size'] + 2) . "px;
	}
	
	.cmsmasters_pricing_table .cmsmasters_price,
	.cmsmasters_pricing_table .cmsmasters_coins {
		font-size:" . ((int) $cmsmasters_option['cosmetista' . '_h1_font_font_size'] + 6) . "px;
	}
	
	.cmsmasters_pricing_table .cmsmasters_currency {
		font-size:" . ((int) $cmsmasters_option['cosmetista' . '_h1_font_font_size'] - 20) . "px;
		line-height:" . ((int) $cmsmasters_option['cosmetista' . '_h1_font_line_height'] - 10) . "px;
	}
	
	.headline_outer .headline_inner .headline_icon:before {
		font-size:" . ((int) $cmsmasters_option['cosmetista' . '_h1_font_font_size'] + 5) . "px;
	}
	
	.headline_outer .headline_inner.align_center .headline_icon:before {
		font-size:" . ((int) $cmsmasters_option['cosmetista' . '_h1_font_line_height'] + 15) . "px;
	}
	
	.headline_outer .headline_inner.align_left .headline_icon {
		padding-left:" . ((int) $cmsmasters_option['cosmetista' . '_h1_font_font_size'] + 5) . "px;
	}
	
	.headline_outer .headline_inner.align_right .headline_icon {
		padding-right:" . ((int) $cmsmasters_option['cosmetista' . '_h1_font_font_size'] + 5) . "px;
	}
	
	.headline_outer .headline_inner.align_center .headline_icon {
		padding-top:" . ((int) $cmsmasters_option['cosmetista' . '_h1_font_line_height'] + 15) . "px;
	}
	/* Finish H1 Font */


	/* Start H2 Font */
	h2,
	h2 a,
	table caption,
	.comment-respond .comment-reply-title,
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > a {
		font-family:" . cosmetista_get_google_font($cmsmasters_option['cosmetista' . '_h2_font_google_font']) . $cmsmasters_option['cosmetista' . '_h2_font_system_font'] . ";
		font-size:" . $cmsmasters_option['cosmetista' . '_h2_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['cosmetista' . '_h2_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['cosmetista' . '_h2_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['cosmetista' . '_h2_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['cosmetista' . '_h2_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['cosmetista' . '_h2_font_text_decoration'] . ";
	}
	/* Finish H2 Font */


	/* Start H3 Font */
	h3,
	h3 a,
	.widget_rss ul li .rsswidget,
	.widget_recent_entries a,
	#wp-calendar caption,
	table thead tr th,
	table thead tr td,
	table tfoot tr th,
	table tfoot tr td,
	#wp-calendar tbody td,
	.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_counter_wrap .cmsmasters_counter_prefix,
	.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_counter_wrap .cmsmasters_counter_suffix,
	.cmsmasters_latest_posts_list li .cmsmasters_latest_posts_cont a,
	.cmsmasters_latest_posts_list li .cmsmasters_latest_posts_cont,
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tab.tab_latest li a, 
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tab.tab_popular li a,
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_lpr_tabs_cont,
	.widget_custom_contact_info_entries .contact_info_item_title,
	.post_nav > span a,
	.cmsmasters_toggles .cmsmasters_toggle_title a,
	.cmsmasters_stats.stats_mode_bars.stats_type_vertical .cmsmasters_stat_wrap .cmsmasters_stat_counter_wrap,
	.cmsmasters_stats.stats_mode_bars .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_counter_wrap, 
	.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_title {
		font-family:" . cosmetista_get_google_font($cmsmasters_option['cosmetista' . '_h3_font_google_font']) . $cmsmasters_option['cosmetista' . '_h3_font_system_font'] . ";
		font-size:" . $cmsmasters_option['cosmetista' . '_h3_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['cosmetista' . '_h3_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['cosmetista' . '_h3_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['cosmetista' . '_h3_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['cosmetista' . '_h3_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['cosmetista' . '_h3_font_text_decoration'] . ";
	}
	
	.widget_custom_contact_info_entries .contact_info_item_title,
	#wp-calendar tbody td,
	.cmsmasters_stats.stats_mode_bars .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_counter_wrap {
		font-size:" . ((int) $cmsmasters_option['cosmetista' . '_h3_font_font_size'] - 2) . "px;
		line-height:20px; /* static */
	}
	
	
	table tfoot tr th,
	table tfoot tr td {
		font-size:" . ((int) $cmsmasters_option['cosmetista' . '_h3_font_font_size'] - 1) . "px;
	}
	
	#wp-calendar caption,
	table thead tr th,
	table thead tr td,
	table tfoot tr th,
	table tfoot tr td,
	#wp-calendar tbody td,
	.post_nav > span a {
		text-transform:uppercase;
	}
	/* Finish H3 Font */


	/* Start H4 Font */
	h4, 
	h4 a,
	.cmsmasters_wrap_items_loader .cmsmasters_items_loader,
	.cmsmasters_wrap_pagination ul li .page-numbers,
	.widget_rss .widgettitle a,
	.widgettitle,
	.bottom_inner .widget.widget_wysija .widgettitle,
	#wp-calendar thead th,
	.cmsmasters_tabs .cmsmasters_tabs_list_item a,
	.cmsmasters_stats .cmsmasters_stat_wrap .cmsmasters_stat_title, 
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > ul > li > a, 
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap_category > li > a,
	.wp-caption-text,
	.wp-caption-text a,
	#page .wp-caption-text a,
	.cmsmasters_img_caption,
	dt {
		font-family:" . cosmetista_get_google_font($cmsmasters_option['cosmetista' . '_h4_font_google_font']) . $cmsmasters_option['cosmetista' . '_h4_font_system_font'] . ";
		font-size:" . $cmsmasters_option['cosmetista' . '_h4_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['cosmetista' . '_h4_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['cosmetista' . '_h4_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['cosmetista' . '_h4_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['cosmetista' . '_h4_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['cosmetista' . '_h4_font_text_decoration'] . ";
		letter-spacing:1px;
	}
	
	.cmsmasters_wrap_items_loader .cmsmasters_items_loader,
	.cmsmasters_open_project .project_details_title, 
	.cmsmasters_open_project .project_features_title,
	.cmsmasters_tabs .cmsmasters_tabs_list_item a {
		text-transform:uppercase;
	}
	/* Finish H4 Font */


	/* Start H5 Font */
	h5,
	h5 a,
	.cmsmasters_archive_type .cmsmasters_archive_item_info a,
	.cmsmasters_slider_post_category a,
	.cmsmasters_slider_post_author a,
	.cmsmasters_project_category a,
	.project_sidebar .cmsmasters_project_category a,
	.cmsmasters_items_filter_wrap .cmsmasters_items_sort_but,
	.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li a,
	.comment-respond label,
	.cmsmasters_post_author a,
	#sb_instagram .sbi_follow_btn a,
	.widget_custom_twitter_entries .tweet_time,
	.widget_tag_cloud a,
	.widget_custom_popular_projects_entries .cmsmasters_project_category a, 
	.widget_custom_latest_projects_entries .cmsmasters_project_category a,
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tabs_list_item,
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tabs_list_item:before,
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tabs_list_item a,
	.widget_categories li a, 
	.widget_archive li a, 
	.widget_meta li a,
	.widget_pages li a,
	.widget_nav_menu li a,
	.post_nav > span .post_nav_sub,
	.cmsmasters_project_read_more,
	.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat_title, 
	.cmsmasters_breadcrumbs .cmsmasters_breadcrumbs_inner,
	.cmsmasters_breadcrumbs .cmsmasters_breadcrumbs_inner a,
	.cmsmasters_open_profile .profile_details_item_desc .cmsmasters_profile_category,
	.cmsmasters_open_profile .profile_details_item_desc .cmsmasters_profile_category a,
	.cmsmasters_project_grid .cmsmasters_project_category a,
	.cmsmasters_project_puzzle .cmsmasters_project_category a,
	.cmsmasters_post_category a,
	.cmsmasters_slider_project_category a,
	.cmsmasters_open_post .cmsmasters_post_tags a,
	.cmsmasters_post_timeline .cmsmasters_post_date .cmsmasters_mon,
	.cmsmasters_post_timeline .cmsmasters_post_date .cmsmasters_year,
	.cmsmasters_pricing_table .cmsmasters_period,
	.cmsmasters-form-builder .form_info > label {
		font-family:" . cosmetista_get_google_font($cmsmasters_option['cosmetista' . '_h5_font_google_font']) . $cmsmasters_option['cosmetista' . '_h5_font_system_font'] . ";
		font-size:" . $cmsmasters_option['cosmetista' . '_h5_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['cosmetista' . '_h5_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['cosmetista' . '_h5_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['cosmetista' . '_h5_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['cosmetista' . '_h5_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['cosmetista' . '_h5_font_text_decoration'] . ";
		letter-spacing:1px;
	}
	
	.widget_tag_cloud a {
		line-height:1.2em;
	}
	
	.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li,
	.cmsmasters_archive_type .cmsmasters_archive_item_info > *,
	.cmsmasters_open_post .cmsmasters_post_cont_info,
	.cmsmasters_open_post .cmsmasters_post_info > span,
	.cmsmasters_open_post .cmsmasters_post_tags > span,
	.cmsmasters_open_post .cmsmasters_post_cont_info > span {
		line-height:" . $cmsmasters_option['cosmetista' . '_h5_font_line_height'] . "px;
	}
	/* Finish H5 Font */


	/* Start H6 Font */
	h6,
	h6 a,
	.cmsmasters_latest_posts_list li .cmsmasters_latest_posts_cont > .published,
	.widget_rss ul li .rss-date,
	.widget_recent_comments .post-date, 
	.widget_recent_entries .post-date,
	.widget_custom_latest_posts_entries .published,
	.widget_custom_popular_projects_entries .cmsmasters_project_category, 
	.widget_custom_latest_projects_entries .cmsmasters_project_category,
	.widget_rss ul li .rss-date, 
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tab.tab_comments li .published,
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_lpr_tabs_cont .published,
	.cmsmasters_archive_read_more,
	.cmsmasters_slider_post_category,
	.cmsmasters_slider_post_author,
	.cmsmasters_slider_post_date,
	.project_sidebar .cmsmasters_project_date,
	.cmsmasters_project_puzzle .cmsmasters_project_category,
	.cmsmasters_project_grid .cmsmasters_project_category,
	.cmsmasters_comment_item_date,
	.cmsmasters_likes a span,
	.cmsmasters_comments a span,
	.cmsmasters_views > span span,
	.cmsmasters_post_read_more,
	.cmsmasters_post_date,
	.cmsmasters_post_category,
	.cmsmasters_post_author,
	.cmsmasters_post_tags,
	.cmsmasters_slider_project_category,
	.cmsmasters_pricing_table .pricing_title,
	.cmsmasters_archive_type .cmsmasters_archive_item_info {
		font-family:" . cosmetista_get_google_font($cmsmasters_option['cosmetista' . '_h6_font_google_font']) . $cmsmasters_option['cosmetista' . '_h6_font_system_font'] . ";
		font-size:" . $cmsmasters_option['cosmetista' . '_h6_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['cosmetista' . '_h6_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['cosmetista' . '_h6_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['cosmetista' . '_h6_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['cosmetista' . '_h6_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['cosmetista' . '_h6_font_text_decoration'] . ";
	}
	
	.cmsmasters_archive_read_more,
	.cmsmasters_post_read_more {
		font-size:" . ((int) $cmsmasters_option['cosmetista' . '_h6_font_font_size'] + 2) . "px;
	}
	/* Finish H6 Font */


	/* Start Button Font */
	.cmsmasters_project_read_more,
	.cmsmasters_button, 
	.button, 
	input[type=submit], 
	input[type=button], 
	button {
		font-family:" . cosmetista_get_google_font($cmsmasters_option['cosmetista' . '_button_font_google_font']) . $cmsmasters_option['cosmetista' . '_button_font_system_font'] . ";
		font-size:" . $cmsmasters_option['cosmetista' . '_button_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['cosmetista' . '_button_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['cosmetista' . '_button_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['cosmetista' . '_button_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['cosmetista' . '_button_font_text_transform'] . ";
	}
	
	.widget.widget_wysija .widget_wysija_cont .wysija-submit {
		font-size:" . ((int) $cmsmasters_option['cosmetista' . '_button_font_font_size'] - 1) . "px;
	}
	
	.gform_wrapper .gform_footer input.button, 
	.gform_wrapper .gform_footer input[type=submit] {
		font-size:" . $cmsmasters_option['cosmetista' . '_button_font_font_size'] . "px !important;
	}
	
	.cmsmasters_button.cmsmasters_but_icon_dark_bg, 
	.cmsmasters_button.cmsmasters_but_icon_light_bg, 
	.cmsmasters_button.cmsmasters_but_icon_divider, 
	.cmsmasters_button.cmsmasters_but_icon_inverse {
		padding-left:" . ((int) $cmsmasters_option['cosmetista' . '_button_font_line_height'] + 20) . "px;
	}
	
	.cmsmasters_button.cmsmasters_but_icon_dark_bg:before, 
	.cmsmasters_button.cmsmasters_but_icon_light_bg:before, 
	.cmsmasters_button.cmsmasters_but_icon_divider:before, 
	.cmsmasters_button.cmsmasters_but_icon_inverse:before, 
	.cmsmasters_button.cmsmasters_but_icon_dark_bg:after, 
	.cmsmasters_button.cmsmasters_but_icon_light_bg:after, 
	.cmsmasters_button.cmsmasters_but_icon_divider:after, 
	.cmsmasters_button.cmsmasters_but_icon_inverse:after {
		width:" . $cmsmasters_option['cosmetista' . '_button_font_line_height'] . "px;
	}
	/* Finish Button Font */


	/* Start Small Text Font */
	small, 
	.mailpoet_message,
	.mailpoet_message a,
	#wp-calendar tfoot a,
	.widget_custom_contact_info_entries .contact_info_item_desc,
	.widget_custom_contact_info_entries .contact_info_item_desc a,
	form .formError .formErrorContent {
		font-family:" . cosmetista_get_google_font($cmsmasters_option['cosmetista' . '_small_font_google_font']) . $cmsmasters_option['cosmetista' . '_small_font_system_font'] . ";
		font-size:" . $cmsmasters_option['cosmetista' . '_small_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['cosmetista' . '_small_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['cosmetista' . '_small_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['cosmetista' . '_small_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['cosmetista' . '_small_font_text_transform'] . ";
	}
	
	.gform_wrapper .description, 
	.gform_wrapper .gfield_description, 
	.gform_wrapper .gsection_description, 
	.gform_wrapper .instruction {
		font-family:" . cosmetista_get_google_font($cmsmasters_option['cosmetista' . '_small_font_google_font']) . $cmsmasters_option['cosmetista' . '_small_font_system_font'] . " !important;
		font-size:" . $cmsmasters_option['cosmetista' . '_small_font_font_size'] . "px !important;
		line-height:" . $cmsmasters_option['cosmetista' . '_small_font_line_height'] . "px !important;
	}
	
	.cmsmasters_likes a span, 
	.cmsmasters_comments a span {
		line-height:20px;
	}
	/* Finish Small Text Font */


	/* Start Text Fields Font */
	input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]),
	textarea,
	select,
	option,
	.check_parent label {
		font-family:" . cosmetista_get_google_font($cmsmasters_option['cosmetista' . '_input_font_google_font']) . $cmsmasters_option['cosmetista' . '_input_font_system_font'] . ";
		font-size:" . $cmsmasters_option['cosmetista' . '_input_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['cosmetista' . '_input_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['cosmetista' . '_input_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['cosmetista' . '_input_font_font_style'] . ";
	}
	
	.gform_wrapper input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]),
	.gform_wrapper textarea, 
	.gform_wrapper select {
		font-size:" . $cmsmasters_option['cosmetista' . '_input_font_font_size'] . "px !important;
	}
	/* Finish Text Fields Font */


	/* Start Blockquote Font */
	.cmsmasters_quotes_grid .cmsmasters_quote_content,
	.cmsmasters_quotes_slider .cmsmasters_quote_content,
	blockquote {
		font-family:" . cosmetista_get_google_font($cmsmasters_option['cosmetista' . '_quote_font_google_font']) . $cmsmasters_option['cosmetista' . '_quote_font_system_font'] . ";
		font-size:" . $cmsmasters_option['cosmetista' . '_quote_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['cosmetista' . '_quote_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['cosmetista' . '_quote_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['cosmetista' . '_quote_font_font_style'] . ";
	}
	
	q {
		font-family:" . cosmetista_get_google_font($cmsmasters_option['cosmetista' . '_quote_font_google_font']) . $cmsmasters_option['cosmetista' . '_quote_font_system_font'] . ";
		font-weight:" . $cmsmasters_option['cosmetista' . '_quote_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['cosmetista' . '_quote_font_font_style'] . ";
	}
	
	.cmsmasters_quotes_slider .cmsmasters_quote_content {
		font-size:" . ((int) $cmsmasters_option['cosmetista' . '_quote_font_font_size'] + 18) . "px;
		line-height:" . ((int) $cmsmasters_option['cosmetista' . '_quote_font_line_height'] + 20) . "px;
	}
	
	@media only screen and (max-width: 768px) {
		.cmsmasters_quotes_slider .cmsmasters_quote_content {
			font-size:24px;
			line-height:32px;
		}
	}
	
	.cmsmasters_quotes_grid .cmsmasters_quote_content {
		font-size:" . ((int) $cmsmasters_option['cosmetista' . '_quote_font_font_size'] + 2) . "px;
		line-height:" . ((int) $cmsmasters_option['cosmetista' . '_quote_font_line_height'] + 2) . "px;
	}
	/* Finish Blockquote Font */

/***************** Finish Theme Font Styles ******************/


";
	
	
	return apply_filters('cosmetista_theme_fonts_filter', $custom_css);
}

