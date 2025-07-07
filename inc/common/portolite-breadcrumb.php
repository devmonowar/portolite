<?php

/**
 * Breadcrumbs for Portolite Theme
 *
 * @package portolite
 */

function portolite_breadcrumb_func()
{
    // Determine the breadcrumb title
    if (is_front_page() && is_home()) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog', 'portolite'));
    } elseif (is_front_page()) {
        return; // Don't show breadcrumbs on front page
    } elseif (is_home()) {
        $title = get_the_title(get_option('page_for_posts'));
    } elseif (is_single() && 'post' === get_post_type()) {
        $title = get_the_title();
    } elseif (is_search()) {
        $title = __('Search Results for: ', 'portolite') . get_search_query();
    } elseif (is_404()) {
        $title = __('Page not Found', 'portolite');
    } elseif (is_archive()) {
        $title = get_the_archive_title();
    } else {
        $title = get_the_title();
    }

    // Get current page ID
    $_id = is_home() ? get_option('page_for_posts') : get_the_ID();

    // Option to hide breadcrumb via ACF
    $is_breadcrumb = function_exists('get_field') ? get_field('is_it_invisible_breadcrumb', $_id) : '';

    
    if (!empty($_GET['s'])) {
        $is_breadcrumb = null;
    }

    if (!empty($is_breadcrumb)) return;

    // Theme mod and ACF settings
    $color         = get_theme_mod('portolite_breadcrumb_bg_color', '#e1e1e1');
    $bg_img        = get_theme_mod('breadcrumb_bg_img');
    $right_img     = get_theme_mod('breadcrumb_right_img');
    $padding_top   = get_theme_mod('portolite_breadcrumb_pt', '115');
    $padding_bottom = get_theme_mod('portolite_breadcrumb_pb', '130');
    $style         = function_exists('get_field') ? get_field('breadcrumb_style') : get_theme_mod('choose_default_breadcrumb', 'breadcrumb-style-1');
    $img_from_page = function_exists('get_field') ? get_field('breadcrumb_background_image', $_id) : '';
    $hide_img      = function_exists('get_field') ? get_field('hide_breadcrumb_background_image', $_id) : '';

    if (!$hide_img && !empty($img_from_page['url'])) {
        $bg_img = $img_from_page['url'];
    }
?>

    <!--Page Header Start-->
    <section class="page-header breadcrumb__area <?php echo esc_attr($style); ?>">
        <div class="page-header__wrap">
            <div class="page-header__shape-1" style="background-color: <?php echo esc_attr($color); ?>; background-image: url('<?php echo esc_url($bg_img); ?>');"></div>
            <div class="container">
                <div class="page-header__inner"
                    style="padding-top: <?php echo esc_attr($padding_top); ?>px; padding-bottom: <?php echo esc_attr($padding_bottom); ?>px;">

                    <div class="page-header__shape-2"></div>
                    <div class="page-header__shape-3"></div>
                    <div class="page-header__shape-4"></div>

                    <?php if (!empty($right_img)) : ?>
                        <div class="page-header__img-1">
                            <img src="<?php echo esc_url($right_img); ?>" alt="<?php echo esc_attr__('Breadcrumb Decoration', 'portolite'); ?>">

                            <div class="page-header__shape-5">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/shapes/page-header-shape-5.png'); ?>" alt="">
                            </div>
                        </div>
                    <?php endif; ?>

                    <h2 class="breadcrumb__title"><?php echo wp_kses_post($title); ?></h2>

                    <div class="thm-breadcrumb__box">
                        <ul class="thm-breadcrumb list-unstyled">
                            <?php
                            if (function_exists('bcn_display')) {
                                bcn_display();
                            } else {
                                echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
                                echo '<li class="sep"><i class="fas fa-angle-right"></i></li>';
                                echo '<li class="current">' . esc_html($title) . '</li>';
                            }
                            ?>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--Page Header End-->
<?php
}

add_action('portolite_header_style', 'portolite_breadcrumb_func', 10);
