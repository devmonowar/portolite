<!--Team One Start -->

<?php
$team_tagline = get_sub_field('team_section_tagline');
$team_title   = get_sub_field('team_section_title');
$members      = get_sub_field('team_members');
?>

<?php if (!empty($team_title) || !empty($members)) : ?>
    <section class="team-one">
        <div class="container">
            <?php if (!empty($team_tagline) || !empty($team_title)) : ?>
                <div class="section-title text-center sec-title-animation animation-style1">
                    <?php if (!empty($team_tagline)) : ?>
                        <div class="section-title__tagline-box">
                            <span class="section-title__tagline"><?php echo esc_html($team_tagline); ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($team_title)) : ?>
                        <h2 class="section-title__title title-animation"><?php echo wp_kses_post($team_title); ?></h2>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="row">
                <?php foreach ($members as $member) :
                    $image    = $member['member_image'];
                    $name     = $member['member_name'];
                    $position = $member['member_position'];
                    $socials  = $member['social_links'];
                ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="team-one__single">
                            <?php if (!empty($image)) : ?>
                                <div class="team-one__img">
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                </div>
                            <?php endif; ?>

                            <div class="team-one__content">
                                <div class="team-one__plus-and-social">
                                    <div class="team-one__plus">
                                        <span class="icon-arrow-up-right"></span>
                                    </div>
                                    <?php if (!empty($socials)) : ?>
                                        <div class="team-one__social">
                                            <?php foreach ($socials as $social) :
                                                $url  = $social['social_url'];
                                                $icon = $social['icon_class'];
                                                if ($url && $icon) :
                                            ?>
                                                    <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener">
                                                        <span class="<?php echo esc_attr($icon); ?>"></span>
                                                    </a>
                                            <?php endif;
                                            endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="team-one__title-box">
                                    <?php if (!empty($name)) : ?>
                                        <h4 class="team-one__title"><a href="#"><?php echo esc_html($name); ?></a></h4>
                                    <?php endif; ?>
                                    <?php if (!empty($position)) : ?>
                                        <p class="team-one__sub-title"><?php echo esc_html($position); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>


<!--Team One End -->