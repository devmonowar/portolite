<?php

/**
 * Template part for displaying a message when no posts are found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package portolite
 */
?>

<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title blog-search-title no-results-title">
            <?php esc_html_e('Nothing Found', 'portolite'); ?>
        </h1>
    </header><!-- .page-header -->

    <div class="page-content blog-search-content">
        <?php
        // Case: On homepage and user has permission to publish posts
        if (is_home() && current_user_can('publish_posts')) :

            printf(
                '<p>' . wp_kses(
                    /* translators: 1: link to WP admin new post page. */
                    __('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'portolite'),
                    [
                        'a' => [
                            'href' => [],
                        ],
                    ]
                ) . '</p>',
                esc_url(admin_url('post-new.php'))
            );

        // Case: It's a search and no results found
        elseif (is_search()) :
        ?>
            <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'portolite'); ?></p>
            <?php get_search_form(); ?>

        <?php
        // Default fallback if no content found
        else :
        ?>
            <p><?php esc_html_e('It seems we can’t find what you’re looking for. Perhaps searching can help.', 'portolite'); ?></p>
            <?php get_search_form(); ?>
        <?php endif; ?>
    </div><!-- .page-content -->
</section><!-- .no-results -->