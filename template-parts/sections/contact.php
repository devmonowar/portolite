<!--Contact One Start -->

<?php
$subtitle       = get_sub_field('contact_section_subtitle');
$title          = get_sub_field('contact_section_title');
$form_shortcode = get_sub_field('contact_form_shortcode');
$image          = get_sub_field('contact_image');
$experience     = get_sub_field('contact_experience_years');
?>

<?php if ($title || $form_shortcode || $image) : ?>
    <section class="contact-one">
        <div class="container">
            <div class="row">
                <!-- Left: Form -->
                <div class="col-xl-6 wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                    <div class="contact-one__left">
                        <div class="contact-one__left-content">
                            <div class="contact-one__shape-1"></div>
                            <div class="contact-one__shape-2"></div>

                            <?php if ($subtitle || $title): ?>
                                <div class="contact-one__title-box">
                                    <?php if ($subtitle): ?>
                                        <p><?php echo esc_html($subtitle); ?></p>
                                    <?php endif; ?>
                                    <?php if ($title): ?>
                                        <h3><?php echo esc_html($title); ?></h3>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($form_shortcode): ?>
                                <div class="contact-form-validated contact-one__form">
                                    <?php echo do_shortcode($form_shortcode); ?>
                                </div>
                            <?php endif; ?>

                            <div class="result"></div>
                        </div>
                    </div>
                </div>

                <!-- Right: Image & Experience -->
                <div class="col-xl-6 wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms">
                    <div class="contact-one__right">
                        <div class="contact-one__img">
                            <?php if (!empty($image)) : ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                            <?php endif; ?>

                            <div class="contact-one__img-shape-1">
                                <img src='<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/shapes/contact-one-img-shape-1.png'>

                            </div>

                            <?php if ($experience): ?>
                                <div class="contact-one__experience-box">
                                    <div class="contact-one__experience">
                                        <div class="contact-one__experience-icon-box">
                                            <div class="contact-one__experience-icon">
                                                <span class="icon-trophy"></span>
                                            </div>
                                            <div class="contact-one__experience-count-box">
                                                <h3 class="odometer" data-count="<?php echo esc_attr($experience); ?>">
                                                    <?php echo esc_html($experience); ?>
                                                </h3>
                                                <span>+</span>
                                            </div>
                                        </div>
                                        <p class="contact-one__experience-text">Years Of Experiences</p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
<?php endif; ?>


<!--Contact One End -->