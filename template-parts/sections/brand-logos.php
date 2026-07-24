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
                                    <?php
                                    // 'medium' rather than a cropped size — a logo must keep its own
                                    // aspect ratio. A logo strip is never the LCP, so lazy is stated
                                    // outright instead of leaving it to core's first-images heuristic.
                                    portolite_the_image($image, 'medium', ['loading' => 'lazy']);
                                    ?>
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