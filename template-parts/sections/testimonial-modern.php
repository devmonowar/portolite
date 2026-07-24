<?php

/**
 * Section: Testimonials — Modern
 *
 * Layout: testimonial_modern (Page Sections flexible content).
 *
 * @package portolite
 */

$eyebrow = get_sub_field('eyebrow');
$title   = get_sub_field('title');
?>

<section class="mp-sec mp-sec--dark mp-quotes">
    <div class="mp-shell">

        <?php if ($eyebrow || $title) : ?>
            <div class="mp-head">
                <?php if ($eyebrow) : ?>
                    <span class="mp-eyebrow"><?php echo esc_html($eyebrow); ?></span>
                <?php endif; ?>
                <?php if ($title) : ?>
                    <h2 class="mp-title"><?php echo wp_kses_post($title); ?></h2>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if (have_rows('items')) : ?>
            <div class="mp-quotes__grid">
                <?php while (have_rows('items')) : the_row();
                    $quote = get_sub_field('quote');
                    $name  = get_sub_field('name');
                    $role  = get_sub_field('role');
                    $photo = get_sub_field('photo');
                ?>
                    <figure class="mp-card mp-quote">
                        <span class="mp-quote__stars" aria-hidden="true">
                            <?php for ($star = 0; $star < 5; $star++) : ?>
                                <svg width="15" height="15" viewBox="0 0 16 16" fill="currentColor">
                                    <path d="M8 1.6l1.9 3.9 4.3.6-3.1 3 .7 4.3L8 11.4l-3.8 2 .7-4.3-3.1-3 4.3-.6L8 1.6z" />
                                </svg>
                            <?php endfor; ?>
                        </span>

                        <?php if ($quote) : ?>
                            <blockquote class="mp-quote__text"><?php echo esc_html($quote); ?></blockquote>
                        <?php endif; ?>

                        <figcaption class="mp-quote__who">
                            <?php if ($photo) : ?>
                                <?php portolite_the_image($photo, 'portolite-avatar', ['class' => 'mp-quote__avatar', 'alt' => $name]); ?>
                            <?php elseif ($name) : ?>
                                <span class="mp-quote__avatar" aria-hidden="true"><?php echo esc_html(mb_substr($name, 0, 1)); ?></span>
                            <?php endif; ?>
                            <span>
                                <strong><?php echo esc_html($name); ?></strong>
                                <span><?php echo esc_html($role); ?></span>
                            </span>
                        </figcaption>
                    </figure>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

    </div>
</section>
