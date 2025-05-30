<!--Gallery One Start-->

<?php
$tagline             = get_sub_field('gallery_tagline');
$heading             = get_sub_field('gallery_title');
$description         = get_sub_field('gallery_description');
$images              = get_sub_field('gallery_images');
?>

<?php if (!empty($heading) || !empty($images)): ?>
    <section class="gallery-one">
        <div class="container">
            <div class="gallery-one__top">
                <div class="row">
                    <div class="col-xl-7">
                        <div class="gallery-one__top-left">
                            <div class="section-title text-left sec-title-animation animation-style2">
                                <?php if (!empty($tagline)): ?>
                                    <div class="section-title__tagline-box">
                                        <span class="section-title__tagline"><?php echo esc_html($tagline); ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($heading)): ?>
                                    <h2 class="section-title__title title-animation"><?php echo esc_html($heading); ?></h2>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php if (!empty($description)): ?>
                        <div class="col-xl-5">
                            <div class="gallery-one__top-text">
                                <p><?php echo esc_html($description); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php if (!empty($images)): ?>
                <div class="gallery-one__bottom">
                    <div class="row masonary-layout">
                        <?php foreach ($images as $image): ?>
                            <?php if (!empty($image['url'])): ?>
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
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>



<!--Gallery One End -->