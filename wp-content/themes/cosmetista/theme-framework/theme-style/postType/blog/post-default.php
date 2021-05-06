<?php
/**
 * @package 	WordPress
 * @subpackage 	Cosmetista
 * @version		1.0.0
 * 
 * Post Default Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_post_metadata = !is_home() ? explode(',', $cmsmasters_metadata) : array();


$date = (in_array('date', $cmsmasters_post_metadata) || is_home()) ? true : false;
$categories = (get_the_category() && (in_array('categories', $cmsmasters_post_metadata) || is_home())) ? true : false;
$author = (in_array('author', $cmsmasters_post_metadata) || is_home()) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsmasters_post_metadata) || is_home())) ? true : false;
$likes = (in_array('likes', $cmsmasters_post_metadata) || (is_home() && CMSMASTERS_CONTENT_COMPOSER)) ? true : false;
$more = (in_array('more', $cmsmasters_post_metadata) || is_home()) ? true : false;
$excerpt = (in_array('excerpt', $cmsmasters_post_metadata) || is_home()) ? true : false;
$views = (in_array('views', $cmsmasters_post_metadata) || (is_home() && CMSMASTERS_CONTENT_COMPOSER)) ? true : false;


$cmsmasters_post_fullwidth_layout = get_post_meta(get_the_ID(), 'cmsmasters_post_fullwidth_layout', true);

$cmsmasters_post_format = get_post_format();

?>
<!-- Start Post Default Article  -->
<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_post_default' . ($cmsmasters_post_fullwidth_layout == 'true' ? ' cmsmasters_post_fullwidth' : '') . ''); ?>>
	<?php
	if ($cmsmasters_post_format == 'image') {
		$cmsmasters_post_image_link = get_post_meta(get_the_ID(), 'cmsmasters_post_image_link', true);
		
		cosmetista_post_type_image(get_the_ID(), $cmsmasters_post_image_link);
	} elseif ($cmsmasters_post_format == 'gallery') {
		$cmsmasters_post_images = explode(',', str_replace(' ', '', str_replace('img_', '', get_post_meta(get_the_ID(), 'cmsmasters_post_images', true))));
		
		$slider_data = ' data-pagination="false"';
		
		cosmetista_post_type_slider(get_the_ID(), $cmsmasters_post_images, 'post-thumbnail', $slider_data);
	} elseif ($cmsmasters_post_format == 'video') {
		$cmsmasters_post_video_type = get_post_meta(get_the_ID(), 'cmsmasters_post_video_type', true);
		$cmsmasters_post_video_link = get_post_meta(get_the_ID(), 'cmsmasters_post_video_link', true);
		$cmsmasters_post_video_links = get_post_meta(get_the_ID(), 'cmsmasters_post_video_links', true);
		
		cosmetista_post_type_video_button(get_the_ID(), $cmsmasters_post_video_type, $cmsmasters_post_video_link, $cmsmasters_post_video_links);
	} elseif ($cmsmasters_post_format == '' && !post_password_required() && has_post_thumbnail()) {
		cosmetista_thumb(get_the_ID(), 'post-thumbnail', true, false, false, false, false, true, false);
	}
	
	
	echo '<div class="cmsmasters_post_cont">';
		
		if ($author || $date || $categories) {
			echo '<div class="cmsmasters_post_cont_info entry-meta">';
				
				if (is_home() && is_sticky()) {
					echo '<span class="cmsmasters_post_sticky"></span>';
				}
				
				$date ? cosmetista_get_post_date('page', 'default') : '';
				
				$categories ? cosmetista_get_post_category(get_the_ID(), 'category', 'page') : '';
				
				$author ? cosmetista_get_post_author('page') : '';
				
			echo '</div>';
		}
		
		
		cosmetista_post_heading(get_the_ID(), 'h2');
		
		$excerpt ? cosmetista_post_exc_cont(100) : '';
		
		
		if ($cmsmasters_post_format == 'audio') {
			$cmsmasters_post_audio_links = get_post_meta(get_the_ID(), 'cmsmasters_post_audio_links', true);
			
			cosmetista_post_type_audio($cmsmasters_post_audio_links);
		} 
		
		
		if ($more || $likes || $comments || $views) {
			echo '<footer class="cmsmasters_post_footer entry-meta">';
				
				$more ? cosmetista_post_more(get_the_ID()) : '';
				
				
				if ($likes || $comments || $views) {
					echo '<div class="cmsmasters_post_info">';
						
						$likes ? cosmetista_get_post_likes('page') : '';
						
						$comments ? cosmetista_get_post_comments('page') : '';
						
						$views ? cosmetista_get_post_views('page') : '';
						
					echo '</div>';
				}
				
			echo '</footer>';
		}
		?>
	</div>
</article>
<!-- Finish Post Default Article  -->

