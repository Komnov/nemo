<?php
/**
 * VC Consent Notice config
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( class_exists( 'Uncode_Toolkit_Privacy' ) ) :
vc_map(array(
	'name' => esc_html__('Consent Notice', 'uncode-core') ,
	'base' => 'uncode_consent_notice',
	'weight' => 8800,
	'icon' => 'fa fa-exclamation-circle',
	'wrapper_class' => 'clearfix',
	'php_class_name' => 'uncode_generic_admin',
	'description' => esc_html__('Privacy GDPR Fallback', 'uncode-core') ,
	'params' => array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Consent Notice Color', 'uncode-core') ,
			'param_name' => 'notice_color',
			'admin_label' => true,
			'value' => $uncode_colors,
			'description' => esc_html__('Specify consent notice color.', 'uncode-core') ,
		) ,
		$add_css_animation,
		$add_animation_speed,
		$add_animation_delay,
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Element ID', 'uncode-core') ,
			'param_name' => 'el_id',
			'description' => esc_html__('This value has to be unique. Change it in case it\'s needed.', 'uncode-core') ,
			"group" => esc_html__("Extra", 'uncode-core') ,
		) ,
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Extra class name', 'uncode-core') ,
			'param_name' => 'el_class',
			'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your CSS file.', 'uncode-core'),
			"group" => esc_html__("Extra", 'uncode-core') ,
		),
	) ,
));
endif;
