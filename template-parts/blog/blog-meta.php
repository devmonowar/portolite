<?php

/**
 * Post meta for blog details (date, author, category)
 *
 * @package portolite
 */

$categories = get_the_terms(get_the_ID(), 'category');

$show_date     = get_theme_mod('portolite_blog_date', true);
$show_author   = get_theme_mod('portolite_blog_author', true);
$show_category = get_theme_mod('portolite_blog_cat', true);
?>

<ul class="blog-details__meta list-unstyled">

    <?php if ($show_date): ?>
        <li>
            <span class="icon-calendar"></span>
            <span><?php echo esc_html(get_the_date(get_option('date_format'))); ?></span>
        </li>
    <?php endif; ?>

    <?php if ($show_author): ?>
        <li>
            <span class="icon-user-2"></span>
            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                <?php echo esc_html(get_the_author()); ?>
            </a>
        </li>
    <?php endif; ?>

    <?php if ($show_category && !empty($categories) && !is_wp_error($categories)) : ?>
        <li>
            <span class="icon-folder"></span>
            <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>">
                <?php echo esc_html($categories[0]->name); ?>
            </a>
        </li>
    <?php endif; ?>

</ul>