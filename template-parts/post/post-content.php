<?php

/**
 * Header - Post
 * 
 * @package NM_THEME
 */

if (is_single()) {
    the_content(
        sprintf(
            wp_kses(
                __('Continue reading %s <span>&rarr</span>', 'nm_theme'),
                [
                    'span' => [
                        'class' => []
                    ]
                ]
            ),
            the_title('<span class="screen-reader-text">', '</span>', false)
        )
    );
} else {
    if (function_exists('nm_content_limit')) {
        nm_content_limit(25);
    }
}
