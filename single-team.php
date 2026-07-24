<?php
get_header();

// Get post ID
$team_id = get_the_ID();

// ACF Fields

// The attachment ID, not a URL — that is what buys srcset, dimensions and lazy loading.
$image     = get_post_thumbnail_id($team_id);
$name      = get_the_title($team_id);
$position  = get_field('designation', $team_id);
$intro     = get_field('intro_description', $team_id);
$bio       = get_field('biography', $team_id);
$address   = get_field('address', $team_id);
$phone     = get_field('phone', $team_id);
$email     = get_field('email', $team_id);
$skills    = get_field('skills', $team_id); // repeater: skill_name, skill_percentage
?>

<main id="ptl-main">
<?php portolite_the_page_title(); ?>

<section class="team-details">
    <div class="container">
        <div class="team-details__top">
            <div class="row">
                <div class="col-xl-5 col-lg-5">
                    <div class="team-details__top-left">
                        <?php if ($image): ?>
                            <div class="team-details__img-1">
                                <?php
                                // Above the fold on the team detail page.
                                portolite_the_image($image, 'portolite-hero', [
                                    'alt'           => $name,
                                    'loading'       => 'eager',
                                    'fetchpriority' => 'high',
                                ]);
                                ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="team-details__top-right">
                        <div class="team-details__client-box">
                            <?php if ($name): ?>
                                <h3 class="team-details__client-name"><?php echo esc_html($name); ?></h3>
                            <?php endif; ?>

                            <?php if ($position): ?>
                                <span class="team-details__client-sub-title"><?php echo esc_html($position); ?></span>
                            <?php endif; ?>

                            <?php if ($intro): ?>
                                <p class="team-details__client-text"><?php echo esc_html($intro); ?></p>
                            <?php endif; ?>



                            <ul class="team-details__client-address list-unstyled">
                                <?php if ($address): ?>
                                    <li>
                                        <p><span class="icon-pin"></span>Address</p>
                                        <h5><?php echo esc_html($address); ?></h5>
                                    </li>
                                <?php endif; ?>
                                <?php if ($phone): ?>
                                    <li>
                                        <p><span class="icon-phone"></span>Phone Number</p>
                                        <h5><a href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_html($phone); ?></a></h5>
                                    </li>
                                <?php endif; ?>
                                <?php if ($email): ?>
                                    <li>
                                        <p><span class="icon-mail"></span>Email</p>
                                        <h5><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></h5>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="team-details__bottom">
            <div class="row">
                <?php if ($bio): ?>
                    <div class="col-xl-6 col-lg-6">
                        <div class="team-details__bottom-left">
                            <h3 class="team-details__bottom-title">Biography</h3>
                            <div class="team-details__bottom-text">
                                <?php echo wp_kses_post($bio); ?>
                            </div>

                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($skills): ?>
                    <div class="col-xl-6 col-lg-6">
                        <div class="team-details__bottom-right">
                            <h3 class="team-details__progress-title-1">Skills</h3>
                            <ul class="team-details__progress-list list-unstyled">
                                <?php foreach ($skills as $skill):
                                    $skill_name = $skill['skill_name'];
                                    $skill_percent = $skill['skill_percent'];
                                ?>
                                    <li>
                                        <div class="team-details__progress">
                                            <h4 class="team-details__progress-title"><?php echo esc_html($skill_name); ?></h4>
                                            <div class="bar">
                                                <div class="bar-inner count-bar" data-percent="<?php echo esc_attr($skill_percent); ?>%">
                                                    <div class="count-text"><?php echo esc_html($skill_percent); ?>%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

</main>

<?php get_footer(); ?>