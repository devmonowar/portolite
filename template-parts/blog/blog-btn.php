<?php

/**
 * Template part for displaying post button
 *
 * @package portolite
 */

$portolite_blog_btn = get_theme_mod('portolite_blog_btn', __('Read More', 'portolite'));
$portolite_blog_btn_switch = get_theme_mod('portolite_blog_btn_switch', true);
?>

<?php if ($portolite_blog_btn_switch): ?>
    <div class="blog-list__btn-box">
        <a href="<?php the_permalink(); ?>" class="thm-btn">
            <?php echo esc_html($portolite_blog_btn); ?>
            <span class="icon-arrow-up-right"></span>
        </a>
    </div>
<?php endif; ?>