/**
 * @package 	WordPress
 * @subpackage 	Cosmetista
 * @version		1.0.0
 * 
 * Modes & Functions for jQuery Isotope Plugin
 * Created by CMSMasters
 * 
 */


"use strict";

/* Set Puzzle Columns Width Function */
function setProductPuzzleColumnWidth(container) { 
	var containerWidth = container.width(), 
		firstPost = container.find('> .product:eq(0)'), 
		postMinWidth = Number(firstPost.css('minWidth').replace('px', '')), 
		postPaddingLeft = Number(firstPost.css('paddingLeft').replace('px', '')), 
		postPaddingRight = Number(firstPost.css('paddingRight').replace('px', '')), 
		postStaticWidth = Math.floor(containerWidth / 4), 
		postStaticHeight = Math.floor((postStaticWidth / 100) * 68.97/* preloader padding bottom in % */), 
		postStaticPadding = Math.floor(((postPaddingLeft + postPaddingRight) / 100) * 68.97/* preloader padding bottom in % */), 
		postWidth = postStaticWidth, 
		postHeight = postStaticHeight;
	
	
	if (containerWidth < postMinWidth * 4) {
		container.addClass('resp_product_category_puzzle');
	} else {
		container.removeClass('resp_product_category_puzzle');
	}
	
	
	container.find('.product').each(function () { 
		if (jQuery(this).hasClass('four_x_four')) {
			postWidth = postStaticWidth * 4;
			postHeight = (postStaticHeight * 4) - postStaticPadding;
		} else if (jQuery(this).hasClass('three_x_three')) {
			if (containerWidth > postMinWidth * 4) {
				postWidth = postStaticWidth * 3;
				postHeight = (postStaticHeight * 3) - postStaticPadding;
			} else if (containerWidth > postMinWidth * 2) {
				postWidth = postStaticWidth * 2;
				postHeight = (postStaticHeight * 2) - postStaticPadding;
			} else {
				postWidth = postStaticWidth * 4;
				postHeight = (postStaticHeight * 4) - postStaticPadding;
			}
		} else if (jQuery(this).hasClass('three_x_two')) {
			if (containerWidth > postMinWidth * 4) {
				postWidth = postStaticWidth * 3;
				postHeight = (postStaticHeight * 2) - postStaticPadding;
			} else if (containerWidth > postMinWidth * 2) {
				postWidth = postStaticWidth * 2;
				postHeight = Math.floor((postStaticHeight * 4) / 3) - postStaticPadding;
			} else {
				postWidth = postStaticWidth * 4;
				postHeight = Math.floor((postStaticHeight * 8) / 3) - postStaticPadding;
			}
		} else if (jQuery(this).hasClass('three_x_one')) {
			if (containerWidth > postMinWidth * 4) {
				postWidth = postStaticWidth * 3;
				postHeight = postStaticHeight - postStaticPadding;
			} else if (containerWidth > postMinWidth * 2) {
				postWidth = postStaticWidth * 2;
				postHeight = Math.floor((postStaticHeight * 2) / 3) - postStaticPadding;
			} else {
				postWidth = postStaticWidth * 4;
				postHeight = Math.floor((postStaticHeight * 4) / 3) - postStaticPadding;
			}
		} else if (jQuery(this).hasClass('two_x_three')) {
			if (containerWidth > postMinWidth * 2) {
				postWidth = postStaticWidth * 2;
				postHeight = (postStaticHeight * 3) - postStaticPadding;
			} else {
				postWidth = postStaticWidth * 4;
				postHeight = (postStaticHeight * 6) - postStaticPadding;
			}
		} else if (jQuery(this).hasClass('two_x_two')) {
			if (containerWidth > postMinWidth * 2) {
				postWidth = postStaticWidth * 2;
				postHeight = (postStaticHeight * 2) - postStaticPadding;
			} else {
				postWidth = postStaticWidth * 4;
				postHeight = (postStaticHeight * 4) - postStaticPadding;
			}
		} else if (jQuery(this).hasClass('two_x_one')) {
			if (containerWidth > postMinWidth * 2) {
				postWidth = postStaticWidth * 2;
				postHeight = postStaticHeight - postStaticPadding;
			} else {
				postWidth = postStaticWidth * 4;
				postHeight = (postStaticHeight * 2) - postStaticPadding;
			}
		} else if (jQuery(this).hasClass('one_x_three')) {
			if (containerWidth > postMinWidth * 4) {
				postWidth = postStaticWidth;
				postHeight = (postStaticHeight * 3) - postStaticPadding;
			} else if (containerWidth > postMinWidth * 2) {
				postWidth = postStaticWidth * 2;
				postHeight = (postStaticHeight * 6) - postStaticPadding;
			} else {
				postWidth = postStaticWidth * 4;
				postHeight = (postStaticHeight * 12) - postStaticPadding;
			}
		} else if (jQuery(this).hasClass('one_x_two')) {
			if (containerWidth > postMinWidth * 4) {
				postWidth = postStaticWidth;
				postHeight = (postStaticHeight * 2) - postStaticPadding;
			} else if (containerWidth > postMinWidth * 2) {
				postWidth = postStaticWidth * 2;
				postHeight = (postStaticHeight * 4) - postStaticPadding;
			} else {
				postWidth = postStaticWidth * 4;
				postHeight = (postStaticHeight * 8) - postStaticPadding;
			}
		} else if (jQuery(this).hasClass('one_x_one')) {
			if (containerWidth > postMinWidth * 4) {
				postWidth = postStaticWidth;
				postHeight = postStaticHeight - postStaticPadding;
			} else if (containerWidth > postMinWidth * 2) {
				postWidth = postStaticWidth * 2;
				postHeight = (postStaticHeight * 2) - postStaticPadding;
			} else {
				postWidth = postStaticWidth * 4;
				postHeight = (postStaticHeight * 4) - postStaticPadding;
			}
		}
		
		
		jQuery(this).css( { 
			width : postWidth + 'px' 
		} );
		
		
		jQuery(this).find('.cmsmasters_product').css( { 
			height : postHeight + 'px' 
		} );
		
		
		jQuery(this).find('.preloader').css( { 
			paddingBottom : postHeight + 'px' 
		} );
	} );
}



/* Rearrange Products Function */
function reArrangeProducts(productCategory, productCategoryPuzzle) { 
	if (productCategoryPuzzle) {
		setProductPuzzleColumnWidth(productCategory.isotope('layout'));
	}
}



/* Start Product Category Isotope Function */
function startProductCategory(id, layout, columns, category, orderby, order) { 
	var productCategoryContainer = 		jQuery(id), 
		productCategory = 				productCategoryContainer.find('> .woocommerce > .cmsmasters_products'), 
		productCategoryPuzzle = 		(layout === 'puzzle') ? true : false;
	
	
	if (productCategoryContainer.find('.product').length == 0) {
		return false;
	}
	
	
	if (productCategoryPuzzle) {
		setProductPuzzleColumnWidth(productCategory);
	}
	
	
	jQuery(window).load(function () { 
		if (!productCategory.hasClass('isotope')) {
			productCategory.addClass('isotope');
		}
		
		
		if (productCategoryPuzzle) {
			productCategory.isotope( { 
				itemSelector : 	'.product', 
				resizable : 	false, 
				masonry : { 
					columnWidth : Math.floor(productCategory.width() / 4) 
				}
			} );
		}
		
		
		if ( 
			!checker.os.iphone && 
			!checker.os.ipod && 
			!checker.os.ipad && 
			!checker.os.blackberry && 
			!checker.os.android 
		) {
			productCategory.waypoint(function (dir) { 
				if (dir === 'down') {
					var el = 		jQuery(this), 
						items = 	el.find('.product'), 
						delay = 	200, 
						i = 		1;
					
					
					items.each(function () { 
						var item = 	jQuery(this);
						
						
						setTimeout(function () { 
							item.addClass('shortcode_animated');
						}, delay * i);
						
						
						i += 1;
					} );
				}
			}, { 
				offset : 		'100%' 
			} ).waypoint(function (dir) { 
				if (dir === 'up') {
					var el = 		jQuery(this), 
						items = 	el.find('.product'), 
						delay = 	200, 
						i = 		1;
					
					
					items.each(function () { 
						var item = 	jQuery(this);
						
						
						setTimeout(function () { 
							item.addClass('shortcode_animated');
						}, delay * i);
						
						
						i += 1;
					} );
				}
			}, { 
				offset : 		'25%' 
			} );
		} else {
			productCategory.find('.product').addClass('shortcode_animated');
		}
		
		
		setTimeout(function () { 
			reArrangeProducts(productCategory, productCategoryPuzzle);
		}, 300);
	} );


	jQuery(window).on('debouncedresize', function () { 
		reArrangeProducts(productCategory, productCategoryPuzzle);
		
		
		if (productCategoryPuzzle) {
			productCategory.isotope( { 
				masonry : { 
					columnWidth : Math.floor(productCategory.width() / 4) 
				}
			} );
		}
	} );
}

