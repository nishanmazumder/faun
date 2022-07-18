<?php

/**
 * Post Meta
 * 
 * @package NM_THEME
 */
?>

<table class="table table-borderless">
    <tr>
        <!-- Author Data -->
        <td>
            <span>
                <?php
                if (function_exists('nm_posted_by')) {
                    nm_posted_by();
                }
                ?>
            </span>
        </td>

        <!-- Post Date -->
        <td>
            <span><i class="fa fa-clock-o" aria-hidden="true"></i><?php esc_html(the_time('j-F-Y g:i a')); ?></span>
        </td>

        <!-- Category & Tags -->
        <td class="nm_term_list">
            <?php
            if (function_exists('nm_get_term')) {
                nm_get_term();
            }
            ?>
        </td>
    </tr>
</table>