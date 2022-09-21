<?php
/**
 * name             - Wireframe title
 * cat_name         - Comma separated list for multiple categories (cat display name)
 * custom_class     - Space separated list for multiple categories (cat ID)
 * dependency       - Array of dependencies
 * is_content_block - (optional) Best in a content block
 *
 * @version  1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$wireframe_categories = UNCDWF_Dynamic::get_wireframe_categories();
$data                 = array();

// Wireframe properties

$data[ 'name' ]             = esc_html__( 'Product Grid', 'uncode-wireframes' );
$data[ 'cat_name' ]         = $wireframe_categories[ 'products' ];
$data[ 'custom_class' ]     = 'products';
$data[ 'image_path' ]       = UNCDWF_THUMBS_URL . 'products/Product-Grid.jpg';
$data[ 'dependency' ]       = array();
$data[ 'is_content_block' ] = true;

// Wireframe content

$data[ 'content' ]      = '
[vc_row unlock_row_content="yes" row_height_percent="0" override_padding="yes" h_padding="0" top_padding="0" bottom_padding="0" back_color="'. uncode_wf_print_color( 'color-nhtu' ) .'" overlay_alpha="50" equal_height="yes" gutter_size="0" column_width_percent="100" shift_y="0" z_index="0" inverted_device_order="yes" shape_dividers=""][vc_column column_width_percent="100" position_vertical="bottom" gutter_size="0" override_padding="yes" column_padding="0" overlay_alpha="50" shift_x="0" shift_y="0" shift_y_down="0" z_index="0" medium_width="0" mobile_width="0" width="1/2"][vc_row_inner row_inner_height_percent="0" overlay_alpha="50" gutter_size="3" shift_y="0" z_index="0" limit_content=""][vc_column_inner column_width_percent="100" position_vertical="bottom" gutter_size="2" override_padding="yes" column_padding="4" style="dark" overlay_alpha="50" shift_x="0" shift_y="0" shift_y_down="0" z_index="0" align_medium="align_center_tablet" medium_width="0" align_mobile="align_center_mobile" mobile_width="0" width="1/1" mobile_height="240"][uncode_breadcrumbs text_lead="small" separator="triangle" wc_breadcrumbs="yes"][vc_custom_heading auto_text="yes" heading_semantic="h1" text_size="'. uncode_wf_print_font_size( 'fontsize-338686' ) .'" text_height="'. uncode_wf_print_font_height( 'fontheight-179065' ) .'"]Short headline[/vc_custom_heading][vc_custom_heading auto_text="price" heading_semantic="h6" text_size="'. uncode_wf_print_font_size( 'fontsize-445851' ) .'" text_height="'. uncode_wf_print_font_height( 'fontheight-179065' ) .'"]Short headline[/vc_custom_heading][/vc_column_inner][/vc_row_inner][vc_row_inner row_inner_height_percent="0" overlay_alpha="50" equal_height="yes" gutter_size="0" shift_y="0" z_index="0" limit_content=""][vc_column_inner column_width_percent="100" gutter_size="3" override_padding="yes" column_padding="4" style="dark" back_color="color-wayh" overlay_alpha="50" shift_x="0" shift_y="0" shift_y_down="0" z_index="0" align_medium="align_center_tablet" medium_width="4" align_mobile="align_center_mobile" mobile_width="0" width="1/2"][vc_button dynamic="add-to-cart" quantity="variation" size="btn-xl" radius="btn-square" wide="yes" hover_fx="full-colored" border_width="0" scale_mobile="no"]Text on the button[/vc_button][/vc_column_inner][vc_column_inner column_width_percent="100" position_vertical="middle" align_horizontal="align_center" gutter_size="3" override_padding="yes" column_padding="4" style="dark" back_color="color-rgdb" overlay_alpha="50" shift_x="0" shift_y="0" shift_y_down="0" z_index="0" align_medium="align_center_tablet" medium_width="0" align_mobile="align_center_mobile" mobile_width="0" width="1/2"][vc_icon icon="fa fa-heart"][/vc_icon][/vc_column_inner][/vc_row_inner][/vc_column][vc_column column_width_percent="100" align_horizontal="align_right" gutter_size="3" override_padding="yes" column_padding="0" style="dark" back_color="'. uncode_wf_print_color( 'color-lxmt' ) .'" overlay_color="'. uncode_wf_print_color( 'color-lxmt' ) .'" overlay_alpha="50" overlay_color_blend="multiply" shift_x="0" shift_y="0" shift_y_down="0" z_index="0" medium_width="0" mobile_width="0" width="1/2" mobile_height="360"][vc_single_image media="'. uncode_wf_print_single_image( '80471' ) .'" dynamic="yes" media_width_percent="100" media_ratio="one-one"][/vc_column][/vc_row][vc_row unlock_row_content="yes" row_height_percent="0" override_padding="yes" h_padding="0" top_padding="0" bottom_padding="0" overlay_alpha="50" equal_height="yes" gutter_size="0" column_width_percent="100" shift_y="0" z_index="0" shape_dividers=""][vc_column column_width_percent="100" gutter_size="3" override_padding="yes" column_padding="0" back_color="color-uydo" overlay_alpha="50" shift_x="0" shift_y="0" shift_y_down="0" z_index="0" medium_width="0" mobile_width="0" width="1/1"][vc_gallery el_id="gallery-1094992" type="carousel" medias="'. uncode_wf_print_multiple_images( array( 80471 ) ) .'" dynamic="yes" carousel_lg="4" carousel_md="2" carousel_sm="1" thumb_size="one-one" gutter_size="0" carousel_interval="0" carousel_navspeed="400" carousel_loop="yes" carousel_nav="yes" carousel_nav_mobile="yes" stage_padding="0" single_overlay_opacity="5" single_image_anim="no" single_padding="2" single_border="yes"][/vc_column][/vc_row][vc_row unlock_row_content="yes" row_height_percent="0" override_padding="yes" h_padding="0" top_padding="0" bottom_padding="0" back_color="color-wayh" overlay_alpha="50" equal_height="yes" gutter_size="0" shift_y="0"][vc_column column_width_percent="100" gutter_size="3" override_padding="yes" column_padding="4" style="dark" back_color="color-prif" overlay_alpha="50" shift_x="0" shift_y="0" shift_y_down="0" z_index="0" align_medium="align_center_tablet" medium_width="0" align_mobile="align_center_mobile" mobile_width="0" width="3/12"][vc_custom_heading heading_semantic="h3" text_size="'. uncode_wf_print_font_size( 'h1' ) .'"]Short headline[/vc_custom_heading][uncode_single_product_meta text_lead="small"][/vc_column][vc_column column_width_percent="100" position_vertical="middle" align_horizontal="align_center" gutter_size="3" override_padding="yes" column_padding="4" style="dark" back_image="'. uncode_wf_print_single_image( '83778' ) .'" overlay_alpha="50" shift_x="0" shift_y="0" shift_y_down="0" z_index="0" medium_width="0" mobile_width="0" width="3/12" mobile_height="280"][vc_icon icon="fa fa-play" background_style="fa-rounded" size="fa-3x" icon_automatic="yes" shadow="yes" media_lightbox="'. uncode_wf_print_single_image( '82424' ) .'"][/vc_icon][/vc_column][vc_column column_width_percent="100" gutter_size="3" override_padding="yes" column_padding="4" style="dark" back_color="color-rgdb" overlay_alpha="80" shift_x="0" shift_y="0" shift_y_down="0" z_index="0" align_medium="align_center_tablet" medium_width="0" align_mobile="align_center_mobile" mobile_width="0" width="6/12"][vc_custom_heading auto_text="excerpt" heading_semantic="h3" text_size="'. uncode_wf_print_font_size( 'h1' ) .'"]Change the color to match your brand or vision, add your logo, choose the perfect layout, modify menu settings, add animations, add shape dividers, increase engagement with call to action and more.[/vc_custom_heading][vc_row_inner limit_content=""][vc_column_inner column_width_percent="100" gutter_size="3" style="dark" overlay_alpha="50" shift_x="0" shift_y="0" z_index="0" align_medium="align_center_tablet" medium_width="0" align_mobile="align_center_mobile" width="1/1"][uncode_share layout="multiple" bigger="yes" no_back="yes"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row unlock_row_content="yes" row_height_percent="0" override_padding="yes" h_padding="0" top_padding="0" bottom_padding="0" overlay_alpha="50" equal_height="yes" gutter_size="0" column_width_percent="100" shift_y="0" z_index="0"][vc_column column_width_percent="100" gutter_size="3" override_padding="yes" column_padding="4" style="dark" back_color="color-rgdb" overlay_alpha="50" shift_x="0" shift_y="0" shift_y_down="0" z_index="0" medium_visibility="yes" medium_width="0" mobile_visibility="yes" mobile_width="0" width="3/12"][vc_custom_heading heading_semantic="h3" text_size="'. uncode_wf_print_font_size( 'h1' ) .'"]Related products[/vc_custom_heading][/vc_column][vc_column column_width_percent="100" gutter_size="3" override_padding="yes" column_padding="0" back_color="color-uydo" overlay_alpha="50" shift_x="0" shift_y="0" shift_y_down="0" z_index="0" medium_width="0" mobile_width="0" width="9/12"][uncode_index el_id="index-179371" index_type="carousel" loop="size:6|order_by:date|post_type:product" auto_query="yes" auto_query_type="related" carousel_lg="3" carousel_md="3" carousel_sm="1" thumb_size="four-five" gutter_size="0" product_items="title,media|featured|onpost|original|hide-sale|enhanced-atc|inherit-w-atc,price|inline" carousel_interval="0" carousel_navspeed="400" carousel_nav="yes" carousel_nav_mobile="yes" stage_padding="0" single_text="overlay" single_style="dark" single_overlay_opacity="15" single_overlay_anim="no" single_text_visible="yes" single_image_anim="no" single_h_align="center" single_v_position="bottom" single_padding="1" single_text_reduced="yes" single_title_dimension="h6" single_border="yes"][/vc_column][/vc_row]
';

// Check if this wireframe is for a content block
if ( $data[ 'is_content_block' ] && ! $is_content_block ) {
	$data[ 'custom_class' ] .= ' for-content-blocks';
}

// Check if this wireframe requires a plugin
foreach ( $data[ 'dependency' ]  as $dependency ) {
	if ( ! UNCDWF_Dynamic::has_dependency( $dependency ) ) {
		$data[ 'custom_class' ] .= ' has-dependency needs-' . $dependency;
	}
}

vc_add_default_templates( $data );