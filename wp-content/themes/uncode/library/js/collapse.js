(function($) {
	"use strict";

	UNCODE.collapse = function() {
	$(document).on('click.bs.collapse.data-api', '[data-toggle="collapse"]', function(e) {
		var $this = $(this),
			href
		var target = $this.attr('data-target') || e.preventDefault() || (href = $this.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, '') //strip for ie7
		var $target = $(target)
		var data = $target.data('bs.collapse')
		var option = data ? 'toggle' : $this.data()
		var parent = $this.attr('data-parent')
		var $parent = parent && $(parent)
		var $title = $(this).parent()
		if ($parent) {
			$parent.find('[data-toggle="collapse"][data-parent="' + parent + '"]').not($this).addClass('collapsed')
			if ($title.hasClass('active')) {
				$title.removeClass('active');
			} else {
				$parent.find('.panel-title').removeClass('active')
				$title[!$target.hasClass('in') ? 'addClass' : 'removeClass']('active')
			}
		}
		$this[$target.hasClass('in') ? 'addClass' : 'removeClass']('collapsed')
		requestTimeout(function() {
			$(window).trigger('uncode.re-layout');
		}, 500);
	});
};


})(jQuery);
