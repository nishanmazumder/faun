<?php

/**
 * Theme Sidebar
 * 
 * @package NM_THEME
 */

namespace NM_THEME\Classes;

use NM_THEME\Traits\Singleton;

class Sidebar
{

    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();

    }

    protected function setup_hooks()
    {
        //Actions
        add_action( 'widgets_init', [$this, 'register_sidbars'] );
    }

    public function register_sidbars(){
        //Post Sidebar
        register_sidebar(
            array(
                'id'            => 'post-sidebar',
                'name'          => __( 'Primary Sidebar', 'nm_theme'),
                'description'   => __( 'Widgets for page sidebar', 'nm_theme'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );

        //Footer Widgets
        // register_sidebar(
        //     array(
        //         'id'            => 'footer-sidebar',
        //         'name'          => __( 'Footer Menu', 'nm_theme'),
        //         'description'   => __( 'Widgets for footer social', 'nm_theme'),
        //         'before_widget' => '<div id="%1$s" class="col-md-3 col-sm-6 col-xs-12 %2$s">',
        //         'after_widget'  => '</div>',
        //         'before_title'  => '<h4 class="nm_font_mont">',
        //         'after_title'   => '</h4>',
        //     )
        // );
    }

}
