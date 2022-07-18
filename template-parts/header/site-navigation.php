<?php

/**
 * Site Navigation
 * 
 * @package NM_THEME
 */

$menu = NM_THEME\Classes\Menus::get_instance();
$menu_id = $menu->get_menu_id('nm-theme-main-menu');
$menu_items = wp_get_nav_menu_items($menu_id);

if (!empty($menu_items) && is_array($menu_items)) { ?>
    <?php foreach ($menu_items as $menu_item) { ?>
        <a href="<?php echo esc_url($menu_item->url) ?>"><?php echo esc_html($menu_item->title); ?></a>
<?php  }
}
