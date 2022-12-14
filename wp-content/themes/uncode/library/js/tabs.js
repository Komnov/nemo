(function($) {
	"use strict";

	UNCODE.tabs = function() {
	$(document).on('click.bs.tab.data-api', '[data-toggle="tab"], [data-toggle="pill"]', function(e) {
		e.preventDefault()
		$(this).tab('show');
		requestTimeout(function() {
			window.dispatchEvent(UNCODE.boxEvent);
			$(window).trigger('uncode.re-layout');
		}, 300);
	});
};


})(jQuery);
