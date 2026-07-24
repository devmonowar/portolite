<?php

/**
 * Section: Process — Modern
 *
 * Layout: process_modern (Page Sections flexible content).
 *
 * @package portolite
 */

$eyebrow = get_sub_field('eyebrow');
$title   = get_sub_field('title');
?>

<section class="mp-sec mp-sec--dark mp-process">
    <div class="mp-shell">

        <?php if ($eyebrow || $title) : ?>
            <div class="mp-head mp-head--center">
                <?php if ($eyebrow) : ?>
                    <span class="mp-eyebrow"><?php echo esc_html($eyebrow); ?></span>
                <?php endif; ?>
                <?php if ($title) : ?>
                    <h2 class="mp-title"><?php echo wp_kses_post($title); ?></h2>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if (have_rows('steps')) : ?>
            <div class="mp-process__grid">
                <?php $step_no = 0; ?>
                <?php while (have_rows('steps')) : the_row(); ?>
                    <article class="mp-process__step">
                        <span class="mp-process__num" aria-hidden="true"><?php echo esc_html(number_format_i18n(++$step_no)); ?></span>
                        <h3><?php echo esc_html(get_sub_field('title')); ?></h3>
                        <p><?php echo esc_html(get_sub_field('description')); ?></p>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

    </div>
</section>
