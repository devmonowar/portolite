<?php
// Get author meta data
$author_data      = get_the_author_meta('description', get_query_var('author'));
$author_info      = get_the_author_meta('portolite_write_by');
$facebook_url     = get_the_author_meta('portolite_facebook');
$twitter_url      = get_the_author_meta('portolite_twitter');
$linkedin_url     = get_the_author_meta('portolite_linkedin');
$instagram_url    = get_the_author_meta('portolite_instagram');
$youtube_url      = get_the_author_meta('portolite_youtube');
$author_avatar_sz = 180;

// Only show author bio box if description is available
if (!empty($author_data)) :
?>

    <div class="postbox__author d-sm-flex align-items-start white-bg mb-95">
        <!-- Author Avatar -->
        <div class="postbox__author-thumb">
            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                <?php
                echo get_avatar(
                    get_the_author_meta('user_email'),
                    $author_avatar_sz,
                    '',
                    '',
                    ['class' => 'media-object img-circle']
                );
                ?>
            </a>
        </div>

        <!-- Author Info -->
        <div class="postbox__author-content">
            <h3 class="postbox__author-title">
                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                    <?php echo esc_html($author_info); ?>
                </a>
            </h3>

            <p><?php the_author_meta('description'); ?></p>

            <!-- Author Social Links -->
            <div class="postbox__author-social d-flex align-items-center">
                <?php if (!empty($facebook_url)) : ?>
                    <a href="<?php echo esc_url($facebook_url); ?>"><i class="fa-brands fa-facebook-f"></i></a>
                <?php endif; ?>

                <?php if (!empty($twitter_url)) : ?>
                    <a href="<?php echo esc_url($twitter_url); ?>"><i class="fa-brands fa-twitter"></i></a>
                <?php endif; ?>

                <?php if (!empty($linkedin_url)) : ?>
                    <a href="<?php echo esc_url($linkedin_url); ?>"><i class="fa-brands fa-linkedin-in"></i></a>
                <?php endif; ?>

                <?php if (!empty($instagram_url)) : ?>
                    <a href="<?php echo esc_url($instagram_url); ?>"><i class="fa-brands fa-instagram"></i></a>
                <?php endif; ?>

                <?php if (!empty($youtube_url)) : ?>
                    <a href="<?php echo esc_url($youtube_url); ?>"><i class="fa-brands fa-youtube"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php endif; ?>