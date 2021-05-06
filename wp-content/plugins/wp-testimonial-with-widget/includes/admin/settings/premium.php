<?php
/**
 * Plugin Premium Offer Page
 *
 * @package WP Testimonials with rotator widget
 * @since 1.0.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div class="wrap">

	<h2><?php _e( 'WP Testimonials with rotator widget - Features', 'wp-testimonial-with-widget' ); ?></h2><br />

	<style>
		.wprps-notice{padding: 10px; color: #3c763d; background-color: #dff0d8; border:1px solid #d6e9c6; margin: 0 0 20px 0;}
		.wpos-plugin-pricing-table thead th h2{font-weight: 400; font-size: 2.4em; line-height:normal; margin:0px; color: #2ECC71;}
		.wpos-plugin-pricing-table thead th h2 + p{font-size: 1.25em; line-height: 1.4; color: #999; margin:5px 0 5px 0;}

		table.wpos-plugin-pricing-table{width:90%; text-align: left; border-spacing: 0; border-collapse: collapse; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;}

		.wpos-plugin-pricing-table th, .wpos-plugin-pricing-table td{font-size:14px; line-height:normal; color:#444; vertical-align:middle; padding:12px;}

		.wpos-plugin-pricing-table colgroup:nth-child(1) { width: 31%; border: 0 none; }
		.wpos-plugin-pricing-table colgroup:nth-child(2) { width: 22%; border: 1px solid #ccc; }
		.wpos-plugin-pricing-table colgroup:nth-child(3) { width: 25%; border: 10px solid #2ECC71; }

		/* Tablehead */
		.wpos-plugin-pricing-table thead th {background-color: #fff; background:linear-gradient(to bottom, #ffffff 0%, #ffffff 100%); text-align: center; position: relative; border-bottom: 1px solid #ccc; padding: 1em 0 1em; font-weight:400; color:#999;}
		.wpos-plugin-pricing-table thead th:nth-child(1) {background: transparent;}
		.wpos-plugin-pricing-table thead th:nth-child(3) {padding:1em 2px 3.5em 2px; }
		.wpos-plugin-pricing-table thead th:nth-child(3) p{color:#000;}
		.wpos-plugin-pricing-table thead th p.promo {font-size: 14px; color: #fff; position: absolute; bottom:0; left: -17px; z-index: 1000; width: 100%; margin: 0; padding: .625em 17px .75em; background-color: #ca4a1f; box-shadow: 0 2px 4px rgba(0,0,0,.25); border-bottom: 1px solid #ca4a1f;}
		.wpos-plugin-pricing-table thead th p.promo:before {content: ""; position: absolute; display: block; width: 0px; height: 0px; border-style: solid; border-width: 0 7px 7px 0; border-color: transparent #900 transparent transparent; bottom: -7px; left: 0;}
		.wpos-plugin-pricing-table thead th p.promo:after {content: ""; position: absolute; display: block; width: 0px; height: 0px; border-style: solid; border-width: 7px 7px 0 0; border-color: #900 transparent transparent transparent; bottom: -7px; right: 0;}

		/* Tablebody */
		.wpos-plugin-pricing-table tbody th{background: #fff; border-left: 1px solid #ccc; font-weight: 600;}
		.wpos-plugin-pricing-table tbody th span{font-weight: normal; font-size: 87.5%; color: #999; display: block;}

		.wpos-plugin-pricing-table tbody td{background: #fff; text-align: center;}
		.wpos-plugin-pricing-table tbody td .dashicons{height: auto; width: auto; font-size:30px;}
		.wpos-plugin-pricing-table tbody td .dashicons-no-alt{color: #ca4a1f;}
		.wpos-plugin-pricing-table tbody td .dashicons-yes{color: #2ECC71;}

		.wpos-plugin-pricing-table tbody tr:nth-child(even) th,
		.wpos-plugin-pricing-table tbody tr:nth-child(even) td { background: #f5f5f5; border: 1px solid #ccc; border-width: 1px 0 1px 1px; }
		.wpos-plugin-pricing-table tbody tr:last-child td {border-bottom: 0 none;}

		/* Table Footer */
		.wpos-plugin-pricing-table tfoot th, .wpos-plugin-pricing-table tfoot td{text-align: center; border-top: 1px solid #ccc;}
		.wpos-plugin-pricing-table tfoot a{font-weight: 600; color: #fff; text-decoration: none; text-transform: uppercase; display: inline-block; padding: 1em 2em; background: #ca4a1f; border-radius: .2em;}
		.wpos-new-feature{ font-size: 10px; margin-left:5px; color: #fff; font-weight: bold; background-color: #03aa29; padding:1px 4px; font-style: normal; }

	</style>

	<table class="wpos-plugin-pricing-table">
		<colgroup></colgroup>
		<colgroup></colgroup>
		<colgroup></colgroup>
	    <thead>
	    	<tr>
	    		<th></th>
	    		<th>
	    			<h2><?php _e( 'Free', 'wp-testimonial-with-widget' ); ?></h2>
	    			<p><?php _e( '$0 USD', 'wp-testimonial-with-widget' ); ?></p>
	    		</th>
	    		<th>
	    			<h2><?php _e('Premium', 'wp-testimonial-with-widget'); ?></h2>
	    			<p><?php echo sprintf( __( 'Gain access to <strong>Testimonials with rotator widget</strong> included in <br /><strong>Essential Plugin Bundle', 'wp-testimonial-with-widget' ) ); ?></p>
	    			<p class="promo"><?php _e( 'Our most valuable package!', 'wp-testimonial-with-widget' ); ?></p>
	    		</th>
	    	</tr>
	    </thead>

	    <tfoot>
	    	<tr>
	    		<th></th>
	    		<td></td>
	    		<td><p><?php echo sprintf( __( 'Gain access to <strong>Testimonials with rotator widget</strong> included in <br /><strong>Essential Plugin Bundle', 'wp-testimonial-with-widget' ) ); ?></p>
				<a href="https://www.wponlinesupport.com/wp-plugin/wp-testimonial-with-widget/?ref=WposPratik&utm_source=WP&utm_medium=Testimonials&utm_campaign=Upgrade-PRO" class="wpos-button" target="_blank"><?php _e( 'View Pricing Options', 'wp-testimonial-with-widget' ); ?></a></td>
	    	</tr>
	    </tfoot>

	    <tbody>
	    	<tr>
	    		<th><?php _e( 'Designs ', 'wp-testimonial-with-widget' ); ?><span><?php _e( 'Designs that make your website better', 'wp-testimonial-with-widget' ); ?></span></th>
	    		<td>4</td>
	    		<td>20</td>
	    	</tr>
	    	<tr>
		    	<th><?php _e( 'Shortcodes ', 'wp-testimonial-with-widget' ); ?><span><?php _e( 'Shortcode provide output to the front-end side', 'wp-testimonial-with-widget' ); ?></span></th>
		    	<td><?php _e( '2 (Grid, Slider)', 'wp-testimonial-with-widget' ); ?></td>
				<td><?php _e( '3 (Grid, Slider, form)', 'wp-testimonial-with-widget' ); ?></td>
	    	</tr>
			<tr>
	    		<th><?php _e( 'Shortcode Parameters ', 'wp-testimonial-with-widget' ); ?><span><?php _e( 'Add extra power to the shortcode', 'wp-testimonial-with-widget' ); ?></span></th>
	    		<td>13</td>
	    		<td>28+</td>
	    	</tr>
	    	<tr>
	    		<th><?php _e( 'Shortcode Generator ', 'wp-testimonial-with-widget' ); ?><span><?php _e( 'Play with all shortcode parameters with preview panel. No documentation required!!', 'wp-testimonial-with-widget'); ?></span></th>
	    		<td><i class="dashicons dashicons-no-alt"></i></td>
	    		<td><i class="dashicons dashicons-yes"></i></td>
	    	</tr>
			<tr>
				<th><?php _e( 'WP Templating Features ', 'wp-testimonial-with-widget' ); ?><span class="subtext"><?php _e( 'You can modify plugin html/designs in your current theme.', 'wp-testimonial-with-widget' ); ?></span></th>
				<td><i class="dashicons dashicons-no-alt"> </i></td>
				<td><i class="dashicons dashicons-yes"> </i></td>
			</tr>
			<tr>
	    		<th><?php _e( 'Widgets ', 'wp-testimonial-with-widget' ); ?><span><?php _e( 'WordPress Widgets to your sidebars.', 'wp-testimonial-with-widget' ); ?></span></th>
	    		<td>1</td>
	    		<td>1</td>
	    	</tr>

	    	<tr>
	    		<th><?php _e( 'Drag & Drop Post Order Change ', 'wp-testimonial-with-widget' ); ?><span><?php _e( 'Arrange your desired post with your desired order and display', 'wp-testimonial-with-widget' ); ?></span></th>
	    		<td><i class="dashicons dashicons-no-alt"></i></td>
	    		<td><i class="dashicons dashicons-yes"></i></td>
	    	</tr>
	    	<tr>
	    		<th><?php _e( 'Gutenberg Block Supports ', 'wp-testimonial-with-widget' ); ?><span><?php _e( 'Use this plugin with Gutenberg easily', 'wp-testimonial-with-widget' ); ?></span></th>
	    		<td><i class="dashicons dashicons-yes"></i></td>
	    		<td><i class="dashicons dashicons-yes"></i></td>
	    	</tr>
	    	<tr>
	    		<th><?php _e( 'Elementor Page Builder Support', 'wp-testimonial-with-widget' ); ?><em class="wpos-new-feature">New</em> <span><?php _e( 'Use this plugin with Elementor easily', 'wp-testimonial-with-widget' ); ?></span></th>
	    		<td><i class="dashicons dashicons-no-alt"></i></td>
	    		<td><i class="dashicons dashicons-yes"></i></td>
	    	</tr>
	    	<tr>
	    		<th><?php _e( 'Bevear Builder Support', 'wp-testimonial-with-widget' ); ?><em class="wpos-new-feature">New</em> <span><?php _e( 'Use this plugin with Bevear Builder easily', 'wp-testimonial-with-widget' ); ?></span></th>
	    		<td><i class="dashicons dashicons-no-alt"></i></td>
	    		<td><i class="dashicons dashicons-yes"></i></td>
	    	</tr>
	    	<tr>
	    		<th><?php _e( 'SiteOrigin Page Builder Support', 'wp-testimonial-with-widget' ); ?><em class="wpos-new-feature">New</em> <span><?php _e( 'Use this plugin with SiteOrigin easily', 'wp-testimonial-with-widget' ); ?></span></th>
	    		<td><i class="dashicons dashicons-no-alt"></i></td>
	    		<td><i class="dashicons dashicons-yes"></i></td>
	    	</tr>
	    	<tr>
	    		<th><?php _e( 'Divi Page Builder Native Support', 'wp-testimonial-with-widget' ); ?><em class="wpos-new-feature">New</em> <span><?php _e( 'Use this plugin with Divi Builder easily', 'wp-testimonial-with-widget' ); ?></span></th>
	    		<td><i class="dashicons dashicons-no-alt"></i></td>
	    		<td><i class="dashicons dashicons-yes"></i></td>
	    	</tr>
			<tr>
				<th><?php _e( 'WPBakery Page Builder Supports ', 'wp-testimonial-with-widget' ); ?><span class="subtext"><?php _e( 'Use this plugin with Visual Composer/WPBakery page builder easily', 'wp-testimonial-with-widget' ); ?></span></th>
				<td><i class="dashicons dashicons-no-alt"> </i></td>
				<td><i class="dashicons dashicons-yes"> </i></td>
			</tr>
			<tr>
				<th><?php _e( 'Custom Read More link for Post ', 'wp-testimonial-with-widget' ); ?><span><?php _e( 'Redirect post to third party destination if any', 'wp-testimonial-with-widget' ); ?></span></th>
				<td><i class="dashicons dashicons-yes"></i></td>
				<td><i class="dashicons dashicons-yes"></i></td>
			</tr>
			<tr>
				<th><?php _e( 'Publicize ', 'wp-testimonial-with-widget' ); ?><span><?php _e( 'Support with Jetpack to publish your News post on', 'wp-testimonial-with-widget' ); ?></span></th>
				<td><i class="dashicons dashicons-yes"></i></td>
				<td><i class="dashicons dashicons-yes"></i></td>
			</tr><tr>
				<th><?php _e( 'Display Desired Post ', 'wp-testimonial-with-widget' ); ?><span><?php _e( 'Display only the post you want', 'wp-testimonial-with-widget' ); ?></span></th>
				<td><i class="dashicons dashicons-no-alt"></i></td>
				<td><i class="dashicons dashicons-yes"></i></td>
			</tr>

			<tr>
	    		<th><?php _e( 'Display Post for Particular Categories ', 'wp-testimonial-with-widget' ); ?><span><?php _e( 'Display only the posts with particular category', 'wp-testimonial-with-widget' ); ?></span></th>
	    		<td><i class="dashicons dashicons-yes"></i></td>
	    		<td><i class="dashicons dashicons-yes"></i></td>
	    	</tr>
	    	<tr>
				<th><?php _e( 'Exclude Some Posts', 'wp-testimonial-with-widget' ); ?><span><?php _e( 'Do not display the posts you want', 'wp-testimonial-with-widget' ); ?></span></th>
				<td><i class="dashicons dashicons-no-alt"></i></td>
				<td><i class="dashicons dashicons-yes"></i></td>
			</tr>
			<tr>
				<th><?php _e( 'Exclude Some Categories ', 'wp-testimonial-with-widget' ); ?><span><?php _e( 'Do not display the posts for particular categories', 'wp-testimonial-with-widget' ); ?></span></th>
				<td><i class="dashicons dashicons-no-alt"></i></td>
				<td><i class="dashicons dashicons-yes"></i></td>
			</tr>
			<tr>
				<th><?php _e( 'Post Order / Order By Parameters ', 'wp-testimonial-with-widget' ); ?><span><?php _e( 'Display post according to date, title and etc', 'wp-testimonial-with-widget' ); ?></span></th>
				<td><i class="dashicons dashicons-yes"></i></td>
				<td><i class="dashicons dashicons-yes"></i></td>
			</tr>
			<tr>
	    		<th><?php _e( 'Multiple Slider Parameters ', 'wp-testimonial-with-widget' ); ?><span><?php _e( 'Slider parameters like autoplay, number of slide, sider dots and etc.', 'wp-testimonial-with-widget' ); ?></span></th>
	    		<td><i class="dashicons dashicons-yes"></i></td>
	    		<td><i class="dashicons dashicons-yes"></i></td>
	    	</tr>
			<tr>
	    		<th><?php _e( 'Slider RTL Support ', 'wp-testimonial-with-widget' ); ?><span><?php _e( 'Slider supports for RTL website', 'wp-testimonial-with-widget' ); ?></span></th>
	    		<td><i class="dashicons dashicons-yes"></i></td>
	    		<td><i class="dashicons dashicons-yes"></i></td>
	    	</tr>
			<tr>
	    		<th><?php _e( 'Automatic Update ', 'wp-testimonial-with-widget' ); ?><span><?php _e( 'Get automatic plugin updates', 'wp-testimonial-with-widget' ); ?></span></th>
	    		<td><?php _e( 'Lifetime', 'wp-testimonial-with-widget' ); ?></td>
	    		<td><?php _e( 'Lifetime', 'wp-testimonial-with-widget' ); ?></td>
	    	</tr>
	    	<tr>
	    		<th><?php _e( 'Support ', 'wp-testimonial-with-widget' ); ?><span><?php _e( 'Get support for plugin', 'wp-testimonial-with-widget' ); ?></span></th>
	    		<td><?php _e( 'Lifetime', 'wp-testimonial-with-widget' ); ?></td>
	    		<td><?php _e( '1 Year OR Lifetime', 'wp-testimonial-with-widget' ); ?></td>
	    	</tr>
	    </tbody>
	</table>
</div>