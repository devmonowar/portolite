<?php
if (post_password_required()) {
    return;
}
?>

<?php if (have_comments() || comments_open()) : ?>
    <div class="comment-one">
        <?php if (have_comments()) : ?>
            <h3 class="comment-one__title">
                <?php
                $comment_count = get_comments_number();
                echo esc_html($comment_count) . ' ' . _n('Comment', 'Comments', $comment_count, 'portolite');
                ?>
            </h3>

            <ul class="postbox__comment mb-95">
                <?php
                wp_list_comments(array(
                    'style'       => 'ul',
                    'callback'    => 'portolite_custom_comments',
                ));
                ?>
            </ul>

            <?php the_comments_pagination(array(
                'prev_text' => esc_html__('Previous', 'portolite'),
                'next_text' => esc_html__('Next', 'portolite'),
            )); ?>
        <?php endif; ?>
    </div>

    <div class="comment-form">
        <h3 class="comment-form__title"><?php esc_html_e('Leave A Comment', 'portolite'); ?></h3>
        <?php
        comment_form(array(
            'title_reply' => '',
            'comment_notes_before' => '',
            'comment_notes_after' => '',
            'fields' => array(
                'author' => '<div class="col-xl-6"><div class="comment-form__input-box"><input placeholder="' . esc_attr__('Your Name', 'portolite') . '" type="text" name="author" required></div></div>',
                'email'  => '<div class="col-xl-6"><div class="comment-form__input-box"><input placeholder="' . esc_attr__('Your Email', 'portolite') . '" type="email" name="email" required></div></div>',
            ),
            'comment_field' => '<div class="col-xl-12"><div class="comment-form__input-box text-message-box"><textarea name="comment" placeholder="' . esc_attr__('Message here..', 'portolite') . '" required></textarea></div></div>',
            'submit_button' => '<div class="col-xl-12"><div class="comment-form__btn-box"><button type="submit" class="thm-btn">%4$s<span class="icon-arrow-up-right"></span></button></div></div>',
            'class_form' => 'row comment-one__form contact-form-validated',
        ));
        ?>
        <div class="result"></div>
    </div>
<?php endif; ?>