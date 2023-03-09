<?php
/**
 * Variations related functions
 */

/**
 * Register scripts
 */
function uncode_wc_variations_add_scripts() {
	$scripts_prod_conf = uncode_get_scripts_production_conf();
	$resources_version = $scripts_prod_conf[ 'resources_version' ];
	$suffix            = $scripts_prod_conf[ 'suffix' ];

	wp_register_script( 'uncode-woocommerce-variations', get_template_directory_uri() . '/library/js/woocommerce-variations' . $suffix . '.js', array( 'jquery' ) , $resources_version, true );
}
add_action( 'wp_enqueue_scripts', 'uncode_wc_variations_add_scripts' );

/**
 * Enqueue scripts
 */
function uncode_wc_enqueue_variations_scripts() {
	wp_enqueue_script( 'imagesloaded' );
	wp_enqueue_script( 'uncode-woocommerce-variations' );
}
add_action( 'woocommerce_before_add_to_cart_form', 'uncode_wc_enqueue_variations_scripts' );
add_action( 'uncode_entry_wc_before_single_attribute_selector', 'uncode_wc_enqueue_variations_scripts' );
add_action( 'uncode_quick_view_custom_style_scripts', 'uncode_wc_enqueue_variations_scripts' );

/**
 * Ajax add to cart for varations
 */
function uncode_wc_variations_add_to_cart() {
	// Notices
	ob_start();
	wc_print_notices();
	$notices = ob_get_clean();

	ob_start();
	woocommerce_mini_cart();
	$mini_cart = ob_get_clean();

	$data = array(
		'notices'   => $notices,
		'fragments' => apply_filters(
			'woocommerce_add_to_cart_fragments',
			array(
				'div.widget_shopping_cart_content' => '<div class="widget_shopping_cart_content">' . $mini_cart . '</div>',
			)
		),
		'cart_hash' => apply_filters( 'woocommerce_add_to_cart_hash', WC()->cart->get_cart_for_session() ? md5( json_encode( WC()->cart->get_cart_for_session() ) ) : '', WC()->cart->get_cart_for_session() ),
	);

	wp_send_json( $data );
	die();
}
add_action( 'wp_ajax_uncode_ajax_add_to_cart', 'uncode_wc_variations_add_to_cart' );
add_action( 'wp_ajax_nopriv_uncode_ajax_add_to_cart', 'uncode_wc_variations_add_to_cart' );

/**
 * Append JSON data to the image for variations (Dynamic SRCSET)
 */
function uncode_wc_variations_add_srcset_json( $async_data, $type, $block_data, $dynamic_srcset_sizes, $id, $media_attributes, $resized_image, $orig_w, $orig_h, $single_w, $single_h, $crop, $fixed = null ) {
	$layout = isset( $block_data['layout'] ) ? $block_data['layout'] : array();
	if ( isset( $layout['variations'] ) && $layout['variations'] &&  isset( $block_data['id'] ) && $block_data['id'] && isset( $block_data['product'] ) && $block_data['product'] ) {
		$product = wc_get_product( $block_data['id'] );

		if ( $product && $product->is_type( 'variable' ) ) {
			$json_data            = array();
			$available_variations = $product->get_available_variations();

			foreach ( $available_variations as $variation ) {
				if ( isset( $variation['image_id'] ) && $variation['image_id'] ) {
					$variation_image_id         = $variation['image_id'];
					$variation_media_attributes = uncode_get_media_info( $variation_image_id );
					$variation_media_metavalues = unserialize($variation_media_attributes->metadata);
					$image_orig_w               = isset( $variation_media_metavalues['width'] ) ? $variation_media_metavalues['width'] : $orig_w;
					$image_orig_h               = isset( $variation_media_metavalues['height'] ) ? $variation_media_metavalues['height'] : $orig_h;
					$variation_resized_image    = uncode_resize_image( $variation_media_attributes->id, $variation_media_attributes->guid, $variation_media_attributes->path, $image_orig_w, $image_orig_h, $single_w, $single_h, $crop, $fixed );

					if ( $type === 'srcset' ) {
						// Dynamic SRCSET
						$image_orig_w__ = isset( $variation_resized_image['width'] ) ? $variation_resized_image['width'] : $image_orig_w;
						$image_orig_h__ = isset( $variation_resized_image['height'] ) ? $variation_resized_image['height'] : $image_orig_h;

						$adaptive_async_data_all = uncode_get_srcset_async_data( $block_data, $dynamic_srcset_sizes, $variation_image_id, $variation_media_attributes, $variation_resized_image, $image_orig_w__, $image_orig_h__, $single_w, $single_h, $crop, $fixed );

						// Strip unneeded data
						unset( $adaptive_async_data_all['srcset_placeholder'] );
						unset( $adaptive_async_data_all['string_without_srcset'] );
						unset( $adaptive_async_data_all['string'] );

						// Add URL
						$adaptive_async_data_all['src'] = $variation_resized_image['url'];
						$adaptive_async_data_all['orig_w'] = $image_orig_w;
						$adaptive_async_data_all['orig_h'] = $image_orig_h;

						// Build JSON
						$json_data[$variation_image_id] = $adaptive_async_data_all;
					} else if ( $type === 'ai' ) {
						// Adaptive images with async off (or adaptive images off)
						$variation_srcset = wp_get_attachment_image_srcset( $variation_image_id, array( $variation_resized_image['width'], $variation_resized_image['height'] ) );

						$json_data[$variation_image_id] = array(
							'src'    => $variation_resized_image['url'],
							'srcset' => $variation_srcset,
							'width'  => $variation_resized_image['width'],
							'height' => $variation_resized_image['height'],
							'alt'    => isset( $variation_media_attributes->alt ) ? $variation_media_attributes->alt : '',
						);
					} else if ( $type === 'ai_async' ) {
						$json_data[$variation_image_id] = array(
							'src'         => $variation_resized_image['url'],
							'width'       => $variation_resized_image['width'],
							'height'      => $variation_resized_image['height'],
							'alt'         => isset( $variation_media_attributes->alt ) ? $variation_media_attributes->alt : '',
							'singlew'     => $variation_resized_image['single_width'],
							'singleh'     => $variation_resized_image['single_height'],
							'uniqueid'    => $variation_image_id . '-' . uncode_big_rand(),
							'guid'        => is_array( $variation_media_attributes->guid ) ? $variation_media_attributes->guid['url'] : $variation_media_attributes->guid,
							'path'        => $variation_media_attributes->path,
							'data-width'  => $image_orig_w,
							'data-height' => $image_orig_h,
							'crop'        => $crop,
						);
					}
				}
			}

			if ( count( $json_data ) > 0 ) {
				$variations_json = wp_json_encode( $json_data );
				$variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );

				if ( $type === 'srcset' ) {
					$async_data['string'] .= ' data-product_variations="' . $variations_attr . '"';
					$async_data['product_variations'] = $json_data;
				} else if ( $type === 'ai' || $type === 'ai_async' ) {
					$async_data .= ' data-product_variations="' . $variations_attr . '"';
				}
			}
		}
	}

	return $async_data;
}
add_filter( 'uncode_adaptive_get_async_data', 'uncode_wc_variations_add_srcset_json', 10, 12 );

/**
 * Get taxonomy properties by name
 */
function uncode_wc_get_taxonomy_props( $taxonomy ) {
	$props                = array();
	$tax_id               = wc_attribute_taxonomy_id_by_name( $taxonomy );
	$attribute_taxonomies = wc_get_attribute_taxonomies();

	if ( $attribute_taxonomies ) {
		foreach ( $attribute_taxonomies as $tax ) {
			if ( isset( $tax->attribute_id ) && absint( $tax->attribute_id ) === $tax_id ) {
				return $tax;
			}
		}
	}

	return $props;
}

/**
 * Print single attribute (select or swatch)
 */
function uncode_wc_print_single_attribute( $product, $attribute_name, $options, $available_variations, $limit ) {
	$swatches     = uncode_wc_get_attribute_swatches( $product->get_id(), $attribute_name, $options, $available_variations );
	$has_swatches = is_array( $swatches ) && count( $swatches ) > 0 ? true : false;

	if ( $has_swatches ) {
		uncode_wc_print_swatches( $product, $swatches, $attribute_name, $options, $available_variations, $limit, true );
	} else {
		wc_dropdown_variation_attribute_options( array( 'id' => $attribute_name . '-' . rand(), 'options' => $options, 'attribute' => $attribute_name, 'product' => $product, 'available_variations' => $available_variations ) );
	}
}

/**
 * Add data to the attribute dropdown (when showing a single attribute and it is a select)
 */
function uncode_wc_dropdown_variation_attribute_options_html( $html, $args ) {
	if ( isset( $args['available_variations'] ) && isset( $args['attribute'] ) ) {
		if ( is_array( $args['options'] ) ) {
			foreach ( $args['options'] as $option ) {
				$data_variation     = '';
				$selected_variation = uncode_wc_get_selected_variation_for_attr( $args['attribute'], $option, $args['available_variations'] );
				if ( is_array( $selected_variation ) ) {
					$variation_json = wp_json_encode( $selected_variation );
					$variation_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variation_json ) : _wp_specialchars( $variation_json, ENT_QUOTES, 'UTF-8', true );
					$data_variation = ' data-variation="' . $variation_attr . '"';
				}
				$html = str_replace( '<option value="' . $option . '"', '<option' . $data_variation . ' value="' . $option . '"', $html );
			}
		}
	}

	return $html;
}
add_filter( 'woocommerce_dropdown_variation_attribute_options_html', 'uncode_wc_dropdown_variation_attribute_options_html', 10, 2 );

/**
 * Add class to product div when has variation's gallery
 */
function uncode_wc_product_class( $classes, $class = '', $post_id = 0 ) {
	if ( ot_get_option( '_uncode_woocommerce_default_product_gallery' ) === 'on' ) {
		return $classes;
	}

	if ( ! apply_filters( 'uncode_woocommerce_use_variation_galleries', true ) ) {
		return $classes;
	}

	if ( function_exists( 'vc_is_page_editable' ) && vc_is_page_editable() ) {
		return $classes;
	}

	if ( ! $post_id || ! in_array( get_post_type( $post_id ), array( 'product', 'product_variation' ), true ) ) {
		return $classes;
	}

	if ( ot_get_option( '_uncode_woocommerce_catalog_mode' ) === 'on' && ot_get_option( '_uncode_woocommerce_catalog_mode_show_variations' ) !== 'on' ) {
		return $classes;
	}

	$product = wc_get_product( $post_id );

	if ( $product && $product->is_type( 'variable' ) ) {
		$has_variation_gallery = get_post_meta( $post_id, 'has_variation_gallery', true );

		if ( empty( $has_variation_gallery ) ) {
			$available_variations = $product->get_available_variations();

			foreach ( $available_variations as $variation ) {
				$variation_id          = $variation['variation_id'];
				$variation_gallery_ids = uncode_wc_get_variation_gallery_ids( $variation_id );

				if ( is_array( $variation_gallery_ids ) && count( $variation_gallery_ids ) > 0 ) {
					$classes[] = 'woocommerce-product-gallery--with-variation-gallery product-gallery-placeholder';

					update_post_meta( $post_id, 'has_variation_gallery', 1 );

					return $classes;
				}
			}

			update_post_meta( $post_id, 'has_variation_gallery', 0 );
		} else if ( $has_variation_gallery === '1' ) {
			$classes[] = 'woocommerce-product-gallery--with-variation-gallery product-gallery-placeholder';
		}
	}

	return $classes;
}
add_filter( 'post_class', 'uncode_wc_product_class', 20, 3 );

/**
 * Add class to page header div when has variation's gallery
 */
function uncode_wc_page_header_product_class( $classes, $post_id = 0, $product = null ) {
	if ( ot_get_option( '_uncode_woocommerce_default_product_gallery' ) === 'on' ) {
		return $classes;
	}

	if ( ! apply_filters( 'uncode_woocommerce_use_variation_galleries', true ) ) {
		return $classes;
	}

	if ( function_exists( 'vc_is_page_editable' ) && vc_is_page_editable() ) {
		return $classes;
	}

	if ( ot_get_option( '_uncode_woocommerce_catalog_mode' ) === 'on' && ot_get_option( '_uncode_woocommerce_catalog_mode_show_variations' ) !== 'on' ) {
		return $classes;
	}

	if ( ! $post_id ) {
		return $classes;
	}

	if ( $product && $product->is_type( 'variable' ) ) {
		$has_variation_gallery = get_post_meta( $post_id, 'has_variation_gallery', true );

		if ( empty( $has_variation_gallery ) ) {
			$available_variations = $product->get_available_variations();

			foreach ( $available_variations as $variation ) {
				$variation_id          = $variation['variation_id'];
				$variation_gallery_ids = uncode_wc_get_variation_gallery_ids( $variation_id );

				if ( is_array( $variation_gallery_ids ) && count( $variation_gallery_ids ) > 0 ) {
					$classes[] = 'woocommerce-product-gallery--with-variation-gallery';
					$classes[] = 'product-gallery-placeholder';

					update_post_meta( $post_id, 'has_variation_gallery', 1 );

					return $classes;
				}
			}

			update_post_meta( $post_id, 'has_variation_gallery', 0 );
		} else if ( $has_variation_gallery === '1' ) {
			$classes[] = 'woocommerce-product-gallery--with-variation-gallery product-gallery-placeholder';
		}
	}

	return $classes;
}
add_filter( 'uncode_page_header_product_class', 'uncode_wc_page_header_product_class', 10, 3 );

/**
 * Get first avaialble variation for a specific attribute value
 */
function uncode_wc_get_selected_variation_for_attr( $attribute_name, $attribute_value, $available_variations ) {
	if ( is_array( $available_variations ) ) {
		foreach ( $available_variations as $variation ) {
			if ( isset( $variation['attributes'] ) ) {
				$variation_attributes = $variation['attributes'];

				if ( is_array( $variation_attributes ) && isset( $variation_attributes['attribute_' . $attribute_name] ) && $variation_attributes['attribute_' . $attribute_name] === $attribute_value ) {
					return $variation;
				}
			}
		}
	}

	return array();
}

/**
 * Print variations element in posts modules
 */
function uncode_wc_print_variations_element( $product, $options, $single_text, $has_add_to_cart_overlay = false ) {
	$output = '';

	if ( $product->is_type( 'variable' ) ) {
		$variations_wrapper_class = $has_add_to_cart_overlay ? 'single-attribute-selector--shift' : '';

		if ( isset( $options[0] ) && $options[0] === 'over_visible' ) {
			$variations_wrapper_class .= ' single-attribute-selector--over-visible';
		}

		if ( isset( $options[4] ) && $options[4] === 'dynamic_title' ) {
			$variations_wrapper_class .= ' single-attribute-selector--dynamic-title';
		}

		if ( isset( $options[5] ) ) {
			if ( $options[5] === 'size_regular' ) {
				$variations_wrapper_class .= ' swatch-size-regular';
			} else if ( $options[5] === 'size_small' ) {
				$variations_wrapper_class .= ' swatch-size-small';
			}
		}

		if ( isset( $options[6] ) ) {
			if ( $options[6] === 'tablet' ) {
				$variations_wrapper_class .= ' mobile-hidden';
			} else if ( $options[6] === 'desktop' ) {
				$variations_wrapper_class .= ' mobile-hidden tablet-hidden';
			}
		}

		if ( isset( $options[1] ) && $options[1] !== '_all' ) {
			$selected_variation   = $options[1];
			$variations_limit     = isset( $options[2] ) && $options[2] ? absint( $options[2] ) : 0;
			$available_variations = $product->get_available_variations();
			$attributes           = $product->get_variation_attributes();

			if ( isset( $options[3] ) && $options[3] === 'hover' ) {
				$variations_wrapper_class .= ' single-attribute-selector--hover';
			}

			foreach ( $attributes as $attribute_name => $attribute_options ) {
				if ( $attribute_name === $selected_variation ) {
					ob_start();
					do_action( 'uncode_entry_wc_before_single_attribute_selector' );
					uncode_wc_print_single_attribute( $product, $attribute_name, $attribute_options, $available_variations, $variations_limit );
					$variations_output = ob_get_clean();

					if ( $variations_output ) {
						$variations_wrapper_class .= $single_text === 'overlay' ? ' t-entry-meta t-entry-variations single-attribute-selector' : ' t-entry-variations single-attribute-selector';
						$output .= '<div class="' . $variations_wrapper_class . '">' . $variations_output . '</div>';
					}

					break;
				}
			}

		} else {
			ob_start();
			woocommerce_variable_add_to_cart();
			$variable_form_html = ob_get_clean();

			if ( $variable_form_html ) {
				$variations_wrapper_class .= $single_text === 'overlay' ? ' t-entry-meta t-entry-variations' : ' t-entry-variations';
				$output .= '<div class="' . $variations_wrapper_class . '">' . $variable_form_html . '</div>';
			}
		}
	}

	return $output;
}

/**
 * Calculate the default selected attribute
 */
function uncode_wc_get_default_selected_attribute( $attribute_name, $default_selected ) {
	$selected     = false;
	$selected_key = 'attribute_' . sanitize_title( $attribute_name );
	$selected     = isset( $_REQUEST[ $selected_key ] ) ? wc_clean( wp_unslash( $_REQUEST[ $selected_key ] ) ) : $default_selected;

	if ( uncode_is_quick_view() && isset( $_REQUEST['post_url'] ) ) {
		$qw_product_url = $_REQUEST['post_url'];

		if ( $qw_product_url ) {
			$qw_product_url_attributes = parse_url( $qw_product_url, PHP_URL_QUERY );

			if ( $qw_product_url_attributes ) {
				parse_str( $qw_product_url_attributes, $qw_selected_attributes );

				$selected = isset( $qw_selected_attributes[ $selected_key ] ) ? wc_clean( wp_unslash( $qw_selected_attributes[ $selected_key ] ) ) : $selected;

			}
		}
	}

	return $selected;
}

/**
 * Print atribute image element in posts modules
 */
function uncode_wc_print_attribute_image_element( $product, $options ) {
	$output      = '';
	$product_att = $options[0];
	$tax_props   = uncode_wc_get_taxonomy_props( $product_att );

	if ( isset( $tax_props->attribute_type ) && $tax_props->attribute_type === 'image' ) {
		$att_terms      = wc_get_product_terms( $product->get_id(), $product_att );
		$t_entry_class  = count( $att_terms ) > 0 ? ' t-entry-attribute-image--multiple' : '';
		$t_entry_class .= isset( $options[1] ) && $options[1] === 'border_no' ? ' no-border' : '';

		$output .= '<div class="t-entry-attribute-image'. $t_entry_class . '">';

		foreach ( $att_terms as $term ) {
			$thumbnail_id   = absint( get_term_meta( $term->term_id, 'uncode_pa_thumbnail_id', true ) );
			$thumbnail_id   = $thumbnail_id ? $thumbnail_id : false;
			$image_size     = uncode_wc_get_image_swatch_size( $product_att );
			$thumbnail_size = $image_size === 'regular' ? 'uncode_woocommerce_nav_thumbnail_regular' : 'uncode_woocommerce_nav_thumbnail_crop';
			$image          = $thumbnail_id ? wp_get_attachment_image( $thumbnail_id, $thumbnail_size ) : wc_placeholder_img( $thumbnail_size );
			$output        .= $image;
		}

		$output .= '</div>';

	}

	return $output;
}
