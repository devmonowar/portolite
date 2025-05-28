<div class="blog-details__tag-and-social">
    <?php
    $post_tags = get_the_tags();
    if (!empty($post_tags)) :
        $limited_tags = array_slice($post_tags, 0, 3);
    ?>
        <div class="blog-details__tag-box">
            <span class="blog-details__tag-title"><?php esc_html_e('Tags:', 'portolite'); ?></span>
            <div class="blog-details__tag-list">
                <?php foreach ($limited_tags as $tag) : ?>
                    <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">
                        <?php echo esc_html($tag->name); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="blog-details__social">
        <?php
        $post_url     = urlencode(get_permalink());
        $post_title   = urlencode(get_the_title());
        $post_excerpt = urlencode(get_the_excerpt());
        $post_thumb   = wp_get_attachment_url(get_post_thumbnail_id());

        $facebook_url  = 'https://www.facebook.com/sharer/sharer.php?u=' . $post_url;
        $linkedin_url  = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $post_url . '&title=' . $post_title;
        $pinterest_url = 'https://pinterest.com/pin/create/button/?url=' . $post_url . '&media=' . $post_thumb . '&description=' . $post_title;
        $email_url     = 'mailto:?subject=' . $post_title . '&body=' . $post_title . '%0A' . $post_url;
        ?>

        <a href="<?php echo esc_url($facebook_url); ?>" target="_blank" rel="noopener noreferrer">
            <span class="icon-facebook-f"></span>
        </a>
        <a href="<?php echo esc_url($linkedin_url); ?>" target="_blank" rel="noopener noreferrer">
            <span class="icon-linkedin-in"></span>
        </a>
        <a href="<?php echo esc_url($pinterest_url); ?>" target="_blank" rel="noopener noreferrer">
            <span class="icon-Vector"></span>
        </a>
        <a href="<?php echo esc_url($email_url); ?>" target="_blank" rel="noopener noreferrer">
            <span class="icon-mail"></span>
        </a>
    </div>
</div>