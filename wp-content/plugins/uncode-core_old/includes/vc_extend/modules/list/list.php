<?php
/**
 * VC List config
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

vc_map(array(
	'name' => esc_html__('List', 'uncode-core') ,
	'base' => 'uncode_list',
	'weight' => 9450,
	'icon' => 'fa fa-list-ol',
	'php_class_name' => 'uncode_list',
	'category' => array(
		esc_html__('Essentials', 'uncode-core') ,
	),
	'description' => esc_html__('Listing Icons', 'uncode-core') ,
	'params' => array(
		array(
			'type' => 'textarea_html',
			'heading' => esc_html__('List text', 'uncode-core') ,
			'param_name' => 'content',
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Larger text", 'uncode-core') ,
			"param_name" => "larger",
			"description" => esc_html__("Activate this to have bigger text.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
		) ,
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__('Icon', 'uncode-core') ,
			'param_name' => 'icon',
			'description' => esc_html__('Specify icon from library.', 'uncode-core') ,
			'value' => '',
			'admin_label' => true,
			'settings' => array(
				'emptyIcon' => true,
				'iconsPerPage' => 1100,
				'type' => 'uncode'
			) ,
		) ,
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Icon color", 'uncode-core') ,
			"param_name" => "icon_color",
			"description" => esc_html__("Specify a color for the icon.", 'uncode-core') ,
			"value" => $uncode_colors,
			'dependency' => array(
				'element' => 'icon',
				'not_empty' => true,
			) ,
		) ,
		$add_css_animation,
		$add_animation_speed,
		$add_animation_delay,
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Element ID', 'uncode-core') ,
			'param_name' => 'el_id',
			'description' => esc_html__('This value has to be unique. Change it in case it\'s needed.', 'uncode-core') ,
			"group" => esc_html__("Extra", 'uncode-core')
		) ,
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Extra class name', 'uncode-core') ,
			'param_name' => 'el_class',
			'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your CSS file.', 'uncode-core') ,
			"group" => esc_html__("Extra", 'uncode-core')
		) ,
	) ,
));
