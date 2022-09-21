(function($) {
	"use strict";

	UNCODE.widgets = function() {
	var widget_titles = $('.widget-mobile-collapse').find('.widget-title');
	var widgets = widget_titles.closest('.widget');

	widgets.each(function() {
		var _this = $(this);
		var content = _this.children().not('.widget-title');

		if (_this.hasClass('widget-mobile-done')) {
			return;
		}

		content.wrapAll( '<div class="widget-collapse-content"></div> ');
		_this.removeClass('collapse-init');
		_this.addClass('widget-mobile-done');
	});

	var widgets_without_title = $('.collapse-init');

	widgets_without_title.removeClass('collapse-init');

	widget_titles.on('click', function() {
		var _this = $(this);
		var content = _this.closest('.widget').find('.widget-collapse-content');

		// Get content of :after element (+ icon) to check the visibility
		var icon_content = window.getComputedStyle(_this[0], ':after').getPropertyValue('content');

		if (icon_content === 'none' || !icon_content) {
			return false;
		}

		_this.toggleClass('open');
		content.slideToggle(400, 'easeInOutCirc');

		return false;
	});
};


})(jQuery);
