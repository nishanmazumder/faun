<?php

/**
 * Post content - Displaying post list - index.php
 * 
 * @package NM_THEME
 */
?>


<article id="nm-post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if (has_post_thumbnail()) {
		the_post_thumbnail('nm_post_list', ['class' => 'nm-img-full', 'title' => 'Blog Image', 'loading' => false]);
	} ?>

	<!-- Post Title -->
	<?php
	if (function_exists('nm_post_title')) {
		nm_post_title();
	}
	?>

	<!-- Post Meta -->
	<?php get_template_part('template-parts/post/post-meta'); ?>

	<!-- Post Content -->
	<?php get_template_part('template-parts/post/post-content'); ?>

	<!-- Read More -->
	<?php nm_theme_read_more(); ?>

</article>