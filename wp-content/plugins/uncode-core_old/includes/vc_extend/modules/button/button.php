<?php
/**
 * VC Button config
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$icons_arr = array(
	esc_html__('None', 'uncode-core') => 'none',
	esc_html__('Address book icon', 'uncode-core') => 'wpb_address_book',
	esc_html__('Alarm clock icon', 'uncode-core') => 'wpb_alarm_clock',
	esc_html__('Anchor icon', 'uncode-core') => 'wpb_anchor',
	esc_html__('Application Image icon', 'uncode-core') => 'wpb_application_image',
	esc_html__('Arrow icon', 'uncode-core') => 'wpb_arrow',
	esc_html__('Asterisk icon', 'uncode-core') => 'wpb_asterisk',
	esc_html__('Hammer icon', 'uncode-core') => 'wpb_hammer',
	esc_html__('Balloon icon', 'uncode-core') => 'wpb_balloon',
	esc_html__('Balloon Buzz icon', 'uncode-core') => 'wpb_balloon_buzz',
	esc_html__('Balloon Facebook icon', 'uncode-core') => 'wpb_balloon_facebook',
	esc_html__('Balloon Twitter icon', 'uncode-core') => 'wpb_balloon_twitter',
	esc_html__('Battery icon', 'uncode-core') => 'wpb_battery',
	esc_html__('Binocular icon', 'uncode-core') => 'wpb_binocular',
	esc_html__('Document Excel icon', 'uncode-core') => 'wpb_document_excel',
	esc_html__('Document Image icon', 'uncode-core') => 'wpb_document_image',
	esc_html__('Document Music icon', 'uncode-core') => 'wpb_document_music',
	esc_html__('Document Office icon', 'uncode-core') => 'wpb_document_office',
	esc_html__('Document PDF icon', 'uncode-core') => 'wpb_document_pdf',
	esc_html__('Document Powerpoint icon', 'uncode-core') => 'wpb_document_powerpoint',
	esc_html__('Document Word icon', 'uncode-core') => 'wpb_document_word',
	esc_html__('Bookmark icon', 'uncode-core') => 'wpb_bookmark',
	esc_html__('Camcorder icon', 'uncode-core') => 'wpb_camcorder',
	esc_html__('Camera icon', 'uncode-core') => 'wpb_camera',
	esc_html__('Chart icon', 'uncode-core') => 'wpb_chart',
	esc_html__('Chart pie icon', 'uncode-core') => 'wpb_chart_pie',
	esc_html__('Clock icon', 'uncode-core') => 'wpb_clock',
	esc_html__('Fire icon', 'uncode-core') => 'wpb_fire',
	esc_html__('Heart icon', 'uncode-core') => 'wpb_heart',
	esc_html__('Mail icon', 'uncode-core') => 'wpb_mail',
	esc_html__('Play icon', 'uncode-core') => 'wpb_play',
	esc_html__('Shield icon', 'uncode-core') => 'wpb_shield',
	esc_html__('Video icon', 'uncode-core') => "wpb_video"
);

$button_params   = array();
$button_params   = array_merge( $button_params, $button_options );
$button_params[] = $add_css_animation;
$button_params[] = $add_animation_speed;
$button_params[] = $add_animation_delay;

$lightbox_params = array(
	array(
		'type' => 'dropdown',
		'heading' => 'Skin',
		'param_name' => 'lbox_skin',
		'value' => array(
			esc_html__('Dark', 'uncode-core') => '',
			esc_html__('Light', 'uncode-core') => 'white',
		) ,
		'description' => esc_html__('Specify the lightbox skin color.', 'uncode-core') ,
		'group' => esc_html__('Lightbox', 'uncode-core') ,
		'dependency' => array(
			'element' => 'media_lightbox',
			'not_empty' => true,
		)
	) ,
	array(
		'type' => 'dropdown',
		'heading' => 'Direction',
		'param_name' => 'lbox_dir',
		'value' => array(
			esc_html__('Horizontal', 'uncode-core') => '',
			esc_html__('Vertical', 'uncode-core') => 'vertical',
		) ,
		'description' => esc_html__('Specify the lightbox sliding direction.', 'uncode-core') ,
		'group' => esc_html__('Lightbox', 'uncode-core') ,
		'dependency' => array(
			'element' => 'media_lightbox',
			'not_empty' => true,
		)
	) ,
	array(
		"type" => 'checkbox',
		"heading" => esc_html__("Title", 'uncode-core') ,
		"param_name" => "lbox_title",
		"description" => esc_html__("Activate this to add the media title.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		"group" => esc_html__("Lightbox", 'uncode-core') ,
		'dependency' => array(
			'element' => 'media_lightbox',
			'not_empty' => true,
		)
	) ,
	array(
		"type" => 'checkbox',
		"heading" => esc_html__("Caption", 'uncode-core') ,
		"param_name" => "lbox_caption",
		"description" => esc_html__("Activate this to add the media caption.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		"group" => esc_html__("Lightbox", 'uncode-core') ,
		'dependency' => array(
			'element' => 'media_lightbox',
			'not_empty' => true,
		)
	) ,
	array(
		"type" => 'checkbox',
		"heading" => esc_html__("Social", 'uncode-core') ,
		"param_name" => "lbox_social",
		"description" => esc_html__("Activate this for the social sharing buttons.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		"group" => esc_html__("Lightbox", 'uncode-core') ,
		'dependency' => array(
			'element' => 'media_lightbox',
			'not_empty' => true,
		)
	) ,
	array(
		"type" => 'checkbox',
		"heading" => esc_html__("Deeplinking", 'uncode-core') ,
		"param_name" => "lbox_deep",
		"description" => esc_html__("Activate this for the deeplinking of every slide.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		"group" => esc_html__("Lightbox", 'uncode-core') ,
		'dependency' => array(
			'element' => 'media_lightbox',
			'not_empty' => true,
		)
	) ,
	array(
		"type" => 'checkbox',
		"heading" => esc_html__("No thumbnails", 'uncode-core') ,
		"param_name" => "lbox_no_tmb",
		"description" => esc_html__("Activate this for not showing the thumbnails.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		"group" => esc_html__("Lightbox", 'uncode-core') ,
		'dependency' => array(
			'element' => 'media_lightbox',
			'not_empty' => true,
		)
	) ,
	array(
		"type" => 'checkbox',
		"heading" => esc_html__("No arrows", 'uncode-core') ,
		"param_name" => "lbox_no_arrows",
		"description" => esc_html__("Activate this for not showing the navigation arrows.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		"group" => esc_html__("Lightbox", 'uncode-core') ,
		'dependency' => array(
			'element' => 'media_lightbox',
			'not_empty' => true,
		)
	) ,
	array(
		"type" => 'checkbox',
		"heading" => esc_html__("Connect to other media in page", 'uncode-core') ,
		"param_name" => "lbox_connected",
		"description" => esc_html__("Activate this to connect the lightbox with other media in the same page with this option active.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		"group" => esc_html__("Lightbox", 'uncode-core') ,
		'dependency' => array(
			'element' => 'media_lightbox',
			'not_empty' => true,
		)
	) ,
);

$button_params = array_merge( $button_params, $lightbox_params );

$extra_params = array(
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
);

$button_params = array_merge( $button_params, $extra_params );

vc_map(array(
	'name' => esc_html__('Button', 'uncode-core') ,
	'base' => 'vc_button',
	'weight' => 9650,
	'icon' => 'fa fa-external-link',
	'php_class_name' => 'uncode_generic_admin',
	'category' => array(
		esc_html__('Essentials', 'uncode-core') ,
		esc_html__('Dynamic', 'uncode-core') ,
		esc_html__('WooCommerce Product', 'uncode-core') ,
	),
	'description' => esc_html__('Button link lightbox add cart video audio', 'uncode-core') ,
	'params' => $button_params,
	'js_view' => 'VcButtonView'
));
