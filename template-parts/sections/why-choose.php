<?php

/**
 * Section: Why choose us
 *
 * Layout: why_choose (Page Sections flexible content).
 *
 * @package portolite
 */

$tone        = get_sub_field('tone') ?: 'light';
$image       = get_sub_field('image');
$stat_value  = get_sub_field('stat_value');
$stat_label  = get_sub_field('stat_label');
$button_text = get_sub_field('button_text');
$button_url  = get_sub_field('button_url');
?>

<section class="mp-sec mp-sec--<?php echo esc_attr($tone); ?> mp-why">
    <div class="mp-shell">
        <?php // Without an image the two-column grid would leave half the row empty. ?>
        <div class="mp-why__grid<?php echo $image ? '' : ' mp-why__grid--solo'; ?>">

            <?php if ($image) : ?>
                <div class="mp-why__media">
                    <div class="mp-why__frame">
                        <?php portolite_the_image($image, 'large', ['class' => 'mp-why__img']); ?>
                    </div>

                    <?php if ($stat_value) : ?>
                        <div class="mp-why__badge">
                            <strong class="mp-why__badge-value"><?php echo esc_html($stat_value); ?></strong>
                            <?php if ($stat_label) : ?>
                                <span class="mp-why__badge-label"><?php echo esc_html($stat_label); ?></span>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="mp-why__body">
                <?php portolite_mp_head(['modifiers' => 'mp-head--flush']); ?>

                <?php if (have_rows('points')) : ?>
                    <ul class="mp-why__points">
                        <?php while (have_rows('points')) : the_row();
                            $icon  = get_sub_field('icon_class');
                            $title = get_sub_field('title');
                            $text  = get_sub_field('description');
                        ?>
                            <li class="mp-why__point">
                                <span class="mp-card__icon mp-why__point-icon" aria-hidden="true">
                                    <?php if ($icon) : ?>
                                        <span class="<?php echo esc_attr($icon); ?>"></span>
                                    <?php else : ?>
                                        <svg width="18" height="18" viewBox="0 0 16 16" fill="none">
                                            <path d="M3 8.5l3.2 3.2L13 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    <?php endif; ?>
                                </span>
                                <div>
                                    <?php if ($title) : ?>
                                        <h3 class="mp-why__point-title"><?php echo esc_html($title); ?></h3>
                                    <?php endif; ?>
                                    <?php if ($text) : ?>
                                        <p class="mp-why__point-text"><?php echo esc_html($text); ?></p>
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>

                <?php if ($button_text) : ?>
                    <a class="mp-btn mp-btn--solid mp-why__btn" href="<?php echo esc_url($button_url ?: '#'); ?>">
                        <?php echo esc_html($button_text); ?>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                            <path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
