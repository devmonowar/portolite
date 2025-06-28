<?php

/**
 * Blog post meta info for single post
 *
 * @package portolite
 */

$facebook_url  = get_the_author_meta('portolite_facebook');
$twitter_url   = get_the_author_meta('portolite_twitter');
$linkedin_url  = get_the_author_meta('portolite_linkedin');
$instagram_url = get_the_author_meta('portolite_instagram');
$youtube_url   = get_the_author_meta('portolite_youtube');
$author_id     = get_the_author_meta('ID');
$author_email  = get_the_author_meta('user_email');
$author_url    = get_author_posts_url($author_id);
$author_avatar = get_avatar($author_email, 180, '', '', ['class' => 'media-object img-circle']);

$show_date     = get_theme_mod('portolite_blog_date', true);
$show_comments = get_theme_mod('portolite_blog_comments', true);
$show_author   = get_theme_mod('portolite_blog_author', true);
$show_views    = get_theme_mod('portolite_blog_view', false);
?>

<div class="postbox__meta-wrapper d-flex align-items-center flex-wrap">

    <?php if ($show_author): ?>
        <div class="postbox__meta-item mb-30 dd">
            <div class="postbox__meta-author d-flex align-items-center">
                <div class="postbox__meta-author-thumb">
                    <a href="<?php echo esc_url($author_url); ?>">
                        <?php echo $author_avatar; ?>
                    </a>
                </div>
                <div class="postbox__meta-content">
                    <span class="postbox__meta-type"><?php esc_html_e('Author', 'portolite'); ?></span>
                    <p class="postbox__meta-name">
                        <a href="<?php echo esc_url($author_url); ?>">
                            <?php the_author(); ?>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($show_date): ?>
        <div class="postbox__meta-item mb-30">
            <div class="postbox__meta-content">
                <span class="postbox__meta-type"><?php esc_html_e('Published', 'portolite'); ?></span>
                <p class="postbox__meta-name"><?php the_time(get_option('date_format')); ?></p>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($show_comments): ?>
        <div class="postbox__meta-item mb-30">
            <div class="postbox__meta-content">
                <span class="postbox__meta-type"><?php comments_number(); ?></span>
                <p class="postbox__meta-name">
                    <a href="<?php comments_link(); ?>"><?php esc_html_e('Join the Conversation', 'portolite'); ?></a>
                </p>
            </div>
        </div>
    <?php endif; ?>

    <?php if (function_exists('getPostViews') && $show_views): ?>
        <div class="postbox__meta-item mb-30">
            <div class="postbox__meta-content">
                <span class="postbox__meta-type"><?php esc_html_e('View', 'portolite'); ?></span>
                <p class="postbox__meta-name">
                    <?php echo esc_html(getPostViews(get_the_ID())); ?>
                    <?php esc_html_e('Views', 'portolite'); ?>
                </p>
            </div>
        </div>
    <?php endif; ?>

</div>