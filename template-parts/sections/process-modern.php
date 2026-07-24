<?php

/**
 * Section: Process — Modern
 *
 * Layout: process_modern (Page Sections flexible content).
 *
 * @package portolite
 */

?>

<section class="mp-sec mp-sec--dark mp-process">
    <div class="mp-shell">

        <?php portolite_mp_head(['modifiers' => 'mp-head--center']); ?>

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
