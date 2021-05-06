<?php
/**
 * @package 	WordPress
 * @subpackage 	Cosmetista
 * @version 	1.0.0
 * 
 * 404 Error Page Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = cosmetista_get_global_options();

?>

</div>

<!-- Start Content  -->
<div class="entry">
	<div class="error">
		<div class="error_bg">
			<div class="content_wrap fullwidth">
				<div class="error_inner">
					<h1 class="error_title"><?php echo esc_html__("404 - Page not Found!", 'cosmetista'); ?></h1>
					<div class="error_subtitle"><?php echo esc_html__("The page you trying to reach does not exist, or has been moved. Please use the menus or the search box below to find what you are looking for.", 'cosmetista'); ?></div>
				</div>
				<div class="error_cont">
					<?php 
					if ($cmsmasters_option['cosmetista' . '_error_search']) { 
						get_search_form(); 
					}
					
					
					if ($cmsmasters_option['cosmetista' . '_error_sitemap_button'] && $cmsmasters_option['cosmetista' . '_error_sitemap_link'] != '') {
						echo '<div class="error_button_wrap"><a href="' . esc_url($cmsmasters_option['cosmetista' . '_error_sitemap_link']) . '" class="button">' . esc_html__('Sitemap', 'cosmetista') . '</a></div>';
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="content_wrap fullwidth">
<!-- Finish Content  -->