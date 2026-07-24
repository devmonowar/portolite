<?php

/**
 * Section: Feature list — hover rows
 *
 * Layout: feature_list (Page Sections flexible content).
 *
 * Each row reveals its preview image on hover. The reveal is driven by :hover
 * and :focus-within on the row itself, so it works for a keyboard user and
 * needs no JavaScript; on touch, where neither fires, the image simply stays
 * hidden and the rows read as a list, which is the right thing on a phone.
 *
 * @package portolite
 */

$tone = get_sub_field('tone') ?: 'dark';

if (!have_rows('rows')) {
    return;
}
?>

<section class="mp-sec mp-sec--<?php echo esc_attr($tone); ?> mp-feature">
    <div class="mp-shell">

        <?php portolite_mp_head(); ?>

        <ul class="mp-feature__rows">
            <?php $row_no = 0; ?>
            <?php while (have_rows('rows')) : the_row();
                $title = get_sub_field('title');
                $text  = get_sub_field('description');
                $image = get_sub_field('image');
                $url   = get_sub_field('url');
                $row_no++;

                if (!$title) {
                    continue;
                }
            ?>
                <li class="mp-feature__row">
                    <?php
                    // The row is one grid either way; only the element changes,
                    // so the layout does not need a second set of rules.
                    $tag  = $url ? 'a' : 'div';
                    $href = $url ? ' href="' . esc_url($url) . '"' : '';
                    ?>
                    <<?php echo $tag . $href; ?> class="mp-feature__link">

                        <span class="mp-feature__num" aria-hidden="true"><?php echo esc_html(str_pad(number_format_i18n($row_no), 2, '0', STR_PAD_LEFT)); ?></span>

                        <span class="mp-feature__text">
                            <span class="mp-feature__title"><?php echo esc_html($title); ?></span>
                            <?php if ($text) : ?>
                                <span class="mp-feature__desc"><?php echo esc_html($text); ?></span>
                            <?php endif; ?>
                        </span>

                        <?php if ($url) : ?>
                            <svg class="mp-feature__arrow" width="20" height="20" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                                <path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        <?php endif; ?>
                    </<?php echo $tag; ?>>

                    <?php if ($image) : ?>
                        <span class="mp-feature__preview" aria-hidden="true">
                            <?php portolite_the_image($image, 'medium_large', ['alt' => '']); ?>
                        </span>
                    <?php endif; ?>
                </li>
            <?php endwhile; ?>
        </ul>

    </div>
</section>
