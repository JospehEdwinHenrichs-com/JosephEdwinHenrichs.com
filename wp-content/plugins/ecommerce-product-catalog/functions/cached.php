<?php

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Manages wordpress core fields
 *
 * Here all wordpress fields are redefined.
 *
 * @version        1.0.0
 * @package        ecommerce-product-catalog/functions
 * @author        impleCode
 */
function ic_catalog_get_categories( $parent = 0, $taxonomy = '', $number = '' ) {
	if ( empty( $taxonomy ) ) {
		$taxonomy = get_current_screen_tax();
	}
	$key	 = 'get_product_categories' . $parent . $taxonomy . $number;
	$cached	 = wp_cache_get( $key, 'implecode' );
	if ( false !== $cached ) {
		return $cached;
	}
	$terms = array_values( get_terms( array( 'taxonomy' => $taxonomy, 'parent' => $parent, 'number' => $number ) ) );
	if ( !empty( $key ) ) {
		wp_cache_set( $key, $terms, 'implecode' );
	}
	return $terms;
}

function ic_catalog_get_current_categories( $taxonomy = '', $args = null ) {
	if ( empty( $taxonomy ) ) {
		$taxonomy = get_current_screen_tax();
	}
	$key	 = 'get_current_product_categories' . $taxonomy;
	$cached	 = wp_cache_get( $key, 'implecode' );
	if ( false !== $cached ) {
		return $cached;
	}
	$post_ids = ic_get_current_products();
	if ( $post_ids === 'all' ) {
		$all_term_args = array( 'taxonomy' => $taxonomy, 'parent' => 0 );
		if ( !empty( $args ) ) {
			$all_term_args = array_merge( $args, $all_term_args );
		}
		$terms = get_terms( $all_term_args );
	} else {
		$terms = wp_get_object_terms( $post_ids, $taxonomy, $args );
	}
	if ( !empty( $key ) ) {
		wp_cache_set( $key, $terms, 'implecode' );
	}
	return $terms;
}

/**
 * Returns category product count with product in child categories
 *
 * @param type $cat_id
 * @return type
 */
function total_product_category_count( $cat_id, $taxonomy = null, $post_in = null ) {
	if ( empty( $taxonomy ) ) {
		$taxonomy = get_current_screen_tax();
	}
	if ( empty( $post_in ) ) {
		$cache_key	 = 'category_count' . $cat_id . $taxonomy;
		$cached		 = wp_cache_get( $cache_key, 'implecode' );
		if ( false !== $cached ) {
			return $cached;
		}
	}
	$query_args = apply_filters( 'category_count_query', array(
		//'nopaging'	 => true,
		'posts_per_page' => 1,
		'tax_query'		 => array(
			array(
				'taxonomy'			 => $taxonomy,
				'terms'				 => $cat_id,
				'include_children'	 => true,
			),
		),
		'fields'		 => 'ids',
	), $taxonomy );
	if ( $post_in ) {
		$query_args[ 'post__in' ] = $post_in;
	}
	if ( isset( $_GET[ 's' ] ) ) {
		$query_args[ 's' ] = $_GET[ 's' ];
	}
	remove_action( 'pre_get_posts', 'ic_pre_get_products', 99 );
	$q = apply_filters( 'ic_catalog_category_count_query', '', $query_args );
	if ( empty( $q ) ) {
		$q = new WP_Query( $query_args );
	}
	add_action( 'pre_get_posts', 'ic_pre_get_products', 99 );
	$count = $q->found_posts;
	if ( !empty( $cache_key ) ) {
		wp_cache_set( $cache_key, $count, 'implecode' );
	}
	return $count;
}

if ( !function_exists( 'ic_get_current_products' ) ) {

	/**
	 * Returns current query product IDs
	 *
	 * @global type $shortcode_query
	 * @global type $wp_query
	 * @return type
	 */
	function ic_get_current_products( $exclude = array() ) {
		if ( is_ic_shortcode_query() ) {
			global $shortcode_query;
			if ( is_ic_product_listing( $shortcode_query ) && !is_product_filters_active() ) {
				return 'all';
			}
			$product_ids = wp_list_pluck( $shortcode_query->posts, 'ID' );
			return $product_ids;
		} else {
			global $wp_query;
			if ( empty( $wp_query->max_num_pages ) ) {
				//return array();
			}
			if ( $wp_query->max_num_pages == 1 ) {
				return wp_list_pluck( $wp_query->posts, 'ID' );
			}
			$product_ids = apply_filters( 'ic_current_products', '' );
			if ( is_array( $product_ids ) ) {
				return $product_ids;
			}
			if ( is_ic_product_listing() && !is_product_filters_active() ) {
				return 'all';
			} else if ( is_ic_taxonomy_page() ) {
				ini_set( 'memory_limit', WP_MAX_MEMORY_LIMIT );
			}
			$cache_key			 = 'current_products' . implode( '_', $exclude );
			$cached_product_ids	 = ic_get_global( $cache_key );
			if ( false !== $cached_product_ids ) {
				return $cached_product_ids;
			}
			//global $wp_query;
			$catalog_query = ic_get_catalog_query( true );
			if ( empty( $catalog_query->query_vars ) ) {
				return array();
			}
			$args						 = array_filter( $catalog_query->query_vars, 'ic_filter_objects' );
			$args[ 'nopaging' ]			 = true;
			$args[ 'posts_per_page' ]	 = -1;
			$args[ 'fields' ]			 = 'ids';
			$args[ 'suppress_filters' ]	 = true;
			foreach ( $exclude as $key ) {
				unset( $args[ $key ] );
			}
			$current_query = apply_filters( 'ic_catalog_current_products', '', $args );
			if ( empty( $current_query ) ) {
				$current_query = new WP_Query( $args );
			}
			$product_ids = $current_query->posts;
			if ( !empty( $cache_key ) ) {
				ic_save_global( $cache_key, $product_ids );
			}
			return $product_ids;
		}
	}

}
