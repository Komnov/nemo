(function($) {
	"use strict";

	UNCODE.preventDoubleTransition = function() {
	$('.sticky-element .animate_when_almost_visible').each(function(){
		var $el = $(this).one('webkitAnimationEnd mozAnimationEnd oAnimationEnd animationEnd', function(e){
			$el.addClass('do_not_reanimate');
		});
	});
};


})(jQuery);
