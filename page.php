<?php

/**
 * Page
 * 
 * @package NM_THEME
 */

get_header();

get_template_part('template-parts/header/site', 'title');

if (have_posts()) :
    while (have_posts()) : the_post();
        the_content();
    endwhile;
else :
    _e('Sorry, no posts matched your criteria.', 'nm_theme');
endif;

get_footer();
