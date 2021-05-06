<?php
/**
 * @package 	WordPress
 * @subpackage 	Cosmetista
 * @version		1.0.0
 * 
 * Posts Slider Post Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_metadata = explode(',', $cmsmasters_post_metadata);


$title = in_array('title', $cmsmasters_metadata) ? true : false;
$excerpt = (in_array('excerpt', $cmsmasters_metadata) && cosmetista_slider_post_check_exc_cont('post')) ? true : false;
$date = in_array('date', $cmsmasters_metadata) ? true : false;
$categories = (get_the_category() && (in_array('categories', $cmsmasters_metadata))) ? true : false;
$author = in_array('author', $cmsmasters_metadata) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsmasters_metadata))) ? true : false;
$likes = in_array('likes', $cmsmasters_metadata) ? true : false;
$more = in_array('more', $cmsmasters_metadata) ? true : false;
$views = in_array('views', $cmsmasters_metadata) ? true : false;


$cmsmasters_post_format = get_post_format();

?>
<!-- Start Posts Slider Post Article  -->
<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_slider_post'); ?>>
<?php
	if ($date || $likes || $comments || $views) {
		echo '<div class="cmsmasters_slider_post_cont_info entry-meta">';
		
			$date ? cosmetista_get_slider_post_date('post') : '';
			
			if ($likes || $comments || $views) {
				echo '<div class="cmsmasters_slider_post_info entry-meta">';
					
					$likes ? cosmetista_slider_post_like('post') : '';
					
					$comments ? cosmetista_get_slider_post_comments('post') : '';
					
					$views ? cosmetista_slider_post_views('post') : '';
					
				echo '</div>';
			}
		echo '</div>';
	}
	
	
	cosmetista_thumb_rollover(get_the_ID(), 'cmsmasters-blog-masonry-thumb', false, false, false, false, false, false, false, false, true, false, false);
	
	
	if ($categories || $author) {
		echo '<div class="cmsmasters_slider_post_info_meta entry-meta">';
			
			$categories ? cosmetista_get_slider_post_category(get_the_ID(), 'category', 'post') : '';
			
			$author ? cosmetista_get_slider_post_author('post') : '';
			
		echo '</div>';
	}
	
	
	$title ? cosmetista_slider_post_heading(get_the_ID(), 'post', 'h2') : '';
	
	$excerpt ? cosmetista_slider_post_exc_cont('post') : '';
	
	
	if ($more) {
		echo '<footer class="cmsmasters_slider_post_footer entry-meta">';
			
			$more ? cosmetista_slider_post_more(get_the_ID()) : '';
			
		echo '</footer>';
	}
?>
</article>
<!-- Finish Posts Slider Post Article  -->

