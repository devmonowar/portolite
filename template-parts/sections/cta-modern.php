<?php

/**
 * Section: Call to action — Modern
 *
 * Layout: cta_modern (Page Sections flexible content).
 *
 * @package portolite
 */

$title        = get_sub_field('title');
$description  = get_sub_field('description');
$primary_text = get_sub_field('primary_text');
$primary_url  = get_sub_field('primary_url');
$ghost_text   = get_sub_field('ghost_text');
$ghost_url    = get_sub_field('ghost_url');
?>

<section class="mp-sec mp-sec--dark mp-cta">
    <div class="mp-shell">
        <div class="mp-cta__box">
            <div>
                <?php if ($title) : ?>
                    <h2><?php echo wp_kses_post($title); ?></h2>
                <?php endif; ?>
                <?php if ($description) : ?>
                    <p><?php echo esc_html($description); ?></p>
                <?php endif; ?>
            </div>

            <?php if ($primary_text || $ghost_text) : ?>
                <div class="mp-cta__actions">
                    <?php if ($primary_text) : ?>
                        <a class="mp-btn mp-btn--solid" href="<?php echo esc_url($primary_url ?: '#'); ?>">
                            <?php echo esc_html($primary_text); ?>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                                <path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    <?php endif; ?>
                    <?php if ($ghost_text) : ?>
                        <a class="mp-btn mp-btn--ghost" href="<?php echo esc_url($ghost_url ?: '#'); ?>"><?php echo esc_html($ghost_text); ?></a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
