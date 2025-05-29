<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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

					<?php
					if (have_posts()):
						if (is_home() && !is_front_page()):
					?>
							<header>
								<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
							</header>

						<?php
						endif; ?>

						<?php
						/* Start the Loop */
						while (have_posts()): the_post(); ?>
							<?php
							/*
							* Include the Post-Type-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Type name) and that will be used instead.
							*/
							get_template_part('template-parts/content'); ?>
						<?php
						endwhile;
						?>
						<div class="blog-list__pagination">
							<?php portolite_pagination('<i class="icon-arrow-left"></i>', '<i class="icon-arrow-right"></i>'); ?>

						</div>




					<?php
					else:
						get_template_part('template-parts/content', 'none');
					endif;
					?>


				</div>
			</div>



			<?php if (is_active_sidebar('blog-sidebar')): ?>

				<aside class="col-xl-4 col-lg-5">


					<div class="sidebar">

						<?php get_sidebar(); ?>

						<div class="sidebar__single sidebar__search">
							<form action="#" class="sidebar__search-form">
								<input type="search" placeholder="Search..">
								<button type="submit"><i class="fas fa-search"></i></button>
							</form>
						</div>
						<div class="sidebar__single sidebar__post">
							<div class="sidebar__title-box">
								<h3 class="sidebar__title">Popular Post</h3>
								<div class="sidebar__title-shape-box">
									<div class="sidebar__title-shape-1"></div>
									<div class="sidebar__title-shape-2"></div>
								</div>
							</div>
							<ul class="sidebar__post-list list-unstyled">
								<li>
									<div class="sidebar__post-image">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog/lp-1-1.jpg" alt="">
									</div>
									<div class="sidebar__post-content">
										<p class="sidebar__post-date"><span class="icon-calendar"></span>October 19,
											2024</p>
										<h3>
											<a href="blog-details.html">Expert Guidance the Better Results</a>
										</h3>
									</div>
								</li>
								<li>
									<div class="sidebar__post-image">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog/lp-1-2.jpg" alt="">
									</div>
									<div class="sidebar__post-content">
										<p class="sidebar__post-date"><span class="icon-calendar"></span>November
											20,
											2024</p>
										<h3>
											<a href="blog-details.html">the performance and longe of your
												vehicle</a>
										</h3>
									</div>
								</li>
								<li>
									<div class="sidebar__post-image">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog/lp-1-3.jpg" alt="">
									</div>
									<div class="sidebar__post-content">
										<p class="sidebar__post-date"><span class="icon-calendar"></span>October 19,
											2024</p>
										<h3>
											<a href="blog-details.html">Car service is essential for maintaining</a>
										</h3>
									</div>
								</li>
							</ul>
						</div>
						<div class="sidebar__single sidebar__all-category">
							<div class="sidebar__title-box">
								<h3 class="sidebar__title">Catagory</h3>
								<div class="sidebar__title-shape-box">
									<div class="sidebar__title-shape-1"></div>
									<div class="sidebar__title-shape-2"></div>
								</div>
							</div>
							<ul class="sidebar__all-category-list list-unstyled">
								<li>
									<a href="#">EasyDrive Maintenance Center <span>01</span></a>
								</li>
								<li>
									<a href="#">Elite Auto Services <span>02</span></a>
								</li>
								<li>
									<a href="#">Smooth Ride Vehicle Care <span>03</span></a>
								</li>
								<li>
									<a href="#">Careful Car Service Station <span>04</span></a>
								</li>
								<li>
									<a href="#">AutoPro Mechanic Shop <span>05</span></a>
								</li>
							</ul>
						</div>
						<div class="sidebar__single sidebar__tags">
							<div class="sidebar__title-box">
								<h3 class="sidebar__title">Popular Tags</h3>
								<div class="sidebar__title-shape-box">
									<div class="sidebar__title-shape-1"></div>
									<div class="sidebar__title-shape-2"></div>
								</div>
							</div>
							<div class="sidebar__tags-list">
								<a href="#">Shop</a>
								<a href="#">Car Service</a>
								<a href="#">Car Wash</a>
								<a href="#">Station</a>
								<a href="#">Auto Services</a>
								<a href="#">Car Care</a>
							</div>
						</div>
						<div class="sidebar__single sidebar__gallery">
							<div class="sidebar__title-box">
								<h3 class="sidebar__title">Gallery</h3>
								<div class="sidebar__title-shape-box">
									<div class="sidebar__title-shape-1"></div>
									<div class="sidebar__title-shape-2"></div>
								</div>
							</div>
							<ul class="sidebar__gallery-list list-unstyled">
								<li>
									<div class="sidebar__gallery-img">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/sidebar-gallery-1-1.jpg" alt="">
									</div>
								</li>
								<li>
									<div class="sidebar__gallery-img">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/sidebar-gallery-1-2.jpg" alt="">
									</div>
								</li>
								<li>
									<div class="sidebar__gallery-img">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/sidebar-gallery-1-3.jpg" alt="">
									</div>
								</li>
								<li>
									<div class="sidebar__gallery-img">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/sidebar-gallery-1-4.jpg" alt="">
									</div>
								</li>
								<li>
									<div class="sidebar__gallery-img">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/sidebar-gallery-1-5.jpg" alt="">
									</div>
								</li>
								<li>
									<div class="sidebar__gallery-img">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/sidebar-gallery-1-6.jpg" alt="">
									</div>
								</li>
							</ul>
						</div>
					</div>

				</aside>

			<?php endif; ?>

		</div>
	</div>
</main>






<?php
get_footer();
