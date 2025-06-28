<?php
// Author meta data
$author_data       = get_the_author_meta('description', get_query_var('author'));
$author_name       = get_the_author_meta('portolite_write_by');
$facebook_url      = get_the_author_meta('portolite_facebook');
$twitter_url       = get_the_author_meta('portolite_twitter');
$linkedin_url      = get_the_author_meta('portolite_linkedin');
$instagram_url     = get_the_author_meta('portolite_instagram');
$portolite_url     = get_the_author_meta('portolite_youtube');
$portolite_write_by = get_the_author_meta('portolite_write_by');
$author_bio_avatar_size = 180;

// Category and blog settings
$categories             = get_the_terms($post->ID, 'category');
$portolite_blog_date    = get_theme_mod('portolite_blog_date', true);
$portolite_blog_comments = get_theme_mod('portolite_blog_comments', true);
$portolite_blog_author  = get_theme_mod('portolite_blog_author', true);
$portolite_blog_cat     = get_theme_mod('portolite_blog_cat', false);
$portolite_blog_view    = get_theme_mod('portolite_blog_view', false);

// Track post view count
if (function_exists('setPostViews')) {
    setPostViews(get_the_ID());
}
?>

<div class="search__blog-bottom d-flex flex-wrap align-items-center mb-20">

    <?php if (!empty(get_author_posts_url(get_the_author_meta('ID'))) && !empty($portolite_blog_author)) : ?>
        <div class="search__blog-meta-author d-flex align-items-center mr-45">
            <?php
            $author_avatar = get_avatar(get_the_author_meta('user_email'), $author_bio_avatar_size, '', '', ['class' => 'media-object img-circle']);
            if (!empty($author_avatar)) :
            ?>
                <div class="search__blog-meta-author-thumb">
                    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                        <?php echo $author_avatar; ?>
                    </a>
                </div>
            <?php endif; ?>
            <div class="search__blog-meta-author-content">
                <span>
                    <?php esc_html_e('By', 'portolite'); ?>
                    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                        <?php echo esc_html(get_the_author()); ?>
                    </a>
                </span>
            </div>
        </div>
    <?php endif; ?>

    <div class="search__blog-meta">
        <!-- Comments count -->
        <span>
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="..." stroke="#7A7E83" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <?php echo get_comments_number(); ?>
        </span>

        <!-- View count -->
        <?php if (function_exists('getPostViews') && !empty($portolite_blog_view)) : ?>
            <span>
                <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="..." stroke="#7A7E83" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="..." stroke="#7A7E83" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <?php echo getPostViews(get_the_ID()); ?>
                <?php esc_html_e('Views', 'portolite'); ?>
            </span>
        <?php endif; ?>
    </div>
</div>