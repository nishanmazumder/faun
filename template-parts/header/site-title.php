<?php

/**
 * Title - Page
 * 
 * @package NM_THEME
 */


$page_title_show = get_post_meta(get_the_ID(), '_hide_page_meta_key');

if (is_array($page_title_show) && in_array('yes', $page_title_show)) {
    echo esc_html(wp_title(''));
}
