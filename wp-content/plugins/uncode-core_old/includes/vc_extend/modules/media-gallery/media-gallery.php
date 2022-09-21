<?php
/**
 * VC Media Gallery config
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$add_text_size = uncode_core_vc_params_get_text_size( 'single_text_lead', false, esc_html__("Blocks", 'uncode-core') );

vc_map(array(
	'name' => esc_html__('Media Gallery', 'uncode-core') ,
	'base' => 'vc_gallery',
	'php_class_name' => 'uncode_generic_admin',
	'weight' => 9900,
	'icon' => 'fa fa-th-large',
	'category' => array(
		esc_html__('Essentials', 'uncode-core') ,
		esc_html__('Dynamic', 'uncode-core') ,
		esc_html__('WooCommerce Product', 'uncode-core') ,
	),
   	'description' => esc_html__('Gallery images masonry grid metro carousel lightbox media self hosted video audio testimonials quotes YouTube Vimeo team members products Photos', 'uncode-core') ,
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Title', 'uncode-core') ,
			'param_name' => 'title',
			'description' => esc_html__('Enter text which will be used as module title. Leave blank if no title is needed.', 'uncode-core') ,
			'group' => esc_html__('General', 'uncode-core') ,
			'admin_label' => true,
		) ,
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Unique ID', 'uncode-core') ,
			'param_name' => 'el_id',
			'value' => (function_exists('uncode_big_rand')) ? uncode_big_rand() : rand() ,
			'description' => esc_html__('This value has to be unique. Change it in case it\'s needed.', 'uncode-core') ,
			'group' => esc_html__('General', 'uncode-core')
		) ,
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Layout', 'uncode-core') ,
			'param_name' => 'type',
			'value' => array(
				esc_html__('Grid', 'uncode-core') => 'isotope',
				esc_html__('Carousel', 'uncode-core') => 'carousel',
				esc_html__('Justify', 'uncode-core') => 'justified',
			) ,
			'admin_label' => true,
			'description' => esc_html__('Specify the module layout mode.', 'uncode-core') ,
			'group' => esc_html__('General', 'uncode-core')
		) ,
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Layout mode', 'uncode-core') ,
			'param_name' => 'isotope_mode',
			'admin_label' => true,
			"description" => wp_kses(__("Specify the module layout mode. <a href='http://isotope.metafizzy.co/layout-modes.html' target='_blank'>Check this for reference</a>", 'uncode-core'), array( 'a' => array( 'href' => array(),'target' => array() ) ) ) ,
			"value" => array(
				esc_html__('Masonry', 'uncode-core') => 'masonry',
				esc_html__('Fit rows', 'uncode-core') => 'fitRows',
				esc_html__('Cells by row', 'uncode-core') => 'cellsByRow',
				esc_html__('Vertical', 'uncode-core') => 'vertical',
				esc_html__('Packery', 'uncode-core') => 'packery',
			) ,
			'group' => esc_html__('General', 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'isotope',
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Random order", 'uncode-core') ,
			"param_name" => "random",
			"description" => esc_html__("Activate this to have a media random order. NB. Limited support with Single tab modifications.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("General", 'uncode-core') ,
		) ,
		array(
			'type' => 'media_element',
			'heading' => esc_html__('Media', 'uncode-core') ,
			'param_name' => 'medias',
			'has_galleries' => true,
			"edit_field_class" => 'vc_column uncode_gallery',
			'value' => '',
			'description' => esc_html__('Specify images from Media Library.', 'uncode-core') ,
			'group' => esc_html__('General', 'uncode-core') ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Dynamic Media", 'uncode-core') ,
			"param_name" => "dynamic",
			"description" => esc_html__("Activate to display medias from Select Media or Product Gallery.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			'group' => esc_html__('General', 'uncode-core') ,
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
				esc_html__('Gallery/Media', 'uncode-core') => '',
				esc_html__('Gallery/Media with Featured Image', 'uncode-core') => 'featured',
			) ,
			'group' => esc_html__('General', 'uncode-core') ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Explode albums", 'uncode-core') ,
			"param_name" => "explode_albums",
			"description" => esc_html__("Activate to treat gallery elements as single media part of a unique gallery.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			'group' => esc_html__('General', 'uncode-core') ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Layout style", 'uncode-core') ,
			"param_name" => "style_preset",
			"description" => esc_html__("Select the visualization mode.", 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => array(
					'isotope',
				) ,
			) ,
			"value" => array(
				esc_html__('Default', 'uncode-core') => 'masonry',
				esc_html__('Metro', 'uncode-core') => 'metro',
			) ,
			'group' => esc_html__('Module', 'uncode-core') ,
		) ,
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Gallery background color", 'uncode-core') ,
			"param_name" => "gallery_back_color",
			"description" => esc_html__("Specify a background color for the module.", 'uncode-core') ,
			"class" => 'uncode_colors',
			"value" => $uncode_colors,
			'group' => esc_html__('Module', 'uncode-core') ,
		) ,
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Items Desktop', 'uncode-core') ,
			'param_name' => 'carousel_lg',
			'value' => 3,
			'description' => esc_html__('Insert the numbers of columns for the viewport from 960px.', 'uncode-core') ,
			'group' => esc_html__('Module', 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'carousel'
			) ,
		) ,
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Items Tablet', 'uncode-core') ,
			'param_name' => 'carousel_md',
			'value' => 3,
			'description' => esc_html__('Insert the numbers of columns for the viewport from 570px to 960px.', 'uncode-core') ,
			'group' => esc_html__('Module', 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'carousel'
			) ,
		) ,
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Items Device', 'uncode-core') ,
			'param_name' => 'carousel_sm',
			'value' => 1,
			'description' => esc_html__('Insert the numbers of columns for the viewport from 0 to 570px.', 'uncode-core') ,
			'group' => esc_html__('Module', 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'carousel'
			) ,
		) ,
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Row height', 'uncode-core') ,
			'param_name' => 'justify_row_height',
			'value' => 250,
			'description' => esc_html__('The preferred height of rows in pixel.', 'uncode-core'),
			'dependency' => array(
				'element' => 'type',
				'value' => array(
					'justified',
				) ,
			) ,
			'group' => esc_html__('Module', 'uncode-core') ,
		) ,
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Optional max row height', 'uncode-core') ,
			'param_name' => 'justify_max_row_height',
			'value' => '',
			'description' => esc_html__('The preferred maximum height of rows in pixel. Note that with this option can crop the images if they need to be higher to be justified.', 'uncode-core'),
			'dependency' => array(
				'element' => 'type',
				'value' => array(
					'justified',
				) ,
			) ,
			'group' => esc_html__('Module', 'uncode-core') ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Justify last row", 'uncode-core') ,
			"param_name" => "justify_last_row",
			"description" => esc_html__("Decide to justify the last row, to hide it if it can't be justified or to align them to the left, center or right", 'uncode-core') ,
			"value" => array(
				esc_html__('Default (no justisfied, left aligned)', 'uncode-core') => 'nojustify',
				esc_html__('Hide', 'uncode-core') => 'hide',
				esc_html__('Align to the center', 'uncode-core') => 'center',
				esc_html__('Align to the right', 'uncode-core') => 'right',
			) ,
			"std" => "nojustify",
			'dependency' => array(
				'element' => 'type',
				'value' => array(
					'justified',
				) ,
			) ,
			'group' => esc_html__('Module', 'uncode-core') ,
		) ,
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Aspect ratio', 'uncode-core') ,
			'param_name' => 'thumb_size',
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
			'group' => esc_html__('Module', 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'carousel',
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Filtering", 'uncode-core') ,
			"param_name" => "filtering",
			"description" => esc_html__("Activate to enable the filters.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("Module", 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => array('isotope', 'justified'),
			) ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Filter skin", 'uncode-core') ,
			"param_name" => "filter_style",
			"description" => esc_html__("Specify the filter skin color.", 'uncode-core') ,
			"value" => array(
				esc_html__('Light', 'uncode-core') => 'light',
				esc_html__('Dark', 'uncode-core') => 'dark'
			) ,
			'group' => esc_html__('Module', 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'isotope',
			) ,
			'dependency' => array(
				'element' => 'filtering',
				'value' => 'yes',
			) ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Filter typography", 'uncode-core') ,
			"param_name" => "filter_typography",
			"description" => esc_html__("Specify the filter typography.", 'uncode-core') ,
			"value" => array(
				esc_html__('Default CSS', 'uncode-core') => '',
				esc_html__('Inherit / Column', 'uncode-core') => 'inherit'
			) ,
			'group' => esc_html__('Module', 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'isotope',
			) ,
			'dependency' => array(
				'element' => 'filtering',
				'value' => 'yes',
			) ,
		) ,
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Filter color", 'uncode-core') ,
			"param_name" => "filter_back_color",
			"description" => esc_html__("Specify a background color for the filter menu.", 'uncode-core') ,
			"class" => 'uncode_colors',
			"value" => $uncode_colors,
			'group' => esc_html__('Module', 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'isotope',
			) ,
			'dependency' => array(
				'element' => 'filtering',
				'value' => 'yes',
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Filter full width", 'uncode-core') ,
			"param_name" => "filtering_full_width",
			"description" => esc_html__("Activate this to force the full width of the filter.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("Module", 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'isotope',
			) ,
			'dependency' => array(
				'element' => 'filtering',
				'value' => 'yes',
			) ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Filter position", 'uncode-core') ,
			"param_name" => "filtering_position",
			"description" => esc_html__("Specify the filter menu positioning.", 'uncode-core') ,
			"value" => array(
				esc_html__('Left', 'uncode-core') => 'left',
				esc_html__('Center', 'uncode-core') => 'center',
				esc_html__('Right', 'uncode-core') => 'right',
			) ,
			'group' => esc_html__('Module', 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'isotope',
			) ,
			'dependency' => array(
				'element' => 'filtering',
				'value' => 'yes',
			)
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Filter uppercase", 'uncode-core') ,
			"param_name" => "filtering_uppercase",
			"description" => esc_html__("Activate this to have the filter menu in uppercase.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("Module", 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'isotope',
			) ,
			'dependency' => array(
				'element' => 'filtering',
				'value' => 'yes',
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Filter mobile hidden", 'uncode-core') ,
			"param_name" => "filter_mobile",
			"description" => esc_html__("Activate this to hide the filter menu in mobile mode.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			'group' => esc_html__('Module', 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'isotope',
			) ,
			'dependency' => array(
				'element' => 'filtering',
				'value' => 'yes',
			) ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Filter mobile align", 'uncode-core') ,
			'uncode_wrapper_class' => 'post-dependent-field',
			"param_name" => "filter_mobile_align",
			"description" => esc_html__("Set the alignment for the filter mobile.", 'uncode-core') ,
			"value" => array(
				esc_html__('Center', 'uncode-core') => '',
				esc_html__('Left', 'uncode-core') => 'left',
				esc_html__('Right', 'uncode-core') => 'right'
			) ,
			'group' => esc_html__('Module', 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'isotope',
			) ,
			'dependency' => array(
				'element' => 'filter_mobile',
				'is_empty' => true,
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Filter mobile dropdown", 'uncode-core') ,
			"param_name" => "filter_mobile_dropdown",
			"description" => esc_html__("Activate the dropdown style for the filter mobile.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			'group' => esc_html__('Module', 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'isotope',
			) ,
			'dependency' => array(
				'element' => 'filter_mobile',
				'is_empty' => true,
			) ,
		) ,
		array(
			"type" => "textfield",
			"heading" => esc_html__("Filter dropdown text", 'uncode-core') ,
			'uncode_wrapper_class' => 'post-dependent-field',
			"param_name" => "filter_mobile_dropdown_text",
			"description" => esc_html__("Activate the filter dropdown text. NB. The default value is 'Categories'.", 'uncode-core') ,
			'group' => esc_html__('Module', 'uncode-core') ,
			'dependency' => array(
				'element' => 'filter_mobile_dropdown',
				'not_empty' => true,
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Filter scroll", 'uncode-core') ,
			"param_name" => "filter_scroll",
			"description" => esc_html__("Activate this to scroll to the  module when filtering.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			'group' => esc_html__('Module', 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'isotope',
			) ,
			'dependency' => array(
				'element' => 'filtering',
				'value' => 'yes',
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Filter sticky", 'uncode-core') ,
			"param_name" => "filter_sticky",
			"description" => esc_html__("Activate this to have a sticky filter menu when scrolling.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			'group' => esc_html__('Module', 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'isotope',
			) ,
			'dependency' => array(
				'element' => 'filtering',
				'value' => 'yes',
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Categories 'Show All' opposite", 'uncode-core') ,
			"param_name" => "filter_all_opposite",
			"description" => esc_html__("Activate this to position the 'Show All' button opposite to the rest.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("Module", 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'isotope',
			) ,
			'dependency' => array(
				'element' => 'filtering',
				'value' => 'yes',
			) ,
			'dependency' => array(
				'element' => 'filtering_position',
				'value' => array(
					'left',
					'right'
				)
			) ,
		) ,
		array(
			"type" => "textfield",
			"heading" => esc_html__("Categories 'Show All' text", 'uncode-core') ,
			"param_name" => "filter_all_text",
			"description" => esc_html__("Specify the button label. NB. The default value is 'Show All'.", 'uncode-core') ,
			'group' => esc_html__('Module', 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'isotope',
			) ,
			'dependency' => array(
				'element' => 'filtering',
				'value' => 'yes',
			) ,
		) ,
		array(
			"type" => "type_numeric_slider",
			"heading" => esc_html__("Items gap", 'uncode-core') ,
			"param_name" => "gutter_size",
			"min" => 0,
			"max" => 6,
			"step" => 1,
			"value" => 3,
			"description" => esc_html__("Set the items gap.", 'uncode-core') ,
			"group" => esc_html__("Module", 'uncode-core') ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Inner Padding", 'uncode-core') ,
			"param_name" => "inner_padding",
			"description" => esc_html__("Activate this to have an inner padding with the same size as the items gap.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("Module", 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => array(
					'isotope',
					'carousel',
				) ,
			) ,
		) ,
		array(
			'type' => 'sorted_list',
			'heading' => esc_html__('Media Elements', 'uncode-core') ,
			'param_name' => 'media_items',
			'description' => esc_html__('Enable or disable elements and place them in desired order.', 'uncode-core') ,
			'value' => 'media|lightbox|original,icon',
			"group" => esc_html__("Module", 'uncode-core') ,
			'options' => array(
				array(
					'media',
					esc_html__('Media', 'uncode-core') ,
					array(
						array(
							'lightbox',
							esc_html__('Lightbox', 'uncode-core')
						) ,
						array(
							'custom_link',
							esc_html__('Custom link', 'uncode-core')
						) ,
						array(
							'nolink',
							esc_html__('No link', 'uncode-core')
						)
					) ,
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
					'category',
					esc_html__('Category', 'uncode-core') ,
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
			"heading" => esc_html__("Items height", 'uncode-core') ,
			"param_name" => "carousel_height",
			"description" => esc_html__("Specify the carousel items height.", 'uncode-core') ,
			"value" => array(
				esc_html__('Auto', 'uncode-core') => '',
				esc_html__('Equal height', 'uncode-core') => 'equal',
			) ,
			'group' => esc_html__('Module', 'uncode-core') ,
			'dependency' => array(
				'element' => 'thumb_size',
				'value' => array(
					'',
					'one-one',
					'two-one',
					'three-two',
					'four-three',
					'ten-three',
					'sixteen-nine',
					'twentyone-nine',
					'one-two',
					'two-three',
					'three-four',
					'three-ten',
					'nine-sixteen',
				),
			) ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Items vertical alignment", 'uncode-core') ,
			"param_name" => "carousel_v_align",
			"description" => esc_html__("Specify the items vertical alignment.", 'uncode-core') ,
			"value" => array(
				esc_html__('Top', 'uncode-core') => '',
				esc_html__('Middle', 'uncode-core') => 'middle',
				esc_html__('Bottom', 'uncode-core') => 'bottom'
			) ,
			'group' => esc_html__('Module', 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'carousel',
			) ,
			'dependency' => array(
				'element' => 'carousel_height',
				'is_empty' => true,
			) ,
		) ,
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Transition type', 'uncode-core') ,
			'param_name' => 'carousel_type',
			"value" => array(
				esc_html__('Slide', 'uncode-core') => '',
				esc_html__('Fade', 'uncode-core') => 'fade'
			) ,
			'description' => esc_html__('Specify the transition type.<br />NB. Fade option works only with 1 item selected to create a slideshow.', 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'carousel',
			) ,
			'group' => esc_html__('Module', 'uncode-core')
		) ,
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Auto rotate slides', 'uncode-core') ,
			'param_name' => 'carousel_interval',
			'value' => array(
				3000,
				5000,
				10000,
				15000,
				esc_html__('Disable', 'uncode-core') => 0
			) ,
			'description' => esc_html__('Specify the automatic timeout between slides in milliseconds.', 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'carousel',
			) ,
			'group' => esc_html__('Module', 'uncode-core')
		) ,
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Navigation speed', 'uncode-core') ,
			'param_name' => 'carousel_navspeed',
			'value' => array(
				200,
				400,
				700,
				1000,
				esc_html__('Disable', 'uncode-core') => 0
			) ,
			'std' => 400,
			'description' => esc_html__('Specify the navigation speed between slides in milliseconds.', 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'carousel',
			) ,
			'group' => esc_html__('Module', 'uncode-core')
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Loop", 'uncode-core') ,
			"param_name" => "carousel_loop",
			"description" => esc_html__("Activate the loop option to make the carousel infinite.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("Module", 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'carousel',
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Overflow visible", 'uncode-core') ,
			"param_name" => "carousel_overflow",
			"description" => esc_html__("Activate this option to make the element overflow its container (get rid of the cropping area).", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("Module", 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'carousel',
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Arrows", 'uncode-core') ,
			"param_name" => "carousel_nav",
			"description" => esc_html__("Activate this to show arrows.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("Module", 'uncode-core') ,
			'dependency' => array(
				'element' => 'carousel_overflow',
				'is_empty' => true,
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Arrows Mobile", 'uncode-core') ,
			"param_name" => "carousel_nav_mobile",
			"description" => esc_html__("Activate this to show arrows for mobile devices.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("Module", 'uncode-core') ,
			'dependency' => array(
				'element' => 'carousel_overflow',
				'is_empty' => true,
			) ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Arrows skin", 'uncode-core') ,
			"param_name" => "carousel_nav_skin",
			"description" => esc_html__("Specify the arrows skin.", 'uncode-core') ,
			"value" => array(
				esc_html__('Light', 'uncode-core') => 'light',
				esc_html__('Dark', 'uncode-core') => 'dark'
			) ,
			"group" => esc_html__("Module", 'uncode-core') ,
			'dependency' => array(
				'element' => 'carousel_overflow',
				'is_empty' => true,
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Dots", 'uncode-core') ,
			"param_name" => "carousel_dots",
			"description" => esc_html__("Activate this to show dots in the bottom.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("Module", 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'carousel',
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Dots Extra Top", 'uncode-core') ,
			"param_name" => "carousel_dots_space",
			"description" => esc_html__("Activate this to add extra top space to the Dots.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			'std' => '',
			"group" => esc_html__("Module", 'uncode-core') ,
			'dependency' => array(
				'element' => 'carousel_dots',
				'value' => 'yes',
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Dots Mobile", 'uncode-core') ,
			"param_name" => "carousel_dots_mobile",
			"description" => esc_html__("Activate this to show dots in the bottom for mobile devices.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("Module", 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'carousel',
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Dots inside", 'uncode-core') ,
			"param_name" => "carousel_dots_inside",
			"description" => esc_html__("Activate to have the dots inside the carousel.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("Module", 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'carousel',
			) ,
		) ,
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Dots Position', 'uncode-core') ,
			'param_name' => 'carousel_dot_position',
			"value" => array(
				esc_html__('Center', 'uncode-core') => '',
				esc_html__('Left', 'uncode-core') => 'left',
				esc_html__('Right', 'uncode-core') => 'right',
			) ,
			"group" => esc_html__("Module", 'uncode-core') ,
			'description' => esc_html__('Specify the position of dots.', 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'carousel',
			) ,
		) ,
		array(
			"type" => "type_numeric_slider",
			"heading" => esc_html__("Dots Padding", 'uncode-core') ,
			"param_name" => "carousel_dot_padding",
			"min" => 0,
			"max" => 5,
			"step" => 1,
			"value" => 2,
			"description" => esc_html__("Set the distance from the carousel horizontal edge", 'uncode-core') ,
			"group" => esc_html__("Module", 'uncode-core') ,
			'dependency' => array(
				'element' => 'carousel_dots_inside',
				'value' => 'yes',
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Autoheight", 'uncode-core') ,
			"param_name" => "carousel_autoh",
			"description" => esc_html__("Activate to adjust the height automatically when possible.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("Module", 'uncode-core') ,
			'dependency' => array(
				'element' => 'thumb_size',
				'value' => array(
					'',
					'one-one',
					'two-one',
					'three-two',
					'four-three',
					'ten-three',
					'sixteen-nine',
					'twentyone-nine',
					'one-two',
					'two-three',
					'three-four',
					'three-ten',
					'nine-sixteen',
				),
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Textual carousel", 'uncode-core') ,
			"param_name" => "carousel_textual",
			"description" => esc_html__("Activate this to have a carousel with only text.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("Module", 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'carousel',
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Hide quotes", 'uncode-core') ,
			"param_name" => "hide_quotes",
			"description" => esc_html__("Activate this to hide the automatic quotes.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("Module", 'uncode-core') ,
			'dependency' => array(
				'element' => 'carousel_textual',
				'value' => 'yes',
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Off-Grid", 'uncode-core') ,
			"param_name" => "off_grid",
			"description" => esc_html__("Activate this to put odd or even elements Off-Grid.<br />NB. Please note that this option cannot be combined with the Filtering.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			'std' => '',
			'group' => esc_html__('Module', 'uncode-core') ,
			'dependency' => array(
				'element' => 'isotope_mode',
				'value' => array(
					'masonry',
					'packery'
				),
			) ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Off-Grid Items Rhythm", 'uncode-core') ,
			"param_name" => "off_grid_element",
			"description" => esc_html__("Select what item to put Off-Grid.", 'uncode-core') ,
			'value' => array(
				esc_html__('Odd', 'uncode-core') => 'odd',
				esc_html__('Even', 'uncode-core') => 'even',
				esc_html__('Custom', 'uncode-core') => 'custom'
			) ,
			'group' => esc_html__('Module', 'uncode-core') ,
			'dependency' => array(
				'element' => 'off_grid',
				'not_empty' => true,
			) ,
		) ,
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Off-Grid custom value', 'uncode-core') ,
			'param_name' => 'off_grid_custom',
			'value' => '0,2',
			'description' => wp_kses(__('Enter a number or a series of comma separated numbers.<br />NB. The first element is identified by 0.', 'uncode-core'), array( 'br' => array( ) ) ) ,
			'group' => esc_html__('Module', 'uncode-core') ,
			'dependency' => array(
				'element' => 'off_grid_element',
				'value' => array(
					'custom',
				) ,
			) ,
		) ,
		array(
			"type" => "type_numeric_slider",
			"heading" => esc_html__("Off-Grid value", 'uncode-core') ,
			"param_name" => "off_grid_val",
			"min" => 1,
			"max" => 7,
			"step" => 1,
			"value" => 2,
			"description" => esc_html__("Set the shift value.", 'uncode-core') ,
			'group' => esc_html__('Module', 'uncode-core') ,
			'dependency' => array(
				'element' => 'off_grid',
				'not_empty' => true,
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Off-Grid All Items", 'uncode-core') ,
			"param_name" => "off_grid_all",
			"description" => esc_html__("Set this option to apply the Off-Grid to all elements. Normally it is applied only to the elements of the first row.", 'uncode-core') ,
			"std" => '',
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			'group' => esc_html__('Module', 'uncode-core') ,
			'dependency' => array(
				'element' => 'off_grid',
				'not_empty' => true,
			) ,
		) ,
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Breakpoint - First step', 'uncode-core') ,
			'param_name' => 'screen_lg',
			'value' => 1000,
			'description' => wp_kses(__('Insert the isotope large layout breakpoint in pixel.<br />NB. This is referring to the width of the isotope container, not to the window width.', 'uncode-core'), array( 'br' => array( ) ) ) ,
			'group' => esc_html__('Module', 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => array(
					'isotope',
				) ,
			) ,
		) ,
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Breakpoint - Second step', 'uncode-core') ,
			'param_name' => 'screen_md',
			'value' => 600,
			'description' => wp_kses(__('Insert the isotope medium layout breakpoint in pixel.<br />NB. This is referring to the width of the isotope container, not to the window width.', 'uncode-core'), array( 'br' => array( ) ) ) ,
			'group' => esc_html__('Module', 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => array(
					'isotope',
				) ,
			) ,
		) ,
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Breakpoint - Third step', 'uncode-core') ,
			'param_name' => 'screen_sm',
			'value' => 480,
			'description' => wp_kses(__('Insert the isotope small layout breakpoint in pixel.<br />NB. This is referring to the width of the isotope container, not to the window width.', 'uncode-core'), array( 'br' => array( ) ) ) ,
			'group' => esc_html__('Module', 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => array(
					'isotope',
				) ,
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Not Active Items Transparent", 'uncode-core') ,
			"param_name" => "carousel_half_opacity",
			"description" => esc_html__("Activate this option to make semitransparent not active items.", 'uncode-core') ,
			"std" => '',
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("Module", 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'carousel',
			) ,
			'dependency' => array(
				'element' => 'carousel_overflow',
				'value' => 'yes',
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Not active items scaled", 'uncode-core') ,
			"param_name" => "carousel_scaled",
			"description" => esc_html__("Activate this option to scale not active items.", 'uncode-core') ,
			"std" => '',
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("Module", 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'carousel',
			) ,
			'dependency' => array(
				'element' => 'carousel_overflow',
				'value' => 'yes',
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Not Active Items Not Clickable", 'uncode-core') ,
			"param_name" => "carousel_pointer_events",
			"description" => esc_html__("Activate this option to make Not Active Items Not Clickable.", 'uncode-core') ,
			"std" => '',
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("Module", 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'carousel',
			) ,
			'dependency' => array(
				'element' => 'carousel_overflow',
				'value' => 'yes',
			) ,
		) ,
		array(
			"type" => "type_numeric_slider",
			"heading" => esc_html__("Stage padding", 'uncode-core') ,
			"description" => esc_html__("Activate this option to add left and right padding style onto stage-wrapper.", 'uncode-core') ,
			"param_name" => "stage_padding",
			"min" => 0,
			"max" => 75,
			"step" => 5,
			"value" => 0,
			"group" => esc_html__("Module", 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'carousel',
			) ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Block layout", 'uncode-core') ,
			"param_name" => "single_text",
			"description" => esc_html__("Specify the text positioning inside the thumbnail.", 'uncode-core') ,
			"value" => array(
				esc_html__('Content overlay', 'uncode-core') => 'overlay',
				esc_html__('Content under image', 'uncode-core') => 'under'
			) ,
			'dependency' => array(
				'element' => 'type',
				'value' => array(
					'isotope','carousel'
				) ,
			) ,
			'group' => esc_html__('Blocks', 'uncode-core') ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Width", 'uncode-core') ,
			"param_name" => "single_width",
			"description" => esc_html__("Specify the thumbnail width.", 'uncode-core') ,
			"value" => $units,
			"std" => "4",
			'dependency' => array(
				'element' => 'type',
				'value' => array(
					'isotope',
				) ,
			) ,
			'group' => esc_html__('Blocks', 'uncode-core') ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Height", 'uncode-core') ,
			"param_name" => "single_height",
			"description" => esc_html__("Specify the thumbnail height.", 'uncode-core') ,
			"value" => array(
				esc_html__("Default", 'uncode-core') => ""
			) + $units,
			"std" => "",
			'group' => esc_html__('Blocks', 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => array(
					'isotope',
				) ,
			) ,
			'dependency' => array(
				'element' => 'style_preset',
				'value' => 'metro',
			) ,
		) ,
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Aspect ratio', 'uncode-core') ,
			'param_name' => 'images_size',
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
			'group' => esc_html__('Blocks', 'uncode-core') ,
			'dependency' => array(
				'element' => 'style_preset',
				'value' => 'masonry',
			) ,
			'admin_label' => true,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Skin", 'uncode-core') ,
			"param_name" => "single_style",
			"description" => esc_html__("Specify the skin inside the content thumbnail.", 'uncode-core') ,
			"value" => array(
				esc_html__('Light', 'uncode-core') => 'light',
				esc_html__('Dark', 'uncode-core') => 'dark'
			) ,
			'group' => esc_html__('Blocks', 'uncode-core') ,
		) ,
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Background color", 'uncode-core') ,
			"param_name" => "single_back_color",
			"description" => esc_html__("Specify a background color for the thumbnail.", 'uncode-core') ,
			"value" => $uncode_colors,
			'group' => esc_html__('Blocks', 'uncode-core') ,
		) ,
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Shape', 'uncode-core') ,
			'param_name' => 'single_shape',
			'value' => array(
				esc_html__('Select…', 'uncode-core') => '',
				esc_html__('Rounded', 'uncode-core') => 'round',
				esc_html__('Circular', 'uncode-core') => 'circle'
			) ,
			'description' => esc_html__('Specify one if you want to shape the block.', 'uncode-core') ,
			'group' => esc_html__('Blocks', 'uncode-core') ,
		) ,
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Border radius", 'uncode-core') ,
			"param_name" => "radius",
			"description" => esc_html__("Specify the border radius effect.", 'uncode-core') ,
			'group' => esc_html__('Blocks', 'uncode-core') ,
			'std' => '',
			"value" => array(
				esc_html__('Extra Small', 'uncode-core') => 'xs',
				esc_html__('Small', 'uncode-core') => ' ',
				esc_html__('Standard', 'uncode-core') => 'std',
				esc_html__('Large', 'uncode-core') => 'lg',
				esc_html__('Extra Large', 'uncode-core') => 'xl',
			),
			"std" => ' ',
			'dependency' => array(
				'element' => 'single_shape',
				'value' => 'round'
			) ,
		) ,
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Overlay color", 'uncode-core') ,
			"param_name" => "single_overlay_color",
			"description" => esc_html__("Specify a background color for the thumbnail.", 'uncode-core') ,
			"value" => $uncode_colors,
			'group' => esc_html__('Blocks', 'uncode-core') ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Overlay coloration", 'uncode-core') ,
			"param_name" => "single_overlay_coloration",
			"description" => wp_kses(__("Specify the coloration style for the overlay.<br />NB. For the gradient you can't customize the overlay color.", 'uncode-core'), array( 'br' => array( ) ) ) ,
			"value" => array(
				esc_html__('Fully colored', 'uncode-core') => '',
				esc_html__('Gradient top', 'uncode-core') => 'top_gradient',
				esc_html__('Gradient bottom', 'uncode-core') => 'bottom_gradient',
			) ,
			'group' => esc_html__('Blocks', 'uncode-core') ,
		) ,
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Overlay Blend Mode *", 'uncode-core') ,
			"param_name" => "single_overlay_blend",
			"description" => esc_html__("Specify a Blend Mode. NB. It does not work on IE and Edge.", 'uncode-core') ,
			'group' => esc_html__('Blocks', 'uncode-core'),
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
				'element' => "single_overlay_color",
				'not_empty' => true
			) ,
		) ,
		array(
			"type" => "type_numeric_slider",
			"heading" => esc_html__("Overlay Opacity", 'uncode-core') ,
			"param_name" => "single_overlay_opacity",
			"min" => 1,
			"max" => 100,
			"step" => 1,
			"value" => 50,
			"description" => esc_html__("Set the overlay opacity.", 'uncode-core') ,
			'group' => esc_html__('Blocks', 'uncode-core') ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Overlay visibility", 'uncode-core') ,
			"param_name" => "single_overlay_visible",
			"description" => esc_html__("Activate this to show the overlay as starting point.", 'uncode-core') ,
			"value" => array(
				esc_html__('Hidden', 'uncode-core') => 'no',
				esc_html__('Visible', 'uncode-core') => 'yes',
			) ,
			"group" => esc_html__("Blocks", 'uncode-core') ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Overlay animation", 'uncode-core') ,
			"param_name" => "single_overlay_anim",
			"description" => esc_html__("Activate this to animate the overlay on mouse over.", 'uncode-core') ,
			"value" => array(
				esc_html__('Animated', 'uncode-core') => 'yes',
				esc_html__('Static', 'uncode-core') => 'no',
			) ,
			"group" => esc_html__("Blocks", 'uncode-core') ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Overlay text visibility", 'uncode-core') ,
			"param_name" => "single_text_visible",
			"description" => esc_html__("Activate this to show the text as starting point.", 'uncode-core') ,
			"value" => array(
				esc_html__('Hidden', 'uncode-core') => 'no',
				esc_html__('Visible', 'uncode-core') => 'yes',
			) ,
			"group" => esc_html__("Blocks", 'uncode-core') ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Overlay text animation", 'uncode-core') ,
			"param_name" => "single_text_anim",
			"description" => esc_html__("Activate this to animate the text on mouse over.", 'uncode-core') ,
			"value" => array(
				esc_html__('Animated', 'uncode-core') => 'yes',
				esc_html__('Static', 'uncode-core') => 'no',
			) ,
			"group" => esc_html__("Blocks", 'uncode-core') ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Overlay text animation type", 'uncode-core') ,
			"param_name" => "single_text_anim_type",
			"description" => esc_html__("Specify the animation type.", 'uncode-core') ,
			"value" => array(
				esc_html__('Opacity', 'uncode-core') => '',
				esc_html__('Bottom to top', 'uncode-core') => 'btt',
			) ,
			"group" => esc_html__("Blocks", 'uncode-core') ,
			'dependency' => array(
				'element' => 'single_text_anim',
				'value' => 'yes',
			) ,
			'dependency' => array(
				'element' => 'single_text',
				'value' => 'overlay' ,
			) ,
		) ,		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Image coloration", 'uncode-core') ,
			"param_name" => "single_image_coloration",
			"description" => esc_html__("Specify the image coloration mode.", 'uncode-core') ,
			"value" => array(
				esc_html__('Standard', 'uncode-core') => '',
				esc_html__('Desaturated', 'uncode-core') => 'desaturated',
			) ,
			"group" => esc_html__("Blocks", 'uncode-core') ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Image coloration animation", 'uncode-core') ,
			"param_name" => "single_image_color_anim",
			"description" => esc_html__("Activate this to animate the image coloration on mouse over.", 'uncode-core') ,
			"value" => array(
				esc_html__('Static', 'uncode-core') => '',
				esc_html__('Animated', 'uncode-core') => 'yes',
			) ,
			"group" => esc_html__("Blocks", 'uncode-core') ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Image animation", 'uncode-core') ,
			"param_name" => "single_image_anim",
			"description" => esc_html__("Activate this to animate the image on mouse over.", 'uncode-core') ,
			"value" => array(
				esc_html__('Animated', 'uncode-core') => 'yes',
				esc_html__('Static', 'uncode-core') => 'no',
			) ,
			"group" => esc_html__("Blocks", 'uncode-core') ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Content alignment", 'uncode-core') ,
			"param_name" => "single_h_align",
			"description" => esc_html__("Specify the horizontal alignment.", 'uncode-core') ,
			"value" => array(
				esc_html__('Left', 'uncode-core') => 'left',
				esc_html__('Center', 'uncode-core') => 'center',
				esc_html__('Right', 'uncode-core') => 'right',
				esc_html__('Justify', 'uncode-core') => 'justify'
			) ,
			'group' => esc_html__('Blocks', 'uncode-core') ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Content vertical position", 'uncode-core') ,
			"param_name" => "single_v_position",
			"description" => esc_html__("Specify the text vertical position.", 'uncode-core') ,
			"value" => array(
				esc_html__('Middle', 'uncode-core') => '',
				esc_html__('Top', 'uncode-core') => 'top',
				esc_html__('Bottom', 'uncode-core') => 'bottom'
			) ,
			'group' => esc_html__('Blocks', 'uncode-core') ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Content width reduced", 'uncode-core') ,
			"param_name" => "single_reduced",
			"description" => esc_html__("Specify the text reduction amount to shrink the overlay content dimension.", 'uncode-core') ,
			"value" => array(
				esc_html__('100%', 'uncode-core') => '',
				esc_html__('75%', 'uncode-core') => 'three_quarter',
				esc_html__('50%', 'uncode-core') => 'half',
				esc_html__('Limit Width', 'uncode-core') => 'limit-width',
			) ,
			"group" => esc_html__("Blocks", 'uncode-core') ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Content Width Preserved Device", 'uncode-core') ,
			"param_name" => "single_reduced_mobile",
			"description" => esc_html__("Activate this to have 100% content wide on mobile devices.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("Blocks", 'uncode-core') ,
			'dependency' => array(
				'element' => 'single_reduced',
				'value' => array('three_quarter', 'half'),
			)
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Content horizontal position", 'uncode-core') ,
			"param_name" => "single_h_position",
			"description" => esc_html__("Specify the text horizontal position.", 'uncode-core') ,
			"value" => array(
				esc_html__('Left', 'uncode-core') => 'left',
				esc_html__('Center', 'uncode-core') => 'center',
				esc_html__('Right', 'uncode-core') => 'right'
			) ,
			'group' => esc_html__('Blocks', 'uncode-core') ,
			'dependency' => array(
				'element' => 'single_reduced',
				'value' => array('three_quarter', 'half'),
			)
		) ,
		array(
			"type" => "type_numeric_slider",
			"heading" => esc_html__("Content Padding", 'uncode-core') ,
			"param_name" => "single_padding",
			"min" => 0,
			"max" => 5,
			"step" => 1,
			"value" => 2,
			"description" => esc_html__("Set the text padding", 'uncode-core') ,
			"group" => esc_html__("Blocks", 'uncode-core') ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Content Reduced Gap", 'uncode-core') ,
			"param_name" => "single_text_reduced",
			"description" => esc_html__("Activate this to have less space between all the text elements inside the thumbnail.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("Blocks", 'uncode-core') ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Multiple click areas", 'uncode-core') ,
			"param_name" => "single_elements_click",
			"description" => esc_html__("Activate this to make every single elements clickable instead of the whole block (when available).", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("Blocks", 'uncode-core') ,
			'dependency' => array(
				'element' => 'single_text',
				'value' => 'overlay',
			) ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Title font family", 'uncode-core') ,
			"param_name" => "single_title_family",
			"description" => esc_html__("Specify the title font family.", 'uncode-core') ,
			"value" => $heading_font,
			'std' => '',
			"group" => esc_html__("Blocks", 'uncode-core') ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Title size", 'uncode-core') ,
			"param_name" => "single_title_dimension",
			"description" => esc_html__("Specify the title dimension.", 'uncode-core') ,
			"value" => $heading_size,
			"group" => esc_html__("Blocks", 'uncode-core') ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Title font weight", 'uncode-core') ,
			"param_name" => "single_title_weight",
			"description" => esc_html__("Specify the title font weight.", 'uncode-core') ,
			"value" => $heading_weight,
			'std' => '',
			"group" => esc_html__("Blocks", 'uncode-core') ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Title text transform", 'uncode-core') ,
			"param_name" => "single_title_transform",
			"description" => esc_html__("Specify the title text transformation.", 'uncode-core') ,
			"value" => array(
				esc_html__('Default CSS', 'uncode-core') => '',
				esc_html__('Uppercase', 'uncode-core') => 'uppercase',
				esc_html__('Lowercase', 'uncode-core') => 'lowercase',
				esc_html__('Capitalize', 'uncode-core') => 'capitalize'
			) ,
			"group" => esc_html__("Blocks", 'uncode-core') ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Title line height", 'uncode-core') ,
			"param_name" => "single_title_height",
			"description" => esc_html__("Specify the title line height.", 'uncode-core') ,
			"value" => $heading_height,
			"group" => esc_html__("Blocks", 'uncode-core') ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Title letter spacing", 'uncode-core') ,
			"param_name" => "single_title_space",
			"description" => esc_html__("Specify the title letter spacing.", 'uncode-core') ,
			"value" => $heading_space,
			"group" => esc_html__("Blocks", 'uncode-core') ,
		) ,
		$add_text_size,
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__('Icon', 'uncode-core') ,
			'param_name' => 'single_icon',
			'description' => esc_html__('Specify icon from library.', 'uncode-core') ,
			'value' => '',
			'settings' => array(
				'emptyIcon' => true,
				 // default true, display an "EMPTY" icon?
				'iconsPerPage' => 1100,
				 // default 100, how many icons per/page to display
				'type' => 'uncode'
			) ,
			'group' => esc_html__('Blocks', 'uncode-core') ,
		) ,
		array(
			'type' => 'vc_link',
			'heading' => esc_html__('Custom link', 'uncode-core') ,
			'param_name' => 'single_link',
			'description' => esc_html__('Enter the custom link for the item.', 'uncode-core') ,
			'group' => esc_html__('Blocks', 'uncode-core') ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Shadow", 'uncode-core') ,
			"param_name" => "single_shadow",
			"description" => esc_html__("Activate this for the shadow effect.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("Blocks", 'uncode-core') ,
		) ,
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Shadow type", 'uncode-core') ,
			"param_name" => "shadow_weight",
			"description" => esc_html__("Specify the shadow option preset.", 'uncode-core') ,
			"group" => esc_html__("Blocks", 'uncode-core') ,
			"value" => array(
				esc_html__('Extra Small', 'uncode-core') => 'xs',
				esc_html__('Small', 'uncode-core') => 'sm',
				esc_html__('Standard', 'uncode-core') => 'std',
				esc_html__('Large', 'uncode-core') => 'lg',
				esc_html__('Extra Large', 'uncode-core') => 'xl',
			) ,
			'dependency' => array(
				'element' => 'single_shadow',
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
			"group" => esc_html__("Blocks", 'uncode-core') ,
			'dependency' => array(
				'element' => 'single_shadow',
				'not_empty' => true
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("No border", 'uncode-core') ,
			"param_name" => "single_border",
			"description" => esc_html__("Activate this to remove the border around the block.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("Blocks", 'uncode-core') ,
		) ,
		array_merge($add_css_animation, array(
			"group" => esc_html__("Blocks", 'uncode-core') ,
			"param_name" => 'single_css_animation'
		)) ,
		array_merge($add_animation_speed, array(
			"group" => esc_html__("Blocks", 'uncode-core') ,
			"param_name" => 'single_animation_speed',
			'dependency' => array(
				'element' => 'single_css_animation',
				'not_empty' => true
			)
		)) ,
		array_merge($add_animation_delay, array(
			"group" => esc_html__("Blocks", 'uncode-core') ,
			"param_name" => 'single_animation_delay',
			'dependency' => array(
				'element' => 'single_css_animation',
				'not_empty' => true
			)
		)) ,
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Animation first items", 'uncode-core') ,
			"description" => esc_html__("Animate only the first items.", 'uncode-core') ,
			"param_name" => "single_animation_first",
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("Blocks", 'uncode-core') ,
			'dependency' => array(
				'element' => 'type',
				'value' => 'carousel' ,
			) ,
		) ,
		array(
			'type' => 'uncode_items',
			'heading' => 'Items List',
			'param_name' => 'items',
			'description' => esc_html__('Edit single items.') ,
			'group' => esc_html__('Single', 'uncode-core') ,
			'dependency' => array(
				'element' => 'explode_albums',
				'is_empty' => true
			)
		) ,
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
			"description" => esc_html__("Activate this for not showing the arrows.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("Lightbox", 'uncode-core') ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Remove double tap", 'uncode-core') ,
			"param_name" => "no_double_tap",
			"description" => esc_html__("Remove the double tap action on mobile. This doesn't work with lightbox.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("Mobile", 'uncode-core') ,
		) ,
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Extra class name', 'uncode-core') ,
			'param_name' => 'el_class',
			'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your CSS file.', 'uncode-core') ,
			'group' => esc_html__('Extra', 'uncode-core')
		)
	)
));
