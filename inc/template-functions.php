<?php

/**
 *  Template functions
 *
 * @package NM_THEME
 */

// Shop
/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}

//Remove Short description
function remove_short_description() {
	remove_meta_box( 'postexcerpt', 'product', 'normal');
}
add_action('add_meta_boxes', 'remove_short_description', 999);

// Get Description
function nm_woo_get_des(){
	$description = get_the_content();
	return $description;
}
add_shortcode('nm_description', 'nm_woo_get_des');

// Single
// Get gallery images
function nm_get_product_images(){

	$feature_image = get_the_post_thumbnail(get_the_id());

	if(!empty($feature_image)) {
		echo $feature_image;
	}

	if (is_product()) {
		$product = wc_get_product(get_the_id());
		$product_images_id = $product->get_gallery_image_ids();

		foreach( $product_images_id as $product_image_id ){
			echo wp_get_attachment_image($product_image_id, 'full');
		}
	}
}
add_shortcode('get_woo_img', 'nm_get_product_images');

// Cart
function nm_woo_cart(){
       return '<a href="' . wc_get_cart_url() . '" class="w3view-cart" name="nm_cart"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i><div id="mini-cart-count"></div></a>';
}
add_shortcode('nm_cart', 'nm_woo_cart');

function nm_woo_cart_count(){
	//global $woocommerce;
	//$nm_cart_count = $woocommerce->cart->get_cart_contents_count;
	$nm_cart_obg = is_object( WC()->cart ) ? WC()->cart->get_cart_contents_count() : '0';

       return '<span class="nm-cart-count">('.$nm_cart_obg.')</span>';
}
add_shortcode('nm_cart_count', 'nm_woo_cart_count');

// Additional Information

////////////////////////////// Composition and care
add_action('add_meta_boxes', 'create_product_composition_care_meta_box');
function create_product_composition_care_meta_box()
{
    add_meta_box(
        'composition_care_meta_box',
        __('Composition and care', 'cmb'),
        'add_composition_care_meta_box',
        'product',
        'normal',
        'default'
    );
}

// Metabox in product page
function add_composition_care_meta_box($post)
{
    $product = wc_get_product($post->ID);
    $content = $product->get_meta('_composition_care');

    echo '<div class="product_composition_care">';

    wp_editor($content, '_composition_care', ['textarea_rows' => 10]);

    echo '</div>';
}

// Save value
add_action('woocommerce_admin_process_product_object', 'save_composition_care_wysiwyg_field', 10, 1);
function save_composition_care_wysiwyg_field($product)
{
    if (isset($_POST['_composition_care']))
        $product->update_meta_data('_composition_care', wp_kses_post($_POST['_composition_care']));
}

// Display data as shortcode
function nm_woo_additional_info_cac()
{
    global $product;
    echo '<div class="wrapper-technical_specs">' . $product->get_meta('_composition_care') . '</div>';
}
add_shortcode('nm_woo_cac', 'nm_woo_additional_info_cac');


////////////////////////////////// Size Chart
add_action('add_meta_boxes', 'create_product_size_chart_meta_box');
function create_product_size_chart_meta_box()
{
    add_meta_box(
        'size_chart_meta_box',
        __('Size Chart', 'cmb'),
        'add_size_chart_meta_box',
        'product',
        'normal',
        'default'
    );
}

// Metabox in product page
function add_size_chart_meta_box($post)
{
    $product = wc_get_product($post->ID);
    $content = $product->get_meta('_size_chart');

    echo '<div class="product_size_chart">';

    wp_editor($content, '_size_chart', ['textarea_rows' => 10]);

    echo '</div>';
}

// Save value
add_action('woocommerce_admin_process_product_object', 'save_size_chart_wysiwyg_field', 11, 1);
function save_size_chart_wysiwyg_field($product)
{
    if (isset($_POST['_size_chart']))
        $product->update_meta_data('_size_chart', wp_kses_post($_POST['_size_chart']));
}

// Display data as shortcode
function nm_woo_additional_info_size_chart()
{
    global $product;
    echo '<div class="wrapper-size_chart">' . $product->get_meta('_size_chart') . '</div>';
}
add_shortcode('nm_woo_size', 'nm_woo_additional_info_size_chart');

///////////////////////////////// Shipping
add_action('add_meta_boxes', 'create_product_shipping_meta_box');
function create_product_shipping_meta_box()
{
    add_meta_box(
        'shipping_meta_box',
        __('Shipping', 'cmb'),
        'add_shipping_meta_box',
        'product',
        'normal',
        'default'
    );
}

// Metabox in product page
function add_shipping_meta_box($post)
{
    $product = wc_get_product($post->ID);
    $content = $product->get_meta('_shipping');

    echo '<div class="product_shipping">';

    wp_editor($content, '_shipping', ['textarea_rows' => 10]);

    echo '</div>';
}

// Save value
add_action('woocommerce_admin_process_product_object', 'save_shipping_wysiwyg_field', 13, 1);
function save_shipping_wysiwyg_field($product)
{
    if (isset($_POST['_shipping']))
        $product->update_meta_data('_shipping', wp_kses_post($_POST['_shipping']));
}

// Display data as shortcode
function nm_woo_additional_info_shipping()
{
    global $product;
    echo '<div class="wrapper-shipping">' . $product->get_meta('_shipping') . '</div>';
}
add_shortcode('nm_woo_shipping', 'nm_woo_additional_info_shipping');


//////////////////////////////////// Shipping
add_action('add_meta_boxes', 'create_product_returnExchange_meta_box');
function create_product_returnExchange_meta_box()
{
    add_meta_box(
        'returnExchange_meta_box',
        __('RETURNS AND EXCHANGES', 'cmb'),
        'add_returnExchange_meta_box',
        'product',
        'normal',
        'default'
    );
}

// Metabox in product page
function add_returnExchange_meta_box($post)
{
    $product = wc_get_product($post->ID);
    $content = $product->get_meta('_returnExchange');

    echo '<div class="product_returnExchange">';

    wp_editor($content, '_returnExchange', ['textarea_rows' => 10]);

    echo '</div>';
}

// Save value
add_action('woocommerce_admin_process_product_object', 'save_returnExchange_wysiwyg_field', 13, 1);
function save_returnExchange_wysiwyg_field($product)
{
    if (isset($_POST['_returnExchange']))
        $product->update_meta_data('_returnExchange', wp_kses_post($_POST['_returnExchange']));
}

// Display data as shortcode
function nm_woo_additional_info_returnExchange()
{
    global $product;
    echo '<div class="wrapper-size_chart">' . $product->get_meta('_returnExchange') . '</div>';
}
add_shortcode('nm_woo_returnExchange', 'nm_woo_additional_info_returnExchange');

// Woocommerce cart plus/minus button
add_action( 'wp_head' , 'custom_quantity_fields_css' );
function custom_quantity_fields_css(){
    ?>
    <style>
    .quantity input::-webkit-outer-spin-button,
    .quantity input::-webkit-inner-spin-button {
        display: none;
        margin: 0;
    }
    .quantity input.qty {
        appearance: textfield;
        -webkit-appearance: none;
        -moz-appearance: textfield;
    }
    </style>
    <?php
}


add_action( 'wp_footer' , 'custom_quantity_fields_script' );
function custom_quantity_fields_script(){
    ?>
    <script type='text/javascript'>
    jQuery( function( $ ) {
        if ( ! String.prototype.getDecimals ) {
            String.prototype.getDecimals = function() {
                var num = this,
                    match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
                if ( ! match ) {
                    return 0;
                }
                return Math.max( 0, ( match[1] ? match[1].length : 0 ) - ( match[2] ? +match[2] : 0 ) );
            }
        }
        // Quantity "plus" and "minus" buttons
        $( document.body ).on( 'click', '.plus, .minus', function() {
            var $qty        = $( this ).closest( '.quantity' ).find( '.qty'),
                currentVal  = parseFloat( $qty.val() ),
                max         = parseFloat( $qty.attr( 'max' ) ),
                min         = parseFloat( $qty.attr( 'min' ) ),
                step        = $qty.attr( 'step' );

            // Format values
            if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
            if ( max === '' || max === 'NaN' ) max = '';
            if ( min === '' || min === 'NaN' ) min = 0;
            if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

            // Change the value
            if ( $( this ).is( '.plus' ) ) {
                if ( max && ( currentVal >= max ) ) {
                    $qty.val( max );
                } else {
                    $qty.val( ( currentVal + parseFloat( step )).toFixed( step.getDecimals() ) );
                }
            } else {
                if ( min && ( currentVal <= min ) ) {
                    $qty.val( min );
                } else if ( currentVal > 0 ) {
                    $qty.val( ( currentVal - parseFloat( step )).toFixed( step.getDecimals() ) );
                }
            }

            // Trigger change event
            $qty.trigger( 'change' );
        });
    });
    </script>
    <?php
}

// Coupon Field

add_shortcode( 'coupon_field', 'display_coupon_field' );
function display_coupon_field() {
    if( isset($_GET['coupon']) && isset($_GET['redeem-coupon']) ){
        if( $coupon = esc_attr($_GET['coupon']) ) {
            $applied = WC()->cart->apply_coupon($coupon);
        } else {
            $coupon = false;
        }

        $success = sprintf( __('Coupon "%s" Applied successfully.'), $coupon );
        $error   = __("This Coupon can't be applied");

        $message = isset($applied) && $applied ? $success : $error;
    }

    $output  = '<div class="nm-redeem-coupon shopengine-checkout-coupon"><form id="coupon-redeem">
    <p><input class="nm_coupon_field" type="text" name="coupon" id="coupon"/>
    <input class="nm_coupon_sbt" type="submit" name="redeem-coupon" value="'.__('Apply Coupon').'" /></p>';

    $output .= isset($coupon) ? '<p class="result">'.$message.'</p>' : '';

    return $output . '</form></div>';
}

// Extend Register form
function wooc_extra_register_fields() {?>
       <p class="form-row form-row-wide">
       <label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?><span class="required">*</span></label>
       <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
       </p>
       <p class="form-row form-row-wide">
       <label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?><span class="required">*</span></label>
       <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
       </p>
       <div class="clear"></div>
       <?php
 }
 add_action( 'woocommerce_register_form_start', 'wooc_extra_register_fields' );

/**
* register fields Validating.
*/
function wooc_validate_extra_register_fields( $username, $email, $validation_errors ) {
      if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
             $validation_errors->add( 'billing_first_name_error', __( '<strong>Error</strong>: First name is required!', 'woocommerce' ) );
      }
      if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
             $validation_errors->add( 'billing_last_name_error', __( '<strong>Error</strong>: Last name is required!.', 'woocommerce' ) );
      }
         return $validation_errors;
}
add_action( 'woocommerce_register_post', 'wooc_validate_extra_register_fields', 10, 3 );

add_action( 'woocommerce_created_customer', 'bbloomer_save_name_fields' );

function bbloomer_save_name_fields( $customer_id ) {
    if ( isset( $_POST['billing_first_name'] ) ) {
        update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
        update_user_meta( $customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']) );
    }
    if ( isset( $_POST['billing_last_name'] ) ) {
        update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
        update_user_meta( $customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']) );
    }

    if ( isset( $_POST['billing_first_name'] ) && isset( $_POST['billing_last_name'] ) ) {

        if ( !empty( $_POST['billing_first_name'] ) && !empty( $_POST['billing_last_name'] ) ) {

            $display_name = sanitize_text_field( $_POST['billing_first_name'] ) . ' ' . sanitize_text_field( $_POST['billing_last_name'] );
            wp_update_user( array( 'ID' => $customer_id, 'display_name' => $display_name ) );
        }

    }

}


