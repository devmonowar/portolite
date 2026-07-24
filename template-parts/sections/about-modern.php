<?php

/**
 * Section: About — Modern
 *
 * Layout: about_modern (Page Sections flexible content).
 *
 * @package portolite
 */

$eyebrow    = get_sub_field('eyebrow');
$title      = get_sub_field('title');
$lede       = get_sub_field('lede');
$image      = get_sub_field('image');
$stat_num   = get_sub_field('stat_number');
$stat_label = get_sub_field('stat_label');
?>

<section class="mp-sec mp-sec--light mp-about">
    <div class="mp-shell">
        <div class="mp-about__grid">

            <?php if ($image) : ?>
                <div class="mp-about__media">
                    <?php
                    // No loading/decoding here: core sets them, and passing our
                    // own produced a duplicate attribute in the markup.
                    portolite_the_image($image, 'portolite-hero', [
                        'alt'   => $title,
                        'sizes' => '(max-width: 991px) 100vw, 45vw',
                    ]);
                    ?>
                    <?php if ($stat_num || $stat_label) : ?>
                        <div class="mp-about__stat">
                            <b><?php echo esc_html($stat_num); ?></b>
                            <span><?php echo esc_html($stat_label); ?></span>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="mp-about__copy">
                <?php if ($eyebrow) : ?>
                    <span class="mp-eyebrow"><?php echo esc_html($eyebrow); ?></span>
                <?php endif; ?>
                <?php if ($title) : ?>
                    <h2 class="mp-title"><?php echo wp_kses_post($title); ?></h2>
                <?php endif; ?>
                <?php if ($lede) : ?>
                    <p class="mp-lede"><?php echo esc_html($lede); ?></p>
                <?php endif; ?>

                <?php if (have_rows('points')) : ?>
                    <ul class="mp-about__list">
                        <?php while (have_rows('points')) : the_row(); ?>
                            <li>
                                <span class="mp-about__tick" aria-hidden="true">
                                    <svg width="14" height="14" viewBox="0 0 16 16" fill="none">
                                        <path d="M3.5 8.5l3 3 6-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <span>
                                    <strong><?php echo esc_html(get_sub_field('title')); ?></strong>
                                    <span><?php echo esc_html(get_sub_field('description')); ?></span>
                                </span>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
