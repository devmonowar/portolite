<?php

/**
 * Template part for displaying posts
 *
 * @package portolite
 */

$portolite_blog_single_social = get_theme_mod('portolite_blog_single_social', false);
?>

<?php if (is_single()) : ?>

    <!-- details start -->
    <article id="post-<?php the_ID(); ?>" <?php post_class('blog-list__single format-standard'); ?>>

        <?php if (has_post_thumbnail()) : ?>
            <div class="blog-details__img-box">
                <div class="blog-details__img">
                    <?php
                    // Featured image of a single post: above the fold, so it is the
                    // LCP candidate. 'full' shipped the untouched original.
                    the_post_thumbnail('portolite-hero', [
                        'loading'       => 'eager',
                        'fetchpriority' => 'high',
                    ]);
                    ?>
                </div>
                <?php get_template_part('template-parts/blog/blog-meta'); ?>
            </div>
        <?php endif; ?>

        <div class="blog-details__content">
            <?php // h2, not h3 — the page header above already provides the h1. ?>
            <h2 class="blog-details__title-1"><?php the_title(); ?></h2>
            <?php the_content(); ?>

            <?php if (!empty($portolite_blog_single_social)): ?>
                <?php get_template_part('template-parts/blog/blog-tags-social'); ?>
            <?php endif; ?>

        </div>

    </article>
    <!-- details end -->

<?php else: ?>

    <!--Blog List Start-->
    <article id="post-<?php the_ID(); ?>" <?php post_class('blog-list__single format-standard'); ?>>

        <?php if (has_post_thumbnail()) : ?>
            <div class="blog-list__img-box">
                <div class="blog-list__img">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('portolite-card'); ?>
                    </a>
                </div>
                <?php get_template_part('template-parts/blog/blog-meta'); ?>
            </div>
        <?php endif; ?>

        <div class="blog-list__content">
            <h3 class="blog-list__title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>

            <div class="blog-list_excerpt">
                <?php the_excerpt(); ?>
            </div>

            <!-- blog btn -->
            <?php get_template_part('template-parts/blog/blog-btn'); ?>
        </div>
    </article>
    <!--Blog List End-->

<?php endif; ?>