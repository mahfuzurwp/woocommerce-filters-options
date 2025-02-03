<?php
/**
 * Modify the WooCommerce product query before retrieving products.
 *
 * This filter allows customization of the product query, such as modifying 
 * query parameters like product visibility, category filtering, sorting, and more.
 *
 * @hook woocommerce_product_query
 * @param WP_Query $query The WooCommerce product query object.
 * @return void The query is modified directly.
 *
 * Example usage:
 * The following code excludes out-of-stock products from the main product query.
 */
add_filter( 'woocommerce_product_query', 'wc_modify_product_query', 10, 1 );

function wc_modify_product_query( $query ) {
    // Exclude out-of-stock products from the query
    $meta_query = $query->get( 'meta_query' );

    $meta_query[] = array(
        'key'     => '_stock_status',
        'value'   => 'outofstock',
        'compare' => '!='
    );

    $query->set( 'meta_query', $meta_query );
}
