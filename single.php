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
$categories = get_the_terms($post->ID, 'category');
$portolite_audio_url = function_exists('get_field') ? get_field('fromate_style') : NULL;
$gallery_images = function_exists('get_field') ? get_field('gallery_images') : '';
$portolite_video_url = function_exists('get_field') ? get_field('fromate_style') : NULL;


if (function_exists('setPostViews')) {
	setPostViews(get_the_ID());
}
?>




<!-- default style -->

<!-- breadcrumb area start -->
<section class="breadcrumb__area ptl-postbox-breadcrumb include-bg pb-70 pt-120 grey-bg-4">
	<div class="container">
		<div class="row">
			<div class="col-xxl-9">
				<?php
				while (have_posts()):
					the_post();
				?>
					<div class="breadcrumb__content p-relative z-index-1">
						<div class="postbox__category">
							<a href="<?php print esc_url(get_category_link($categories[0]->term_id)); ?>"><?php echo esc_html($categories[0]->name); ?></a>
						</div>
						<h3 class="breadcrumb__title"><?php the_title(); ?></h3>

						<div class="breadcrumb__list">
							<?php if (function_exists('bcn_display')) {
								bcn_display();
							} ?>
						</div>
					</div>
				<?php endwhile;  // End of the loop. 
				?>
			</div>
		</div>
	</div>
</section>
<!-- breadcrumb area end -->

<section class="ptl-blog-area postbox__area grey-bg-4 pb-120">
	<div class="container">
		<div class="row">
			<div class="col-xxl-12">
				<div class="postbox__wrapper">
					<?php
					while (have_posts()):
						the_post();
					?>
						<div class="postbox__top">
							<!-- if post has image -->
							<?php if (has_post_format('image')): ?>
								<?php if (has_post_thumbnail()): ?>
									<div class="postbox__thumb mb-55">
										<?php the_post_thumbnail('full', ['class' => 'img-responsive']); ?>
									</div>
								<?php endif; ?>

								<!-- if post has video -->
							<?php elseif (has_post_format('video')): ?>
								<?php if (has_post_thumbnail()): ?>
									<div class="postbox__thumb postbox__video m-img p-relative mb-55">

										<?php the_post_thumbnail('full', ['class' => 'img-responsive']); ?>

										<?php if (!empty($portolite_video_url)) : ?>
											<a href="<?php print esc_url($portolite_video_url); ?>" class="play-btn pulse-btn popup-video"><i class="fas fa-play"></i></a>
										<?php endif; ?>
									</div>
								<?php endif; ?>

								<!-- if post has audio -->
							<?php elseif (has_post_format('audio')): ?>
								<?php if (!empty($portolite_audio_url)): ?>
									<div class="postbox__thumb postbox__audio m-img p-relative mb-55">
										<?php echo wp_oembed_get($portolite_audio_url); ?>
									</div>
								<?php endif; ?>

								<!-- if post has gallery -->
							<?php elseif (has_post_format('gallery')): ?>
								<?php if (!empty($gallery_images)): ?>
									<div class="postbox__thumb postbox__slider swiper-container m-img p-relative mb-55">
										<div class="swiper-wrapper">
											<?php foreach ($gallery_images as $key => $image): ?>
												<div class="postbox__slider-item swiper-slide">
													<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
												</div>
											<?php endforeach; ?>
										</div>
										<div class="postbox__nav">
											<button class="postbox-slider-button-next"><i class="fa-regular fa-angle-right"></i></button>
											<button class="postbox-slider-button-prev"><i class="fa-regular fa-angle-left"></i></button>
										</div>
									</div>
								<?php endif; ?>

								<!-- defalut image format -->
							<?php else: ?>
								<?php if (has_post_thumbnail()): ?>
									<div class="postbox__thumb m-img mb-55">
										<?php the_post_thumbnail('full', ['class' => 'img-responsive']); ?>
									</div>
								<?php endif; ?>

							<?php endif; // end of inner if 
							?>
						</div>
					<?php endwhile;  // End of the loop. 
					?>
					<div class="postbox__main postbox__details-content-wrapper">
						<div class="row">

							<div class="col-lg-<?php echo esc_attr($blog_column); ?>">
								<?php
								while (have_posts()):
									the_post();

									get_template_part('template-parts/content', get_post_format());

								?>
									<?php if (get_previous_post_link() and get_next_post_link()):
										$prev_post = get_adjacent_post(false, '', true);
										$next_post = get_adjacent_post(false, '', false);
									?>

										<div class="postbox__more-navigation white-bg d-flex justify-content-between flex-wrap mb-40 ">
											<?php if (get_previous_post_link()): ?>
												<div class="postbox__more-left d-flex align-items-center">
													<div class="postbox__more-icon">
														<a href="<?php echo get_permalink($prev_post->ID) ?>">
															<svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M7 12.9718L2.06061 8.04401C1.47727 7.46205 1.47727 6.50975 2.06061 5.92778L7 1" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
															</svg>
														</a>
													</div>
													<div class="postbox__more-content">
														<p><?php print esc_html__('Previous Article', 'portolite'); ?></p>
														<h4><?php print get_previous_post_link('%link ', '%title'); ?></h4>
													</div>
												</div>
											<?php endif; ?>

											<?php if (get_next_post_link()): ?>
												<div class="postbox__more-right d-flex align-items-center justify-content-end">
													<div class="postbox__more-content">
														<p> <?php print esc_html__('Next Article', 'portolite'); ?></p>
														<h4><?php print get_next_post_link('%link ', '%title'); ?></h4>
													</div>
													<div class="postbox__more-icon">
														<a href="<?php echo get_permalink($next_post->ID) ?>">
															<svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M1 12.9718L5.93939 8.04401C6.52273 7.46205 6.52273 6.50975 5.93939 5.92778L1 1" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
															</svg>
														</a>
													</div>
												</div>
											<?php endif; ?>
										</div>

									<?php endif; ?> <!-- navigation end -->

								<?php
									get_template_part('template-parts/biography', get_post_format());

									// If comments are open or we have at least one comment, load up the comment template.
									if (comments_open() || get_comments_number()):
										comments_template();
									endif;

								endwhile; // End of the loop.
								?>
							</div> <!-- end col 8 -->

							<?php if (is_active_sidebar('blog-sidebar')): ?>
								<div class="col-lg-4">
									<div class="sidebar__wrapper pl-40">
										<?php get_sidebar(); ?>
									</div>
								</div> <!-- end col 4 -->
							<?php endif; ?>
						</div>
					</div> <!-- end main wrapper -->
				</div>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
