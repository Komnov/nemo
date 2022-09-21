<?php
/**
 * VC Single Media config
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$adv_dep = 	array(
	'element' => 'advanced',
	'value' => 'yes'
);

$add_text_size = uncode_core_vc_params_get_text_size( 'text_lead', false, esc_html__("Advanced", 'uncode-core'), $adv_dep );

vc_map(array(
	'name' => esc_html__('Single Media', 'uncode-core') ,
	'base' => 'vc_single_image',
	'icon' => 'fa fa-image',
	'weight' => 9850,
	'php_class_name' => 'uncode_generic_admin',
	'category' => array(
		esc_html__('Essentials', 'uncode-core') ,
		esc_html__('Dynamic', 'uncode-core') ,
		esc_html__('WooCommerce Product', 'uncode-core') ,
	),
	'description' => esc_html__('Media image lightbox video audio YouTube Vimeo video featured product Photos', 'uncode-core') ,
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Title', 'uncode-core') ,
			'param_name' => 'title',
			'description' => esc_html__('Enter text which will be used as module title. Leave blank if no title is needed.', 'uncode-core')
		) ,
		array(
			"type" => "media_element",
			"heading" => esc_html__("Media", 'uncode-core') ,
			"param_name" => "media",
			"value" => "",
			"edit_field_class" => 'vc_column uncode_single_media',
			"description" => esc_html__("Specify a media from the Media Library.", 'uncode-core') ,
			"admin_label" => true
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Dynamic Media", 'uncode-core') ,
			"param_name" => "dynamic",
			"description" => esc_html__("Activate to display a media from Select Media or Product Gallery.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Dynamic source", 'uncode-core') ,
			"param_name" => "dynamic_source",
			"description" => esc_html__("Set the source for the Dynamic Media.", 'uncode-core') ,
			'dependency' => array(
				'element' => 'dynamic',
				'not_empty' => true,
			) ,
			"value" => array(
				esc_html__('Featured Image', 'uncode-core') => '',
				esc_html__('Secondary Featured Image', 'uncode-core') => 'secondary',
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Caption", 'uncode-core') ,
			"param_name" => "caption",
			"description" => 'Activate to have the caption under the image.',
			"value" => array(
				'' => 'yes'
			)
		) ,
		array(
			'type' => 'checkbox',
			'heading' => esc_html__('Lightbox', 'uncode-core') ,
			'param_name' => 'media_lightbox',
			'description' => esc_html__('Activate if you want to open the media in the lightbox.', 'uncode-core') ,
			'value' => array(
				esc_html__('Yes, please', 'uncode-core') => 'yes'
			)
		) ,
		array(
			'type' => 'checkbox',
			'heading' => esc_html__('Poster', 'uncode-core') ,
			'param_name' => 'media_poster',
			'description' => esc_html__('Activate if you want to view the poster image instead (this is usefull for other media than images with the use of the lightbox).', 'uncode-core') ,
			'value' => array(
				esc_html__('Yes, please', 'uncode-core') => 'yes'
			)
		) ,
		array(
			'type' => 'vc_link',
			'heading' => esc_html__('URL (Link)', 'uncode-core') ,
			'param_name' => 'media_link',
			'description' => esc_html__('Enter URL if you want this image to have a link.', 'uncode-core') ,
			'dependency' => array(
				'element' => 'media_link_large',
				'is_empty' => true,
			)
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Width unit", 'uncode-core') ,
			"param_name" => "media_width_use_pixel",
			"description" => 'Set this value if you want to constrain the media width.',
			"group" => esc_html__("Aspect", 'uncode-core') ,
			"value" => array(
				'' => 'yes'
			)
		) ,
		array(
			"type" => "type_numeric_slider",
			"heading" => esc_html__("Width", 'uncode-core') ,
			"param_name" => "media_width_percent",
			"min" => 0,
			"max" => 100,
			"step" => 1,
			"value" => 100,
			"description" => esc_html__("Set the media width with a percent value.", 'uncode-core') ,
			"group" => esc_html__("Aspect", 'uncode-core') ,
			'dependency' => array(
				'element' => 'media_width_use_pixel',
				'is_empty' => true,
			)
		) ,
		array(
			'type' => 'textfield',
			"heading" => esc_html__("Width", 'uncode-core') ,
			'param_name' => 'media_width_pixel',
			'description' => esc_html__("Insert the media width in pixel.", 'uncode-core') ,
			"group" => esc_html__("Aspect", 'uncode-core') ,
			'dependency' => array(
				'element' => 'media_width_use_pixel',
				'value' => 'yes'
			)
		) ,
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Aspect ratio', 'uncode-core') ,
			'param_name' => 'media_ratio',
			'description' => esc_html__('Specify the aspect ratio for the media.', 'uncode-core') ,
			"value" => array(
				esc_html__('Regular', 'uncode-core') => '',
				'1:1' => 'one-one',
				'2:1' => 'two-one',
				'3:2' => 'three-two',
				'4:3' => 'four-three',
				'5:4' => 'five-four',
				'10:3' => 'ten-three',
				'16:9' => 'sixteen-nine',
				'21:9' => 'twentyone-nine',
				'1:2' => 'one-two',
				'2:3' => 'two-three',
				'3:4' => 'three-four',
				'4:5' => 'four-five',
				'3:10' => 'three-ten',
				'9:16' => 'nine-sixteen',
			) ,
			'group' => esc_html__('Aspect', 'uncode-core') ,
			'admin_label' => true,
		) ,
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Alignment', 'uncode-core') ,
			'param_name' => 'alignment',
			'value' => array(
				esc_html__('Align Left', 'uncode-core') => '',
				esc_html__('Align Right', 'uncode-core') => 'right',
				esc_html__('Align Center', 'uncode-core') => 'center'
			) ,
			'description' => esc_html__('Specify image alignment.', 'uncode-core') ,
			"group" => esc_html__("Aspect", 'uncode-core') ,
		) ,
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Shape', 'uncode-core') ,
			'param_name' => 'shape',
			'value' => array(
				esc_html__('Select…', 'uncode-core') => '',
				esc_html__('Rounded', 'uncode-core') => 'img-round',
				esc_html__('Circular', 'uncode-core') => 'img-circle'
			) ,
			'description' => esc_html__('Specify media shape.', 'uncode-core') ,
			"group" => esc_html__("Aspect", 'uncode-core') ,
		) ,
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Border radius", 'uncode-core') ,
			"param_name" => "radius",
			"description" => esc_html__("Specify the border radius effect.", 'uncode-core') ,
			"group" => esc_html__("Aspect", 'uncode-core') ,
			"std" => "",
			"value" => array(
				esc_html__('Extra Small', 'uncode-core') => 'xs',
				esc_html__('Small', 'uncode-core') => ' ',
				esc_html__('Standard', 'uncode-core') => 'std',
				esc_html__('Large', 'uncode-core') => 'lg',
				esc_html__('Extra Large', 'uncode-core') => 'xl',
			),
			"std" => ' ',
			'dependency' => array(
				'element' => 'shape',
				'value' => 'img-round'
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Border", 'uncode-core') ,
			"param_name" => "border",
			"description" => 'Activate to have a border around like a thumbnail.',
			"group" => esc_html__("Aspect", 'uncode-core') ,
			"value" => array(
				'' => 'yes'
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Shadow", 'uncode-core') ,
			"param_name" => "shadow",
			"description" => 'Activate this for the shadow effect.',
			"group" => esc_html__("Aspect", 'uncode-core') ,
			"value" => array(
				'' => 'yes'
			)
		) ,
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Shadow type", 'uncode-core') ,
			"param_name" => "shadow_weight",
			"description" => esc_html__("Specify the shadow option preset.", 'uncode-core') ,
			"group" => esc_html__("Aspect", 'uncode-core') ,
			"value" => array(
				esc_html__('Extra Small', 'uncode-core') => 'xs',
				esc_html__('Small', 'uncode-core') => 'sm',
				esc_html__('Standard', 'uncode-core') => 'std',
				esc_html__('Large', 'uncode-core') => 'lg',
				esc_html__('Extra Large', 'uncode-core') => 'xl',
			) ,
			'dependency' => array(
				'element' => 'shadow',
				'not_empty' => true
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Shadow Darker", 'uncode-core') ,
			"param_name" => "shadow_darker",
			"description" => esc_html__("Activate this for the dark shadow effect.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("Aspect", 'uncode-core') ,
			'dependency' => array(
				'element' => 'shadow',
				'not_empty' => true
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Activate advanced preset", 'uncode-core') ,
			"param_name" => "advanced",
			"description" => 'Activate if you want to have advanced options.',
			"group" => esc_html__("Aspect", 'uncode-core') ,
			"value" => array(
				'' => 'yes'
			)
		) ,
		array(
			'type' => 'sorted_list',
			'heading' => esc_html__('Media', 'uncode-core') ,
			'param_name' => 'media_items',
			'description' => esc_html__('Enable or disable elements and place them in desired order.', 'uncode-core') ,
			'value' => 'media',
			"group" => esc_html__("Advanced", 'uncode-core') ,
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes'
			) ,
			'options' => array(
				array(
					'media',
					esc_html__('Media', 'uncode-core') ,
					array(
						array(
							'original',
							esc_html__('Original', 'uncode-core')
						) ,
						array(
							'poster',
							esc_html__('Poster', 'uncode-core')
						)
					)
				) ,
				array(
					'icon',
					esc_html__('Icon', 'uncode-core') ,
					array(
						array(
							'',
							esc_html__('Small', 'uncode-core')
						) ,
						array(
							'md',
							esc_html__('Medium', 'uncode-core')
						) ,
						array(
							'lg',
							esc_html__('Large', 'uncode-core')
						),
						array(
							'xl',
							esc_html__('Extra Large', 'uncode-core')
						)
					) ,
				) ,
				array(
					'title',
					esc_html__('Title', 'uncode-core') ,
				) ,
				array(
					'caption',
					esc_html__('Caption', 'uncode-core') ,
				) ,
				array(
					'description',
					esc_html__('Description', 'uncode-core') ,
				) ,
				array(
					'spacer',
					esc_html__('Spacer One', 'uncode-core') ,
					array(
						array(
							'half',
							esc_html__('0.5x', 'uncode-core')
						) ,
						array(
							'one',
							esc_html__('1x', 'uncode-core')
						) ,
						array(
							'two',
							esc_html__('2x', 'uncode-core')
						)
					)
				) ,
				array(
					'spacer_two',
					esc_html__('Spacer Two', 'uncode-core') ,
					array(
						array(
							'half',
							esc_html__('0.5x', 'uncode-core')
						) ,
						array(
							'one',
							esc_html__('1x', 'uncode-core')
						) ,
						array(
							'two',
							esc_html__('2x', 'uncode-core')
						)
					)
				) ,
				array(
					'sep-one',
					esc_html__('Separator One', 'uncode-core') ,
					array(
						array(
							'full',
							esc_html__('Full width', 'uncode-core')
						) ,
						array(
							'reduced',
							esc_html__('Reduced width', 'uncode-core')
						),
						array(
							'extra',
							esc_html__('Extra full width', 'uncode-core')
						)
					)
				) ,
				array(
					'sep-two',
					esc_html__('Separator Two', 'uncode-core') ,
					array(
						array(
							'full',
							esc_html__('Full width', 'uncode-core')
						) ,
						array(
							'reduced',
							esc_html__('Reduced width', 'uncode-core')
						),
						array(
							'extra',
							esc_html__('Extra full width', 'uncode-core')
						)
					)
				) ,
				array(
					'team-social',
					esc_html__('Team socials', 'uncode-core') ,
				) ,
			)
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Block layout", 'uncode-core') ,
			"param_name" => "media_text",
			"description" => esc_html__("Specify the text positioning inside the thumbnail.", 'uncode-core') ,
			"value" => array(
				esc_html__('Content overlay', 'uncode-core') => 'overlay',
				esc_html__('Content under image', 'uncode-core') => 'under'
			) ,
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes'
			) ,
			'group' => esc_html__('Advanced', 'uncode-core') ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Skin", 'uncode-core') ,
			"param_name" => "media_style",
			"description" => esc_html__("Specify the skin inside the content thumbnail.", 'uncode-core') ,
			"value" => array(
				esc_html__('Light', 'uncode-core') => 'light',
				esc_html__('Dark', 'uncode-core') => 'dark'
			) ,
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes'
			) ,
			'group' => esc_html__('Advanced', 'uncode-core') ,
		) ,
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Background color", 'uncode-core') ,
			"param_name" => "media_back_color",
			"description" => esc_html__("Specify a background color for the thumbnail.", 'uncode-core') ,
			"value" => $uncode_colors,
			'group' => esc_html__('Advanced', 'uncode-core') ,
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes'
			) ,
		) ,
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Overlay color", 'uncode-core') ,
			"param_name" => "media_overlay_color",
			"description" => esc_html__("Specify a background color for the thumbnail.", 'uncode-core') ,
			"value" => $uncode_colors,
			'group' => esc_html__('Advanced', 'uncode-core') ,
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes'
			) ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Overlay coloration", 'uncode-core') ,
			"param_name" => "media_overlay_coloration",
			"description" => wp_kses(__("Specify the coloration style for the overlay.<br />NB. For the gradient you can't customize the overlay color.", 'uncode-core'), array( 'br' => array( ) ) ) ,
			"value" => array(
				esc_html__('Fully colored', 'uncode-core') => '',
				esc_html__('Gradient top', 'uncode-core') => 'top_gradient',
				esc_html__('Gradient bottom', 'uncode-core') => 'bottom_gradient',
			) ,
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes'
			) ,
			'group' => esc_html__('Advanced', 'uncode-core') ,
		) ,
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Overlay Blend Mode *", 'uncode-core') ,
			"param_name" => "media_overlay_color_blend",
			"description" => esc_html__("Specify a Blend Mode. NB. It does not work on IE and Edge.", 'uncode-core') ,
			'group' => esc_html__('Advanced', 'uncode-core') ,
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
				'element' => "media_overlay_color",
				'not_empty' => true
			) ,
		) ,
		array(
			"type" => "type_numeric_slider",
			"heading" => esc_html__("Overlay Opacity", 'uncode-core') ,
			"param_name" => "media_overlay_opacity",
			"min" => 1,
			"max" => 100,
			"step" => 1,
			"value" => 50,
			"description" => esc_html__("Set the overlay opacity.", 'uncode-core') ,
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes'
			) ,
			'group' => esc_html__('Advanced', 'uncode-core') ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Overlay text visibility", 'uncode-core') ,
			"param_name" => "media_text_visible",
			"description" => esc_html__("Activate this to show the text as starting point.", 'uncode-core') ,
			"value" => array(
				esc_html__('Hidden', 'uncode-core') => 'no',
				esc_html__('Visible', 'uncode-core') => 'yes',
			) ,
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes'
			) ,
			"group" => esc_html__("Advanced", 'uncode-core') ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Overlay animation", 'uncode-core') ,
			"param_name" => "media_overlay_anim",
			"description" => esc_html__("Activate this to animate the overlay on mouse over.", 'uncode-core') ,
			"value" => array(
				esc_html__('Animated', 'uncode-core') => 'yes',
				esc_html__('Static', 'uncode-core') => 'no',
			) ,
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes'
			) ,
			"group" => esc_html__("Advanced", 'uncode-core') ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Overlay text animation", 'uncode-core') ,
			"param_name" => "media_text_anim",
			"description" => esc_html__("Activate this to animate the text on mouse over.", 'uncode-core') ,
			"value" => array(
				esc_html__('Animated', 'uncode-core') => 'yes',
				esc_html__('Static', 'uncode-core') => 'no',
			) ,
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes'
			) ,
			"group" => esc_html__("Advanced", 'uncode-core') ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Overlay text animation type", 'uncode-core') ,
			"param_name" => "media_text_anim_type",
			"description" => esc_html__("Specify the animation type.", 'uncode-core') ,
			"value" => array(
				esc_html__('Opacity', 'uncode-core') => '',
				esc_html__('Bottom to top', 'uncode-core') => 'btt',
			) ,
			"group" => esc_html__("Advanced", 'uncode-core') ,
			'dependency' => array(
				'element' => 'media_text_anim',
				'value' => 'yes',
			) ,
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes'
			) ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Overlay visibility", 'uncode-core') ,
			"param_name" => "media_overlay_visible",
			"description" => esc_html__("Activate this to show the overlay as starting point.", 'uncode-core') ,
			"value" => array(
				esc_html__('Hidden', 'uncode-core') => 'no',
				esc_html__('Visible', 'uncode-core') => 'yes',
			) ,
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes'
			) ,
			"group" => esc_html__("Advanced", 'uncode-core') ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Image coloration", 'uncode-core') ,
			"param_name" => "media_image_coloration",
			"description" => esc_html__("Specify the image coloration mode.", 'uncode-core') ,
			"value" => array(
				esc_html__('Standard', 'uncode-core') => '',
				esc_html__('Desaturated', 'uncode-core') => 'desaturated',
			) ,
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes'
			) ,
			"group" => esc_html__("Advanced", 'uncode-core') ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Image coloration animation", 'uncode-core') ,
			"param_name" => "media_image_color_anim",
			"description" => esc_html__("Activate this to animate the image coloration on mouse over.", 'uncode-core') ,
			"value" => array(
				esc_html__('Static', 'uncode-core') => '',
				esc_html__('Animated', 'uncode-core') => 'yes',
			) ,
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes'
			) ,
			"group" => esc_html__("Advanced", 'uncode-core') ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Image animation", 'uncode-core') ,
			"param_name" => "media_image_anim",
			"description" => esc_html__("Activate this to animate the image on mouse over.", 'uncode-core') ,
			"value" => array(
				esc_html__('Animated', 'uncode-core') => 'yes',
				esc_html__('Static', 'uncode-core') => 'no',
			) ,
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes'
			) ,
			"group" => esc_html__("Advanced", 'uncode-core') ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Content alignment", 'uncode-core') ,
			"param_name" => "media_h_align",
			"description" => esc_html__("Specify the horizontal alignment.", 'uncode-core') ,
			"value" => array(
				esc_html__('Left', 'uncode-core') => 'left',
				esc_html__('Center', 'uncode-core') => 'center',
				esc_html__('Right', 'uncode-core') => 'right',
				esc_html__('Justify', 'uncode-core') => 'justify'
			) ,
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes'
			) ,
			'group' => esc_html__('Advanced', 'uncode-core') ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Content vertical position", 'uncode-core') ,
			"param_name" => "media_v_position",
			"description" => esc_html__("Specify the text vertical position.", 'uncode-core') ,
			"value" => array(
				esc_html__('Middle', 'uncode-core') => '',
				esc_html__('Top', 'uncode-core') => 'top',
				esc_html__('Bottom', 'uncode-core') => 'bottom'
			) ,
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes'
			) ,
			'group' => esc_html__('Advanced', 'uncode-core') ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Content dimension reduced", 'uncode-core') ,
			"param_name" => "media_reduced",
			"description" => esc_html__("Specify the text reduction amount to shrink the overlay content dimension.", 'uncode-core') ,
			"value" => array(
				esc_html__('100%', 'uncode-core') => '',
				esc_html__('75%', 'uncode-core') => 'three_quarter',
				esc_html__('50%', 'uncode-core') => 'half',
			) ,
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes'
			) ,
			"group" => esc_html__("Advanced", 'uncode-core') ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Content horizontal position", 'uncode-core') ,
			"param_name" => "media_h_position",
			"description" => esc_html__("Specify the text horizontal position.", 'uncode-core') ,
			"value" => array(
				esc_html__('Left', 'uncode-core') => 'left',
				esc_html__('Center', 'uncode-core') => 'center',
				esc_html__('Right', 'uncode-core') => 'right'
			) ,
			'group' => esc_html__('Advanced', 'uncode-core') ,
			'dependency' => array(
				'element' => 'media_reduced',
				'not_empty' => true,
			) ,
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes'
			) ,
		) ,
		array(
			"type" => "type_numeric_slider",
			"heading" => esc_html__("Content Padding", 'uncode-core') ,
			"param_name" => "media_padding",
			"min" => 0,
			"max" => 5,
			"step" => 1,
			"value" => 2,
			"description" => esc_html__("Set the text padding", 'uncode-core') ,
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes'
			) ,
			"group" => esc_html__("Advanced", 'uncode-core') ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Content Reduced Gap", 'uncode-core') ,
			"param_name" => "media_text_reduced",
			"description" => esc_html__("Activate this to have less space between all the text elements inside the thumbnail.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes'
			) ,
			"group" => esc_html__("Advanced", 'uncode-core') ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Multiple click areas", 'uncode-core') ,
			"param_name" => "media_elements_click",
			"description" => esc_html__("Activate this to make every single elements clickable instead of the whole block (when available).", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("Advanced", 'uncode-core') ,
			'dependency' => array(
				'element' => 'media_text',
				'value' => 'overlay',
			) ,
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes'
			) ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Title text transform", 'uncode-core') ,
			"param_name" => "media_title_transform",
			"description" => esc_html__("Specify the title text transformation.", 'uncode-core') ,
			"value" => array(
				esc_html__('Default CSS', 'uncode-core') => '',
				esc_html__('Uppercase', 'uncode-core') => 'uppercase',
				esc_html__('Lowercase', 'uncode-core') => 'lowercase',
				esc_html__('Capitalize', 'uncode-core') => 'capitalize'
			) ,
			"group" => esc_html__("Advanced", 'uncode-core') ,
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes'
			) ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Title font family", 'uncode-core') ,
			"param_name" => "media_title_family",
			"description" => esc_html__("Specify the title font family.", 'uncode-core') ,
			"value" => $heading_font,
			'std' => '',
			"group" => esc_html__("Advanced", 'uncode-core') ,
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes'
			) ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Title size", 'uncode-core') ,
			"param_name" => "media_title_dimension",
			"description" => esc_html__("Specify the title dimension.", 'uncode-core') ,
			"value" => $heading_size,
			"group" => esc_html__("Advanced", 'uncode-core') ,
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes'
			) ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Title font weight", 'uncode-core') ,
			"param_name" => "media_title_weight",
			"description" => esc_html__("Specify the title font weight.", 'uncode-core') ,
			"value" =>$heading_weight,
			'std' => '',
			"group" => esc_html__("Advanced", 'uncode-core') ,
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes'
			) ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Title line height", 'uncode-core') ,
			"param_name" => "media_title_height",
			"description" => esc_html__("Specify the title line height.", 'uncode-core') ,
			"value" => $heading_height,
			"group" => esc_html__("Advanced", 'uncode-core') ,
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes'
			) ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Title letter spacing", 'uncode-core') ,
			"param_name" => "media_title_space",
			"description" => esc_html__("Specify the title letter spacing.", 'uncode-core') ,
			"value" => $heading_space,
			"group" => esc_html__("Advanced", 'uncode-core') ,
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes'
			) ,
		) ,
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Title Custom Text', 'uncode-core') ,
			"param_name" => "media_title_custom",
			"group" => esc_html__("Advanced", 'uncode-core') ,
			'description' => esc_html__('Type a custom title.', 'uncode-core'),
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes'
			) ,
		) ,
		$add_text_size,
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Description Custom Text', 'uncode-core') ,
			"param_name" => "media_subtitle_custom",
			"group" => esc_html__("Advanced", 'uncode-core') ,
			'description' => esc_html__('Type a custom description.', 'uncode-core'),
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes'
			) ,
		) ,
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Caption Custom Text', 'uncode-core') ,
			"param_name" => "media_caption_custom",
			"group" => esc_html__("Advanced", 'uncode-core') ,
			'description' => esc_html__('Type a custom caption.', 'uncode-core'),
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes'
			) ,
		) ,
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__('Icon', 'uncode-core') ,
			'param_name' => 'media_icon',
			'description' => esc_html__('Specify icon from library.', 'uncode-core') ,
			'value' => '',
			'settings' => array(
				'emptyIcon' => true,
				 // default true, display an "EMPTY" icon?
				'iconsPerPage' => 1100,
				 // default 100, how many icons per/page to display
				'type' => 'uncode'
			) ,
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes'
			) ,
			'group' => esc_html__('Advanced', 'uncode-core') ,
		) ,
		$add_css_animation,
		$add_animation_speed,
		$add_animation_delay,
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
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Remove double tap", 'uncode-core') ,
			"param_name" => "no_double_tap",
			"description" => esc_html__("Remove the double tap action on mobile.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			'dependency' => array(
				'element' => 'advanced',
				'value' => 'yes',
			) ,
			"group" => esc_html__("Mobile", 'uncode-core') ,
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
			"group" => esc_html__("Extra", 'uncode-core') ,
			'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your CSS file.', 'uncode-core')
		) ,
	)
));
