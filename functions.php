<?php

/**
 * Functions
 * @package NM_THEME
 */

/**
 * Theme URL
 */
if (!defined('NM_SITE_URL')) {
   define('NM_SITE_URL', esc_url(get_site_url()));
}

if (!defined('NM_DIR_PATH')) {
   define('NM_DIR_PATH', untrailingslashit(get_template_directory()));
}

if (!defined('NM_DIR_URI')) {
   define('NM_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

if (!defined('NM_STYLE_URI')) {
   define('NM_STYLE_URI', untrailingslashit(get_stylesheet_uri()));
}

/**
 * Autoload
 */
require_once NM_DIR_PATH . '/vendor/autoload.php';


/**
 * Theme Bootstrap
 */
nm_theme_get_instance();
function nm_theme_get_instance()
{
   \NM_THEME\Classes\NM_THEME::get_instance();

   // if (function_exists('is_plugin_active')) {
   //    if (!is_plugin_active('elementor/elementor.php')) {
   //       return;
   //    } else {
   //       \NM_THEME\Classes\Widget::get_instance();
   //    }
   // }
}

/**
 * Template Functions
 */
require_once NM_DIR_PATH . '/inc/template-functions.php';

/**
 * Template Tags
 */
require_once NM_DIR_PATH . '/inc/template-tags.php';

// Ship to different address - UNCHECKED
// add_filter( 'woocommerce_ship_to_different_address_checked', '__return_false' );

// Seperate Payment area from checkout
remove_action('woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
add_action('woocommerce_checkout_payment_hook', 'woocommerce_checkout_payment', 10 );

add_action('woocommerce_after_checkout_form', 'nm_payment_method');

function nm_payment_method(){
  do_action('woocommerce_checkout_payment_hook');
}

// Change Place Order button
add_filter( 'woocommerce_order_button_text', 'woo_custom_order_button_text' );

function woo_custom_order_button_text() {
    return __( 'Continue Shopping', 'woocommerce' );
}

// Remove Order Notes from checkout field in Woocommerce
add_filter( 'woocommerce_enable_order_notes_field', '__return_false', 9999 );

// Remoce Privacy policy
// if ( is_checkout() ) {
//    remove_action('woocommerce_checkout_terms_and_conditions', 'wc_checkout_privacy_policy_text', 20);
//    remove_action('woocommerce_checkout_terms_and_conditions', 'wc_terms_and_conditions_page_content', 30);
// }

add_action('woocommerce_checkout_before_order_review', 'nm_coupon_code_checkout');

function nm_coupon_code_checkout(){
   if (wc_coupons_enabled()) { ?>
      <div class="nm_checkout_coupon">
         <div class="coupon">
            <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e('Gift card or discount code', 'woocommerce'); ?>" />
            <button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e('Apply', 'woocommerce'); ?>"><?php esc_attr_e('Apply', 'woocommerce'); ?></button>
            <?php do_action('woocommerce_cart_coupon'); ?>
         </div>
      </div>
   <?php }
}


// Remove default order details
//  remove_action('woocommerce_checkout_order_review', 'woocommerce_order_review', 10);
// add_action('nm_woocommerce_custom_details', 'woocommerce_order_review', 11 );
// add_action('shopengine-order-review-thumbnail', 'nm_woocommerce_order_review', 11);


// function nm_woocommerce_order_review(){
//    echo "test";
// }




