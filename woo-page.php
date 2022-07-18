<?php

/**
 * Template Name: Woo page
 *
 * @package NM_THEME
 */

get_header(); ?>

<div class="nm-woo-container">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_content();
        endwhile;
    else :
        get_template_part('template-parts/content/content-none');
    endif;
    ?>
</div>

<?php get_footer(); ?>