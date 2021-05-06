<?php
/**
 * Script Class
 *
 * Handles the script and style functionality of plugin
 *
 * @package WP Testimonials with rotator widget
 * @since 1.0.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Wptww_Script {

	function __construct() {

		// Action to add style && script in backend
		add_action( 'admin_enqueue_scripts', array($this, 'wptww_admin_script') );

		// Action to add style at front side
		add_action( 'wp_enqueue_scripts', array($this, 'wptww_front_style') );

		// Action to add script at front side
		add_action( 'wp_enqueue_scripts', array($this, 'wptww_front_script') );

	}

	/**
	 * Enqueue admin script
	 * 
	 * @package WP Testimonials with rotator widget
	 * @since 2.6
	 */
	function wptww_admin_script( $hook ) {
		wp_register_script( 'wtwp-admin-js', WTWP_URL.'assets/js/wtwp-admin.js', array('jquery'), WTWP_VERSION, true );

		if( $hook == WTWP_POST_TYPE.'_page_wptww-designs' ) {
			wp_enqueue_script( 'wtwp-admin-js' );
		}
	}

	/**
	 * Function to add style at front side
	 * 
	 * @package WP Testimonials with rotator widget
	 * @since 1.0.0
	 */
	function wptww_front_style() {

		// Registring font awesome style
			wp_register_style( 'wtwp-font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', array(), WTWP_VERSION );
			wp_enqueue_style( 'wtwp-font-awesome' );

		// Registring and enqueing slick css
		if( !wp_style_is( 'wpos-slick-style', 'registered' ) ) {
			wp_register_style( 'wpos-slick-style', WTWP_URL.'assets/css/slick.css', array(), WTWP_VERSION );
		}
		wp_enqueue_style( 'wpos-slick-style');

		// Registring and enqueing public css
		wp_register_style( 'wptww-public-css', WTWP_URL.'assets/css/testimonials-style.css', array(), WTWP_VERSION );
		wp_enqueue_style( 'wptww-public-css' );
	}
	/**
	 * Function to add script at front side
	 * 
	 * @package WP Testimonials with rotator widget
	 * @since 1.0.0
	 */
	function wptww_front_script() {
		// Registring slick slider script
		if( !wp_script_is( 'wpos-slick-jquery', 'registered' ) ) {
			wp_register_script( 'wpos-slick-jquery', WTWP_URL.'assets/js/slick.min.js', array('jquery'), WTWP_VERSION, true );
		}
		wp_register_script( 'wtwp-testimonail-public', WTWP_URL.'assets/js/wtwp-testimonail-public.js', array('jquery'), WTWP_VERSION, true );
	}
}

$wptww_script = new Wptww_Script();