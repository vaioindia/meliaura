/**
 * @package 	WordPress
 * @subpackage 	Cosmetista
 * @version		1.0.2
 * 
 * Theme Scripts
 * Created by CMSMasters
 * 
 */


jQuery(document).ready(function() { 
	"use strict";
	
	/* Menu item custom colors */
	(function ($) { 
		$('.menu-item > a[data-color]').each(function () {
			$(this).attr('style', $(this).data('color'));
		} );
	} )(jQuery);
	
	
	
	/* Header Top Hide Toggle */
	(function ($) { 
		$('.header_top_but').on('click', function () { 
			var headerTopBut = $(this), 
				headerTopButArrow = headerTopBut.find('> span'), 
				headerTopOuter = headerTopBut.parents('.header_top').find('.header_top_outer');
			
			if (headerTopBut.hasClass('opened')) {
				headerTopOuter.slideUp();
				
				headerTopButArrow.removeClass('cmsmasters_theme_icon_slide_top').addClass('cmsmasters_theme_icon_slide_bottom');
				
				headerTopBut.removeClass('opened').addClass('closed');
			} else if (headerTopBut.hasClass('closed')) {
				headerTopOuter.slideDown();
				
				headerTopButArrow.removeClass('cmsmasters_theme_icon_slide_bottom').addClass('cmsmasters_theme_icon_slide_top');
				
				headerTopBut.removeClass('closed').addClass('opened');
			}
		} );
	} )(jQuery);
	
	
	
	/* Header Search Form */
	(function ($) { 
		$('.cmsmasters_header_search_but').on('click', function () { 
			$('.cmsmasters_header_search_form').addClass('cmsmasters_show');
			
			$('.cmsmasters_header_search_form').find('input[type=search]').focus();
		} );
		
		
		$('.cmsmasters_header_search_form_close').on('click', function () { 
			$('.cmsmasters_header_search_form').removeClass('cmsmasters_show');
		} );
	} )(jQuery);
	
	
	
	/* Stats Run */
	(function ($) { 
		if ( 
			!checker.os.iphone && 
			!checker.os.ipod && 
			!checker.os.ipad && 
			!checker.os.blackberry && 
			!checker.os.android && 
			!checker.ua.ie9 
		) {
			$('.cmsmasters_stats.stats_mode_circles').waypoint(function () { 
				var i = 1;
				
				
				$(this).find('.cmsmasters_stat').each(function () { 
					var el = $(this);
					
					
					setTimeout(function () { 
						el.easyPieChart( { 
							size : 			170, 
							lineWidth : 	3, 
							lineCap : 		'square', 
							animate : 		1000, 
							scaleColor : 	false, 
							trackColor : 	false, 
							barColor : function () { 
								return ($(this.el).data('bar-color')) ? $(this.el).data('bar-color') : cmsmasters_theme_script.primary_color;
							}, 
							onStep : function (from, to, val) { 
								$(this.el).find('.cmsmasters_stat_counter').text(~~val);
							} 
						} );
					}, 500 * i);
					
					
					i += 1;
				} );
			}, { 
				offset : 		'100%' 
			} );
		} else {
			$('.cmsmasters_stats.stats_mode_circles').find('.cmsmasters_stat').easyPieChart( { 
				size : 			170, 
				lineWidth : 	3, 
				lineCap : 		'square', 
				animate : 		1000, 
				scaleColor : 	false, 
				trackColor : 	false, 
				barColor : function () { 
					return ($(this.el).data('bar-color')) ? $(this.el).data('bar-color') : cmsmasters_theme_script.primary_color;
				}, 
				onStep : function (from, to, val) { 
					$(this.el).find('.cmsmasters_stat_counter').text(~~val);
				} 
			} );
		}
		
		
		if ( 
			!checker.os.iphone && 
			!checker.os.ipod && 
			!checker.os.ipad && 
			!checker.os.blackberry && 
			!checker.os.android && 
			!checker.ua.ie9 
		) {
			$('.cmsmasters_counters').waypoint(function () { 
				var i = 1;
				
				
				$(this).find('.cmsmasters_counter').each(function () { 
					var el = $(this);
					
					
					setTimeout(function () { 
						el.easyPieChart( { 
							size : 			140, 
							lineWidth : 	0, 
							lineCap : 		'square', 
							animate : 		1500, 
							scaleColor : 	false, 
							trackColor : 	false, 
							barColor : 		'#ffffff', 
							onStep : function (from, to, val) { 
								$(this.el).find('.cmsmasters_counter_counter').text(~~val);
							} 
						} );
					}, 500 * i);
					
					
					i += 1;
				} );
			}, { 
				offset : 		'100%' 
			} );
		} else {
			$('.cmsmasters_counters').find('.cmsmasters_counter').easyPieChart( { 
				size : 			140, 
				lineWidth : 	0, 
				lineCap : 		'square', 
				animate : 		1500, 
				scaleColor : 	false, 
				trackColor : 	false, 
				barColor : 		'#ffffff', 
				onStep : function (from, to, val) { 
					$(this.el).find('.cmsmasters_counter_counter').text(~~val);
				} 
			} );
		}
		
		
		if ( 
			!checker.os.iphone && 
			!checker.os.ipod && 
			!checker.os.ipad && 
			!checker.os.blackberry && 
			!checker.os.android && 
			!checker.ua.ie9 
		) {
			$('.cmsmasters_stats.stats_mode_bars.stats_type_horizontal').waypoint(function () { 
				$(this).addClass('shortcode_animated').find('.cmsmasters_stat').each(function () { 
					var el = $(this);
					
					
					el.easyPieChart( { 
						size : 			140, 
						lineWidth : 	0, 
						lineCap : 		'square', 
						animate : 		1500, 
						scaleColor : 	false, 
						trackColor : 	false, 
						barColor : 		'#ffffff', 
						onStep : function (from, to, val) { 
							$(this.el).find('.cmsmasters_stat_counter').text(~~val);
						} 
					} );
				} );
			}, { 
				offset : 		'100%' 
			} );
		} else {
			$('.cmsmasters_stats.stats_mode_bars.stats_type_horizontal').addClass('shortcode_animated').find('.cmsmasters_stat').easyPieChart( { 
				size : 			140, 
				lineWidth : 	0, 
				lineCap : 		'square', 
				animate : 		1500, 
				scaleColor : 	false, 
				trackColor : 	false, 
				barColor : 		'#ffffff', 
				onStep : function (from, to, val) { 
					$(this.el).find('.cmsmasters_stat_counter').text(~~val);
				} 
			} );
		}
		
		
		if ( 
			!checker.os.iphone && 
			!checker.os.ipod && 
			!checker.os.ipad && 
			!checker.os.blackberry && 
			!checker.os.android && 
			!checker.ua.ie9 
		) {
			$('.cmsmasters_stats.stats_mode_bars.stats_type_vertical').waypoint(function () { 
				$(this).addClass('shortcode_animated').find('.cmsmasters_stat').each(function () { 
					var el = $(this);
					
					
					el.easyPieChart( { 
						size : 			140, 
						lineWidth : 	0, 
						lineCap : 		'square', 
						animate : 		1500, 
						scaleColor : 	false, 
						trackColor : 	false, 
						barColor : 		'#ffffff', 
						onStep : function (from, to, val) { 
							$(this.el).parents('.cmsmasters_stat_wrap').find('.cmsmasters_stat_counter').text(~~val);
						} 
					} );
				} );
			}, { 
				offset : 		'100%' 
			} );
		} else {
			$('.cmsmasters_stats.stats_mode_bars.stats_type_vertical').addClass('shortcode_animated').find('.cmsmasters_stat').easyPieChart( { 
				size : 			140, 
				lineWidth : 	0, 
				lineCap : 		'square', 
				animate : 		1500, 
				scaleColor : 	false, 
				trackColor : 	false, 
				barColor : 		'#ffffff', 
				onStep : function (from, to, val) { 
					$(this.el).parents('.cmsmasters_stat_wrap').find('.cmsmasters_stat_counter').text(~~val);
				} 
			} );
		}
	} )(jQuery);
} );



/*!
 * Fixed Header Function
 */
!function(a){"use strict";a.fn.cmsmastersFixedHeaderScroll=function(b){var c={headerTop:".header_top",headerMid:".header_mid",headerBot:".header_bot",navBlock:"nav",navList:"#navigation",navTopList:"#top_line_nav",respNavButton:".responsive_nav",respTopNavButton:".responsive_top_nav",fixedClass:".fixed_header",fixedClassBlock:"#page",respHideBlocks:"",maxWidthMid:1024,maxWidthBot:1024,changeTopHeight:!0,changeMidHeight:!0,mobileDisabled:!0},d=this,e={};e={init:function(){e.options=e.o=a.extend({},c,b),e.el=d,e.vars=e.v={},e.v.newTopHeight=0,e.v.newMidHeight=0,e.setHeaderVars(),e.startHeader()},setHeaderVars:function(){e.v.headerMidString=e.o.headerMid,e.v.headerTop=e.el.find("> "+e.o.headerTop),e.v.headerMid=e.el.find("> "+e.v.headerMidString),e.v.headerBot=e.el.find("> "+e.o.headerBot),e.v.respNavButton=e.el.find(e.o.respNavButton),e.v.respTopNavButton=e.el.find(e.o.respTopNavButton),e.v.respHideBlocks=a(e.o.respHideBlocks),e.v.fixedClassBlock=a(e.o.fixedClassBlock),e.v.navListString=e.o.navList,e.v.navTopListString=e.o.navTopList,e.v.navBlockString=e.o.navBlock,e.v.navBlock=e.el.find(e.v.navListString).parents(e.v.navBlockString),e.v.navTopBlock=e.el.find(e.v.navTopListString).parents(e.v.navBlockString),e.v.midChangeHeightBlocks=a(e.v.headerMidString),e.v.midChangeHeightBlocksResp=a(e.v.headerMidString),e.v.topHeight=0,e.v.botHeight=0,e.v.midHeight=Number(e.v.headerMid.attr("data-height")),e.v.win=a(window),e.v.winScrollTop=e.v.win.scrollTop(),e.v.winMidScrollTop=e.v.winScrollTop-e.v.topHeight,e.v.isMobile="ontouchstart"in document.documentElement,e.v.mobileDisabled=cmsmasters_media_width()<e.o.maxWidthMid},startHeader:function(){e.v.headerTop.length>0&&(e.v.topHeight=Number(e.v.headerTop.attr("data-height"))),e.v.headerBot.length>0&&(e.v.botHeight=Number(e.v.headerBot.attr("data-height"))),e.attachEvents(),e.v.win.trigger("scroll")},attachEvents:function(){e.v.respNavButton.bind("click",function(){return e.v.respNavButton.is(":not(.active)")?(e.v.navBlock.css({display:"block"}),e.v.respHideBlocks.css({display:"none"}),e.v.respNavButton.addClass("active")):(e.v.navBlock.css({display:"none"}),e.v.respHideBlocks.css({display:"block"}),e.v.respNavButton.removeClass("active")),!1}),e.v.respTopNavButton.bind("click",function(){return e.v.respTopNavButton.is(":not(.active)")?(e.v.navTopBlock.css({display:"block"}),e.v.respHideBlocks.css({display:"none"}),e.v.respTopNavButton.addClass("active")):(e.v.navTopBlock.css({display:"none"}),e.v.respHideBlocks.css({display:"block"}),e.v.respTopNavButton.removeClass("active")),!1}),e.v.win.bind("scroll",function(){return!(e.el.parents(e.o.fixedClassBlock).is(":not("+e.o.fixedClass+")")||e.v.mobileDisabled&&e.v.isMobile)&&void(cmsmasters_media_width()>e.o.maxWidthMid&&(e.getScrollTop(),e.headerTransform()))}),e.v.win.bind("resize",function(){return!(e.el.parents(e.o.fixedClassBlock).is(":not("+e.o.fixedClass+")")||e.v.mobileDisabled&&e.v.isMobile)&&void(e.v.headerBot.length>0?e.headerResize(e.o.maxWidthBot):e.headerResize(e.o.maxWidthMid))})},getScrollTop:function(){e.v.winScrollTop=e.v.win.scrollTop(),e.v.winMidScrollTop=e.v.winScrollTop-e.v.topHeight},headerTransform:function(){e.v.fixedClassBlock.hasClass("fixed_header")&&(e.v.headerBot.length>0?e.v.winScrollTop>e.v.topHeight+e.v.midHeight?e.el.css({marginTop:-(e.v.topHeight+e.v.midHeight+e.v.botHeight),paddingTop:e.v.botHeight,opacity:1}).addClass("navi_scrolled"):e.el.removeClass("navi_scrolled").css({marginTop:-e.v.winScrollTop,paddingTop:0,opacity:1}):e.v.winScrollTop<e.v.topHeight?(e.v.headerMid.removeClass("header_mid_scroll"),e.v.headerBot.removeClass("header_bot_scroll"),e.v.newTopHeight=e.v.topHeight-e.v.winScrollTop,e.v.headerTop.css({overflow:"hidden",height:e.v.newTopHeight+"px"}),e.v.winScrollTop<=3&&e.v.headerTop.css({overflow:"inherit"}),e.v.midChangeHeightBlocks.css({height:e.v.midHeight+"px"})):(e.v.headerTop.css({overflow:"hidden",height:0}),e.v.winMidScrollTop<e.v.midHeight/3?(e.v.headerMid.removeClass("header_mid_scroll"),e.v.headerBot.removeClass("header_bot_scroll"),e.v.newMidHeight=e.v.midHeight-e.v.winMidScrollTop):(e.v.headerMid.addClass("header_mid_scroll"),e.v.headerBot.addClass("header_bot_scroll"),e.v.newMidHeight=e.v.midHeight/1.5),e.v.midChangeHeightBlocks.css({height:e.v.newMidHeight+"px"})))},headerResize:function(a){cmsmasters_media_width()>a?(e.v.navBlock.removeAttr("style"),e.v.respHideBlocks.removeAttr("style"),e.v.respNavButton.removeClass("active"),e.getScrollTop(),e.headerTransform()):e.v.headerBot.length>0?(e.v.headerTop.removeAttr("style"),e.el.removeAttr("style").removeClass("navi_scrolled").css({opacity:1})):(e.v.headerTop.removeAttr("style"),e.v.midChangeHeightBlocksResp.css("height","auto"),e.el.removeAttr("style").removeClass("navi_scrolled").css({opacity:1}))}},e.init()}}(jQuery);



/*!
 * Responsive Navigation Function
 */
!function(s){"use strict";s.fn.cmsmastersResponsiveNav=function(n){var t={submenu:"ul.sub-menu, ul.children",respButton:".responsive_nav",startWidth:1024},e=this,i={};i={init:function(){i.o=s.extend({},t,n),i.el=e,i.v={},i.v.pLinkText="",i.v.subLinkToggle=void 0,i.setVars(),i.restartNav()},setVars:function(){i.v.submenu=i.el.find(i.o.submenu),i.v.subLink=i.v.submenu.closest("li").find("> a"),i.v.respButton=s(i.o.respButton),i.v.startWidth=i.o.startWidth,i.v.win=s(window),i.v.trigger=!1,i.v.counter=0,i.startEvent()},buildNav:function(){i.v.trigger=!0,i.v.counter=1,i.v.subLink.each(function(){""===s(this).text()&&(i.v.pLinkText=s(this).closest("ul").closest("li").find("> a").text(),s(this).addClass("cmsmasters_resp_nav_custom_text").html('<span class="nav_item_wrap"><span class="nav_title">'+i.v.counter+'. '+i.v.pLinkText+'</span></span>'),i.v.counter+=1),s(this).append('<span class="cmsmasters_resp_nav_toggle cmsmasters_theme_icon_resp_nav_slide_down" />')}),i.v.subLinkToggle=i.v.subLink.find("> span.cmsmasters_resp_nav_toggle"),i.v.submenu.hide(),i.attachEvents()},restartNav:function(){!i.v.trigger&&cmsmasters_media_width()<=i.v.startWidth?i.buildNav():i.v.trigger&&cmsmasters_media_width()>i.v.startWidth&&i.destroyNav()},resetNav:function(){i.v.subLinkToggle.removeClass("cmsmasters_theme_icon_resp_nav_slide_up").addClass("cmsmasters_theme_icon_resp_nav_slide_down"),i.v.submenu.hide()},destroyNav:function(){i.v.subLink.each(function(){s(this).hasClass("cmsmasters_resp_nav_custom_text")&&s(this).removeClass("cmsmasters_resp_nav_custom_text").text(""),s(this).find("span.cmsmasters_resp_nav_toggle").remove()}),i.v.submenu.css("display",""),i.v.trigger=!1,i.detachEvents()},startEvent:function(){i.v.win.on("resize",function(){i.restartNav()})},attachEvents:function(){i.v.subLinkToggle.on("click",function(){return s(this).hasClass("cmsmasters_theme_icon_resp_nav_slide_up")?(s(this).removeClass("cmsmasters_theme_icon_resp_nav_slide_up").addClass("cmsmasters_theme_icon_resp_nav_slide_down").closest("li").find("ul.sub-menu, ul.children").hide(),s(this).closest("li").find("span.cmsmasters_resp_nav_toggle").removeClass("cmsmasters_theme_icon_resp_nav_slide_up").addClass("cmsmasters_theme_icon_resp_nav_slide_down")):(s(this).removeClass("cmsmasters_theme_icon_resp_nav_slide_down").addClass("cmsmasters_theme_icon_resp_nav_slide_up"), s(this).closest("li").find("> ul.sub-menu, > ul.children").show(),s(this).closest("li").find("> div > ul.sub-menu, > div > ul.children").show()),!1}),i.v.respButton.on("click",function(){i.v.trigger&&s(this).hasClass("active")&&i.resetNav()})},detachEvents:function(){i.v.subLinkToggle.off("click")}},i.init()}}(jQuery);

