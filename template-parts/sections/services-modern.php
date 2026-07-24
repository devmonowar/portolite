<?php

/**
 * Section: Services — Modern
 *
 * Layout: services_modern (Page Sections flexible content).
 *
 * @package portolite
 */

$eyebrow = get_sub_field('eyebrow');
$title   = get_sub_field('title');
$lede    = get_sub_field('lede');
?>

<section class="mp-sec mp-sec--dark mp-services">
    <div class="mp-shell">

        <?php if ($eyebrow || $title || $lede) : ?>
            <div class="mp-head">
                <?php if ($eyebrow) : ?>
                    <span class="mp-eyebrow"><?php echo esc_html($eyebrow); ?></span>
                <?php endif; ?>
                <?php if ($title) : ?>
                    <h2 class="mp-title"><?php echo wp_kses_post($title); ?></h2>
                <?php endif; ?>
                <?php if ($lede) : ?>
                    <p class="mp-lede"><?php echo esc_html($lede); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if (have_rows('items')) : ?>
            <div class="mp-services__grid">
                <?php while (have_rows('items')) : the_row();
                    $icon      = get_sub_field('icon_class');
                    $item      = get_sub_field('title');
                    $desc      = get_sub_field('description');
                    $link_text = get_sub_field('link_text');
                    $link      = get_sub_field('link');
                ?>
                    <article class="mp-card mp-services__card">
                        <?php if ($icon) : ?>
                            <span class="mp-card__icon" aria-hidden="true"><span class="<?php echo esc_attr($icon); ?>"></span></span>
                        <?php endif; ?>

                        <?php if ($item) : ?>
                            <h3><?php echo esc_html($item); ?></h3>
                        <?php endif; ?>

                        <?php if ($desc) : ?>
                            <p><?php echo esc_html($desc); ?></p>
                        <?php endif; ?>

                        <?php if ($link_text) : ?>
                            <a class="mp-services__link" href="<?php echo esc_url($link ?: '#'); ?>">
                                <?php echo esc_html($link_text); ?>
                                <svg width="14" height="14" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                                    <path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        <?php endif; ?>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

    </div>
</section>
