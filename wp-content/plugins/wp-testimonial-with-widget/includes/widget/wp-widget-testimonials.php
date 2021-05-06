<?php
/**
 * Widget Class
 *
 * Handles testimonial widget functionality of plugin
 *
 * @package WP Testimonials with rotator widget
 * @since 1.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function wtwp_testimonial_widget() {
	register_widget( 'wtwp_testimonials_widget' );
}

// Action to register widget
add_action( 'widgets_init', 'wtwp_testimonial_widget' );

class wtwp_testimonials_widget extends WP_Widget {
	
	var $defaults;

	/**
	 * Sets up a new widget instance.
	 *
	 * @package WP Testimonials with rotator widget Pro
	 * @since 1.0
	 */
	function __construct() {

		$widget_ops = array( 'classname' => 'widget_sp_testimonials', 'description' => __( 'Display testimonials on your site.', 'wp-testimonial-with-widget' ) );
		parent::__construct( 'sp_testimonials', __( 'WP Testimonials Slider', 'wp-testimonial-with-widget' ), $widget_ops );

		$this->defaults = array(
			'limit' 			=> 20,
			'orderby'			=> 'date',
			'order'				=> 'DESC',
			'title'				=> __( 'Testimonial Post Slider', 'wp-testimonial-with-widget' ),
			'slides_column'		=> 1,
			'slides_scroll'		=> 1,
			'category'			=> '',
			'display_quotes'    => 1,
			'display_client'	=> 1,
			'display_avatar'	=> 1,
			'display_job'		=> 1,
			'display_company'	=> 1,
			'image_style'		=> 'circle',
			'design'			=> 'design-1',
			'dots'				=> "true",
			'arrows'			=> "true",			
			'autoplay'			=> "true",
			'autoplay_interval'	=> 3000,
			'speed'				=> 300,
			'size'				=> 100,
			'adaptive_height'	=> "false",	
		);
	}
	
	
	/**
	 * Handles updating settings for the current widget instance.
	 *
	 * @package WP Testimonials with rotator widget
	 * @since 1.0
	 */
	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title']				= sanitize_text_field( $new_instance['title'] );
		$instance['limit']				= !empty( $new_instance['limit'] )					? wtwp_clean_number( $new_instance['limit'] ) 			: 20;
		$instance['size']				= !empty( $new_instance['size'] )					? wtwp_clean_number( $new_instance['size'] ) 			: 100;
		$instance['slides_column']		= !empty( $new_instance['slides_column'] ) 			? wtwp_clean_number( $new_instance['slides_column'] )	: 1;
		$instance['slides_scroll']		= !empty( $new_instance['slides_scroll'] ) 			? wtwp_clean_number( $new_instance['slides_scroll'] )	: 1;
		$instance['orderby']			= !empty( $new_instance['orderby'] ) 				? $new_instance['orderby']			: 'post_date';
		$instance['order']				= ( strtolower( $new_instance['order'] ) == 'asc' ) ? 'ASC'								: 'DESC';
		$instance['category']			= $new_instance['category'];
		$instance['image_style']		= $new_instance['image_style'];
		$instance['design']				= $new_instance['design'];
		$instance['dots']				= ( $new_instance['dots'] == 'true' )				? 'true'							: 'false';
		$instance['arrows']				= ( $new_instance['arrows'] == 'true' )				? 'true'							: 'false';
		$instance['autoplay']			= ( $new_instance['autoplay'] == 'true' )			? 'true'							: 'false';
		$instance['autoplay_interval']	= !empty( $new_instance['autoplay_interval'] )		? wtwp_clean_number( $new_instance['autoplay_interval'] )	: 3000;
		$instance['speed']				= !empty( $new_instance['speed'] )					? wtwp_clean_number( $new_instance['speed'] )				: 300;
		$instance['adaptive_height'] 	= ( $new_instance['adaptive_height'] == 'true' ) 	? 'true' 							: 'false';
		$instance['display_client']		= ( $new_instance['display_client'] == 1 ) 			? 1 								: 0;
		$instance['display_quotes'] 	= ( $new_instance['display_quotes'] == 1 ) 			? 1 								: 0;
		$instance['display_avatar']		= ( $new_instance['display_avatar'] == 1 ) 			? 1 								: 0;
		$instance['display_job']		= ( $new_instance['display_job'] == 1 ) 			? 1 								: 0;
		$instance['display_company'] 	= ( $new_instance['display_company'] == 1 ) 		? 1 								: 0;

		return $instance;
	}
	
   
   /**
	 * Outputs the settings form for the widget.
	 *
	 * @package WP Testimonials with rotator widget
	 * @since 1.0
	 */
	function form( $instance ) {
		$instance 		= wp_parse_args( (array) $instance, $this->defaults );
		$wtwp_designs 	= wptww_designs();
	?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'wp-testimonial-with-widget' ); ?></label>
			<input type="text" name="<?php echo $this->get_field_name( 'title' ); ?>"  value="<?php echo esc_attr($instance['title']); ?>" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" />
		</p>

		<!-- Widget Order By: Select Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'design' ); ?>"><?php _e( 'Design', 'wp-testimonial-with-widget' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'design' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'design' ); ?>">
				<?php if( !empty($wtwp_designs) ) {
					foreach ( $wtwp_designs as $k => $v ) { ?>
						<option value="<?php echo $k; ?>"<?php selected( $instance['design'], $k ); ?>><?php echo $v; ?></option>
				<?php } } ?>
			</select><br/>
			<em><?php _e('Select testimonial design. Note: Some design will not look good in a small area of widget.', 'wp-testimonial-with-widget'); ?></em>
		</p>

		<!-- Widget Limit: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'limit' ); ?>"><?php _e( 'Limit', 'wp-testimonial-with-widget' ); ?></label>
			<input type="number" name="<?php echo $this->get_field_name( 'limit' ); ?>"  value="<?php echo $instance['limit']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'limit' ); ?>" min="-1" />
		</p>

		<!-- Widget Order: Design Style -->
		<p>
			<label for="<?php echo $this->get_field_id( 'orderby' ); ?>"><?php _e( 'Order By', 'wp-testimonial-with-widget' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'orderby' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'orderby' ); ?>">
				<option value="date" <?php selected( $instance['orderby'], 'date' ); ?>><?php _e( 'Date', 'wp-testimonial-with-widget' ); ?></option>
				<option value="modified" <?php selected( $instance['orderby'], 'modified' ); ?>><?php _e( 'Modified Date', 'wp-testimonial-with-widget' ); ?></option>
				<option value="ID" <?php selected( $instance['orderby'], 'ID' ); ?>><?php _e( 'ID', 'wp-testimonial-with-widget' ); ?></option>
				<option value="author" <?php selected( $instance['orderby'], 'author' ); ?>><?php _e( 'Author', 'wp-testimonial-with-widget' ); ?></option>
				<option value="title" <?php selected( $instance['orderby'], 'title' ); ?>><?php _e( 'Title', 'wp-testimonial-with-widget' ); ?></option>
				<option value="name" <?php selected( $instance['orderby'], 'name' ); ?>><?php _e( 'Testimonial URL Slug', 'wp-testimonial-with-widget' ); ?></option>
				<option value="rand" <?php selected( $instance['orderby'], 'rand' ); ?>><?php _e( 'Random', 'wp-testimonial-with-widget' ); ?></option>
				<option value="menu_order" <?php selected( $instance['orderby'], 'menu_order' ); ?>><?php _e( 'Menu Order', 'wp-testimonial-with-widget' ); ?></option>
			</select>
		</p>

		<!-- Widget Order: Select Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'order' ); ?>"><?php _e( 'Order', 'wp-testimonial-with-widget' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'order' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'order' ); ?>">
				<option value="ASC" <?php selected( $instance['order'], 'asc' ); ?>><?php _e( 'Ascending', 'wp-testimonial-with-widget' ); ?></option>
				<option value="DESC" <?php selected( $instance['order'], 'desc' ); ?>><?php _e( 'Descending', 'wp-testimonial-with-widget' ); ?></option>
			</select>
		</p>

		<!-- Widget Category: Select Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Category', 'wp-testimonial-with-widget' ); ?></label>
			<?php
				$dropdown_args = array(
					'hide_empty' 		=> 0, 
					'taxonomy' 			=> WTWP_CAT,
					'class' 			=> 'widefat',
					'show_option_all' 	=> __( 'All', 'wp-testimonial-with-widget' ),
					'id' 				=> $this->get_field_id( 'category' ),
					'name' 				=> $this->get_field_name( 'category' ),
					'selected' 			=> $instance['category']
				);
				wp_dropdown_categories( $dropdown_args );
			?>
		</p>

		<!-- Widget ID:  size  -->
		<p>
			<label for="<?php echo $this->get_field_id( 'size' ); ?>"><?php _e( 'Image Size', 'wp-testimonial-with-widget' ); ?></label>
			<input type="number" name="<?php echo $this->get_field_name( 'size' ); ?>"  value="<?php echo $instance['size']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'size' ); ?>" min="0" />
		</p>

		<!-- Widget ID:  col -->
		<p>
			<label for="<?php echo $this->get_field_id( 'slides_column' ); ?>"><?php _e( 'Slides Column', 'wp-testimonial-with-widget' ); ?></label>
			<input type="number" name="<?php echo $this->get_field_name( 'slides_column' ); ?>"  value="<?php echo $instance['slides_column']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'slides_column' ); ?>" min="1" />
		</p>

		<!-- Widget ID:  col to scroll -->
		<p>
			<label for="<?php echo $this->get_field_id( 'slides_scroll' ); ?>"><?php _e( 'Slides to Scroll', 'wp-testimonial-with-widget' ); ?></label>
			<input type="number" name="<?php echo $this->get_field_name( 'slides_scroll' ); ?>"  value="<?php echo $instance['slides_scroll']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'slides_scroll' ); ?>" min="1" />
		</p>

		<!-- Widget Order: Select Dots -->
		<p>
			<label for="<?php echo $this->get_field_id( 'dots' ); ?>"><?php _e( 'Dots', 'wp-testimonial-with-widget' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'dots' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'dots' ); ?>">
				<option value="true" <?php selected( $instance['dots'], 'true' ); ?>><?php _e( 'True', 'wp-testimonial-with-widget' ); ?></option>
				<option value="false" <?php selected( $instance['dots'], 'false' ); ?>><?php _e( 'False', 'wp-testimonial-with-widget' ); ?></option>
			</select>
		</p>

		<!-- Widget Order: Select Arrows -->
		<p>
			<label for="<?php echo $this->get_field_id( 'arrows' ); ?>"><?php _e( 'Arrows', 'wp-testimonial-with-widget' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'arrows' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'arrows' ); ?>">
				<option value="true" <?php selected( $instance['arrows'], 'true' ); ?>><?php _e( 'True', 'wp-testimonial-with-widget' ); ?></option>
				<option value="false" <?php selected( $instance['arrows'], 'false' ); ?>><?php _e( 'False', 'wp-testimonial-with-widget' ); ?></option>
			</select>
		</p>	

		<!-- Widget ID:  Autoplay -->
		<p>
			<label for="<?php echo $this->get_field_id( 'autoplay' ); ?>"><?php _e( 'Auto Play', 'wp-testimonial-with-widget' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'autoplay' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'autoplay' ); ?>">
				<option value="true" <?php selected( $instance['autoplay'], 'true' ); ?>><?php _e( 'True', 'wp-testimonial-with-widget' ); ?></option>
				<option value="false" <?php selected( $instance['autoplay'], 'false' ); ?>><?php _e( 'False', 'wp-testimonial-with-widget' ); ?></option>
			</select>
		</p>

		<!-- Widget ID:  autoplay_interval -->
		<p>
			<label for="<?php echo $this->get_field_id( 'autoplay_interval' ); ?>"><?php _e( 'Autoplay Interval', 'wp-testimonial-with-widget' ); ?></label>
			<input type="number" name="<?php echo $this->get_field_name( 'autoplay_interval' ); ?>"  value="<?php echo $instance['autoplay_interval']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'autoplay_interval' ); ?>" min="0" />
		</p>

		<!-- Widget ID:  Speed -->
		<p>
			<label for="<?php echo $this->get_field_id( 'speed' ); ?>"><?php _e( 'Speed', 'wp-testimonial-with-widget' ); ?></label>
			<input type="number" name="<?php echo $this->get_field_name( 'speed' ); ?>"  value="<?php echo $instance['speed']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'speed' ); ?>" min="0" />
		</p>

		<!-- Widget Order: Image Style -->
		<p>
			<label for="<?php echo $this->get_field_id( 'image_style' ); ?>"><?php _e( 'Image Style', 'wp-testimonial-with-widget' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'image_style' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'image_style' ); ?>">
				<option value="circle" <?php selected( $instance['image_style'], 'circle' ); ?>><?php _e( 'Circle', 'wp-testimonial-with-widget' ); ?></option>
				<option value="square" <?php selected( $instance['image_style'], 'square' ); ?>><?php _e( 'Square', 'wp-testimonial-with-widget' ); ?></option>
			</select>
		</p>

		<!-- Slider Auto Height -->
		<p>
			<label for="<?php echo $this->get_field_id( 'adaptive_height' ); ?>"><?php _e( 'Slider Auto Height', 'wp-testimonial-with-widget' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'adaptive_height' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'adaptive_height' ); ?>">
				<option value="true" <?php selected( $instance['adaptive_height'], 'true' ); ?>><?php _e( 'True', 'wp-testimonial-with-widget' ); ?></option>
				<option value="false" <?php selected( $instance['adaptive_height'], 'false' ); ?>><?php _e( 'False', 'wp-testimonial-with-widget' ); ?></option>
			</select>
		</p>		

		<!-- Widget Display Avatar: Checkbox Input -->
		<p>
			<input id="<?php echo $this->get_field_id( 'display_avatar' ); ?>" name="<?php echo $this->get_field_name( 'display_avatar' ); ?>" type="checkbox" value="1" <?php checked($instance['display_avatar'], 1); ?> />
			<label for="<?php echo $this->get_field_id( 'display_avatar' ); ?>"><?php _e( 'Display Avatar', 'wp-testimonial-with-widget' ); ?></label>
		</p>

		<!-- Widget Display Quotes Checkbox Input -->
		<p>
			<input id="<?php echo $this->get_field_id( 'display_quotes' ); ?>" name="<?php echo $this->get_field_name( 'display_quotes' ); ?>" type="checkbox" value="1" <?php checked($instance['display_quotes'], 1); ?> />
			<label for="<?php echo $this->get_field_id( 'display_quotes' ); ?>"><?php _e( 'Display Quotes', 'wp-testimonial-with-widget' ); ?></label>
		</p>

		<!-- Widget Display Client: Checkbox Input -->
		<p>
			<input id="<?php echo $this->get_field_id( 'display_client' ); ?>" name="<?php echo $this->get_field_name( 'display_client' ); ?>" type="checkbox" value="1" <?php checked( $instance['display_client'], 1 ); ?> />
			<label for="<?php echo $this->get_field_id( 'display_client' ); ?>"><?php _e( 'Display Client', 'wp-testimonial-with-widget' ); ?></label>
		</p>

		<!-- Widget Display Job: Checkbox Input -->
		<p>
			<input id="<?php echo $this->get_field_id( 'display_job' ); ?>" name="<?php echo $this->get_field_name( 'display_job' ); ?>" type="checkbox" value="1" <?php checked($instance['display_job'], 1); ?> />
			<label for="<?php echo $this->get_field_id( 'display_job' ); ?>"><?php _e( 'Display Job', 'wp-testimonial-with-widget' ); ?></label>
		</p>

		<!-- Widget Display Company: Checkbox Input -->
		<p>
			<input id="<?php echo $this->get_field_id( 'display_company' ); ?>" name="<?php echo $this->get_field_name( 'display_company' ); ?>" type="checkbox" value="1" <?php checked($instance['display_company'], 1); ?> />
			<label for="<?php echo $this->get_field_id( 'display_company' ); ?>"><?php _e( 'Display Company', 'wp-testimonial-with-widget' ); ?></label>
		</p>		

<?php } // End form()
   
		/**
	 * Outputs the content for the current widget instance.
	 *
	 * @package WP Testimonials with rotator widget
	 * @since 1.0
	 */
	function widget( $args, $instance ) {

		$atts = wp_parse_args( (array) $instance, $this->defaults );
		extract( $args, EXTR_SKIP );
		
		// Extract Shortcode Var
		extract($atts);

		$shortcode_designs 			= wptww_designs();
		$title 						= empty( $title ) ? '' : apply_filters( 'widget_title', $title );
		$category 					= ( !empty( $category ) ) ? explode( ',',$category )	: '';
		$design						= ( $design && ( array_key_exists( trim( $design), $shortcode_designs ) ) ) ? trim( $design )	: 'design-1';
		$image_style				= ( $image_style == 'circle' ) ? 'wptww-circle' : 'wptww-square';	

		// Enqueing required script
		wp_enqueue_script( 'wpos-slick-jquery' );
		wp_enqueue_script( 'wtwp-testimonail-public' );

		// Taking some globals
		global $post;

		// Taking some variables		
		$unique = wtwp_get_unique(); 

		// Query Parameter
		$args = array (
			'post_type'			=> WTWP_POST_TYPE,
			'post_status'		=> array( 'publish' ),
			'posts_per_page'	=> $limit,
			'order'				=> $order,
			'orderby'			=> $orderby,
		);

		// Category Parameter
		if($category != "") {

			$args['tax_query'] = array(
									array(
										'taxonomy'	=> WTWP_CAT,
										'field'		=> 'term_id',
										'terms'		=> $category
									));
		}

		// WP Query
		$query		= new WP_Query($args);
		$post_count = $query->post_count;	

		// Shortcode file
		$testimonials_design_file_path 	= WTWP_DIR . '/templates/designs/' . $design . '.php';
		$design_file 					= (file_exists($testimonials_design_file_path)) ? $testimonials_design_file_path : '';		

		// Slider Configuration
		$slider_conf = compact( 'slides_column', 'slides_scroll', 'dots', 'arrows', 'autoplay', 'autoplay_interval', 'speed','adaptive_height' );

		echo $before_widget;

		if ( $title ) {
			echo $before_title . $title . $after_title;
		}

		// If post is there
		if( $query->have_posts() ) { ?>
			 <div id="wptww-testimonial-<?php echo $unique; ?>" class="widget widget_sp_testimonials" data-conf="<?php echo htmlspecialchars(json_encode( $slider_conf )); ?>">
				<div id="wptww-testimonials-slide-widget-<?php echo $unique; ?>" class="wptww-testimonials-slide-widget-<?php echo $unique; ?> wptww-testimonials-slide-widget <?php echo $design; ?>">
			<?php
			while ( $query->have_posts() ) : $query->the_post();

				$author_image		= wtwp_get_image( $post->ID, $size, $image_style );
				$author				= get_post_meta( $post->ID, '_testimonial_client', true );
				$job_title			= get_post_meta( $post->ID, '_testimonial_job', true );
				$company			= get_post_meta( $post->ID, '_testimonial_company', true );
				$url				= get_post_meta( $post->ID, '_testimonial_url', true );			
				$testimonial_title	= get_the_title();
				$css_class 			= 'wtwp-quote';

				// Add a CSS class if no image is available.
				if( empty( $author_image) ) {
					$css_class .= ' wtwp-no-image';
				}

				 // Include shortcode html file
				if( $design_file ) {
					include( $design_file );
					}

			endwhile; ?>
			</div>
		</div>
		<?php } // End of have_post()

		wp_reset_postdata(); // Reset WP Query

		echo $after_widget;
	}
    
} // End Class
