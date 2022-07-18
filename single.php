<?php

/**
 * Single Post Page
 * 
 * @package NM_THEME
 */

get_header();

if (have_posts()) :
    while (have_posts()) : the_post();
        get_template_part('template-parts/content/content-single');
    endwhile;
else :
    get_template_part('template-parts/content/content-none');
endif;

get_sidebar();

get_footer();
