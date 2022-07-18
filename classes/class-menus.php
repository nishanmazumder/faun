<?php

/**
 * Theme menu
 * 
 * @package NM_THEME
 */

namespace NM_THEME\Classes;

use NM_THEME\Traits\Singleton;

class Menus
{

    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        //Actions
        //add_action('init', [$this, 'nm_theme_register_menu']);
    }

    public function nm_theme_register_menu()
    {
        register_nav_menus(
            [
                'nm-theme-main-menu' => esc_html__('Main Menu', 'nm_theme'),
                'nm-theme-footer-menu' => esc_html__('Footer Menu', 'nm_theme')
            ]
        );
    }

    public function get_menu_id($location){
        $locations = get_nav_menu_locations();

        //Get Menu id by location
        $menu_id = $locations[$location];

        return !empty($menu_id) ? $menu_id : '';
    }

    public function get_child_menu_items($parent_id, $menu_items){

        $child_menu = [];

        if(!empty($menu_items) && is_array($menu_items)){
            foreach($menu_items as $menu_item){
                if(intval($menu_item->menu_item_parent) === $parent_id){
                    array_push($child_menu, $menu_item);
                }
            }
        }

        return $child_menu;
    }
}
