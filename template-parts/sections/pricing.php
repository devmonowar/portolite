<!--Pricing One Start -->

<?php
$tagline = get_sub_field('pricing_tagline');
$title = get_sub_field('pricing_title');
$monthly_plans = get_sub_field('monthly_plans');
$yearly_plans = get_sub_field('yearly_plans');
?>

<?php if ($title || $monthly_plans || $yearly_plans): ?>
    <section class="pricing-one">
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

            <div class="pricing-one__main-tab-box tabs-box">
                <ul class="tab-buttons list-unstyled">
                    <li data-tab="#monthly" class="tab-btn active-btn"><span>Monthly</span></li>
                    <li data-tab="#yearly" class="tab-btn"><span>Yearly</span></li>
                </ul>
                <div class="tabs-content">
                    <!-- Monthly Tab -->
                    <?php if ($monthly_plans): ?>
                        <div class="tab active-tab" id="monthly">
                            <div class="pricing-one__inner">
                                <div class="row">
                                    <?php foreach ($monthly_plans as $plan): ?>
                                        <div class="col-xl-4 col-lg-4">
                                            <div class="pricing-one__single">
                                                <div class="pricing-one__title-box">
                                                    <h2 class="pricing-one__title"><?php echo esc_html($plan['title']); ?></h2>
                                                    <p class="pricing-one__text"><?php echo esc_html($plan['description']); ?></p>
                                                </div>
                                                <div class="pricing-one__price-and-icon-box">
                                                    <div class="pricing-one__price-box">
                                                        <h3 class="pricing-one__price"><?php echo esc_html($plan['price']); ?> <span>/month</span></h3>
                                                    </div>
                                                    <div class="pricing-one__icon-box">
                                                        <span class="<?php echo esc_attr($plan['icon']); ?>"></span>
                                                    </div>
                                                </div>
                                                <?php if (!empty($plan['features'])): ?>
                                                    <ul class="list-unstyled pricing-one__points">
                                                        <?php foreach (explode("\n", $plan['features']) as $feature): ?>
                                                            <li>
                                                                <div class="icon"><span class="icon-double-arrow-right"></span></div>
                                                                <div class="text">
                                                                    <p><?php echo esc_html($feature); ?></p>
                                                                </div>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php endif; ?>
                                                <?php if (!empty($plan['button_text']) && !empty($plan['button_link'])): ?>
                                                    <div class="pricing-one__btn-box">
                                                        <a href="<?php echo esc_url($plan['button_link']); ?>" class="thm-btn">
                                                            <?php echo esc_html($plan['button_text']); ?><span class="icon-arrow-up-right"></span>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Yearly Tab -->
                    <?php if ($yearly_plans): ?>
                        <div class="tab" id="yearly">
                            <div class="pricing-one__inner">
                                <div class="row">
                                    <?php foreach ($yearly_plans as $plan): ?>
                                        <div class="col-xl-4 col-lg-4">
                                            <div class="pricing-one__single">
                                                <div class="pricing-one__title-box">
                                                    <h2 class="pricing-one__title"><?php echo esc_html($plan['title']); ?></h2>
                                                    <p class="pricing-one__text"><?php echo esc_html($plan['description']); ?></p>
                                                </div>
                                                <div class="pricing-one__price-and-icon-box">
                                                    <div class="pricing-one__price-box">
                                                        <h3 class="pricing-one__price"><?php echo esc_html($plan['price']); ?> <span>/year</span></h3>
                                                    </div>
                                                    <div class="pricing-one__icon-box">
                                                        <span class="<?php echo esc_attr($plan['icon']); ?>"></span>
                                                    </div>
                                                </div>
                                                <?php if (!empty($plan['features'])): ?>
                                                    <ul class="list-unstyled pricing-one__points">
                                                        <?php foreach (explode("\n", $plan['features']) as $feature): ?>
                                                            <li>
                                                                <div class="icon"><span class="icon-double-arrow-right"></span></div>
                                                                <div class="text">
                                                                    <p><?php echo esc_html($feature); ?></p>
                                                                </div>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php endif; ?>
                                                <?php if (!empty($plan['button_text']) && !empty($plan['button_link'])): ?>
                                                    <div class="pricing-one__btn-box">
                                                        <a href="<?php echo esc_url($plan['button_link']); ?>" class="thm-btn">
                                                            <?php echo esc_html($plan['button_text']); ?><span class="icon-arrow-up-right"></span>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>




<!--Pricing One End -->