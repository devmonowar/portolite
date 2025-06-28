<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portolite
 */

get_header();

$blog_column = is_active_sidebar('blog-sidebar') ? 8 : 12;
?>

<main class="ptl-blog-area blog-list">
	<div class="container">
		<div class="row">
			<div class="col-xl-<?php echo esc_attr($blog_column); ?>">
				<div class="blog-list__left">
					<?php if (have_posts()) : ?>

						<header class="archive-header">
							<?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
							<?php the_archive_description('<div class="archive-description">', '</div>'); ?>
						</header>

						<?php while (have_posts()) : the_post(); ?>
							<?php get_template_part('template-parts/content', get_post_format()); ?>
						<?php endwhile; ?>

						<div class="blog-list__pagination">
							<?php
							// Use custom pagination if available
							if (function_exists('portolite_pagination')) {
								portolite_pagination('<i class="icon-arrow-left"></i>', '<i class="icon-arrow-right"></i>');
							} else {
								the_posts_pagination([
									'prev_text' => '<i class="icon-arrow-left"></i>',
									'next_text' => '<i class="icon-arrow-right"></i>',
								]);
							}
							?>
						</div>

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