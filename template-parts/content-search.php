<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portolite
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class('blog-list__single search__blog-item mb-30'); ?>>

    <?php if (has_post_thumbnail()) : ?>
        <div class="blog-list__img-box">
            <div class="blog-list__img">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('full'); ?>
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

        <?php get_template_part('template-parts/blog/blog-btn'); ?>
    </div>

</article>