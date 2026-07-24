<?php

/**
 * Section: Pricing — Modern
 *
 * Layout: pricing_modern (Page Sections flexible content).
 *
 * @package portolite
 */

$eyebrow = get_sub_field('eyebrow');
$title   = get_sub_field('title');
$lede    = get_sub_field('lede');
?>

<section class="mp-sec mp-sec--light mp-pricing">
    <div class="mp-shell">

        <?php if ($eyebrow || $title || $lede) : ?>
            <div class="mp-head mp-head--center">
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

        <?php if (have_rows('plans')) : ?>
            <div class="mp-pricing__grid">
                <?php while (have_rows('plans')) : the_row();
                    $name     = get_sub_field('name');
                    $price    = get_sub_field('price');
                    $unit     = get_sub_field('unit');
                    $desc     = get_sub_field('description');
                    $featured = get_sub_field('featured');
                    $badge    = get_sub_field('badge_text');
                    $btn_text = get_sub_field('button_text');
                    $btn_url  = get_sub_field('button_url');
                ?>
                    <article class="mp-card mp-plan<?php echo $featured ? ' mp-plan--featured' : ''; ?>">
                        <?php if ($featured && $badge) : ?>
                            <span class="mp-plan__tag"><?php echo esc_html($badge); ?></span>
                        <?php endif; ?>

                        <?php if ($name) : ?>
                            <h3 class="mp-plan__name"><?php echo esc_html($name); ?></h3>
                        <?php endif; ?>

                        <?php if ($price) : ?>
                            <p class="mp-plan__price">
                                <?php echo esc_html($price); ?>
                                <?php if ($unit) : ?>
                                    <small><?php echo esc_html($unit); ?></small>
                                <?php endif; ?>
                            </p>
                        <?php endif; ?>

                        <?php if ($desc) : ?>
                            <p class="mp-plan__desc"><?php echo esc_html($desc); ?></p>
                        <?php endif; ?>

                        <?php if (have_rows('features')) : ?>
                            <ul class="mp-plan__list">
                                <?php while (have_rows('features')) : the_row(); ?>
                                    <li>
                                        <svg width="14" height="14" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                                            <path d="M3.5 8.5l3 3 6-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <?php echo esc_html(get_sub_field('text')); ?>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>

                        <?php if ($btn_text) : ?>
                            <a class="mp-btn <?php echo $featured ? 'mp-btn--solid' : 'mp-btn--ghost'; ?>" href="<?php echo esc_url($btn_url ?: '#'); ?>">
                                <?php echo esc_html($btn_text); ?>
                            </a>
                        <?php endif; ?>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

    </div>
</section>
