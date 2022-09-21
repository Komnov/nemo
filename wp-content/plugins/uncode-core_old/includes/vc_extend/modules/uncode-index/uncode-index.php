<?php
/**
 * VC Uncode Index (Posts Module) config
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$uncode_index_params_second = array();

$add_text_size = uncode_core_vc_params_get_text_size( 'single_text_lead', false, esc_html__("Blocks", 'uncode-core') );

foreach ($uncode_post_types as $key => $value) {
	if ($value === 'product') continue;
	$uncode_post_type_list = array(
		'type' => 'sorted_list',
		'heading' => ucfirst($value) . ' ' . esc_html__('elements', 'uncode-core') ,
		'param_name' => $value . '_items',
		'description' => esc_html__('Enable or disable elements and place them in desired order. NB. The Category (when it has a non-relative position) and Icon elements cannot be dragged.', 'uncode-core') ,
		'value' => 'title,type,media,text,category',
		"group" => esc_html__("Module", 'uncode-core') ,
		'options' => array(
			array(
				'media',
				esc_html__('Media', 'uncode-core') ,
				array(
					array(
						'featured',
						esc_html__('Featured Image', 'uncode-core')
					) ,
					array(
						'media',
						esc_html__('Featured Media', 'uncode-core')
					) ,
					array(
						'custom',
						esc_html__('Custom', 'uncode-core')
					)
				) ,
				array(
					array(
						'onpost',
						esc_html__('Link to post', 'uncode-core')
					) ,
					array(
						'lightbox',
						esc_html__('Lightbox', 'uncode-core')
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
				'title',
				esc_html__('Title', 'uncode-core') ,
			) ,
			array(
				'type',
				esc_html__('Post Type', 'uncode-core') ,
			) ,
			array(
				'author',
				esc_html__('Author', 'uncode-core') ,
				array(
					array(
						'sm_size',
						esc_html__('Small size', 'uncode-core'),
					) ,
					array(
						'md_size',
						esc_html__('Medium size', 'uncode-core'),
					),
					array(
						'lg_size',
						esc_html__('Large size', 'uncode-core'),
					),
					array(
						'xl_size',
						esc_html__('Extra large size', 'uncode-core')
					)
				),
				array(
					array(
						'hide_qualification',
						esc_html__('Hide qualification', 'uncode-core'),
					) ,
					array(
						'display_qualification',
						esc_html__('Display qualification', 'uncode-core'),
					),
				),
			),
			array(
				'date',
				esc_html__('Date', 'uncode-core') ,
			) ,
			array(
				'category',
				esc_html__('Category', 'uncode-core') ,
				array(
					array(
						'nobg',
						esc_html__('Default', 'uncode-core'),
					) ,
					array(
						'yesbg',
						esc_html__('Colored text', 'uncode-core'),
					),
					array(
						'bordered',
						esc_html__('Bordered', 'uncode-core'),
					),
					array(
						'colorbg',
						esc_html__('Colored background', 'uncode-core')
					),
				),
				array(
					array(
						'relative',
						esc_html__('Relative position', 'uncode-core'),
					) ,
					array(
						'topleft',
						esc_html__('Over the image, on top left', 'uncode-core'),
					),
					array(
						'topright',
						esc_html__('Over the image, on top right', 'uncode-core'),
					),
					array(
						'bottomleft',
						esc_html__('Over the image, on bottom left', 'uncode-core'),
					),
					array(
						'bottomright',
						esc_html__('Over the image, on bottom right', 'uncode-core'),
					),
				),
				array(
					array(
						'display-icon',
						esc_html__('Display icon (when available)', 'uncode-core')
					) ,
					array(
						'hide-icon',
						esc_html__('Hide icon', 'uncode-core')
					) ,
				)
			) ,
			array(
				'extra',
				esc_html__('Extra', 'uncode-core') ,
			) ,
			array(
				'meta',
				esc_html__('Default Meta', 'uncode-core') ,
				array(
					array(
						'display-icon',
						esc_html__('Display icon', 'uncode-core')
					) ,
					array(
						'hide-icon',
						esc_html__('Hide icon', 'uncode-core')
					) ,
				)
			) ,
			array(
				'text',
				esc_html__('Text', 'uncode-core') ,
				array(
					array(
						'excerpt',
						esc_html__('Excerpt', 'uncode-core')
					) ,
					array(
						'full',
						esc_html__('Full content', 'uncode-core')
					) ,
				)
			) ,
			array(
				'link',
				esc_html__('Button', 'uncode-core'),
				array(
					array(
						'default',
						esc_html__('Inherit', 'uncode-core')
					) ,
					array(
						'default-shape',
						esc_html__('Default', 'uncode-core')
					) ,
					array(
						'round',
						esc_html__('Round', 'uncode-core')
					) ,
					array(
						'circle',
						esc_html__('Circle', 'uncode-core')
					) ,
					array(
						'square',
						esc_html__('Square', 'uncode-core')
					) ,
					array(
						'link',
						esc_html__('Standard link', 'uncode-core')
					)
				),
				array(
					array(
						'default_size',
						esc_html__('Default size', 'uncode-core')
					) ,
					array(
						'small_size',
						esc_html__('Small size', 'uncode-core')
					) ,
				),
			) ,
			array(
				'icon',
				esc_html__('Icon', 'uncode-core') ,
				array(
					array(
						'sm',
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
		)
	);
	$get_custom_fields = (function_exists('ot_get_option')) ? ot_get_option('_uncode_'.$value.'_custom_fields') : array();
	if (isset($get_custom_fields) && !empty($get_custom_fields))
	{
		foreach ($get_custom_fields as $field_key => $field)
		{
			$uncode_post_type_list['options'][] = array($field['_uncode_cf_unique_id'], $field['title']);
		}
	}
	$uncode_index_params_second[] = apply_filters( 'uncode_sorted_list_generic_options', $uncode_post_type_list );
}

global $uncode_index_map;


$uncode_post_list = apply_filters( 'uncode_sorted_list_post_options',
	array(
		'type' => 'sorted_list',
		'heading' => esc_html__('Posts', 'uncode-core') . ' ' . esc_html__('elements', 'uncode-core') ,
		'param_name' => 'post_items',
		'description' => esc_html__('Enable or disable elements and place them in desired order. NB. The Category (when it has a non-relative position) and Icon elements cannot be dragged.', 'uncode-core') ,
		'value' => 'media|featured|onpost|original,title,category|nobg,date,text|excerpt,link|default,author,sep-one|full,extra',
		"group" => esc_html__("Module", 'uncode-core') ,
		'options' => array(
			array(
				'media',
				esc_html__('Media', 'uncode-core') ,
				array(
					array(
						'featured',
						esc_html__('Featured Image', 'uncode-core')
					) ,
					array(
						'media',
						esc_html__('Featured Media', 'uncode-core')
					) ,
					array(
						'custom',
						esc_html__('Custom', 'uncode-core')
					)
				) ,
				array(
					array(
						'onpost',
						esc_html__('Link to post', 'uncode-core')
					) ,
					array(
						'lightbox',
						esc_html__('Lightbox', 'uncode-core')
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
				'title',
				esc_html__('Title', 'uncode-core') ,
			) ,
			array(
				'type',
				esc_html__('Post Type', 'uncode-core') ,
			) ,
			array(
				'author',
				esc_html__('Author', 'uncode-core') ,
				array(
					array(
						'sm_size',
						esc_html__('Small size', 'uncode-core'),
					) ,
					array(
						'md_size',
						esc_html__('Medium size', 'uncode-core'),
					),
					array(
						'lg_size',
						esc_html__('Large size', 'uncode-core'),
					),
					array(
						'xl_size',
						esc_html__('Extra large size', 'uncode-core')
					)
				),
				array(
					array(
						'hide_qualification',
						esc_html__('Hide qualification', 'uncode-core'),
					) ,
					array(
						'display_qualification',
						esc_html__('Display qualification', 'uncode-core'),
					),
				),
			),
			array(
				'date',
				esc_html__('Date', 'uncode-core') ,
			) ,
			array(
				'category',
				esc_html__('Category', 'uncode-core') ,
				array(
					array(
						'nobg',
						esc_html__('Default', 'uncode-core'),
					) ,
					array(
						'yesbg',
						esc_html__('Colored text', 'uncode-core'),
					),
					array(
						'bordered',
						esc_html__('Bordered', 'uncode-core'),
					),
					array(
						'colorbg',
						esc_html__('Colored background', 'uncode-core')
					),
				),
				array(
					array(
						'relative',
						esc_html__('Relative position', 'uncode-core'),
					) ,
					array(
						'topleft',
						esc_html__('Over the image, on top left', 'uncode-core'),
					),
					array(
						'topright',
						esc_html__('Over the image, on top right', 'uncode-core'),
					),
					array(
						'bottomleft',
						esc_html__('Over the image, on bottom left', 'uncode-core'),
					),
					array(
						'bottomright',
						esc_html__('Over the image, on bottom right', 'uncode-core'),
					),
				),
				array(
					array(
						'display-icon',
						esc_html__('Display icon (when available)', 'uncode-core')
					) ,
					array(
						'hide-icon',
						esc_html__('Hide icon', 'uncode-core')
					) ,
				)
			) ,
			array(
				'extra',
				esc_html__('Extra', 'uncode-core') ,
			) ,
			array(
				'meta',
				esc_html__('Default Meta', 'uncode-core') ,
				array(
					array(
						'display-icon',
						esc_html__('Display icon', 'uncode-core')
					) ,
					array(
						'hide-icon',
						esc_html__('Hide icon', 'uncode-core')
					) ,
				)
			) ,
			array(
				'text',
				esc_html__('Text', 'uncode-core') ,
				array(
					array(
						'excerpt',
						esc_html__('Excerpt', 'uncode-core')
					) ,
					array(
						'full',
						esc_html__('Full content', 'uncode-core')
					) ,
				)
			) ,
			array(
				'link',
				esc_html__('Button', 'uncode-core'),
				array(
					array(
						'default',
						esc_html__('Inherit', 'uncode-core')
					) ,
					array(
						'default-shape',
						esc_html__('Default', 'uncode-core')
					) ,
					array(
						'round',
						esc_html__('Round', 'uncode-core')
					) ,
					array(
						'circle',
						esc_html__('Circle', 'uncode-core')
					) ,
					array(
						'square',
						esc_html__('Square', 'uncode-core')
					) ,
					array(
						'link',
						esc_html__('Standard link', 'uncode-core')
					)
				),
				array(
					array(
						'default_size',
						esc_html__('Default size', 'uncode-core')
					) ,
					array(
						'small_size',
						esc_html__('Small size', 'uncode-core')
					) ,
				),
			) ,
			array(
				'icon',
				esc_html__('Icon', 'uncode-core') ,
				array(
					array(
						'sm',
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
		) ,
	)
);

$uncode_page_list = apply_filters( 'uncode_sorted_list_page_options',
	array(
		'type' => 'sorted_list',
		'heading' => esc_html__('Pages', 'uncode-core') . ' ' . esc_html__('elements', 'uncode-core') ,
		'param_name' => 'page_items',
		'description' => esc_html__('Enable or disable elements and place them in desired order. NB. The Category (when it has a non-relative position) and Icon elements cannot be dragged.', 'uncode-core') ,
		'value' => 'title,type,media,text,category',
		"group" => esc_html__("Module", 'uncode-core') ,
		'options' => array(
			array(
				'media',
				esc_html__('Media', 'uncode-core') ,
				array(
					array(
						'featured',
						esc_html__('Featured Image', 'uncode-core')
					) ,
					array(
						'media',
						esc_html__('Featured Media', 'uncode-core')
					) ,
					array(
						'custom',
						esc_html__('Custom', 'uncode-core')
					)
				) ,
				array(
					array(
						'onpost',
						esc_html__('Link to post', 'uncode-core')
					) ,
					array(
						'lightbox',
						esc_html__('Lightbox', 'uncode-core')
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
				'title',
				esc_html__('Title', 'uncode-core') ,
			) ,
			array(
				'type',
				esc_html__('Post Type', 'uncode-core') ,
			) ,
			array(
				'category',
				esc_html__('Category', 'uncode-core') ,
				array(
					array(
						'nobg',
						esc_html__('Default', 'uncode-core'),
					) ,
					array(
						'yesbg',
						esc_html__('Colored text', 'uncode-core'),
					),
					array(
						'bordered',
						esc_html__('Bordered', 'uncode-core'),
					),
					array(
						'colorbg',
						esc_html__('Colored background', 'uncode-core')
					),
				),
				array(
					array(
						'relative',
						esc_html__('Relative position', 'uncode-core'),
					) ,
					array(
						'topleft',
						esc_html__('Over the image, on top left', 'uncode-core'),
					),
					array(
						'topright',
						esc_html__('Over the image, on top right', 'uncode-core'),
					),
					array(
						'bottomleft',
						esc_html__('Over the image, on bottom left', 'uncode-core'),
					),
					array(
						'bottomright',
						esc_html__('Over the image, on bottom right', 'uncode-core'),
					),
				),
				array(
					array(
						'display-icon',
						esc_html__('Display icon (when available)', 'uncode-core')
					) ,
					array(
						'hide-icon',
						esc_html__('Hide icon', 'uncode-core')
					) ,
				)
			) ,
			array(
				'text',
				esc_html__('Text', 'uncode-core') ,
				array(
					array(
						'excerpt',
						esc_html__('Excerpt', 'uncode-core')
					) ,
					array(
						'full',
						esc_html__('Full content', 'uncode-core')
					) ,
				)
			) ,
			array(
				'link',
				esc_html__('Button', 'uncode-core'),
				array(
					array(
						'default',
						esc_html__('Inherit', 'uncode-core')
					) ,
					array(
						'default-shape',
						esc_html__('Default', 'uncode-core')
					) ,
					array(
						'round',
						esc_html__('Round', 'uncode-core')
					) ,
					array(
						'circle',
						esc_html__('Circle', 'uncode-core')
					) ,
					array(
						'square',
						esc_html__('Square', 'uncode-core')
					) ,
					array(
						'link',
						esc_html__('Standard link', 'uncode-core')
					)
				),
				array(
					array(
						'default_size',
						esc_html__('Default size', 'uncode-core')
					) ,
					array(
						'small_size',
						esc_html__('Small size', 'uncode-core')
					) ,
				),
			) ,
			array(
				'icon',
				esc_html__('Icon', 'uncode-core') ,
				array(
					array(
						'sm',
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
		),
	)
);

$uncode_product_list = apply_filters( 'uncode_sorted_list_product_options',
	array(
		'type' => 'sorted_list',
		'heading' => esc_html__('Products', 'uncode-core') . ' ' . esc_html__('elements', 'uncode-core') ,
		'param_name' => 'product_items',
		'description' => esc_html__('Enable or disable elements and place them in desired order. NB. The Category (when it has a non-relative position), Icon, Quick-View and Wishlist elements cannot be dragged.', 'uncode-core') ,
		'value' => 'title,type,media,text,category,price',
		"group" => esc_html__("Module", 'uncode-core') ,
		'options' => array(
			array(
				'media',
				esc_html__('Media', 'uncode-core') ,
				array(
					array(
						'featured',
						esc_html__('Featured Image', 'uncode-core')
					) ,
					array(
						'media',
						esc_html__('Featured Media', 'uncode-core')
					) ,
					array(
						'custom',
						esc_html__('Custom', 'uncode-core')
					) ,
				) ,
				array(
					array(
						'onpost',
						esc_html__('Link to post', 'uncode-core')
					) ,
					array(
						'lightbox',
						esc_html__('Lightbox', 'uncode-core')
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
				) ,
				array(
					array(
						'hide-sale',
						esc_html__('Hide badge', 'uncode-core')
					) ,
					array(
						'show-sale',
						esc_html__('Show badge', 'uncode-core')
					)
				) ,
				array(
					array(
						'inherit-atc',
						esc_html__('Inherit Add to Cart Style', 'uncode-core')
					) ,
					array(
						'default-atc',
						esc_html__('Default Add to Cart button', 'uncode-core')
					) ,
					array(
						'enhanced-atc',
						esc_html__('Add to Cart Button Enhanced', 'uncode-core')
					)
				) ,
				array(
					array(
						'inherit-w-atc',
						esc_html__('Inherit Add to Cart to Width', 'uncode-core')
					) ,
					array(
						'fluid-w-atc',
						esc_html__('Add to Cart Fluid Width', 'uncode-core')
					) ,
					array(
						'auto-w-atc',
						esc_html__('Add to Cart Auto Width', 'uncode-core')
					)
				),
				array(
					array(
						'show-atc',
						esc_html__('Show Add to Cart', 'uncode-core')
					) ,
					array(
						'hide-atc',
						esc_html__('Hide Add to Cart', 'uncode-core')
					) ,
				)
			) ,
			array(
				'title',
				esc_html__('Title', 'uncode-core') ,
			) ,
			array(
				'type',
				esc_html__('Post Type', 'uncode-core') ,
			) ,
			array(
				'category',
				esc_html__('Category', 'uncode-core') ,
				array(
					array(
						'nobg',
						esc_html__('Default', 'uncode-core'),
					) ,
					array(
						'yesbg',
						esc_html__('Colored text', 'uncode-core'),
					),
					array(
						'bordered',
						esc_html__('Bordered', 'uncode-core'),
					),
					array(
						'colorbg',
						esc_html__('Colored background', 'uncode-core')
					),
				),
				array(
					array(
						'relative',
						esc_html__('Relative position', 'uncode-core'),
					) ,
					array(
						'topleft',
						esc_html__('Over the image, on top left', 'uncode-core'),
					),
					array(
						'topright',
						esc_html__('Over the image, on top right', 'uncode-core'),
					),
					array(
						'bottomleft',
						esc_html__('Over the image, on bottom left', 'uncode-core'),
					),
					array(
						'bottomright',
						esc_html__('Over the image, on bottom right', 'uncode-core'),
					),
				),
				array(
					array(
						'display-icon',
						esc_html__('Display icon (when available)', 'uncode-core')
					) ,
					array(
						'hide-icon',
						esc_html__('Hide icon', 'uncode-core')
					) ,
				)
			) ,
			array(
				'text',
				esc_html__('Text', 'uncode-core') ,
				array(
					array(
						'excerpt',
						esc_html__('Excerpt', 'uncode-core')
					) ,
					array(
						'full',
						esc_html__('Full content', 'uncode-core')
					) ,
				)
			) ,
			array(
				'link',
				esc_html__('Button', 'uncode-core'),
				array(
					array(
						'default',
						esc_html__('Inherit', 'uncode-core')
					) ,
					array(
						'default-shape',
						esc_html__('Default', 'uncode-core')
					) ,
					array(
						'round',
						esc_html__('Round', 'uncode-core')
					) ,
					array(
						'circle',
						esc_html__('Circle', 'uncode-core')
					) ,
					array(
						'square',
						esc_html__('Square', 'uncode-core')
					) ,
					array(
						'link',
						esc_html__('Standard link', 'uncode-core')
					)
				),
				array(
					array(
						'default_size',
						esc_html__('Default size', 'uncode-core')
					) ,
					array(
						'small_size',
						esc_html__('Small size', 'uncode-core')
					) ,
				),
			) ,
			array(
				'add_to_cart',
				esc_html__('Add to Cart', 'uncode-core'),
				array(
					array(
						'default',
						esc_html__('Inherit', 'uncode-core')
					) ,
					array(
						'default-shape',
						esc_html__('Default', 'uncode-core')
					) ,
					array(
						'round',
						esc_html__('Round', 'uncode-core')
					) ,
					array(
						'circle',
						esc_html__('Circle', 'uncode-core')
					) ,
					array(
						'square',
						esc_html__('Square', 'uncode-core')
					) ,
					array(
						'link',
						esc_html__('Standard link', 'uncode-core')
					)
				),
				array(
					array(
						'default_size',
						esc_html__('Default size', 'uncode-core')
					) ,
					array(
						'small_size',
						esc_html__('Small size', 'uncode-core')
					) ,
				),
			) ,
			array(
				'price',
				esc_html__('Price', 'uncode-core') ,
				array(
					array(
						'default',
						esc_html__('Default layout', 'uncode-core'),
					) ,
					array(
						'inline',
						esc_html__('Inline price', 'uncode-core'),
					),
				),
			) ,
			array(
				'icon',
				esc_html__('Icon', 'uncode-core') ,
				array(
					array(
						'sm',
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
		),
	)
);

$get_post_custom_fields = (function_exists('ot_get_option')) ? ot_get_option('_uncode_post_custom_fields') : array();
if (isset($get_post_custom_fields) && !empty($get_post_custom_fields))
{
	foreach ($get_post_custom_fields as $field_key => $field)
	{
		$uncode_post_list['options'][] = array($field['_uncode_cf_unique_id'], $field['title']);
	}
}

$get_page_custom_fields = (function_exists('ot_get_option')) ? ot_get_option('_uncode_page_custom_fields') : array();
if (isset($get_page_custom_fields) && !empty($get_page_custom_fields))
{
	foreach ($get_page_custom_fields as $field_key => $field)
	{
		$uncode_page_list['options'][] = array($field['_uncode_cf_unique_id'], $field['title']);
	}
}

$get_product_custom_fields = (function_exists('ot_get_option')) ? ot_get_option('_uncode_product_custom_fields') : array();
if (isset($get_product_custom_fields) && !empty($get_product_custom_fields))
{
	foreach ($get_product_custom_fields as $field_key => $field)
	{
		$uncode_product_list['options'][] = array($field['_uncode_cf_unique_id'], $field['title']);
	}
}

$cblock          = get_posts( 'post_type="uncodeblock"&numberposts=-1&suppress_filters=0&orderby=title&order=ASC' );
$current_post_id = isset( $_GET[ 'post' ] ) && $_GET[ 'post' ] > 0 ? absint( $_GET[ 'post' ] ) : 0;

$content_blocks = array();
if ( $cblock ) {
	foreach ( $cblock as $cform ) {
		if ( $cform->ID === $current_post_id ) {
			continue;
		}

		$content_blocks[ $cform->post_title ] = $cform->ID;
	}
} else {
	$content_blocks[ __( 'No Content Block found', 'uncode-core' ) ] = 0;
}

$special_auto_queries = array(
	esc_html__('Default', 'uncode-core') => '',
	esc_html__('Related', 'uncode-core') => 'related',
);

if ( class_exists( 'WooCommerce' ) ) {
	$special_auto_queries[ esc_html__( 'Up-Sells', 'uncode-core' ) ] = 'up-sells-products';
}

$uncode_taxonomy_sorted_list = array(
	'type' => 'sorted_list',
	'heading' => esc_html__('Taxonomy Elements', 'uncode-core') ,
	'param_name' => 'uncode_taxonomy_items',
	'description' => esc_html__('Enable or disable elements and place them in desired order. NB. The Category (when it has a non-relative position) and Icon elements cannot be dragged.', 'uncode-core') ,
	'value' => 'media,title,count',
	"group" => esc_html__("Module", 'uncode-core') ,
	'options' => array(
		array(
			'media',
			esc_html__('Media', 'uncode-core') ,
			array(
				array(
					'featured',
					esc_html__('Featured Image', 'uncode-core')
				) ,
			) ,
			array(
				array(
					'onpost',
					esc_html__('Link to post', 'uncode-core')
				) ,
				array(
					'lightbox',
					esc_html__('Lightbox', 'uncode-core')
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
			'title',
			esc_html__('Title', 'uncode-core') ,
		) ,
		array(
			'text',
			esc_html__('Description', 'uncode-core') ,
		) ,
		array(
			'count',
			esc_html__('Count', 'uncode-core') ,
			array(
				array(
					'nobg',
					esc_html__('Default', 'uncode-core'),
				) ,
				array(
					'yesbg',
					esc_html__('Colored text', 'uncode-core'),
				),
				array(
					'bordered',
					esc_html__('Bordered', 'uncode-core'),
				),
				array(
					'colorbg',
					esc_html__('Colored background', 'uncode-core')
				),
			),
			array(
				array(
					'relative',
					esc_html__('Relative position', 'uncode-core'),
				) ,
				array(
					'topleft',
					esc_html__('Over the image, on top left', 'uncode-core'),
				),
				array(
					'topright',
					esc_html__('Over the image, on top right', 'uncode-core'),
				),
				array(
					'bottomleft',
					esc_html__('Over the image, on bottom left', 'uncode-core'),
				),
				array(
					'bottomright',
					esc_html__('Over the image, on bottom right', 'uncode-core'),
				),
			),
			array(
				array(
					'hide-label',
					esc_html__('Hide tax label', 'uncode-core')
				) ,
				array(
					'show-label',
					esc_html__('Display tax label', 'uncode-core')
				) ,
			)
		) ,
		array(
			'link',
			esc_html__('Button', 'uncode-core'),
			array(
				array(
					'default',
					esc_html__('Inherit', 'uncode-core')
				) ,
				array(
					'default-shape',
					esc_html__('Default', 'uncode-core')
				) ,
				array(
					'round',
					esc_html__('Round', 'uncode-core')
				) ,
				array(
					'circle',
					esc_html__('Circle', 'uncode-core')
				) ,
				array(
					'square',
					esc_html__('Square', 'uncode-core')
				) ,
				array(
					'link',
					esc_html__('Standard link', 'uncode-core')
				)
			),
			array(
				array(
					'default_size',
					esc_html__('Default size', 'uncode-core')
				) ,
				array(
					'small_size',
					esc_html__('Small size', 'uncode-core')
				) ,
			),
		) ,
		array(
			'icon',
			esc_html__('Icon', 'uncode-core') ,
			array(
				array(
					'sm',
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
	)
);

$uncode_index_params_first = array(
	array(
		'type' => 'textfield',
		'heading' => esc_html__('Unique ID', 'uncode-core') ,
		'param_name' => 'el_id',
		'value' => (function_exists('uncode_big_rand')) ? uncode_big_rand() : rand(),
		'description' => esc_html__('This value has to be unique for each module of the same page.', 'uncode-core') ,
		'group' => esc_html__('General', 'uncode-core')
	) ,
	array(
		"type" => 'dropdown',
		"heading" => esc_html__("Layout", 'uncode-core') ,
		"param_name" => "index_type",
		'admin_label' => true,
		"description" => esc_html__("Specify the layout mode: Grid or Carousel.", 'uncode-core') ,
		"value" => array(
			esc_html__('Grid', 'uncode-core') => 'isotope',
			esc_html__('Carousel', 'uncode-core') => 'carousel',
		) ,
		'group' => esc_html__('General', 'uncode-core')
	) ,
	array(
		'type' => 'dropdown',
		'heading' => esc_html__('Layout mode', 'uncode-core') ,
		'param_name' => 'isotope_mode',
		"description" => wp_kses(__("Specify the layout mode: Isotope Grid or Carousel. <a href='http://isotope.metafizzy.co/layout-modes.html' target='_blank'>Check this for reference</a>", 'uncode-core'), array( 'a' => array( 'href' => array( ),'target' => array( ) ) ) ) ,
		"value" => array(
			esc_html__('Masonry', 'uncode-core') => 'masonry',
			esc_html__('Fit rows', 'uncode-core') => 'fitRows',
			esc_html__('Cells by row', 'uncode-core') => 'cellsByRow',
			esc_html__('Vertical', 'uncode-core') => 'vertical',
			esc_html__('Packery', 'uncode-core') => 'packery',
		) ,
		'group' => esc_html__('General', 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
			'value' => 'isotope',
		) ,
	) ,
	array(
		'type' => 'loop',
		'heading' => esc_html__('Query options', 'uncode-core') ,
		'param_name' => 'loop',
		'admin_label' => true,
		'settings' => array(
			'size' => array(
				'hidden' => false,
				'value' => 10
			) ,
			'order_by' => array(
				'value' => 'date'
			) ,
		) ,
		'value' => 'size:10|order_by:date|post_type:post',
		'description' => esc_html__('Create WordPress loop, to populate content from your site.', 'uncode-core') ,
		'group' => esc_html__('General', 'uncode-core')
	) ,
	array(
		'type' => 'textfield',
		'heading' => esc_html__('Post Offset', 'uncode-core') ,
		'uncode_wrapper_class' => 'post-dependent-field',
		'param_name' => 'offset',
		'admin_label' => true,
		'description' => esc_html__('Enter the amount of posts that should be skipped in the beginning of the query. NB: please note that it\'s not possible to use it with the Filtering if combined also with the Pagination mode.', 'uncode-core') ,
		'group' => esc_html__('General', 'uncode-core')
	) ,
	array(
		"type" => 'checkbox',
		"heading" => esc_html__("Dynamic query", 'uncode-core') ,
		'uncode_wrapper_class' => 'post-dependent-field',
		"param_name" => "auto_query",
		"description" => esc_html__("Activate this to pull dynamic query when used as Content Block for categories.", 'uncode-core') ,
		'group' => esc_html__('General', 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
	) ,
	array(
		"type" => 'dropdown',
		"heading" => esc_html__("Dynamic query type", 'uncode-core') ,
		"param_name" => "auto_query_type",
		"description" => esc_html__("Select the type of query.", 'uncode-core') ,
		'group' => esc_html__('General', 'uncode-core') ,
		"value" => $special_auto_queries ,
		'dependency' => array(
			'element' => 'auto_query',
			'not_empty' => true,
		) ,
	) ,
	array(
		"type" => 'dropdown',
		"heading" => esc_html__("Layout style", 'uncode-core') ,
		"param_name" => "style_preset",
		"description" => esc_html__("Select the visualization mode.", 'uncode-core') ,
		"value" => array(
			esc_html__('Default', 'uncode-core') => 'masonry',
			esc_html__('Metro', 'uncode-core') => 'metro',
		) ,
		'group' => esc_html__('Module', 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
			'value' => array(
				'isotope',
			) ,
		) ,
	) ,
	array(
		"type" => 'checkbox',
		"heading" => esc_html__("Fluid heights", 'uncode-core') ,
		"param_name" => "single_height_viewport",
		"description" => esc_html__("Activate this to set heights relative to the browser window height, instead of using the normal metro calculations.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		'group' => esc_html__('Module', 'uncode-core') ,
		'dependency' => array(
			'element' => 'style_preset',
			'value' => 'metro',
		) ,
	) ,
	array(
		"type" => 'checkbox',
		"heading" => esc_html__("Remove menu height", 'uncode-core') ,
		"param_name" => "single_height_viewport_minus",
		"description" => esc_html__("Activate this option to remove the menu height from the fluid calculations.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		'group' => esc_html__('Module', 'uncode-core') ,
		'dependency' => array(
			'element' => 'single_height_viewport',
			'not_empty' => true,
		) ,
	) ,
	array(
		"type" => "dropdown",
		"heading" => esc_html__("Background Color", 'uncode-core') ,
		"param_name" => "index_back_color",
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
		'description' => esc_html__('Insert the numbers of items for the viewport from 960px.', 'uncode-core') ,
		'group' => esc_html__('Module', 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
			'value' => 'carousel'
		) ,
	) ,
	array(
		'type' => 'textfield',
		'heading' => esc_html__('Items Tablet', 'uncode-core') ,
		'param_name' => 'carousel_md',
		'value' => 3,
		'description' => esc_html__('Insert the numbers of items for the viewport from 570px to 960px.', 'uncode-core') ,
		'group' => esc_html__('Module', 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
			'value' => 'carousel'
		) ,
	) ,
	array(
		'type' => 'textfield',
		'heading' => esc_html__('Items Device', 'uncode-core') ,
		'param_name' => 'carousel_sm',
		'value' => 1,
		'description' => esc_html__('Insert the numbers of items for the viewport from 0 to 570px.', 'uncode-core') ,
		'group' => esc_html__('Module', 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
			'value' => 'carousel'
		) ,
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
				esc_html__('Fluid', 'uncode-core') => 'fluid',
		) ,
		'group' => esc_html__('Module', 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
			'value' => 'carousel',
		) ,
	) ,
	array(
		"type" => "type_numeric_slider",
		"heading" => esc_html__("Fluid height", 'uncode-core') ,
		"param_name" => "carousel_height_viewport",
		"description" => esc_html__("Specify the carousel height relative to the browser window.", 'uncode-core') ,
		"min" => 0,
		"max" => 100,
		"step" => 1,
		"value" => 0,
		"std" => "100",
		'group' => esc_html__('Module', 'uncode-core') ,
		'dependency' => array(
			'element' => 'thumb_size',
			'value' => 'fluid',
		) ,
	) ,
	array(
		"type" => 'checkbox',
		"heading" => esc_html__("Remove menu height", 'uncode-core') ,
		"param_name" => "carousel_height_viewport_minus",
		"description" => esc_html__("Activate this option to remove the menu height from the fluid calculations.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		'group' => esc_html__('Module', 'uncode-core') ,
		'dependency' => array(
			'element' => 'thumb_size',
			'value' => 'fluid',
		) ,
	) ,
	array(
		"type" => 'checkbox',
		"heading" => esc_html__("Filtering", 'uncode-core') ,
		'uncode_wrapper_class' => 'post-dependent-field',
		"param_name" => "filtering",
		"description" => esc_html__("Activate to enable the filters.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		"group" => esc_html__("Module", 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
			'value' => 'isotope',
		) ,
	) ,
	array(
		"type" => 'dropdown',
		"heading" => esc_html__("Filter skin", 'uncode-core') ,
		'uncode_wrapper_class' => 'post-dependent-field',
		"param_name" => "filter_style",
		"description" => esc_html__("Specify the filter skin color.", 'uncode-core') ,
		"value" => array(
			esc_html__('Light', 'uncode-core') => 'light',
			esc_html__('Dark', 'uncode-core') => 'dark'
		) ,
		'group' => esc_html__('Module', 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
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
		'uncode_wrapper_class' => 'post-dependent-field',
		"param_name" => "filter_typography",
		"description" => esc_html__("Specify the filter typography.", 'uncode-core') ,
		"value" => array(
			esc_html__('Default CSS', 'uncode-core') => '',
			esc_html__('Inherit / Column', 'uncode-core') => 'inherit'
		) ,
		'group' => esc_html__('Module', 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
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
		'uncode_wrapper_class' => 'post-dependent-field',
		"param_name" => "filter_back_color",
		"description" => esc_html__("Specify a background color for the filter menu.", 'uncode-core') ,
		"class" => 'uncode_colors',
		"value" => $uncode_colors,
		'group' => esc_html__('Module', 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
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
		'uncode_wrapper_class' => 'post-dependent-field',
		"param_name" => "filtering_full_width",
		"description" => esc_html__("Activate this to force the full width of the filter.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		"group" => esc_html__("Module", 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
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
		'uncode_wrapper_class' => 'post-dependent-field',
		"param_name" => "filtering_position",
		"description" => esc_html__("Use this option to specify the main element position. NB. The main element is considered in order the Categories Filter, the Result Count text and the Widgets Toggle.", 'uncode-core') ,
		"value" => array(
			esc_html__('Left', 'uncode-core') => 'left',
			esc_html__('Center', 'uncode-core') => 'center',
			esc_html__('Right', 'uncode-core') => 'right',
		) ,
		'group' => esc_html__('Module', 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
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
		'uncode_wrapper_class' => 'post-dependent-field',
		"param_name" => "filtering_uppercase",
		"description" => esc_html__("Activate this to have the filter menu in uppercase.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		"group" => esc_html__("Module", 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
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
		'uncode_wrapper_class' => 'post-dependent-field',
		"param_name" => "filter_mobile",
		"description" => esc_html__("Activate this to hide the filter menu in mobile mode.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		'group' => esc_html__('Module', 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
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
			'element' => 'index_type',
			'value' => 'isotope',
		) ,
		'dependency' => array(
			'element' => 'filter_mobile',
			'is_empty' => true,
		) ,
	) ,
	array(
		"type" => 'checkbox',
		"heading" => esc_html__("Filter mobile wrapper", 'uncode-core') ,
		'uncode_wrapper_class' => 'post-dependent-field',
		"param_name" => "filter_mobile_wrapper",
		"description" => esc_html__("Activate the filter mobile wrapper.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		'group' => esc_html__('Module', 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
			'value' => 'isotope',
		) ,
		'dependency' => array(
			'element' => 'filter_mobile',
			'is_empty' => true,
		) ,
	) ,
	array(
		"type" => "textfield",
		"heading" => esc_html__("Filter wrapper text", 'uncode-core') ,
		'uncode_wrapper_class' => 'post-dependent-field',
		"param_name" => "filter_mobile_wrapper_text",
		"description" => esc_html__("Activate the filter wrapper text. NB. The default value is 'Filters'.", 'uncode-core') ,
		'group' => esc_html__('Module', 'uncode-core') ,
		'dependency' => array(
			'element' => 'filter_mobile_wrapper',
			'not_empty' => true,
		) ,
	) ,
	array(
		"type" => 'checkbox',
		"heading" => esc_html__("Filter mobile dropdown", 'uncode-core') ,
		'uncode_wrapper_class' => 'post-dependent-field',
		"param_name" => "filter_mobile_dropdown",
		"description" => esc_html__("Activate the dropdown style for the filter mobile.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		'group' => esc_html__('Module', 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
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
		'uncode_wrapper_class' => 'post-dependent-field',
		"param_name" => "filter_scroll",
		"description" => esc_html__("Activate this to scroll to the module when filtering.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		'group' => esc_html__('Module', 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
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
		'uncode_wrapper_class' => 'post-dependent-field',
		"param_name" => "filter_sticky",
		"description" => esc_html__("Activate this to have a sticky filter menu when scrolling.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		'group' => esc_html__('Module', 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
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
		'uncode_wrapper_class' => 'post-dependent-field',
		"param_name" => "filter_all_opposite",
		"description" => esc_html__("Activate this to position the 'Show All' button opposite to the rest.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		"group" => esc_html__("Module", 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
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
		'dependency' => array(
			'element' => 'show_extra_filters',
			'is_empty' => true,
		),
	) ,
	array(
		"type" => "textfield",
		"heading" => esc_html__("Categories 'Show All' text", 'uncode-core') ,
		'uncode_wrapper_class' => 'post-dependent-field',
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
		"type" => 'checkbox',
		"heading" => esc_html__("Categories hidden", 'uncode-core') ,
		'uncode_wrapper_class' => 'post-dependent-field',
		"param_name" => "filter_hide_cats",
		"description" => esc_html__("Activate this to hide the categories filter.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		"group" => esc_html__("Module", 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
			'value' => 'isotope',
		) ,
		'dependency' => array(
			'element' => 'filtering',
			'value' => 'yes',
		) ,
		'dependency' => array(
			'element' => 'show_extra_filters',
			'not_empty' => true,
		),
	) ,
	array(
		"type" => 'checkbox',
		"heading" => esc_html__("Extra filters", 'uncode-core') ,
		'uncode_wrapper_class' => 'post-dependent-field',
		"param_name" => "show_extra_filters",
		"description" => esc_html__("Activate this to show additional filters. NB. Ajax doesn't work with Pagination and Extra Filters combined.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		"group" => esc_html__("Module", 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
			'value' => 'isotope',
		) ,
		'dependency' => array(
			'element' => 'filtering',
			'value' => 'yes',
		) ,
	) ,
	array(
		"type" => 'checkbox',
		"heading" => esc_html__("Widgets filtering", 'uncode-core') ,
		'uncode_wrapper_class' => 'post-dependent-field',
		"param_name" => "show_widgetized_content_block",
		"description" => esc_html__("Activate this to display the widgetized Content Block.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		"group" => esc_html__("Module", 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
			'value' => 'isotope',
		) ,
		'dependency' => array(
			'element' => 'filtering',
			'value' => 'yes',
		) ,
		'dependency' => array(
			'element' => 'show_extra_filters',
			'value' => 'yes',
		) ,
	) ,
	array(
		'type' => 'dropdown',
		'heading' => esc_html__('Widgets Content Block', 'uncode-core') ,
		'uncode_wrapper_class' => 'post-dependent-field',
		'param_name' => 'widgetized_content_block_id',
		'description' => esc_html__('Choose a Content Block.', 'uncode-core'),
		'group' => esc_html__('Module', 'uncode-core') ,
		'value' => $content_blocks,
		'dependency' => array(
			'element' => 'index_type',
			'value' => 'isotope',
		) ,
		'dependency' => array(
			'element' => 'show_widgetized_content_block',
			'value' => 'yes',
		) ,
	) ,
	array(
		'type' => 'textfield',
		'heading' => esc_html__('Widgets toggle text', 'uncode-core') ,
		'uncode_wrapper_class' => 'post-dependent-field',
		'param_name' => 'widgetized_content_block_toggle_text',
		"description" => esc_html__("Specify the Content Block toggle text. NB. The default value is 'Options'.", 'uncode-core') ,
		'group' => esc_html__('Module', 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
			'value' => 'isotope',
		) ,
		'dependency' => array(
			'element' => 'show_widgetized_content_block',
			'value' => 'yes',
		) ,
	) ,
	array(
		"type" => 'checkbox',
		"heading" => esc_html__("Widgets hide toggle icon", 'uncode-core') ,
		'uncode_wrapper_class' => 'post-dependent-field',
		"param_name" => "hide_widgetized_content_block_icon",
		"description" => esc_html__("Activate this to hide the toggle icon.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		"group" => esc_html__("Module", 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
			'value' => 'isotope',
		) ,
		'dependency' => array(
			'element' => 'show_widgetized_content_block',
			'value' => 'yes',
		) ,
	) ,
	array(
		"type" => 'checkbox',
		"heading" => esc_html__("Woo sorting", 'uncode-core') ,
		"param_name" => "show_woo_sorting",
		'uncode_wrapper_class' => 'woo-dependent-field post-dependent-field',
		"description" => esc_html__("Activate this to add the WooCommerce sorting dropdown.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		"group" => esc_html__("Module", 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
			'value' => 'isotope',
		) ,
		'dependency' => array(
			'element' => 'filtering',
			'value' => 'yes',
		) ,
		'dependency' => array(
			'element' => 'show_extra_filters',
			'value' => 'yes',
		) ,
	) ,
	array(
		"type" => 'checkbox',
		"heading" => esc_html__("Woo sorting count", 'uncode-core') ,
		"param_name" => "show_woo_result_count",
		'uncode_wrapper_class' => 'woo-dependent-field post-dependent-field',
		"description" => esc_html__("Activate this to show the WooCommerce result count.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		"group" => esc_html__("Module", 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
			'value' => 'isotope',
		) ,
		'dependency' => array(
			'element' => 'show_woo_sorting',
			'value' => 'yes',
		) ,
		// 'dependency' => array(
		// 	'element' => 'filter_hide_cats',
		// 	'is_empty' => true,
		// ),
	) ,

	array(
		"type" => "textfield",
		"heading" => esc_html__("Woo 'Default sorting' text", 'uncode-core') ,
		'uncode_wrapper_class' => 'post-dependent-field',
		"param_name" => "woo_sorting_default_text",
		"description" => esc_html__("Specify the button label when products have the default sorting. NB. The default value is 'Default sorting'.", 'uncode-core') ,
		'group' => esc_html__('Module', 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
			'value' => 'isotope',
		) ,
		'dependency' => array(
			'element' => 'show_woo_sorting',
			'value' => 'yes',
		) ,
	) ,
	array(
		"type" => 'checkbox',
		"heading" => esc_html__("Woo hide sorting icon", 'uncode-core') ,
		"param_name" => "hide_woo_sorting_icon",
		'uncode_wrapper_class' => 'woo-dependent-field post-dependent-field',
		"description" => esc_html__("Activate this to hide the dropdown icon.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		"group" => esc_html__("Module", 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
			'value' => 'isotope',
		) ,
		'dependency' => array(
			'element' => 'show_woo_sorting',
			'value' => 'yes',
		) ,
	) ,
	array(
		"type" => 'dropdown',
		"heading" => esc_html__("Woo sorting skin", 'uncode-core') ,
		"param_name" => "woo_sorting_skin",
		'uncode_wrapper_class' => 'woo-dependent-field post-dependent-field',
		"description" => esc_html__("Specify the sorting dropdown skin color.", 'uncode-core') ,
		"value" => array(
			esc_html__('Light', 'uncode-core') => 'light',
			esc_html__('Dark', 'uncode-core') => 'dark'
		) ,
		"group" => esc_html__("Module", 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
			'value' => 'isotope',
		) ,
		'dependency' => array(
			'element' => 'show_woo_sorting',
			'value' => 'yes',
		) ,
	) ,
	array(
		"type" => 'checkbox',
		"heading" => esc_html__("Woo sorting shadow", 'uncode-core') ,
		"param_name" => "woo_sorting_shadow",
		'uncode_wrapper_class' => 'woo-dependent-field post-dependent-field',
		"description" => esc_html__("Activate the sorting dropdown shadow.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		"group" => esc_html__("Module", 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
			'value' => 'isotope',
		) ,
		'dependency' => array(
			'element' => 'show_woo_sorting',
			'value' => 'yes',
		) ,
	) ,
	array(
		"type" => 'checkbox',
		"heading" => esc_html__("Pagination", 'uncode-core') ,
		'uncode_wrapper_class' => 'pagination-field',
		"param_name" => "pagination",
		"description" => wp_kses(__("Activate this to add the pagination function.<br>NB. This option doesn't work in combination with the 'Random' order and 'Menu Order' or with multiple isotope in the same page. Ajax doesn't work with Pagination and Extra Filters combined.", 'uncode-core'), array( 'br' => array( ) ) ) ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		"group" => esc_html__("Module", 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
			'value' => array(
				'isotope',
			) ,
		) ,
	) ,
	array(
		"type" => 'checkbox',
		"heading" => esc_html__("Infinite load more", 'uncode-core') ,
		'uncode_wrapper_class' => 'pagination-field load-more-field',
		"param_name" => "infinite",
		"description" => wp_kses(__("Activate this to load more items with scrolling.<br>NB. This option doesn't work is combination with the 'Random' order and 'Menu Order' or with multiple isotope in the same page.", 'uncode-core'), array( 'br' => array( ) ) ) ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		"group" => esc_html__("Module", 'uncode-core') ,
		'dependency' => array(
			'element' => 'pagination',
			'is_empty' => true,
		)
	) ,
	array(
		"type" => 'checkbox',
		"heading" => esc_html__("Load more button", 'uncode-core') ,
		'uncode_wrapper_class' => 'pagination-field load-more-field',
		"param_name" => "infinite_button",
		"description" => esc_html__("Activate this to load more items by pressing the button.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		"group" => esc_html__("Module", 'uncode-core') ,
		'dependency' => array(
			'element' => 'infinite',
			'value' => 'yes',
		)
	) ,
	array(
		"type" => "dropdown",
		"heading" => esc_html__("Load more button hover effect", 'uncode-core') ,
		'uncode_wrapper_class' => 'pagination-field load-more-field',
		"param_name" => "infinite_hover_fx",
		"description" => esc_html__("Specify an effect on hover state.", 'uncode-core') ,
		"value" => array(
			'Inherit' => '',
			'Outlined' => 'outlined',
			'Flat' => 'full-colored',
		) ,
		'group' => esc_html__('Module', 'uncode-core') ,
		'dependency' => array(
			'element' => 'infinite_button',
			'value' => 'yes',
		) ,
	) ,
	array(
		"type" => "checkbox",
		"heading" => esc_html__("Load more button outlined inverse", 'uncode-core') ,
		'uncode_wrapper_class' => 'pagination-field load-more-field',
		"param_name" => "infinite_button_outline",
		"description" => esc_html__("Outlined buttons don't have a full background color. NB: this option is available only with Load More Button Hover Effect > Outlined.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		'group' => esc_html__('Module', 'uncode-core') ,
		'dependency' => array(
			'element' => 'infinite_button',
			'value' => 'yes',
		) ,
	) ,
  array(
		"type" => "textfield",
		"heading" => esc_html__("Load more button text", 'uncode-core') ,
		'uncode_wrapper_class' => 'pagination-field load-more-field',
		"param_name" => "infinite_button_text",
		"description" => esc_html__("Specify the button label. NB. The default value is 'Load more'.", 'uncode-core') ,
		'group' => esc_html__('Module', 'uncode-core') ,
		'dependency' => array(
			'element' => 'infinite_button',
			'value' => 'yes',
		) ,
	) ,
	array(
		"type" => "dropdown",
		"heading" => esc_html__("Load more button shape", 'uncode-core') ,
		'uncode_wrapper_class' => 'pagination-field load-more-field',
		"param_name" => "infinite_button_shape",
		"description" => esc_html__("Specify the load more button shape.", 'uncode-core') ,
		'group' => esc_html__('Module', 'uncode-core') ,
		"value" => array(
			esc_html__('Inherit', 'uncode-core') => '',
			esc_html__('Default', 'uncode-core') => 'btn-default-shape',
			esc_html__('Round', 'uncode-core') => 'btn-round',
			esc_html__('Circle', 'uncode-core') => 'btn-circle',
			esc_html__('Square', 'uncode-core') => 'btn-square'
		) ,
		'dependency' => array(
			'element' => 'infinite_button',
			'value' => 'yes',
		) ,
	) ,
	array(
		"type" => "dropdown",
		"heading" => esc_html__("Load more button color", 'uncode-core') ,
		'uncode_wrapper_class' => 'pagination-field load-more-field',
		"param_name" => "infinite_button_color",
		"description" => esc_html__("Specify a background color for the load more button.", 'uncode-core') ,
		"class" => 'uncode_colors',
		"value" => $uncode_colors,
		'group' => esc_html__('Module', 'uncode-core') ,
		'dependency' => array(
			'element' => 'infinite_button',
			'value' => 'yes',
		) ,
	) ,
	array(
		"type" => 'dropdown',
		"heading" => esc_html__("Pagination-Infinite skin", 'uncode-core') ,
		'uncode_wrapper_class' => 'pagination-field',
		"param_name" => "footer_style",
		"description" => esc_html__("Specify the pagination/infinite skin color.", 'uncode-core') ,
		"value" => array(
			esc_html__('Light', 'uncode-core') => 'light',
			esc_html__('Dark', 'uncode-core') => 'dark'
		) ,
		'group' => esc_html__('Module', 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
			'value' => array(
				'isotope',
			) ,
		) ,
	) ,
	array(
		"type" => "dropdown",
		"heading" => esc_html__("Pagination-Infinite color", 'uncode-core') ,
		'uncode_wrapper_class' => 'pagination-field',
		"param_name" => "footer_back_color",
		"description" => esc_html__("Specify a background color for the pagination/infinite.", 'uncode-core') ,
		"class" => 'uncode_colors',
		"value" => $uncode_colors,
		'group' => esc_html__('Module', 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
			'value' => array(
				'isotope',
			) ,
		) ,
	) ,
	array(
		"type" => 'checkbox',
		"heading" => esc_html__("Pagination-Infinite full width", 'uncode-core') ,
		'uncode_wrapper_class' => 'pagination-field',
		"param_name" => "footer_full_width",
		"description" => esc_html__("Activate this to force the full width of the pagination/infinite.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		"group" => esc_html__("Module", 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
			'value' => array(
				'isotope',
			) ,
		) ,
	) ,
	array(
		"type" => 'checkbox',
		"heading" => esc_html__("Pagination History Disabled", 'uncode-core') ,
		'uncode_wrapper_class' => 'pagination-field',
		"param_name" => "pagination_disable_history",
		"description" => esc_html__("Activate this to remove the History Hash fragment when you use multiple Posts module in the same page.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		"group" => esc_html__("Module", 'uncode-core') ,
		'dependency' => array(
			'element' => 'pagination',
			'not_empty' => true,
		)
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
			'element' => 'index_type',
			'value' => array(
				'isotope',
				'carousel',
			) ,
		) ,
	) ,
	$uncode_post_list,
	$uncode_page_list,
	$uncode_product_list,
	$uncode_taxonomy_sorted_list,
);

$uncode_index_params_third = array(
	array(
		"type" => 'dropdown',
		"heading" => esc_html__("Items Height", 'uncode-core') ,
		"param_name" => "carousel_height",
		"description" => esc_html__("Specify the Items Height.", 'uncode-core') ,
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
			'element' => 'index_type',
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
			'element' => 'index_type',
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
			'element' => 'index_type',
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
			'element' => 'index_type',
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
			'element' => 'index_type',
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
			'element' => 'index_type',
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
			'element' => 'index_type',
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
			'element' => 'index_type',
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
			'element' => 'index_type',
			'value' => 'carousel',
		) ,
	) ,
	array(
		"type" => "type_numeric_slider",
		'heading' => esc_html__('Dots container padding', 'uncode-core') ,
		"description" => esc_html__("Activate this option to add left and right padding to dots container.", 'uncode-core') ,
		"param_name" => "carousel_dot_padding",
		"min" => 0,
		"max" => 5,
		"step" => 1,
		"value" => 2,
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
		"heading" => esc_html__("Off-Grid", 'uncode-core') ,
		"param_name" => "off_grid",
		'description' => wp_kses(__('Active this to shift elements (even or odd).<br />NB. Please note that this option cannot be combined with the Filtering.', 'uncode-core'), array( 'br' => array( ) ) ) ,
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
			'element' => 'index_type',
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
			'element' => 'index_type',
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
			'element' => 'index_type',
			'value' => array(
				'isotope',
			) ,
		) ,
	) ,
	array(
		"type" => 'checkbox',
		"heading" => esc_html__("Not Active Items Transparent", 'uncode-core') ,
		"param_name" => "carousel_half_opacity",
		"description" => esc_html__("Activate this option to make Not Active Items Transparent.", 'uncode-core') ,
		"std" => '',
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		"group" => esc_html__("Module", 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
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
		"description" => esc_html__("Activate this option to make not active items scaled.", 'uncode-core') ,
		"std" => '',
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		"group" => esc_html__("Module", 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
			'value' => 'carousel',
		) ,
		'dependency' => array(
			'element' => 'carousel_overflow',
			'value' => 'yes',
		) ,
	) ,
	array(
		"type" => 'checkbox',
		"heading" => esc_html__("Not active items not clickable", 'uncode-core') ,
		"param_name" => "carousel_pointer_events",
		"description" => esc_html__("Activate this option to make not active items not clickable.", 'uncode-core') ,
		"std" => '',
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		"group" => esc_html__("Module", 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
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
			'element' => 'index_type',
			'value' => 'carousel' ,
		) ,
	) ,
	array(
		"type" => 'dropdown',
		"heading" => esc_html__("Block layout", 'uncode-core') ,
		"param_name" => "single_text",
		"description" => esc_html__("Specify the text positioning inside the thumbnail.", 'uncode-core') ,
		"value" => array(
			esc_html__('Content under image', 'uncode-core') => 'under',
			esc_html__('Content overlay', 'uncode-core') => 'overlay',
			esc_html__('Content lateral', 'uncode-core') => 'lateral',
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
		'group' => esc_html__('Blocks', 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
			'value' => array(
				'isotope',
			) ,
		) ,
	) ,
	array(
		"type" => 'dropdown',
		"heading" => esc_html__("Height", 'uncode-core') ,
		"param_name" => "single_height",
		"description" => esc_html__("Specify the thumbnail height.", 'uncode-core') ,
		"value" => $units,
		"std" => "4",
		'group' => esc_html__('Blocks', 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
			'value' => array(
				'isotope',
			) ,
		) ,
		'dependency' => array(
			'element' => 'style_preset',
			'value' => 'metro',
		) ,
		'dependency' => array(
			'element' => 'single_height_viewport',
			'is_empty' => true,
		) ,
	) ,
	array(
		"type" => "type_numeric_slider",
		"heading" => esc_html__("Height", 'uncode-core') ,
		"param_name" => "single_fluid_height",
		"min" => 0,
		"max" => 100,
		"step" => 1,
		"value" => 0,
		"std" => '33',
		"description" => esc_html__('Set the row height with a percent value.', 'uncode-core') ,
		'group' => esc_html__('Blocks', 'uncode-core') ,
		'dependency' => array(
			'element' => 'index_type',
			'value' => array(
				'isotope',
			) ,
		) ,
		'dependency' => array(
			'element' => 'style_preset',
			'value' => 'metro',
		) ,
		'dependency' => array(
			'element' => 'single_height_viewport',
			'not_empty' => true,
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
	) ,
	array(
		"type" => 'dropdown',
		"heading" => esc_html__("Media position", 'uncode-core') ,
		"param_name" => "single_image_position",
		"description" => esc_html__("Specify the image alignment.", 'uncode-core') ,
		"value" => array(
			esc_html__('Left', 'uncode-core') => '',
			esc_html__('Right', 'uncode-core') => 'right'
		) ,
		'group' => esc_html__('Blocks', 'uncode-core') ,
		'dependency' => array(
			'element' => 'single_text',
			'value' => 'lateral',
		) ,
	) ,
	array(
		"type" => "type_numeric_slider",
		"heading" => esc_html__("Media size", 'uncode-core') ,
		"param_name" => "single_image_size",
		"min" => 1,
		"max" => 11,
		"step" => 1,
		"std" => 6,
		"description" => esc_html__('Set the image size.', 'uncode-core') ,
		'group' => esc_html__('Blocks', 'uncode-core') ,
		'dependency' => array(
			'element' => 'single_text',
			'value' => 'lateral',
		) ,
	) ,
	array(
		"type" => 'checkbox',
		"heading" => esc_html__("Media above content on mobile", 'uncode-core') ,
		"param_name" => "single_lateral_responsive",
		"description" => esc_html__("Activate this to put the media above the content on mobile devices.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		'std' => 'yes',
		"group" => esc_html__("Blocks", 'uncode-core') ,
		'dependency' => array(
			'element' => 'single_text',
			'value' => 'lateral',
		) ,
	) ,
	array(
		"type" => 'dropdown',
		"heading" => esc_html__("Skin", 'uncode-core') ,
		"param_name" => "single_style",
		"description" => esc_html__("Specify the Skin inside the content thumbnail.", 'uncode-core') ,
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
		'description' => esc_html__('Specify one if you want to shape the block.', 'uncode-core'),
		'group' => esc_html__('Blocks', 'uncode-core'),
	) ,
	array(
		"type" => "dropdown",
		"heading" => esc_html__("Border radius", 'uncode-core') ,
		"param_name" => "radius",
		"description" => esc_html__("Specify the border radius effect.", 'uncode-core') ,
		'group' => esc_html__('Blocks', 'uncode-core') ,
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
		"description" => esc_html__("Specify a background color for the overlay.", 'uncode-core') ,
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
		'group' => esc_html__('Blocks', 'uncode-core'),
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
		"heading" => esc_html__("Overlay opacity", 'uncode-core') ,
		"param_name" => "single_overlay_opacity",
		"min" => 1,
		"max" => 100,
		"step" => 1,
		"value" => 50,
		"description" => esc_html__("Set the overlay opacity.", 'uncode-core') ,
		'group' => esc_html__('Blocks', 'uncode-core'),
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
	) ,
	array(
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
		"type" => 'checkbox',
		"heading" => esc_html__("Secondary image", 'uncode-core') ,
		"param_name" => "single_secondary",
		"description" => esc_html__("Display the secondary image on hover state.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
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
		"heading" => esc_html__("Content alignment mobile", 'uncode-core') ,
		"param_name" => "single_h_align_mobile",
		"description" => esc_html__("Specify the horizontal alignment in mobile devices.", 'uncode-core') ,
		"value" => array(
			esc_html__('Inherit', 'uncode-core') => '',
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
		'dependency' => array(
			'element' => 'single_text',
			'value' => 'overlay',
		) ,
	) ,
	array(
		"type" => 'dropdown',
		"heading" => esc_html__("Content vertical alignment", 'uncode-core') ,
		"param_name" => "single_vertical_text",
		"description" => esc_html__("Specify the text vertical alignment. NB: it works with Metro Layout only.", 'uncode-core') ,
		"value" => array(
			esc_html__('Top', 'uncode-core') => '',
			esc_html__('Middle', 'uncode-core') => 'middle',
			esc_html__('Bottom', 'uncode-core') => 'bottom',
		) ,
		'group' => esc_html__('Blocks', 'uncode-core') ,
		'dependency' => array(
			'element' => 'single_text',
			'value' => 'lateral',
		) ,
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
		'dependency' => array(
			'element' => 'single_text',
			'value' => 'overlay',
		)
	) ,
	array(
		"type" => 'checkbox',
		"heading" => esc_html__("Content width preserved device", 'uncode-core') ,
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
		) ,
	) ,
	array(
		"type" => "type_numeric_slider",
		"heading" => esc_html__("Content padding", 'uncode-core') ,
		"param_name" => "single_padding",
		"min" => 0,
		"max" => 5,
		"step" => 1,
		"value" => 2,
		"description" => esc_html__("Set the text/content padding", 'uncode-core') ,
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
		"description" => esc_html__("Activate this to make every single elements clickable instead of the whole block (when availabe).", 'uncode-core') ,
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
		"heading" => esc_html__("Title semantic", 'uncode-core') ,
		"param_name" => "single_title_semantic",
		"description" => esc_html__("Specify element tag.", 'uncode-core') ,
		"value" => $heading_semantic,
		'std' => 'h3',
		"group" => esc_html__("Blocks", 'uncode-core') ,
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
		"value" =>$heading_weight,
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
		'settings' => array(
			'emptyIcon' => true,
			'iconsPerPage' => 1100,
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
			esc_html__('Extra Small', 'uncode-core') => '',
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
		"heading" => esc_html__("Remove border", 'uncode-core') ,
		"param_name" => "single_border",
		"description" => esc_html__("Activate this to remove the border around the block.", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		"group" => esc_html__("Blocks", 'uncode-core') ,
	) ,
	array_merge($add_css_animation, array("group" => esc_html__("Blocks", 'uncode-core'), "param_name" => 'single_css_animation')),
	array_merge($add_animation_speed, array("group" => esc_html__("Blocks", 'uncode-core'), "param_name" => 'single_animation_speed', 'dependency' => array('element' => 'single_css_animation','not_empty' => true))),
	array_merge($add_animation_delay, array("group" => esc_html__("Blocks", 'uncode-core'), "param_name" => 'single_animation_delay', 'dependency' => array('element' => 'single_css_animation','not_empty' => true))),
	array(
		"type" => "checkbox",
		"heading" => esc_html__("Animation first items", 'uncode-core') ,
		"description" => esc_html__("Animate only first loop of items in the carousel.", 'uncode-core') ,
		"param_name" => "single_animation_first",
		"group" => esc_html__("Blocks", 'uncode-core') ,
		"value" => Array(
			esc_html__("Yes, please", 'uncode-core') => 'yes'
		) ,
		'dependency' => array(
			'element' => 'index_type',
			'value' => 'carousel' ,
		) ,
	) ,
	array(
		'type' => 'dropdown',
		'heading' => esc_html__('Type', 'uncode-core') ,
		'param_name' => 'post_matrix',
		'description' => esc_html__('Follow the IDs or create an independent Matrix.', 'uncode-core'),
		'value' => array(
			esc_html__('By ID', 'uncode-core') => '',
			esc_html__('By Matrix', 'uncode-core') => 'matrix',
		) ,
		'std' => '',
		'group' => esc_html__('Single', 'uncode-core'),
	) ,
	array(
		'type' => 'checkbox',
		'heading' => esc_html__('Custom order', 'uncode-core') ,
		'param_name' => 'custom_order',
		'description' => wp_kses(__('Activate this to order the items with drag & drop.<br/>NB. Custom order is only possible when the \'Infinite load more\' or pagination are deactivated.', 'uncode-core'), array( 'br' => array( ) ) ) ,
		'value' => Array(
			esc_html__('Yes, please', 'uncode-core') => 'yes'
		) ,
		'group' => esc_html__('Single', 'uncode-core'),
		'dependency' => array(
			'element' => 'post_matrix',
			'is_empty' => true,
		) ,
	) ,
	array(
		'type' => 'uncode_matrix_set_amount',
		'heading' => esc_html__('Matrix amount', 'uncode-core') ,
		'param_name' => 'matrix_amount',
		'description' => esc_html__('Enter an integer number that will define your matrix range. If you use the pagination mode the max limit is the post count itself.', 'uncode-core') ,
		'group' => esc_html__('Single', 'uncode-core') ,
		'value' => '5',
		'dependency' => array(
			'element' => 'post_matrix',
			'value' => 'matrix',
		) ,
	) ,
	array(
		'type' => 'textfield',
		'edit_field_class' => 'hidden',
		'param_name' => 'order_ids',
		'group' => esc_html__('Single', 'uncode-core') ,
	) ,
	array(
		'type' => 'uncode_items',
		'heading' => 'Items list',
		'param_name' => 'items',
		'description' => esc_html__('Edit single items.') ,
		'group' => esc_html__('Single', 'uncode-core') ,
		'dependency' => array(
			'element' => 'post_matrix',
			'is_empty' => true,
		) ,
	) ,
	array(
		'type' => 'uncode_matrix_items',
		'heading' => 'Items list',
		'param_name' => 'matrix_items',
		'description' => esc_html__('Edit single items.') ,
		'group' => esc_html__('Single', 'uncode-core') ,
		'dependency' => array(
			'element' => 'post_matrix',
			'value' => 'matrix',
		) ,
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
		"description" => esc_html__("Remove the double tap action on mobile.", 'uncode-core') ,
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
);

$uncode_index_params = array_merge($uncode_index_params_first, $uncode_index_params_second, $uncode_index_params_third);

$uncode_index_map = array(
	'name' => esc_html__('Posts', 'uncode-core') ,
	'base' => 'uncode_index',
	'weight' => 9950,
	'php_class_name' => 'uncode_index',
	'icon' => 'fa fa-th',
	'category' => array(
		esc_html__('Essentials', 'uncode-core') ,
		esc_html__('Dynamic', 'uncode-core') ,
		esc_html__('WooCommerce Product', 'uncode-core') ,
	),
	'description' => esc_html__('Posts Blog portfolio product masonry grid metro carousel query related', 'uncode-core') ,
	'params' => $uncode_index_params
);

vc_map($uncode_index_map);
