<?php

/**
 * Post content - Displaying post
 * 
 * @package NM_THEME
 */
?>


<article id="nm-post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
<!-- Post Title -->
	<?php
	if (function_exists('nm_post_title')) {
		nm_post_title();
	}
	?>

	<!-- Post Meta -->
	<?php get_template_part('template-parts/post/post-meta'); ?>

	<!-- Post Image -->
	<?php if (has_post_thumbnail()) {
		the_post_thumbnail('nm_post_list', ['class' => 'nm-img-full', 'title' => 'Blog Image', 'loading' => false]);
	} ?>

	<!-- Post Content -->
	<?php get_template_part('template-parts/post/post-content'); ?>

	<!-- Pagination Single -->
	<?php nm_post_pagination_single(); ?>

</article>