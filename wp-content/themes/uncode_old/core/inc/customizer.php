<?php

/**
 * uncode Theme Customizer
 *
 * @package uncode
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function uncode_customize_register($wp_customize)
{
	$wp_customize->get_setting('blogname')->transport = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
}
add_action('customize_register', 'uncode_customize_register');

function uncode_custom_excerpt_length($length)
{
	return 20;
}
add_filter('excerpt_length', 'uncode_custom_excerpt_length', 999);

function uncode_wpcf7_ajax_loader() {
	return get_template_directory_uri() . '/library/img/fading-squares.gif';
}

add_filter( 'wpcf7_ajax_loader', 'uncode_wpcf7_ajax_loader', 10 );

add_filter( 'rp4wp_append_content', '__return_false' );

function uncode_the_content($the_content) {

	$oembed = new WP_Embed();
	$the_content = $oembed->autoembed($the_content);
	$the_content = wptexturize($the_content);
	$the_content = convert_smilies($the_content);
	$the_content = convert_chars($the_content);
	$the_content = wpautop($the_content);
	$the_content = shortcode_unautop($the_content);
	$the_content = do_shortcode($the_content);
	return $the_content;
}

function uncode_remove_p_tag( $content, $autop = false ) {

	if ( $autop ) {
		$content = wpautop( preg_replace( '/<\/?p\>/', "\n", $content ) . "\n" );
	}
	$content = do_shortcode( shortcode_unautop( $content ) );
	$content = preg_replace('/<p[^>]*>\[vc_row(.*?)\/vc_row]<\/p>/', '[vc_row$1/vc_row]', $content);
	$content = preg_replace('/<p[^>]*><div/', '<div', $content);
	$content = preg_replace('/\/div><\/p>/', '/div>', $content);
	$content = preg_replace('|<p><!--(.*?)--></p>|', '<!--$1-->', $content);
	$content = preg_replace('/<p><\/p>/', '', $content);

	if ( function_exists( 'wp_filter_content_tags' ) ) {
		$content = wp_filter_content_tags( $content );
	}

	return $content;
}

add_filter('wpseo_sitemap_urlimages', 'uncode_add_images_yoast_sitemap', NULL, 2);
function uncode_add_images_yoast_sitemap($images, $post_id) {

	$post = get_post($post_id);
	$content = $post->post_content;

	$image_ids = array();

	//Find uncode_index occurences and match IDs inside them
	preg_match_all( '/\[uncode_index ([^\]]*)by_id:(.*?)[\||"]/', $content, $uncode_index );

	if ( isset( $uncode_index[2] ) && !empty($uncode_index[2]) ) { //If "by_id" values exist
		$uncode_index_ids = $uncode_index[2];
	    foreach ( $uncode_index_ids as $uncode_index_ids_occurence ) {
	    	$uncode_index_ids_occurence_list = explode(',',$uncode_index_ids_occurence);

	    	foreach ($uncode_index_ids_occurence_list as $uncode_index_id) {
	            $thumb_id_here = get_post_thumbnail_id($uncode_index_id);//Get featured image IDs from post ID
	            if ( $thumb_id_here !== ''  && $thumb_id_here != 0 ) {
		            $image_ids[] = $thumb_id_here; //Store featured image ID
	            }
	    	}
	    }
	}

	//Find vc_single_image occurences and match IDs inside them
	preg_match_all( '/\[vc_single_image([^\]]*) media="(.*?)"/', $content, $vc_single_image );

	if ( isset( $vc_single_image[2] ) && !empty($vc_single_image[2]) ) { //If "media" values exist
		$vc_single_image_ids = $vc_single_image[2];
	    foreach ( $vc_single_image_ids as $vc_single_image_ids_occurence ) {
            $image_ids[] = $vc_single_image_ids_occurence; //Store single image ID
	    }
	}

	//Find vc_gallery occurences and match IDs inside them
	preg_match_all( '/\[vc_gallery([^\]]*) medias="(.*?)"/', $content, $vc_gallery );

	if ( isset( $vc_gallery[2] ) && !empty($vc_gallery[2]) ) { //If "medias" values exist
		$vc_gallery_ids = $vc_gallery[2];
	    foreach ( $vc_gallery_ids as $vc_gallery_ids_occurence ) {
	    	$vc_gallery_ids_occurence_list = explode(',',$vc_gallery_ids_occurence);

	    	foreach ($vc_gallery_ids_occurence_list as $vc_gallery_id) {
	            $image_ids[] = $vc_gallery_id; //Store image ID
	    	}
	    }
	}

	$media = get_post_meta($post->ID, '_uncode_featured_media', 1);
	if ($media !== '') {
		$image_ids = array_merge($image_ids, explode(',', $media));
	}


    foreach ( $image_ids as $image_id ) { //Populate an array with URLs taken from featured image IDs
    	$image_url = wp_get_attachment_image_src($image_id, 'large');
    	$image_title = get_the_title($image_id);
    	$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true);
    	$new_data_img = array( 'src' => $image_url[0], 'title' => esc_html($image_title), 'alt' => $image_alt );
    	$images[] = $new_data_img;
    }

	return $images;

}

add_filter('rank_math/sitemap/urlimages', 'uncode_add_images_rank_math_sitemap', NULL, 2);
function uncode_add_images_rank_math_sitemap($images, $post_id) {

	$post = get_post($post_id);
	$content = $post->post_content;

	$image_ids = array();

	//Find uncode_index occurences and match IDs inside them
	preg_match_all( '/\[uncode_index ([^\]]*)by_id:(.*?)[\||"]/', $content, $uncode_index );

	if ( isset( $uncode_index[2] ) && !empty($uncode_index[2]) ) { //If "by_id" values exist
		$uncode_index_ids = $uncode_index[2];
			foreach ( $uncode_index_ids as $uncode_index_ids_occurence ) {
				$uncode_index_ids_occurence_list = explode(',',$uncode_index_ids_occurence);

				foreach ($uncode_index_ids_occurence_list as $uncode_index_id) {
							$thumb_id_here = get_post_thumbnail_id($uncode_index_id);//Get featured image IDs from post ID
							if ( $thumb_id_here !== ''  && $thumb_id_here != 0 ) {
								$image_ids[] = $thumb_id_here; //Store featured image ID
							}
				}
			}
	}

	//Find vc_single_image occurences and match IDs inside them
	preg_match_all( '/\[vc_single_image([^\]]*) media="(.*?)"/', $content, $vc_single_image );

	if ( isset( $vc_single_image[2] ) && !empty($vc_single_image[2]) ) { //If "media" values exist
		$vc_single_image_ids = $vc_single_image[2];
			foreach ( $vc_single_image_ids as $vc_single_image_ids_occurence ) {
						$image_ids[] = $vc_single_image_ids_occurence; //Store single image ID
			}
	}

	//Find vc_gallery occurences and match IDs inside them
	preg_match_all( '/\[vc_gallery([^\]]*) medias="(.*?)"/', $content, $vc_gallery );

	if ( isset( $vc_gallery[2] ) && !empty($vc_gallery[2]) ) { //If "medias" values exist
		$vc_gallery_ids = $vc_gallery[2];
			foreach ( $vc_gallery_ids as $vc_gallery_ids_occurence ) {
				$vc_gallery_ids_occurence_list = explode(',',$vc_gallery_ids_occurence);

				foreach ($vc_gallery_ids_occurence_list as $vc_gallery_id) {
							$image_ids[] = $vc_gallery_id; //Store image ID
				}
			}
	}

	$media = get_post_meta($post->ID, '_uncode_featured_media', 1);
	if ($media !== '') {
		$image_ids = array_merge($image_ids, explode(',', $media));
	}

		foreach ( $image_ids as $image_id ) { //Populate an array with URLs taken from featured image IDs
			$image_url = wp_get_attachment_image_src($image_id, 'large');
			$image_title = get_the_title($image_id);
			$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true);
			$new_data_img = array( 'src' => $image_url[0], 'title' => esc_html($image_title), 'alt' => $image_alt );
			$images[] = $new_data_img;
		}

	return $images;

}

/**
 * Additional filter to disable default WP filter `wp_lazy_loading_enabled`
 *
 * @since Uncode 2.2.8.2
 */
add_filter( 'wp_lazy_loading_enabled', 'uncode_lazy_loading_enabled' );
if ( ! function_exists( 'uncode_lazy_loading_enabled' ) ) :
	function uncode_lazy_loading_enabled(){
		return apply_filters( 'uncode_lazy_loading_enabled', false );
	}
endif;
