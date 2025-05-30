<?php

/**
 * Template Name: Home Page Template copy
 * @package portolite
 */

get_header();
?>


<?php

if (have_rows('page_sections')) :
	while (have_rows('page_sections')) : the_row();
?>

		<!-- Main Slider Start -->

		<?php if (have_rows('main_slider', get_queried_object_id())) : ?>
			<section class="main-slider">
				<div class="main-slider__wrap">
					<div class="main-slider__carousel owl-carousel owl-theme">
						<?php while (have_rows('main_slider', get_queried_object_id())) : the_row();
							$title = get_sub_field('title');
							$description = get_sub_field('description');
							$btn_text = get_sub_field('button_text');
							$btn_url = get_sub_field('button_url');
							$video_url = get_sub_field('video_url');
							$image = get_sub_field('image');
						?>
							<div class="item">
								<div class="main-slider__shape-1">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/main-slider-shape-1.png" alt="">
								</div>
								<div class="container">
									<div class="main-slider__content">
										<?php if ($title): ?>
											<h2 class="main-slider__title"><?php echo wp_kses_post($title); ?></h2>
										<?php endif; ?>

										<?php if ($description): ?>
											<p class="main-slider__text"><?php echo wp_kses_post($description); ?></p>
										<?php endif; ?>

										<div class="main-slider__btn-and-video-box">
											<?php if ($btn_text && $btn_url): ?>
												<div class="main-slider__btn-box">
													<a href="<?php echo esc_url($btn_url); ?>" class="thm-btn">
														<?php echo esc_html($btn_text); ?><span class="icon-arrow-up-right"></span>
													</a>
												</div>
											<?php endif; ?>

											<?php if ($video_url): ?>
												<div class="main-slider__video-link">
													<a href="<?php echo esc_url($video_url); ?>" class="video-popup">
														<div class="main-slider__video-icon">
															<span class="icon-video"></span>
															<i class="ripple"></i>
														</div>
													</a>
												</div>
											<?php endif; ?>
										</div>

										<?php if (!empty($image['url'])): ?>
											<div class="main-slider__img">
												<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="float-bob-y">
											</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<!--Main Slider End -->



		<!--Counter One Start -->

		<?php if (have_rows('counters', get_queried_object_id())) : ?>
			<section class="counter-one">
				<div class="container">
					<div class="counter-one__inner">
						<ul class="list-unstyled counter-one__list">
							<?php while (have_rows('counters', get_queried_object_id())) : the_row();
								$count = get_sub_field('count');
								$suffix = get_sub_field('suffix');
								$title = get_sub_field('title');
								$delay = get_sub_field('animation_delay');
							?>
								<li class="wow fadeInLeft" data-wow-delay="<?php echo esc_attr($delay); ?>ms">
									<div class="counter-one__single">
										<div class="counter-one__count-box">
											<h3 class="odometer" data-count="<?php echo esc_attr($count); ?>">00</h3>
											<span><?php echo esc_html($suffix); ?></span>
										</div>
										<p class="counter-one__text"><?php echo esc_html($title); ?></p>
									</div>
								</li>
							<?php endwhile; ?>
						</ul>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<!--Counter One End -->


		<!--Services One Start-->

		<?php if (have_rows('services', get_queried_object_id())) : ?>
			<section class="services-one">
				<div class="services-one__inner">
					<div class="container">
						<div class="section-title text-center sec-title-animation animation-style1">
							<div class="section-title__tagline-box">
								<span class="section-title__tagline"><?php the_field('services_section_tagline'); ?></span>
							</div>
							<h2 class="section-title__title title-animation"><?php the_field('services_section_title'); ?></h2>
						</div>
						<div class="row">
							<?php while (have_rows('services', get_queried_object_id())) : the_row();
								$icon = get_sub_field('icon_class');
								$title = get_sub_field('title');
								$link = get_sub_field('link');
								$desc = get_sub_field('description');
								$animation = get_sub_field('animation');
								$delay = get_sub_field('animation_delay');
							?>
								<div class="col-xl-4 col-lg-4 wow <?php echo esc_attr($animation); ?>" data-wow-delay="<?php echo esc_attr($delay); ?>ms">
									<div class="services-one__single">
										<div class="services-one__icon">
											<span class="<?php echo esc_attr($icon); ?>"></span>
											<div class="services-one__icon-shape-1"></div>
											<div class="services-one__icon-shape-2"></div>
										</div>
										<h3 class="services-one__title">
											<a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a>
										</h3>
										<p class="services-one__text"><?php echo esc_html($desc); ?></p>
										<div class="services-one__single-shape-1"></div>
										<div class="services-one__single-shape-2"></div>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<!--Services One End -->



		<!--About One Start -->
		<section class="about-one">
			<div class="container">
				<div class="row">
					<div class="col-xl-6">
						<div class="about-one__left">
							<div class="section-title text-left sec-title-animation animation-style2">
								<div class="section-title__tagline-box">
									<span class="section-title__tagline"><?php the_field('about_tagline'); ?></span>
								</div>
								<h2 class="section-title__title title-animation"><?php the_field('about_title'); ?></h2>
							</div>
							<p class="about-one__text-1"><?php echo nl2br(esc_html(get_field('about_description'))); ?></p>

							<?php if (have_rows('about_points')) : ?>
								<ul class="list-unstyled about-one__points">
									<?php while (have_rows('about_points')) : the_row(); ?>
										<li>
											<div class="icon">
												<span class="icon-double-arrow-right"></span>
											</div>
											<div class="text">
												<p><?php the_sub_field('point_text'); ?></p>
											</div>
										</li>
									<?php endwhile; ?>
								</ul>
							<?php endif; ?>
						</div>
					</div>

					<div class="col-xl-6 wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms">
						<div class="about-one__right">
							<div class="about-one__img-box">
								<div class="about-one__img-shape-1 float-bob-y-2"></div>
								<div class="about-one__img-shape-2 float-bob-x-2"></div>
								<div class="about-one__img">
									<?php $img = get_field('about_image'); ?>
									<?php if ($img): ?>
										<img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>">
									<?php endif; ?>
									<div class="about-one__content-box">
										<div class="about-one__content-icon">
											<span class="<?php the_field('about_box_icon'); ?>"></span>
										</div>
										<h4 class="about-one__content-title"><?php the_field('about_box_title'); ?></h4>
										<p class="about-one__content-text"><?php the_field('about_box_text'); ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!--About One End -->


		<!--Brand One Start -->
		<?php if (have_rows('brand_logos')) : ?>
			<section class="brand-one">
				<div class="container">
					<div class="brand-one__inner">
						<div class="brand-one__carousel owl-theme owl-carousel">
							<?php while (have_rows('brand_logos')) : the_row();
								$brand_image = get_sub_field('brand_logo_image');
							?>
								<div class="item">
									<div class="brand-one__single">
										<div class="brand-one__img">
											<img src="<?php echo esc_url($brand_image['url']);
														?>" alt="<?php echo esc_attr($brand_image['alt']); ?>">
										</div>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>


		<!--Brand One End -->

		<!--Gallery One Start-->

		<?php
		$gallery_heading = get_field('gallery_heading');
		$gallery_description = get_field('gallery_description');
		$images = get_field('gallery_images');
		?>
		<?php if ($gallery_heading || $images) : ?>
			<section class="gallery-one">
				<div class="container">
					<div class="gallery-one__top">
						<div class="row">
							<div class="col-xl-7">
								<div class="gallery-one__top-left">
									<div class="section-title text-left sec-title-animation animation-style2">
										<div class="section-title__tagline-box">
											<span class="section-title__tagline"><?php the_field('gallery_tagline'); ?></span>
										</div>
										<h2 class="section-title__title title-animation"><?php echo esc_html($gallery_heading); ?></h2>
									</div>
								</div>
							</div>
							<div class="col-xl-5">
								<div class="gallery-one__top-text">
									<p><?php echo esc_html($gallery_description); ?></p>
								</div>
							</div>
						</div>
					</div>
					<div class="gallery-one__bottom">
						<div class="row masonary-layout">

							<?php foreach ($images as $image): ?>

								<div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp">
									<div class="gallery-one__single">
										<div class="gallery-one__img-box">
											<div class="gallery-one__img">
												<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
											</div>
											<div class="gallery-one__icon">
												<a class="img-popup" href="<?php echo esc_url($image['url']); ?>">
													<span class="icon-arrow-up-right-two"></span>
												</a>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>




		<!--Gallery One End -->

		<!--Faq One Start -->

		<?php
		$faq_heading = get_field('faq_heading');
		?>
		<?php if ($faq_heading || have_rows('faqs')) : ?>
			<section class="faq-one">
				<div class="container">
					<div class="section-title text-center sec-title-animation animation-style1">
						<div class="section-title__tagline-box">
							<span class="section-title__tagline"><?php the_field('faq_tagline'); ?></span>
						</div>
						<h2 class="section-title__title title-animation"><?php echo esc_html($faq_heading); ?></h2>
					</div>
					<div class="faq-one__inner-content">
						<div class="accrodion-grp" data-grp-name="faq-one-accrodion">
							<?php
							$faq_index = 0;
							while (have_rows('faqs')) : the_row();
								$question = get_sub_field('faq_question');
								$answer = get_sub_field('faq_answer');
							?>
								<div class="accrodion">
									<div class="accrodion-title">
										<div class="faq-one__accrodion-title-count"></div>
										<h4><?php echo esc_html($question); ?></h4>
									</div>
									<div class="accrodion-content">
										<div class="inner">
											<p><?php echo esc_html($answer); ?></p>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>


		<!--Faq One End -->


		<!--Testimonial One Start -->
		<section class="testimonial-one">
			<div class="testimonial-one__wrap">
				<div class="container">
					<?php if ($section_title = get_field('testimonial_section_title')) : ?>
						<div class="section-title text-left sec-title-animation animation-style2">
							<div class="section-title__tagline-box">
								<span class="section-title__tagline"><?php the_field('testimonial_tagline'); ?></span>
							</div>
							<h2 class="section-title__title title-animation"><?php echo esc_html($section_title); ?></h2>
						</div>
					<?php endif; ?>

					<?php if (have_rows('testimonials')) : ?>
						<div class="testimonial-one__carousel owl-theme owl-carousel">
							<?php while (have_rows('testimonials')) : the_row();
								$image = get_sub_field('client_image');
								$name = get_sub_field('client_name');
								$position = get_sub_field('client_position');
								$text = get_sub_field('testimonial_text');
							?>
								<div class="item">
									<div class="testimonial-one__single">
										<?php if ($image) : ?>
											<div class="testimonial-one__img">
												<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
											</div>
										<?php endif; ?>
										<div class="testimonial-one__client-info">
											<h3 class="testimonial-one__client-name"><?php echo esc_html($name); ?></h3>
											<p class="testimonial-one__client-text"><?php echo esc_html($position); ?></p>
										</div>
										<p class="testimonial-one__text"><?php echo esc_html($text); ?></p>
										<div class="testimonial-one__quote">
											<span class="fas fa-quote-right"></span>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
		<!--Testimonial One End -->

		<!--Team One Start -->
		<section class="team-one">
			<div class="container">
				<div class="section-title text-center sec-title-animation animation-style1">
					<div class="section-title__tagline-box">
						<span class="section-title__tagline">
							<?php the_field('team_section_tagline'); ?>
						</span>
					</div>
					<h2 class="section-title__title title-animation">
						<?php the_field('team_section_title'); ?>
					</h2>
				</div>
				<div class="row">
					<?php if (have_rows('team_members')): ?>
						<?php while (have_rows('team_members')): the_row(); ?>
							<div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
								<div class="team-one__single">
									<div class="team-one__img">
										<?php
										$image = get_sub_field('member_image');
										if ($image): ?>
											<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
										<?php endif; ?>
									</div>
									<div class="team-one__content">
										<div class="team-one__plus-and-social">
											<div class="team-one__plus">
												<span class="icon-arrow-up-right"></span>
											</div>
											<div class="team-one__social">
												<?php if (have_rows('social_links')): ?>
													<?php while (have_rows('social_links')): the_row(); ?>
														<a href="<?php the_sub_field('social_url'); ?>">
															<span class="<?php the_sub_field('icon_class'); ?>"></span>
														</a>
													<?php endwhile; ?>
												<?php endif; ?>
											</div>
										</div>
										<div class="team-one__title-box">
											<h4 class="team-one__title">
												<a href="#"><?php the_sub_field('member_name'); ?></a>
											</h4>
											<p class="team-one__sub-title"><?php the_sub_field('member_position'); ?></p>
										</div>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</section>

		<!--Team One End -->



		<!--Contact One Start -->

		<section class="contact-one">
			<div class="container">
				<div class="row">
					<div class="col-xl-6 wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
						<div class="contact-one__left">
							<div class="contact-one__left-content">
								<div class="contact-one__shape-1"></div>
								<div class="contact-one__shape-2"></div>
								<div class="contact-one__title-box">
									<p><?php the_field('contact_section_subtitle'); ?></p>
									<h3><?php the_field('contact_section_title'); ?></h3>
								</div>
								<div class="contact-form-validated contact-one__form">
									<?php echo do_shortcode(get_field('contact_form_shortcode')); ?>
								</div>
								<div class="result"></div>
							</div>
						</div>
					</div>
					<div class="col-xl-6 wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms">
						<div class="contact-one__right">
							<div class="contact-one__img">
								<?php $image = get_field('contact_image'); ?>
								<?php if ($image): ?>
									<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
								<?php endif; ?>
								<div class="contact-one__img-shape-1">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/contact-one-img-shape-1.png" alt="">
								</div>
								<div class="contact-one__experience-box">
									<div class="contact-one__experience">
										<div class="contact-one__experience-icon-box">
											<div class="contact-one__experience-icon">
												<span class="icon-trophy"></span>
											</div>
											<div class="contact-one__experience-count-box">
												<h3 class="odometer" data-count="<?php the_field('contact_experience_years'); ?>">
													<?php the_field('contact_experience_years'); ?>
												</h3>
												<span>+</span>
											</div>
										</div>
										<p class="contact-one__experience-text">Years Of Experiences</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!--Contact One End -->

		<!--Pricing One Start -->
		<section class="pricing-one">
			<div class="container">
				<div class="section-title text-center sec-title-animation animation-style1">
					<div class="section-title__tagline-box">
						<span class="section-title__tagline"><?php the_field('pricing_tagline'); ?></span>
					</div>
					<h2 class="section-title__title title-animation"><?php the_field('pricing_title'); ?></h2>
				</div>
				<div class="pricing-one__main-tab-box tabs-box">
					<ul class="tab-buttons list-unstyled">
						<li data-tab="#monthly" class="tab-btn active-btn"><span>Monthly</span></li>
						<li data-tab="#yearly" class="tab-btn"><span>Yearly</span></li>
					</ul>
					<div class="tabs-content">
						<!-- Monthly Tab -->
						<div class="tab active-tab" id="monthly">
							<div class="pricing-one__inner">
								<div class="row">
									<?php if (have_rows('monthly_plans')): while (have_rows('monthly_plans')): the_row(); ?>
											<div class="col-xl-4 col-lg-4">
												<div class="pricing-one__single">
													<div class="pricing-one__title-box">
														<h2 class="pricing-one__title"><?php the_sub_field('title'); ?></h2>
														<p class="pricing-one__text"><?php the_sub_field('description'); ?></p>
													</div>
													<div class="pricing-one__price-and-icon-box">
														<div class="pricing-one__price-box">
															<h3 class="pricing-one__price"><?php the_sub_field('price'); ?> <span>/month</span></h3>
														</div>
														<div class="pricing-one__icon-box">
															<span class="<?php the_sub_field('icon'); ?>"></span>
														</div>
													</div>
													<ul class="list-unstyled pricing-one__points">
														<?php
														$features = explode("\n", get_sub_field('features'));
														foreach ($features as $feature): ?>
															<li>
																<div class="icon"><span class="icon-double-arrow-right"></span></div>
																<div class="text">
																	<p><?php echo esc_html($feature); ?></p>
																</div>
															</li>
														<?php endforeach; ?>
													</ul>
													<div class="pricing-one__btn-box">
														<a href="<?php the_sub_field('button_link'); ?>" class="thm-btn">
															<?php the_sub_field('button_text'); ?><span class="icon-arrow-up-right"></span>
														</a>
													</div>
												</div>
											</div>
									<?php endwhile;
									endif; ?>
								</div>
							</div>
						</div>
						<!-- Yearly Tab -->
						<div class="tab" id="yearly">
							<div class="pricing-one__inner">
								<div class="row">
									<?php if (have_rows('yearly_plans')): while (have_rows('yearly_plans')): the_row(); ?>
											<div class="col-xl-4 col-lg-4">
												<div class="pricing-one__single">
													<div class="pricing-one__title-box">
														<h2 class="pricing-one__title"><?php the_sub_field('title'); ?></h2>
														<p class="pricing-one__text"><?php the_sub_field('description'); ?></p>
													</div>
													<div class="pricing-one__price-and-icon-box">
														<div class="pricing-one__price-box">
															<h3 class="pricing-one__price"><?php the_sub_field('price'); ?> <span>/year</span></h3>
														</div>
														<div class="pricing-one__icon-box">
															<span class="<?php the_sub_field('icon'); ?>"></span>
														</div>
													</div>
													<ul class="list-unstyled pricing-one__points">
														<?php
														$features = explode("\n", get_sub_field('features'));
														foreach ($features as $feature): ?>
															<li>
																<div class="icon"><span class="icon-double-arrow-right"></span></div>
																<div class="text">
																	<p><?php echo esc_html($feature); ?></p>
																</div>
															</li>
														<?php endforeach; ?>
													</ul>
													<div class="pricing-one__btn-box">
														<a href="<?php the_sub_field('button_link'); ?>" class="thm-btn">
															<?php the_sub_field('button_text'); ?><span class="icon-arrow-up-right"></span>
														</a>
													</div>
												</div>
											</div>
									<?php endwhile;
									endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!--Pricing One End -->


		<!--Blog One Start -->
		<section class="blog-one">
			<div class="container">
				<div class="blog-one__top">
					<div class="section-title text-left sec-title-animation animation-style2">
						<div class="section-title__tagline-box">
							<span class="section-title__tagline"><?php the_field('blog_tagline'); ?></span>
						</div>
						<h2 class="section-title__title title-animation"><?php the_field('blog_title'); ?></h2>
					</div>
					<div class="blog-one__btn-box">
						<a href="<?php the_field('blog_btn_url'); ?>" class="thm-btn">
							<?php the_field('blog_btn_text'); ?><span class="icon-arrow-up-right"></span>
						</a>
					</div>
				</div>
				<div class="blog-one__bottom">
					<div class="row">
						<?php
						$post_count = get_field('blog_post_count') ?: 3;
						$query = new WP_Query([
							'post_type' => 'post',
							'posts_per_page' => $post_count
						]);
						if ($query->have_posts()) :
							while ($query->have_posts()) : $query->the_post(); ?>
								<div class="col-xl-4 col-lg-6">
									<div class="blog-one__single">
										<div class="blog-one__img">
											<?php the_post_thumbnail('full'); ?>
										</div>
										<div class="blog-one__content">
											<div class="blog-one__date">
												<p><?php echo get_the_date('d'); ?><br><?php echo get_the_date('M'); ?></p>
											</div>
											<ul class="blog-one__meta list-unstyled">
												<li><a href="<?php the_permalink(); ?>"><span class="icon-user"></span>By <?php the_author(); ?></a></li>
												<li><a href="<?php comments_link(); ?>"><span class="icon-comments"></span><?php comments_number('0 Comment', '1 Comment', '% Comments'); ?></a></li>
											</ul>
											<h3 class="blog-one__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
											<div class="blog-one__read-more">
												<a href="<?php the_permalink(); ?>">Read more <span class="icon-arrow-up-right"></span></a>
											</div>
										</div>
									</div>
								</div>
						<?php endwhile;
							wp_reset_postdata();
						endif;
						?>
					</div>
				</div>
			</div>
		</section>

		<!--Blog One End -->


<?php
	endwhile;
endif;
?>

<?php get_footer(); ?>