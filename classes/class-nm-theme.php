<?php

/**
 * Bootstrap NM_THEME
 */

namespace NM_THEME\Classes;

use NM_THEME\Traits\Singleton;

class NM_THEME
{

    use Singleton;

    protected function __construct()
    {
        Assets::get_instance();
        Sidebar::get_instance();
        Menus::get_instance();
        //META_BOX::get_instance();

        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        //Theme hooks
        add_action('after_setup_theme', [$this, 'theme_support']);
    }

    public function theme_support()
    {
        //Title
        add_theme_support('title-tag');

        //logo
        add_theme_support('custom-logo', array(
            'header-text' => ['site-title', 'site-description']
        ));

        //Image Size
        add_image_size('site-logo', 220, 180);
        //add_image_size('nm_post_list', '100%', 'auto');

        //Custom Background
        // add_theme_support('custom-background', [
        //     'default-color' => '#fff',
        //     'default-image' => ''
        // ]);

        add_theme_support('post-thumbnails');

        //Feed Links
        add_theme_support('automatic-feed-links');

        //Customize Selective Refresh Widgets
        add_theme_support('customize-selective-refresh-widgets');

        //Theme Markup
        add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'));


        add_editor_style();

        //wp-block-styles
        add_theme_support('wp-block-styles');

        add_theme_support('align-wide');

        // global $content_width;
        // if(!isset($content_width)){
        //     $content_width = 1240;
        // }
    }
}
