<?php

/**
 * Widgets
 * 
 * @package NM_THEME
 */

namespace NM_THEME\Classes;

use NM_THEME\Traits\Singleton;

class Widget
{

    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        //Register Elementor Widgets
        //add_action('init', [$this, 'nm_widgets_register']);
    }

    public function nm_widgets_register()
    {
        
    }
}
