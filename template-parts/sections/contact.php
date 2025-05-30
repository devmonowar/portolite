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