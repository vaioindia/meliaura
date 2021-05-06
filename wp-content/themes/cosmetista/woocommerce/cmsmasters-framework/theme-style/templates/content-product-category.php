<?php
/**
 * @cmsmasters_package 	Cosmetista
 * @cmsmasters_version 	1.0.0
 */


global $product;


// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

$cmsmasters_metadata = explode(',', $cmsmasters_product_metadata);

$title = in_array('title', $cmsmasters_metadata) ? true : false;
$rating = in_array('rating', $cmsmasters_metadata) ? true : false;
$price = in_array('price', $cmsmasters_metadata) ? true : false;
$categories = (get_terms(get_the_ID(), 'pr-categs') && in_array('categories', $cmsmasters_metadata)) ? true : false;

$cmsmasters_product_size = get_post_meta(get_the_ID(), 'cmsmasters_product_size', true);

if (!$cmsmasters_product_size) {
	$cmsmasters_product_size = 'one_x_one';
}
?>
<li <?php post_class($cmsmasters_product_size); ?>>
	<article class="cmsmasters_product">
		<?php
		remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
		
		do_action( 'woocommerce_before_shop_loop_item' );
		?>
		<figure class="cmsmasters_product_img preloader">
			<a href="<?php the_permalink(); ?>">
				<?php 
					if ($cmsmasters_product_layout == 'grid') {
						woocommerce_template_loop_product_thumbnail(); 
					} else {
						echo get_the_post_thumbnail(get_the_ID(), 'full');
					}
				?>
			</a>
			<?php 
				if ($cmsmasters_product_layout == 'grid' && (CMSMASTERS_WCQV || CMSMASTERS_WCWL)) {
					echo '<div class="cmsmasters_product_but_wrap">';
					
					/* WooCommerce Quick View add to button */
					if (CMSMASTERS_WCQV) {
						cosmetista_quick_view_button();
					}
					
					/* WooCommerce Wishlist add to button */
					if (CMSMASTERS_WCWL) {
						cosmetista_add_wishlist_button();
					}
					
					echo '</div>';
				}
				
				
				woocommerce_show_product_loop_sale_flash();
				
				$availability = $product->get_availability();

				if (esc_attr($availability['class']) == 'out-of-stock') {
					echo apply_filters('woocommerce_stock_html', '<span class="' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability['availability'] ) . '</span>', $availability['availability']);
				}
				
				
				if ($cmsmasters_product_layout == 'grid') {
					echo '<div class="cmsmasters_product_add_wrap">' . 
						'<div class="cmsmasters_product_add_inner">';
					
						cosmetista_woocommerce_add_to_cart_button(true);
					
					echo '</div>' . 
					'</div>';
				}
			?>
		</figure>
		<div class="cmsmasters_product_inner">
			<?php
			if ($cmsmasters_product_layout == 'puzzle') {
				if ($rating || $price || $categories || $title) {
					echo '<div class="cmsmasters_product_in_inner">';
					
						if ($rating || $price) {
							echo '<div class="cmsmasters_product_rating_price">';
								if ($rating) {
									cosmetista_woocommerce_rating('cmsmasters_theme_icon_star_empty', 'cmsmasters_theme_icon_star_full');
								}
								
								
								if ($price) {
									woocommerce_template_loop_price();
								}
								
							echo '</div>';
						}
						
						
						if ($categories || $title) {
							echo '<div class="cmsmasters_product_cat_title">';
							
							if ($categories && get_the_terms($product->get_id(), 'product_cat')) {
								echo '<div class="cmsmasters_product_cat entry-meta">' . 
									esc_html__('in', 'cosmetista') . ' ' . 
									cosmetista_get_the_category_list($product->get_id(), 'product_cat', ', ') . 
								'</div>';
							}
							
							
							if ($title) {
								?>
								<header class="cmsmasters_product_header entry-header">
									<h2 class="cmsmasters_product_title entry-title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h2>
								</header>
								<?php
							}
							
							echo '</div>';
						}
					
					echo '</div>';
				}
				
				
				if (CMSMASTERS_WCQV || CMSMASTERS_WCWL) {
					echo '<div class="cmsmasters_product_add_inner">';
					
					/* WooCommerce Wishlist add to button */
					if (CMSMASTERS_WCWL) {
						cosmetista_add_wishlist_button();
					}
					
					
					/* WooCommerce Quick View add to button */
					if (CMSMASTERS_WCQV) {
						cosmetista_quick_view_button();
					}
					
					cosmetista_woocommerce_add_to_cart_button(true);
					
					echo '</div>';
				}
			} elseif ($cmsmasters_product_layout == 'grid') {
				if ($rating || $price) {
					echo '<div class="cmsmasters_product_info">';
					
					if ($rating) {
						cosmetista_woocommerce_rating('cmsmasters_theme_icon_star_empty', 'cmsmasters_theme_icon_star_full');
					}
					
					
					if ($price) {
						woocommerce_template_loop_price();
					}
					
					echo '</div>';
				}
				
				
				if ($title) {
					?>
					<header class="cmsmasters_product_header entry-header">
						<h3 class="cmsmasters_product_title entry-title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h3>
					</header>
					<?php
				}
				
				
				if ($categories && get_the_terms($product->get_id(), 'product_cat')) {
					echo '<div class="cmsmasters_product_cat entry-meta">' . 
						esc_html__('in', 'cosmetista') . ' ' . 
						cosmetista_get_the_category_list($product->get_id(), 'product_cat', ', ') . 
					'</div>';
				}
			}
		?>
		</div>
		<?php
		remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
		remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
		
		if(CMSMASTERS_WCQV) {
			remove_action( 'woocommerce_before_shop_loop_item_title', array(YITH_WCQV_Frontend(), 'yith_add_quick_view_button' ), 15 );
		}
		
		do_action( 'woocommerce_before_shop_loop_item_title' );
		
		
		remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
		
		do_action( 'woocommerce_shop_loop_item_title' );
		
		
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
		
		do_action( 'woocommerce_after_shop_loop_item_title' );
		
		
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
		
		if(CMSMASTERS_WCQV) {
			remove_action( 'woocommerce_after_shop_loop_item', array(YITH_WCQV_Frontend(), 'yith_add_quick_view_button' ), 15 );
		}
		
		do_action( 'woocommerce_after_shop_loop_item' );
		?>
	</article>
</li>