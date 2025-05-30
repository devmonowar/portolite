<!--Pricing One Start -->
<section class="pricing-one">
    <div class="container">
        <div class="section-title text-center sec-title-animation animation-style1">
            <div class="section-title__tagline-box">
                <span class="section-title__tagline"><?php the_field('pricing_tagline'); ?></span>
            </div>
            <h2 class="section-title__title title-animation"><?php the_field('pricing_title'); ?></h2>
        </div>
        <div class="pricing-one__main-tab-box tabs-box">
            <ul class="tab-buttons list-unstyled">
                <li data-tab="#monthly" class="tab-btn active-btn"><span>Monthly</span></li>
                <li data-tab="#yearly" class="tab-btn"><span>Yearly</span></li>
            </ul>
            <div class="tabs-content">
                <!-- Monthly Tab -->
                <div class="tab active-tab" id="monthly">
                    <div class="pricing-one__inner">
                        <div class="row">
                            <?php if (have_rows('monthly_plans')): while (have_rows('monthly_plans')): the_row(); ?>
                                    <div class="col-xl-4 col-lg-4">
                                        <div class="pricing-one__single">
                                            <div class="pricing-one__title-box">
                                                <h2 class="pricing-one__title"><?php the_sub_field('title'); ?></h2>
                                                <p class="pricing-one__text"><?php the_sub_field('description'); ?></p>
                                            </div>
                                            <div class="pricing-one__price-and-icon-box">
                                                <div class="pricing-one__price-box">
                                                    <h3 class="pricing-one__price"><?php the_sub_field('price'); ?> <span>/month</span></h3>
                                                </div>
                                                <div class="pricing-one__icon-box">
                                                    <span class="<?php the_sub_field('icon'); ?>"></span>
                                                </div>
                                            </div>
                                            <ul class="list-unstyled pricing-one__points">
                                                <?php
                                                $features = explode("\n", get_sub_field('features'));
                                                foreach ($features as $feature): ?>
                                                    <li>
                                                        <div class="icon"><span class="icon-double-arrow-right"></span></div>
                                                        <div class="text">
                                                            <p><?php echo esc_html($feature); ?></p>
                                                        </div>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <div class="pricing-one__btn-box">
                                                <a href="<?php the_sub_field('button_link'); ?>" class="thm-btn">
                                                    <?php the_sub_field('button_text'); ?><span class="icon-arrow-up-right"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                            <?php endwhile;
                            endif; ?>
                        </div>
                    </div>
                </div>
                <!-- Yearly Tab -->
                <div class="tab" id="yearly">
                    <div class="pricing-one__inner">
                        <div class="row">
                            <?php if (have_rows('yearly_plans')): while (have_rows('yearly_plans')): the_row(); ?>
                                    <div class="col-xl-4 col-lg-4">
                                        <div class="pricing-one__single">
                                            <div class="pricing-one__title-box">
                                                <h2 class="pricing-one__title"><?php the_sub_field('title'); ?></h2>
                                                <p class="pricing-one__text"><?php the_sub_field('description'); ?></p>
                                            </div>
                                            <div class="pricing-one__price-and-icon-box">
                                                <div class="pricing-one__price-box">
                                                    <h3 class="pricing-one__price"><?php the_sub_field('price'); ?> <span>/year</span></h3>
                                                </div>
                                                <div class="pricing-one__icon-box">
                                                    <span class="<?php the_sub_field('icon'); ?>"></span>
                                                </div>
                                            </div>
                                            <ul class="list-unstyled pricing-one__points">
                                                <?php
                                                $features = explode("\n", get_sub_field('features'));
                                                foreach ($features as $feature): ?>
                                                    <li>
                                                        <div class="icon"><span class="icon-double-arrow-right"></span></div>
                                                        <div class="text">
                                                            <p><?php echo esc_html($feature); ?></p>
                                                        </div>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <div class="pricing-one__btn-box">
                                                <a href="<?php the_sub_field('button_link'); ?>" class="thm-btn">
                                                    <?php the_sub_field('button_text'); ?><span class="icon-arrow-up-right"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                            <?php endwhile;
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Pricing One End -->