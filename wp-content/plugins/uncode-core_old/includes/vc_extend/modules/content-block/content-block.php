<?php
/**
 * VC Content Block config
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if (function_exists('uncode_get_current_post_type')) {
	$current_post_type = uncode_get_current_post_type();
	if ($current_post_type !== 'uncodeblock') {
		$cblock = get_posts( 'post_type="uncodeblock"&numberposts=-1&suppress_filters=0&orderby=title&order=ASC' );

		$conten_blocks = array();
		if ( $cblock ) {
			foreach ( $cblock as $cform ) {
				$conten_blocks[ $cform->post_title ] = $cform->ID;
			}
		} else {
			$conten_blocks[ __( 'No Content Block found', 'uncode-core' ) ] = 0;
		}
		vc_map( array(
			'base' => 'uncode_block',
			'php_class_name' => 'uncode_block',
			'weight' => 9530,
			'name' => __( 'Content Block', 'uncode-core' ),
			'icon' => 'dashicons-before dashicons-tagcloud',
			'category' => array(
				esc_html__('Dynamic', 'uncode-core') ,
				esc_html__('WooCommerce Product', 'uncode-core') ,
			),
			'description' => esc_html__('Content block section include dynamic', 'uncode-core') ,
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => __( 'Content Block', 'uncode-core' ),
					'param_name' => 'id',
					'value' => $conten_blocks,
					'admin_label' => true,
					'save_always' => true,
					'description' => __( 'Choose a Content Block.', 'uncode-core' ),
				),
				array(
					"type" => 'checkbox',
					"heading" => esc_html__("Column container settings *", 'uncode-core') ,
					"param_name" => "inside_column",
					"description" => sprintf(esc_html__("Activate this to use the Content Block inside a column.%sNB. When using this option nested row (row child) inside the Content Block will not work and this is disabled while working with the Frontend Editor.", 'uncode-core'), '<br /><br />') ,
					"value" => Array(
						esc_html__("Yes, please", 'uncode-core') => 'yes'
					) ,
				) ,
			),
			'js_view' => 'UncodeBlockView'
		) );
	}
}
