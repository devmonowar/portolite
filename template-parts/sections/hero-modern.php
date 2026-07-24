<?php

/**
 * Section: Hero — Modern
 *
 * Layout: hero_modern (Page Sections flexible content).
 *
 * @package portolite
 */

$eyebrow      = get_sub_field('eyebrow');
$title_lead   = get_sub_field('title_lead');
$title_accent = get_sub_field('title_accent');
$deck         = get_sub_field('deck');
$primary_text = get_sub_field('primary_text');
$primary_url  = get_sub_field('primary_url');
$ghost_text   = get_sub_field('ghost_text');
$ghost_url    = get_sub_field('ghost_url');
$image        = get_sub_field('image');
$badge_title  = get_sub_field('badge_title');
$badge_text   = get_sub_field('badge_text');
$chips_label  = get_sub_field('chips_label');
?>

<section class="hero-modern">
    <div class="hero-modern__shell">
        <div class="hero-modern__grid">

            <div class="hero-modern__copy">
                <?php if ($eyebrow) : ?>
                    <span class="hero-modern__eyebrow hero-modern__reveal">
                        <span class="hero-modern__pulse" aria-hidden="true"></span>
                        <?php echo esc_html($eyebrow); ?>
                    </span>
                <?php endif; ?>

                <?php if ($title_lead || $title_accent) : ?>
                    <?php
                    // The hero is the page's main heading, but only when the page
                    // header is switched off — otherwise the breadcrumb title is
                    // already the h1 and a second one would be invalid.
                    $hero_tag = (function_exists('portolite_has_breadcrumb') && portolite_has_breadcrumb()) ? 'h2' : 'h1';
                    ?>
                    <<?php echo $hero_tag; ?> class="hero-modern__title hero-modern__reveal hero-modern__reveal--2">
                        <?php echo esc_html($title_lead); ?>
                        <?php if ($title_accent) : ?>
                            <em class="hero-modern__accent"><?php echo esc_html($title_accent); ?></em>
                        <?php endif; ?>
                    </<?php echo $hero_tag; ?>>
                <?php endif; ?>

                <?php if ($deck) : ?>
                    <p class="hero-modern__deck hero-modern__reveal hero-modern__reveal--3"><?php echo esc_html($deck); ?></p>
                <?php endif; ?>

                <?php if ($primary_text || $ghost_text) : ?>
                    <div class="hero-modern__actions hero-modern__reveal hero-modern__reveal--4">
                        <?php if ($primary_text) : ?>
                            <a class="hero-modern__btn hero-modern__btn--solid" href="<?php echo esc_url($primary_url ?: '#'); ?>">
                                <?php echo esc_html($primary_text); ?>
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                                    <path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        <?php endif; ?>
                        <?php if ($ghost_text) : ?>
                            <a class="hero-modern__btn hero-modern__btn--ghost" href="<?php echo esc_url($ghost_url ?: '#'); ?>"><?php echo esc_html($ghost_text); ?></a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if (have_rows('trust_items')) : ?>
                    <div class="hero-modern__trust hero-modern__reveal hero-modern__reveal--4">
                        <span class="hero-modern__stars" aria-hidden="true">
                            <?php for ($star = 0; $star < 5; $star++) : ?>
                                <svg width="15" height="15" viewBox="0 0 16 16" fill="currentColor">
                                    <path d="M8 1.6l1.9 3.9 4.3.6-3.1 3 .7 4.3L8 11.4l-3.8 2 .7-4.3-3.1-3 4.3-.6L8 1.6z" />
                                </svg>
                            <?php endfor; ?>
                        </span>
                        <?php $trust_index = 0; ?>
                        <?php while (have_rows('trust_items')) : the_row(); ?>
                            <?php if ($trust_index++) : ?>
                                <span class="hero-modern__trust-sep" aria-hidden="true"></span>
                            <?php endif; ?>
                            <span><b><?php echo esc_html(get_sub_field('strong')); ?></b> <?php echo esc_html(get_sub_field('text')); ?></span>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if ($image) : ?>
                <div class="hero-modern__media hero-modern__reveal hero-modern__reveal--3">
                    <div class="hero-modern__frame">
                        <?php
                        // The hero is the LCP candidate, so it opts out of lazy
                        // loading and asks for priority.
                        portolite_the_image($image, 'portolite-hero', [
                            'alt'           => $title_lead,
                            'loading'       => 'eager',
                            'fetchpriority' => 'high',
                            'sizes'         => '(max-width: 991px) 100vw, 50vw',
                        ]);
                        ?>
                    </div>

                    <?php if ($badge_title || $badge_text) : ?>
                        <div class="hero-modern__badge">
                            <span class="hero-modern__badge-icon" aria-hidden="true">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8" />
                                    <path d="M12 7v5l3.2 1.9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                            <span>
                                <?php if ($badge_title) : ?>
                                    <span class="hero-modern__badge-title"><?php echo esc_html($badge_title); ?></span>
                                <?php endif; ?>
                                <?php if ($badge_text) : ?>
                                    <span class="hero-modern__badge-text"><?php echo esc_html($badge_text); ?></span>
                                <?php endif; ?>
                            </span>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        </div>

        <?php if (have_rows('chips')) : ?>
            <div class="hero-modern__strip">
                <?php if ($chips_label) : ?>
                    <span class="hero-modern__strip-label"><?php echo esc_html($chips_label); ?></span>
                <?php endif; ?>
                <?php while (have_rows('chips')) : the_row(); ?>
                    <a class="hero-modern__chip" href="<?php echo esc_url(get_sub_field('url') ?: '#'); ?>"><?php echo esc_html(get_sub_field('label')); ?></a>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
