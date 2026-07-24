<!-- Main Slider Start -->
<?php
$slides = get_sub_field('main_slider');
?>

<?php if (!empty($slides)): ?>
    <section class="main-slider">
        <div class="main-slider__wrap">
            <div class="main-slider__carousel owl-carousel owl-theme">
                <?php foreach ($slides as $slide_index => $slide):
                    $title       = $slide['title'];
                    $description = $slide['description'];
                    $btn_text    = $slide['button_text'];
                    $btn_url     = $slide['button_url'];
                    $video_url   = $slide['video_url'];
                    $image       = $slide['image'];
                ?>
                    <div class="item">
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
                                        <?php
                                        // The first slide is the LCP image on the front page — lazy
                                        // loading it would delay the very thing being measured.
                                        portolite_the_image($image, 'portolite-hero', [
                                            'class'         => 'float-bob-y',
                                            'loading'       => 0 === $slide_index ? 'eager' : 'lazy',
                                            'fetchpriority' => 0 === $slide_index ? 'high' : 'auto',
                                        ]);
                                        ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<!--Main Slider End -->