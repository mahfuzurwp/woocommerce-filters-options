<?php

/**
 * Add a custom product data tab in the WooCommerce product edit screen.
 *
 * This filter allows you to add a new custom tab to the product data metabox
 * in the WooCommerce admin area. The custom tab can contain additional fields 
 * or information specific to your requirements.
 *
 * @hook woocommerce_product_data_tabs
 * @param array $tabs An array of existing product data tabs.
 * @return array Modified array of product data tabs including the custom tab.
 *
 * Example usage:
 * The following code adds a new "Custom Tab" to the product data tabs with a target 
 * content area (HTML ID) of `wc_custom_tab_data` and a priority of 60.
 */
add_filter( 'woocommerce_product_data_tabs', 'wc_custom_product_tab', 10, 1 );

function wc_custom_product_tab( $tabs ) {
    // Add a new custom tab
    $tabs['custom_tab'] = array(
        'label'    => __( 'Custom Tab', 'domain' ), // Tab label visible in the admin
        'target'   => 'wc_custom_tab_data',        // HTML ID for the tab content area
        'priority' => 60,                          // Position of the tab in the UI
        'class'    => array()                      // Additional CSS classes for the tab
    );

    return $tabs;
}
