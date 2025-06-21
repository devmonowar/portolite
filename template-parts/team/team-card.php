<?php

/**
 * Template Part: Single Team Card
 * Expected: $args['team_id']
 */

if (!isset($args['team_id']) || !is_numeric($args['team_id'])) {
    echo '<p>Invalid team member data.</p>';
    return;
}

$team_id   = $args['team_id'];
$name      = get_the_title($team_id);
$image     = get_the_post_thumbnail_url($team_id, 'full');
$position  = get_field('designation', $team_id);
$socials   = get_field('social_links', $team_id);
$link      = get_permalink($team_id);
?>

<div class="team-one__single">
    <?php if ($image): ?>
        <div class="team-one__img">
            <a href="<?php echo esc_url($link); ?>">
                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($name); ?>">
            </a>
        </div>
    <?php endif; ?>

    <div class="team-one__content">
        <div class="team-one__plus-and-social">
            <div class="team-one__plus">
                <span class="icon-arrow-up-right"></span>
            </div>

            <?php if (!empty($socials) && is_array($socials)) : ?>
                <div class="team-one__social">
                    <?php foreach ($socials as $social) :
                        $url  = $social['social_url'] ?? '';
                        $icon = $social['icon_class'] ?? '';
                        if ($url && $icon): ?>
                            <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener">
                                <span class="<?php echo esc_attr($icon); ?>"></span>
                            </a>
                    <?php endif;
                    endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="team-one__title-box">
            <?php if ($name): ?>
                <h4 class="team-one__title">
                    <a href="<?php echo esc_url($link); ?>"><?php echo esc_html($name); ?></a>
                </h4>
            <?php endif; ?>

            <?php if ($position): ?>
                <p class="team-one__sub-title"><?php echo esc_html($position); ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>