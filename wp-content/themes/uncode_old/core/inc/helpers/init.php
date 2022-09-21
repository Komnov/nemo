<?php
/**
 * Load helper files
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Load gallery functions
 */
require_once get_template_directory() . '/core/inc/helpers/galleries.php';

/**
 * Related Posts functions.
 */
require_once get_template_directory() . '/core/inc/helpers/related-posts.php';

/**
 * Structure functions.
 */
require_once get_template_directory() . '/core/inc/helpers/structure.php';

/**
 * Account functions.
 */
require_once get_template_directory() . '/core/inc/helpers/account.php';

/**
 * Modal functions.
 */
require_once get_template_directory() . '/core/inc/helpers/modal.php';

/**
 * Quick View functions.
 */
require_once get_template_directory() . '/core/inc/helpers/quick-view/quick-view-functions.php';
require_once get_template_directory() . '/core/inc/helpers/quick-view/class-uncode-quick-view.php';

/**
 * Taxonomy functions.
 */
require_once get_template_directory() . '/core/inc/helpers/taxonomies.php';
