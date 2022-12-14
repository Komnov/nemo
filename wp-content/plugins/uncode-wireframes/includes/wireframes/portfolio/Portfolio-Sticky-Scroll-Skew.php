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

$data[ 'name' ]             = esc_html__( 'Portfolio Sticky Scroll Skew', 'uncode-wireframes' );
$data[ 'cat_name' ]         = $wireframe_categories[ 'portfolio' ];
$data[ 'custom_class' ]     = 'portfolio';
$data[ 'image_path' ]       = UNCDWF_THUMBS_URL . 'portfolio/Portfolio-Sticky-Scroll-Skew.jpg';
$data[ 'dependency' ]       = array();
$data[ 'is_content_block' ] = false;

// Wireframe content

$data[ 'content' ]      = '
[vc_row row_height_percent="100" override_padding="yes" h_padding="2" top_padding="5" bottom_padding="5" back_color="'. uncode_wf_print_color( 'color-nhtu' ) .'" overlay_alpha="50" gutter_size="3" column_width_percent="100" border_color="color-gyho" border_style="solid" shift_y="0" z_index="0" uncode_shortcode_id="691030" border_color_type="uncode-palette" css=".vc_custom_1646148150294{border-top-width: 1px !important;}" back_color_type="uncode-palette" el_class="demo-section demo-dark-background"][vc_column column_width_percent="100" position_vertical="middle" align_horizontal="align_center" gutter_size="3" style="dark" overlay_alpha="50" shift_x="0" shift_y="0" shift_y_down="0" z_index="0" medium_width="0" mobile_width="0" width="1/1" uncode_shortcode_id="173978"][uncode_index el_id="index-609963" index_type="sticky-scroll" sticky_wrap="column" loop="size:5|order_by:date|post_type:portfolio|taxonomy_count:10" sticky_thumb_size="fluid" sticky_th_grid_lg="1" sticky_th_grid_md="1" sticky_th_grid_sm="1" sticky_th_vh_lg="100" sticky_th_vh_md="100" sticky_th_vh_sm="100" gutter_size="4" sticky_scroll_v_align="middle" portfolio_items="media|featured|onpost|poster" single_text="overlay" single_overlay_opacity="50" single_overlay_anim="no" single_text_anim="no" single_image_magnetic="yes" single_h_align="center" single_padding="1" single_shadow="yes" shadow_weight="xl" shadow_darker="yes" single_border="yes" horizontal_th_size="grid" uncode_shortcode_id="166783"][/vc_column][/vc_row]
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
