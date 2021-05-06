<?php
/*
Plugin Name: Stars Testimonials
Contributors: galdub, tomeraharon
Description: Responsive and customizable testimonial & reviews widgets
Plugin URI: https://premio.io/downloads/stars-testimonials/
Author: Premio
Author URI: https://premio.io/downloads/stars-testimonials/
Version: 3.2.2
License: GPL2
Text Domain: stars-testimonials
Domain Path: languages
*/

if ( ! defined( 'ABSPATH' ) ) exit;

define("HAS_PRO_FEATURES",true);
define("DB_TESTIMONIAL_TABLE_NAME","star_testimonial_settings");

define( 'WCP_TESTIMONIAL__FILE__', __FILE__ );
define( 'TESTIMONIAL_PLUGIN_BASE', plugin_basename( WCP_TESTIMONIAL__FILE__ ) );
define( 'TESTIMONIAL_PLUGIN_URL', plugins_url('/', __FILE__) );
define('PREMIO_TESTIMONIAL_PLUGIN_VERSION', '3.2.2');

require 'plugin.class.php';
if (class_exists('Stars_Testimonials')) {
	$st_ob = new Stars_Testimonials;
}

if(is_admin()) {
    include_once "class-review-box.php";
    include_once "class-affiliate.php";
}
register_activation_hook( __FILE__, 'create_testimonial_database_table' );
function create_testimonial_database_table() {
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix . DB_TESTIMONIAL_TABLE_NAME;

    $sql = "CREATE TABLE {$table_name} (
		  id int(9) NOT NULL AUTO_INCREMENT,
          testimonial_type char(10),
          shortcode_name char(50),
          font_family char(50),
          testimonial_style int(11),
          grid_columns int(11),
          testimonial_categories char(50),
          no_of_testimonials int(11),
          testimonial_order char(20),
          slides_to_scroll int(11),
          scroll_speed int(11),
          navigation_dots char(10),
          navigation_arrows char(10),
          is_slider_autoplay char(10),
          slider_interval int(11),
          stars_color char(10),
          stars_color_custom char(10),
          text_color char(10),
          text_color_custom char(10),
          background_color char(10),
          background_color_custom char(10),
          title_color char(10),
          title_color_custom char(10),
          company_color char(10),
          company_color_custom char(10),
          arrow_color char(10),
          arrow_color_custom char(10),
          created_by int(11),
          created_date timestamp DEFAULT CURRENT_TIMESTAMP,
          PRIMARY KEY (id)
        ) {$charset_collate};
	";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

    add_option('stars_testimonail_plugin_redirection', true);
}
?>