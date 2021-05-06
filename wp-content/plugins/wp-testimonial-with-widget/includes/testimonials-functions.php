<?php 
if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Function to get plugin image sizes array
 * 
 * @package WP Testimonials with rotator widget
 * @since 2.2.4
 */
function wtwp_get_unique() {
	static $unique = 0;
	$unique++;

	return $unique;
}

/**
 * Function to get shortcode design
 * 
 * @package WP Testimonials with rotator widget
 * @since 1.0
 */
function wptww_designs() {
	$design_arr = array(
		'design-1'	=> __('Design 1', 'wp-testimonial-with-widget'),
		'design-2'	=> __('Design 2', 'wp-testimonial-with-widget'),
		'design-3'	=> __('Design 3', 'wp-testimonial-with-widget'),
		'design-4'	=> __('Design 4', 'wp-testimonial-with-widget'),
		);
	return apply_filters('wptww_designs', $design_arr );
}

/**
 * Function to get user image
 * 
 * @package WP Testimonials with rotator widget
 * @since 1.0
 */
function wtwp_get_image( $id, $size, $style = "circle" ) {

	$response = '';

	if ( has_post_thumbnail( $id ) ) {
		// If not a string or an array, and not an integer, default to 150x9999.
		if ( ( is_int( $size ) || ( 0 < intval( $size ) ) ) && ! is_array( $size ) ) {
			$size = array( intval( $size ), intval( $size ) );
		} elseif ( ! is_string( $size ) && ! is_array( $size ) ) {
			$size = array( 100, 100 );
		}

		$response = get_the_post_thumbnail( intval( $id ), $size, array('class' => $style) );

	}
	return $response;
}

/**
 * Sanitize number value and return fallback value if it is blank
 * 
 * @package WP Testimonials with rotator widget
 * @since 1.0
 */
function wtwp_clean_number( $var, $fallback = null ) {
	$data = absint( $var );
	return ( empty($data) && $fallback ) ? $fallback : $data;
}

/**
 * Sanitize Multiple HTML class
 * 
 * @package WP Testimonials with rotator widget
 * @since 1.0
 */
function wtwp_sanitize_html_classes($classes, $sep = " ") {
    $return = "";

    if( !is_array($classes) ) {
        $classes = explode($sep, $classes);
    }

    if( !empty($classes) ) {
        foreach($classes as $class){
            $return .= sanitize_html_class($class) . " ";
        }
        $return = trim( $return );
    }

    return $return;
}

/**
 * Function get_custom_fields_settings
 * 
 * @package WP Testimonials with rotator widget
 * @since 1.0
 */
function get_custom_fields_settings () {
	$fields = array();

	$fields['testimonial_client'] = array(
	    'name' => __( 'Client Name', 'wp-testimonial-with-widget' ),
	    'description' => __( '' ),
	    'type' => 'text',
	    'default' => '',
	    'section' => 'info'
	);

	$fields['testimonial_job'] = array(
	    'name' => __( 'Job Title', 'wp-testimonial-with-widget' ),
	    'description' => __( '' ),
	    'type' => 'text',
	    'default' => '',
	    'section' => 'info'
	);

	$fields['testimonial_company'] = array(
	    'name' => __( 'Company', 'wp-testimonial-with-widget' ),
	    'description' => __( '' ),
	    'type' => 'text',
	    'default' => '',
	    'section' => 'info'
	);

	$fields['testimonial_url'] = array(
	    'name' => __( 'URL', 'wp-testimonial-with-widget' ),
	    'description' => __( '' ),
	    'type' => 'text',
	    'default' => '',
	    'section' => 'info'
	);

	return $fields;
}