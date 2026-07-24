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
<?php portolite_section_title($tagline, $heading, 'left'); ?>
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
                                                <?php
                                                // Masonry: heights vary, so no cropped size here. The
                                                // grid always sits below the fold.
                                                portolite_the_image($image, 'large', ['loading' => 'lazy']);
                                                ?>
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