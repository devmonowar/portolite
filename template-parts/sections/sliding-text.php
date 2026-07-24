<?php

/**
 * Section: Sliding text — a marquee band
 *
 * Layout: sliding_text (Page Sections flexible content).
 *
 * The phrases are printed twice into one track and the track is translated by
 * exactly -50%, which is what makes the loop seamless. The second copy carries
 * aria-hidden, so a screen reader reads the list once.
 *
 * No JavaScript and no marquee plugin: the animation is one keyframe, and the
 * duration tokens already zero it under prefers-reduced-motion.
 *
 * @package portolite
 */

$tone      = get_sub_field('tone') ?: 'accent';
$direction = get_sub_field('direction') ?: 'left';

$phrases = [];
if (have_rows('items')) {
    while (have_rows('items')) {
        the_row();
        $text = get_sub_field('text');
        if ($text) {
            $phrases[] = $text;
        }
    }
}

if (!$phrases) {
    return;
}
?>

<section class="mp-slide mp-slide--<?php echo esc_attr($tone); ?> mp-slide--<?php echo esc_attr($direction); ?>">
    <div class="mp-slide__track">
        <?php for ($copy = 0; $copy < 2; $copy++) : ?>
            <ul class="mp-slide__list"<?php echo $copy ? ' aria-hidden="true"' : ''; ?>>
                <?php foreach ($phrases as $phrase) : ?>
                    <li class="mp-slide__item">
                        <?php echo esc_html($phrase); ?>
                        <span class="mp-slide__dot" aria-hidden="true"></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endfor; ?>
    </div>
</section>
