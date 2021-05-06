(function ($) {
  'use strict';
	jQuery(document).on('ready', function($) {
		jQuery(".wcp-slick").each(function(index, el) {
			var slick_ob = {
				infinite: true,
				dots: (jQuery(this).data('dots') == true) ? true : false,		  
				arrows: (jQuery(this).data('arrows') == true) ? true : false,		  
				autoplay: (jQuery(this).data('autoplay') == true) ? true : false,
				autoplaySpeed: jQuery(this).data('autoplayspeed'),
				draggable: true,
				speed: jQuery(this).data('speed'),
				slidesToShow: jQuery(this).data('slidestoshow'),
				slidesToScroll: jQuery(this).data('slidestoscroll'),
				slidesPerRow: jQuery(this).data('slidesperrow'),
				rows: jQuery(this).data('rows'),
				responsive: [{
				  breakpoint: 600,
				  settings: {
					slidesToShow: 2,
					slidesToScroll: 2,
				  }
				},
				{
				  breakpoint: 470,
				  settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				  }
				}]			
			};
			jQuery(this).slick(slick_ob);
		});
	});
})(jQuery);