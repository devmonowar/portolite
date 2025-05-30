<!--Team One Start -->
<section class="team-one">
    <div class="container">
        <div class="section-title text-center sec-title-animation animation-style1">
            <div class="section-title__tagline-box">
                <span class="section-title__tagline">
                    <?php the_field('team_section_tagline'); ?>
                </span>
            </div>
            <h2 class="section-title__title title-animation">
                <?php the_field('team_section_title'); ?>
            </h2>
        </div>
        <div class="row">
            <?php if (have_rows('team_members')): ?>
                <?php while (have_rows('team_members')): the_row(); ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="team-one__single">
                            <div class="team-one__img">
                                <?php
                                $image = get_sub_field('member_image');
                                if ($image): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="team-one__content">
                                <div class="team-one__plus-and-social">
                                    <div class="team-one__plus">
                                        <span class="icon-arrow-up-right"></span>
                                    </div>
                                    <div class="team-one__social">
                                        <?php if (have_rows('social_links')): ?>
                                            <?php while (have_rows('social_links')): the_row(); ?>
                                                <a href="<?php the_sub_field('social_url'); ?>">
                                                    <span class="<?php the_sub_field('icon_class'); ?>"></span>
                                                </a>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="team-one__title-box">
                                    <h4 class="team-one__title">
                                        <a href="#"><?php the_sub_field('member_name'); ?></a>
                                    </h4>
                                    <p class="team-one__sub-title"><?php the_sub_field('member_position'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!--Team One End -->