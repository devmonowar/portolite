<!--Testimonial Two Start -->


<?php
$testimonial_title   = get_sub_field('testimonial_title');
$image         = get_sub_field('testimonial_image');
$testimonials  = get_sub_field('testimonials'); // Repeater
?>

<?php if (!empty($testimonial_title) || !empty($testimonials)) : ?>
    <section class="testimonial-two">
        <div class="testimonial-two__inner">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="testimonial-two__left">
                            <?php if ($testimonial_title): ?>
                                <h3 class="testimonial-two__title"><?php echo esc_html($testimonial_title); ?></h3>
                            <?php endif; ?>

                            <?php if (!empty($testimonials)) : ?>
                                <div class="testimonial-two__carousel owl-theme owl-carousel">
                                    <?php foreach ($testimonials as $item): ?>
                                    <div class="item">
                                        <div class="testimonial-two__single">
                                            <div class="testimonial-two__quote">
                                                <i class="icon-quote"></i>
                                            </div>
                                            <div class="testimonial-two__name-box">
                                                <h4 class="testimonial-two__name">
                                                    <a href="#"><?php echo esc_html($item['client_name']); ?></a>
                                                </h4>
                                                <p class="testimonial-two__sub-title"><?php echo esc_html($item['client_position']); ?></p>
                                            </div>
                                            <p class="testimonial-two__text"><?php echo esc_html($item['testimonial_text']); ?></p>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6">
                        <div class="testimonial-two__right">
                            <?php if (!empty($image['url'])): ?>
                                <div class="testimonial-two__img wow fadeInUp" data-wow-delay="100ms">
                                    <?php portolite_the_image($image, 'large'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>



<!--Testimonial Two End -->