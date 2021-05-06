<?php
/**
 * @package 	WordPress
 * @subpackage 	Cosmetista
 * @version		1.0.1
 * 
 * Post Single Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = cosmetista_get_global_options();

$cmsmasters_post_title = get_post_meta(get_the_ID(), 'cmsmasters_post_title', true);

$cmsmasters_post_sharing_box = get_post_meta(get_the_ID(), 'cmsmasters_post_sharing_box', true);

$cmsmasters_post_author_box = get_post_meta(get_the_ID(), 'cmsmasters_post_author_box', true);

$cmsmasters_post_more_posts = get_post_meta(get_the_ID(), 'cmsmasters_post_more_posts', true);


list($cmsmasters_layout) = cosmetista_theme_page_layout_scheme();

if ($cmsmasters_layout == 'fullwidth') {
	$cmsmasters_image_thumb_size = 'cmsmasters-full-masonry-thumb';
} else {
	$cmsmasters_image_thumb_size = 'cmsmasters-masonry-thumb';
}


$cmsmasters_post_format = get_post_format();

?>
<!-- Start Post Single Article  -->
<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_open_post'); ?>>
	<?php 
	if ($cmsmasters_post_format == 'image') {
		$cmsmasters_post_image_link = get_post_meta(get_the_ID(), 'cmsmasters_post_image_link', true);
		
		cosmetista_post_type_image(get_the_ID(), $cmsmasters_post_image_link, $cmsmasters_image_thumb_size);
	} elseif ($cmsmasters_post_format == 'gallery') {
		$cmsmasters_post_images = explode(',', str_replace(' ', '', str_replace('img_', '', get_post_meta(get_the_ID(), 'cmsmasters_post_images', true))));
		
		cosmetista_post_type_slider(get_the_ID(), $cmsmasters_post_images, $cmsmasters_image_thumb_size);
	} elseif ($cmsmasters_post_format == 'video') {
		$cmsmasters_post_video_type = get_post_meta(get_the_ID(), 'cmsmasters_post_video_type', true);
		$cmsmasters_post_video_link = get_post_meta(get_the_ID(), 'cmsmasters_post_video_link', true);
		$cmsmasters_post_video_links = get_post_meta(get_the_ID(), 'cmsmasters_post_video_links', true);
		
		cosmetista_post_type_video(get_the_ID(), $cmsmasters_post_video_type, $cmsmasters_post_video_link, $cmsmasters_post_video_links, $cmsmasters_image_thumb_size);
	} elseif ($cmsmasters_post_format == '' && !post_password_required() && has_post_thumbnail()) {
		$cmsmasters_post_image_show = get_post_meta(get_the_ID(), 'cmsmasters_post_image_show', true);
		
		if ($cmsmasters_post_image_show != 'true') {
			cosmetista_thumb(get_the_ID(), $cmsmasters_image_thumb_size, false, 'cmsmasters_open_post_img', false, false, false, true, false);
		}
	}
	
	
	if ($cmsmasters_post_format == 'audio') {
		$cmsmasters_post_audio_links = get_post_meta(get_the_ID(), 'cmsmasters_post_audio_links', true);
		
		cosmetista_post_type_audio($cmsmasters_post_audio_links);
	}
	
	
	echo '<div class="cmsmasters_open_post_inner">';
	
	
	if ($cmsmasters_post_title == 'true') {
		cosmetista_post_title_nolink(get_the_ID(), 'h1');
	}
	
	
	if (
		$cmsmasters_option['cosmetista' . '_blog_post_view'] || 
		$cmsmasters_option['cosmetista' . '_blog_post_date'] || 
		$cmsmasters_option['cosmetista' . '_blog_post_author'] || 
		$cmsmasters_option['cosmetista' . '_blog_post_cat'] || 
		$cmsmasters_option['cosmetista' . '_blog_post_tag'] || 
		$cmsmasters_option['cosmetista' . '_blog_post_like'] || 
		$cmsmasters_option['cosmetista' . '_blog_post_comment']
	) {
		echo '<div class="cmsmasters_post_cont_info entry-meta">';
			
			cosmetista_get_post_date('post');
			
			cosmetista_get_post_category(get_the_ID(), 'category', 'post');
			
			cosmetista_get_post_author('post');
			
			cosmetista_get_post_tags();
			
			
			if (
				$cmsmasters_option['cosmetista' . '_blog_post_view'] || 
				$cmsmasters_option['cosmetista' . '_blog_post_like'] || 
				$cmsmasters_option['cosmetista' . '_blog_post_comment']
			) {
				echo '<span class="cmsmasters_post_info">';
					
					cosmetista_get_post_likes('post');
					
					cosmetista_get_post_comments('post');
					
					cosmetista_get_post_views('post');
					
				echo '</span>';
			}
			
		echo '</div>';
	}
	
	
	if (get_the_content() != '') {
		echo '<div class="cmsmasters_post_content entry-content">';
			
			the_content();
			
			
			wp_link_pages(array( 
				'before' => '<div class="subpage_nav">' . '<strong>' . esc_html__('Pages', 'cosmetista') . ':</strong>', 
				'after' => '</div>', 
				'link_before' => '<span>', 
				'link_after' => '</span>' 
			));
			
		echo '</div>';
	}
	?>
	</div>
</article>
<!-- Finish Post Single Article  -->
<?php 

if ($cmsmasters_post_sharing_box == 'true') {
	cosmetista_sharing_box(esc_html__('Share:', 'cosmetista'), 'h5', esc_attr__('cmsmasters-icon-facebook', 'cosmetista'), esc_attr__('cmsmasters-icon-gplus', 'cosmetista'), esc_attr__('cmsmasters-icon-twitter', 'cosmetista'), esc_attr__('cmsmasters-icon-pinterest-circled', 'cosmetista'));
}


if ($cmsmasters_option['cosmetista' . '_blog_post_nav_box']) {
	$order_cat = (isset($cmsmasters_option['cosmetista' . '_blog_post_nav_order_cat']) ? $cmsmasters_option['cosmetista' . '_blog_post_nav_order_cat'] : false);
	
	cosmetista_prev_next_posts(__('Post', 'cosmetista'), $order_cat, 'category');
}


if (get_the_tags()) {
	$tgsarray = array();
	
	foreach (get_the_tags() as $tagone) {
		$tgsarray[] = $tagone->term_id;
	}
} else {
	$tgsarray = '';
}


if ($cmsmasters_post_more_posts != 'hide') {
	cosmetista_related( 
		'h2', 
		esc_html__('More posts', 'cosmetista'), 
		esc_html__('No posts found', 'cosmetista'), 
		$cmsmasters_post_more_posts, 
		$tgsarray, 
		$cmsmasters_option['cosmetista' . '_blog_more_posts_count'], 
		$cmsmasters_option['cosmetista' . '_blog_more_posts_pause'], 
		'post' 
	);
}


if ($cmsmasters_post_author_box == 'true') {
	cosmetista_author_box(esc_html__('About author', 'cosmetista'), 'h2', 'h3');
}


echo cosmetista_get_pings(get_the_ID(), 'h2');


comments_template(); 
