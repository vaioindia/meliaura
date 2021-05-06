<?php
/**
 * Admin Class
 *
 * Handles the admin functionality of plugin
 *
 * @package WP Testimonials with rotator widget
 * @since 2.2.8
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Wtwp_Admin {

	function __construct() {

		// Add Metabox
		add_action( 'admin_menu', array($this, 'meta_box_setup'));

		// Save Post Action 
		add_action( 'save_post_'.WTWP_POST_TYPE, array($this, 'meta_box_save'));

		// Action to add admin menu
		add_action( 'admin_menu', array($this, 'wtwp_register_menu'), 12 );

		// Init Processes
		add_action( 'admin_init', array($this, 'wtwp_admin_init_process') );

		// Testimonial post columns Processes
		add_filter( 'manage_edit-testimonial_columns', array($this, 'register_custom_column_headings' ));
		add_action( 'manage_posts_custom_column',  array($this, 'register_custom_columns') );

		// Testimonial category columns Processes
		add_filter("manage_testimonial-category_custom_column", array($this, 'testimonial_category_columns'), 10, 3);
		add_filter("manage_edit-testimonial-category_columns", array($this, 'testimonial_category_manage_columns'));
	}

	/**
	 * Function to Manage meta_box_setup
	 * 
	 * @package WP Testimonials with rotator widget
	 * @since 1.0
	 */
	function meta_box_setup () {
		add_meta_box( 'testimonial-details', __( 'Testimonial Details', 'wp-testimonial-with-widget' ), array($this, 'meta_box_content'), 'testimonial', 'normal', 'high' );
	}

	/**
	 * Function to Manage metabox content
	 * 
	 * @package WP Testimonials with rotator widget
	 * @since 1.0
	 */
	function meta_box_content () {

		global $post_id;
		$fields = get_post_custom( $post_id );
		$field_data = get_custom_fields_settings();

		$html = '';
		$html .= wp_nonce_field( 'meta_box_save', 'sp_testimonial_noonce' );
		if ( 0 < count( $field_data ) ) {
			$html .= '<table class="form-table">' . "\n";
			$html .= '<tbody>' . "\n";

			foreach ( $field_data as $k => $v ) {
				$data = $v['default'];
				if ( isset( $fields['_' . $k] ) && isset( $fields['_' . $k][0] ) ) {
					$data = $fields['_' . $k][0];

				}

				$html .= '<tr valign="top"><th scope="row"><label for="' . esc_attr( $k ) . '">' . $v['name'] . '</label></th><td><input name="' . esc_attr( $k ) . '" type="text" id="' . esc_attr( $k ) . '" class="regular-text" value="' . esc_attr( $data ) . '" />' . "\n";
				$html .= '<p class="description">' . $v['description'] . '</p>' . "\n";
				$html .= '</td><tr/>' . "\n";
			}

			$html .= '</tbody>' . "\n";
			$html .= '</table>' . "\n";
		}

		echo $html;
	}

	/**
	 * Function to Manage meta_box_save
	 * 
	 * @package WP Testimonials with rotator widget
	 * @since 1.0
	 */	
	function meta_box_save ( $post_id ) {

		global $post, $messages;
		// Verify
		if ( ( get_post_type( $post_id) != 'testimonial' ) ) {
			return $post_id;
		}
		if ( ! isset( $_POST['sp_testimonial_noonce'] ) ) {
			return $post_id;
		}
		if ( ! wp_verify_nonce( $_POST['sp_testimonial_noonce'], 'meta_box_save' ) ) {
			return $post_id;
		}
		if ( 'page' == $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return $post_id;
			}
		} else {
			if ( ! current_user_can( 'edit_post', $post_id ) ) {
				return $post_id;
			}
		}

		$field_data = get_custom_fields_settings();
		$fields = array_keys( $field_data );

		foreach ( $fields as $f ) {

			${$f} = strip_tags(trim($_POST[$f]));
			//echo '<pre>';print_r(${$f});die;
			// Escape the URLs.
			if ( 'url' == $field_data[$f]['type'] ) {

				${$f} = esc_url( ${$f} );
			}

			if ( get_post_meta( $post_id, '_' . $f ) == '' ) {

				add_post_meta( $post_id, '_' . $f, ${$f}, true );
			} elseif( ${$f} != get_post_meta( $post_id, '_' . $f, true ) ) {
				update_post_meta( $post_id, '_' . $f, ${$f} );
			} elseif ( ${$f} == '' ) {
				delete_post_meta( $post_id, '_' . $f, get_post_meta( $post_id, '_' . $f, true ) );
			}
		}
	}

	/**
	 * Function to add menu
	 * 
	 * @package WP Testimonials with rotator widget
	 * @since 2.2.8
	 */
	function wtwp_register_menu() {

		// Register plugin how it work
		add_submenu_page( 'edit.php?post_type='.WTWP_POST_TYPE, __('How it works, our plugins and offers', 'wp-testimonial-with-widget'), __('How It Works', 'wp-testimonial-with-widget'), 'manage_options', 'wptww-designs', array($this, 'wptww_designs_page') );

		// Register plugin premium page
		add_submenu_page( 'edit.php?post_type='.WTWP_POST_TYPE, __('Upgrade to PRO - WP Testimonials with rotator widget', 'wp-testimonial-with-widget'), '<span style="color:#2ECC71">'.__('Upgrade to PRO', 'wp-testimonial-with-widget').'</span>', 'manage_options', 'wtwp-premium', array($this, 'wtwp_premium_page') );
	}

	/**
	 * Function to display plugin design HTML
	 * 
	 * @package wp-testimonial-with-widget
	 * @since 1.0.0
	 */
	function wptww_designs_page() {
		include_once( WTWP_DIR . '/includes/admin/wptww-how-it-work.php' );
	}
	/**
	 * Getting Started Page Html
	 * 
	 * @package WP Testimonials with rotator widget
	 * @since 2.2.8
	 */
	function wtwp_premium_page() {
		include_once( WTWP_DIR . '/includes/admin/settings/premium.php' );
	}

	/**
	 * Function to notification transient
	 * 
	 * @package WP Testimonials with rotator widget
	 * @since 2.2.8
	 */
	function wtwp_admin_init_process() {
		// If plugin notice is dismissed
	    if( isset($_GET['message']) && $_GET['message'] == 'wtwp-plugin-notice' ) {
	    	set_transient( 'wtwp_install_notice', true, 604800 );
	    }
	}

	/**
	 * Function to Custom coloumns
	 * 
	 * @package WP Testimonials with rotator widget
	 * @since 2.2.8
	 */
	function register_custom_columns ( $column_name ) {
		global $wpdb, $post;
		switch ( $column_name ) {
			case 'image':
				$value = '';
				$value = wtwp_get_image( get_the_ID(), 40 ,'square');
				echo $value;
			break;
			default:
			break;
		}
	}

	/**
	 * Function to Custom coloumn headings
	 * 
	 * @package WP Testimonials with rotator widget
	 * @since 2.2.8
	 */
	function register_custom_column_headings ( $defaults ) {
		$new_columns = array( 'image' => __( 'Image', 'wp-testimonial-with-widget' ) );
		$last_item = '';
		if ( isset( $defaults['date'] ) ) { unset( $defaults['date'] ); }
		if ( count( $defaults ) > 2 ) {
			$last_item = array_slice( $defaults, -1 );
			array_pop( $defaults );
		}
		$defaults = array_merge( $defaults, $new_columns );
		if ( $last_item != '' ) {
			foreach ( $last_item as $k => $v ) {
				$defaults[$k] = $v;
				break;
			}
		}
		return $defaults;
	}

	/**
	 * Function to Manage Category manage Columns
	 * 
	 * @package WP Testimonials with rotator widget
	 * @since 1.0
	 */
	function testimonial_category_manage_columns($theme_columns) {
	    $new_columns = array(
	            'cb' => '<input type="checkbox" />',
	            'name' => __('Name'),
	            'testimonial_shortcode' => __( 'Testimonial Category Shortcode', 'wp-testimonial-with-widget' ),
	            'slug' => __('Slug'),
	            'posts' => __('Posts')
				);
	    return $new_columns;
	}

	/**
	 * Function to Manage Category Shortcode Columns
	 * 
	 * @package WP Testimonials with rotator widget
	 * @since 1.0
	 */
	function testimonial_category_columns($out, $column_name, $theme_id) {
	    $theme = get_term($theme_id, 'testimonial-category');
	    switch ($column_name) {

	        case 'title':
	            echo get_the_title();
	        break;
	        case 'testimonial_shortcode':
			echo '[sp_testimonials category="' . $theme_id. '"]<br />';
			echo '[sp_testimonials_slider category="' . $theme_id. '"]';
	        break;

	        default:
	            break;
	    }
	    return $out;
	}
}

$wtwp_Admin = new Wtwp_Admin();