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
