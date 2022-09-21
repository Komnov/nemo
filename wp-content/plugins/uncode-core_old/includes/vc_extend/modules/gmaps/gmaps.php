<?php
/**
 * VC Google Maps config
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

vc_map(array(
	'name' => esc_html__('Google Maps', 'uncode-core') ,
	'base' => 'vc_gmaps',
	'weight' => 9200,
	'icon' => 'fa fa-map-marker',
	'category' => array(
		esc_html__('Essentials', 'uncode-core') ,
	),
	'description' => esc_html__('Google Maps', 'uncode-core') ,
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Title', 'uncode-core') ,
			'param_name' => 'title',
			'description' => esc_html__('Enter text which will be used as module title. Leave blank if no title is needed.', 'uncode-core')
		) ,
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Latitude, Longitude', 'uncode-core') ,
			'param_name' => 'latlon',
			'description' => sprintf(wp_kses(__('To extract the Latitude and Longitude of your address, follow the instructions %s. 1) Use the directions under the section "Get the coordinates of a place" 2) Copy the coordinates 3) Paste the coordinates in the field with the "comma" sign.', 'uncode-core'), array( 'a' => array( 'href' => array(),'target' => array() ) ) ) , '<a href="https://support.google.com/maps/answer/18539?source=gsearch&hl=en" target="_blank">here</a>')
		) ,
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Map height', 'uncode-core') ,
			'param_name' => 'size',
			'admin_label' => true,
			'description' => esc_html__('Enter map height in pixels. Example: 200 or leave it empty to make map responsive (in this case you need to declare a minimun height for the row and the column equal height or expanded).', 'uncode-core')
		) ,
		array(
			'type' => 'textarea_safe',
			'heading' => esc_html__('Address', 'uncode-core') ,
			'param_name' => 'address',
			'description' => esc_html__('Insert here the address in case you want it to be display on the bottom of the map.', 'uncode-core') ,
		) ,
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Map color', 'uncode-core') ,
			'param_name' => 'map_color',
			'value' => $uncode_colors,
			'description' => esc_html__('Specify the map base color.', 'uncode-core') ,
			//'admin_label' => true,
			'param_holder_class' => 'vc_colored-dropdown'
		) ,
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('UI color', 'uncode-core') ,
			'param_name' => 'ui_color',
			'value' => $uncode_colors,
			'description' => esc_html__('Specify the UI color.', 'uncode-core') ,
			//'admin_label' => true,
			'param_holder_class' => 'vc_colored-dropdown'
		) ,
		array(
			"type" => "type_numeric_slider",
			"heading" => esc_html__("Zoom", 'uncode-core') ,
			"param_name" => "zoom",
			"min" => 0,
			"max" => 19,
			"step" => 1,
			"value" => 14,
			"description" => esc_html__("Set map zoom level.", 'uncode-core') ,
		) ,
		array(
			"type" => "type_numeric_slider",
			"heading" => esc_html__("Saturation", 'uncode-core') ,
			"param_name" => "map_saturation",
			"min" => - 100,
			"max" => 100,
			"step" => 1,
			"value" => - 20,
			"description" => esc_html__("Set map color saturation.", 'uncode-core') ,
		) ,
		array(
			"type" => "type_numeric_slider",
			"heading" => esc_html__("Brightness", 'uncode-core') ,
			"param_name" => "map_brightness",
			"min" => - 100,
			"max" => 100,
			"step" => 1,
			"value" => 5,
			"description" => esc_html__("Set map color brightness.", 'uncode-core') ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Mobile no draggable", 'uncode-core') ,
			"param_name" => "mobile_no_drag",
			"description" => esc_html__("Deactivate the drag function on mobile devices.", 'uncode-core') ,
			'group' => esc_html__('Mobile', 'uncode-core') ,
			"value" => Array(
				'' => 'yes'
			) ,
		) ,
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
			'group' => esc_html__('Extra', 'uncode-core') ,
			'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your CSS file.', 'uncode-core')
		)
	)
));
