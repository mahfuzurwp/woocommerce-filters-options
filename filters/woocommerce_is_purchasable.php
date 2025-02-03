<?php
/**
 * Determine whether a product is purchasable in WooCommerce.
 *
 * This filter allows modifying the purchasability of a product, 
 * enabling or disabling the "Add to Cart" button based on custom conditions.
 *
 * @hook woocommerce_is_purchasable
 * @param bool $is_purchasable Whether the product is purchasable.
 * @param WC_Product $product The product object.
 * @return bool Modified purchasability status.
 *
 * Example usages:
 * 1. Disable purchasing for a specific product ID.
 * 2. Make all products purchasable, even if out of stock.
 * 3. Disable purchasing for products under a specific category.
 * 4. Disable purchasing based on user roles.
 */
add_filter( 'woocommerce_is_purchasable', 'wc_modify_purchasability', 10, 2 );

function wc_modify_purchasability( $is_purchasable, $product ) {
    // 1. Disable purchasing for a specific product ID (e.g., Product ID 123)
    if ( $product->get_id() == 123 ) {
        return false;
    }

    // 2. Make all products purchasable, even if out of stock
    // if ( ! $is_purchasable ) {
    //     return true;
    // }

    // 3. Disable purchasing for products under a specific category (e.g., "Exclusive")
    if ( has_term( 'exclusive', 'product_cat', $product->get_id() ) ) {
        return false;
    }

    // 4. Disable purchasing for non-logged-in users
    if ( ! is_user_logged_in() ) {
        return false;
    }

    return $is_purchasable;
}
