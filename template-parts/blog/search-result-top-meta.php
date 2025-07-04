<?php
// Author & social meta data
$author_data          = get_the_author_meta('description', get_query_var('author'));
$author_name          = get_the_author_meta('portolite_write_by');
$facebook_url         = get_the_author_meta('portolite_facebook');
$twitter_url          = get_the_author_meta('portolite_twitter');
$linkedin_url         = get_the_author_meta('portolite_linkedin');
$instagram_url        = get_the_author_meta('portolite_instagram');
$portolite_url        = get_the_author_meta('portolite_youtube');
$portolite_write_by   = get_the_author_meta('portolite_write_by');
$author_bio_avatar_size = 180;

// Blog display settings & category terms
$categories              = get_the_terms($post->ID, 'category');
$portolite_blog_date     = get_theme_mod('portolite_blog_date', true);
$portolite_blog_comments = get_theme_mod('portolite_blog_comments', true);
$portolite_blog_author   = get_theme_mod('portolite_blog_author', true);
$portolite_blog_cat      = get_theme_mod('portolite_blog_cat', false);
$portolite_blog_view     = get_theme_mod('portolite_blog_view', false);
?>

<div class="search__blog-meta-wrapper d-flex flex-wrap align-items-center">

    <?php if (!empty($categories[0]->name)) : ?>
        <!-- Blog post category -->
        <div class="search__blog-tag mr-15">
            <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>">
                <?php echo esc_html($categories[0]->name); ?>
            </a>
        </div>
    <?php endif; ?>

    <?php if (!empty($portolite_blog_date)) : ?>
        <!-- Blog post publish date -->
        <div class="search__blog-meta">
            <span>
                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.5 14C11.0899 14 14 11.0899 14 7.5C14 3.91015 11.0899 1 7.5 1C3.91015 1 1 3.91015 1 7.5C1 11.0899 3.91015 14 7.5 14Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M7.5 3.59961V7.49961L10.1 8.79961" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <?php the_time(get_option('date_format')); ?>
            </span>
        </div>
    <?php endif; ?>

</div>