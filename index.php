<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portolite
 */

get_header();

$blog_column = is_active_sidebar('blog-sidebar') ? 8 : 12;
?>

<main id="ptl-main" class="ptl-blog-area blog-list">
	<div class="container">
		<div class="row">
			<div class="col-xl-<?php echo esc_attr($blog_column); ?>">
				<div class="blog-list__left">
					<?php // Prints an h1 only when the page header is not going to. ?>
					<?php portolite_the_page_title(); ?>

					<?php if (have_posts()) : ?>

						<?php while (have_posts()) : the_post(); ?>
							<?php get_template_part('template-parts/content', get_post_format()); ?>
						<?php endwhile; ?>

						<?php
						// portolite_pagination() emits its own <nav class="blog-list__pagination">.
						portolite_pagination('<i class="icon-arrow-left"></i>', '<i class="icon-arrow-right"></i>');
						?>

					<?php else : ?>
						<?php get_template_part('template-parts/content', 'none'); ?>
					<?php endif; ?>
				</div>
			</div>

			<?php if (is_active_sidebar('blog-sidebar')) : ?>
				<aside class="col-xl-4 col-lg-5">
					<div class="sidebar">
						<?php get_sidebar(); ?>
					</div>
				</aside>
			<?php endif; ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>