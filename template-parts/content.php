<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portolite
 */

$portolite_audio_url = function_exists('get_field') ? get_field('fromate_style') : NULL;
$gallery_images = function_exists('get_field') ? get_field('gallery_images') : '';
$portolite_video_url = function_exists('get_field') ? get_field('fromate_style') : NULL;

$portolite_blog_single_social = get_theme_mod('portolite_blog_single_social', false);
$blog_tag_col = $portolite_blog_single_social ? 'col-xl-7' : 'col-xl-12';


if (is_single()) : ?>

    <!-- details start -->
    <article id="post-<?php the_ID(); ?>" <?php post_class('blog-list__single format-standard'); ?>>

        <?php if (has_post_thumbnail()) : ?>
            <div class="blog-details__img-box">
                <div class="blog-details__img">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('full'); ?>
                    </a>
                </div>
                <ul class="blog-list__meta list-unstyled">
                    <li>
                        <p><span class="icon-calendar"></span><?php echo get_the_date(); ?></p>
                    </li>
                    <li>
                        <p><span class="icon-user-2"></span>By <?php the_author(); ?></p>
                    </li>
                </ul>
            </div>
        <?php endif; ?>

        <div class="blog-list__content">

            <?php get_template_part('template-parts/blog/blog-meta'); ?>

            <h3 class="blog-list__title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>

            <div class="blog-list__btn-box">
                <?php the_content(); ?>

                <!-- blog btn -->
                <?php get_template_part('template-parts/blog/blog-btn'); ?>
            </div>
        </div>
    </article>
    <!-- details end -->




<?php else: ?>




    <!--Blog List Single Start-->
    <article id="post-<?php the_ID(); ?>" <?php post_class('blog-list__single format-standard'); ?>>

        <?php if (has_post_thumbnail()) : ?>
            <div class="blog-list__img-box">
                <div class="blog-list__img">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('full'); ?>
                    </a>
                </div>
                <ul class="blog-list__meta list-unstyled">
                    <li>
                        <p><span class="icon-calendar"></span><?php echo get_the_date(); ?></p>
                    </li>
                    <li>
                        <p><span class="icon-user-2"></span>By <?php the_author(); ?></p>
                    </li>
                </ul>
            </div>
        <?php endif; ?>

        <div class="blog-list__content">

            <?php get_template_part('template-parts/blog/blog-meta'); ?>

            <h3 class="blog-list__title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>

            <div class="blog-list__btn-box">
                <?php the_excerpt(); ?>

                <!-- blog btn -->
                <?php get_template_part('template-parts/blog/blog-btn'); ?>
            </div>
        </div>
    </article>
    <!--Blog List Single End-->











<?php endif; ?>