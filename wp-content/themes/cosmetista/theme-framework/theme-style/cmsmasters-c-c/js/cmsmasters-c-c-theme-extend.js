/**
 * @package 	WordPress
 * @subpackage 	Cosmetista
 * @version		1.0.0
 * 
 * Theme Content Composer Schortcodes Extend
 * Created by CMSMasters
 * 
 */


/**
 * Posts Slider Extend
 */
var cmsmasters_posts_slider_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_posts_slider.fields) {
	if (id === 'post_type') {
		cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['choises']['project'] = cmsmasters_theme_shortcodes.posts_slider_field_poststype_choice_review;
		
		
		cmsmasters_posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else if (id === 'portfolio_categories') {
		cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['title'] = cmsmasters_theme_shortcodes.posts_slider_field_review_categ_title;
		cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['descr'] = cmsmasters_theme_shortcodes.posts_slider_field_review_categ_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_theme_shortcodes.posts_slider_field_review_categ_descr_note + "</span>";
		
		
		cmsmasters_posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else if (id === 'amount') {
		delete cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else if (id === 'columns') {
		cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['def'] = '3';
		
		delete cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['depend'];
		
		
		cmsmasters_posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else if (id === 'blog_metadata') {
		cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['def'] = 'title,excerpt,date,categories,author,comments,likes,more';
		cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['choises']['views'] = cmsmasters_theme_shortcodes.choice_views;
		
		cmsmasters_posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else if (id === 'portfolio_metadata') {
		cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['title'] = cmsmasters_theme_shortcodes.posts_slider_field_review_meta_title;
		cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['descr'] = cmsmasters_theme_shortcodes.posts_slider_field_review_meta_descr;
		
		if (cmsmasters_theme_shortcodes.choice_rating_status == true) {
			cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['def'] = 'title,categories,comments,likes,rating';
			
			cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['choises'] = {
				'title' : 		cmsmasters_shortcodes.choice_title, 
				'categories' : 	cmsmasters_shortcodes.choice_categories, 
				'comments' : 	cmsmasters_shortcodes.choice_comments, 
				'likes' : 		cmsmasters_shortcodes.choice_likes,
				'views' : 		cmsmasters_theme_shortcodes.choice_views,
				'rating' : 		cmsmasters_theme_shortcodes.choice_rating 
			};
		} else {
			cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['def'] = 'title,categories,comments,likes';
			
			cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['choises'] = {
				'title' : 		cmsmasters_shortcodes.choice_title, 
				'categories' : 	cmsmasters_shortcodes.choice_categories, 
				'comments' : 	cmsmasters_shortcodes.choice_comments, 
				'likes' : 		cmsmasters_shortcodes.choice_likes,
				'views' : 		cmsmasters_theme_shortcodes.choice_views
			};
		}
		
		
		cmsmasters_posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else {
		cmsmasters_posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_posts_slider.fields = cmsmasters_posts_slider_new_fields;



/**
 * Blog Extend
 */

var blog_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_blog.fields) {
	if (id === 'layout') {
		delete cmsmastersShortcodes.cmsmasters_blog.fields[id]['choises']['timeline'];
		
		
		blog_new_fields[id] = cmsmastersShortcodes.cmsmasters_blog.fields[id];
	} else if (id === 'columns') { 
		cmsmastersShortcodes.cmsmasters_blog.fields[id]['choises'] = {
			'1' : 	'1', 
			'2' : 	'2', 
			'3' : 	'3', 
			'4' : 	'4' 
		};
		
		
		blog_new_fields[id] = cmsmastersShortcodes.cmsmasters_blog.fields[id];
	} else if (id === 'metadata') { 
		cmsmastersShortcodes.cmsmasters_blog.fields[id]['def'] = 'date,categories,author,comments,likes,more,excerpt';
		cmsmastersShortcodes.cmsmasters_blog.fields[id]['choises']['excerpt'] = cmsmasters_shortcodes.choice_excerpt;
		cmsmastersShortcodes.cmsmasters_blog.fields[id]['choises']['views'] = cmsmasters_theme_shortcodes.choice_views;
		
		
		blog_new_fields[id] = cmsmastersShortcodes.cmsmasters_blog.fields[id];
	} else if (id === 'filter_text') { 
		delete cmsmastersShortcodes.cmsmasters_blog.fields[id];
	} else {
		blog_new_fields[id] = cmsmastersShortcodes.cmsmasters_blog.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_blog.fields = blog_new_fields;



/**
 * Portfolio Extend
 */

var cmsmasters_portfolio_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_portfolio.fields) {
	cmsmastersShortcodes.cmsmasters_portfolio['title'] = cmsmasters_theme_shortcodes.reviews_title;
	
	if (id === 'orderby') {
		cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['descr'] = cmsmasters_theme_shortcodes.reviews_field_orderby_descr;
		
		
		cmsmasters_portfolio_new_fields[id] = cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	} else if (id === 'count') {
		cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['title'] = cmsmasters_theme_shortcodes.reviews_field_number_title;
		cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['descr'] = cmsmasters_theme_shortcodes.reviews_field_number_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_theme_shortcodes.reviews_field_number_descr_note + "</span>";
		
		
		cmsmasters_portfolio_new_fields[id] = cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	} else if (id === 'categories') {
		cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['descr'] = cmsmasters_theme_shortcodes.reviews_field_categories_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_theme_shortcodes.reviews_field_categories_descr_note + "</span>";
		
		
		cmsmasters_portfolio_new_fields[id] = cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	} else if (id === 'layout') {
		cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['descr'] = cmsmasters_theme_shortcodes.reviews_field_layout_descr;
		cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['choises']['grid'] = cmsmasters_theme_shortcodes.reviews_field_layout_choice_grid;
		
		
		cmsmasters_portfolio_new_fields[id] = cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	} else if (id === 'layout_mode') {
		cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['descr'] = cmsmasters_theme_shortcodes.reviews_field_layout_mode_descr;
		
		
		cmsmasters_portfolio_new_fields[id] = cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	} else if (id === 'columns') {
		cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['descr'] = cmsmasters_theme_shortcodes.reviews_field_col_count_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.portfolio_field_col_count_descr_note + "<br />" + cmsmasters_shortcodes.portfolio_field_col_count_descr_note_custom + "</span>";
		
		cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['def'] = '3';
		
		
		cmsmasters_portfolio_new_fields[id] = cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	} else if (id === 'metadata_grid') {
		cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['descr'] = cmsmasters_theme_shortcodes.reviews_field_metadata_descr;
		
		if (cmsmasters_theme_shortcodes.choice_rating_status == true) {
			cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['def'] = 'title,categories,rollover,rating';
			
			cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['choises'] = {
				'title' : 		cmsmasters_shortcodes.choice_title, 
				'excerpt' : 	cmsmasters_shortcodes.choice_excerpt, 
				'categories' : 	cmsmasters_shortcodes.choice_categories, 
				'comments' : 	cmsmasters_shortcodes.choice_comments, 
				'likes' : 		cmsmasters_shortcodes.choice_likes, 
				'views' : 		cmsmasters_theme_shortcodes.choice_views,
				'rollover' : 	cmsmasters_shortcodes.choice_rollover, 
				'rating' : 		cmsmasters_theme_shortcodes.choice_rating 
			};
		} else {
			cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['def'] = 'title,categories,rollover';
			
			cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['choises'] = {
				'title' : 		cmsmasters_shortcodes.choice_title, 
				'excerpt' : 	cmsmasters_shortcodes.choice_excerpt, 
				'categories' : 	cmsmasters_shortcodes.choice_categories, 
				'comments' : 	cmsmasters_shortcodes.choice_comments, 
				'likes' : 		cmsmasters_shortcodes.choice_likes, 
				'views' : 		cmsmasters_theme_shortcodes.choice_views,
				'rollover' : 	cmsmasters_shortcodes.choice_rollover
			};
		}
		
		
		cmsmasters_portfolio_new_fields[id] = cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	} else if (id === 'metadata_puzzle') {
		cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['descr'] = cmsmasters_theme_shortcodes.reviews_field_metadata_descr;
		
		if (cmsmasters_theme_shortcodes.choice_rating_status == true) {
			cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['def'] = 'title,categories,likes,comments,rating';
			
			cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['choises'] = {
				'title' : 		cmsmasters_shortcodes.choice_title, 
				'categories' : 	cmsmasters_shortcodes.choice_categories, 
				'comments' : 	cmsmasters_shortcodes.choice_comments, 
				'likes' : 		cmsmasters_shortcodes.choice_likes, 
				'views' : 		cmsmasters_theme_shortcodes.choice_views,
				'rating' : 		cmsmasters_theme_shortcodes.choice_rating 
			}
		} else {
			cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['def'] = 'title,categories,likes,comments';
			
			cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['choises'] = {
				'title' : 		cmsmasters_shortcodes.choice_title, 
				'categories' : 	cmsmasters_shortcodes.choice_categories, 
				'comments' : 	cmsmasters_shortcodes.choice_comments, 
				'likes' : 		cmsmasters_shortcodes.choice_likes,
				'views' : 		cmsmasters_theme_shortcodes.choice_views
			}
		}
		
		
		cmsmasters_portfolio_new_fields[id] = cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	} else if (id === 'gap') {
		cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['descr'] = cmsmasters_theme_shortcodes.reviews_field_gap_descr;
		
		
		cmsmasters_portfolio_new_fields[id] = cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	} else if (id === 'sorting') {
		cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['descr'] = cmsmasters_theme_shortcodes.reviews_field_sorting_descr;
		
		
		cmsmasters_portfolio_new_fields[id] = cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	} else if (id === 'filter') {
		cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['descr'] = cmsmasters_theme_shortcodes.reviews_field_filter_descr;
		
		
		cmsmasters_portfolio_new_fields[id] = cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	} else if (id === 'filter_text') {
		delete cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	} else {
		cmsmasters_portfolio_new_fields[id] = cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_portfolio.fields = cmsmasters_portfolio_new_fields;



/**
 * Counters Extend
 */

var cmsmasters_counters_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_counters.fields) {
	if (id === 'icon_size') {
		cmsmastersShortcodes.cmsmasters_counters.fields[id]['def'] = '40';
		
		
		cmsmasters_counters_new_fields[id] = cmsmastersShortcodes.cmsmasters_counters.fields[id];
	} else if (id === 'icon_space') {
		cmsmastersShortcodes.cmsmasters_counters.fields[id]['def'] = '44';
		
		
		cmsmasters_counters_new_fields[id] = cmsmastersShortcodes.cmsmasters_counters.fields[id];
	} else {
		cmsmasters_counters_new_fields[id] = cmsmastersShortcodes.cmsmasters_counters.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_counters.fields = cmsmasters_counters_new_fields;



/**
 * Gallery Extend
 */

var cmsmasters_gallery_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_gallery.fields) {
	if (id === 'layout') {
		cmsmastersShortcodes.cmsmasters_gallery.fields[id]['descr'] = "<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_theme_shortcodes.gallery_field_layout_descr_note + "</span>";
		
		
		cmsmasters_gallery_new_fields[id] = cmsmastersShortcodes.cmsmasters_gallery.fields[id];
	} else {
		cmsmasters_gallery_new_fields[id] = cmsmastersShortcodes.cmsmasters_gallery.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_gallery.fields = cmsmasters_gallery_new_fields;



/**
 * Pricing Table Item Extend
 */

var cmsmasters_pricing_table_item_new_fields = {};


for (var id in cmsmastersMultipleShortcodes.cmsmasters_pricing_table_item.fields) {
	if (id === 'best_bg_color') {
		delete cmsmastersMultipleShortcodes.cmsmasters_pricing_table_item.fields[id];
	} else {
		cmsmasters_pricing_table_item_new_fields[id] = cmsmastersMultipleShortcodes.cmsmasters_pricing_table_item.fields[id];
	}
}


cmsmastersMultipleShortcodes.cmsmasters_pricing_table_item.fields = cmsmasters_pricing_table_item_new_fields;
