<?php
/**
 * Pro Designs and Plugins Feed
 *
 * @package wp-testimonial-with-widget
 * @since 1.0.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
} ?>

<div class="wrap wptww-wrap">
<h2><?php _e( 'How It Works', 'wp-testimonial-with-widget' ); ?></h2>
	<style type="text/css">
		.wpos-pro-box .hndle{background-color:#0073AA; color:#fff;}
		.wpos-pro-box.postbox{background:#dbf0fa none repeat scroll 0 0; border:1px solid #0073aa; color:#191e23;}
		.postbox-container .wpos-list li:before{font-family: dashicons; content: "\f139"; font-size:20px; color: #0073aa; vertical-align: middle;}
		.wptww-wrap .wpos-button-full{display:block; text-align:center; box-shadow:none; border-radius:0;}
		.wptww-shortcode-preview{background-color: #e7e7e7; font-weight: bold; padding: 2px 5px; display: inline-block; margin:0 0 2px 0;}
		.upgrade-to-pro{font-size:18px; text-align:center; margin-bottom:15px;}
		.wpos-copy-clipboard{-webkit-touch-callout: all; -webkit-user-select: all; -khtml-user-select: all; -moz-user-select: all; -ms-user-select: all; user-select: all;}
		.wpos-new-feature{ font-size: 10px; color: #fff; font-weight: bold; background-color: #03aa29; padding:1px 4px; font-style: normal; }
	</style>

	<div id="poststuff">
		<div id="post-body" class="metabox-holder columns-2">

			<!--How it workd HTML -->
			<div id="post-body-content">
				<div class="meta-box-sortables">
					<div class="postbox">
						<div class="postbox-header">
							<h2 class="hndle">
								<span><?php _e( 'How It Works - Display and shortcode', 'wp-testimonial-with-widget' ); ?></span>
							</h2>
						</div>
						<div class="inside">
							<table class="form-table">
								<tbody>
									<tr>
										<th>
											<label><?php _e('Getting Started', 'wp-testimonial-with-widget'); ?>:</label>
										</th>
										<td>
											<ul>
												<li><?php _e('Step-1. Go to "WP Testimonials --> Add New".', 'wp-testimonial-with-widget'); ?></li>
												<li><?php _e('Step-2. Add  Testimonials title, description and images', 'wp-testimonial-with-widget'); ?></li>
												<li><?php _e('Step-3. Add Testimonial Details like Client Name, Job Title detials etc', 'wp-testimonial-with-widget'); ?></li>
												<li><?php _e('Step-4. Once added, press Publish button', 'wp-testimonial-with-widget'); ?></li>
											</ul>
										</td>
									</tr>

									<tr>
										<th>
											<label><?php _e('How Shortcode Works', 'wp-testimonial-with-widget'); ?>:</label>
										</th>
										<td>
											<ul>
												<li><?php _e('Step-1. Create a page like Testimonials OR What our client says.', 'wp-testimonial-with-widget'); ?></li>
												<li><?php _e('Step-2. Put below shortcode as per your need.', 'wp-testimonial-with-widget'); ?></li>
											</ul>
										</td>
									</tr>

									<tr>
										<th>
											<label><?php _e('All Shortcodes', 'wp-testimonial-with-widget'); ?>:</label>
										</th>
										<td>
											<span class="wptww-shortcode-preview wpos-copy-clipboard">[sp_testimonials]</span> – <?php _e('Display in grid with 4 designs', 'wp-testimonial-with-widget'); ?> <br />
											<span class="wptww-shortcode-preview wpos-copy-clipboard">[sp_testimonials_slider]</span> – <?php _e('Display in slider with 4 designs', 'wp-testimonial-with-widget'); ?> <br />
										</td>
									</tr>

									<tr>
										<th>
											<label><?php _e('Widget', 'wp-testimonial-with-widget'); ?>:</label>
										</th>
										<td>
											<ul>
												<li><?php _e('Step-1. Go to Appearance --> Widget.', 'wp-testimonial-with-widget'); ?></li>
												<li><?php _e('Step-2. Use WP Testimonials Slider to display Testimonials in widget area with slider', 'wp-testimonial-with-widget'); ?></li>
											</ul>
										</td>
									</tr>
								</tbody>
							</table>
						</div><!-- .inside -->
					</div><!-- #general -->
				</div><!-- .meta-box-sortables -->

				<div class="meta-box-sortables">
					<div class="postbox">
						<div class="postbox-header">
							<h2 class="hndle">
								<span><?php _e( 'Gutenberg Support', 'wp-testimonial-with-widget' ); ?></span>
							</h2>
						</div>
						<div class="inside">
							<table class="form-table">
								<tbody>
									<tr>
										<th>
											<label><?php _e('How it Work', 'wp-testimonial-with-widget'); ?>:</label>
										</th>
										<td>
											<ul>
												<li><?php _e('Step-1. Go to the Gutenberg editor of your page.', 'wp-testimonial-with-widget'); ?></li>
												<li><?php _e('Step-2. Search "testimonial" keyword in the gutenberg block list.', 'wp-testimonial-with-widget'); ?></li>
												<li><?php _e('Step-3. Add any block of testimonial and you will find its relative options on the right end side.', 'wp-testimonial-with-widget'); ?></li>
											</ul>
										</td>
									</tr>
								</tbody>
							</table>
						</div><!-- .inside -->
					</div><!-- #general -->
				</div><!-- .meta-box-sortables -->

				<div class="meta-box-sortables">
					<div class="postbox">
						<div class="postbox-header">
							<h2 class="hndle">
								<span><?php _e( 'Need Support?', 'wp-testimonial-with-widget' ); ?></span>
							</h2>
						</div>
						<div class="inside">
							<table class="form-table">
								<tbody>
									<tr>
										<td>
											<p><?php _e('Check plugin document for shortcode parameters and demo for designs.', 'wp-testimonial-with-widget'); ?></p> <br/>
											<a class="button button-primary" href="https://docs.wponlinesupport.com/wp-testimonials-with-rotator-widget/?utm_source=testimonial&utm_medium=Testimonial&utm_campaign=getting_started" target="_blank"><?php _e('Documentation', 'wp-testimonial-with-widget'); ?></a>
											<a class="button button-primary" href="https://demo.wponlinesupport.com/testimonial-demo/?utm_source=testimonial&utm_medium=Testimonial&utm_campaign=getting_started" target="_blank"><?php _e('Demo for Designs', 'wp-testimonial-with-widget'); ?></a>
										</td>
									</tr>
								</tbody>
							</table>
						</div><!-- .inside -->
					</div><!-- #general -->
				</div><!-- .meta-box-sortables -->

				<!-- Help to improve this plugin! -->
				<div class="meta-box-sortables">
					<div class="postbox">
						<div class="postbox-header">
							<h2 class="hndle">
								<span><?php _e( 'Help to improve this plugin!', 'wp-testimonial-with-widget' ); ?></span>
							</h2>
						</div>
						<div class="inside">
							<p><?php echo sprintf( __( 'Enjoyed this plugin? You can help by rate this plugin <a href="%s" target="_blank">5 stars!', 'wp-testimonial-with-widget'), 'https://wordpress.org/support/plugin/wp-testimonial-with-widget/reviews/' ); ?></a></p>
						</div><!-- .inside -->
					</div><!-- #general -->
				</div><!-- .meta-box-sortables -->
			</div><!-- #post-body-content -->

			<!--Upgrad to Pro HTML -->
			<div id="postbox-container-1" class="postbox-container">
				<div class="meta-box-sortables">
					<div class="postbox wpos-pro-box">

						<h3 class="hndle">
							<span><?php _e( 'Upgrate to Pro', 'wp-testimonial-with-widget' ); ?></span>
						</h3>
						<div class="inside">
							<ul class="wpos-list">
								<li><?php _e('20 Designs', 'wp-testimonial-with-widget'); ?></li>
								<li><?php _e('Testimonial front-end form.', 'wp-testimonial-with-widget'); ?></li>
								<li><?php _e('Star rating', 'wp-testimonial-with-widget'); ?></li>
								<li><?php _e('Display testimonials using 20 testimonial widget designs.', 'wp-testimonial-with-widget'); ?></li>
								<li><?php _e('Gutenberg Block Support.', 'wp-testimonial-with-widget'); ?></li>
								<li><?php _e('Template overriding feature support.', 'wp-testimonial-with-widget'); ?></li>
								<li><?php _e('WPBakery Page Builder Supports.', 'wp-testimonial-with-widget'); ?></li>
								<li><?php _e( 'Elementor, Bevear and SiteOrigin Page Builder Support. <span class="wpos-new-feature">New</span>', 'wp-testimonial-with-widget'); ?></li>
								<li><?php _e( 'Divi Page Builder Native Support. <span class="wpos-new-feature">New</span>', 'wp-testimonial-with-widget'); ?></li>
								<li><?php _e('Display Testimonial categories wise.', 'wp-testimonial-with-widget'); ?></li>
								<li><?php _e('Fully responsive', 'wp-testimonial-with-widget'); ?></li>
								<li><?php _e('100% Multi language', 'wp-testimonial-with-widget'); ?></li>
							</ul>
							<div class="upgrade-to-pro">Gain access to <strong>WP Testimonials with rotator widget</strong> included in <br /><strong>Essential Plugin Bundle</div>
							<a class="button button-primary wpos-button-full" href="https://www.wponlinesupport.com/wp-plugin/wp-testimonial-with-widget/?ref=WposPratik&utm_source=WP&utm_medium=Testimonials&utm_campaign=Upgrade-PRO" target="_blank"><?php _e('Go Premium ', 'wp-testimonial-with-widget'); ?></a>
							<p><a class="button button-primary wpos-button-full" href="https://demo.wponlinesupport.com/prodemo/pro-testimonials-with-rotator-widget/?utm_source=WP&utm_medium=Testimonials&utm_campaign=Pro-Demo" target="_blank"><?php _e('View PRO Demo ', 'wp-testimonial-with-widget'); ?></a>	</p>
						</div><!-- .inside -->
					</div><!-- #general -->
				</div><!-- .meta-box-sortables -->
			</div><!-- #post-container-1 -->

		</div><!-- #post-body -->
	</div><!-- #poststuff -->
</div><!-- end .wptww-wrap -->