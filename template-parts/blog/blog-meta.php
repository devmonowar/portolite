<?php
$categories = get_the_terms(get_the_ID(), 'category');

$portolite_blog_date     = get_theme_mod('portolite_blog_date', true);
$portolite_blog_comments = get_theme_mod('portolite_blog_comments', true);
$portolite_blog_author   = get_theme_mod('portolite_blog_author', true);
$portolite_blog_cat      = get_theme_mod('portolite_blog_cat', true);
?>

<ul class="blog-details__meta list-unstyled">

    <?php if (!empty($portolite_blog_date)) : ?>
        <li>
            <span class="icon-calendar"></span>
            <span><?php echo get_the_date(); ?></span>
        </li>
    <?php endif; ?>

    <?php if (!empty($portolite_blog_author)) : ?>
        <li>
            <span class="icon-user-2"></span>
            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                <?php echo esc_html(get_the_author()); ?>
            </a>
        </li>
    <?php endif; ?>

    <?php if (!empty($portolite_blog_cat) && !empty($categories) && !is_wp_error($categories)) : ?>
        <li>
            <span class="icon-folder"></span>
            <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>">
                <?php echo esc_html($categories[0]->name); ?>
            </a>
        </li>
    <?php endif; ?>

</ul>