<?php
/**
 * @package 	WordPress
 * @subpackage 	Cosmetista
 * @version		1.0.0
 * 
 * Posts Slider Project Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_metadata = explode(',', $cmsmasters_project_metadata);


$title = in_array('title', $cmsmasters_metadata) ? true : false;
$categories = (get_the_terms(get_the_ID(), 'pj-categs') && in_array('categories', $cmsmasters_metadata)) ? true : false;
$comments = (comments_open() && in_array('comments', $cmsmasters_metadata)) ? true : false;
$likes = in_array('likes', $cmsmasters_metadata) ? true : false;
$views = in_array('views', $cmsmasters_metadata) ? true : false;
$rating = in_array('rating', $cmsmasters_metadata) ? true : false;


$cmsmasters_project_link_url = get_post_meta(get_the_ID(), 'cmsmasters_project_link_url', true);
$cmsmasters_project_link_redirect = get_post_meta(get_the_ID(), 'cmsmasters_project_link_redirect', true);
$cmsmasters_project_link_target = get_post_meta(get_the_ID(), 'cmsmasters_project_link_target', true);


$cmsmasters_post_format = get_post_format();

?>
<!-- Start Posts Slider Project Article  -->
<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_slider_project'); ?>>
	<div class="cmsmasters_slider_project_outer">
	<?php 
		cosmetista_thumb_rollover(get_the_ID(), 'cmsmasters-project-thumb', false, false, false, false, false, false, false, false, true, $cmsmasters_project_link_redirect, $cmsmasters_project_link_url);
		
		
		if ($title || $categories || $likes || $comments || $rating || $views) {
			echo '<div class="cmsmasters_slider_project_inner">';
				
				if ($likes || $comments || $views) {
					echo '<footer class="cmsmasters_slider_project_footer entry-meta">';
						
						($likes) ? cosmetista_slider_post_like('project') : '';
						
						($comments) ? cosmetista_get_slider_post_comments('project') : '';
						
						($views) ? cosmetista_slider_post_views('project') : '';
						
					echo '</footer>';
				}
				
				if ($categories || $title || $rating) {
					echo '<div class="cmsmasters_slider_project_bottom">';
					
						$categories ? cosmetista_get_slider_post_category(get_the_ID(), 'pj-categs', 'project') : '';
					
						$title ? cosmetista_slider_post_heading(get_the_ID(), 'project', 'h3', $cmsmasters_project_link_redirect, $cmsmasters_project_link_url, true, $cmsmasters_project_link_target) : '';
						
						
						if ($rating && CMSMASTERS_RATING) {
							cosmetista_cmsmasters_rating(get_the_ID(), true);
						}
					
					echo '</div>';
				}
			echo '</div>';
		}
	?>
	</div>
</article>
<!-- Finish Posts Slider Project Article  -->

