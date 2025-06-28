<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package portolite
 */

get_header();

$blog_column = is_active_sidebar('blog-sidebar') ? 8 : 12;
?>

<main class="ptl-blog-area grey-bg-4 blog-details">
	<div class="container">
		<div class="row">
			<div class="col-xxl-<?php echo esc_attr($blog_column); ?> col-xl-<?php echo esc_attr($blog_column); ?> col-lg-<?php echo esc_attr($blog_column); ?>">
				<div class="blog-list__left">
					<?php while (have_posts()) : the_post(); ?>

						<?php get_template_part('template-parts/content', get_post_format() ?: 'standard'); ?>

						<?php if (get_previous_post_link() || get_next_post_link()) : ?>
							<div class="blog-details__prev-next">

								<?php
								$prev_post = get_previous_post();
								if (!empty($prev_post)) :
									$prev_link  = get_permalink($prev_post);
								?>
									<div class="blog-details__prev">
										<a href="<?php echo esc_url($prev_link); ?>">
											<span class="icon-arrow-left"></span> <?php echo esc_html__('Previous', 'portolite'); ?>
										</a>
									</div>
								<?php endif; ?>

								<?php
								$next_post = get_next_post();
								if (!empty($next_post)) :
									$next_link = get_permalink($next_post);
								?>
									<div class="blog-details__next">
										<a href="<?php echo esc_url($next_link); ?>">
											<?php echo esc_html__('Next', 'portolite'); ?> <span class="icon-arrow-right"></span>
										</a>
									</div>
								<?php endif; ?>

							</div>
						<?php endif; ?>

						<?php
						// Load comment template if applicable
						if (comments_open() || get_comments_number()) :
							comments_template();
						endif;
						?>

					<?php endwhile; ?>
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