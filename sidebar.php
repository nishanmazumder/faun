<?php

/**
 * Sidebar
 * 
 * @package NM_THEME
 */

if (is_active_sidebar('post-sidebar')) {
    dynamic_sidebar('post-sidebar');
} else {
    echo "<h1>Sidebar not active!</h1>";
}
