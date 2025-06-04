<!--About One Start -->
<?php
$tagline        = get_sub_field('about_tagline');
$title          = get_sub_field('about_title');
$description    = get_sub_field('about_description');
$image          = get_sub_field('about_image');
$box_icon       = get_sub_field('about_box_icon');
$box_title      = get_sub_field('about_box_title');
$box_text       = get_sub_field('about_box_text');
$points         = get_sub_field('about_points');
?>

<?php if ($title || $description || $image): ?>
    <section class="about-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="about-one__left">
                        <div class="section-title text-left sec-title-animation animation-style2">
                            <?php if ($tagline): ?>
                                <div class="section-title__tagline-box">
                                    <span class="section-title__tagline"><?php echo esc_html($tagline); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if ($title): ?>
                                <h2 class="section-title__title title-animation"><?php echo esc_html($title); ?></h2>
                            <?php endif; ?>
                        </div>

                        <?php if ($description): ?>
                            <p class="about-one__text-1"><?php echo nl2br(esc_html($description)); ?></p>
                        <?php endif; ?>

                        <?php if (!empty($points)): ?>
                            <ul class="list-unstyled about-one__points">
                                <?php foreach ($points as $point): ?>
                                    <?php if (!empty($point['point_text'])): ?>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-double-arrow-right"></span>
                                            </div>
                                            <div class="text">
                                                <p><?php echo esc_html($point['point_text']); ?></p>
                                            </div>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
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
                                <?php if (!empty($image['url'])): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                <?php endif; ?>

                                <?php if ($box_icon || $box_title || $box_text): ?>
                                    <div class="about-one__content-box">
                                        <?php if ($box_icon): ?>
                                            <div class="about-one__content-icon">
                                                <span class="<?php echo esc_attr($box_icon); ?>"></span>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($box_title): ?>
                                            <h4 class="about-one__content-title"><?php echo esc_html($box_title); ?></h4>
                                        <?php endif; ?>
                                        <?php if ($box_text): ?>
                                            <p class="about-one__content-text"><?php echo esc_html($box_text); ?></p>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<!--About One End -->