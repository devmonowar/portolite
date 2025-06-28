<?php

/**
 * Template part for displaying the search post button
 *
 * @package portolite
 */

$search_btn_text   = get_theme_mod('portolite_blog_btn', __('Read More', 'portolite'));
$search_btn_enable = get_theme_mod('portolite_blog_btn_switch', true);
?>

<?php if ($search_btn_enable): ?>
    <div class="search__blog-btn">
        <a href="<?php the_permalink(); ?>" class="ptl-btn-border">
            <?php echo esc_html($search_btn_text); ?>
            <span>
                <!-- Arrow SVG Icon -->
                <svg width="26" height="9" viewBox="0 0 26 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21.6934 1L25 4.20003L21.6934 7.4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M0.999999 4.1991H25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
        </a>
    </div>
<?php endif; ?>