<?php
/**
 * VC Pie Chart config
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

vc_map(array(
	'name' => esc_html__('Pie Chart', 'uncode-core') ,
	'base' => 'vc_pie',
	'weight' => 8950,
	'class' => '',
	'icon' => 'fa fa-pie-chart',
	'description' => esc_html__('Numbers progress percentages value unit', 'uncode-core') ,
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Title', 'uncode-core') ,
			'param_name' => 'title',
			'description' => esc_html__('Enter text which will be used as module title. Leave blank if no title is needed.', 'uncode-core') ,
			'admin_label' => true
		) ,
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Pie value', 'uncode-core') ,
			'param_name' => 'value',
			'description' => esc_html__('Input graph value here. Choose range between 0 and 100.', 'uncode-core') ,
			'value' => '50',
			'admin_label' => true
		) ,
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Pie label value', 'uncode-core') ,
			'param_name' => 'label_value',
			'description' => esc_html__('Input integer value for label. If empty "Pie value" will be used.', 'uncode-core') ,
			'value' => ''
		) ,
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Units', 'uncode-core') ,
			'param_name' => 'units',
			'description' => esc_html__('Enter measurement units (if needed) Eg. %, px, points, etc. Graph value and unit will be appended to the graph title.', 'uncode-core')
		) ,
		array(
			"type" => "type_numeric_slider",
			"heading" => esc_html__("Circle thickness", 'uncode-core') ,
			"param_name" => "arc_width",
			"min" => 1,
			"max" => 30,
			"step" => 1,
			"value" => 5,
			"description" => esc_html__("Set the circle thickness.", 'uncode-core') ,
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
			'type' => 'dropdown',
			'heading' => esc_html__('Bar color', 'uncode-core') ,
			'param_name' => 'bar_color',
			'value' => $uncode_colors,
			'description' => esc_html__('Specify pie chart color.', 'uncode-core') ,
		) ,
		array(
			'type' => 'checkbox',
			'heading' => esc_html__('Coloring icon', 'uncode-core') ,
			'param_name' => 'col_icon',
			'value' => array(
				esc_html__('Yes, please', 'uncode-core') => 'yes'
			)
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
		) ,
	)
));
