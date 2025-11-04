<?php

/**
 * Breadcrumbs for Portolite Theme 
 *
 * @package portolite
 */

function portolite_breadcrumb_func()
{
    if (is_front_page()) {
        return; // Static homepage এ breadcrumb
    }

    // Breadcrumb title
    if (is_home()) {
        $title = portolite_kses(html_entity_decode(get_the_title(get_option('page_for_posts'))));
    } elseif (is_single() && 'post' === get_post_type()) {
        $title = portolite_kses(html_entity_decode(get_the_title()));
    } elseif (is_search()) {
        $title = portolite_kses('Search Results for: ' . get_search_query());
    } elseif (is_404()) {
        $title = portolite_kses('Page not Found');
    } elseif (is_archive()) {
        $title = portolite_kses(html_entity_decode(get_the_archive_title()));
    } else {
        $title = portolite_kses(html_entity_decode(get_the_title()));
    }




    // Page/Post ID
    $page_id = is_home() ? get_option('page_for_posts') : get_the_ID();
    $page_id = $page_id ? $page_id : null;

    // ACF check
    $has_acf = function_exists('get_field');

    // Breadcrumb hide field
    $is_breadcrumb = '';
    if (is_search()) {
        $is_breadcrumb = false;
    } elseif ($has_acf) {
        $is_breadcrumb = get_field('is_it_invisible_breadcrumb', $page_id);
    }

    if (!empty($is_breadcrumb)) return;

    // Theme mod & ACF values
    $color           = get_theme_mod('portolite_breadcrumb_bg_color', '#e1e1e1');
    $bg_img          = get_theme_mod('breadcrumb_bg_img');
    $right_img       = get_theme_mod('breadcrumb_right_img');

    // If current page has a featured image, override theme option image
    if (has_post_thumbnail()) {
        $right_img = get_the_post_thumbnail_url(get_the_ID(), 'full');
    }

    $padding_top     = get_theme_mod('portolite_breadcrumb_pt', '115');
    $padding_bottom  = get_theme_mod('portolite_breadcrumb_pb', '130');

    // Breadcrumb style — ACF > fallback to Theme Customizer
    $style_from_acf = $has_acf ? get_field('breadcrumb_style', $page_id) : '';
    $style = !empty($style_from_acf) ? $style_from_acf : get_theme_mod('choose_default_breadcrumb', 'breadcrumb-style-1');

    // Background override from page
    $img_from_page = $has_acf ? get_field('breadcrumb_background_image', $page_id) : '';
    $hide_img      = $has_acf ? get_field('hide_breadcrumb_background_image', $page_id) : '';

    if (!$hide_img && !empty($img_from_page)) {
        $bg_img = is_array($img_from_page) ? $img_from_page['url'] : $img_from_page;
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
                                echo '<li class="current">' . wp_kses_post($title) . '</li>';
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
