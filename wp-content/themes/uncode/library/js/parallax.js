(function($) {
	"use strict";

	UNCODE.parallax = function() {
	if (!UNCODE.isFullPage && !UNCODE.isFullPageSnap && (UNCODE.wwidth > UNCODE.mediaQuery || SiteParameters.mobile_parallax_animation === '1')) {
		if ($('.parallax-el').length > 0) {
			var parallax_elements = new Rellax('.parallax-el');
			$( document.body ).trigger('uncode_parallax_done', parallax_elements);
		}
	}
};


})(jQuery);
