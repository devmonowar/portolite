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

<section class="ptl-blog-area grey-bg-4 blog-details">
	<div class="container">
		<div class="row">
			<div class="col-xxl-<?php print esc_attr($blog_column); ?> col-xl-<?php print esc_attr($blog_column); ?> col-lg-<?php print esc_attr($blog_column); ?>">
				<div class="blog-list__left">
					<?php
					while (have_posts()):
						the_post();

						get_template_part('template-parts/content', get_post_format());

					?>


						<?php if (get_previous_post_link() || get_next_post_link()): ?>


							<div class="blog-details__prev-next">
								<div class="blog-details__prev">
									<?php
									$prev_post = get_previous_post();
									if (!empty($prev_post)) :
										$prev_title = get_the_title($prev_post);
										$prev_link = get_permalink($prev_post);
									?>
										<a href="<?php echo esc_url($prev_link); ?>">
											<span class="icon-arrow-left"></span> <?php echo esc_html__('Previous', 'portolite'); ?>
										</a>
									<?php else : ?>
										<a href="#">
											<span class="icon-arrow-left"></span> <?php echo esc_html__('Previous', 'portolite'); ?>
										</a>
									<?php endif; ?>
								</div>

								<div class="blog-details__next">
									<?php
									$next_post = get_next_post();
									if (!empty($next_post)) :
										$next_title = get_the_title($next_post);
										$next_link = get_permalink($next_post);
									?>
										<a href="<?php echo esc_url($next_link); ?>">
											<?php echo esc_html__('Next', 'portolite'); ?> <span class="icon-arrow-right"></span>
										</a>
									<?php else : ?>
										<a href="#">
											<?php echo esc_html__('Next', 'portolite'); ?> <span class="icon-arrow-right"></span>
										</a>
									<?php endif; ?>
								</div>
							</div>




						<?php
						endif; ?>

					<?php


						// If comments are open or we have at least one comment, load up the comment template.
						if (comments_open() || get_comments_number()):
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
				</div>
			</div>
			<?php if (is_active_sidebar('blog-sidebar')): ?>

				<aside class="col-xl-4 col-lg-5">


					<div class="sidebar">
						<?php get_sidebar(); ?>
					</div>

				</aside>

			<?php endif; ?>
		</div>
	</div>
</section>

<?php
get_footer();
