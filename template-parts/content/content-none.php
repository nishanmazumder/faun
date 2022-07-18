<?php

/**
 * Blank content
 * 
 * @package NM_THEME
 */

?>

<?php if (is_home() && current_user_can('publish_posts')) : ?>

    <p>
        <?php
        printf(
            wp_kses(__('Ready to publish post? <a href="%s">Add Post</a>', 'nm_theme'), [
                'a' => [
                    'href' => []
                ]
            ]),
            esc_url(admin_url('post-new.php'))
        )
        ?>
    </p>

<?php elseif (is_search()) : ?>
    <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'nm_theme'); ?></p>
    <?php get_search_form(); ?>

<?php else : ?>
    <p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'nm_theme'); ?></p>
    <?php get_search_form(); ?>

<?php endif; ?>