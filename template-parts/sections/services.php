<!--Services One Start-->
<?php
$title = get_sub_field('services_title');
$tagline = get_sub_field('services_tagline');
?>


<section class="services-one">
    <div class="services-one__inner">
        <div class="container">
            <div class="section-title text-center sec-title-animation animation-style1">

                <?php if ($tagline): ?>
                    <div class="section-title__tagline-box">
                        <span class="section-title__tagline"><?php echo esc_html($tagline); ?></span>
                    </div>
                <?php endif; ?>

                <?php if ($title): ?>
                    <h2 class="section-title__title title-animation"><?php echo esc_html($title); ?></h2>
                <?php endif; ?>

            </div>


            <?php if (have_rows('services_item')): ?>
                <div class="row">
                    <?php
                    while (have_rows('services_item')) : the_row();

                        $item_icon = get_sub_field('icon_class');
                        $item_title = get_sub_field('title');
                        $item_link = get_sub_field('link');
                        $item_desc = get_sub_field('description');
                        $item_animation = get_sub_field('animation');
                        $item_delay = get_sub_field('animation_delay');
                    ?>
                        <div class="col-xl-4 col-lg-4 wow <?php echo esc_attr($item_animation); ?>" data-wow-delay="<?php echo esc_attr($item_delay); ?>ms">
                            <div class="services-one__single">
                                <div class="services-one__icon">
                                    <span class="<?php echo esc_attr($item_icon); ?>"></span>
                                    <div class="services-one__icon-shape-1"></div>
                                    <div class="services-one__icon-shape-2"></div>
                                </div>
                                <?php if ($item_title): ?>
                                    <h3 class="services-one__title">
                                        <a href="<?php echo esc_url($item_link); ?>"><?php echo esc_html($item_title); ?></a>
                                    </h3>
                                <?php endif; ?>

                                <?php if ($item_desc): ?>
                                    <p class="services-one__text"><?php echo esc_html($item_desc); ?></p>
                                <?php endif; ?>
                                <div class="services-one__single-shape-1"></div>
                                <div class="services-one__single-shape-2"></div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>


<!--Services One End -->