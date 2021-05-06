<?php
/**
 * @package 	WordPress
 * @subpackage 	Cosmetista
 * @version		1.0.0
 * 
 * Quote Slider Template
 * Created by CMSMasters
 * 
 */


?>
<!-- Start Quote Slider Article  -->
<article class="cmsmasters_quote_inner">
<?php 
	if ($quote_image != '') {
		echo '<figure class="cmsmasters_quote_image">' . 
			wp_get_attachment_image(strstr($quote_image, '|', true), 'cmsmasters-small-thumb') . 
		'</figure>';
	} else {
		echo '<div class="cmsmasters_quote_placeholder"></div>';
	}
	
	
	echo cmsmasters_divpdel('<div class="cmsmasters_quote_content">' . 
		do_shortcode(wpautop($quote_content)) . 
	'</div>');
	
	
	if ($quote_name != '') {
		echo '<header class="cmsmasters_quote_header">' . 
			'<h3 class="cmsmasters_quote_title">' . esc_html($quote_name) . '</h3>' . 
		'</header>';
	}
	
	
	if ($quote_subtitle != '' || $quote_website != '' || $quote_link != '') {
		echo '<div class="cmsmasters_quote_subtitle_wrap">' . 
			
			($quote_subtitle != '' ? '<h5 class="cmsmasters_quote_subtitle">' . esc_html($quote_subtitle) . '</h5>' : '');
			
			
			if ($quote_website != '' || $quote_link != '') {
				echo '<span class="cmsmasters_quote_site">' . 
					($quote_link != '' ? '<a href="' . esc_url($quote_link) . '" target="_blank">' : '') . 
					
					($quote_website != '' ? esc_html($quote_website) : esc_html($quote_link)) . 
					
					($quote_link != '' ? '</a>' : '') . 
				'</span>';
			}
			
		echo '</div>';
	}
?>
</article>
<!-- Finish Quote Slider Article  -->

