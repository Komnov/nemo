(function($) {
	"use strict";

	UNCODE.menuSystem = function() {

	function menuMobile() {
		var $body = $('body'),
			$mobileToggleButton = $('.mobile-menu-button'),
			$box,
			$el,
			$el_transp,
			elHeight,
			check,
			animating = false,
			stickyMobile = false,
			menuClose = new CustomEvent('menuMobileClose'),
			menuOpen = new CustomEvent('menuMobileOpen');
		UNCODE.menuOpened = false;
		$mobileToggleButton.on('click', function(event) {
			var btn = this;
			if ($(btn).hasClass('overlay-close')) return;
			event.preventDefault();
			if (UNCODE.wwidth <= UNCODE.mediaQuery) {
				$box = $(this).closest('.box-container').find('.main-menu-container');
				$el = $(this).closest('.box-container').find('.menu-horizontal-inner:not(.row-brand), .menu-sidebar-inner');
				$el_transp = $('.menu-absolute.menu-transparent');
				if (UNCODE.isMobile) {
					if ( $('.menu-wrapper.menu-sticky, .menu-wrapper.menu-hide-only, .main-header .menu-sticky-vertical, .main-header .menu-hide-only-vertical, .menu-mobile-centered').length ) {
						stickyMobile = true;
						elHeight = window.innerHeight - UNCODE.menuMobileHeight - (UNCODE.bodyBorder * 2) - UNCODE.adminBarHeight + 1;
					} else {
						elHeight = 0;
						$.each($box.find('> div'), function(index, val) {
							elHeight += $(val).outerHeight();
						});
					}
				} else {
					elHeight = 0;
					$.each($el, function(index, val) {
						elHeight += $(val).outerHeight();
					});
				}
				var open = function() {
					if (!animating) {
						$body.addClass('open-overlay-menu');
						window.dispatchEvent(menuOpen);
						animating = true;
						UNCODE.menuOpened = true;
						if ($('body[class*="vmenu-"], body.hmenu-center').length && ($('.menu-hide, .menu-sticky, .menu-transparent').length)) {
							$('.main-header > .vmenu-container').css({position:'fixed', top: ($('.menu-container').outerHeight() + UNCODE.bodyBorder + UNCODE.adminBarHeight) + 'px'});
							if ($('body.menu-offcanvas').length) {
								$('.menu-container:not(.sticky-element):not(.isotope-filters)').css({position:'fixed'});
								$('.vmenu-container.menu-container:not(.sticky-element):not(.isotope-filters)').css({position:'fixed', top: (UNCODE.menuMobileHeight + UNCODE.bodyBorder + UNCODE.adminBarHeight) + 'px'});
							} else {
								if ( $('.menu-hide, .menu-sticky').length ) {
									if ( UNCODE.wwidth >= 960 && $('.menu-sticky').length  ) {
										$('.menu-container:not(.sticky-element):not(.isotope-filters)').css({position:'fixed'});
									}
								}
							}
						}
						if ($('body.hmenu-center').length && ($('.menu-hide, .menu-sticky').length)) {
							$('.menu-container:not(.sticky-element):not(.isotope-filters)').css({position:'fixed', top: (UNCODE.menuMobileHeight + UNCODE.bodyBorder + UNCODE.adminBarHeight) + 'px'});
						}
						btn.classList.add('close');
						$box.addClass('open-items');
						if ($el_transp.length && $('body.menu-mobile-transparent').length) {
							$el_transp.addClass('is_mobile_open');
						}
						$box.animate({
							height: elHeight
						}, 600, "easeInOutCirc", function() {
							animating = false;
							if (!stickyMobile) $box.css('height', 'auto');
						});
					}
				};

				var close = function() {
					if (!animating) {
						window.dispatchEvent(menuClose);
						animating = true;
						UNCODE.menuOpened = false;
						btn.classList.remove('close');
						btn.classList.add('closing');
						$box.addClass('close');
						requestTimeout(function() {
							$box.removeClass('close');
							$box.removeClass('open-items');
							btn.classList.remove('closing');
							if ($el_transp.length) {
								$el_transp.removeClass('is_mobile_open');
							}
						}, 500);
						$box.animate({
							height: 0
						}, {
							duration: 600,
							easing: "easeInOutCirc",
							complete: function(elements) {
								$(elements).css('height', '');
								animating = false;
								if ($('body[class*="vmenu-"]').length && UNCODE.wwidth >= 960) {
									$('.main-header > .vmenu-container').add('.menu-container:not(.sticky-element):not(.isotope-filters)').css('position','relative');
								}
								$body.removeClass('open-overlay-menu');
							}
						});
					}
				};
				check = (!UNCODE.menuOpened) ? open() : close();
			}
		});
		window.addEventListener('menuMobileTrigged', function(e) {
			$('.mobile-menu-button.close').trigger('click');
		});
		window.addEventListener('orientationchange', function(e) {
			$('#logo-container-mobile .mobile-menu-button.close').trigger('click');
		});
		window.addEventListener("resize", function() {
			if ($(window).width() < UNCODE.mediaQuery) {
				if (UNCODE.isMobile) {
					var $box = $('.box-container .main-menu-container'),
						$el = $('.box-container .menu-horizontal-inner, .box-container .menu-sidebar-inner');
					if ($($box).length && $($box).hasClass('open-items') && $($box).css('height') != 'auto') {
						if ($('.menu-wrapper.menu-sticky, .menu-wrapper.menu-hide-only').length) {
							elHeight = 0;
							$.each($el, function(index, val) {
								elHeight += $(val).outerHeight();
							});
							elHeight = window.innerHeight - $('.menu-wrapper.menu-sticky .menu-container .row-menu-inner, .menu-wrapper.menu-hide-only .menu-container .row-menu-inner').height() - (UNCODE.bodyBorder * 2) + 1;
							$($box).css('height', elHeight + 'px');
						}
					}
				}
			} else {
				$('.menu-hide-vertical').removeAttr('style');
				$('.menu-container-mobile').removeAttr('style');
				$('.vmenu-container.menu-container').removeAttr('style');
			}
		});
	};

	function menuOffCanvas() {
		var menuClose = new CustomEvent('menuCanvasClose'),
			menuOpen = new CustomEvent('menuCanvasOpen');
		$('.menu-primary .menu-button-offcanvas').click(function(event) {
			if ($(window).width() > UNCODE.mediaQuery) {
				if ($(event.currentTarget).hasClass('close')) {
					$(event.currentTarget).removeClass('close');
					$(event.currentTarget).addClass('closing');
					requestTimeout(function() {
						$(event.currentTarget).removeClass('closing');
						window.dispatchEvent(menuClose);
					}, 500);

				} else {
					$(event.currentTarget).addClass('close');
					window.dispatchEvent(menuOpen);
				}
			}

			$('body').toggleClass('off-opened');
		});
	};
	function menuSmart() {
		var $menusmart = $('[class*="menu-smart"]'),
			$masthead = $('#masthead'),
			$hMenu = $('.menu-horizontal-inner', $masthead),
			$focus = $('.overlay-menu-focus'),
			showTimeout = 50,
			hideTimeout = 50,
			showTimeoutFunc, hideTimeoutFunc;

		$('> li.menu-item-has-children', $menusmart).hover(function(){
			$(this).data('hover', true);
		}, function(){
			$(this).data('hover', false);
		});

		if ( $(window).width() >= UNCODE.mediaQuery && $('.overlay-menu-focus').length ) {
			var $notLis = $('> .nav > ul > li a', $hMenu),
				$menuA = $('a', $masthead).not($notLis),
				$hoverSelector = $('> .nav > ul > li', $hMenu).has('> ul'),
				showFuncCond = function() { return true };

			if ( $('body').hasClass('focus-megamenu') ) {
				$hoverSelector = $('> .nav > ul > li', $hMenu).has('.mega-menu-inner');
				showFuncCond = function($ul) { return $ul.hasClass('mega-menu-inner') };
			} else if ( $('body').hasClass('focus-links') ) {
				$hoverSelector = $('> .nav > ul > li', $hMenu).add($menuA);
			}

			$hoverSelector.hover(function(){
				clearRequestTimeout(hideTimeoutFunc);
				showTimeoutFunc = requestTimeout(function(){
					$('body').addClass('navbar-hover');
				}, showTimeout*2);
			}, function(){
				hideTimeoutFunc = requestTimeout(function(){
					$('body').removeClass('navbar-hover');
				}, hideTimeout*2);
			});
		} else {
			showFuncCond = function() { return false };
		}

		if ($menusmart.length > 0) {
			$menusmart.smartmenus({
				subIndicators: false,
				subIndicatorsPos: 'append',
				//subMenusMinWidth: '13em',
				subIndicatorsText: '',
				showTimeout: showTimeout,
				hideTimeout: hideTimeout,
				showFunction: function($ul, complete) {
					clearRequestTimeout(showTimeoutFunc);
					$ul.fadeIn(0, 'linear', function(){
						complete();
						if ( $ul.hasClass('vc_row') ) {
							$ul.css({
								'display': 'table'
							});
						}
						if ( $('.overlay-menu-focus').length && $ul.hasClass('mega-menu-inner') ) {
							$('body').addClass('open-megamenu');
						}
						if ( $('.overlay-menu-focus').length && showFuncCond($ul) && $(window).width() >= UNCODE.mediaQuery && $ul.closest('.main-menu-container').length ) {
							$('body').addClass('navbar-hover');
						}
					}).addClass('open-animated');
				},
				hideFunction: function($ul, complete) {
					if ( $('.overlay-menu-focus').length && $ul.hasClass('mega-menu-inner') ) {
						$('body').removeClass('open-megamenu');
					}
					var fixIE = $('html.ie').length;
					if (fixIE) {
						var $rowParent = $($ul).closest('.main-menu-container');
						$rowParent.height('auto');
					}
					$ul.fadeOut(0, 'linear', function(){
						complete();
						$ul.removeClass('open-animated');
						if ( $ul.closest('li.menu-item-has-children').data('hover') === false ) {
							$('body').removeClass('open-submenu');
						}
					});
				},
				collapsibleShowFunction: function($ul, complete) {
					$ul.slideDown(400, 'easeInOutCirc', complete);
				},
				collapsibleHideFunction: function($ul, complete) {
					$ul.slideUp(200, 'easeInOutCirc', complete);
				},
				hideOnClick: true
			});

			if ( $('body').hasClass('menu-accordion-active') ) {
				requestTimeout(function(){
					$menusmart.addClass('menu-smart-init');
					$menusmart.smartmenus( 'itemActivate', $menusmart.find( '.current-menu-item > a' ).eq( -1 ) );
				}, 1000);
			}
		}

	};
	function menuOverlay() {
		if ( $('.overlay').length ) {
			$('.overlay').removeClass('hidden');
		}
		if ($('.overlay-sequential, .menu-mobile-animated').length > 0) {
			$('.overlay-sequential .menu-smart > li, .menu-sticky .menu-container .menu-smart > li, .menu-hide.menu-container .menu-smart > li, .vmenu-container .menu-smart > li').each(function(index, el) {
				var transDelay = (index / 20) + 0.1;
				if ( $('body').hasClass('menu-mobile-centered') && $(window).width() < UNCODE.mediaQuery )
					transDelay = transDelay + 0.3;
				$(this)[0].setAttribute('style', '-webkit-transition-delay:' + transDelay + 's; -moz-transition-delay:' + transDelay + 's; -ms-transition-delay:' + transDelay + 's; -o-transition-delay:' + transDelay + 's; transition-delay:' + transDelay + 's');
			});
		}
	};
	function menuAppend() {
		var $body = $('body'),
			$menuCont = $('.menu-container'),
			$cta = $('.navbar-cta'),
			$socials = $('.navbar-social'),
			$ul = $('.navbar-main ul.menu-primary-inner'),
			$ulCta,
			$ulSocials,
			$firstMenu = $('.main-menu-container:first-child', $menuCont),
			$secondMenu = $('.main-menu-container:last-child', $menuCont),
			$firstNav = $('.navbar-nav:first-child', $firstMenu),
			$secondNav = $('.navbar-nav:first-child', $secondMenu),
			$ulFirst = $('> ul', $firstNav),
			$ulSecond = $('> ul', $secondNav),
			setCTA,
			appendCTA = function(){
				return true;
			},
			appendSocials = function(){
				return true;
			},
			appendSplit = function(){
				return true;
			};

		if ( $body.hasClass('cta-not-appended') )
			return false;

		if ( ( $body.hasClass('menu-offcanvas') || $body.hasClass('menu-overlay') || $body.hasClass('hmenu-center-split') ) && $cta.length ) {
			$ulCta = $('> ul', $cta);

			appendCTA = function(){
				if (UNCODE.wwidth < UNCODE.mediaQuery) {
					$ul.after($ulCta);
				} else {
					$cta.append($ulCta);
				}
			}
		}
		appendCTA();

		if ( ( $body.hasClass('hmenu-center-split') || $body.hasClass('menu-overlay-center') ) && $socials.length ) {
			$ulSocials = $('> ul', $socials);

			appendSocials = function(){
				if (UNCODE.wwidth < UNCODE.mediaQuery) {
					$ul.after($ulSocials);
				} else {
					$socials.append($ulSocials);
				}
			}
		}
		appendSocials();

		if ( ( $body.hasClass('hmenu-center-double') ) ) {
			appendSplit = function(){
				if (UNCODE.wwidth < UNCODE.mediaQuery) {
					if ( $secondNav.length ) {
						$secondNav.prepend($ulFirst);
					}
					$firstMenu.hide();
				} else {
					$firstNav.append($ulFirst);
					$firstMenu.css({
						'display': 'table-cell'
					});
				}
			}
		}
		appendSplit();

		$(window).on( 'resize', function(){
			clearRequestTimeout(setCTA);
			setCTA = requestTimeout( function() {
				appendCTA();
				appendSocials();
				appendSplit();
			}, 10 );
		});
	}
	//menuMobileButton();
	menuMobile();
	menuOffCanvas();
	menuSmart();
	menuAppend();
	menuOverlay();
	var setMenuOverlay;
	$(window).on( 'resize', function(){
		if ( $('.overlay').length && $(window).width() > 1024 ) {
			$('.overlay').addClass('hidden');
		}
		clearRequestTimeout(setMenuOverlay);
		setMenuOverlay = requestTimeout( menuOverlay, 150 );
	});
};


})(jQuery);
