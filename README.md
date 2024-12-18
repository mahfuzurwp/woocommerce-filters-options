# WooCommerce Filters & Options

Welcome to the **WooCommerce Filters & Options** repository! This is a curated list of useful filters and options available in WooCommerce, organized by functionality with examples to help developers enhance their WooCommerce stores.

## Table of Contents
1. [What’s in this Repo?](#whats-in-this-repo)
2. [How to Use](#how-to-use)
3. [Filters](#filters)
4. [Options](#options)
5. [Examples](#examples)
6. [Contributing](#contributing)

## What’s in this Repo?

- **Filters**: Modify WooCommerce functionality dynamically (e.g., product titles, pricing logic).
- **Options**: Persist settings in the database for WooCommerce (e.g., currency, product redirects).
- **Examples**: Code snippets to show practical use cases.

## How to Use
Navigate through the folders to find:
- **Filters**: `/filters/`
- **Options**: `/options/`
- **Examples**: `/examples/`

For a quick example, check the files directly or browse the README for common use cases.

## Filters

Filters allow you to hook into WooCommerce processes to modify or extend its behavior.

### Example:
**Filter**: `woocommerce_product_title`  
Modify product titles on the frontend:
```php
add_filter( 'woocommerce_product_title', 'custom_product_title', 10, 2 );
function custom_product_title( $title, $product ) {
    return 'Custom ' . $title;
}
