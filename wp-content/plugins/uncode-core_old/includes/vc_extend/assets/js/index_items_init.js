!function($) {
    "use strict";

    function getTaxType() {
		var $taxType = false;
		var $mainLoopField = $('.wpb_el_type_loop .loop_field').val();

		if ($mainLoopField) {
			var $mainLoop = $mainLoopField.split('|');

			for (var $loop in $mainLoop) {
				if ($mainLoop[$loop].indexOf('taxonomy_query:') != -1) {
					$taxType = $mainLoop[$loop];
					$taxType = $taxType.replace('taxonomy_query:', '');
				}
			}
		}

		return $taxType;
    }

    var $taxType = getTaxType();

    if ($taxType) {
    	window.showHideQueryBuilderOptions($taxType);
    }

    $(document).on('vc.display.template', function() {
    	var $taxType = getTaxType();

    	if ($taxType) {
			window.showHideQueryBuilderOptions($taxType);
		}
	});

    setTimeout(function() {
    	window.itemIndex();
    	window.uncode_index_show_hide_filter_pagination();
    }, 1000);

}(window.jQuery);
