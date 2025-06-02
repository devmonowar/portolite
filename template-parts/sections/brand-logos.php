<!--Brand One Start -->





<?php
$gallery = get_sub_field('brand_logo_gallery');
if ($gallery): ?>
    <section class="brand-one">
        <div class="container">
            <div class="brand-one__inner">
                <div class="brand-one__carousel owl-theme owl-carousel">
                    <?php foreach ($gallery as $image): ?>
                        <div class="item">
                            <div class="brand-one__single">
                                <div class="brand-one__img">
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<!--Brand One End -->