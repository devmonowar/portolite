<div class="blog-details__tags-and-share">
    <?php
    $post_tags = get_the_tags();
    if ($post_tags) :
    ?>
        <div class="blog-details__tag-box">
            <span class="blog-details__tag-title"><?php esc_html_e('Tags:', 'portolite'); ?></span>
            <div class="blog-details__tag-list">
                <?php foreach ($post_tags as $tag) : ?>
                    <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">
                        <?php echo esc_html($tag->name); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="blog-details__social">
        <a href="#"><span class="icon-facebook-f"></span></a>
        <a href="#"><span class="icon-instagram"></span></a>
        <a href="#"><span class="icon-Vector"></span></a>
        <a href="#"><span class="icon-linkedin-in"></span></a>
    </div>
</div>