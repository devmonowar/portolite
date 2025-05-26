<?php

/**
 * Template part for displaying post meta
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portolite
 */

$categories = get_the_terms($post->ID, 'category');

$portolite_blog_date = get_theme_mod('portolite_blog_date', true);
$portolite_blog_comments = get_theme_mod('portolite_blog_comments', true);
$portolite_blog_author = get_theme_mod('portolite_blog_author', true);
$portolite_blog_cat = get_theme_mod('portolite_blog_cat', true);

?>


<div class="postbox__meta">
    <?php if (!empty($portolite_blog_author)): ?>
        <span><a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><i class="fal fa-user"></i> <?php print get_the_author(); ?></a></span>
    <?php endif; ?>

    <?php if (!empty($portolite_blog_cat)): ?>
        <?php if (!empty($categories[0]->name)): ?>
            <span><i class="icon_tag_alt"></i> <a href="<?php print esc_url(get_category_link($categories[0]->term_id)); ?>"><?php echo esc_html($categories[0]->name); ?></a> </span>
        <?php endif; ?>
    <?php endif; ?>

    <?php if (!empty($portolite_blog_date)): ?>
        <span><i class="fal fa-calendar-check"></i> <?php the_time(get_option('date_format')); ?> </span>
    <?php endif; ?>

    <?php if (!empty($portolite_blog_comments)): ?>
        <span><a href="<?php comments_link(); ?>"><i class="fal fa-comments-alt"></i> <?php comments_number(); ?></a></span>
    <?php endif; ?>
</div>


<!-- 
<div class="blog-details__tag-and-social">
    <div class="blog-details__tag-box">
        <span class="blog-details__tag-title">Tags:</span>
        <div class="blog-details__tag-list">
            <a href="#">Shop</a>
            <a href="#">Car Service</a>
            <a href="#">Car Wash</a>
        </div>
    </div>
    <div class="blog-details__social">
        <a href="#"><span class="icon-facebook-f"></span></a>
        <a href="#"><span class="icon-instagram"></span></a>
        <a href="#"><span class="icon-Vector"></span></a>
        <a href="#"><span class="icon-linkedin-in"></span></a>
    </div>
</div> -->