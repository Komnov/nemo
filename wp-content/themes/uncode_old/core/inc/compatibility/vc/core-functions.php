<?php

/**
 * Get the CSS rules from a string (without selectors)
 */
function uncode_get_custom_inline_css( $css ) {
	$internal_css = '';
	$css          = trim( $css );

	$regex = '/{([^}]*)}/m';
	preg_match_all( $regex, $css, $matches, PREG_SET_ORDER, 0 );

	if ( count( $matches ) ) {
		if ( isset( $matches[0] ) && is_array( $matches[0] ) ) {
			$match = $matches[0];

			if ( isset( $match[1] ) && $match[1] ) {
				$internal_css = $match[1];
			}
		}
	}

	$internal_css = str_replace( '!important', '', $internal_css );

	return $internal_css;
}

