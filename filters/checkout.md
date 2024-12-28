# Checkout Filters
## Filter: woocommerce_billing_fields

- **Description: Customize the billing fields displayed during checkout.**
- **Parameters**:
- $fields (array): The original billing fields.
```php
add_filter( 'woocommerce_billing_fields', 'customize_billing_fields' );
function customize_billing_fields( $fields ) {
    $fields['billing_phone']['required'] = false; // Make phone optional
    return $fields;
}
```
