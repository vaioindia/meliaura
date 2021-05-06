<?php
/**
 * Plugin Name: Comments Shortcode
 * Plugin URI: https://wordpress.org/plugins/comments-shortcode/
 * Description: Use a shortcode anywhere and display comments on WordPress pages and posts along with the comment form.
 * Version: 1.0
 * Author: Sirius Pro
 * Author URI: https://siriuspro.pl
 * License: GPL v3
 * License URI: https://www.gnu.org/licenses/gpl.html
 */

// Comments Shortcode

add_action('wp_head', function (){
	global $postPage, $post;
	$postPage = $post;
});

add_shortcode('sp_comments_block',function($attr, $content){
	global $post,$postPage;
	$savePost = $post;
	$post = $postPage;
	ob_start();
	comments_template();
	$output = ob_get_contents();
	ob_end_clean();
	$post = $savePost;
	return $output;
});