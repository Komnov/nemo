<?php
/**
 * VC Uncode Index (Posts Module) Extend
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class uncode_index extends WPBakeryShortCode
{
	protected $filter_categories = array();
	protected $query = false;
	protected $loop_args = array();
	protected $taxonomies = false;
	protected $auto_query = false;
	protected $auto_query_type = 'default';
	protected $is_tax_query = false;
	protected $current_post_id = 0;

	function __construct($settings)
	{
		parent::__construct($settings);
	}

	protected function getFileName()
	{
		return 'uncode_index';
	}

	public function template($content = '')
	{
		return $this
			->contentAdmin($this->atts);
	}

	public function getCategoriesLink( $post_id ) {
		$categories_link = array();
		$args = array('orderby' => 'taxonomy', 'order' => 'DESC', 'fields' => 'all');
		$post_categories = wp_get_object_terms( $post_id, $this->getTaxonomies(), $args);
		foreach ( $post_categories as $cat ) {
			if (is_taxonomy_hierarchical($cat->taxonomy) && substr( $cat->taxonomy, 0, 3 ) !== 'pa_') {
				$categories_link[] = array('link' => '<a href="'.get_term_link($cat->term_id, $cat->taxonomy).'">'.$cat->name.'</a>', 'tax' => $cat->taxonomy, 'cat_id' => $cat->term_id);
			} else if ($cat->taxonomy === 'post_tag') {
				$categories_link[] = array('link' => '<a href="'.get_term_link($cat->term_id, $cat->taxonomy).'">'.$cat->name.'</a>', 'tax' => $cat->taxonomy, 'cat_id' => $cat->term_id);
			}
		}
		return $categories_link;
	}

	public function getCategoriesCss($post_id) {
		$categories_css = '';
		$categories_name = array();
		$tag_name = array();
		$categories_id = array();
		$taxonomy_type = array();
		$args = array('orderby' => 'taxonomy', 'order' => 'DESC', 'fields' => 'all');
		$post_categories = wp_get_object_terms($post_id, $this->getTaxonomies(), $args);
		foreach ($post_categories as $cat) {
			if (is_taxonomy_hierarchical($cat->taxonomy) && substr( $cat->taxonomy, 0, 3 ) !== 'pa_') {
				if (!in_array($cat->term_id, $this->filter_categories)) {
					$this->filter_categories[] = $cat->term_id;
				}
				if ($cat->taxonomy !== 'post_tag') $categories_css.= ' grid-cat-' . $cat->term_id;
				$categories_name[] = $cat->name;
				$categories_id[] = $cat->term_id;
			} else if ($cat->taxonomy === 'post_tag') {
				$categories_id[] = $cat->term_id;
				$categories_name[] = $cat->name;
				$tag_name[] = $cat->name;
			}
			$taxonomy_type[] = $cat->taxonomy;
		}

		return array('cat_css' => $categories_css, 'cat_name' => $categories_name, 'cat_id' => $categories_id, 'tag' => $tag_name, 'taxonomy' => $taxonomy_type );
	}
	protected function resetTaxonomies()
	{
		$this->taxonomies = false;
	}
	protected function getTaxonomies()
	{
		if ($this
			->taxonomies === false)
		{
			$this
				->taxonomies = get_object_taxonomies(!empty($this
				->loop_args['post_type']) ? $this->loop_args['post_type'] : get_post_types(array(
				'public' => false,
				'name' => 'attachment'
			) , 'names', 'NOT'));
		}

		return $this->taxonomies;
	}

	protected function getFilterCategories()
	{
		return get_terms($this
			->getTaxonomies() , array(
			'orderby' => 'name',
			'include' => implode(',', $this->filter_categories)
		));
	}

	protected function getPostContent()
	{
		remove_filter('the_content', 'wpautop');
		$content = str_replace(']]>', ']]&gt;', apply_filters('the_content', get_the_content()));
		return $content;
	}

	protected function getPostExcerpt()
	{
		remove_filter('the_excerpt', 'wpautop');
		$content = apply_filters('the_excerpt', get_the_excerpt());
		return $content;
	}

	public function buildWpQuery($query, $exclude_id = false, $offset = false)
	{
		$data = self::parseData($query);
		$data['auto_query'] = $this->auto_query;
		$data['auto_query_type'] = $this->auto_query_type;
		$data['is_tax_query'] = $this->is_tax_query;
		$data['tax_query_args'] = $data;
		$data['current_post_id'] = $this->current_post_id;
		$query_builder = new UncodeLoopQueryBuilder( $data );
		if ($exclude_id){
			$query_builder->excludeId($exclude_id);
		}
		return $query_builder->build($offset);
	}
	public function vc_build_loop_query($query, $exclude_id = false, $offset = false)
	{
		return self::buildWpQuery($query, $exclude_id, $offset);
	}
	protected function parseData($value)
	{
		if (is_array($value)) return $value;
		$data = array();
		$values_pairs = preg_split('/\|/', $value);
		foreach ($values_pairs as $pair)
		{
			if (!empty($pair))
			{
				list($key, $value) = preg_split('/\:/', $pair);
				$data[$key] = $value;
			}
		}
		return $data;
	}
	public function callGetLoop($loop)
	{
		$this->getLoop( $loop );
	}
	protected function getLoop($loop, $offset = false, $auto_query = false, $auto_query_type = 'default')
	{
		if ( $auto_query ) {
			$this->auto_query = true;

			if ( $auto_query_type ) {
				$this->auto_query_type = $auto_query_type;
			}
		}

		$this->is_tax_query = $this->is_tax_query( $loop );

		$data = self::parseData($loop);
		foreach ($data as $key => $value)
		{
			$method = 'parse_' . $key;
			if (method_exists($this, $method))
			{
				$this->$method($value);
			}
		}

		$exclude_post = ( is_single() || is_page() ) && ! is_front_page() ? get_the_ID() : '';
		$this->current_post_id = $exclude_post ? $exclude_post : 0;
		list($this->loop_args, $this->query) = $this->vc_build_loop_query($loop, $exclude_post, $offset);
	}

	public function is_tax_query( $loop ) {
		if ( function_exists( 'uncode_parse_loop_data' ) ) {
			$loop_data = uncode_parse_loop_data( $loop );

			if ( isset( $loop_data['taxonomy_query'] ) && $loop_data['taxonomy_query'] ) {
				return true;
			}
		}

		return false;
	}
}

require_once vc_path_dir('PARAMS_DIR', 'loop/loop.php');

class UncodeLoopQueryBuilder extends VcLoopQueryBuilder
{
	protected $is_top_rated = false;
	protected $wc_query = null;
	protected $auto_query = false;
	protected $auto_query_type = 'default';
	protected $is_tax_query = false;
	protected $tax_query_args = array();
	protected $current_post_id = 0;

	protected function parse_is_tax_query( $value )
	{
		$this->is_tax_query = $value ? $value : false;
	}

	protected function parse_tax_query_args( $args ) {
		if ( ! $this->is_tax_query ) {
			return $args;
		}

		$number = 10;

		if ( isset( $args['taxonomy_count'] ) ) {
			$number = $args['taxonomy_count'] === 'All' ? -1 : absint( $args['taxonomy_count'] );
		}

		$tax_args = array(
			'taxonomy'     => isset( $args['taxonomy_query'] ) ? $args['taxonomy_query'] : '',
			'order'        => isset( $args['taxonomy_sort'] ) ? $args['taxonomy_sort'] : 'ASC',
			'orderby'      => isset( $args['taxonomy_order'] ) ? $args['taxonomy_order'] : 'name',
			'number'       => $number,
			'hide_empty'   => isset( $args['taxonomy_show_empty'] ) && $args['taxonomy_show_empty'] === 'yes' ? false : true,
		);

		if ( isset( $args['taxonomy_hierarchical'] ) && $args['taxonomy_hierarchical'] === 'parents' ) {
			$tax_args['parent'] = 0;
		}

		if ( isset( $args['taxonomy_include_ids'] ) ) {
			$ids = explode( ',', trim( $args['taxonomy_include_ids'] ) );

			if ( is_array( $ids ) ) {
				$ids = array_map( 'absint', $ids );

				$tax_args['include'] = $ids;
			}
		}

		// Category Order and Taxonomy Terms Order
		if ( defined( 'TOPATH' ) ) {
			if ( $tax_args['orderby'] !== 'term_order' ) {
				$tax_args['ignore_term_order'] = true;
				remove_filter('terms_clauses', 'TO_apply_order_filter', 10, 3);
			}
		} else {
			if ( class_exists( 'WooCommerce' ) && $tax_args['taxonomy'] === 'product_cat' && $tax_args['orderby'] === 'term_order' ) {
				$tax_args['orderby'] = 'menu_order';
			}
		}

		$this->tax_query_args = $tax_args;
	}

	protected function parse_auto_query( $value )
	{
		$this->auto_query = $value ? $value : false;
	}

	protected function parse_auto_query_type( $value )
	{
		$this->auto_query_type = $value ? $value : 'default';
	}

	protected function parse_current_post_id( $value )
	{
		$this->current_post_id = $value ? $value : 0;
	}

	protected function parse_paged($value)
	{
		$this->args['paged'] = $value;
	}
	protected function parse_category($value)
	{
		global $wpdb;
		$term_query = $wpdb->get_row($wpdb->prepare("SELECT * FROM $wpdb->term_taxonomy WHERE term_id = %d",$value ));
		$term_type = $term_query->taxonomy;

		if ( empty( $this->args['tax_query'] ) ) {
			$this->args['tax_query'] = array(
				'relation' => 'AND'
			);
		} else {
			$this->args['tax_query']['relation'] = 'AND';
		}

		$this->args['tax_query'][] = array(
			'field' => 'term_id',
			'taxonomy' => $term_type,
			'terms' => $value,
			'operator' => 'IN'
		);
	}

	protected function parse_tax_query( $value ) {
		$terms = $this->stringToArray( $value );
		$negative_term_list = array();
		foreach ( $terms as $term ) {
			if ( (int) $term < 0 ) {
				$negative_term_list[] = abs( $term );
			}
		}

		$not_in = array();
		$in = array();

		$terms = get_terms( VcLoopSettings::getTaxonomies(),
			array( 'include' => array_map( 'abs', $terms ) ) );
		foreach ( $terms as $t ) {
			if ( in_array( (int) $t->term_id, $negative_term_list ) ) {
				$not_in[ $t->taxonomy ][] = $t->term_id;
			} else {
				$in[ $t->taxonomy ][] = $t->term_id;
			}
		}

		if ( empty( $this->args['tax_query'] ) ) {
			if ( empty( $not_in ) )//workaround to include and exclude custom tax at the same time (not compatible with multiple post types)
				$this->args['tax_query'] = array( 'relation' => 'OR' );
			else
				$this->args['tax_query'] = array( 'relation' => 'AND' );
		}

		foreach ( $in as $taxonomy => $terms ) {
			$this->args['tax_query'][] = array(
				'field' => 'term_id',
				'taxonomy' => $taxonomy,
				'terms' => $terms,
				'operator' => 'IN',
			);
		}
		foreach ( $not_in as $taxonomy => $terms ) {
			$this->args['tax_query'][] = array(
				'field' => 'term_id',
				'taxonomy' => $taxonomy,
				'terms' => $terms,
				'operator' => 'NOT IN',
			);
		}
	}

	protected function parse_order_ids( $value ) {
	}

	protected function parse_search($value) {
		$this->args['s'] = $value;
	}

	protected function parse_year($value)
	{
		$this->args['year'] = $value;
	}

	protected function parse_month($value)
	{
		$this->args['monthnum'] = $value;
	}

	protected function parse_day($value)
	{
		$this->args['day'] = $value;
	}

	protected function parse_product_type($value) {
		// Ensure that WC is installed
		if ( ! class_exists( 'WooCommerce' ) ) {
			return;
		}

		/**
		 * VERY IMPORTANT!
		 *
		 * WooCommerce caches the output of the products shortcode in a
		 * transient. So if there are inconsistences between the output of this
		 * module and the default WC shortcode remember to clear the cache
		 * of WC (just delete the transients "wc_product_loop_xxxxx").
		 * Then test again.
		 */
		switch ( $value ) {
			case 'on_sale':
				$this->args['post__in'] = wc_get_product_ids_on_sale();
				break;

			case 'featured':
				$this->args['tax_query'][] = array(
					'field' => 'name',
					'taxonomy' => 'product_visibility',
					'terms' => 'featured',
					'operator' => 'IN'
				);
				break;

			case 'best_selling':
				$this->args['meta_key'] = 'total_sales';
				$this->args['order']    = 'DESC';
				$this->args['orderby']  = 'meta_value_num';
				break;

			case 'top_rated':
				$this->is_top_rated = true;
				break;

			case 'cross_sells':
				$this->args['post__in'] = WC()->cart->get_cross_sells();
				break;
		}
	}

	/**
	 * @return array
	 */
	public function build($offset = false) {
		if ( $this->is_tax_query ) {
			$query = new WP_Term_Query( $this->tax_query_args );
			$result = array( $this->tax_query_args, $query );
		} else {
			$post_types = isset( $this->args[ 'post_type' ] ) ? $this->args[ 'post_type' ] : array();

			if ( isset( $this->args['category__in']) ) {
				$this->args['cat'] = $this->args['category__in'];
				unset($this->args['category__in']);
			}

			// Special auto query
			if ( $this->auto_query && $this->auto_query_type !== 'default' ) {
				$this->args = $this->get_special_auto_query_args( $this->args );
			} else {

				if ( class_exists( 'WooCommerce' ) && in_array( 'product', $post_types ) ) {
					if ( $this->auto_query && is_main_query() && ( is_shop() || is_product_category() || is_product_tag() ) ) {

						// WC shop page
						$this->args = $this->get_default_wc_order( $this->args );

					} else if ( isset( $_GET['orderby'] ) ) {

						// Normal page: if we have a custom order via GET, change it
						$orderby = wc_clean( (string) wp_unslash( $_GET['orderby'] ) );

						if ( $orderby ) {
							$wc_order_args = $this->get_wc_order_args( $orderby );

							$this->args['order']   = $wc_order_args['order'];
							$this->args['orderby'] = $wc_order_args['orderby'];
						}
					}
				}

				if ( class_exists( 'WooCommerce' ) ) {
					$has_special_clause = false;

					if ( isset( $this->args['orderby'] ) && ( $this->args['orderby'] === 'popularity' || $this->args['orderby'] === 'rating' || $this->args['orderby'] === 'price' ) ) {
						$has_special_clause = true;
					}

					if ( isset( $_GET['max_price'] ) || isset( $_GET['min_price'] ) ) {
						$has_special_clause = true;
					}

					if ( $has_special_clause && is_null( $this->wc_query ) ) {
						$this->wc_query = new WC_Query();
					}
				}

				if ( class_exists( 'WooCommerce' ) && in_array( 'product', $post_types ) ) {
					// Remove hidden products only when there are products in the query
					$terms_to_exclude = ( 'yes' === get_option( 'woocommerce_hide_out_of_stock_items' ) ) ? array( 'exclude-from-catalog', 'outofstock' ) : array( 'exclude-from-catalog' );

					$this->args[ 'tax_query' ][] = array(
						'taxonomy' => 'product_visibility',
						'field'    => 'name',
						'terms'    => $terms_to_exclude,
						'operator' => 'NOT IN'
					);

					$this->args[ 'tax_query' ]['relation'] = 'AND';
				}

				if ( class_exists( 'WooCommerce' ) && is_main_query() && ( is_shop() || is_product_category() || is_product_tag() ) ) {
					foreach ( WC_Query::get_layered_nav_chosen_attributes() as $taxonomy => $data ) {
						$this->args[ 'tax_query' ][] = array(
							'taxonomy'         => $taxonomy,
							'field'            => 'slug',
							'terms'            => $data['terms'],
							'operator'         => 'and' === $data['query_type'] ? 'AND' : 'IN',
							'include_children' => false,
						);
					}
				}

				if ($offset){
					$offset_args = $this->args;
					$offset_args['posts_per_page'] = $offset;
					$offset_args['paged'] = 1;

					if ( class_exists( 'WooCommerce' ) ) {
						$this->add_ordering_args();
					}

					$limit_posts = new WP_Query( $offset_args );

					if ( class_exists( 'WooCommerce' ) ) {
						$this->remove_ordering_args();
					}

					$this->add_cat_tax_order();

					$offset_array = array();
					foreach ($limit_posts->posts as $off_post) {
						$offset_array[] = $off_post->ID;
					}
					if (isset($this->args['post__not_in'])) {
						$this->args['post__not_in'] = array_merge($this->args['post__not_in'], $offset_array);
					} else $this->args['post__not_in'] = $offset_array;
				}

				if ( class_exists( 'WooCommerce' ) ) {
					$this->add_ordering_args();
				}
			}

			$query = new WP_Query( $this->args );

			if ( class_exists( 'WooCommerce' ) ) {
				$this->remove_ordering_args();
			}

			$this->add_cat_tax_order();

			$result = array( $this->args, $query );
		}

		return $result;
	}

	/**
	 * Add ordering queries.
	 */
	public function add_ordering_args() {
		if ( isset( $this->args['orderby'] ) ) {
			if ( $this->args['orderby'] === 'popularity' ) {
				add_filter( 'posts_clauses', array( $this->wc_query, 'order_by_popularity_post_clauses' ) );
			} else if ( $this->args['orderby'] === 'rating' ) {
				add_filter( 'posts_clauses', array( $this->wc_query, 'order_by_rating_post_clauses' ) );
			} else if ( $this->args['orderby'] === 'price' ) {
				$callback = isset( $this->args['order'] ) && 'DESC' === $this->args['order'] ? 'order_by_price_desc_post_clauses' : 'order_by_price_asc_post_clauses';
				add_filter( 'posts_clauses', array( $this->wc_query, $callback ) );
			} else if ( $this->is_top_rated ) {
				add_filter( 'posts_clauses', array( 'WC_Shortcode_Products', 'order_by_rating_post_clauses' ) );
			}
		}

		if ( isset( $_GET['max_price'] ) || isset( $_GET['min_price'] ) ) {
			add_filter( 'posts_clauses', array( $this, 'price_filter_post_clauses' ), 10, 2 );
		}
	}

	/**
	 * Remove ordering queries.
	 */
	public function remove_ordering_args() {
		remove_filter( 'posts_clauses', array( $this->wc_query, 'order_by_popularity_post_clauses' ) );
		remove_filter( 'posts_clauses', array( $this->wc_query, 'order_by_rating_post_clauses' ) );
		remove_filter( 'posts_clauses', array( $this->wc_query, 'order_by_price_desc_post_clauses' ) );
		remove_filter( 'posts_clauses', array( $this->wc_query, 'order_by_price_asc_post_clauses' ) );
		remove_filter( 'posts_clauses', array( 'WC_Shortcode_Products', 'order_by_rating_post_clauses' ) );
		remove_filter( 'posts_clauses', array( $this, 'price_filter_post_clauses' ) );
	}

	public function get_default_wc_order( $args ) {
		if ( is_search() ) {
			$orderby = 'relevance';
		} else if ( isset( $_GET['orderby'] ) ) {
			$orderby_value = wc_clean( (string) wp_unslash( $_GET['orderby'] ) );

			if ( ! $orderby_value ) {
				$orderby = apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby', 'menu_order' ) );
			} else {
				$orderby = $orderby_value;
			}
		} else {
			$orderby = apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby', 'menu_order' ) );
		}

		$wc_order_args = $this->get_wc_order_args( $orderby );

		$args['order']   = $wc_order_args['order'];
		$args['orderby'] = $wc_order_args['orderby'];

		return $args;
	}

	public function get_wc_order_args( $orderby ) {
		// Default ASC
		$args['order'] = 'ASC';

		switch ( $orderby ) {
			case 'menu_order':
				$args['orderby'] = 'menu_order title';
				break;

			case 'date':
				$args['orderby'] = 'date ID';
				$args['order']   = 'DESC';
				break;

			case 'popularity':
			case 'relevance':
			case 'rating':
				$args['orderby'] = $orderby;
				$args['order']   = 'DESC';
				break;

			case 'price':
				$args['orderby'] = $orderby;
				break;

			case 'price-desc':
				$args['orderby'] = 'price';
				$args['order']   = 'DESC';
				break;
		}

		return $args;
	}

	public function get_special_auto_query_args( $args ) {
		switch ( $this->auto_query_type ) {
			case 'related':
				$args = $this->get_related_posts_query_args( $args );
				break;

			case 'up-sells-products':
				$args = $this->get_upsells_products_query_args( $args );
				break;
		}

		return $args;
	}

	public function get_related_posts_query_args( $args ) {
		$ids = array();

		if ( function_exists( 'uncode_get_related_post_ids' ) ) {
			$per_page  = $args['posts_per_page'] ? $args['posts_per_page'] : 10;
			$post_type = get_post_type( $this->current_post_id );

			if ( ! $post_type || $post_type === 'uncodeblock' ) {
				return $args;
			}

			$ids = uncode_get_related_post_ids( $this->current_post_id, $per_page );

			if ( ! is_array( $ids ) ) {
				return $args;
			}

			// Pass found IDs
			if ( apply_filters( 'uncode_disable_random_posts_on_related', false ) && count( $ids ) < 1 ) {
				$args['post__in'] = array(0);
			} else {
				$args['post__in'] = $ids;
				$args['orderby']  = 'post__in';
			}

			$args['post_type'] = $post_type;
		}

		return $args;
	}

	public function get_upsells_products_query_args( $args ) {
		$post_type = get_post_type( $this->current_post_id );

		if ( ! $post_type || $post_type === 'uncodeblock' ) {
			return $args;
		}

		if ( function_exists( 'uncode_get_upsell_product_ids' ) && class_exists( 'WooCommerce' ) ) {
			// Force empty query when there are no upsells
			$args_no_products = array( 'post__in' => array(0) );

			// Get upsells
			$upsells_ids = uncode_get_upsell_product_ids( $this->current_post_id );
			$per_page    = $args['posts_per_page'] ? $args['posts_per_page'] : 10;

			if ( ! ( is_array( $upsells_ids ) && count( $upsells_ids ) > 0 ) ) {
				return $args_no_products;
			}

			$upsells_ids = $per_page > 0 ? array_slice( $upsells_ids, 0, $per_page ) : $upsells_ids;

			// Pass found IDs
			$args['post__in']  = $upsells_ids;
			$args['orderby']   = 'post__in';
			$args['post_type'] = 'product';
		}

		return $args;
	}

	/**
	 * Custom query used to filter products by price.
	 *
	 * (copy of WC_Query::append_product_sorting_table_join()
	 * without the ! $wp_query->is_main_query() check)
	 */
	public function price_filter_post_clauses( $args, $wp_query ) {
		global $wpdb;

		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( ( ! isset( $_GET['max_price'] ) && ! isset( $_GET['min_price'] ) ) ) {
			return $args;
		}

		// phpcs:disable WordPress.Security.NonceVerification.Recommended
		$current_min_price = isset( $_GET['min_price'] ) ? floatval( wp_unslash( $_GET['min_price'] ) ) : 0;
		$current_max_price = isset( $_GET['max_price'] ) ? floatval( wp_unslash( $_GET['max_price'] ) ) : PHP_INT_MAX;
		// phpcs:enable WordPress.Security.NonceVerification.Recommended

		/**
		 * Adjust if the store taxes are not displayed how they are stored.
		 * Kicks in when prices excluding tax are displayed including tax.
		 */
		if ( wc_tax_enabled() && 'incl' === get_option( 'woocommerce_tax_display_shop' ) && ! wc_prices_include_tax() ) {
			$tax_class = apply_filters( 'woocommerce_price_filter_widget_tax_class', '' ); // Uses standard tax class.
			$tax_rates = WC_Tax::get_rates( $tax_class );

			if ( $tax_rates ) {
				$current_min_price -= WC_Tax::get_tax_total( WC_Tax::calc_inclusive_tax( $current_min_price, $tax_rates ) );
				$current_max_price -= WC_Tax::get_tax_total( WC_Tax::calc_inclusive_tax( $current_max_price, $tax_rates ) );
			}
		}

		$args['join']   = $this->append_product_sorting_table_join( $args['join'] );
		$args['where'] .= $wpdb->prepare(
			' AND wc_product_meta_lookup.min_price >= %f AND wc_product_meta_lookup.max_price <= %f ',
			$current_min_price,
			$current_max_price
		);
		return $args;
	}

	/**
	 * Join wc_product_meta_lookup to posts if not already joined.
	 *
	 * (copy of WC_Query::append_product_sorting_table_join())
	 */
	private function append_product_sorting_table_join( $sql ) {
		global $wpdb;

		if ( ! strstr( $sql, 'wc_product_meta_lookup' ) ) {
			$sql .= " LEFT JOIN {$wpdb->wc_product_meta_lookup} wc_product_meta_lookup ON $wpdb->posts.ID = wc_product_meta_lookup.product_id ";
		}
		return $sql;
	}

	/**
	 * Add again "Category Order and Taxonomy Terms Order" filter
	 */
	private function add_cat_tax_order() {
		if ( defined( 'TOPATH' ) ) {
			add_filter('terms_clauses', 'TO_apply_order_filter', 10, 3);
		}
	}
}
