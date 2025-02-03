<?php
/**
 * Modify the WooCommerce product query before retrieving products.
 *
 * This filter allows customization of the product query, enabling modifications 
 * such as excluding certain products, filtering by category, changing sorting order, 
 * or limiting the number of displayed products.
 *
 * @hook woocommerce_product_query
 * @param WP_Query $query The WooCommerce product query object.
 * @return void The query is modified directly.
 *
 * Example usages:
 * 1. Exclude out-of-stock products.
 * 2. Display only products from a specific category.
 * 3. Sort products by price in ascending order.
 * 4. Limit the number of displayed products.
 */
add_filter( 'woocommerce_product_query', 'wc_modify_product_query', 10, 1 );

function wc_modify_product_query( $query ) {
    // 1. Exclude out-of-stock products
    $meta_query = $query->get( 'meta_query' );
    $meta_query[] = array(
        'key'     => '_stock_status',
        'value'   => 'outofstock',
        'compare' => '!='
    );
    $query->set( 'meta_query', $meta_query );

    // 2. Display only products from a specific category (e.g., "Clothing")
    $query->set( 'tax_query', array(
        array(
            'taxonomy' => 'product_cat',
            'field'    => 'slug',
            'terms'    => 'clothing'
        )
    ));

    // 3. Sort products by price (ascending)
    $query->set( 'orderby', 'meta_value_num' );
    $query->set( 'meta_key', '_price' );
    $query->set( 'order', 'ASC' );

    // 4. Limit the number of displayed products
    $query->set( 'posts_per_page', 12 );
}
