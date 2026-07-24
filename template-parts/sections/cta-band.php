<?php

/**
 * Section: CTA band — full width, image behind
 *
 * Layout: cta_band (Page Sections flexible content).
 *
 * The background is a real <img> rather than a CSS background, so it gets
 * srcset and can be prioritised or lazy-loaded like any other image. The
 * parallax is `background-attachment`-free: a scaled, fixed-position image
 * inside a clipping wrapper, which behaves on iOS where the CSS property does
 * not, and which stops moving under prefers-reduced-motion.
 *
 * @package portolite
 */

$background  = get_sub_field('background');
$button_text = get_sub_field('button_text');
$button_url  = get_sub_field('button_url');
$phone       = get_sub_field('phone');
?>

<section class="mp-band">
    <?php if ($background) : ?>
        <div class="mp-band__bg" aria-hidden="true">
            <?php portolite_the_image($background, 'full', ['alt' => '', 'class' => 'mp-band__bg-img']); ?>
        </div>
    <?php endif; ?>

    <div class="mp-shell mp-band__inner">
        <?php portolite_mp_head(['modifiers' => 'mp-head--center mp-head--flush']); ?>

        <?php if ($button_text || $phone) : ?>
            <div class="mp-band__actions">
                <?php if ($button_text) : ?>
                    <a class="mp-btn mp-btn--solid" href="<?php echo esc_url($button_url ?: '#'); ?>">
                        <?php echo esc_html($button_text); ?>
                    </a>
                <?php endif; ?>

                <?php if ($phone) : ?>
                    <a class="mp-band__phone" href="<?php echo esc_url('tel:' . preg_replace('/[^0-9+]/', '', $phone)); ?>">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M22 16.9v3a2 2 0 01-2.2 2 19.8 19.8 0 01-8.6-3.1 19.5 19.5 0 01-6-6A19.8 19.8 0 012.1 4.2 2 2 0 014.1 2h3a2 2 0 012 1.7c.1 1 .4 1.9.7 2.8a2 2 0 01-.5 2.1L8.1 9.9a16 16 0 006 6l1.3-1.2a2 2 0 012.1-.5c.9.3 1.8.6 2.8.7a2 2 0 011.7 2z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span><?php echo esc_html($phone); ?></span>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
