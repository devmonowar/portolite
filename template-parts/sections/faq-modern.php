<?php

/**
 * Section: FAQ — Modern
 *
 * Layout: faq_modern (Page Sections flexible content).
 * Uses native <details> elements, so the accordion works without JavaScript.
 *
 * @package portolite
 */

$eyebrow = get_sub_field('eyebrow');
$title   = get_sub_field('title');
$lede    = get_sub_field('lede');
?>

<section class="mp-sec mp-sec--light mp-faq">
    <div class="mp-shell">
        <div class="mp-faq__grid">

            <div class="mp-head mp-head--flush">
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

            <?php if (have_rows('items')) : ?>
                <div class="mp-faq__list">
                    <?php $faq_no = 0; ?>
                    <?php while (have_rows('items')) : the_row(); ?>
                        <details class="mp-faq__item" <?php echo 0 === $faq_no++ ? ' open' : ''; ?>>
                            <summary class="mp-faq__q"><?php echo esc_html(get_sub_field('question')); ?></summary>
                            <p class="mp-faq__a"><?php echo esc_html(get_sub_field('answer')); ?></p>
                        </details>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>
