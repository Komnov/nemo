<?php
/**
 * VC Section config
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

vc_map(array(
	'name' => esc_html__( 'Section', 'uncode-core' ),
	'base' => 'vc_section',
	'weight' => 8400,
	'is_container' => true,
	'icon' => 'fa fa-marquee',
	'show_settings_on_create' => false,
	'as_parent' => array(
		'only' => 'vc_row',
	),
	'as_child' => array(
		'only' => '', // Only root
	),
	'class' => 'vc_main-sortable-element',
	'description' => esc_html__( 'Rows Container', 'uncode-core' ),
	'params' => array(
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Background color", 'uncode-core') ,
			"param_name" => "back_color",
			"description" => esc_html__("Specify a background color for the row.", 'uncode-core') ,
			"group" => esc_html__("Style", 'uncode-core') ,
			"value" => $uncode_colors,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Dynamic background", 'uncode-core') ,
			"param_name" => "back_image_auto",
			"description" => esc_html__("Activate to pickup the background media from the category.", 'uncode-core') ,
			"value" => Array(
				'' => 'yes'
			) ,
			"group" => esc_html__("Style", 'uncode-core') ,
		),
		array(
			"type" => "media_element",
			"heading" => esc_html__("Background media", 'uncode-core') ,
			"param_name" => "back_image",
			"value" => "",
			"description" => esc_html__("Specify a media from the Media Library.", 'uncode-core') ,
			"group" => esc_html__("Style", 'uncode-core')
		) ,
		$add_background_repeat,
		$add_background_attachment,
		$add_background_position,
		$add_background_size,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Parallax *", 'uncode-core') ,
			"param_name" => "parallax",
			"description" => esc_html__("Activate the Parallax effect. NB. Not available with Slides Scroll and, for performance reasons, this option is disabled while working with the Frontend Editor.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("Style", 'uncode-core'),
			"dependency" => array(
				'element' => "back_image",
				'not_empty' => true
			) ,
		) ,
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Overlay color", 'uncode-core') ,
			"param_name" => "overlay_color",
			"description" => esc_html__("Specify an overlay color for the background.", 'uncode-core') ,
			"group" => esc_html__("Style", 'uncode-core') ,
			"value" => $uncode_colors,
		) ,
		array(
			"type" => "type_numeric_slider",
			"heading" => esc_html__("Overlay Opacity", 'uncode-core') ,
			"param_name" => "overlay_alpha",
			"min" => 0,
			"max" => 100,
			"step" => 1,
			"value" => 50,
			"description" => esc_html__("Set the transparency for the overlay.", 'uncode-core') ,
			"group" => esc_html__("Style", 'uncode-core') ,
		) ,
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Overlay Blend Mode *", 'uncode-core') ,
			"param_name" => "overlay_color_blend",
			"description" => esc_html__("Specify a Blend Mode. NB. It does not work on IE and Edge.", 'uncode-core') ,
			"group" => esc_html__("Style", 'uncode-core') ,
			"value" => array(
				esc_html__('None', 'uncode-core') => '',
				esc_html__('Multiply', 'uncode-core') => 'multiply',
				esc_html__('Screen', 'uncode-core') => 'screen',
				esc_html__('Overlay', 'uncode-core') => 'overlay',
				esc_html__('Darken', 'uncode-core') => 'darken',
				esc_html__('Lighten', 'uncode-core') => 'lighten',
				esc_html__('Color dodge', 'uncode-core') => 'color-dodge',
				esc_html__('Color burn', 'uncode-core') => 'color-burn',
				esc_html__('Hard light', 'uncode-core') => 'hard-light',
				esc_html__('Soft light', 'uncode-core') => 'soft-light',
				esc_html__('Difference', 'uncode-core') => 'difference',
				esc_html__('Exclusion', 'uncode-core') => 'exclusion',
			) ,
			"dependency" => array(
				'element' => "overlay_color",
				'not_empty' => true
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Desktop", 'uncode-core') ,
			"param_name" => "desktop_visibility",
			"description" => esc_html__("Choose the visibiliy of the element in desktop layout mode (960px >).", 'uncode-core') ,
			'group' => esc_html__('Responsive', 'uncode-core') ,
			"value" => Array(
				'' => 'yes'
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Tablet", 'uncode-core') ,
			"param_name" => "medium_visibility",
			"description" => esc_html__("Choose the visibiliy of the element in tablet layout mode (570px > < 960px).", 'uncode-core') ,
			'group' => esc_html__('Responsive', 'uncode-core') ,
			"value" => Array(
				'' => 'yes'
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Mobile", 'uncode-core') ,
			"param_name" => "mobile_visibility",
			"description" => esc_html__("Choose the visibiliy of the element in mobile layout mode (< 570px).", 'uncode-core') ,
			'group' => esc_html__('Responsive', 'uncode-core') ,
			"value" => Array(
				'' => 'yes'
			) ,
		) ,
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
	'js_view' => 'UncodeSectionView',
));
