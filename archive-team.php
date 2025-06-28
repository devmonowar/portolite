<?php

/**
 * Template for displaying the Team custom post type archive
 *
 * Redirects to homepage if not viewing the actual 'team' archive.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portolite
 */


if (!is_post_type_archive('team')) {
    wp_redirect(home_url());
    exit;
}

?>

<?php get_header(); ?>

<section class="team-one pt-120 pb-120">
    <div class="container">
        <div class="row">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <?php get_template_part('template-parts/team/team-card', null, ['team_id' => get_the_ID()]); ?>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <div class="col-12">
                    <div class="alert alert-warning text-center">
                        <?php esc_html_e('No team members found.', 'portolite'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <?php if (have_posts()) : ?>
            <div class="row">
                <div class="col-12 text-center mt-4">
                    <?php
                    if (function_exists('portolite_pagination')) {
                        portolite_pagination('<i class="icon-arrow-left"></i>', '<i class="icon-arrow-right"></i>');
                    } else {
                        the_posts_pagination([
                            'prev_text' => '<i class="icon-arrow-left"></i>',
                            'next_text' => '<i class="icon-arrow-right"></i>',
                        ]);
                    }
                    ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>