<!--Brand One Start -->

<?php
$brand_logos = get_sub_field('brand_logos');
?>

<?php if (!empty($brand_logos)): ?>
    <section class="brand-one">
        <div class="container">
            <div class="brand-one__inner">
                <div class="brand-one__carousel owl-theme owl-carousel">
                    <?php foreach ($brand_logos as $logo):
                        $brand_image = $logo['brand_logo_image'];
                        if (!empty($brand_image['url'])):
                    ?>
                            <div class="item">
                                <div class="brand-one__single">
                                    <div class="brand-one__img">
                                        <img src="<?php echo esc_url($brand_image['url']); ?>" alt="<?php echo esc_attr($brand_image['alt']); ?>">
                                    </div>
                                </div>
                            </div>
                    <?php endif;
                    endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<!--Brand One End -->