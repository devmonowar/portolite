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