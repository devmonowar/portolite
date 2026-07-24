<!--Testimonial One Start -->

<?php
$testimonial_tagline = get_sub_field('testimonial_tagline');
$testimonial_title   = get_sub_field('testimonial_title');
$testimonials        = get_sub_field('testimonials');
?>

<?php if (!empty($testimonial_title) || !empty($testimonials)) : ?>
    <section class="testimonial-one">
        <div class="testimonial-one__wrap">
            <div class="container">

                <?php portolite_section_title($testimonial_tagline, $testimonial_title, 'left'); ?>

                <?php if (!empty($testimonials)): ?>
                    <div class="testimonial-one__carousel owl-theme owl-carousel">
                        <?php foreach ($testimonials as $item):
                            $image    = $item['client_image'];
                            $name     = $item['client_name'];
                            $position = $item['client_position'];
                            $text     = $item['testimonial_text'];
                        ?>
                            <div class="item">
                                <div class="testimonial-one__single">

                                    <?php if (!empty($image['url'])): ?>
                                        <div class="testimonial-one__img">
                                            <?php portolite_the_image($image, 'portolite-avatar', ['loading' => 'lazy']); ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="testimonial-one__client-info">
                                        <?php if (!empty($name)): ?>
                                            <h3 class="testimonial-one__client-name"><?php echo esc_html($name); ?></h3>
                                        <?php endif; ?>
                                        <?php if (!empty($position)): ?>
                                            <p class="testimonial-one__client-text"><?php echo esc_html($position); ?></p>
                                        <?php endif; ?>
                                    </div>

                                    <?php if (!empty($text)): ?>
                                        <p class="testimonial-one__text"><?php echo esc_html($text); ?></p>
                                    <?php endif; ?>

                                    <div class="testimonial-one__quote">
                                        <span class="icon-quote"></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section>
<?php endif; ?>



<!--Testimonial One End -->